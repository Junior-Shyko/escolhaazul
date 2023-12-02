<?php

namespace App\Filament\Resources\RentalDataResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\RentalDataResource;

class ListRentalData extends ListRecords
{
    protected static string $resource = RentalDataResource::class;
    protected static ?string $title = 'Lista de Proposta';
    protected ?string $subheading = 'Todas as propostas Pessoa Física e Pessoa Jurídica';


    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make()
            // ->label('Criar'),
        ];
    }

    public function getTitle(): string
    {
        if(Auth::user()->hasRole('common'))
        {
            return 'Suas propostas';
        }else{
            return 'Propostas';
        }
    }

    public function getSubheading(): string
    {
        if(Auth::user()->hasRole('common'))
        {
            return 'Lista de suas propostas enviadas, Pessoa Física e Pessoa Jurídica';
        }else{
            return 'Lista de propostas Pessoa Física e Pessoa Jurídica';
        }
    }

}
