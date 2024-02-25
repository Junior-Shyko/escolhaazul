<?php
declare(strict_types=1);
namespace Database\Seeders;

use App\Models\DataPersonal;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataPersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');
        $dataPersonal = [];
        for ($i = 0; $i < 273; $i++) {
            $userId = $faker->numberBetween(1, 273);
            $date = $faker->dateTimeThisYear('+12 months');
            $sex = $faker->randomElements(['Masculino', 'Feminino']);
            $org = $faker->randomElements(['SSP','AGU','COREN','CRAS','CREA','CRECI' ]);
            $est = $faker->randomElements(['Brasileiro', 'Estrangeiro']);
            $ed = $faker->randomElements([
                'Ensino médio completo','Superior completo (ou graduação)','Ensino médio incompleto','Mestrado','Doutorado'
            ]);
            $nat = $faker->randomElements(['Fortaleza','Jeri','Caucaia','Paraiba','Bahia']);
            $mat = $faker->randomElements(['Casado','Desquitado','Divorciado','Solteiro','Separado']);

            $dataPersonal['sex'] = $sex[0];
            $dataPersonal['birthDate'] = $faker->date('Y-m-d');
            $dataPersonal['organConsignor'] = $org[0];
            $dataPersonal['cpf'] = $faker->cpf();
            $dataPersonal['nationality'] = $est[0];
            $dataPersonal['EducationLevel'] = $ed[0];
            $dataPersonal['user_id'] = $userId;
            $dataPersonal['identity'] = $faker->numberBetween(20000, 100000);
            $dataPersonal['naturality'] = $nat[0];
            $dataPersonal['maritalStatus'] = $mat[0];
            $dataPersonal['number_dependents'] = $faker->numberBetween(1, 5);
            $dataPersonal['created_at'] = $date;
            $dataPersonal['updated_at'] = $date;
            \App\Models\DataPersonal::insert($dataPersonal);
        }
    }
}
