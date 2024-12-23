<?php

namespace App\Http\Services;

use App\Http\Repository\ImmobileRepository;
use App\Models\Immobile;
use Illuminate\Http\JsonResponse;
use function dump;
use function env;

class ImmobileService
{
    /**
     * Create a new class instance.
     */
    static function readXmlAndSaveToDatabase() : void
    {
        // Endpoint xml
        $filePath = env('XML_SYNC');
        //Limpando os registros da tabela
        self::deleteRowsTable();
        //Lendo arquivo xml
        $xml = simplexml_load_file($filePath);
        ImmobileRepository::readXmlAndSaveToDatabase($xml);

    }

    //Excluindo todos os dados da tabela
    static public function deleteRowsTable() : JsonResponse
    {
        $immobiles = Immobile::all();

        if( count($immobiles) > 0 ){
            try {
                Immobile::getQuery()->delete();
                return response()->json(['status' => 200]);
            }catch (Exception $e)
            {
                return response()->json(['status' => 500, 'message' => $e->getMessage()]);
            }
        }else{
            return response()->json(['status' => 500]);
        }
    }

    public function returnTesting()
    {
        return true;
    }
}
