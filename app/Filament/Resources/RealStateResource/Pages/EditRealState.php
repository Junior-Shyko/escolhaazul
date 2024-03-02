<?php

namespace App\Filament\Resources\RealStateResource\Pages;

use App\Filament\Resources\RealStateResource;
use App\Http\Repository\Helpers;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditRealState extends EditRecord
{
    protected static string $resource = RealStateResource::class;
    protected static ?string $title = 'Imobiliária';
    protected ?string $subheading = 'Edite essa referência imobiliária';

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
            'Dados alterado com sucesso!',
            'heroicon-s-check-circle',
            'success'
        );

    }
}
