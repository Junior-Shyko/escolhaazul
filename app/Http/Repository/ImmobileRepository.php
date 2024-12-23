<?php

namespace App\Http\Repository;

use App\Models\Immobile;
use http\Env\Response;
use function dump;

class ImmobileRepository
{
    static public function readXmlAndSaveToDatabase($xml)
    {
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
                return response()->json(['message' => $e->getMessage()], 500);
            }
        }
    }

    /**
     * Todos os Imóveis
     * @return \Illuminate\Http\JsonResponse
     */
    static public function all()
    {
        return response()->json(Immobile::all());
    }
}
