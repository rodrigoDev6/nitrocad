<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nivel;
use Illuminate\Support\Facades\Hash;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nivel::create([
            'nome' => 'padrao',
        ]);
        Nivel::create([
            'nome' => 'admin',
        ]);
    }
}