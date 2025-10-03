<?php

namespace App\Http\Controllers;

use App\Models\Lote;
use App\Models\Morte;
use App\Models\Nucleo;
use App\Models\ParamLinhagem;
use App\Models\ParamProgramaVacinacao;
use App\Http\Requests\StoreLoteRequest;
use App\Http\Requests\UpdateLoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (! Auth::user()->can('admin')) {
                abort(403, 'Você não tem permissão para acessar esta página!');
            }

            return $next($request);
        });
    }

    public function index()
    {
        $lotes = Lote::with(['mortes', 'nucleo', 'galpoes'])->get();

        $totais = Lote::selectRaw('SUM(qtde_aves) as total_aves, SUM(qtde_machos) as total_machos')->first();
        $total_mortes = Morte::sum('qtde_mortes');

        $dados = [
            'lotes' => $lotes,
            'total_aves' => $totais->total_aves,
            'total_machos' => $totais->total_machos,
            'total_mortes' => $total_mortes,
        ];

        return view('lotes.listar', ['dados' => $dados]);
    }

    public function create()
    {
        $dados = [
            'programa_vacinacao' => ParamProgramaVacinacao::select('id', 'descricao')->get(),
            'linhagens' => ParamLinhagem::select('id', 'descricao')->get(),
            'nucleos' => Nucleo::select('id', 'descricao')->get(),
        ];

        return view('lotes.adicionar', ['dados' => $dados]);
    }

    public function store(StoreLoteRequest $request)
    {
        $lote = new Lote;
        $lote->nucleo_id = $request->nucleo_id;
        $lote->num_lote = $this->buscaMaiorLote($request->nucleo_id);
        $lote->data_lote = $request->data_lote;
        $lote->qtde_aves = $request->qtde_aves;
        $lote->qtde_machos = $request->qtde_machos;
        $lote->param_programa_vacinacao_id = $request->param_programa_vacinacao_id;
        $lote->param_linhagem_id = $request->param_linhagem_id;
        $lote->save();

        return redirect()->route('lotes.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function show(Lote $lote)
    {
        $lote->load("mortes", "nucleo", "coletas");

        $main = new MainController;

        $dados = [
            'lote' => $lote,
            'semana' => $main->calcularSemana($lote->data_lote, now()),
        ];

        return view('lotes.detalhes', ['dados' => $dados]);
    }

    public function edit(Lote $lote)
    {

        return view('lotes.editar', ['lote' => $lote]);
    }

    public function update(UpdateLoteRequest $request, Lote $lote)
    {
        $lote->nucleo_id = $request->nucleo_id;
        $lote->data_lote = $request->data_lote;
        $lote->qtde_aves = $request->qtde_aves;
        $lote->qtde_machos = $request->qtde_machos;
        $lote->param_programa_vacinacao_id = $request->param_programa_vacinacao_id;
        $lote->param_linhagem_id = $request->param_linhagem_id;
        $lote->save();

        return redirect()->route('lotes.index')->with('success', 'Gravado com sucesso!!!');
    }


    public function destroy(Lote $lote)
    {

        if ($lote->mortes()->exists()) {
            return back()->with('error', 'Não é possível excluir este lote pois há mortes associadas a ele.');
        }

        if ($lote->coletas()->exists()) {
            return back()->with('error', 'Não é possível excluir este lote pois há coletas associadas a ele.');
        }

        $lote->delete();

        return redirect()->route('lotes.index');
    }

    public function buscaMaiorLote($nucleo_id): int|float
    {
        return Lote::where('nucleo_id', $nucleo_id)->max('num_lote') + 1;
    }
}
