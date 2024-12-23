<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immobile extends Model
{
    use HasFactory;

    protected $fillable = [
        'salesCentralCode',
        'propertyCode',
        'propertyTitle',
        'model',
        'propertyType',
        'state',
        'city',
        'neighborhood',
        'address',
        'number',
        'zipCode',
        'rentalPrice',
        'condominiumPrice',
        'propertyIptPrice'
    ];
}
