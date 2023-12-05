<?php

namespace App\Models;

use App\Casts\MoneyCast;
use App\Models\RentalData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $casts = [
        'value' => MoneyCast::class,
    ];
    
    protected $fillable = [
        'value',
        'financed', 
        'registration', 
        'registry',
        'object_id',
        'object_type'
    ];

    public function rentalData(): BelongsTo
    {
        return $this->belongsTo(RentalData::class, 'object_id');
    }
}
