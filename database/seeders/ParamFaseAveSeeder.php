<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParamFaseAveSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('param_fase_ave')->insert(
            [
                [
                    'descricao' => 'Pré-Inicial',
                    'semana_inicial' => 1,
                    'semana_final' => 3,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Inicial',
                    'semana_inicial' => 4,
                    'semana_final' => 6,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Recria I',
                    'semana_inicial' => 7,
                    'semana_final' => 12,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Recria II',
                    'semana_inicial' => 13,
                    'semana_final' => 18,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Pré-Postura',
                    'semana_inicial' => 19,
                    'semana_final' => 20,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Postura',
                    'semana_inicial' => 21,
                    'semana_final' => 100,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
