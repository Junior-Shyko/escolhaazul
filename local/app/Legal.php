<?php
//Created in 2016-08-08 14:22 by Junior Oliveira
namespace EscolhaAzul;

use Illuminate\Database\Eloquent\Model;

class Legal extends Model
{
    //
    protected $primaryKey = 'legal_id';
	protected $table = 'legal';
	public $timestamps = false;

	protected $fillable = [
		'legal_location_name_corporation' , 'legal_location_phone' , 'legal_location_email' , 
		'legal_date_cadastre'
	];

}
