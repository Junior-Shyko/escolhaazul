<?php

namespace App\Filament\Resources\RentalDataResource\Pages;

use App\Filament\Resources\RentalDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRentalData extends EditRecord
{
    protected static string $resource = RentalDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
