<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Property;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Actions\Action as ActionForm;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Leandrocfe\FilamentPtbrFormFields\Money;
use App\Http\Repository\RentalDataRepository;
use App\Filament\Resources\PropertyResource\Pages;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $navigationIcon = 'heroicon-s-home-modern';
    protected static ?string $navigationGroup = 'Referências';
    protected static ?string $navigationLabel = 'Bens';

    public static function form(Form $form): Form
    {
        $idFromURL = request()->get('id');
        return $form
            ->schema([
                Section::make('')
                    ->schema([
                        TextInput::make('object_id')
                            ->label('Nº Proposta')
                            ->default($idFromURL)
                            ->disabled(),
                        Hidden::make('object_id')
                            ->default($idFromURL),
                        Money::make('value')
                            ->label('Valor')
                            ->prefix(null),
                        Select::make('financed')
                            ->label('Financiado')
                            ->options([
                                'sim' => 'Sim',
                                'nao' => 'Não'
                            ])
                            ->native(false)
                            ->preload(),
                        Forms\Components\TextInput::make('registration')
                            ->label('Matricula')
                            ->maxLength(150),
                        Forms\Components\TextInput::make('registry')
                            ->label('Cartório')
                            ->maxLength(50),
                        Select::make('object_type')
                            ->options([
                                'personal' => 'Pessoa Física',
                                'legal' => 'Pessoa Jurídica'
                            ])
                            ->label('Tipo de referência')
                            ->required()
                            ->native(false)
                            ->preload(),
                    ])->columns(2)


            ]);
    }

    public static function table(Table $table): Table
    {
        $title = RentalDataRepository::titleModalRole('delete', 'Propriedade');
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('object_id')
                    ->label('Nº. Proposta')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rentalData.user.name')
                    ->label('Proponente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('value')
                    ->label('Valor')
                    ->numeric(),
                Tables\Columns\TextColumn::make('financed')
                    ->label('Financiado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('registration')
                    ->label('Matricula')
                    ->searchable(),
                Tables\Columns\TextColumn::make('registry')
                    ->label('Cartório')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->defaultSort('id', 'desc')
            ->query(function (Property $query) {
                // if(auth()->user()->hasRole('common'))
                if (auth()->user()->hasRole('common')) {
                    //Busca todos os veiculos da proposta
                    $ids = RentalDataRepository::getEntityToProposal(Property::class, 'object_id');
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
                        ->action(function (Property $record) {
                            return redirect('admin/properties/create/?id=' . $record->object_id);
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
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }
}
