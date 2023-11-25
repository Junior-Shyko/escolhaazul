<?php

namespace App\Filament\Resources\PermissionResource\Pages;

use App\Filament\Resources\PermissionResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePermissions extends ManageRecords
{
    protected static string $resource = PermissionResource::class;
    protected static ?string $title = 'Permissões';
    protected ?string $subheading = 'Lista de permissões de uso dos usuários';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
