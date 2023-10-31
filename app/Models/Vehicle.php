<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch', 
        'model',
        'year',
        'plate',
        'financed',
        'financial', 
        'value',
        'object_id',
        'object_type'
    ];
}
