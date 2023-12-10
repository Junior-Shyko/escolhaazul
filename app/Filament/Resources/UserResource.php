<?php

namespace App\Filament\Resources;

use Filament\Panel;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\DataPersonal;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Navigation\NavigationGroup;
use Filament\Tables\Actions\ActionGroup;
use App\Http\Repository\RentalDataRepository;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Usuários';
 
    protected static ?string $navigationLabel = 'Todos usuários';

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
                ->relationship(name: 'roles', titleAttribute: 'name')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->searchable(),
                TextColumn::make('email'),
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
                    Tables\Actions\DeleteAction::make(),
                    Action::make('Editar Dados Pessoais')
                        ->icon('heroicon-m-pencil-square')
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
}
