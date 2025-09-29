<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParamCategoriaDespesaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('param_categoria_despesas')->insert(
            [
                [
                    'descricao' => 'Consumo',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Embalagens',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Medicamento',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Folha',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Ração',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
