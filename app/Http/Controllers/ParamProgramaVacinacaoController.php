<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParamProgramaVacinacaoRequest;
use App\Http\Requests\UpdateParamProgramaVacinacaoRequest;
use App\Models\ParamProgramaVacinacao;
use App\Models\ParamViaAplicacao;
use Illuminate\Support\Facades\Crypt;

class ParamProgramaVacinacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', ParamProgramaVacinacao::class);

        $dados = [
            'programa_vacinacao' => ParamProgramaVacinacao::all(),
            'via_aplicacao' => $this->getParamViaAplicacao(),
        ];

        return view('parametros.programa_vacinacao.listar', ['dados' => $dados]);
    }

    public function create()
    {
        $this->authorize('create', ParamProgramaVacinacao::class);

        $dados = [
            'via_aplicacao' => $this->getParamViaAplicacao(),
        ];

        return view('parametros.programa_vacinacao.adicionar', ['dados' => $dados]);
    }

    public function store(StoreParamProgramaVacinacaoRequest $request)
    {
        $this->authorize('create', ParamProgramaVacinacao::class);

        $plano_vacinacao = new ParamProgramaVacinacao;
        $plano_vacinacao->descricao = $request->descricao;
        $plano_vacinacao->save();

        return redirect()->route('param.programa.vacinacao.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function show($id)
    {
        $plano_vacinacao = ParamProgramaVacinacao::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $plano_vacinacao);

        $dados = [
            'plano_vacinacao' => $plano_vacinacao,
        ];

        return view('parametros.programa_vacinacao.detalhes', ['dados' => $dados]);
    }

    public function edit($id)
    {
        $plano_vacinacao = ParamProgramaVacinacao::findOrFail(Crypt::decryptString($id));
        $this->authorize('update', $plano_vacinacao);

        $dados = [
            'plano_vacinacao' => $plano_vacinacao,
        ];

        return view('parametros.programa_vacinacao.editar', ['dados' => $dados]);
    }

    public function update(UpdateParamProgramaVacinacaoRequest $request, ParamProgramaVacinacao $paramProgramaVacinacao)
    {
        $this->authorize('update', $paramProgramaVacinacao);

        $paramProgramaVacinacao->update([
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('param.programa.vacinacao.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function confirm($id)
    {
        $plano_vacinacao = ParamProgramaVacinacao::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $plano_vacinacao);

        $dados = [
            'plano_vacinacao' => $plano_vacinacao,
        ];

        return view('parametros.programa_vacinacao.confirmar', ['dados' => $dados]);
    }

    public function destroy($id)
    {
        $plano_vacinacao = ParamProgramaVacinacao::findOrFail(Crypt::decryptString($id));
        $this->authorize('delete', $plano_vacinacao);
        $plano_vacinacao->delete();

        return redirect()->route('param.programa.vacinacao.index');
    }

    protected function getParamViaAplicacao()
    {
        return ParamViaAplicacao::orderBy('descricao')->get();
    }
}
