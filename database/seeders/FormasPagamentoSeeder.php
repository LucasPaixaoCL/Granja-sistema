<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FormasPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('formas_pgto')->insert(
            [
                [
                    'descricao' => 'Dinheiro',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Pix',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Cartão',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'descricao' => 'Transferência',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
