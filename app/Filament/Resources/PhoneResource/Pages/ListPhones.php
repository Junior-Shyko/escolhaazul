<?php

namespace App\Filament\Resources\PhoneResource\Pages;

use App\Filament\Resources\PhoneResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPhones extends ListRecords
{
    protected static string $resource = PhoneResource::class;
    protected static ?string $title = 'Contato Telefônico';
    protected ?string $subheading = 'Todos os contatos telefônicos dos proponentes';

    protected function getHeaderActions(): array
    {
        return [
          
        ];
    }
}
