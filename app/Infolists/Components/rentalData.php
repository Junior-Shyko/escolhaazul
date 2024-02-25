<?php

namespace App\Infolists\Components;

use Filament\Infolists\Components\Entry;

class rentalData extends Entry
{
    protected string $view = 'infolists.components.rental-data';

    protected string $teste = 'Teste aqui';
    public static function getDataRental(): string
    {
        return 'GET DATA RENTAL';
    }
}
