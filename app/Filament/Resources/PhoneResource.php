<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PhoneResource\Pages;
use App\Filament\Resources\PhoneResource\RelationManagers;
use App\Http\Repository\RentalDataRepository;
use App\Models\Phone;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Actions;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\Section;
use Filament\Forms\Components\Section as SectionForm;
use Leandrocfe\FilamentPtbrFormFields\PhoneNumber;

class PhoneResource extends Resource
{
    protected static ?string $model = Phone::class;
    protected static ?string $navigationGroup = 'Dados';
    protected static ?string $navigationIcon = 'heroicon-s-phone';
    protected static ?string $navigationLabel = 'Telefone';

    public static function form(Form $form): Form
    {

        $userForm = RentalDataRepository::getUserToForm($form);
        $idFromURL = request()->get('id');
        return $form
            ->schema([
                SectionForm::make('')
                    ->columns([
                        'md' => 3
                    ])
                    ->schema([
                        TextInput::make('object_id')
                            ->label('Nº Proposta')
                            ->default($idFromURL)
                            ->disabled(),
                        Placeholder::make('Proponente')
                            ->content($userForm['nameUser']),
                        Hidden::make('user_id')
                            ->default($userForm['idUser']),
                        Hidden::make('object_id')
                            ->default($idFromURL),
                        PhoneNumber::make('number')
                            ->label('Número Telefônico')
                            ->required()
                            ->maxLength(25),
                        Select::make('object_type')
                            ->options([
                                'personal' => 'Pessoal',
                                'professional' => 'Profissional'
                            ])
                            ->label('Tipo')
                            ->required()
                            ->preload(),
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('user.name')
                ->label('Proponente')
                    ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('number')
                ->label('Número')
                    ->searchable(),
                Tables\Columns\TextColumn::make('object_type')
                ->label('Referência')
                ->state(function (Phone $record): string {
                   $type = '';
                   switch ($record->object_type) {
                    case 'User':
                        $type = 'Pessoal';
                        break;
                    case 'personal':
                        $type = 'Pessoal';
                        break;
                    case 'professional':
                        $type = 'Profissional';
                        break;

                    default:
                        # code...
                        break;
                   }

                   return $type;
                })
                ->searchable()

            ])
            ->filters([
//                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
                    ->button()
                    ->label('Ações')
                    ->color('primary')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
//                    Tables\Actions\ForceDeleteBulkAction::make(),
//                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }


    public static function infolist(Infolist $infolist): Infolist
    {

        return $infolist
            ->schema([
                Section::make('Dados do contato telefônico')
                    ->schema([
                        Infolists\Components\TextEntry::make('user.name')
                        ->label('Proponente'),
                        Infolists\Components\TextEntry::make('number')
                        ->label('Nùmero Telefônico')
                    ])
                    ->columns(2)
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
            'index' => Pages\ListPhones::route('/'),
            'create' => Pages\CreatePhone::route('/create'),
            'view' => Pages\ViewPhone::route('/{record}'),
            'edit' => Pages\EditPhone::route('/{record}/edit'),
        ];
    }

//    public static function getEloquentQuery(): Builder
//    {
//        return parent::getEloquentQuery()
//            ->withoutGlobalScopes([
//                SoftDeletingScope::class,
//            ]);
//    }
}
