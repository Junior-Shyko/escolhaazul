<?php

namespace App\Filament\Resources\PhoneResource\Pages;

use App\Filament\Resources\PhoneResource;
use App\Http\Repository\Helpers;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreatePhone extends CreateRecord
{
    protected static string $resource = PhoneResource::class;
    protected static ?string $title = 'Cadastrar dados telefônico';
    protected ?string $subheading = 'Informe o seu contato telefônico';

    protected function getCreatedNotification(): ?Notification
    {
        return Helpers::customNotification(
            'success',
            'Sucesso',
            'Telefone criado com sucesso!',
            'heroicon-s-check-circle',
            'success'
        );

    }
}
