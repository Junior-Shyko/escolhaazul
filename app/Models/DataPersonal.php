<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    
    
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


}
