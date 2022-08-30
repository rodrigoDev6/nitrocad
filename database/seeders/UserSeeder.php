<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'telefone' => '21975028324',
            'nivel_id' => 1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
        ]);
        User::create([
            'name' => 'Usuario Padrão',
            'telefone' => '21975028324',
            'nivel_id' => 0,
            'email' => 'padrao@gmail.com',
            'password' => Hash::make('123456'),
        ]);

        User::create([
            'name' => 'Rodrigo',
            'telefone' => '21975028324',
            'nivel_id' => 1,
            'email' => 'admin2@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}