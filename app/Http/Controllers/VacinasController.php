<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVacinaRequest;
use App\Http\Requests\UpdateVacinaRequest;
use App\Models\Vacina;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class VacinasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', Vacina::class);

        $dados = [
            'vacinas' => DB::table('param_detalhes_programa_vacinacao as pdpv')
                ->join('param_programa_vacinacao as ppv', 'pdpv.param_programa_vacinacao_id', '=', 'ppv.id')
                ->leftJoin('vacinas as v', 'v.param_programa_vacinacao_id', '=', 'pdpv.id')
                ->leftJoin('lotes as l', function ($join): void {
                    $join->on('l.id', '=', 'v.lote_id')
                        ->where('l.id', '=', 1);
                })
                ->join('param_via_aplicacao as pva', 'pva.id', '=', 'pdpv.param_via_aplicacao_id')
                ->select([
                    'v.id',
                    'pdpv.dia',
                    'pdpv.semana',
                    'pdpv.enfermidade',
                    'pdpv.param_via_aplicacao_id',
                    'pva.descricao',
                    'l.data_lote',
                    'v.data_prevista',
                    'v.data_realizada',
                ])
                ->limit(100)
                ->get(),
        ];

        return view('vacinas.listar', ['dados' => $dados]);
    }

    public function create()
    {
        $this->authorize('create', Vacina::class);

        return view('vacinas.adicionar');
    }

    public function store(StoreVacinaRequest $request)
    {
        $this->authorize('create', Vacina::class);

        $vacina = new Vacina;
        $vacina->nome = $request->nome;
        $vacina->save();

        return redirect()->route('vacinas.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function show($id)
    {
        $vacina = Vacina::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $vacina);

        return view('vacinas.detalhes', ['vacina' => $vacina]);
    }

    public function edit($id)
    {
        $vacina = Vacina::findOrFail(Crypt::decryptString($id));
        $this->authorize('update', $vacina);

        $data_prevista = $vacina->data_prevista;
        $data_realizada = $vacina->data_realizada;

        $dados = [
            'id' => $id,
            'data_prevista' => $data_prevista,
            'data_realizada' => $data_realizada,
        ];

        return view('vacinas.editar', ['dados' => $dados]);
    }

    public function update(UpdateVacinaRequest $request, Vacina $vacina)
    {
        $this->authorize('update', $vacina);

        $vacina->update([
            'data_realizada' => $request->data_realizada,
            'updated_at' => now(),
        ]);

        return redirect()->route('vacinas.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function confirm($id)
    {
        $vacina = Vacina::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $vacina);

        return view('vacinas.confirm', ['vacina' => $vacina]);
    }

    public function destroy($id)
    {
        $vacina = Vacina::findOrFail(Crypt::decryptString($id));
        $this->authorize('delete', $vacina);
        $vacina->delete();

        return redirect()->route('vacinas.index');
    }
}
