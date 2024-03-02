<?php

namespace App\Http\Repository;

use Filament\Notifications\Notification;

class Helpers {
    //FORMATANDO A DATA PARA PADÃO AMERICANO
    static public function DataBRtoMySQL($DataBR)
    {

        $DataBR = str_replace(array(" – ", "-", " ", " "), " ", $DataBR);
        list($data) = explode(" ", $DataBR);
        return implode("-", array_reverse(explode("/", $data)));
    }

    static public function verifyFieldProposal($fields)
    {
        unset($fields['user_id']);
        unset($fields['proposal_id']);
        $newField = '';
        switch ($fields) {
            case 'proposedValue':
                $newField = self::DataBRtoMySQL($fields);
                break;

            default:
                # code...
                break;
        }

        return $newField;
    }

    /**
     * Função para mostrar as notificações
     * @param $type string
     * @param $title string
     * @param $body string
     * @param $icon string
     * @param $iconCollor string
     * @return Notification|void
     */
    static public function customNotification($type, $title, $body, $icon, $iconCollor)
    {
        switch ($type)
        {
            case 'success':
                return Notification::make()
                    ->success()
                    ->title($title)
                    ->body($body)
                    ->icon($icon)
                    ->iconColor($iconCollor)
                    ->send();
            break;
            case 'warning':
                return Notification::make()
                    ->warning()
                    ->title($title)
                    ->body($body)
                    ->icon($icon)
                    ->iconColor($iconCollor)
                    ->send();
                break;
            case 'danger':
                return Notification::make()
                    ->danger()
                    ->title($title)
                    ->body($body)
                    ->icon($icon)
                    ->iconColor($iconCollor)
                    ->send();
                break;
        }

    }


}
