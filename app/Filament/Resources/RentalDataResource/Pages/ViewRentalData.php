<?php

namespace App\Filament\Resources\RentalDataResource\Pages;

use App\Filament\Resources\RentalDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewRentalData extends ViewRecord
{
    protected static string $resource = RentalDataResource::class;

    protected static ?string $title = 'Dados da proposta';
    protected ?string $subheading = 'Informações sobre a proposta';

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            RentalDataResource\Widgets\RentalDataOverview::class,
        ];
    }
}
