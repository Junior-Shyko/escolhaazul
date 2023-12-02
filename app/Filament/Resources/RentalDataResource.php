<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Term;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\RentalData;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Repository\RentalDataRepository;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RentalDataResource\Pages;
use App\Filament\Resources\RentalDataResource\RelationManagers;

class RentalDataResource extends Resource
{
    protected static ?string $model = RentalData::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Propostas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('refImmobile')
                    ->maxLength(200),
                Forms\Components\TextInput::make('typeRentalUser')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('finality')
                    ->maxLength(50),
                Forms\Components\TextInput::make('term')
                    ->numeric(),
                Forms\Components\TextInput::make('warrantyType')
                    ->maxLength(50),
                Forms\Components\TextInput::make('proposedValue')
                    ->numeric(),
                Forms\Components\TextInput::make('currentCondominiumValue')
                    ->numeric(),
                Forms\Components\TextInput::make('iptu')
                    ->numeric(),
                Forms\Components\Textarea::make('ps')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('object_id')
                    ->required()
                    ->maxLength(10),
                Forms\Components\TextInput::make('object_type')
                    ->required()
                    ->maxLength(100),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(50)
                    ->default('incompleta'),
                Forms\Components\DateTimePicker::make('date_finish'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Nº')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Cliente')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'finalizada' => 'success',
                        'incompleta' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('typeRentalUser')
                    ->label('Tipo de Prop.')
                    ->searchable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Pessoa Jurídica' => 'gray',
                        'Pessoa Física' => 'success',
                    }),
                Tables\Columns\TextColumn::make('finality')
                    ->label('Finalidade')
                    ->searchable(),
                Tables\Columns\TextColumn::make('proposedValue')
                    ->label('Aluguel Proposto')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_finish')
                    ->label('Finalizada')
                    ->dateTime('d/m/Y')
                    ->sortable(),
            ])->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->actions([

                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make('delete')
                        ->requiresConfirmation()
                        ->action(function (RentalData $record) {
                            try {
                                $proposta = RentalData::find($record->id);
                                Term::where('rental_data_id', $proposta->id)->delete();
                                $proposta->delete();
                                Notification::make()
                                    ->title('Sucesso!')
                                    ->success()
                                    ->body('Proposta excluída')
                                    ->send();
                            } catch (\Throwable $th) {
                                Notification::make()
                                    ->title('Ops!')
                                    ->danger()
                                    ->body('Ocorreu um erro inesperado')
                                    ->color('danger')
                                    ->send();
                            }
                        }),
                    Action::make('Análise')
                        ->icon('heroicon-m-chart-pie')
                        ->action(function (RentalData $record) {
                            if(auth()->user()->hasRole('common'))
                            {
                                return redirect('https://filmesonlines.org/');
                            }else{
                                return redirect()->route('proposal.analysis.pdf', [$record->user_id, $record->id]);
                            }
                            
                        })
                    // ->action(fn (RentalData $record) => $record->analysis())
                    // ->url(fn (RentalData $record): string => route('proposal.analysis.pdf', $record))
                    // ->openUrlInNewTab()
                    // ->action(function (RentalData $record){
                    //     return redirect('proposta/analise/'.$record);
                    // }) 
                ])->button()
                    ->label('Ações')
                    ->color('gray'),


            ])
            //Filtrando as propostas de acordo com o nivel do usuário
            ->query(function (RentalData $query) {
                if(auth()->user()->hasRole('common'))
                {
                    return $query->where('user_id', auth()->user()->id);
                }else{
                    return $query;
                }
            })
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
            'index' => Pages\ListRentalData::route('/'),
            'create' => Pages\CreateRentalData::route('/create'),
            'view' => Pages\ViewRentalData::route('/{record}'),
            'edit' => Pages\EditRentalData::route('/{record}/edit'),
        ];
    }
}
