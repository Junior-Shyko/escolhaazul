<?php

namespace App\Filament\Resources\ProfessionalResource\Pages;

use App\Filament\Resources\ProfessionalResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfessional extends EditRecord
{
    protected static string $resource = ProfessionalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
