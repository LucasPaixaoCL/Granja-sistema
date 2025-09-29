<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParamNaturezaDespesaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('param_natureza_despesas')->insert(
            [
                [
                    'descricao' => 'Fixa',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Variável',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }
}
