<?php

namespace App\Filament\Widgets;

use App\Models\RentalData;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Support\Colors\Color;
class FeedbackOverview extends BaseWidget
{
    protected static ?string $heading = 'Blog Posts';
    protected function getStats(): array
    {
        $user = User::all()->count();
        $rentalPF = RentalData::where('typeRentalUser', 'Pessoa Física')->count();
        $rentalPJ = RentalData::where('typeRentalUser', 'Pessoa Jurídica')->count();
        $incomplet = RentalData::where('status', 'incompleta')->count();
        return [
            Stat::make('Usuários', $user)
                ->description('Total de usuários')
                ->descriptionIcon('heroicon-m-user-group')
                ->color(Color::hex('#0c498c')),

            Stat::make('Proposta PF', $rentalPF)
                ->description('Total Prop. Pessoa Física')
                ->descriptionIcon('heroicon-s-document-duplicate')
                ->color(Color::hex('#0c4b8c')),

            Stat::make('Proposta PJ', $rentalPJ)
                ->description('Total Pro. Pessoa Jurídica')
                ->descriptionIcon('heroicon-m-document-duplicate')
                ->color(Color::hex('#2484ec')),
            Stat::make('Propostas Incompletas', $incomplet)
                ->description('Total de prop. incompletas')
                ->descriptionIcon('heroicon-s-arrow-up-on-square-stack')
                ->color(Color::hex('#86bcf4')),

        ];
    }

}
