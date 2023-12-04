<?php

namespace App\Models;

use App\Models\RentalData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function rentalData(): BelongsTo
    {
        return $this->belongsTo(RentalData::class, 'object_id');
    }
}
