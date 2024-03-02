<?php

namespace App\Filament\Resources\RealStateResource\Pages;

use App\Filament\Resources\RealStateResource;
use App\Http\Repository\Helpers;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateRealState extends CreateRecord
{
    protected static string $resource = RealStateResource::class;
    protected static ?string $title = 'Imobiliária';
    protected ?string $subheading = 'Adicione sua referência imobiliária';

    protected function getCreatedNotification(): ?Notification
    {
        return Helpers::customNotification(
            'success',
            'Sucesso',
            'Veículo criado com sucesso!',
            'heroicon-s-check-circle',
            'success'
        );

    }
}
