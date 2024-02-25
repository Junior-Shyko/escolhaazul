<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        $prop = [];

        for ($i = 0; $i < 250; $i++) {

            $object_id = $faker->numberBetween(1, 273);
            $type = $faker->randomElements(['personal','professional','legal']);
            $financed = $faker->randomElements(['sim','nao']);

            $prop['value'] = $faker->randomFloat(2, 20, 30000);
            $prop['financed'] = $financed[0];
            $prop['registration'] = $faker->name();
            $prop['registry'] = $faker->name();
            $prop['object_id'] = $object_id;
            $prop['object_type'] = $type[0];


            \App\Models\Property::create($prop);
        }
    }
}
