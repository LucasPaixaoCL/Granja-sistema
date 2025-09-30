<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParamLinhagemRequest;
use App\Http\Requests\UpdateParamLinhagemRequest;
use App\Models\ParamLinhagem;
use Illuminate\Support\Facades\Crypt;

class ParamLinhagensController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', ParamLinhagem::class);
        $results = ParamLinhagem::all();

        return view('parametros.linhagens.listar', ['results' => $results]);
    }

    public function create()
    {
        $this->authorize('create', ParamLinhagem::class);

        return view('parametros.linhagens.adicionar');
    }

    public function store(StoreParamLinhagemRequest $request)
    {
        $this->authorize('create', ParamLinhagem::class);

        $result = new ParamLinhagem;
        $result->descricao = $request->descricao;
        $result->save();

        return redirect()->route('param.linhagens.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function show($id)
    {
        $nucleo = ParamLinhagem::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $nucleo);

        return view('nucleos.detalhes', ['nucleo' => $nucleo]);
    }

    public function edit($id)
    {
        $nucleo = ParamLinhagem::findOrFail(Crypt::decryptString($id));
        $this->authorize('update', $nucleo);

        return view('nucleos.editar', ['nucleo' => $nucleo]);
    }

    public function update(UpdateParamLinhagemRequest $request, ParamLinhagem $paramLinhagem)
    {
        $this->authorize('update', $paramLinhagem);

        $paramLinhagem->update([
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('param.linhagens.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function confirm($id)
    {
        $result = ParamLinhagem::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $result);

        return view('parametros.linhagens.confirmar', ['result' => $result]);
    }

    public function destroy($id)
    {
        $result = ParamLinhagem::findOrFail(Crypt::decryptString($id));
        $this->authorize('delete', $result);
        $result->delete();

        return redirect()->route('param.linhagens.index');
    }
}
