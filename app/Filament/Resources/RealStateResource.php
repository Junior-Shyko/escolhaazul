<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\RealState;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\Section;
use App\Http\Repository\RentalDataRepository;
use App\Filament\Resources\RealStateResource\Pages;
use Leandrocfe\FilamentPtbrFormFields\PhoneNumber;
use App\Filament\Resources\RealStateResource\RelationManagers;

class RealStateResource extends Resource
{
    protected static ?string $model = RealState::class;

    protected static ?string $navigationIcon = 'heroicon-m-building-office';
    protected static ?string $navigationGroup = 'Referências'; 
    protected static ?string $navigationLabel = 'Imobiliária';

    public static function form(Form $form): Form
    {
        $idFromURL = request()->get('id');
        return $form
            ->schema([
                Section::make('')
                ->schema([
                    Forms\Components\TextInput::make('name')
                    ->maxLength(150),
                Forms\Components\TextInput::make('creci')
                    ->maxLength(50),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(150),
                PhoneNumber::make('phone_fixed')
                ->label('Telefone Fixo'),
                PhoneNumber::make('phone_mobile')
                    ->label('Telefone Celular'),
                Select::make('object_type')
                    ->options([
                        'personal' => 'Pessoa Física',
                        'legal' => 'Pessoa Jurídica'
                    ])
                    ->label('Tipo de referência')
                    ->required()
                    ->native(false)
                    ->preload(),
                TextInput::make('object_id')
                    ->label('Nº Proposta')
                    ->default($idFromURL)
                    ->disabled(),
                Hidden::make('object_id')
                    ->default($idFromURL),
                ]) ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        $title = RentalDataRepository::titleModalRole('delete', 'Imobiliária');
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('object_id')
                    ->label('Nº Proposta')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rentalData.user.name')
                    ->label('Proponente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Imobiliária')
                    ->searchable(),
                Tables\Columns\TextColumn::make('creci')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
            ])->defaultSort('id', 'desc')
            ->query(function (RealState $query) {
                // if(auth()->user()->hasRole('common'))
                if (auth()->user()->hasRole('common')) {
                    //Busca todos os veiculos da proposta
                    $ids = RentalDataRepository::getEntityToProposal(RealState::class, 'object_id');
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
                    Tables\Actions\DeleteAction::make()
                    ->modalHeading($title),
                    Action::make('Adicionar')
                        ->icon('heroicon-m-plus-circle')
                        ->action(function (RealState $record) {
                            return redirect('admin/real-states/create/?id=' . $record->object_id);
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
            'index' => Pages\ListRealStates::route('/'),
            'create' => Pages\CreateRealState::route('/create'),
            'edit' => Pages\EditRealState::route('/{record}/edit'),
        ];
    }
}
