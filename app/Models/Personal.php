<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'cpf',
        'relationship', 
        'phone_fixed',
        'phone_mobile',
        'object_id',
        'object_type'
    ];
}
