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
use App\Http\Controllers\ParamNaturezaDespesa;
use App\Http\Controllers\ParamNaturezaDespesaController;
use App\Http\Controllers\ParamProgramaLuzController;
use App\Http\Controllers\ParamProgramaVacinacaoController;
use App\Http\Controllers\ParamTipoDespesaController;
use App\Http\Controllers\ParamVacinaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RhManagementController;
use App\Http\Controllers\RhUserController;
use App\Http\Controllers\VacinasController;
use App\Http\Controllers\VendasController;
use App\Models\Cliente;
use App\Models\ParamCategoriaDespesa;
use App\Models\ParamDetalheProgramaVacinacao;
use App\Models\ParamMortalidade;
use Illuminate\Support\Facades\Route;

// Rotas para usuários comuns (guest / convidados)
Route::middleware('guest')->group(function () {
    // Confirmação de email e definicao da senha
    Route::get('/confirm-account/{token}', [ConfirmAccountController::class, 'confirmAccount'])->name('confirm-account');
    Route::post('/confirm-account', [ConfirmAccountController::class, 'confirmAccountSubmit'])->name('confirm-account-submit');
});

// Rotas para usuários autenticados
Route::middleware('auth')->group(function () {
    // Rotas para a página inicial
    Route::redirect('/', 'home');
    //Route::view('/home', 'home')->name('home');
    Route::get('/home', [DashboardsController::class, 'dashboard'])->name('home');

    // Rotas do perfil
    Route::get('/user/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::post('/user/profile/update-password', [ProfileController::class, 'updatePassword'])->name('user.profile.update-password');
    Route::post('/user/profile/update-user-data', [ProfileController::class, 'updateUserData'])->name('user.profile.update-user-data');

    // Rotas dos Admin - colaboradores
    Route::get('/colaborators/all', [ColaboratorsController::class, 'index'])->name('colaborators.all');
    Route::get('/colaborators/details/{id}', [ColaboratorsController::class, 'details'])->name('colaborators.details');
    Route::get('/colaborators/delete/{id}', [ColaboratorsController::class, 'delete'])->name('colaborators.delete');
    Route::get('/colaborators/delete-confirm/{id}', [ColaboratorsController::class, 'deleteConfirm'])->name('colaborators.delete-confirm');

    // Rotas do  departamento
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments');
    Route::get('/departments/new-department', [DepartmentController::class, 'newDepartment'])->name('departments.new-department');
    Route::post('/departments/create-department', [DepartmentController::class, 'createDepartment'])->name('departments.create-department');
    Route::get('/departments/edit-department/{id}', [DepartmentController::class, 'editDepartment'])->name('departments.edit-department');
    Route::post('/departments/update-department', [DepartmentController::class, 'updateDepartment'])->name('departments.uptate-department');
    Route::get('/departments/delete-department/{id}', [DepartmentController::class, 'deleteDepartment'])->name('departments.delete-department');
    Route::get('/departments/delete-department-confirm/{id}', [DepartmentController::class, 'deleteDepartmentConfirm'])->name('departments.delete-department-confirm');

    // Rotas dos colaboradores
    Route::get('/rh-users', [RhUserController::class, 'index'])->name('colaborators.rh-users');
    Route::get('/rh-users/new-colaborator', [RhUserController::class, 'newRhColaborator'])->name('colaborators.rh.new-colaborator');
    Route::post('/rh-users/create-colaborator', [RhUserController::class, 'createRhColaborator'])->name('colaborators.rh.create-colaborator');
    Route::get('/rh-users/edit-colaborator/{id}', [RhUserController::class, 'editRhColaborator'])->name('colaborators.rh.edit-colaborator');
    Route::post('/rh-users/update-colaborator', [RhUserController::class, 'updateRhColaborator'])->name('colaborators.rh.uptate-colaborator');
    Route::get('/rh-users/delete-colaborator/{id}', [RhUserController::class, 'deleteRhColaborator'])->name('colaborators.rh.delete-colaborator');
    Route::get('/rh-users/delete-colaborator-confirm/{id}', [RhUserController::class, 'deleteRhColaboratorConfirm'])->name('colaborators.rh.delete-colaborator-confirm');

    Route::get('/rh-users/management', [RhManagementController::class, 'index'])->name('rh.management');

    //REMOVER - APENAS TESTE
    Route::get('funcionarios', [FuncionariosController::class, 'index'])->name('funcionarios.index');
    Route::get('/funcionarios/create', [FuncionariosController::class, 'create'])->name('funcionarios.create');
    Route::post('/funcionarios/store', [FuncionariosController::class, 'store'])->name('funcionarios.store');
    Route::get('/funcionarios/show/{id}', [FuncionariosController::class, 'show'])->name('funcionarios.show');
    Route::get('/funcionarios/edit/{id}', [FuncionariosController::class, 'edit'])->name('funcionarios.edit');
    Route::post('/funcionarios/update/{id}', [FuncionariosController::class, 'update'])->name('funcionarios.update');
    Route::get('/funcionarios/destroy/{id}', [FuncionariosController::class, 'destroy'])->name('funcionarios.destroy');

    // Rotas para Núcleos
    Route::get('/nucleos', [NucleosController::class, 'index'])->name('nucleos.index');
    Route::get('/nucleos/create', [NucleosController::class, 'create'])->name('nucleos.create');
    Route::post('/nucleos/store', [NucleosController::class, 'store'])->name('nucleos.store');
    Route::get('/nucleos/show/{id}', [NucleosController::class, 'show'])->name('nucleos.show');
    Route::get('/nucleos/edit/{id}', [NucleosController::class, 'edit'])->name('nucleos.edit');
    Route::post('/nucleos/update/', [NucleosController::class, 'update'])->name('nucleos.update');
    Route::get('/nucleos/confirm/{id}', [NucleosController::class, 'confirm'])->name('nucleos.confirm');
    Route::get('/nucleos/destroy/{id}', [NucleosController::class, 'destroy'])->name('nucleos.destroy');

    // Rotas para Galpóes
    Route::get('/galpoes', [GalpoesController::class, 'index'])->name('galpoes.index');
    Route::get('/galpoes/create', [GalpoesController::class, 'create'])->name('galpoes.create');
    Route::post('/galpoes/store', [GalpoesController::class, 'store'])->name('galpoes.store');
    Route::get('/galpoes/show/{id}', [GalpoesController::class, 'show'])->name('galpoes.show');
    Route::get('/galpoes/edit/{id}', [GalpoesController::class, 'edit'])->name('galpoes.edit');
    Route::post('/galpoes/update/', [GalpoesController::class, 'update'])->name('galpoes.update');
    Route::get('/galpoes/confirm/{id}', [GalpoesController::class, 'confirm'])->name('galpoes.confirm');
    Route::get('/galpoes/destroy/{id}', [GalpoesController::class, 'destroy'])->name('galpoes.destroy');
    
    // Rotas para Lotes
    Route::get('/lotes', [LotesController::class, 'index'])->name('lotes.index');
    Route::get('/lotes/create', [LotesController::class, 'create'])->name('lotes.create');
    Route::post('/lotes/store', [LotesController::class, 'store'])->name('lotes.store');
    Route::get('/lotes/show/{id}', [LotesController::class, 'show'])->name('lotes.show');
    Route::get('/lotes/edit/{id}', [LotesController::class, 'edit'])->name('lotes.edit');
    Route::post('/lotes/update/', [LotesController::class, 'update'])->name('lotes.update');
    Route::get('/lotes/confirm/{id}', [LotesController::class, 'confirm'])->name('lotes.confirm');
    Route::get('/lotes/destroy/{id}', [LotesController::class, 'destroy'])->name('lotes.destroy');

    // Rotas para Coletas de Ovos
    Route::get('/coletas', [ColetasController::class, 'index'])->name('coletas.index');
    Route::get('/coletas/create', [ColetasController::class, 'create'])->name('coletas.create');
    Route::post('/coletas/store', [ColetasController::class, 'store'])->name('coletas.store');
    Route::get('/coletas/show/{id}', [ColetasController::class, 'show'])->name('coletas.show');
    Route::get('/coletas/edit/{id}', [ColetasController::class, 'edit'])->name('coletas.edit');
    Route::post('/coletas/update/', [ColetasController::class, 'update'])->name('coletas.update');
    Route::get('/coletas/confirm/{id}', [ColetasController::class, 'confirm'])->name('coletas.confirm');
    Route::get('/coletas/destroy/{id}', [ColetasController::class, 'destroy'])->name('coletas.destroy');

    // Rotas para Coletas de Ovos
    Route::get('/descartes', [DescartesController::class, 'index'])->name('descartes.index');
    Route::get('/descartes/create', [DescartesController::class, 'create'])->name('descartes.create');
    Route::post('/descartes/store', [DescartesController::class, 'store'])->name('descartes.store');
    Route::get('/descartes/show/{id}', [DescartesController::class, 'show'])->name('descartes.show');
    Route::get('/descartes/edit/{id}', [DescartesController::class, 'edit'])->name('descartes.edit');
    Route::post('/descartes/update/', [DescartesController::class, 'update'])->name('descartes.update');
    Route::get('/descartes/confirm/{id}', [DescartesController::class, 'confirm'])->name('descartes.confirm');
    Route::get('/descartes/destroy/{id}', [DescartesController::class, 'destroy'])->name('descartes.destroy');

    // Rotas para Mortes
    Route::get('/mortes', [MortesController::class, 'index'])->name('mortes.index');
    Route::get('/mortes/create', [MortesController::class, 'create'])->name('mortes.create');
    Route::post('/mortes/store', [MortesController::class, 'store'])->name('mortes.store');
    Route::get('/mortes/show/{id}', [MortesController::class, 'show'])->name('mortes.show');
    Route::get('/mortes/edit/{id}', [MortesController::class, 'edit'])->name('mortes.edit');
    Route::post('/mortes/update/', [MortesController::class, 'update'])->name('mortes.update');
    Route::get('/mortes/confirm/{id}', [MortesController::class, 'confirm'])->name('mortes.confirm');
    Route::get('/mortes/destroy/{id}', [MortesController::class, 'destroy'])->name('mortes.destroy');

    // Rotas para Vacinas
    Route::get('/vacinas', [VacinasController::class, 'index'])->name('vacinas.index');
    Route::get('/vacinas/create', [VacinasController::class, 'create'])->name('vacinas.create');
    Route::post('/vacinas/store', [VacinasController::class, 'store'])->name('vacinas.store');
    Route::get('/vacinas/show/{id}', [VacinasController::class, 'show'])->name('vacinas.show');
    Route::get('/vacinas/edit/{id}', [VacinasController::class, 'edit'])->name('vacinas.edit');
    Route::post('/vacinas/update/', [VacinasController::class, 'update'])->name('vacinas.update');
    Route::get('/vacinas/confirm/{id}', [VacinasController::class, 'confirm'])->name('vacinas.confirm');
    Route::get('/vacinas/destroy/{id}', [VacinasController::class, 'destroy'])->name('vacinas.destroy');

    // Rotas para Controle do Peso
    Route::get('/pesos', [ControlePesoController::class, 'index'])->name('pesos.index');
    Route::get('/pesos/create', [ControlePesoController::class, 'create'])->name('pesos.create');
    Route::post('/pesos/store', [ControlePesoController::class, 'store'])->name('pesos.store');
    Route::get('/pesos/show/{id}', [ControlePesoController::class, 'show'])->name('pesos.show');
    Route::get('/pesos/edit/{id}', [ControlePesoController::class, 'edit'])->name('pesos.edit');
    Route::post('/pesos/update/', [ControlePesoController::class, 'update'])->name('pesos.update');
    Route::get('/pesos/confirm/{id}', [ControlePesoController::class, 'confirm'])->name('pesos.confirm');
    Route::get('/pesos/destroy/{id}', [ControlePesoController::class, 'destroy'])->name('pesos.destroy');

    // Rotas para Clientes
    Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');
    Route::get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
    Route::post('/clientes/store', [ClientesController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/show/{id}', [ClientesController::class, 'show'])->name('clientes.show');
    Route::get('/clientes/edit/{id}', [ClientesController::class, 'edit'])->name('clientes.edit');
    Route::post('/clientes/update/', [ClientesController::class, 'update'])->name('clientes.update');
    Route::get('/clientes/confirm/{id}', [ClientesController::class, 'confirm'])->name('clientes.confirm');
    Route::get('/clientes/destroy/{id}', [ClientesController::class, 'destroy'])->name('clientes.destroy');

    // Rotas para Funcionários
    Route::get('/funcionarios', [FuncionariosController::class, 'index'])->name('funcionarios.index');
    Route::get('/funcionarios/create', [FuncionariosController::class, 'create'])->name('funcionarios.create');
    Route::post('/funcionarios/store', [FuncionariosController::class, 'store'])->name('funcionarios.store');
    Route::get('/funcionarios/show/{id}', [FuncionariosController::class, 'show'])->name('funcionarios.show');
    Route::get('/funcionarios/edit/{id}', [FuncionariosController::class, 'edit'])->name('funcionarios.edit');
    Route::post('/funcionarios/update/', [FuncionariosController::class, 'update'])->name('funcionarios.update');
    Route::get('/funcionarios/confirm/{id}', [FuncionariosController::class, 'confirm'])->name('funcionarios.confirm');
    Route::get('/funcionarios/destroy/{id}', [FuncionariosController::class, 'destroy'])->name('funcionarios.destroy');

    // Rotas para Fornecedores
    Route::get('/fornecedores', [ForncedoresController::class, 'index'])->name('fornecedores.index');
    Route::get('/fornecedores/create', [ForncedoresController::class, 'create'])->name('fornecedores.create');
    Route::post('/fornecedores/store', [ForncedoresController::class, 'store'])->name('fornecedores.store');
    Route::get('/fornecedores/show/{id}', [ForncedoresController::class, 'show'])->name('fornecedores.show');
    Route::get('/fornecedores/edit/{id}', [ForncedoresController::class, 'edit'])->name('fornecedores.edit');
    Route::post('/fornecedores/update/', [ForncedoresController::class, 'update'])->name('fornecedores.update');
    Route::get('/fornecedores/confirm/{id}', [ForncedoresController::class, 'confirm'])->name('fornecedores.confirm');
    Route::get('/fornecedores/destroy/{id}', [ForncedoresController::class, 'destroy'])->name('fornecedores.destroy');

    // Rotas para Formas de Pagamento
    Route::get('/formas_pgto', [FormasPgtoController::class, 'index'])->name('formas_pgto.index');
    Route::get('/formas_pgto/create', [FormasPgtoController::class, 'create'])->name('formas_pgto.create');
    Route::post('/formas_pgto/store', [FormasPgtoController::class, 'store'])->name('formas_pgto.store');
    Route::get('/formas_pgto/show/{id}', [FormasPgtoController::class, 'show'])->name('formas_pgto.show');
    Route::get('/formas_pgto/edit/{id}', [FormasPgtoController::class, 'edit'])->name('formas_pgto.edit');
    Route::post('/formas_pgto/update/', [FormasPgtoController::class, 'update'])->name('formas_pgto.update');
    Route::get('/formas_pgto/confirm/{id}', [FormasPgtoController::class, 'confirm'])->name('formas_pgto.confirm');
    Route::get('/formas_pgto/destroy/{id}', [FormasPgtoController::class, 'destroy'])->name('formas_pgto.destroy');

    // Rotas para Formatos
    Route::get('/formatos', [FormatosController::class, 'index'])->name('formatos.index');
    Route::get('/formatos/create', [FormatosController::class, 'create'])->name('formatos.create');
    Route::post('/formatos/store', [FormatosController::class, 'store'])->name('formatos.store');
    Route::get('/formatos/show/{id}', [FormatosController::class, 'show'])->name('formatos.show');
    Route::get('/formatos/edit/{id}', [FormatosController::class, 'edit'])->name('formatos.edit');
    Route::post('/formatos/update/', [FormatosController::class, 'update'])->name('formatos.update');
    Route::get('/formatos/confirm/{id}', [FormatosController::class, 'confirm'])->name('formatos.confirm');
    Route::get('/formatos/destroy/{id}', [FormatosController::class, 'destroy'])->name('formatos.destroy');

    // Rotas para Vendas
    Route::get('/vendas', [VendasController::class, 'index'])->name('vendas.index');
    Route::get('/vendas/create', [VendasController::class, 'create'])->name('vendas.create');
    Route::post('/vendas/store', [VendasController::class, 'store'])->name('vendas.store');
    Route::get('/vendas/show/{id}', [VendasController::class, 'show'])->name('vendas.show');
    Route::get('/vendas/edit/{id}', [VendasController::class, 'edit'])->name('vendas.edit');
    Route::post('/vendas/update/', [VendasController::class, 'update'])->name('vendas.update');
    Route::get('/vendas/confirm/{id}', [VendasController::class, 'confirm'])->name('vendas.confirm');
    Route::get('/vendas/destroy/{id}', [VendasController::class, 'destroy'])->name('vendas.destroy');

    // Rotas para Despesas
    Route::get('/despesas', [DespesasController::class, 'index'])->name('despesas.index');
    Route::get('/despesas/create', [DespesasController::class, 'create'])->name('despesas.create');
    Route::post('/despesas/store', [DespesasController::class, 'store'])->name('despesas.store');
    Route::get('/despesas/show/{id}', [DespesasController::class, 'show'])->name('despesas.show');
    Route::get('/despesas/edit/{id}', [DespesasController::class, 'edit'])->name('despesas.edit');
    Route::post('/despesas/update/', [DespesasController::class, 'update'])->name('despesas.update');
    Route::get('/despesas/confirm/{id}', [DespesasController::class, 'confirm'])->name('despesas.confirm');
    Route::get('/despesas/destroy/{id}', [DespesasController::class, 'destroy'])->name('despesas.destroy');

    // Rotas para Parâmetro - Programa de Luz
    Route::get('/parametros/programa_luz', [ParamProgramaLuzController::class, 'index'])->name('param.programa.luz.index');
    Route::get('/parametros/programa_luz/create', [ParamProgramaLuzController::class, 'create'])->name('param.programa.luz.create');
    Route::post('/parametros/programa_luz/store', [ParamProgramaLuzController::class, 'store'])->name('param.programa.luz.store');
    Route::get('/parametros/programa_luz/show/{id}', [ParamProgramaLuzController::class, 'show'])->name('param.programa.luz.show');
    Route::get('/parametros/programa_luz/edit/{id}', [ParamProgramaLuzController::class, 'edit'])->name('param.programa.luz.edit');
    Route::post('/parametros/programa_luz/update/', [ParamProgramaLuzController::class, 'update'])->name('param.programa.luz.update');
    Route::get('/parametros/programa_luz/confirm/{id}', [ParamProgramaLuzController::class, 'confirm'])->name('param.programa.luz.confirm');
    Route::get('/parametros/programa_luz/destroy/{id}', [ParamProgramaLuzController::class, 'destroy'])->name('param.programa.luz.destroy');

    // Rotas para Parâmetro - Vacinas
    Route::get('/parametros/programa_vacinacao', [ParamProgramaVacinacaoController::class, 'index'])->name('param.programa.vacinacao.index');
    Route::get('/parametros/programa_vacinacao/create', [ParamProgramaVacinacaoController::class, 'create'])->name('param.programa.vacinacao.create');
    Route::post('/parametros/programa_vacinacao/store', [ParamProgramaVacinacaoController::class, 'store'])->name('param.programa.vacinacao.store');
    Route::get('/parametros/programa_vacinacao/show/{id}', [ParamProgramaVacinacaoController::class, 'show'])->name('param.programa.vacinacao.show');
    Route::get('/parametros/programa_vacinacao/edit/{id}', [ParamProgramaVacinacaoController::class, 'edit'])->name('param.programa.vacinacao.edit');
    Route::post('/parametros/programa_vacinacao/update/', [ParamProgramaVacinacaoController::class, 'update'])->name('param.programa.vacinacao.update');
    Route::get('/parametros/programa_vacinacao/confirm/{id}', [ParamProgramaVacinacaoController::class, 'confirm'])->name('param.programa.vacinacao.confirm');
    Route::get('/parametros/programa_vacinacao/destroy/{id}', [ParamProgramaVacinacaoController::class, 'destroy'])->name('param.programa.vacinacao.destroy');

    // Rotas para Parâmetro - Vacinas
    Route::get('/parametros/detalhe_programa_vacinacao', [ParamDetalheProgramaVacinacaoController::class, 'index'])->name('param.detalhe.programa.vacinacao.index');
    Route::get('/parametros/detalhe_programa_vacinacao/create', [ParamDetalheProgramaVacinacaoController::class, 'create'])->name('param.detalhe.programa.vacinacao.create');
    Route::post('/parametros/detalhe_programa_vacinacao/store', [ParamDetalheProgramaVacinacaoController::class, 'store'])->name('param.detalhe.programa.vacinacao.store');
    Route::get('/parametros/detalhe_programa_vacinacao/show/{id}', [ParamDetalheProgramaVacinacaoController::class, 'show'])->name('param.detalhe.programa.vacinacao.show');
    Route::get('/parametros/detalhe_programa_vacinacao/edit/{id}', [ParamDetalheProgramaVacinacaoController::class, 'edit'])->name('param.detalhe.programa.vacinacao.edit');
    Route::post('/parametros/detalhe_programa_vacinacao/update/', [ParamDetalheProgramaVacinacaoController::class, 'update'])->name('param.detalhe.programa.vacinacao.update');
    Route::get('/parametros/detalhe_programa_vacinacao/confirm/{id}', [ParamDetalheProgramaVacinacaoController::class, 'confirm'])->name('param.detalhe.programa.vacinacao.confirm');
    Route::get('/parametros/detalhe_programa_vacinacao/destroy/{id}', [ParamDetalheProgramaVacinacaoController::class, 'destroy'])->name('param.detalhe.programa.vacinacao.destroy');

    // Rotas para Parâmetro - Linhagem
    Route::get('/parametros/linhagens', [ParamLinhagensController::class, 'index'])->name('param.linhagens.index');
    Route::get('/parametros/linhagens/create', [ParamLinhagensController::class, 'create'])->name('param.linhagens.create');
    Route::post('/parametros/linhagens/store', [ParamLinhagensController::class, 'store'])->name('param.linhagens.store');
    Route::get('/parametros/linhagens/show/{id}', [ParamLinhagensController::class, 'show'])->name('param.linhagens.show');
    Route::get('/parametros/linhagens/edit/{id}', [ParamLinhagensController::class, 'edit'])->name('param.linhagens.edit');
    Route::post('/parametros/linhagens/update/', [ParamLinhagensController::class, 'update'])->name('param.linhagens.update');
    Route::get('/parametros/linhagens/confirm/{id}', [ParamLinhagensController::class, 'confirm'])->name('param.linhagens.confirm');
    Route::get('/parametros/linhagens/destroy/{id}', [ParamLinhagensController::class, 'destroy'])->name('param.linhagens.destroy');

    // Rotas para Parâmetro - Consumo de Água
    Route::get('/parametros/controle_peso', [ParamControlePesoController::class, 'index'])->name('param.controle.peso.index');
    Route::get('/parametros/controle_peso/create', [ParamControlePesoController::class, 'create'])->name('param.controle.peso.create');
    Route::post('/parametros/controle_peso/store', [ParamControlePesoController::class, 'store'])->name('param.controle.peso.store');
    Route::get('/parametros/controle_peso/show/{id}', [ParamControlePesoController::class, 'show'])->name('param.controle.peso.show');
    Route::get('/parametros/controle_peso/edit/{id}', [ParamControlePesoController::class, 'edit'])->name('param.controle.peso.edit');
    Route::post('/parametros/controle_peso/update/', [ParamControlePesoController::class, 'update'])->name('param.controle.peso.update');
    Route::get('/parametros/controle_peso/confirm/{id}', [ParamControlePesoController::class, 'confirm'])->name('param.controle.peso.confirm');
    Route::get('/parametros/controle_peso/destroy/{id}', [ParamControlePesoController::class, 'destroy'])->name('param.controle.peso.destroy');

    // Rotas para Parâmetro - Consumo de Água
    Route::get('/parametros/consumo_agua', [ParamConsumoAguaController::class, 'index'])->name('param.consumo.agua.index');
    Route::get('/parametros/consumo_agua/create', [ParamConsumoAguaController::class, 'create'])->name('param.consumo.agua.create');
    Route::post('/parametros/consumo_agua/store', [ParamConsumoAguaController::class, 'store'])->name('param.consumo.agua.store');
    Route::get('/parametros/consumo_agua/show/{id}', [ParamConsumoAguaController::class, 'show'])->name('param.consumo.agua.show');
    Route::get('/parametros/consumo_agua/edit/{id}', [ParamConsumoAguaController::class, 'edit'])->name('param.consumo.agua.edit');
    Route::post('/parametros/consumo_agua/update/', [ParamConsumoAguaController::class, 'update'])->name('param.consumo.agua.update');
    Route::get('/parametros/consumo_agua/confirm/{id}', [ParamConsumoAguaController::class, 'confirm'])->name('param.consumo.agua.confirm');
    Route::get('/parametros/consumo_agua/destroy/{id}', [ParamConsumoAguaController::class, 'destroy'])->name('param.consumo.agua.destroy');

    // Rotas para Parâmetro - Consumo de Ração
    Route::get('/parametros/consumo_racao', [ParamConsumoRacaoController::class, 'index'])->name('param.consumo.racao.index');
    Route::get('/parametros/consumo_racao/create', [ParamConsumoRacaoController::class, 'create'])->name('param.consumo.racao.create');
    Route::post('/parametros/consumo_racao/store', [ParamConsumoRacaoController::class, 'store'])->name('param.consumo.racao.store');
    Route::get('/parametros/consumo_racao/show/{id}', [ParamConsumoRacaoController::class, 'show'])->name('param.consumo.racao.show');
    Route::get('/parametros/consumo_racao/edit/{id}', [ParamConsumoRacaoController::class, 'edit'])->name('param.consumo.racao.edit');
    Route::post('/parametros/consumo_racao/update/', [ParamConsumoRacaoController::class, 'update'])->name('param.consumo.racao.update');
    Route::get('/parametros/consumo_racao/confirm/{id}', [ParamConsumoRacaoController::class, 'confirm'])->name('param.consumo.racao.confirm');
    Route::get('/parametros/consumo_racao/destroy/{id}', [ParamConsumoRacaoController::class, 'destroy'])->name('param.consumo.racao.destroy');

    // Rotas para Parâmetro - Mortalidade
    Route::get('/parametros/mortalidade', [ParamMortalidadeController::class, 'index'])->name('param.mortalidade.index');
    Route::get('/parametros/mortalidade/create', [ParamMortalidadeController::class, 'create'])->name('param.mortalidade.create');
    Route::post('/parametros/mortalidade/store', [ParamMortalidadeController::class, 'store'])->name('param.mortalidade.store');
    Route::get('/parametros/mortalidade/show/{id}', [ParamMortalidadeController::class, 'show'])->name('param.mortalidade.show');
    Route::get('/parametros/mortalidade/edit/{id}', [ParamMortalidadeController::class, 'edit'])->name('param.mortalidade.edit');
    Route::post('/parametros/mortalidade/update/', [ParamMortalidadeController::class, 'update'])->name('param.mortalidade.update');
    Route::get('/parametros/mortalidade/confirm/{id}', [ParamMortalidadeController::class, 'confirm'])->name('param.mortalidade.confirm');
    Route::get('/parametros/mortalidade/destroy/{id}', [ParamMortalidadeController::class, 'destroy'])->name('param.mortalidade.destroy');

    // Rotas para Parâmetro - Fases da Ave
    Route::get('/parametros/fases_ave', [ParamFaseAveController::class, 'index'])->name('param.fases.ave.index');
    Route::get('/parametros/fases_ave/create', [ParamFaseAveController::class, 'create'])->name('param.fases.ave.create');
    Route::post('/parametros/fases_ave/store', [ParamFaseAveController::class, 'store'])->name('param.fases.ave.store');
    Route::get('/parametros/fases_ave/show/{id}', [ParamFaseAveController::class, 'show'])->name('param.fases.ave.show');
    Route::get('/parametros/fases_ave/edit/{id}', [ParamFaseAveController::class, 'edit'])->name('param.fases.ave.edit');
    Route::post('/parametros/fases_ave/update/', [ParamFaseAveController::class, 'update'])->name('param.fases.ave.update');
    Route::get('/parametros/fases_ave/confirm/{id}', [ParamFaseAveController::class, 'confirm'])->name('param.fases.ave.confirm');
    Route::get('/parametros/fases_ave/destroy/{id}', [ParamFaseAveController::class, 'destroy'])->name('param.fases.ave.destroy');

    // Rotas para Parâmetro - Tipo da Despesa
    Route::get('/parametros/tipo_despesa', [ParamTipoDespesaController::class, 'index'])->name('param.tipo.despesa.index');
    Route::get('/parametros/tipo_despesa/create', [ParamTipoDespesaController::class, 'create'])->name('param.tipo.despesa.create');
    Route::post('/parametros/tipo_despesa/store', [ParamTipoDespesaController::class, 'store'])->name('param.tipo.despesa.store');
    Route::get('/parametros/tipo_despesa/show/{id}', [ParamTipoDespesaController::class, 'show'])->name('param.tipo.despesa.show');
    Route::get('/parametros/tipo_despesa/edit/{id}', [ParamTipoDespesaController::class, 'edit'])->name('param.tipo.despesa.edit');
    Route::post('/parametros/tipo_despesa/update/', [ParamTipoDespesaController::class, 'update'])->name('param.tipo.despesa.update');
    Route::get('/parametros/tipo_despesa/confirm/{id}', [ParamTipoDespesaController::class, 'confirm'])->name('param.tipo.despesa.confirm');
    Route::get('/parametros/tipo_despesa/destroy/{id}', [ParamTipoDespesaController::class, 'destroy'])->name('param.tipo.despesa.destroy');

    // Rotas para Parâmetro - Natureza da Despesa
    Route::get('/parametros/natureza_despesa', [ParamNaturezaDespesaController::class, 'index'])->name('param.natureza.despesa.index');
    Route::get('/parametros/natureza_despesa/create', [ParamNaturezaDespesaController::class, 'create'])->name('param.natureza.despesa.create');
    Route::post('/parametros/natureza_despesa/store', [ParamNaturezaDespesaController::class, 'store'])->name('param.natureza.despesa.store');
    Route::get('/parametros/natureza_despesa/show/{id}', [ParamNaturezaDespesaController::class, 'show'])->name('param.natureza.despesa.show');
    Route::get('/parametros/natureza_despesa/edit/{id}', [ParamNaturezaDespesaController::class, 'edit'])->name('param.natureza.despesa.edit');
    Route::post('/parametros/natureza_despesa/update/', [ParamNaturezaDespesaController::class, 'update'])->name('param.natureza.despesa.update');
    Route::get('/parametros/natureza_despesa/confirm/{id}', [ParamNaturezaDespesaController::class, 'confirm'])->name('param.natureza.despesa.confirm');
    Route::get('/parametros/natureza_despesa/destroy/{id}', [ParamNaturezaDespesaController::class, 'destroy'])->name('param.natureza.despesa.destroy');

    // Rotas para Parâmetro - Categoria da Despesa
    Route::get('/parametros/categoria_despesa', [ParamCategoriaDespesaController::class, 'index'])->name('param.categoria.despesa.index');
    Route::get('/parametros/categoria_despesa/create', [ParamCategoriaDespesaController::class, 'create'])->name('param.categoria.despesa.create');
    Route::post('/parametros/categoria_despesa/store', [ParamCategoriaDespesaController::class, 'store'])->name('param.categoria.despesa.store');
    Route::get('/parametros/categoria_despesa/show/{id}', [ParamCategoriaDespesaController::class, 'show'])->name('param.categoria.despesa.show');
    Route::get('/parametros/categoria_despesa/edit/{id}', [ParamCategoriaDespesaController::class, 'edit'])->name('param.categoria.despesa.edit');
    Route::post('/parametros/categoria_despesa/update/', [ParamCategoriaDespesaController::class, 'update'])->name('param.categoria.despesa.update');
    Route::get('/parametros/categoria_despesa/confirm/{id}', [ParamCategoriaDespesaController::class, 'confirm'])->name('param.categoria.despesa.confirm');
    Route::get('/parametros/categoria_despesa/destroy/{id}', [ParamCategoriaDespesaController::class, 'destroy'])->name('param.categoria.despesa.destroy');

    Route::get('/grafico-mortes', [MortesController::class, 'graficoMortes'])->name('grafico.mortes');
});
