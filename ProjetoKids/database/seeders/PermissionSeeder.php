<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'cadastrados-user',
            'show-user',
            'edit-user',
            'create-user-login',
            'destroy-user',

            //perfis
            'index-role',
            'create-role',
            'edit-role',
            'destroy-role',
            'role-permission',
            'update-role',
        ];

        foreach ($permissions as $permission) {
            $existingPermission = Permission::where('name', $permission)->first();

            if (!$existingPermission) {
                Permission::create([
                    'name' => $permission,
                    'guard_name' => 'web',
                ]);
            }
        }
    }
}
