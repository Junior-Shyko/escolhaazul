<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Professional;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Leandrocfe\FilamentPtbrFormFields\Money;
use App\Http\Repository\RentalDataRepository;
use Leandrocfe\FilamentPtbrFormFields\Document;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProfessionalResource\Pages;
use App\Filament\Resources\ProfessionalResource\RelationManagers;
use App\Models\RentalData;

class ProfessionalResource extends Resource
{
    protected static ?string $model = Professional::class;

    protected static ?string $navigationIcon = 'heroicon-m-briefcase';
    protected static ?string $navigationGroup = 'Dados';
    protected static ?string $navigationLabel = 'Dados Profissional';

    public static function form(Form $form): Form
    {
        $idFromURL = request()->get('id');
        $employment = new RentalDataRepository;
        return $form
            ->schema([
                Section::make('Adicione seus dados profissionais')
                    ->columns([
                        'md' => 3
                    ])
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
                            ->label('Atividade')
                            ->maxLength(150),
                        Forms\Components\TextInput::make('name_bussiness')
                            ->label('Nome da empresa')
                            ->maxLength(150),
                        Document::make('cnpj')
                            ->label('CNPJ')
                            ->maxLength(30)
                            ->cnpj(),
                        Select::make('employment_relationship')
                            ->options($employment->getEmploymentRelationship())
                            ->label('Vinculo Empregatício')
                            ->native(false)
                            ->preload(),
                        Forms\Components\DatePicker::make('admission_date')
                            ->label('Data Admissão')
                            ->placeholder('MM/DD/YYYY'),
                        Forms\Components\TextInput::make('function')
                            ->label('Função')
                            ->maxLength(150),
                        Forms\Components\TextInput::make('contact_person')
                            ->label('Pessoa para contato')
                            ->maxLength(150),
                        Forms\Components\TextInput::make('email')
                            ->label('E-mail profissional')
                            ->email()
                            ->maxLength(150),
                        Money::make('salary')
                            ->label('Salário'),
                        Money::make('other_rents')
                            ->label('Outras Rendas'),
                        Forms\Components\TextInput::make('other_income_source')
                            ->label('Origem de outras rendas')
                            ->maxLength(150),
                        Select::make('object_type')
                            ->options([
                                'personal' => 'Pessoa Física',
                                'legal' => 'Pessoa Jurídica'
                            ])
                            ->label('Tipo de referência')
                            ->required()
                            ->native(false)
                            ->preload(),
                    ])
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
