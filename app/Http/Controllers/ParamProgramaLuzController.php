<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParamProgramaLuzRequest;
use App\Http\Requests\UpdateParamProgramaLuzRequest;
use App\Models\ParamProgramaLuz;
use Illuminate\Support\Facades\Crypt;

class ParamProgramaLuzController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', ParamProgramaLuz::class);
        $results = ParamProgramaLuz::all();

        return view('parametros.programa_luz.listar', ['results' => $results]);
    }

    public function create()
    {
        $this->authorize('create', ParamProgramaLuz::class);

        return view('parametros.programa_luz.adicionar');
    }

    public function store(StoreParamProgramaLuzRequest $request)
    {
        $this->authorize('create', ParamProgramaLuz::class);

        $vacina = new ParamProgramaLuz;
        $vacina->nome = $request->nome;
        $vacina->save();

        return redirect()->route('parametros.programa_luz.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function show($id)
    {
        $vacina = ParamProgramaLuz::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $vacina);

        return view('parametros.programa_luz.detalhes', ['vacina' => $vacina]);
    }

    public function edit($id)
    {
        $vacina = ParamProgramaLuz::findOrFail(Crypt::decryptString($id));
        $this->authorize('update', $vacina);

        return view('parametros.programa_luz.editar', ['vacina' => $vacina]);
    }

    public function update(UpdateParamProgramaLuzRequest $request, ParamProgramaLuz $paramProgramaLuz)
    {
        $this->authorize('update', $paramProgramaLuz);

        $paramProgramaLuz->update([
            'nome' => $request->nome,
        ]);

        return redirect()->route('parametros.programa_luz.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function confirm($id)
    {
        $vacina = ParamProgramaLuz::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $vacina);

        return view('parametros.programa_luz.confirm', ['vacina' => $vacina]);
    }

    public function destroy($id)
    {
        $vacina = ParamProgramaLuz::findOrFail(Crypt::decryptString($id));
        $this->authorize('delete', $vacina);
        $vacina->delete();

        return redirect()->route('parametros.programa_luz.index');
    }
}
