<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    use HasFactory;

    protected $fillable = [
        'profession',
        'activity',
        'name_bussiness',
        'cnpj',
        'employment_relationship',
        'admission_date',
        'function',
        'contact_person',
        'email',
        'salary',
        'other_rents',
        'other_income_source',
        'object_id',
        'object_type'
    ];
}
