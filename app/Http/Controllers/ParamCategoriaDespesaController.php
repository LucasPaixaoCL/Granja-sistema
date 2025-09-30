<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParamCategoriaDespesaRequest;
use App\Http\Requests\UpdateParamCategoriaDespesaRequest;
use App\Models\ParamCategoriaDespesa;
use Illuminate\Support\Facades\Crypt;

class ParamCategoriaDespesaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', ParamCategoriaDespesa::class);
        $categorias_despesa = ParamCategoriaDespesa::all();

        return view('parametros.categoria_despesa.listar', ['categorias_despesa' => $categorias_despesa]);
    }

    public function create()
    {
        $this->authorize('create', ParamCategoriaDespesa::class);

        return view('parametros.categoria_despesa.adicionar');
    }

    public function store(StoreParamCategoriaDespesaRequest $request)
    {
        $this->authorize('create', ParamCategoriaDespesa::class);

        $categoria_despesa = new ParamCategoriaDespesa;
        $categoria_despesa->descricao = $request->descricao;
        $categoria_despesa->save();

        return redirect()->route('param.categoria.despesa.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function show($id)
    {
        $categoria_despesa = ParamCategoriaDespesa::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $categoria_despesa);

        return view('parametros.categoria_despesa.detalhes', ['categoria_despesa' => $categoria_despesa]);
    }

    public function edit($id)
    {
        $categoria_despesa = ParamCategoriaDespesa::findOrFail(Crypt::decryptString($id));
        $this->authorize('update', $categoria_despesa);

        return view('parametros.categoria_despesa.editar', ['categoria_despesa' => $categoria_despesa]);
    }

    public function update(UpdateParamCategoriaDespesaRequest $request, ParamCategoriaDespesa $paramCategoriaDespesa)
    {
        $this->authorize('update', $paramCategoriaDespesa);

        $paramCategoriaDespesa->update([
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('param.categoria.despesa.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function confirm($id)
    {
        $categoria_despesa = ParamCategoriaDespesa::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $categoria_despesa);

        return view('parametros.categoria_despesa.confirmar', ['categoria_despesa' => $categoria_despesa]);
    }

    public function destroy($id)
    {
        $categoria_despesa = ParamCategoriaDespesa::findOrFail(Crypt::decryptString($id));
        $this->authorize('delete', $categoria_despesa);
        $categoria_despesa->delete();

        return redirect()->route('param.categoria.despesa.index');
    }
}
