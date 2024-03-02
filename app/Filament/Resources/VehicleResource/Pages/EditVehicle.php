<?php

namespace App\Filament\Resources\VehicleResource\Pages;

use App\Filament\Resources\VehicleResource;
use App\Http\Repository\Helpers;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditVehicle extends EditRecord
{
    protected static string $resource = VehicleResource::class;
    protected static ?string $title = 'Editar Veículo';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getSavedNotification(): ?Notification
    {
        return Helpers::customNotification(
            'success',
            'Sucesso',
            'Veículo alterado com sucesso!',
            'heroicon-s-check-circle',
            'success'
        );

    }
}
