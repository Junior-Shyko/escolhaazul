<?php
declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentalData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        $finality = '';
        $warrantyType = '';
        $ps = '';
        $status = '';
        $date_finish = null;
        $rental = [];


        for ($i = 0; $i < 273; $i++) {
            $userId = $faker->numberBetween(1, 273);
            $date = $faker->dateTimeThisYear('+12 months');
            if( !($i % 5) ) {
                $finality = 'Residencial';
                $warrantyType  = 'Caução';
                $status = 'incompleta';
            }else{
                $finality = 'Comercial';
                $warrantyType  = 'Fiador';
                $ps = $faker->realText($maxNbChars = 200, $indexSize = 2);
                $status = 'finalizada';
                $date_finish = $faker->date('Y-m-d');
            };

            $rental['refImmobile'] = $faker->sentence;
            $rental['typeRentalUser'] = 'Pessoa Física';
            $rental['finality'] = $finality;
            $rental['term'] = $faker->randomDigit();
            $rental['warrantyType'] = $warrantyType;
            $rental['proposedValue'] = $faker->randomFloat(2, 120, 30000);
//            $rental['iptu'] =  $faker->randomFloat(2);
            $rental['ps'] = $ps;
            $rental['user_id'] = $userId;
            $rental['object_id'] = $userId;
            $rental['object_type'] = 'personal';
            $rental['status'] = $status;
            $rental['date_finish'] = $date_finish;
            $rental['created_at'] = $date;
            $rental['updated_at'] = $date;


            \App\Models\RentalData::insert($rental);
        }
    }
}
