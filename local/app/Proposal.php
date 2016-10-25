<?php
//ARQUIVO CRIADO EM 31/08/2016 AS 12:00 POR Junior Oliveira
namespace EscolhaAzul;

use Mail;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    //
    protected $primaryKey = 'proposal_id';
	protected $table = 'proposal';
	public $timestamps = false;

	protected $fillable = [
		'proposal_email' , 'proposal_name' , 'proposal_phone_cel1' , 'date_cadastre' , 'proposal_status'
	];

	static public function send_adm($type , $user , $proposal){
		// DISPARANDO PARA O USUÁRIO SE EXISTIR SE NÃO DISPARA PARA O EMAIL PADRÃO
       
       	if($type == "proposal_pf"){
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
       	}//FIM PROPOSSAL PF

       	if($type == "guarantor_pf"){
       		
	       	if(!empty($user)){
		        $caminho = "http://espindolaimobiliaria.com.br/ea";
		    
		        Mail::send('email.email_adm_guarantor', ['user' => $user, 'proposal' => $proposal , 'caminho' => $caminho], function ($m) use ($user, $proposal, $caminho) {
		           
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
       	}//FIM PROPOSSAL PF
	}
	
}
