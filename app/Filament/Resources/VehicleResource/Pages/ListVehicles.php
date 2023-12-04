<?php

namespace App\Filament\Resources\VehicleResource\Pages;

use App\Filament\Resources\VehicleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVehicles extends ListRecords
{
    protected static string $resource = VehicleResource::class;

    protected static ?string $title = 'Veículo';
    protected ?string $subheading = 'Listagem';

    protected function getHeaderActions(): array
    {
        return [
            //Removendo o botão de criar mas mantendo a rota
            // Actions\CreateAction::make(),
        ];
    }

}
