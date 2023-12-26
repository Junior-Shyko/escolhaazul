<?php

namespace App\Filament\Resources;

use Filament\Panel;
use App\Models\Role;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\DataPersonal;
use Filament\Resources\Resource;

use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use App\Http\Repository\CustomAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Navigation\NavigationGroup;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Repository\RentalDataRepository;
use App\Filament\Resources\UserResource\Pages;
use Filament\Tables\Actions\ForceDeleteAction;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-s-users';

    protected static ?int $navigationSort = 3;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->label('Nome do Usuário')
                ->required(),
                TextInput::make('email')
                ->label('E-mail do Usuário')
                ->required(),
                TextInput::make('password')
                ->label('Senha')
                ->password()
                ->required(),
                Select::make('roles')
                ->label('Nível')
                ->relationship(name: 'roles', titleAttribute: 'name')
                ->disabled(
                    function () {
                        if (auth()->user()->hasRole('common')) {
                            return true;
                        }
                    }
                )
            ]);
    }

    public static function table(Table $table): Table
    {
        $title = RentalDataRepository::titleModalRole('delete', 'Usuário');
        return $table
            ->columns([
                TextColumn::make('name')
                ->searchable(),
                TextColumn::make('email')
                ->searchable(),
                TextColumn::make('created_at')->dateTime('d/m/Y')
                ->label('Criado'),
                TextColumn::make('roles.name')
                ->label('Papeis')
                ->searchable()
                ->sortable()

            ])
            ->defaultSort('id', 'desc')
            ->query(function (User $query) {
                if (auth()->user()->hasRole('common')) {
                    //Busca todos os dados dessa entidade desse usuário
                    return $query->where('id', '=', auth()->user()->id);
                } else {
                    return $query;
                }
            })
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make()
                    ->modalHeading($title),
                    Action::make('Editar Dados Pessoais')
                        ->icon('heroicon-o-pencil-square')
                        ->action(function (User $record) {

                            $dataPersonal = DataPersonal::where('user_id', $record->id)->first();

                            if(is_null($dataPersonal)){
                                return redirect('admin/data-personals/create?id=' . $record->id);
                            }
                            return redirect('admin/data-personals/'. $dataPersonal->id.'/edit' );
                        })

                ])->button()
                ->label('Ações')
                ->color('gray')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationGroup(): string
    {
        if (auth()->user()->hasRole('common')) {
            //Busca todos os dados dessa entidade desse usuário
            return __('Usuário');
        } else {
            return __('Usuários');
        }
    }
    public static function getNavigationLabel(): string
    {
        if (auth()->user()->hasRole('common')) {
            //Busca todos os dados dessa entidade desse usuário
            return __('Seu perfil');
        } else {
            return __('Todos Usuários');
        }
    }

}
