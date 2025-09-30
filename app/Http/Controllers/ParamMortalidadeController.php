<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParamMortalidadeRequest;
use App\Http\Requests\UpdateParamMortalidadeRequest;
use App\Models\ParamMortalidade;
use Illuminate\Support\Facades\Crypt;

class ParamMortalidadeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', ParamMortalidade::class);
        $param_mortalidade = ParamMortalidade::all();

        return view('parametros.mortalidade.listar', ['param_mortalidade' => $param_mortalidade]);
    }

    public function create()
    {
        $this->authorize('create', ParamMortalidade::class);

        return view('parametros.mortalidade.adicionar');
    }

    public function store(StoreParamMortalidadeRequest $request)
    {
        $this->authorize('create', ParamMortalidade::class);

        $param_mortalidade = new ParamMortalidade;
        $param_mortalidade->semana = $request->semana;
        $param_mortalidade->padrao = $request->padrao;
        $param_mortalidade->save();

        return redirect()->route('param.mortalidade.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function show($id)
    {
        $param_mortalidade = ParamMortalidade::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $param_mortalidade);

        return view('parametros.mortalidade.detalhes', ['param_mortalidade' => $param_mortalidade]);
    }

    public function edit($id)
    {
        $param_mortalidade = ParamMortalidade::findOrFail(Crypt::decryptString($id));
        $this->authorize('update', $param_mortalidade);

        return view('parametros.mortalidade.editar', ['param_mortalidade' => $param_mortalidade]);
    }

    public function update(UpdateParamMortalidadeRequest $request, ParamMortalidade $paramMortalidade)
    {
        $this->authorize('update', $paramMortalidade);

        $paramMortalidade->update([
            'semana' => $request->semana,
            'padrao' => $request->padrao,
        ]);

        return redirect()->route('param.mortalidade.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function confirm($id)
    {
        $param_mortalidade = ParamMortalidade::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $param_mortalidade);

        return view('parametros.mortalidade.confirmar', ['param_mortalidade' => $param_mortalidade]);
    }

    public function destroy($id)
    {
        $param_mortalidade = ParamMortalidade::findOrFail(Crypt::decryptString($id));
        $this->authorize('delete', $param_mortalidade);
        $param_mortalidade->delete();

        return redirect()->route('param.mortalidade.index');
    }
}
