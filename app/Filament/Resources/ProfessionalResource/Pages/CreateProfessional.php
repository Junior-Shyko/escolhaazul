<?php

namespace App\Filament\Resources\ProfessionalResource\Pages;

use App\Filament\Resources\ProfessionalResource;
use App\Http\Repository\Helpers;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateProfessional extends CreateRecord
{
    protected static string $resource = ProfessionalResource::class;
    protected static ?string $title = 'Profissional';
    // protected ?string $subheading = 'Adicione seus dados profissionais';

    protected function getCreatedNotification(): ?Notification
    {
        return Helpers::customNotification(
            'success',
            'Sucesso',
            'Dados Profissionais criado com sucesso!',
            'heroicon-s-check-circle',
            'success'
        );

    }
}
