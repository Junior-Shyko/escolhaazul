<?php
//ARQUIVO CRIADO EM 31/08/2016 AS 12:00 POR Junior Oliveira
namespace EscolhaAzul;

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

	
}
