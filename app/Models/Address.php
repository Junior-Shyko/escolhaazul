<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'cep',
        'address', 
        'number',
        'complement',
        'neighborhood', 
        'city', 
        'UF',
        'object_id',
        'object_type',
        'user_id'
    ];
}
