<?php

namespace App\Filament\Resources\PhoneResource\Pages;

use App\Filament\Resources\PhoneResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPhone extends EditRecord
{
    protected static string $resource = PhoneResource::class;
    protected static ?string $title = 'Edição';
    protected ?string $subheading = 'Edite o contato telefônico';
    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
