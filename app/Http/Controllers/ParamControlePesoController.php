<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParamControlePesoRequest;
use App\Http\Requests\UpdateParamControlePesoRequest;
use App\Models\ParamControlePeso;
use App\Models\ParamLinhagem;
use Illuminate\Support\Facades\Crypt;

class ParamControlePesoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', ParamControlePeso::class);

        $dados = [
            'controle_peso' => ParamControlePeso::all(),
        ];

        return view('parametros.controle_peso.listar', ['dados' => $dados]);
    }

    public function create()
    {
        $this->authorize('create', ParamControlePeso::class);

        $dados = [
            'linhagens' => ParamLinhagem::all(),
        ];

        return view('parametros.controle_peso.adicionar', ['dados' => $dados]);
    }

    public function store(StoreParamControlePesoRequest $request)
    {
        $this->authorize('create', ParamControlePeso::class);

        $controle_peso = new ParamControlePeso;
        $controle_peso->semana = $request->semana;
        $controle_peso->peso_min = $request->peso_min;
        $controle_peso->peso_max = $request->peso_max;
        $controle_peso->save();

        return redirect()->route('param.controle.peso.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function show($id)
    {
        $controle_peso = ParamControlePeso::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $controle_peso);

        $dados = [
            'controle_peso' => $controle_peso,
        ];

        return view('parametros.controle_peso.detalhes', ['dados' => $dados]);
    }

    public function edit($id)
    {
        $controle_peso = ParamControlePeso::findOrFail(Crypt::decryptString($id));
        $this->authorize('update', $controle_peso);

        $dados = [
            'controle_peso' => $controle_peso,
        ];

        return view('parametros.controle_peso.editar', ['dados' => $dados]);
    }

    public function update(UpdateParamControlePesoRequest $request, ParamControlePeso $paramControlePeso)
    {
        $this->authorize('update', $paramControlePeso);

        $paramControlePeso->update([
            'semana' => $request->semana,
            'peso_min' => $request->peso_min,
            'peso_max' => $request->peso_max,
        ]);

        return redirect()->route('param.controle.peso.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function confirm($id)
    {
        $controle_peso = ParamControlePeso::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $controle_peso);

        $dados = [
            'controle_peso' => $controle_peso,
        ];

        return view('parametros.controle_peso.confirmar', ['dados' => $dados]);
    }

    public function destroy($id)
    {
        $controle_peso = ParamControlePeso::findOrFail(Crypt::decryptString($id));
        $this->authorize('delete', $controle_peso);
        $controle_peso->delete();

        return redirect()->route('param.controle.peso.index');
    }
}
