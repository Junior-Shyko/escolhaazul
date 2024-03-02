<?php

namespace App\Filament\Resources\PropertyResource\Pages;

use App\Filament\Resources\PropertyResource;
use App\Http\Repository\Helpers;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
class CreateProperty extends CreateRecord
{
    protected static string $resource = PropertyResource::class;
    protected static ?string $title = 'Criar propriedade';
    protected ?string $subheading = 'Adicionar informações sobre o seu bens';

    protected function getFormActions(): array
    {
        return [
            Actions\CreateAction::make('saveAnother')
                ->label('Salvar ')
                ->action('saveAnother')
                ->keyBindings(['mod+shift+s'])
                ->color('primary'),
            $this->getCancelFormAction(),
        ];
    }

    public function saveAnother()
    {
        $this->create();
        $this->redirect('../rental-datas');
        return Helpers::customNotification(
            'success',
            'Sucesso',
            'Dados Salvo com sucesso!',
            'heroicon-s-check-circle',
            'success'
        );
    }

}
