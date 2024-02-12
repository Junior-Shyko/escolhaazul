<?php

namespace App\Filament\Widgets;

use App\Models\RentalData;
use Filament\Widgets\ChartWidget;

class RentalDataChart extends ChartWidget
{
    protected static ?string $heading = 'Mês a mês das propostas';
    protected static ?string $maxHeight = '280px';

    protected function getData(): array
    {
        //busca todos os meses desse de 2024
        $countMount = [];
        for ($i = 1; $i < 13; $i++)
        {
            $rentalMonth = RentalData::whereMonth('created_at', $i)
                            ->whereYear('created_at', '2024')->count();
            array_push($countMount, $rentalMonth);
        }


        return [
            'datasets' => [
                [
                    'label' => 'Total de proposta',
                    'data' => $countMount,
                    'backgroundColor' => [
                        'rgba(156, 196, 228, 0.2)',
                        'rgba(156, 196, 228, 0.2)',
                        'rgba(58, 137, 201, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)',
                        'rgba(1, 38, 119, 0.2)',
                        'rgba(0, 91, 197, 0.2)',
                        'rgba(0, 180, 252, 0.2)',
                        'rgba(23, 249, 255, 0.2)',
                        'rgba(71, 121, 223, 0.2)'
                    ],
                    'borderColor' => [
                        'rgb(156, 196, 228)',
                        'rgb(156, 196, 228)',
                        'rgb(58, 137, 201)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)',
                        'rgb(1, 38, 119)',
                        'rgb(0, 91, 197)',
                        'rgb(0, 180, 252)',
                        'rgb(23, 249, 255)',
                        'rgb(71, 121, 223)',
                    ],
                ],
            ],

            'labels' => ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
