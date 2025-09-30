<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParamDetalheProgramaVacinacaoRequest;
use App\Http\Requests\UpdateParamDetalheProgramaVacinacaoRequest;
use App\Models\ParamDetalheProgramaVacinacao;
use App\Models\ParamProgramaVacinacao;
use App\Models\ParamViaAplicacao;
use Illuminate\Support\Facades\Crypt;

class ParamDetalheProgramaVacinacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', ParamDetalheProgramaVacinacao::class);

        $dados = [
            'detalhe_programa_vacinacao' => ParamDetalheProgramaVacinacao::with('programa', 'via_aplicacao')->get(),
        ];

        return view('parametros.detalhe_programa_vacinacao.listar', ['dados' => $dados]);
    }

    public function create()
    {
        $this->authorize('create', ParamDetalheProgramaVacinacao::class);

        $dados = [
            'detalhe_programa_vacinacao' => ParamProgramaVacinacao::all(),
            'via_aplicacao' => $this->getParamViaAplicacao(),
        ];

        return view('parametros.detalhe_programa_vacinacao.adicionar', ['dados' => $dados]);
    }

    public function store(StoreParamDetalheProgramaVacinacaoRequest $request)
    {
        $this->authorize('create', ParamDetalheProgramaVacinacao::class);

        $plano_vacinacao = new ParamDetalheProgramaVacinacao;
        $plano_vacinacao->param_programa_vacinacao_id = $request->programa_vacinacao;
        $plano_vacinacao->dia = $request->dia;
        $plano_vacinacao->semana = $request->semana;
        $plano_vacinacao->enfermidade = $request->enfermidade;
        $plano_vacinacao->param_via_aplicacao_id = $request->via_aplicacao;
        $plano_vacinacao->save();

        return redirect()->route('param.detalhe.programa.vacinacao.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function show($id)
    {
        $detalhe_programa_vacinacao = ParamDetalheProgramaVacinacao::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $detalhe_programa_vacinacao);

        $dados = [
            'detalhe_programa_vacinacao' => $detalhe_programa_vacinacao,
        ];

        return view('parametros.detalhe_programa_vacinacao.detalhes', ['dados' => $dados]);
    }

    public function edit($id)
    {
        $detalhe_programa_vacinacao = ParamDetalheProgramaVacinacao::findOrFail(Crypt::decryptString($id));
        $this->authorize('update', $detalhe_programa_vacinacao);

        $dados = [
            'detalhe_programa_vacinacao' => $detalhe_programa_vacinacao,
        ];

        return view('parametros.detalhe_programa_vacinacao.editar', ['dados' => $dados]);
    }

    public function update(UpdateParamDetalheProgramaVacinacaoRequest $request, ParamDetalheProgramaVacinacao $paramDetalheProgramaVacinacao)
    {
        $this->authorize('update', $paramDetalheProgramaVacinacao);

        $paramDetalheProgramaVacinacao->update([
            'param_programa_vacinacao_id' => $request->programa_vacinacao,
            'dia' => $request->dia,
            'semana' => $request->semana,
            'enfermidade' => $request->enfermidade,
            'param_via_aplicacao_id' => $request->via_aplicacao,
        ]);

        return redirect()->route('param.detalhe.programa.vacinacao.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function confirm($id)
    {
        $detalhe_programa_vacinacao = ParamDetalheProgramaVacinacao::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $detalhe_programa_vacinacao);

        $dados = [
            'detalhe_programa_vacinacao' => $detalhe_programa_vacinacao,
        ];

        return view('parametros.detalhe_programa_vacinacao.confirmar', ['dados' => $dados]);
    }

    public function destroy($id)
    {
        $detalhe_programa_vacinacao = ParamDetalheProgramaVacinacao::findOrFail(Crypt::decryptString($id));
        $this->authorize('delete', $detalhe_programa_vacinacao);
        $detalhe_programa_vacinacao->delete();

        return redirect()->route('param.detalhe.programa.vacinacao.index');
    }

    protected function getParamViaAplicacao()
    {
        return ParamViaAplicacao::orderBy('descricao')->get();
    }
}
