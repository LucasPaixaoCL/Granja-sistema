<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParamFaseAveRequest;
use App\Http\Requests\UpdateParamFaseAveRequest;
use App\Models\ParamFaseAve;
use Illuminate\Support\Facades\Crypt;

class ParamFaseAveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', ParamFaseAve::class);

        $dados = [
            'fases' => ParamFaseAve::orderBy('semana_inicial', 'asc')->get(),
        ];

        return view('parametros.fases_ave.listar', ['dados' => $dados]);
    }

    public function create()
    {
        $this->authorize('create', ParamFaseAve::class);

        return view('parametros.fases_ave.adicionar');
    }

    public function store(StoreParamFaseAveRequest $request)
    {
        $this->authorize('create', ParamFaseAve::class);

        $param = new ParamFaseAve;
        $param->descricao = $request->descricao;
        $param->semana_inicial = $request->semana_inicial;
        $param->semana_final = $request->semana_final;
        $param->save();

        return redirect()->route('param.fases.ave.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function show($id)
    {
        $fase_ave = ParamFaseAve::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $fase_ave);

        $dados = [
            'fase_ave' => $fase_ave,
        ];

        return view('parametros.fases_ave.detalhes', ['dados' => $dados]);
    }

    public function edit($id)
    {
        $fase_ave = ParamFaseAve::findOrFail(Crypt::decryptString($id));
        $this->authorize('update', $fase_ave);

        $dados = [
            'fase_ave' => $fase_ave,
        ];

        return view('parametros.fases_ave.editar', ['dados' => $dados]);
    }

    public function update(UpdateParamFaseAveRequest $request, ParamFaseAve $paramFaseAve)
    {
        $this->authorize('update', $paramFaseAve);

        $paramFaseAve->update([
            'descricao' => $request->descricao,
            'semana_inicial' => $request->semana_inicial,
            'semana_final' => $request->semana_final,
        ]);

        return redirect()->route('param.fases.ave.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function confirm($id)
    {
        $fase_ave = ParamFaseAve::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $fase_ave);

        $dados = [
            'fase_ave' => $fase_ave,
        ];

        return view('parametros.fases_ave.confirmar', ['dados' => $dados]);
    }

    public function destroy($id)
    {
        $fase = ParamFaseAve::findOrFail(Crypt::decryptString($id));
        $this->authorize('delete', $fase);
        $fase->delete();

        return redirect()->route('param.fases.ave.index');
    }
}
