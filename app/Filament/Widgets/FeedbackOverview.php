<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Support\Colors\Color;
class FeedbackOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $user = User::all()->count();
        return [
            Stat::make('Usuários', $user)
                ->description('Total de usuários')
            ->color(Color::hex('#0c498c')),
            Stat::make('Proposta PF', '21%')
                ->description('Total de usuários')
                ->color(Color::hex('#0c4b8c')),
            Stat::make('Cadastro PF', '3:12')
                ->description('Total de usuários')
                ->color(Color::hex('#2484ec')),
            Stat::make('Proposta PJ', '3:12')
                ->description('Total de usuários')
                ->color(Color::hex('#86bcf4')),

        ];
    }
}
