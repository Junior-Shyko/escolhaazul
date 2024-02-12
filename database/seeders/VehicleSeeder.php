<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        $veih = [];

        for ($i = 0; $i < 170; $i++) {

            $object_id = $faker->numberBetween(1, 273);
            $type = $faker->randomElements(['personal','professional','legal']);
            $object_id = $faker->numberBetween(1, 273);
            $financed = $faker->randomElements(['Sim','Não']);
            $veih['branch'] = $faker->name();
            $veih['model'] = $faker->word();
            $veih['year'] =  $faker->date('Y');
            $veih['plate'] = $faker->randomNumber(8, true);
            $veih['financed'] = $financed[0];
            $veih['financial'] = $faker->name();
            $veih['object_id'] = $object_id;
            $veih['object_type'] = $type[0];

            \App\Models\Vehicle::create($veih);
        }
    }
}
