<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        $address = [];
        $type = $faker->randomElements(['address_personal','professional','professional','property']);
        for ($i = 0; $i < 200; $i++) {
            $userId = $faker->numberBetween(1, 273);
            $address['cep'] = $faker->randomNumber(8, true);
            $address['address'] = $faker->streetName();
            $address['number'] = $faker->randomNumber();
            $address['complement'] = $faker->stateAbbr();
            $address['neighborhood'] = $faker->streetName() ;
            $address['city'] =$faker->city() ;
            $address['UF'] = $faker->cityPrefix();
            $address['object_id'] = $userId;
            $address['object_type'] = $type[0];
            $address['user_id'] = $userId;
            \App\Models\Address::create($address);
        }
    }
}
