<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        $bank = [];        
        
        for ($i = 0; $i < 100; $i++) {
            
            $object_id = $faker->numberBetween(1, 253);
            $type = $faker->randomElements(['personal','professional']);
            $namebank = $faker->randomElements([
                'Banco do Brasil (BB)',
                'Caixa Econômica Federal (CEF)',
                'Banco Bradesco',
                'Banco Itaú',
                'Banco Santander'
            ]);

            $bank['name_bank'] = $namebank[0];
            $bank['name_agency'] = $faker->name();
            $bank['number_acoount'] = $faker->bankAccountNumber();
            $bank['name_manager'] = $faker->name();
            $bank['email_manager'] = $faker->email();
            $bank['client_since'] = $faker->date('Y-m-d');
            $bank['credit_approved'] = $faker->randomFloat(2, 20, 30000);
            $bank['name_credit_card1'] = $faker->name();
            $bank['name_credit_card2'] = $faker->name();
            $bank['limit_credit_card1'] = $faker->randomFloat(2, 20, 30000);
            $bank['limit_credit_card2'] = $faker->randomFloat(2, 20, 30000);
            $bank['object_id'] = $object_id;
            $bank['object_type'] = $type[0];
            \App\Models\Bank::create($bank);
        }
    }
}
