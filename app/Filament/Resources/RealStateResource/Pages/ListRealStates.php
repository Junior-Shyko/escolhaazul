<?php

namespace App\Filament\Resources\RealStateResource\Pages;

use App\Filament\Resources\RealStateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRealStates extends ListRecords
{
    protected static string $resource = RealStateResource::class;
    protected static ?string $title = 'Imobiliária';
    protected ?string $subheading = 'Referência imobiliária';

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
