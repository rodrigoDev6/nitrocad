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
            'name' => 'Rodrigo de Lima',
            'telefone' => '21975028324',
            'email' => 'rodrigo@gmail.com',
            'password' => Hash::make('123456'),
            'permissao' => 1,
        ]);
        User::create([
            'name' => 'João de Lima',
            'telefone' => '21975028324',
            'email' => 'joao@gmail.com',
            'password' => Hash::make('123456'),
            'permissao' => 0,
        ]);
    }
}