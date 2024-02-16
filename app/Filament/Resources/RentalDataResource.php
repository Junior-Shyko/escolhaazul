<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Term;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use App\Models\RentalData;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Section as Infosection;
use Leandrocfe\FilamentPtbrFormFields\Money;
use App\Http\Repository\RentalDataRepository;
use App\Filament\Resources\RentalDataResource\Pages;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Infolists\Components\Actions\Action as InfoAction;


class RentalDataResource extends Resource
{
    protected static ?string $model = RentalData::class;

    protected static ?string $navigationIcon = 'heroicon-s-clipboard-document-list';

    protected static ?string $navigationLabel = 'Propostas';

    public ?string $rental = null;

    public static function form(Form $form): Form
    {
        $rentalRepo = new RentalDataRepository;
        $prop = $form->getRecord()->user()->get();
        return $form
            ->schema([
                Section::make()
                    ->columns([
                        'md' => 3
                    ])
                    ->schema([
                        Placeholder::make('Proponente')
                            ->content($prop[0]->name),
                        Placeholder::make('Código Proponente')
                            ->content($prop[0]->id),
                        Forms\Components\TextInput::make('refImmobile')
                            ->label('Referência do imóvel')
                            ->maxLength(200),
                        Select::make('typeRentalUser')
                            ->options([
                                'Pessoa Física' => 'Pessoa Física',
                                'Pessoa Jurídica' => 'Pessoa Jurídica'
                            ])
                            ->label('Tipo da proposta')
                            ->required()
                            ->native(true)
                            ->preload(),
                        Select::make('finality')
                            ->options([
                                'Comercial' => 'Comercial',
                                'Residencial' => 'Residencial',
                                'temporada' => 'Temporada'
                            ])
                            ->label('Finalidade')
                            ->required()
                            ->native(true)
                            ->preload(),
                        Forms\Components\TextInput::make('term')
                        ->label('Prazo desejado')
                            ->numeric(),
                        Select::make('warrantyType')
                            ->options([
                                'Carta Fiança' => 'Carta Fiança',
                                'Caução' => 'Caução',
                                'Crédito' => 'Crédito',
                                'Fiador' => 'Fiador',
                                'Sem garantia' => 'Sem garantia',
                                'Seguro fiança' => 'Seguro fiança',
                                'Outras' => 'TempOutrasorada'
                            ])
                            ->label('Tipo de garantia')
                            ->required()
                            ->native(true)
                            ->preload(),
                        Forms\Components\TextInput::make('proposedValue')
                        ->label('Valor proposto')
                            ->numeric(),
                        Forms\Components\Textarea::make('ps')
                        ->label('Observação')
                            ->columnSpanFull(),
                        Select::make('status')
                            ->options([
                                'incompleta' => 'Incompleta',
                                'finalizada' => 'Finalizada'
                            ])
                            ->label('Situação')
                            ->required()
                            ->native(true)
                            ->preload(),
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
                Tables\Columns\TextColumn::make('guarantor_count')
                    ->counts('guarantor')
                    ->label('Fiador'),
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


    public static function infolist(Infolist $infolist): Infolist
    {
        $userForm = $infolist->getRecord()->user()->get();
        return $infolist
            ->schema([
                Infosection::make('Dados do contato telefônico')
                    ->schema([
                        TextEntry::make('user.name')
                        ->label('Proponente:'),
                        TextEntry::make('user.id')
                        ->label('Código proponente:'),
                        TextEntry::make('refImmobile')
                        ->label('Referência do imóvel:')
                        ->placeholder('Sem registro'),
                        TextEntry::make('typeRentalUser')
                        ->label('Tipo da proposta:')
                        ->placeholder('Sem registro'),
                        TextEntry::make('term')
                        ->label('Prazo Desejado:')
                        ->placeholder('Sem registro'),
                        TextEntry::make('warrantyType')
                        ->label('Tipo de garantia:')
                        ->placeholder('Sem registro'),
                        TextEntry::make('proposedValue')
                        ->label('Valor Proposto:')
                        ->placeholder('Sem registro'),
                        TextEntry::make('status')
                        ->label('Situação:')
                        ->placeholder('Sem registro'),
                        TextEntry::make('ps')
                        ->label('Observação:')
                        ->placeholder('Sem registro'),
                        TextEntry::make('date_finish')
                        ->label('Data Finalizada:')
                    ])
                ->columns(3),
                Infosection::make('Lista de fiador da proposta')
                    ->schema([
                        ViewEntry::make('guarantor')
                        ->label('Fiador(es)')
                        ->view('infolists.components.rental-data')
                        ->registerActions([
                            InfoAction::make('resetStars')
                            ->icon('heroicon-m-x-mark')
                            ->color('danger')
                            ->requiresConfirmation()
                            ->action(function (RentalData $resetStars) {
                                $resetStars();
                            })
                        ]),
                        TextEntry::make('ps')
                        ->label('Observação:')
                    ])
                ->columns(2)
            ]);
    }

}
