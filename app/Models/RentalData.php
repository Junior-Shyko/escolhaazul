<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RentalData extends Model
{
    use HasFactory;

    protected $table = 'rental_datas';
    
    protected $fillable = [
        'refImmobile',
        'typeRentalUser',
        'finality',
        'term',
        'warrantyType',
        'proposedValue',
        'currentCondominiumValue',
        'iptu',
        'ps',
        'user_id',
        'status',
        'date_finish'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function terms(): BelongsTo
    {
        return $this->belongsTo(Term::class);
    }
}
