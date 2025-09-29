<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParamMortalidadeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('param_mortalidade')->insert(
            [
                [
                    'semana' => 1,
                    'padrao' => 0.50,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'semana' => 2,
                    'padrao' => 0.90,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'semana' => 3,
                    'padrao' => 1.10,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
