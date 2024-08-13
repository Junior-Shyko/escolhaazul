<?php

namespace App\app\Http\Service;

use App\Models\Immobile;
use Exception;
use http\Env\Response;
use function count;
use function dd;
use function dump;
use function simplexml_load_file;

class ImmobileService
{
    /**
     * Create a new class instance.
     */
    static public function readXmlAndSaveToDatabase()
    {
        //Endpoint xml
        $filePath = 'https://assets.praedium.com.br/76636bSsOil7GfOk5qz/imovelweb/iw_ofertas.xml';
        //Limpando os registros da tabela
        self::deleteRowsTable();
        //Lendo arquivo xml
        $xml = simplexml_load_file($filePath);
        $allImmobiles =  [];
        foreach ($xml->Imoveis->Imovel as $immobile) {
            $cond = (string) $immobile->PrecoCondominio;
            if($cond == "" || $cond == null){
                $cond = 0.00;
            }
            $iptu = (string) $immobile->PrecoIptuImovel;
            if($iptu == "" || $iptu == null){
                $iptu = 0.00;
            }
            $allImmobiles['salesCentralCode'] = (string) $immobile->CodigoCentralVendas;
            $allImmobiles['propertyCode'] = (string) $immobile->CodigoImovel;
            $allImmobiles['propertyTitle'] = (string) $immobile->TituloImovel;
            $allImmobiles['model'] = (string) $immobile->Modelo;
            $allImmobiles['propertyType'] = (string) $immobile->TipoImovel;
            $allImmobiles['state'] = (string) $immobile->UF;
            $allImmobiles['city'] = (string) $immobile->Cidade;
            $allImmobiles['neighborhood'] = (string) $immobile->Bairro;
            $allImmobiles['address'] = (string) $immobile->Endereco;
            $allImmobiles['number'] = (string) $immobile->Numero;
            $allImmobiles['zipCode'] = (string) $immobile->CEP;
            $allImmobiles['rentalPrice'] = (string) $immobile->PrecoLocacao;
            $allImmobiles['condominiumPrice'] = $cond;
            $allImmobiles['propertyIptPrice'] = $iptu;
            try {
                Immobile::create($allImmobiles);
            }catch (Exception $e)
            {
                dump($e->getMessage());
            }
        }
    }

    //Excluindo todos os dados da tabela
    public function deleteRowsTable() : void
    {
        $immobiles = Immobile::all();
        if( count($immobiles) > 0 ){
            try {
                Immobile::getQuery()->delete();
            }catch (Exception $e)
            {
                dump($e->getMessage());
            }
        }
    }
}
