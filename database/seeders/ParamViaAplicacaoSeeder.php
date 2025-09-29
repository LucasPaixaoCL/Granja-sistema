<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParamViaAplicacaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('param_via_aplicacao')->insert(
            [
                [
                    'descricao' => 'Água',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Intramuscular',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Punção na asa',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Subcutânea',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Spray',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
