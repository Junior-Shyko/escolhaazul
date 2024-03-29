<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guarantor extends Model
{
    use HasFactory;

    protected $fillable = [
       'name',
       'email',
       'accept',
       'object_type',
       'object_id',
       'user_id'
    ];
}
