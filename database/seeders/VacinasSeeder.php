<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class VacinasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('vacinas')->insert(
            [
                [
                    'lote_id' => 1,
                    'descricao' => 'Dinheiro',
                    'descricao' => 'Dinheiro',
                    'descricao' => 'Dinheiro',
                    'descricao' => 'Dinheiro',
                    'descricao' => 'Dinheiro',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
