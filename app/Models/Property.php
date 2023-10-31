<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'financed', 
        'registration', 
        'registry',
        'object_id',
        'object_type'
    ];
}
