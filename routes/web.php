<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ColaboratorsController;
use App\Http\Controllers\ColetasController;
use App\Http\Controllers\ConfirmAccountController;
use App\Http\Controllers\ControlePesoController;
use App\Http\Controllers\DashboardsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DescartesController;
use App\Http\Controllers\DespesasController;
use App\Http\Controllers\FormasPgtoController;
use App\Http\Controllers\FormatosController;
use App\Http\Controllers\ForncedoresController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\GalpoesController;
use App\Http\Controllers\LotesController;
use App\Http\Controllers\MortesController;
use App\Http\Controllers\NucleosController;
use App\Http\Controllers\ParamCategoriaDespesaController;
use App\Http\Controllers\ParamConsumoAguaController;
use App\Http\Controllers\ParamConsumoRacaoController;
use App\Http\Controllers\ParamControlePesoController;
use App\Http\Controllers\ParamDetalheProgramaVacinacaoController;
use App\Http\Controllers\ParamFaseAveController;
use App\Http\Controllers\ParamLinhagensController;
use App\Http\Controllers\ParamMortalidadeController;
use App\Http\Controllers\ParamNaturezaDespesaController;
use App\Http\Controllers\ParamProgramaLuzController;
use App\Http\Controllers\ParamProgramaVacinacaoController;
use App\Http\Controllers\ParamTipoDespesaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RhManagementController;
use App\Http\Controllers\RhUserController;
use App\Http\Controllers\VacinasController;
use App\Http\Controllers\VendasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rotas para usuários comuns (guest / convidados)
Route::middleware("guest")->group(function () {
    // Confirmação de email e definicao da senha
    Route::get("/confirm-account/{token}", [ConfirmAccountController::class, "confirmAccount"])->name("confirm-account");
    Route::post("/confirm-account", [ConfirmAccountController::class, "confirmAccountSubmit"])->name("confirm-account-submit");
});

// Rotas para usuários autenticados
Route::middleware("auth")->group(function () {
    // Rotas para a página inicial
    Route::redirect("/", "home");
    Route::get("/home", [DashboardsController::class, "dashboard"])->name("home");

    // Rotas do perfil
    Route::prefix("user/profile")->name("user.profile.")->group(function () {
        Route::get("/", [ProfileController::class, "index"])->name("index");
        Route::post("/update-password", [ProfileController::class, "updatePassword"])->name("update-password");
        Route::post("/update-user-data", [ProfileController::class, "updateUserData"])->name("update-user-data");
    });

    // Rotas de Colaboradores (Admin)
    Route::prefix("colaborators")->name("colaborators.")->group(function () {
        Route::get("/all", [ColaboratorsController::class, "index"])->name("all");
        Route::get("/details/{id}", [ColaboratorsController::class, "details"])->name("details");
        Route::delete("/delete/{id}", [ColaboratorsController::class, "destroy"])->name("destroy"); // Usando DELETE para exclusão
    });

    // Rotas de Departamentos
        Route::resource("departments", DepartmentController::class)->except(["show"]);
    

    // Rotas de Usuários RH
    Route::prefix("rh-users")->name("rh-users.")->group(function () {
        Route::get("/", [RhUserController::class, "index"])->name("index");
        Route::get("/create", [RhUserController::class, "create"])->name("create");
        Route::post("/store", [RhUserController::class, "store"])->name("store");
        Route::get("/edit/{id}", [RhUserController::class, "edit"])->name("edit");
        Route::put("/update/{id}", [RhUserController::class, "update"])->name("update"); // Usando PUT para update
        Route::delete("/destroy/{id}", [RhUserController::class, "destroy"])->name("destroy"); // Usando DELETE para exclusão
    });

    Route::get("/rh-users/management", [RhManagementController::class, "index"])->name("rh.management");

    // Rotas de Recursos CRUD (Resource Routes)
    Route::resources([
        "nucleos" => NucleosController::class,
        "galpoes" => GalpoesController::class,
        "lotes" => LotesController::class,
        "coletas" => ColetasController::class,
        "descartes" => DescartesController::class,
        "mortes" => MortesController::class,
        "vacinas" => VacinasController::class,
        "pesos" => ControlePesoController::class,
        "clientes" => ClientesController::class,
        "funcionarios" => FuncionariosController::class,
        "fornecedores" => ForncedoresController::class,
        "formas_pgto" => FormasPgtoController::class,
        "formatos" => FormatosController::class,
        "despesas" => DespesasController::class,
        "vendas" => VendasController::class,
    ]);

    // Rotas para Parâmetros (agrupadas)
    Route::prefix("parametros")->name("parametros.")->group(function () {
        Route::resource("categoria_despesa", ParamCategoriaDespesaController::class);
        Route::resource("consumo_agua", ParamConsumoAguaController::class);
        Route::resource("consumo_racao", ParamConsumoRacaoController::class);
        Route::resource("controle_peso", ParamControlePesoController::class);
        Route::resource("detalhe_programa_vacinacao", ParamDetalheProgramaVacinacaoController::class);
        Route::resource("fases_ave", ParamFaseAveController::class);
        Route::resource("linhagens", ParamLinhagensController::class);
        Route::resource("mortalidade", ParamMortalidadeController::class);
        Route::resource("natureza_despesa", ParamNaturezaDespesaController::class);
        Route::resource("programa_luz", ParamProgramaLuzController::class);
        Route::resource("programa_vacinacao", ParamProgramaVacinacaoController::class);
        Route::resource("tipo_despesa", ParamTipoDespesaController::class);
        // A rota ParamVacinaController não foi encontrada no arquivo original, mas foi incluída para consistência se existir.
        // Route::resource("vacina", ParamVacinaController::class);
    });
});

