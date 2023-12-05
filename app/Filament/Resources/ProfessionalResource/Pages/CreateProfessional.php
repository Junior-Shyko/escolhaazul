<?php

namespace App\Filament\Resources\ProfessionalResource\Pages;

use App\Filament\Resources\ProfessionalResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProfessional extends CreateRecord
{
    protected static string $resource = ProfessionalResource::class;
    protected static ?string $title = 'Profissional';
    // protected ?string $subheading = 'Adicione seus dados profissionais';
}
