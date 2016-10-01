<?php
//ARQUIVO CRIADO EM 31/08/2016 AS 11:51 POR Junior Oliveira
namespace EscolhaAzul\Http\Controllers;

use Illuminate\Http\Request;
use EscolhaAzul\Proposal;
use EscolhaAzul\User;
use EscolhaAzul\Guarantor;

use EscolhaAzul\Legal;
use DB, Session;
use Mail;
use EscolhaAzul\Function_generic;


use Carbon\Carbon;

use Illuminate\Http\RedirectResponse;

use EscolhaAzul\Http\Requests;

class ProposalController extends Controller
{

     public function check_proposal(Request $request )
    {
        $type  = $request['tipo'];
        $name  = $request['user_name'];
        $email = $request['user_email'];
        $phone = $request['user_phone'];
      

        if($type == "Pessoa Física")
        {
          //CONSULTA SE TEM VALORES E SE TIVER FAZ A PÁGINAÇÃO CONVERTENDO EM STRING PARA ANALISAR SE É VAZIA OU NÃO
            $verify_proposal = DB::table('proposal')->where('proposal_email', '=' ,$email)->get();
            //SE NÃO FOR VAZIA, ENTRA NO IF E FAZ A PAGINAÇAO
            if(!empty($verify_proposal))
            {
                $proposal = DB::table('proposal')->where('proposal_email', '=' ,$email)->orderBy('proposal_send' , 'asc')->paginate(4);
                //PARA VERIFICAR O PDF
                $resource_pdf = "http://espindolaimobiliaria.com.br/ea/";
                return view('site.list_proposal', compact('type','name','email','phone', 'proposal' , 'resource_pdf' ));
            }//CASO NÃO.... VAI PARA UMA NOVA PROPOSTA
            elseif(empty($verify_proposal)){

                 $proposta = Proposal::create([
                    'proposal_name'=>$name,'proposal_phone_cel1'=>$phone,'proposal_email'=>$email,'date_cadastre'=>Carbon::now(), 'proposal_status' =>  'Incompleto'
                    ]);  
                return redirect('nova-proposta/'.base64_encode($proposta->proposal_id).'/tipo/proposta-pf'); 
            }  

        }else{

            $proposta_legal = Legal::create([
                            'legal_location_name_corporation'=>$name,'legal_location_phone'=>$phone,
                            'legal_location_email'=>$email,
                            'legal_date_cadastre'=>Carbon::now()
                        ]);
            
            if($proposta_legal)
               
                return redirect('nova-proposta/'.base64_encode($proposta_legal->legal_id).'/tipo/proposta-pj');

        }       

        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //Created in 31-08-2016 14:50 by Junior Oliveira
        //recebendo os dados da lista de propostas ou do formulario inicial
        $type   = $request['type'];
        $email  = $request['email'];
        $name   = $request['name'];
        $phone  = $request['phone'];
       
        if($type == "Pessoa Física"){
            
            $proposta = Proposal::create([
                'proposal_name'=>$name,'proposal_phone_cel1'=>$phone,'proposal_email'=>$email,'date_cadastre'=>Carbon::now(), 'proposal_status' =>  'Incompleto'
                ]);
      
            if($proposta)
               
                return redirect('nova-proposta/'.base64_encode($proposta->proposal_id).'/tipo/proposta-pf');

        }elseif($type == "Pessoa Jurídica"){

            $proposta_legal = Legal::create([
                            'legal_location_name_corporation'=>$name,'legal_location_phone'=>$phone,
                            'legal_location_email'=>$email,
                            'legal_date_cadastre'=>Carbon::now()
                        ]);
            
            if($proposta_legal)
               
                return redirect('nova-proposta/'.base64_encode($proposta_legal->legal_id).'/tipo/proposta-pj');
        }

        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function new_proposal($id, $type, Request $request)
    {
        //

       if($type == 'proposta-pf')
       {
        $id = base64_decode($id);
        //RECEBENDOO TODOS USUÁRIOS QUE RECEBEM PROPOSTAS
        $user = User::where('receive_proposal', 1)->get();
       
        $proposal = Proposal::where('proposal_id', $id)->get();
        return view('proposal.index', compact('proposal', 'user' , 'type'));

       }elseif($type == 'proposta-pj')
       {
        $prefix = 'legal';
        $id = base64_decode($id);
         //RECEBENDOO TODOS USUÁRIOS QUE RECEBEM PROPOSTAS
        $user = User::where('receive_proposal', 1)->get();
      
        $proposal = Legal::where($prefix.'_id', $id)->get();
      
        return view('proposal.pj.index', compact('proposal', 'user' , 'type'));
       }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Created in 2016-09-13 21:18 by Junior Oliveira
        $id = $request['proposal_id'];

        try {
            Proposal::destroy($id);
            //dd($id);
            return redirect('ver-proposta?tipo='.$request['type'].'&user_name='.$request['name'].'&user_email='.$request['email'].'&user_phone'.$request['phone'])->with('success_message' , 'Proposta EXCLUIDA com sucesso');
        } catch (Exception $e) {

            return redirect('ver-proposta?tipo='.$request['type'].'&user_name='.$request['name'].'&user_email='.$request['email'].'&user_phone'.$request['phone'])->with('error_message' , $e);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->ajax()){
            $id = $request['proposal_id'];
            $redirect = $request['third_step'];
            
           

            $input = $request->all();
            //RETIRANDO OS INDICES DO ARRAY PARA NÃO SER REGISTRADO NA TABELA VISTORIA
           
            
            //VERIFICANDO QUAL ETAPA PARA MASCARA DATAS
            if(array_key_exists("primeira_pf", $request->all())){
                $id_user  = $request['proposal_id_user']; 

                $request['proposal_date_brith'] = Function_generic::DataBRtoMySQL($request['proposal_date_brith']);

                $request['proposal_admission_date'] = Function_generic::DataBRtoMySQL($request['proposal_admission_date']) ;

                $request['proposal_rent_proposed']      = Function_generic::moeda($request['proposal_rent_proposed']);
                $request['proposal_value_condominium']  = Function_generic::moeda($request['proposal_value_condominium']);
                $request['proposal_value_iptu']         = Function_generic::moeda($request['proposal_value_iptu']);
                $request['proposal_salary']             = Function_generic::moeda($request['proposal_salary']);
                $outras_rendas         = Function_generic::moeda($request['proposal_rent_other']);
                $request['proposal_rent_other'] = $outras_rendas;
                $request['proposal_status'] = "Incompleto";

                $input = $request->except('_token', 'etapa', 'primeira_pf', 'segunda_pf','terceira_pf','compoeRenda_conjuge', 'third_step' , 'type_proposal');
             
                Proposal::where('proposal_id', $id)->update($input);
                //PESQUISANDO O USUARIO PARA ENVIAR E-MAIL
                $user = DB::table('users')->where('id', $id_user)->get();
                //PESQUISANDO A PROPOSTA PARA ENVIAR E-MAIL
                $proposal = Proposal::find($id);

                //return response()->json(['message' => 'success']);
               if(!empty($user)){
                $caminho = "http://espindolaimobiliaria.com.br/ea";
            
                //  Mail::send('email.email_administrator', ['user' => $user, 'proposal' => $proposal , 'caminho' => $caminho], function ($m) use ($user, $proposal, $caminho) {
                   
                //      $m->to($user[0]->email, $user[0]->name)->subject('NOVA PROPOSTA LOCAÇÃO PESSOA FÍSICA');
                //      $m->cc("excelencesoft@gmail.com", 'Equipe Espindola');
                //      $m->cc("fabiano@espindola.imb.br", 'Equipe Espindola');
                // });
               }

                return response()->json(['message' => 'success']);
            }

            if(array_key_exists("segunda_pf", $request->all())){

                $request['proposal_conjuge_date_brith'] = Function_generic::DataBRtoMySQL($request['proposal_conjuge_date_brith']) ;

                $request['proposal_conjuge_admission_date'] = Function_generic::DataBRtoMySQL($request['proposal_conjuge_admission_date']) ;

                $request['proposal_banking_client_begin'] = Function_generic::DataBRtoMySQL($request['proposal_banking_client_begin']) ;

                $request['proposal_immobile_value']     = Function_generic::moeda($request['proposal_immobile_value']);
                $request['proposal_immobile_value2']    = Function_generic::moeda($request['proposal_immobile_value2']);
                $request['proposal_vehicle_value']      = Function_generic::moeda($request['proposal_vehicle_value']);
                $request['proposal_vehicle_value2']     = Function_generic::moeda($request['proposal_vehicle_value2']);
                $request['proposal_banking_limit1']     = Function_generic::moeda($request['proposal_banking_limit1']);
                $request['proposal_banking_limit2']     = Function_generic::moeda($request['proposal_banking_limit2']);
                $request['proposal_banking_app']        = Function_generic::moeda($request['proposal_banking_app']);
                $request['proposal_banking_app2']       = Function_generic::moeda($request['proposal_banking_app2']);
                 $request['proposal_status']            = "Incompleto";

                $input = $request->except('_token', 'etapa', 'primeira_pf', 'segunda_pf','terceiraW_pf','compoeRenda_conjuge', 'third_step' , 'type_proposal');


                Proposal::where('proposal_id', $id)->update($input);
                //PESQUISANDO O USUARIO PARA ENVIAR E-MAIL
                
                //PESQUISANDO A PROPOSTA PARA ENVIAR E-MAIL
                $proposal = Proposal::find($id);
                return response()->json(['message' => 'success']);
            }


             if(array_key_exists("terceira_pf", $request->all()))
            {

                //dd($request->all());
                $id = $request['proposal_id'];
                $request['proposal_status']    = "Nova";
                $request['proposal_completed'] = Carbon::now();
                $enviar = $request['proposal_guarantor_send'];
                $cadastrar = $request['proposal_guarantor_cadastre'];

                $input = $request->all();
                $input = $request->except('_token', 'etapa', 'primeira_pf', 'segunda_pf','terceira_pf','compoeRenda_conjuge', 'third_step' , 'type_proposal' , 'proposal_guarantor_send' , 'proposal_guarantor_cadastre' , 'img_photo');

                Proposal::where('proposal_id', $id)->update($input); 
                $proposal = Proposal::find($id); 
             

                //ENVIANDO PROPOSTA PARA O EMAIL COM A VARIAVEL $proposal  
                //DISPAROS DE EMAILS               
                if(!$request['proposal_guarantor_type'] == null){
                    if($request['proposal_guarantor_type'] == "enviar_fiador"){
                        $nome_fiador = $proposal->proposal_guarantor_name; 
                        Mail::send('email.email_fiador', ['proposal' => $proposal, 'nome_fiador' => $nome_fiador], function ($m) use ( $proposal, $nome_fiador ) {                   
                            $m->to($proposal->guarantor_email, $proposal->proposal_guarantor_name)->subject('SOLICITAÇÃO DE CADASTRO PARA LOCAÇÃO');
                            $m->cc("excelencesoft@gmail.com", 'Equipe Espindola');
                        });

                    }
                }
                if(!$request['proposal_guarantor_type2'] == null){
                    if($request['proposal_guarantor_type2'] == "enviar_fiador2"){
                        $nome_fiador = $proposal->proposal_guarantor_name2;
                        Mail::send('email.email_fiador', ['proposal' => $proposal, 'nome_fiador' => $nome_fiador], function ($m) use ( $proposal, $nome_fiador ) {                   
                            $m->to($proposal->guarantor_email2, $proposal->proposal_guarantor_name2)->subject('SOLICITAÇÃO DE CADASTRO PARA LOCAÇÃO');
                            $m->cc("excelencesoft@gmail.com", 'Equipe Espindola');
                        });

                    }
                }

                if(!$request['proposal_occupant_type'] == null){
                    if($request['proposal_occupant_type'] == "Enviar_locatario"){
                        $nome_fiador = $proposal->proposal_occupant_name;
                        Mail::send('email.email_fiador', ['proposal' => $proposal, 'nome_fiador' => $nome_fiador], function ($m) use ( $proposal, $nome_fiador ) {                   
                            $m->to($proposal->proposal_occupant_email, $proposal->proposal_occupant_name)->subject('SOLICITAÇÃO DE CADASTRO PARA LOCAÇÃO');
                            $m->cc("excelencesoft@gmail.com", 'Equipe Espindola');
                        });
                    }
                }
                
               if(!$request['proposal_occupant_type'] == null){
                     if($request['proposal_occupant_type'] == "Enviar_locatario2"){
                        $nome_fiador = $proposal->proposal_occupant_name2;
                        Mail::send('email.email_fiador', ['proposal' => $proposal, 'nome_fiador' => $nome_fiador], function ($m) use ( $proposal, $nome_fiador ) {     @
                                        
                            $m->to($proposal->proposal_occupant_email2, $proposal->proposal_occupant_name2)->subject('SOLICITAÇÃO DE CADASTRO PARA LOCAÇÃO');
                            $m->cc("excelencesoft@gmail.com", 'Equipe Espindola');
                        });

                    }
               }
                
                 $caminho = "http://espindolaimobiliaria.com.br/ea";
                $type = "Pessoa Física";
                Mail::send('email.email_proponent', [ 'proposal' => $proposal, 'caminho' => $caminho, 'type' => $type], function ($m) use ($proposal, $caminho, $type) {  if($type == "Pessoa Física")
                    {
                      $prefixo = "proposal";
                      $email = $proposal->proposal_email;
                      $nome = $proposal->proposal_name;
                    }   
                    elseif($type == "Pessoa Jurídica")
                    {
                      $prefixo = "legal"; 
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
    public function concluded()
    {
        return  view('proposal.concluded');
    }

    public function upload(Request $request)
    {
        # code...
        if($request->ajax())
        {
            //FAZENDO UPLOAD DAS FOTOS
            if(isset($_FILES) && !empty($_FILES)){
                if(array_key_exists("img_photo", $request->all())){
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

                        $id_proposal = $request['id_proposal'];
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
                        }
                 } 
            }

        
        
    }
    
    public function upload_files(Request $request )
    {
        //created in 2016-09-15 12:40 by Junior Oliveira
    //PERFIL DA PROPOSATA PARA SER ADICIONADO NA TABELA DE ARQUIVOS
     switch ($request['type_proposal']) {
          case 'proposta-pf':
              $type_profile = 'Inquilino';
              $campo = "proposal_id";
              break;
          case 'proposta-pj':
              $type_profile = 'Jurídico';
              $campo = "legal_id";
              break;
          case 'cadastro-pf':
              $type_profile = 'Fiador';
              $campo = "guarantor_id";
              break;
           case 'cadastro-pj':
              $type_profile = 'Fiador';
              $campo = "guarantor_legal_id";
              break;          
          default:
              $type_profile = 'Inquilino';
              $campo = "proposal_id";
              break;
      }

       if(isset($_FILES))
        {
        $id_proposal = $request['proposal_id'];
        
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
          return response()->json(['message' => 'success']);
        }
    }
    /*
    *Created in 2016-09-23 14:12 by Junior Oliveira
    *CADASTRO AVULSO DE PROPOSTA DE FIADOR OU LOCATÁRIO ADICIONAL, O USUÁRIO COLOCARÁ O NOME DO PROPONENTE
    */
    public function new_guarantor()
    {
        $guarantor = Guarantor::create([
            'date_cadastre'=>Carbon::now()
        ]);

        return view('proposal.pf.guarantor.index' , compact("guarantor"));
        //return view('proposal.pf.guarantor.index');
    }

    public function guarantor_update(Request $request)
    {
        # Created in 2016-09-23 15:26 by Junior Oliveira
        if($request->ajax())
        {
            $id = $request['guarantor_id'];

            if(array_key_exists("guarantor_pf", $request->all()))
            {
                    
                $request['guarantor_profission_date_admission'] = Function_generic::DataBRtoMySQL($request['guarantor_profission_date_admission']);                
                $request['guarantor_date_brith'] = Function_generic::DataBRtoMySQL($request['guarantor_date_brith']);
                //FORMATANDO MOEDA PARA REAL                
                $request['guarantor_profission_salary']     = Function_generic::moeda($request['guarantor_profission_salary']);
                $request['guarantor_profission_other_rent'] = Function_generic::moeda($request['guarantor_profission_other_rent']);
                
                $input = $request->all();

                $input = $request->except('_token', 'guarantor_pf');

                $guarantor_up = Guarantor::where('guarantor_id', $id)->update($input);
                
                return response()->json(['message' => 'success']);
            }

            if(array_key_exists("guarantor_secound_pf", $request->all()))
			{
                $request['guarantor_banking_limit1']  = Function_generic::moeda($request['guarantor_banking_limit1']);
                $request['guarantor_banking_limit2']  = Function_generic::moeda($request['guarantor_banking_limit2']);
                $request['guarantor_banking_app']     = Function_generic::moeda($request['guarantor_banking_app']);
                $request['guarantor_immobile_value']  = Function_generic::moeda($request['guarantor_immobile_value']);
                $request['guarantor_immobile_value2'] = Function_generic::moeda($request['guarantor_immobile_value2']);
                $request['guarantor_vehicle_value']   = Function_generic::moeda($request['guarantor_vehicle_value']);
                $request['guarantor_vehicle_value2']  = Function_generic::moeda($request['guarantor_vehicle_value2']);

                $request['guarantor_profile_proposal']= "Fiador Pessoa Física";
				
                $input = $request->all();
                $input = $request->except('_token', 'guarantor_secound_pf' , 'rendaConjugeFiador');

                Guarantor::where('guarantor_id', $id)->update($input);
                    
                $guarantor = Guarantor::find($id); 
                
                //DISPARAR O E-MAIL PARA O FIADOR 
                $caminho = "http://espindolaimobiliaria.com.br/ea";

                Mail::send('email.sucesso_email_fiador', [ 'guarantor' => $guarantor, 'caminho' => $caminho], function ($m) use ($guarantor, $caminho){                 
                    $m->to($guarantor->guarantor_email, $guarantor->guarantor_name)->subject('CADASTRO ENVIADO COM SUCESSO');
                    $m->cc("excelencesoft@gmail.com", 'Equipe Espindola');
                });  
                return response()->json($guarantor);
			}
        }
    }

    public function registering_guarantor($id, $type)
    {
        # CREATED IN 2016-09-26 17:40 BY JUNIOR OLIVEIRA
        # UPDATED IN 2016-09-30 14:49
      //O PARAMETRO TYPE É SÓ PARA DEFINIR A CONSULTA NO DB
        $id = base64_decode($id);

        // DEFINENDO O TIPO DE PROPOSATA PARA FAZER A CONSULTA
        // $profile_guarantor * DEFINE SE É UM FIADOR DA UMA PESSOA FISICA OU JURÍDICA
        
        if($type == "pf")
        {
          $proposal = Proposal::where('proposal_id' , '=' , $id)->get();
          $profile_guarantor = "Fiador Pessoa Física";
         
         
        }elseif($type == "pj"){

          $proposal = Legal::where('legal_id' , '=' , $id)->get();
          $profile_guarantor = "Fiador Pessoa Jurídica";
         

        }        
        //CRIANDO UM FIADOR PESSOA FÍSICA
        $guarantor = Guarantor::create([
          'date_cadastre'=>Carbon::now()
        ]);   

        return view('proposal.pf.guarantor.index' , compact("guarantor" , "proposal" , "type"));

    }
}
