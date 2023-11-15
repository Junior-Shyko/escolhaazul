<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalData extends Model
{
    use HasFactory;

    protected $table = 'rental_datas';
    
    protected $fillable = [
        'refImmobile',
        'typeRentalUser',
        'finality',
        'term',
        'warrantyType',
        'proposedValue',
        'currentCondominiumValue',
        'iptu',
        'ps',
        'user_id',
        'status',
        'date_finish'
    ];
}
