<?php

namespace App\Filament\Resources\RealStateResource\Pages;

use App\Filament\Resources\RealStateResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRealState extends CreateRecord
{
    protected static string $resource = RealStateResource::class;
    protected static ?string $title = 'Imobiliária';
    protected ?string $subheading = 'Adicione sua referência imobiliária';

    
}
