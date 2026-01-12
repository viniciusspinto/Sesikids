<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //verifica se o usuario é o papel admin
        if(!Role::where('name', 'admin')->first()){
            $admin = Role::create([
                'name' => 'admin',
            ]);

            $admin->givePermissionTo([
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
            ]);
        }

        //verifica se o usuario é o papel professor

        if(!Role::where('name', 'professor')->first()){
            $professor = Role::create([
                'name' => 'professor',
            ]);

            $professor->givePermissionTo([
                
            ]);
        }
    }
}
