<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealState extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'creci',
        'email',
        'phone_fixed',
        'phone_mobile',
        'object_id',
        'object_type', 
    ];
}
