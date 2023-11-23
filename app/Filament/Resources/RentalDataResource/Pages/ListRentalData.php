<?php

namespace App\Filament\Resources\RentalDataResource\Pages;

use App\Filament\Resources\RentalDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRentalData extends ListRecords
{
    protected static string $resource = RentalDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
