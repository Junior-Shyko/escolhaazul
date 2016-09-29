<?php

namespace EscolhaAzul\Http\Controllers;

use Illuminate\Http\Request;
use EscolhaAzul\Proposal;
use EscolhaAzul\User;
use EscolhaAzul\Function_generic;
use EscolhaAzul\Legal;
use DB, Session;
use Mail;

use Carbon\Carbon;
use EscolhaAzul\Http\Requests;

class LegalController extends Controller
{
    //
    public function update(Request $request)
    {
    	# created in 2016-09-08  15:03 by Junior Oliveira
    	if($request->ajax())
    	{
    		$id = $request['legal_id'];
    		if (array_key_exists("primeira_pj", $request->all())) {
			    $request['legal_location_rent_proposed']   		= Function_generic::moeda($request['legal_location_rent_proposed']);
			    $request['legal_location_value_condominium']	= Function_generic::moeda($request['legal_location_value_condominium']);
			    $request['legal_location_value_location']   	= Function_generic::moeda($request['legal_location_value_location']);
			    $request['legal_location_capital_social']   	= Function_generic::moeda($request['legal_location_capital_social']);
			    $request['legal_location_salary']        		= Function_generic::moeda($request['legal_location_salary']);
			    $request['legal_location_other_rent']      		= Function_generic::moeda($request['legal_location_other_rent']);

			    //CONFIGURANDO AS DATAS
                $request['legal_location_data_constitution'] = Function_generic::DataBRtoMySQL($request['legal_location_data_constitution']);

                $request['legal_location_representative_date_brith'] = Function_generic::DataBRtoMySQL($request['legal_location_representative_date_brith']);

                $request['legal_location_representative_date_brith2'] = Function_generic::DataBRtoMySQL($request['legal_location_representative_date_brith2']);
                
			     
			    $input = $request->all();
	            //RETIRANDO OS INDICES DO ARRAY PARA NÃO SER REGISTRADO NA TABELA VISTORIA
	            $input = $request->except('_token', 'primeira_pj');
	            legal::where('legal_id', $id)->update($input); 
                
                return response()->json(['mensagem' => 'success']);
			    // $request['legal_reference_charge_value_quota']	= Function::moeda($request['legal_reference_charge_value_quota']);
			    // $request['legal_reference_charge_value_quota2']	= Function::moeda($request['legal_reference_charge_value_quota2']);
			    
			}elseif(array_key_exists("segunda_pj", $request->all()))
			{
				$request['legal_reference_banking_account']	= Function_generic::moeda($request['legal_reference_banking_account']);
				$request['legal_reference_banking_limit1']  = Function_generic::moeda($request['legal_reference_banking_limit1']);
			    $request['legal_reference_banking_limit2']  = Function_generic::moeda($request['legal_reference_banking_limit2']);
			    $request['legal_reference_banking_app1']    = Function_generic::moeda($request['legal_reference_banking_app1']);
			    $request['legal_reference_banking_app2']    = Function_generic::moeda($request['legal_reference_banking_app2']);
			    $request['legal_reference_bens_value']      = Function_generic::moeda($request['legal_reference_bens_value']);
			    $request['legal_reference_bens_value2']     = Function_generic::moeda($request['legal_reference_bens_value2']);
			    $request['legal_reference_vehicle_value']   = Function_generic::moeda($request['legal_reference_vehicle_value']);
			    $request['legal_reference_vehicle_value2']  = Function_generic::moeda($request['legal_reference_vehicle_value2']);

			    $input = $request->all();
	            //RETIRANDO OS INDICES DO ARRAY PARA NÃO SER REGISTRADO NA TABELA VISTORIA
	            $input = $request->except('_token', 'segunda_pj');
	            legal::where('legal_id', $id)->update($input); 
                
                return response()->json(['mensagem' => 'success']);
			
            }elseif(array_key_exists("terceira_pj", $request->all()))
            {
                $id = $request['legal_id'];
                $request['legal_status']    = "Nova";
                $request['legal_location_complete'] = Carbon::now();
                
                $input = $request->all();
                $input = $request->except('_token','terceira_pf','compoeRenda_conjuge' , 'type_proposal');

                Legal::where('legal_id', $id)->update($input); 
                $proposal = Legal::find($id); 
            }
    	}
    }

    public function upload(Request $request)
    {
    	# code...
    	if($request->ajax())
        {
            switch ($request['type_proposal']) {
                case 'proposta-pf':
                    $type_profile = 'Inquilino';
                    break;
                case 'proposta-pj':
                    $type_profile = 'Jurídico';
                    break;
                case 'cadastro-pf':
                    $type_profile = 'Fiador';
                    break;
                 case 'cadastro-pj':
                    $type_profile = 'Fiador';
                    break;          
                default:
                    $type_profile = 'Inquilino';
                    break;
            }

           $id_proposal = $request['legal_id'];
            $tot_array = count($_FILES["img_photo"]["name"]);
            for ($i=0; $i < $tot_array; $i++) { 

                $tmp_name = $_FILES["img_photo"]["tmp_name"][$i];
                $name =  time(). '_'. $_FILES["img_photo"]["name"][$i];
                //echo "arquivo ".$cont." - ".$name."<br>";
                $uploadFile = 'public/img/upload/'. basename($name);   

                move_uploaded_file($tmp_name, $uploadFile);

                //CADASTRANDO NO BANCO
                $files_ambience =   DB::table('files')->insert([
                    'files_name' => $name, 
                    'files_id_proposal' => $id_proposal ,
                    'files_date' => Carbon::now() ,
                    'files_profile' => $type_profile 
                   
                ]); 

            }
             return response()->json(['messagem' => 'success']);
        }
    }

    public function message($type, $email)
    {
       return Function_generic::message($type, $email);
    }
}
