<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commercial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'cnpj',
        'email', 
        'phone_fixed',
        'phone_mobile',
        'object_id',
        'object_type'
    ];
}
