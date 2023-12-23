<?php

namespace App\Filament\Resources\PropertyResource\Pages;

use App\Filament\Resources\PropertyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProperties extends ListRecords
{
    protected static string $resource = PropertyResource::class;
    protected static ?string $title = 'Bens/Propriedade';
    protected ?string $subheading = 'Referência de bens ou propriedade';

    protected function getHeaderActions(): array
    {
        return [
//             Actions\CreateAction::make()
//                ->label('Cadastrar Bens'),
        ];
    }
}
