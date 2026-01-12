<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'admin01@gmail.com')->first()) {
            $admin = User::create([
                'name' => 'Admin',
                'email' => 'admin01@gmail.com',
                'password' => Hash::make('admin01', [
                    'rounds' => 12,
                ]),
                'image' => null,
            ]);

            $admin->assignRole('admin');
    }

    if (!User::where('email', 'professor@gmail.com')->first()) {
            $professor = User::create([
                'name' => 'Professor',
                'email' => 'professor@gmail.com',
                'password' => Hash::make('123456', [
                    'rounds' => 12,
                ]),
                'image' => null,
            ]);

            $professor->assignRole('professor');
    }
}
}