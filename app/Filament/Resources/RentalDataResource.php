<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\File;
use App\Models\Term;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\RentalData;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Http;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Collection;
use Leandrocfe\FilamentPtbrFormFields\Money;
use App\Http\Repository\RentalDataRepository;
use App\Filament\Resources\RentalDataResource\Pages;
use App\Filament\Resources\RentalDataResource\RelationManagers;

class RentalDataResource extends Resource
{
    protected static ?string $model = RentalData::class;

    protected static ?string $navigationIcon = 'heroicon-s-clipboard-document-list';

    protected static ?string $navigationLabel = 'Propostas';

    public ?string $rental = null; 
   
    public static function form(Form $form): Form
    {
        $rentalRepo = new RentalDataRepository;
        $userForm = RentalDataRepository::getUserToForm($form);
        
        return $form
            ->schema([
                Section::make()
                    ->columns([
                        'md' => 3
                    ])
                    ->schema([
                        Placeholder::make('Proponente')
                            ->content($userForm['nameUser']),
                        Forms\Components\TextInput::make('user_id')
                        ->label('Código usuário')
                            ->required()
                            ->numeric(),
                        
                        Forms\Components\TextInput::make('refImmobile')
                        ->label('Referência do imóvel')
                            ->maxLength(200),
                        Forms\Components\TextInput::make('typeRentalUser')
                        ->label('Tipo da proposta')
                            ->required()
                            ->maxLength(50),
                        Forms\Components\TextInput::make('finality')
                        ->label('Finalidade')
                            ->maxLength(50),
                        Forms\Components\TextInput::make('term')
                        ->label('Prazo desejado')
                            ->numeric(),
                        Forms\Components\TextInput::make('warrantyType')
                        ->label('Tipo de garantia')
                            ->maxLength(50),
                        Forms\Components\TextInput::make('proposedValue')
                        ->label('Valor proposto')
                            ->numeric(),
                        
                        Forms\Components\Textarea::make('ps')
                        ->label('Observação')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('status')
                        ->label('Situação da proposta')
                            ->required()
                            ->maxLength(50)
                            ->default('incompleta'),
                        Forms\Components\DateTimePicker::make('date_finish')
                        ->label('Data Finalizada'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Nº')
                    ->numeric()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Proponente')
                    ->searchable(),
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
                            if (auth()->user()->hasRole('common')) {
                                return redirect('https://filmesonlines.org/');
                            } else {
                                return redirect()->route('proposal.analysis.pdf', [$record->user_id, $record->id]);
                            }
                        }),
                    Action::make('Profissional')
                        ->icon('heroicon-m-plus-circle')
                        ->action(function (RentalData $record) {
                        }),
                    Action::make('Bens')
                        ->icon('heroicon-m-plus-circle')
                        ->action(function (RentalData $record) {
                            return redirect('admin/properties/create/?id=' . $record->id);
                        }),
                    Action::make('Imobiliária')
                        ->icon('heroicon-m-plus-circle')
                        ->action(function (RentalData $record) {
                            return redirect('admin/real-states/create/?id=' . $record->id);
                        }),
                    Action::make('Veículo')
                        ->icon('heroicon-m-plus-circle')
                        ->action(function (RentalData $record) {
                            if (auth()->user()->hasRole('common')) {
                                return redirect('https://filmesonlines.org/');
                            } else {
                                return redirect()->route('proposal.analysis.pdf', [$record->user_id, $record->id]);
                            }
                        }),
                    Action::make('Telefone')
                        ->icon('heroicon-m-plus-circle')
                        ->action(function (RentalData $record) {
                            return redirect('admin/phones/create/?id=' . $record->id);
                        }),
                    Action::make('Arquivos')
                        ->icon('heroicon-m-plus-circle')
                        ->action(function (RentalData $record): void {
                            redirect('admin/file?id=' . $record->id);
                        })
                        ->openUrlInNewTab()
                ])->button()
                    ->label('Ações')
                    ->color('gray'),


            ])
            //Filtrando as propostas de acordo com o nivel do usuário
            ->query(function (RentalData $query) {
                if (auth()->user()->hasRole('common')) {
                    return $query->where('user_id', auth()->user()->id);
                } else {
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

    public static function getWidgets(): array
    {
        return [
            RentalDataResource\Widgets\RentalDataOverview::class,
        ];
    }


}
