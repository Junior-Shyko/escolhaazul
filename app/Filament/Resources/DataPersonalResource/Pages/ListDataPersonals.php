<?php

namespace App\Filament\Resources\DataPersonalResource\Pages;

use App\Filament\Resources\DataPersonalResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDataPersonals extends ListRecords
{
    protected static string $resource = DataPersonalResource::class;
    protected static ?string $title = 'Dados Pessoais';
    protected ?string $subheading = 'Dados pessoais do usuário';

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }
}
