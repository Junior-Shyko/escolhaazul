<?php

namespace App\Http\Repository;

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

        return $newField
    }


}