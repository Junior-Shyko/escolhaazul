<?php

namespace App\app\Http\Service;

use App\Models\Immobile;
use function dump;
use function simplexml_load_file;

class ImmobileService
{
    protected $filePath;
    /**
     * Create a new class instance.
     */
    public function __construct($filePath)
    {
        $this->filePath = (string) $filePath;
    }

    public function readXmlAndSaveToDatabase()
    {
        $xml = simplexml_load_file($this->filePath);
//            dump($xml->Imoveis);
        // Converte o XML em um array para facilitar a manipulação
//            $data = json_decode(json_encode((array)$xml), true);
//
//            // Itera sobre os dados e salva no banco
        $allImmobiles =  [];
        foreach ($xml->Imoveis->Imovel as $immobile) {
//            dd((string) $immobile->PrecoIptuImovel);
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
            Immobile::create($allImmobiles);
        }

        try {
            // Carrega o XML do arquivo

//
//            return true;

        } catch (\Exception $e) {
            // Lida com erros
            return false;
        }
    }
}
