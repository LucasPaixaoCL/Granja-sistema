<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // admin
        DB::table('users')->insert([
            'department_id' => 1,   // Administração
            'name' => 'Administrador',
            'email' => 'admin@rhmangnt.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123'),
            'role' => 'admin',
            'permissions' => '["admin"]',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // admin
        DB::table('users')->insert([
            'department_id' => 2,   // Administração
            'name' => 'Neilton Ferreira da Paixão',
            'email' => 'neilton.paixao@ovosbelavista.com.br',
            'email_verified_at' => now(),
            'password' => bcrypt('34254595'),
            'role' => 'admin',
            'permissions' => '["admin"]',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // admin
        DB::table('users')->insert([
            'department_id' => 3,   // Administração
            'name' => 'Lucianno Cardoso Luis',
            'email' => 'lucianno.luis@ovosbelavista.com.br',
            'email_verified_at' => now(),
            'password' => bcrypt('34254595'),
            'role' => 'admin',
            'permissions' => '["admin"]',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        // admin details
        DB::table('user_details')->insert([
            'user_id' => 1,
            'address' => 'Chácara Bela Vista, S/N - Zona Rural',
            'zip_code' => '65975-000',
            'city' => 'Estreito',
            'phone' => '(99) 9 9999-9999',
            'salary' => 0.00,
            'admission_date' => '2023-10-01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_details')->insert([
            'user_id' => 2,
            'address' => 'Rua Henrique Dias, 177 - Planalto I',
            'zip_code' => '65975-000',
            'city' => 'Estreito',
            'phone' => '(99) 9 8103-6206',
            'salary' => 0.00,
            'admission_date' => '2023-10-01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_details')->insert([
            'user_id' => 3,
            'address' => 'Rua 2 Quadra 1 Casa 8 - Madre Paulina',
            'zip_code' => '65975-000',
            'city' => 'Estreito',
            'phone' => '(99) 9 9196-9409',
            'salary' => 0.00,
            'admission_date' => '2023-10-01',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // // admin department
        // DB::table('departments')->insert([
        //     'name' => 'Administração',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // // rh department
        // DB::table('departments')->insert([
        //     'name' => 'Recursos Humanos',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
    }
}
