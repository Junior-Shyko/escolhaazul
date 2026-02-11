<?php

namespace App\Http\Repository;

use App\Models\Immobile;
use Faker\Factory;

class ImmobileRepository
{
    static public function generateFakeImmobiles(int $quantity = 10): array
    {
        $faker = Factory::create('pt_BR');
        $allImmobiles = [];

        for ($i = 0; $i < $quantity; $i++) {
            $allImmobiles[] = [
                'salesCentralCode' => $faker->numerify('CV####'),
                'propertyCode' => $faker->numerify('IM####'),
                'propertyTitle' => $faker->sentence(3),
                'model' => $faker->randomElement(['Apartamento', 'Casa', 'Sobrado', 'Kitnet', 'Cobertura']),
                'propertyType' => $faker->randomElement(['Residencial', 'Comercial', 'Industrial']),
                'state' => $faker->stateAbbr(),
                'city' => $faker->city(),
                'neighborhood' => $faker->streetName(),
                'address' => $faker->streetAddress(),
                'number' => $faker->buildingNumber(),
                'zipCode' => $faker->numerify('########'),
                'rentalPrice' => $faker->randomFloat(2, 500, 10000),
                'condominiumPrice' => $faker->randomFloat(2, 100, 2000),
                'propertyIptPrice' => $faker->randomFloat(2, 50, 500),
            ];
        }

        return $allImmobiles;
    }

    /**
     * Todos os Imóveis
     * @return \Illuminate\Http\JsonResponse
     */
    static public function all()
    {
        return response()->json(Immobile::all());
    }
}
