<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Vehicle;
use Filament\Forms\Form;
use App\Models\RentalData;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Actions\CreateAction;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Grouping\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\VehicleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VehicleResource\RelationManagers;

class VehicleResource extends Resource
{
    protected static ?string $model = Vehicle::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    // protected static ?string $navigationGroup = 'Veículo';
 
    protected static ?string $navigationLabel = 'Veículo';
    
    public static function form(Form $form): Form
    {
        //Obtendo o id da proposta
        $idFromURL = request()->get('id');
        return $form
            ->schema([
                Section::make()
                ->columns([                 
                    'md' => 4,
                ])
                ->schema([
                    TextInput::make('branch')
                    ->label('Marca'),
                    TextInput::make('model')
                    ->label('Modelo'),
                    TextInput::make('year')
                    ->label('Ano'),
                    TextInput::make('plate')
                    ->label('Placa'),
                    Select::make('financed')
                    ->options([
                        'sim' => 'Sim',
                        'nao' => 'Não'
                    ])
                    ->native(false)
                    ->preload(),
                    TextInput::make('financial')
                    ->label('Financeira'),
                    TextInput::make('value')
                    ->prefix('R$')
                    ->label('Valor'),
                    TextInput::make('object_id')
                    ->label('Nº Proposta')
                    ->default($idFromURL)
                    ->disabled(),
                    Hidden::make('object_id')
                    ->default($idFromURL)
                ])
               
                
            ]);
    }

    public static function table(Table $table): Table
    {
        $direction = 'asc';
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rentalData.id')
                ->label('N. Proposta'),
                Tables\Columns\TextColumn::make('rentalData.user.name')
                ->label('Proponente')
                ->searchable(),
                Tables\Columns\TextColumn::make('branch')
                ->label('Marca'),
                Tables\Columns\TextColumn::make('model')
                ->label('Modelo'),
                Tables\Columns\TextColumn::make('financed')
                ->label('Financiado')
                ->searchable(),
                Tables\Columns\TextColumn::make('year')
                ->label('Ano'),
            ])
            ->defaultSort('created_at', 'desc')
            ->query(function (Vehicle $query) {
                // if(auth()->user()->hasRole('common'))
                if(auth()->user()->hasRole('common'))
                {
                    //Busca todos os veiculos da proposta
                    $ids = Vehicle::getVehicleToProposal();
                    return $query->whereIn('id', $ids);
                }else{
                    return $query;
                }
            })
            
            ->filters([
                SelectFilter::make('financed')
                ->options([
                    'sim' => 'Sim',
                    'nao' => 'Não'
                ])->label('Financiado'),
            ])
            ->actions([                
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Action::make('Adicionar')
                    ->icon('heroicon-m-plus-circle')
                    ->action(function(Vehicle $record) {
                        return redirect('admin/vehicles/create/?id='.$record->object_id);
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
            'index' => Pages\ListVehicles::route('/'),
            'create' => Pages\CreateVehicle::route('/create'),
            'edit' => Pages\EditVehicle::route('/{record}/edit'),
        ];
    }



    //Removendo o botão para criar veiculo mas tbm remove a rota de criar
    // public static function canCreate(): bool { return false; }
}