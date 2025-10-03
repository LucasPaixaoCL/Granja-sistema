<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VacinasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table("vacinas")->insert(
            [
                [
                    "lote_id" => 1,
                    "param_programa_vacinacao_id" => 1,
                    "data_prevista" => now(),
                    "data_realizada" => now(),
                    "fabricante" => "Fabricante A",
                    "created_at" => now(),
                    "updated_at" => now(),
                ],
            ]
        );
    }
}

