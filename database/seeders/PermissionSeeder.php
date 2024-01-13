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
        //User
        DB::table('permissions')->insert([
            'name' => 'access_admin',
            'guard_name' => 'web',
            'description' => 'Acessa o painel admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'user_read',
            'guard_name' => 'web',
            'description' => 'Ler dados do usuário',
        ]);
        DB::table('permissions')->insert([
            'name' => 'user_create',
            'guard_name' => 'web',
            'description' => 'Cria usuário',
        ]);
        DB::table('permissions')->insert([
            'name' => 'user_update',
            'guard_name' => 'web',
            'description' => 'Atualiza Usuário',
        ]);
        DB::table('permissions')->insert([
            'name' => 'user_delete',
            'guard_name' => 'web',
            'description' => 'Exclui Usuário',
        ]);
        //Role
        DB::table('permissions')->insert([
            'name' => 'role_read',
            'guard_name' => 'web',
            'description' => 'Acessa o painel admin',
        ]);
        DB::table('permissions')->insert([
            'name' => 'role_create',
            'guard_name' => 'web',
            'description' => 'Ler os papeis ou nível de usuário',
        ]);
        DB::table('permissions')->insert([
            'name' => 'role_update',
            'guard_name' => 'web',
            'description' => 'Cria papel/nivel de usuário',
        ]);
        DB::table('permissions')->insert([
            'name' => 'role_delete',
            'guard_name' => 'web',
            'description' => 'Edita papel/nivel de usuário',
        ]);
         //Permission
        DB::table('permissions')->insert([
            'name' => 'permission_read',
            'guard_name' => 'web',
            'description' => '',
        ]);
       
        DB::table('permissions')->insert([
            'name' => 'permission_create',
            'guard_name' => 'web',
            'description' => '',
        ]);
        DB::table('permissions')->insert([
            'name' => 'permission_update',
            'guard_name' => 'web',
            'description' => '',
        ]);
        DB::table('permissions')->insert([
            'name' => 'permission_delete',
            'guard_name' => 'web',
            'description' => '',
        ]);
        //Property
        DB::table('permissions')->insert([
            'name' => 'property_read',
            'guard_name' => 'web',
            'description' => 'Visualiza Propriedade',
        ]);
        DB::table('permissions')->insert([
            'name' => 'property_create',
            'guard_name' => 'web',
            'description' => 'Cria bens ou propriedade',
        ]);
    }
}
