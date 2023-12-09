<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Filament\Actions\ActionGroup;
use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Resources\Pages\EditRecord;


class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;
    protected static ?string $title = 'Dados do usuário';
    protected ?string $subheading = 'Dados relacionado a conta de acesso.';


    protected function getHeaderActions(): array
    {
        return [
           
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            
        ];
    }
}
