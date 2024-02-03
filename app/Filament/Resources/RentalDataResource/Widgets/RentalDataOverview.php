<?php

namespace App\Filament\Resources\RentalDataResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class RentalDataOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Nível', '1')
            ->description('Baixo risco de inadimplência')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
            Stat::make('Renda Desejada', '5.652,99')
            ->description('Soma de 3x o valor do aluguel')
            ->color('info'),
            Stat::make('Todas as Rendas', '6.037,65')
            ->description('Soma de toda a renda declarada')
            ->color('info'),
            Stat::make('Pre-Análise', 'Positivo')
            ->description('Uma boa proposta')
            ->descriptionIcon('heroicon-m-check-badge')
            ->color('success'),
        ];
    }
}
