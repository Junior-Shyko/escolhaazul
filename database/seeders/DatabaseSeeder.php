<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bank;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\DataPersonalSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//         \App\Models\User::factory(16)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
//            RoleSeeder::class,
//            PermissionSeeder::class
            // RentalData::class
            // DataPersonalSeeder::class
            // AddressSeeder::class
            // PhoneSeeder::class
            // BankSeeder::class
            // PropertySeeder::class
            VehicleSeeder::class
        ]);
    }
}
