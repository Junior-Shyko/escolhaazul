<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $superAdmin = Role::where('name', 'superAdmin')->first();
       $permissionSuperAdmin = Permission::all();
       //Atribuindo todas as permissoes ao superAdmin
        $superAdmin->syncPermissions($permissionSuperAdmin);

        $dmin = Role::where('name', 'admin')->first();
        $permissionAdmin = Permission::whereIn('name', [
            'access_admin',
            'user_read',
            'user_create',
            'user_update',
            'property_read',
            'property_create',
        ])->get();
        $dmin->syncPermissions($permissionAdmin);

        $manager = Role::where('name', 'manager')->first();
        $permissionManager = Permission::whereIn('name', [
            'access_admin',
            'user_read',
            'user_create',
            'property_read',
            'property_create',
        ])->get();
        $manager->syncPermissions($permissionManager);

        $common = Role::where('name', 'common')->first();
        $permissionCommon = Permission::whereIn('name', [
            'access_admin',
            'user_read',
            'user_update',
        ])->get();
        $common->syncPermissions($permissionCommon);

    }
}
