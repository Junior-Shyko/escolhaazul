<?php

namespace App\Models;

use App\Casts\MoneyCast;
use App\Models\RentalData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    use HasFactory;

    protected $casts = [
        'value' => MoneyCast::class,
    ];

    protected $fillable = [
        'branch', 
        'model',
        'year',
        'plate',
        'financed',
        'financial', 
        'value',
        'object_id',
        'object_type'
    ];

    /**
     * Função que retorna todos os veiculos de uma proposta
     *
     * @return array
     */
    static public function getVehicleToProposal(): array
    {
        //Buscando a proposta do usuario logado
        $rental = auth()->user()->rentalData()->get();                    
        $vehicle = [];
        //Consultando a proposta e relacionando com o veiculo
        foreach ($rental as $key => $value) {
            $proposal = RentalData::find($value->id);                       
            $vehicle = $proposal->vehicle()->get();                        
        }
        $ids = [];
        //Preenchendo um array
        foreach ($vehicle as $key => $value) {
            array_push($ids, $value->id);
            // $ids = $ids . intval($value->id).',';
        }
     
        // $vehicles = substr($ids,0,-1);
        // dump($vehicles);
        return $ids;
    }

    // public function rentalData(): HasMany
    // {
    //     return $this->hasMany(RentalData::class, 'object_id');
    // }

    public function rentalData(): BelongsTo
    {
        return $this->belongsTo(RentalData::class, 'object_id');
    }

    // public function rentalDataUser()
    // {
    //     return RentalData::where('user_id', auth()->)
    // }

}
