<?php

namespace App\Filament\Resources\VehicleResource\Pages;

use App\Filament\Resources\VehicleResource;
use App\Http\Repository\Helpers;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreateVehicle extends CreateRecord
{
    protected static string $resource = VehicleResource::class;
    protected static ?string $title = 'Veículo';

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
