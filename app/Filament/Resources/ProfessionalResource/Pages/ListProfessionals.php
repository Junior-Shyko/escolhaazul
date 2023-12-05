<?php

namespace App\Filament\Resources\ProfessionalResource\Pages;

use App\Filament\Resources\ProfessionalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfessionals extends ListRecords
{
    protected static string $resource = ProfessionalResource::class;
    protected static ?string $title = 'Profissional';
    protected ?string $subheading = 'Dado profissional';

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
