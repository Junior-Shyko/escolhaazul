<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\DataPersonal;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms\Components\Placeholder;
use App\Http\Repository\RentalDataRepository;
use Leandrocfe\FilamentPtbrFormFields\Document;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DataPersonalResource\Pages;
use App\Filament\Resources\DataPersonalResource\RelationManagers;

class DataPersonalResource extends Resource
{
    protected static ?string $model = DataPersonal::class;
    protected static ?string $navigationGroup = 'Dados';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Dados Pessoais';

    public static function form(Form $form): Form
    {  
        //Armazenará o nome do usuario
        $nameUser = '';
        //Repositorio com várias funções util    
        $rentalRepo = new RentalDataRepository;
        //Em caso de edição busca o usuario pelo valor da Entidade
        if($form->getOperation() == 'edit'){
            $user = $rentalRepo->getUserDataPersonal($form->getRecord()->id);
            $nameUser = $user->name;
        }else{
            //Busca o usuário que está no id da url
            $idFromURL = request()->get('id');
            $user = $rentalRepo->getUserData($idFromURL);
            $nameUser = $user->name;
        }
        return $form
            ->schema([
                Section::make('')
    ->description('Cadastro relacionado aos dados pessoais do usuário')
    ->columns([
        'md' => 3
    ])
    ->schema([
        Placeholder::make('Proponente')
                    ->content($nameUser),
                Hidden::make('user_id')
                    ->default($idFromURL),
                Document::make('cpf')
                    ->label('CPF')
                    ->cpf()
                    ->maxLength(15),
                Select::make('sex')
                    ->options([
                        'Masculino' => 'Masculino',
                        'Feminino' => 'Feminino'
                    ])
                    ->label('Sexo')
                    ->preload(),
                Forms\Components\DatePicker::make('birthDate')
                    ->label('Data de Nasc.'),
                Forms\Components\TextInput::make('identity')
                    ->label('RG/Identidade')
                    ->maxLength(100),
                Forms\Components\TextInput::make('organConsignor')
                    ->label('Orgão Emissor.')
                    ->maxLength(25),
                Forms\Components\TextInput::make('nationality')
                    ->label('Nacionalidade')
                    ->maxLength(50),
                Select::make('EducationLevel')
                    ->options([
                        'Ensino fundamental imcompleto' => 'Ensino fundamental imcompleto',
                        'Ensino fundamental completo' => 'Ensino fundamental completo',
                        'Ensino médio incompleto' => 'Ensino médio incompleto',
                        'Ensino médio completo' => 'Ensino médio completo',
                        'Superior completo (ou graduação)' => 'Superior completo (ou graduação)',
                        'Pós-graduação' => 'Pós-graduação',
                        'Mestrado' => 'Mestrado',
                        'Doutorado' => 'Doutorado'
                    ])
                    ->label('Grau de Instrução')
                    ->preload(),
                Forms\Components\TextInput::make('naturality')
                    ->label('Natural')
                    ->maxLength(100),
                Select::make('maritalStatus')
                    ->options(
                        $rentalRepo->getMaritalStatus()
                    )
                    ->label('Estado Civil')
                    ->preload(),
                Select::make('number_dependents')
                    ->options([
                        '0' => '0',
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4+' => '4+',
                    ])
                    ->label('Nº Dependentes')
                    ->preload(),
    ])
               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Usuário'),

                Tables\Columns\TextColumn::make('birthDate')
                    ->date('d/m/Y')
                    ->label('Data de nasc.')
                    ->sortable(),

                Tables\Columns\TextColumn::make('cpf')
                    ->label('CPF')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nationality')
                    ->label('Nacional')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Ultima Alteração')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('identity')
                    ->label('RG/Identidade')
                    ->searchable(),

            ])
            ->defaultSort('created_at', 'desc')
            ->query(function (DataPersonal $query) {
                // if(auth()->user()->hasRole('common'))
                if (auth()->user()->hasRole('common')) {
                    //Busca todos os veiculos da proposta
                    $ids = RentalDataRepository::getEntityToProposal(DataPersonal::class, 'user_id');
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
                ])
                    ->button()
                    ->label('Ações')
                    ->color('primary')
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
            'index' => Pages\ListDataPersonals::route('/'),
            'create' => Pages\CreateDataPersonal::route('/create'),
            'edit' => Pages\EditDataPersonal::route('/{record}/edit'),
        ];
    }
}
