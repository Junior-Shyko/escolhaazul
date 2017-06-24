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
                
			    $id_user = $request['legal_id_user']; 
			    $input = $request->all();
	            //RETIRANDO OS INDICES DO ARRAY PARA NÃO SER REGISTRADO NA TABELA VISTORIA
	            $input = $request->except('_token', 'primeira_pj');
                 \DB::enableQueryLog();
	            legal::where('legal_id', $id)->update($input); 

                $proposal = Legal::find($id); 
                //PESQUISANDO O USUARIO PARA ENVIAR E-MAIL
                $user = DB::table('users')->where('id', $id_user)->get();
                // DISPARANDO PARA O USUÁRIO SE EXISTIR SE NÃO DISPARA PARA O EMAIL PADRÃO
               if(!empty($user)){
                $caminho = "http://espindolaimobiliaria.com.br/ea";
            
                Mail::send('email.email_administrator', ['user' => $user, 'proposal' => $proposal , 'caminho' => $caminho], function ($m) use ($user, $proposal, $caminho) {
                   
                     $m->to($user[0]->email, $user[0]->name)->subject('NOVA PROPOSTA LOCAÇÃO PESSOA FÍSICA');
                     $m->cc("excelencesoft@gmail.com", 'Equipe Espindola');
                     $m->cc("fabiano@espindola.imb.br", 'Equipe Espindola');
                });

               }else{
                
                $caminho = "http://espindolaimobiliaria.com.br/ea";
            
                Mail::send('email.email_administrator', ['proposal' => $proposal , 'caminho' => $caminho], function ($m) use ($proposal, $caminho) {
                   
                     $m->to('fabiano@espindola.imb.br','Equipe Espindola')->subject('NOVA PROPOSTA LOCAÇÃO PESSOA FÍSICA');
                     $m->cc("excelencesoft@gmail.com", 'Equipe Espindola');
                 
                });
               }
               // return response()->json(['mensagem' => 'success']);
			    return \DB::getQueryLog();
			    
			}elseif(array_key_exists("segunda_pj", $request->all()))
			{
				$request['legal_reference_banking_account']	    = Function_generic::moeda($request['legal_reference_banking_account']);
				$request['legal_reference_banking_limit1']      = Function_generic::moeda($request['legal_reference_banking_limit1']);
			    $request['legal_reference_banking_limit2']      = Function_generic::moeda($request['legal_reference_banking_limit2']);
			    $request['legal_reference_banking_app1']        = Function_generic::moeda($request['legal_reference_banking_app1']);
			    $request['legal_reference_banking_app2']        = Function_generic::moeda($request['legal_reference_banking_app2']);
			    $request['legal_reference_bens_value']          = Function_generic::moeda($request['legal_reference_bens_value']);
			    $request['legal_reference_bens_value2']         = Function_generic::moeda($request['legal_reference_bens_value2']);
			    $request['legal_reference_vehicle_value']       = Function_generic::moeda($request['legal_reference_vehicle_value']);
			    $request['legal_reference_vehicle_value2']      = Function_generic::moeda($request['legal_reference_vehicle_value2']);
                $request['legal_reference_charge_value_quota']  = Function_generic::moeda($request['legal_reference_charge_value_quota']);
                $request['legal_reference_charge_value_quota2'] = Function_generic::moeda($request['legal_reference_charge_value_quota2']);

                $request['legal_reference_charge_begin_contract']   = Function_generic::DataBRtoMySQL($request['legal_reference_charge_begin_contract']);
                $request['legal_reference_charge_begin_contract2']  = Function_generic::DataBRtoMySQL($request['legal_reference_charge_begin_contract2']);
                $request['legal_reference_banking_client_begin']    = Function_generic::DataBRtoMySQL($request['legal_reference_banking_client_begin']);
                
                
			    $input = $request->all();

	            //RETIRANDO OS INDICES DO ARRAY PARA NÃO SER REGISTRADO NA TABELA VISTORIA
	            $input = $request->except('_token', 'segunda_pj');
                \DB::enableQueryLog();
	            legal::where('legal_id', $id)->update($input); 
                 return \DB::getQueryLog();
                //return response()->json(['mensagem' => 'success']);
			
            }elseif(array_key_exists("terceira_pj", $request->all()))
            {
                $id = $request['legal_id'];
                $request['legal_status']    = "Nova";
                $request['legal_location_complete'] = Carbon::now();
                
                $input = $request->all();
                $input = $request->except('_token','terceira_pj','compoeRenda_conjuge' , 'type_proposal');

                Legal::where('legal_id', $id)->update($input); 
                $proposal = Legal::find($id); 
               
                if(!$request['legal_guarantor_type'] == null){
                    //FIADOR PESSOA FÍSICA
                    //VERIFICANDO SE É PESSOA FÍSICA OU PESSOA JURÍDICA
                    if($request['legal_guarantor_cpf_cnpj'] == "Pessoa Física")
                    {
                        //VERIRICANDO SE FOI OPTADO PARA ENVIAR
                        if($request['legal_guarantor_type'] == "enviar_fiador"){
                            $nome_fiador = $proposal->legal_guarantor_name;
                            $type = "Pessao Jurídica"; 
                            Mail::send('email.email_fiador', ['proposal' => $proposal, 'nome_fiador' => $nome_fiador , 'type' => $type], function ($m) use ( $proposal, $nome_fiador, $type ) {                   
                                $m->to($proposal->legal_guarantor_email, $proposal->legal_guarantor_name)->subject('SOLICITAÇÃO DE CADASTRO PARA LOCAÇÃO');
                                $m->cc("excelencesoft@gmail.com", 'Equipe Espindola');
                            });
                        }

                    }elseif($request['legal_guarantor_cpf_cnpj'] == "Pessoa Jurídica")
                    {
                        //VERIRICANDO SE FOI OPTADO PARA ENVIAR
                        if($request['legal_guarantor_type'] == "enviar_fiador"){
                            // return $request['legal_guarantor_type'];
                            $nome_fiador = $proposal->legal_guarantor_name;
                            $type = "Pessao Jurídica"; 
                            Mail::send('email.email_fiador', ['proposal' => $proposal, 'nome_fiador' => $nome_fiador , 'type' => $type], function ($m) use ( $proposal, $nome_fiador, $type ) {                   
                                $m->to($proposal->legal_guarantor_email, $proposal->legal_guarantor_name)->subject('SOLICITAÇÃO DE CADASTRO PARA LOCAÇÃO');
                                $m->cc("excelencesoft@gmail.com", 'Equipe Espindola');
                            });
                        }

                    } 

                }

                 if(!$request['legal_guarantor_type2'] == null){
                    //FIADOR PESSOA FÍSICA
                    //VERIFICANDO SE É PESSOA FÍSICA OU PESSOA JURÍDICA
                    if($request['legal_guarantor_cpf_cnpj2'] == "Pessoa Física")
                    {
                        //VERIRICANDO SE FOI OPTADO PARA ENVIAR
                        if($request['legal_guarantor_type2'] == "enviar_fiador2"){
                            $nome_fiador = $proposal->legal_guarantor_name2; 
                            $type = "Pessao Jurídica"; 
                            Mail::send('email.email_fiador', ['proposal' => $proposal, 'nome_fiador' => $nome_fiador , 'type' => $type], function ($m) use ( $proposal, $nome_fiador, $type ) {                    
                                $m->to($proposal->legal_guarantor_email2, $proposal->legal_guarantor_name2)->subject('SOLICITAÇÃO DE CADASTRO PARA LOCAÇÃO');
                                $m->cc("excelencesoft@gmail.com", 'Equipe Espindola');
                            });
                        }
                    }elseif($request['legal_guarantor_cpf_cnpj2'] == "Pessoa Jurídica")
                    {
                        //VERIRICANDO SE FOI OPTADO PARA ENVIAR
                        if($request['legal_guarantor_type2'] == "enviar_fiador"){
                            $nome_fiador = $proposal->legal_guarantor_name2;
                            $type = "Pessao Jurídica"; 
                            Mail::send('email.email_fiador', ['proposal' => $proposal, 'nome_fiador' => $nome_fiador , 'type' => $type], function ($m) use ( $proposal, $nome_fiador, $type ) {                   
                                $m->to($proposal->legal_guarantor_email2, $proposal->legal_guarantor_name2)->subject('SOLICITAÇÃO DE CADASTRO PARA LOCAÇÃO');
                                $m->cc("excelencesoft@gmail.com", 'Equipe Espindola');
                            });
                        }
                    }                      
                }
                // ENVIO PARA LOCATÁRIOS
                 if(!$request['legal_occupant_type'] == null){
                    //FIADOR PESSOA FÍSICA
                    //VERIFICANDO SE É PESSOA FÍSICA OU PESSOA JURÍDICA
                    if($request['legal_occupant_cpf'] == "Pessoa Física")
                    {
                        //VERIRICANDO SE FOI OPTADO PARA ENVIAR
                        if($request['legal_occupant_type'] == "Enviar_locatario"){
                            $nome_fiador = $proposal->legal_occupant_name; 
                            $type = "Pessao Jurídica"; 
                            Mail::send('email.email_fiador', ['proposal' => $proposal, 'nome_fiador' => $nome_fiador , 'type' => $type], function ($m) use ( $proposal, $nome_fiador, $type ) {                    
                                $m->to($proposal->legal_occupant_email, $proposal->legal_occupant_name)->subject('SOLICITAÇÃO DE CADASTRO PARA LOCAÇÃO');
                                $m->cc("excelencesoft@gmail.com", 'Equipe Espindola');
                            });
                        }
                    }                    
                }
                 if(!$request['legal_occupant_type2'] == null){
                    //FIADOR PESSOA FÍSICA
                    //VERIFICANDO SE É PESSOA FÍSICA OU PESSOA JURÍDICA
                    if($request['legal_occupant_cpf2'] == "Pessoa Física")
                    {
                        //VERIRICANDO SE FOI OPTADO PARA ENVIAR
                        if($request['legal_occupant_type2'] == "Enviar_locatario2"){
                            $nome_fiador = $proposal->legal_occupant_name2; 
                            $type = "Pessao Jurídica"; 
                            Mail::send('email.email_fiador', ['proposal' => $proposal, 'nome_fiador' => $nome_fiador , 'type' => $type], function ($m) use ( $proposal, $nome_fiador, $type ) {                    
                                $m->to($proposal->legal_occupant_email2, $proposal->legal_occupant_name2)->subject('SOLICITAÇÃO DE CADASTRO PARA LOCAÇÃO');
                                $m->cc("excelencesoft@gmail.com", 'Equipe Espindola');
                            });
                        }
                    }                    
                } // FIM - ENVIO PARA LOCATÁRIOS
                $caminho = "espindolaimobiliaria.com.br/ea/";
                $type = "Pessoa Jurídica";
               
                Mail::send('email.email_proponent', [ 'proposal' => $proposal, 'caminho' => $caminho, 'type' => $type], function ($m) use ($proposal, $caminho, $type) {  
                    if($type == "Pessoa Física")
                    {
                      $email = $proposal->proposal_email;
                      $nome = $proposal->proposal_name;
                    }   
                    elseif($type == "Pessoa Jurídica")
                    {
                      $email = $proposal->legal_location_email;
                      $nome = $proposal->legal_location_name_corporation;
                    }       
                     $m->to($email, $nome)->subject('PROPOSTA ENVIADO COM SUCESSO');
                     $m->cc("excelencesoft@gmail.com", 'Equipe Espindola');
                });
                return response()->json($proposal);
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
