<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('formatos')->insert(
            [
                [
                    'descricao' => 'Caixa',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Cartela',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }
}
