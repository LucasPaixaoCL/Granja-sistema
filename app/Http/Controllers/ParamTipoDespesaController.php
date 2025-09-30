<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParamTipoDespesaRequest;
use App\Http\Requests\UpdateParamTipoDespesaRequest;
use App\Models\ParamTipoDespesa;
use Illuminate\Support\Facades\Crypt;

class ParamTipoDespesaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', ParamTipoDespesa::class);

        $dados = [
            'tipos_despesa' => ParamTipoDespesa::all(),
        ];

        return view('parametros.tipo_despesa.listar', ['dados' => $dados]);
    }

    public function create()
    {
        $this->authorize('create', ParamTipoDespesa::class);

        return view('parametros.tipo_despesa.adicionar');
    }

    public function store(StoreParamTipoDespesaRequest $request)
    {
        $this->authorize('create', ParamTipoDespesa::class);

        $tipo_despesa = new ParamTipoDespesa;
        $tipo_despesa->descricao = $request->descricao;
        $tipo_despesa->save();

        return redirect()->route('param.tipo.despesa.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function show($id)
    {
        $tipo_despesa = ParamTipoDespesa::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $tipo_despesa);

        $dados = [
            'tipo_despesa' => $tipo_despesa,
        ];

        return view('parametros.tipo_despesa.detalhes', ['dados' => $dados]);
    }

    public function edit($id)
    {
        $tipo_despesa = ParamTipoDespesa::findOrFail(Crypt::decryptString($id));
        $this->authorize('update', $tipo_despesa);

        $dados = [
            'tipo_despesa' => $tipo_despesa,
        ];

        return view('parametros.tipo_despesa.editar', ['dados' => $dados]);
    }

    public function update(UpdateParamTipoDespesaRequest $request, ParamTipoDespesa $paramTipoDespesa)
    {
        $this->authorize('update', $paramTipoDespesa);

        $paramTipoDespesa->update([
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('param.tipo.despesa.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function confirm($id)
    {
        $tipo_despesa = ParamTipoDespesa::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $tipo_despesa);

        $dados = [
            'tipo_despesa' => $tipo_despesa,
        ];

        return view('parametros.tipo_despesa.confirmar', ['dados' => $dados]);
    }

    public function destroy($id)
    {
        $tipo_despesa = ParamTipoDespesa::findOrFail(Crypt::decryptString($id));
        $this->authorize('delete', $tipo_despesa);
        $tipo_despesa->delete();

        return redirect()->route('param.tipo.despesa.index');
    }
}
