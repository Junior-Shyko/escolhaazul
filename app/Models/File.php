<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'object_id',
        'object_type'
    ];

    public function rental(): BelongsTo
    {
        return $this->belongsTo(RentalData::class, 'object_id');
    }

}
