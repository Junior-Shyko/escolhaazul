<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageRoles extends ManageRecords
{
    protected static string $resource = RoleResource::class;
    protected static ?string $title = 'Papeis';
    protected ?string $subheading = 'Lista de cada papel de um usuário';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
