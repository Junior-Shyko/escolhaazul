<?php

namespace App\Filament\Resources\RentalDataResource\Widgets;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use App\Http\Repository\RentalDataRepository;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class RentalDataOverview extends BaseWidget
{
    
    //9f61e35f133516f5299a900345d32745 token para api cpfcnpj
    protected function getStats(): array
    {
        $userForm = RentalDataRepository::getUserDataPersonal(13);
        $user = User::find(13);
        $cpf = self::cleanCpfCnpj($user->dataPersonal()->first()->cpf);
        $response = Http::get('https://api.cpfcnpj.com.br/5ae973d7a997af13f0aaf2bf60e65803/13/00000000000');
        $res = json_decode($response->body());
        $level = self::getDangerProponent(1);
        return [
            Stat::make('Risco Serasa', $level['number'])
            ->description($level['desc'])
            ->descriptionIcon($level['icon'])
            ->color($level['color'])
            ->url('google.com', true),
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

    public static function cleanCpfCnpj($number): string
    {
     $valor = preg_replace('/[^0-9]/', '', $number);
     return $valor;
    }

    public static function getDangerProponent($number): array
    {
        $description = '';
        $icon = '';
        $color = '';
        switch ($number) {
            case '1':
                $description = 'Baixo de inadimplência.';
                $icon = 'heroicon-m-arrow-trending-up';
                $color = 'success';
                break;
            
            case '2':
                $description = 'Moderado de inadimplência.';
                $icon = 'heroicon-o-scale';
                $color = 'info';
                break;
            
            case '3':
                $description = 'Alto de inadimplência.';
                $icon = 'heroicon-m-arrow-trending-down';
                $color = 'danger';
                break;
            case '4':
                $description = 'Altíssimo de inadimplência.';
                $icon = 'heroicon-m-lock-closed';
                $color = 'danger';
                break;        
        }

        return [
            'number' => $number,
            'desc' => $description,
            'icon' => $icon,
            'color' => $color
        ];
    }


}
