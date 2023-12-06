<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Term;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\RentalData;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Repository\RentalDataRepository;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RentalDataResource\Pages;
use Filament\Infolists\Components\Section as InfolistSection;
use Filament\Infolists\Components\Actions\Action as InfoListAction;
use App\Filament\Resources\RentalDataResource\RelationManagers;

class RentalDataResource extends Resource
{
    protected static ?string $model = RentalData::class;

    protected static ?string $navigationIcon = 'heroicon-s-clipboard-document-list';

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
                            if (auth()->user()->hasRole('common')) {
                                return redirect('https://filmesonlines.org/');
                            } else {
                                return redirect()->route('proposal.analysis.pdf', [$record->user_id, $record->id]);
                            }
                        })
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                InfolistSection::make('Dados da locação')
                    ->columns([
                        'md' => 4
                    ])
                    ->schema([
                        TextEntry::make('id')
                            ->label('Nº'),
                        TextEntry::make('typeRentalUser')
                            ->label('Tipo de Proposta'),
                        TextEntry::make('user.name')
                            ->label('Cliente'),
                        TextEntry::make('status')
                            ->label('Status'),
                        TextEntry::make('refImmobile')
                            ->label('Referência do Imóvel')
                            ->columnSpan([
                                'sm' => 2,
                            ]),
                        TextEntry::make('finality')
                            ->label('Finalidade'),
                        TextEntry::make('warrantyType')
                            ->label('Tipo de Garantia'),
                        TextEntry::make('proposedValue')
                            ->label('Aluguel Proposto'),
                        TextEntry::make('term')
                            ->label('Prazo desejado'),
                        TextEntry::make('ps')
                            ->label('Observação'),
                        TextEntry::make('date_finish')
                            ->label('Finalizada em'),
                    ]),
                // Segunda
                InfolistSection::make('Dados Pessoais do Proponente')
                    ->columns([
                        'md' => 4
                    ])
                    ->schema([
                        TextEntry::make('user.name')
                            ->label('Proponente'),
                        TextEntry::make('user.email')
                            ->label('E-mail do proponente')
                            ->columnSpan([
                                'sm' => 2,
                            ]),
                        TextEntry::make('user.dataPersonal.cpf')
                            ->label('CPF'),
                        TextEntry::make('user.dataPersonal.identity')
                            ->label('RG/Identidade'),
                        TextEntry::make('user.dataPersonal.sex')
                            ->label('Sexo'),
                        TextEntry::make('user.dataPersonal.birthDate')
                            ->label('Data de nascimento')
                            ->datetime('d/m/Y'),
                        TextEntry::make('user.dataPersonal.organConsignor')
                            ->label('Orgão Emissor'),
                        TextEntry::make('user.dataPersonal.naturality')
                            ->label('Natural'),
                        TextEntry::make('user.dataPersonal.nationality')
                            ->label('Nacionalidade'),
                        TextEntry::make('user.dataPersonal.EducationLevel')
                            ->label('Grau de Instrução'),
                        TextEntry::make('user.dataPersonal.maritalStatus')
                            ->label('Estado Civil'),
                        TextEntry::make('user.dataPersonal.number_dependents')
                            ->label('N° Dependentes')
                        ]),
                    // ...
                    InfolistSection::make('Dados Profissionais do Proponente')
                    ->headerActions([
                        InfolistAction::make('Adicionar')
                            ->action(function () {
                                // ...
                            }),
                    ])
                    ->columns([
                        'md' => 4
                    ])
                    ->schema([
                        ViewEntry::make('professional')
                        ->label('Profissão')
                            ->view('infolists.components.professional')
                        // TextEntry::make('professional.profession')
                        //     ->label('Profissão'),
                        // TextEntry::make('professional.activity')
                        //     ->label('Atividade'),
                        // TextEntry::make('professional.name_bussiness')
                        //     ->label('Nome da Empresa'),
                        // TextEntry::make('professional.cnpj')
                        //     ->label('CNPJ'),
                        // TextEntry::make('professional.employment_relationship')
                        //     ->label('Vínculo Empregatício'),
                        // TextEntry::make('professional.admission_date')
                        //     ->label('Data de Admissão')
                        //     ->datetime('d/m/Y'),
                        // TextEntry::make('professional.dataPersonal.organConsignor')
                        //     ->label('Orgão Emissor'),
                        // TextEntry::make('professional.dataPersonal.naturality')
                        //     ->label('Natural'),
                        // TextEntry::make('professional.dataPersonal.nationality')
                        //     ->label('Nacionalidade'),
                        // TextEntry::make('professional.dataPersonal.EducationLevel')
                        //     ->label('Grau de Instrução'),
                        // TextEntry::make('professional.dataPersonal.maritalStatus')
                        //     ->label('Estado Civil'),
                        // TextEntry::make('professional.dataPersonal.number_dependents')
                        //     ->label('N° Dependentes')
                    ])
                // ...
            ])->columns(2);
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
