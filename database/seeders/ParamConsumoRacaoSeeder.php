<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParamConsumoRacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('param_consumo_racao')->insert(
            [
                [
                    'semana' => '1',
                    'consumo_dia' => '12',
                    'consumo_semana' => '84',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'semana' => '2',
                    'consumo_dia' => '18',
                    'consumo_semana' => '126',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'semana' => '3',
                    'consumo_dia' => '26',
                    'consumo_semana' => '182',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'semana' => '4',
                    'consumo_dia' => '33',
                    'consumo_semana' => '231',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'semana' => '5',
                    'consumo_dia' => '38',
                    'consumo_semana' => '266',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
