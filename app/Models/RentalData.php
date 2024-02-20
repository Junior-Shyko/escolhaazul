<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function bank(): HasMany
    {
        return $this->hasMany(Bank::class, 'object_id');
    }

    public function vehicle(): HasMany
    {
        return $this->hasMany(Vehicle::class, 'object_id');
    }

    public function professional(): HasMany
    {
        return $this->hasMany(Professional::class, 'object_id');
    }
    public function real(): HasMany
    {
        return $this->hasMany(RealState::class, 'object_id');
    }
    // Relação com referencia comercial
    public function commercial(): HasMany
    {
        return $this->hasMany(Commercial::class, 'object_id');
    }
    //Relação com referencia pessoal
    public function referencePersonal(): HasMany
    {
        return $this->hasMany(Personal::class, 'object_id');
    }

    public function properties(): HasMany
    {
        return $this->hasMany(Property::class, 'object_id');
    }
    public function guarantor(): HasMany
    {
        return $this->hasMany(Guarantor::class, 'object_id');
    }

}
