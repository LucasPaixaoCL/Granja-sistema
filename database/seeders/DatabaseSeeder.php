<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            ClienteSeeder::class,
            ControlePesoSeeder::class,
            DescarteSeeder::class,
            EstoqueSeeder::class,
            FormasPagamentoSeeder::class,
            FormatosSeeder::class,
            FuncionariosSeeder::class,
            GalpaoSeeder::class,
            ParamCategoriaDespesaSeeder::class,
            ParamConsumoAguaSeeder::class,
            ParamConsumoRacaoSeeder::class,
            ParamControlePesoSeeder::class,
            ParamDetalheProgramaVacinacaoSeeder::class,
            ParamFaseAveSeeder::class,
            ParamLinhagemSeeder::class,
            ParamMortalidadeSeeder::class,
            ParamNaturezaDespesaSeeder::class,
            ParamProgramaLuzSeeder::class,
            ParamSituacaoPagamentoSeeder::class,
            ParamTipoDespesaSeeder::class,
            ParamVacinaSeeder::class,
            ParamViaAplicacaoSeeder::class,
            VacinasSeeder::class,
        ]);
    }
}

