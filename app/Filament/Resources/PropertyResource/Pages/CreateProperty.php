<?php

namespace App\Filament\Resources\PropertyResource\Pages;

use App\Filament\Resources\PropertyResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProperty extends CreateRecord
{
    protected static string $resource = PropertyResource::class;
    protected static ?string $title = 'Criar propriedade';
    protected ?string $subheading = 'Adicionar informações sobre o seu bens';


}
