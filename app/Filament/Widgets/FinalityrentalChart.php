<?php

namespace App\Filament\Widgets;

use App\Models\RentalData;
use Filament\Widgets\ChartWidget;

class FinalityrentalChart extends ChartWidget
{
    protected static ?string $heading = 'Em construção...';
    protected static ?string $maxHeight = '280px';
    protected function getData(): array
    {
        $res = RentalData::where('finality', 'Residencial')->count();
        $com = RentalData::where('finality', 'Comercial')->count();
        $tem = RentalData::where('finality', 'Temporada')->count();

        if(!auth()->user()->hasRole('common')) {
            self::$heading = "Finalidade de locação";
            return [
                'datasets' => [
                    [
                        'label' => 'Finalidade',
                        'data' => [$res, $com, $tem],
                        'backgroundColor' => [
                            '#9cc4e4',
                            '#3a89c9',
                            '#1b325f'
                        ],
                        'hoverOffset' => 4
                    ],

                ],
                'labels' => ['Residencial', 'Comercial', 'Temporada']
            ];
        }

        return [];

    }

    protected function getType(): string
    {
        return 'doughnut';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'display' => false,
                ],
                'x' => [
                    'display' => false,
                ],
            ],
        ];
    }
}
