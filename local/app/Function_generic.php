<?php
/**
CREATED IN 2016-09-08 15:26 BY JUNIOR OLIVEIRA
CLASSE ONDE VAI CONTER TODAS AS FUNÇÕES E METODOS GENÉRICOS PARA TODAS AS CLASSE QUE HOUVER NECESSIDADE DE USAR
*/
namespace EscolhaAzul;

use Illuminate\Database\Eloquent\Model;

class Function_generic extends Model
{
    
    //formata o valor moeda para guardar no banco
	static public function moeda($get_valor) 
	{
		$source = array('.', ','); 
		$replace = array('', '.');
		$valor = str_replace($source, $replace, $get_valor); //remove os pontos e substitui a virgula pelo ponto
		return $valor; //retorna o valor formatado para gravar no banco
	}

	static public function message($type, $email)
    {
        # code...
        if($type == 'pj')
        {
            return 'pj email: '.$email;
        }
    }

    static public function DataBRtoMySQL( $DataBR ) 
    {
		$DataBR = str_replace(array(" – ","-"," "," "), " ", $DataBR);
		list($data) = explode(" ", $DataBR);
		return implode("-",array_reverse(explode("/",$data))) ;
	}
}
