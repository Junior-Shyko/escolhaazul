<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insertOrIgnore([
            //User
            ['name' => 'access_admin', 'guard_name' => 'web', 'description' => 'Acessa o painel admin'],
            ['name' => 'user_read', 'guard_name' => 'web', 'description' => 'Ler dados do usuário'],
            ['name' => 'user_create', 'guard_name' => 'web', 'description' => 'Cria usuário'],
            ['name' => 'user_update', 'guard_name' => 'web', 'description' => 'Atualiza Usuário'],
            ['name' => 'user_delete', 'guard_name' => 'web', 'description' => 'Exclui Usuário'],
            //Role
            ['name' => 'role_read', 'guard_name' => 'web', 'description' => 'Acessa o painel admin'],
            ['name' => 'role_create', 'guard_name' => 'web', 'description' => 'Ler os papeis ou nível de usuário'],
            ['name' => 'role_update', 'guard_name' => 'web', 'description' => 'Cria papel/nivel de usuário'],
            ['name' => 'role_delete', 'guard_name' => 'web', 'description' => 'Edita papel/nivel de usuário'],
            //Permission
            ['name' => 'permission_read', 'guard_name' => 'web', 'description' => ''],
            ['name' => 'permission_create', 'guard_name' => 'web', 'description' => ''],
            ['name' => 'permission_update', 'guard_name' => 'web', 'description' => ''],
            ['name' => 'permission_delete', 'guard_name' => 'web', 'description' => ''],
            //Property
            ['name' => 'property_read', 'guard_name' => 'web', 'description' => 'Visualiza Propriedade'],
            ['name' => 'property_create', 'guard_name' => 'web', 'description' => 'Cria bens ou propriedade'],
        ]);
    }
}
