<?php

namespace App\Filament\Resources\RealStateResource\Pages;

use App\Filament\Resources\RealStateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRealState extends EditRecord
{
    protected static string $resource = RealStateResource::class;
    protected static ?string $title = 'Imobiliária';
    protected ?string $subheading = 'Edite essa referência imobiliária';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
