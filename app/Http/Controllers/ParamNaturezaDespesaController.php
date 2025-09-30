<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParamNaturezaDespesaRequest;
use App\Http\Requests\UpdateParamNaturezaDespesaRequest;
use App\Models\ParamNaturezaDespesa;
use Illuminate\Support\Facades\Crypt;

class ParamNaturezaDespesaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', ParamNaturezaDespesa::class);

        $dados = [
            'natureza_despeza' => ParamNaturezaDespesa::all(),
        ];

        return view('parametros.natureza_despesa.listar', ['dados' => $dados]);
    }

    public function create()
    {
        $this->authorize('create', ParamNaturezaDespesa::class);

        return view('parametros.natureza_despesa.adicionar');
    }

    public function store(StoreParamNaturezaDespesaRequest $request)
    {
        $this->authorize('create', ParamNaturezaDespesa::class);

        $natureza_despeza = new ParamNaturezaDespesa;
        $natureza_despeza->descricao = $request->descricao;
        $natureza_despeza->save();

        return redirect()->route('param.natureza.despesa.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function show($id)
    {
        $natureza_despeza = ParamNaturezaDespesa::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $natureza_despeza);

        $dados = [
            'natureza_despeza' => $natureza_despeza,
        ];

        return view('parametros.natureza_despesa.detalhes', ['dados' => $dados]);
    }

    public function edit($id)
    {
        $natureza_despeza = ParamNaturezaDespesa::findOrFail(Crypt::decryptString($id));
        $this->authorize('update', $natureza_despeza);

        $dados = [
            'natureza_despeza' => $natureza_despeza,
        ];

        return view('parametros.natureza_despesa.editar', ['dados' => $dados]);
    }

    public function update(UpdateParamNaturezaDespesaRequest $request, ParamNaturezaDespesa $paramNaturezaDespesa)
    {
        $this->authorize('update', $paramNaturezaDespesa);

        $paramNaturezaDespesa->update([
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('param.natureza.despesa.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function confirm($id)
    {
        $natureza_despeza = ParamNaturezaDespesa::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $natureza_despeza);

        $dados = [
            'natureza_despeza' => $natureza_despeza,
        ];

        return view('parametros.natureza_despesa.confirmar', ['dados' => $dados]);
    }

    public function destroy($id)
    {
        $natureza_despeza = ParamNaturezaDespesa::findOrFail(Crypt::decryptString($id));
        $this->authorize('delete', $natureza_despeza);
        $natureza_despeza->delete();

        return redirect()->route('param.natureza.despesa.index');
    }
}
