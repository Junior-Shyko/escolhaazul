<?php

namespace App\Filament\Resources\PhoneResource\Pages;

use App\Filament\Resources\PhoneResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPhone extends ViewRecord
{
    protected static string $resource = PhoneResource::class;
    protected static ?string $title = 'Contato Telefônico';
    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make()
            ->label('Editar Contato'),
        ];
    }
}
