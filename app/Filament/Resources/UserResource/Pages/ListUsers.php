<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;
    protected static ?string $title = 'Usuários';
    protected ?string $subheading = 'Lista de todos os usuários';

    protected function getHeaderActions(): array
    {
        if(auth()->user()->hasRole(['manager', 'admin', 'superAdmin'])){
            return [
                Actions\CreateAction::make()
                ->label('Criar Usuário'),
            ];
        }else{
            return [];
        }
    }
}
