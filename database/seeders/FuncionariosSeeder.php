<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuncionariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('funcionarios')->insert(
            [
                [
                    'nome' => 'Lucianno',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nome' => 'Neilton',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nome' => 'Silmara',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'nome' => 'Lucas',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
