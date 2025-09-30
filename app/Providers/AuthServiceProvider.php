<?php

namespace App\Providers;

use App\Models\Department;
use App\Policies\DepartmentPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Department::class => DepartmentPolicy::class,
        \App\Models\User::class => \App\Policies\ColaboratorPolicy::class,
        \App\Models\Cliente::class => \App\Policies\ClientePolicy::class,
        \App\Models\ColetaOvo::class => \App\Policies\ColetaOvoPolicy::class,
        \App\Models\ControlePeso::class => \App\Policies\ControlePesoPolicy::class,
        \App\Models\Descarte::class => \App\Policies\DescartePolicy::class,
        \App\Models\Despesa::class => \App\Policies\DespesaPolicy::class,
        \App\Models\FormaPgto::class => \App\Policies\FormaPgtoPolicy::class,
        \App\Models\Formato::class => \App\Policies\FormatoPolicy::class,
        \App\Models\Forncedor::class => \App\Policies\ForncedorPolicy::class,
        \App\Models\Funcionario::class => \App\Policies\FuncionarioPolicy::class,
        \App\Models\Galpao::class => \App\Policies\GalpaoPolicy::class,
        \App\Models\Morte::class => \App\Policies\MortePolicy::class,
        \App\Models\Nucleo::class => \App\Policies\NucleoPolicy::class,
        \App\Models\ParamCategoriaDespesa::class => \App\Policies\ParamCategoriaDespesaPolicy::class,
        \App\Models\ParamConsumoRacao::class => \App\Policies\ParamConsumoRacaoPolicy::class,
        \App\Models\ParamControlePeso::class => \App\Policies\ParamControlePesoPolicy::class,
        \App\Models\ParamDetalheProgramaVacinacao::class => \App\Policies\ParamDetalheProgramaVacinacaoPolicy::class,
        \App\Models\ParamFaseAve::class => \App\Policies\ParamFaseAvePolicy::class,
        \App\Models\ParamLinhagem::class => \App\Policies\ParamLinhagemPolicy::class,
        \App\Models\ParamMortalidade::class => \App\Policies\ParamMortalidadePolicy::class,
        \App\Models\ParamNaturezaDespesa::class => \App\Policies\ParamNaturezaDespesaPolicy::class,
        \App\Models\ParamProgramaLuz::class => \App\Policies\ParamProgramaLuzPolicy::class,
        \App\Models\ParamProgramaVacinacao::class => \App\Policies\ParamProgramaVacinacaoPolicy::class,
        \App\Models\ParamTipoDespesa::class => \App\Policies\ParamTipoDespesaPolicy::class,
        \App\Models\Vacina::class => \App\Policies\VacinaPolicy::class,
        \App\Models\Venda::class => \App\Policies\VendaPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // GATES

        // verifica se o usuário é admin
        Gate::define("admin", function (\App\Models\User $user) { return $user->isAdmin(); });
        Gate::define("rh", function (\App\Models\User $user) { return $user->isRh(); });
    }
}
