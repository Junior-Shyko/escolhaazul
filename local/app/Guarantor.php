<?php

namespace EscolhaAzul;

use Illuminate\Database\Eloquent\Model;


class Guarantor extends Model
{
    protected $primaryKey = 'guarantor_id';
	protected $table = 'guarantor';
	public $timestamps = false;

	protected $fillable = [
		'guarantor_name' , 'guarantor_cpf' , 'guarantor_filiacion' , 'date_cadastre'
	];
}
