<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('clientes')->insert(
            [
                [
                    'nome' => 'Ao Consumidor',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }
}
