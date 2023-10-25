<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPersonal extends Model
{
    use HasFactory;

    protected $fillable = [
        'sex',
        'birthDate',
        'organConsignor',
        'cpf',
        'nationality',
        'EducationLevel',
        'user_id',
        'identity',
        'naturality',
        'maritalStatus',
        'number_dependents'
    ];
}