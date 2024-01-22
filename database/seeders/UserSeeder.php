<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')

        ]);

        $admin->assignRole('admin');

        $usuario = User::create([
            'name' => 'usuario',
            'last_name' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('usuario')
        ]);
        $usuario->assignRole('$usuario');
    }
}
