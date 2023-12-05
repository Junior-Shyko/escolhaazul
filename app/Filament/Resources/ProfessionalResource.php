<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Professional;
use Filament\Actions\Action;
use Filament\Resources\Resource;

use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Repository\RentalDataRepository;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProfessionalResource\Pages;
use App\Filament\Resources\ProfessionalResource\RelationManagers;

class ProfessionalResource extends Resource
{
    protected static ?string $model = Professional::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Dados';
    protected static ?string $navigationLabel = 'Profissional';

    public static function form(Form $form): Form
    {
        $idFromURL = request()->get('id');
        return $form
            ->schema([
                TextInput::make('object_id')
                ->label('Nº Proposta')
                ->default($idFromURL)
                ->disabled(),
                Hidden::make('object_id')
                    ->default($idFromURL),
                Forms\Components\TextInput::make('profession')
                ->label('Profissão')
                    ->maxLength(150),
                Forms\Components\TextInput::make('activity')
                    ->maxLength(150),
                Forms\Components\TextInput::make('name_bussiness')
                    ->maxLength(150),
                Forms\Components\TextInput::make('cnpj')
                    ->maxLength(30),
                Forms\Components\TextInput::make('employment_relationship')
                    ->maxLength(150),
                Forms\Components\DateTimePicker::make('admission_date'),
                Forms\Components\TextInput::make('function')
                    ->maxLength(150),
                Forms\Components\TextInput::make('contact_person')
                    ->maxLength(150),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(150),
                Forms\Components\TextInput::make('salary')
                    ->numeric(),
                Forms\Components\TextInput::make('other_rents')
                    ->numeric(),
                Forms\Components\TextInput::make('other_income_source')
                    ->maxLength(150),
                Forms\Components\TextInput::make('object_id')
                    ->maxLength(15),
                Forms\Components\TextInput::make('object_type')
                    ->maxLength(150),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('object_id')
                ->label('Nº Proposta')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rentalData.user.name')
                ->label('Proponente'),
                Tables\Columns\TextColumn::make('profession')
                ->label('Profissão')
                    ->searchable(),
                Tables\Columns\TextColumn::make('activity')
                ->label('Atividade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name_bussiness')
                ->label('Nome da empresa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cnpj')
                ->label('CNPJ')
                    ->searchable(),

                Tables\Columns\TextColumn::make('admission_date')
                ->label('Data de admissão')
                    ->dateTime('d/m/Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('Função')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('id', 'desc')
            ->query(function (Professional $query) {
                if (auth()->user()->hasRole('common')) {
                    //Busca todos os dados dessa entidade desse usuário
                    $ids = RentalDataRepository::getEntityToProposal(Professional::class, 'object_id');
                    return $query->whereIn('id', $ids);
                } else {
                    return $query;
                }
            })
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Action::make('Adicionar')
                        ->icon('heroicon-m-plus-circle')
                        ->action(function (Professional $record) {
                            return redirect('admin/professionals/create/?id=' . $record->object_id);
                        })

                ])
                    ->button()
                    ->label('Ações')
                    ->color('primary'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfessionals::route('/'),
            'create' => Pages\CreateProfessional::route('/create'),
            'edit' => Pages\EditProfessional::route('/{record}/edit'),
        ];
    }
}
