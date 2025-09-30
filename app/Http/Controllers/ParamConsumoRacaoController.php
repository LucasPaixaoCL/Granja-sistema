<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParamConsumoRacaoRequest;
use App\Http\Requests\UpdateParamConsumoRacaoRequest;
use App\Models\ParamConsumoRacao;
use Illuminate\Support\Facades\Crypt;

class ParamConsumoRacaoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', ParamConsumoRacao::class);
        $consumo_racao = ParamConsumoRacao::all();

        return view('parametros.consumo_racao.listar', ['consumo_racao' => $consumo_racao]);
    }

    public function create()
    {
        $this->authorize('create', ParamConsumoRacao::class);

        return view('parametros.consumo_racao.adicionar');
    }

    public function store(StoreParamConsumoRacaoRequest $request)
    {
        $this->authorize('create', ParamConsumoRacao::class);

        $consumo = new ParamConsumoRacao;
        $consumo->semana = $request->semana;
        $consumo->consumo_dia = $request->consumo_dia;
        $consumo->consumo_semana = $request->consumo_semana;
        $consumo->save();

        return redirect()->route('param.consumo.racao.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function show($id)
    {
        $consumo = ParamConsumoRacao::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $consumo);

        return view('parametros.consumo_racao.detalhes', ['consumo' => $consumo]);
    }

    public function edit($id)
    {
        $consumo = ParamConsumoRacao::findOrFail(Crypt::decryptString($id));
        $this->authorize('update', $consumo);

        return view('parametros.consumo_racao.editar', ['consumo' => $consumo]);
    }

    public function update(UpdateParamConsumoRacaoRequest $request, ParamConsumoRacao $paramConsumoRacao)
    {
        $this->authorize('update', $paramConsumoRacao);

        $paramConsumoRacao->update([
            'semana' => $request->semana,
            'consumo_dia' => $request->consumo_dia,
            'consumo_semana' => $request->consumo_semana,
        ]);

        return redirect()->route('param.consumo.racao.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function confirm($id)
    {
        $consumo = ParamConsumoRacao::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $consumo);

        return view('parametros.consumo_racao.confirmar', ['consumo' => $consumo]);
    }

    public function destroy($id)
    {
        $consumo = ParamConsumoRacao::findOrFail(Crypt::decryptString($id));
        $this->authorize('delete', $consumo);
        $consumo->delete();

        return redirect()->route('param.consumo.racao.index');
    }
}
