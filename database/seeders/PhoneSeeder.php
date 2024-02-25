<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        $phone = [];


        for ($i = 0; $i < 210; $i++) {
            $date = $faker->dateTimeThisYear('+12 months');
            $userId = $faker->numberBetween(1, 273);
            $object_id = $faker->numberBetween(1, 273);
            $type = $faker->randomElements(['personal','professional','User']);
            $phone['number'] = $faker->cellphoneNumber();
            $phone['object_id'] = $object_id;
            $phone['object_type'] = $type[0];
            $phone['user_id'] = $userId;
            $phone['created_at'] = $date;
            $phone['updated_at'] = $date;
            \App\Models\Phone::insert($phone);
        }
    }
}
