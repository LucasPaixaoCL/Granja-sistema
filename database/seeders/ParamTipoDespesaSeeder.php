<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParamTipoDespesaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('param_tipo_despesas')->insert(
            [
                [
                    'descricao' => 'Despesa',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Custo',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Investimento',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
