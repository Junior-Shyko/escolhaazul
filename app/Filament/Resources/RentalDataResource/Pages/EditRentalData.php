<?php

namespace App\Filament\Resources\RentalDataResource\Pages;

use App\Filament\Resources\RentalDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Widgets\StatsOverviewWidget;
// use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class EditRentalData extends EditRecord
{
    protected static string $resource = RentalDataResource::class;

    protected static ?string $title = 'Editar Proposta';


    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    // protected function getHeaderWidgets(): array
    // {
    //     return [
    //         StatsOverviewWidget::class
    //     ];
    // }

}
