<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMorteRequest;
use App\Http\Requests\UpdateMorteRequest;
use App\Models\Lote;
use App\Models\Morte;
use Illuminate\Support\Facades\Crypt;

class MortesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function graficoMortes()
    {
        $this->authorize('viewAny', Morte::class);

        $lotes = Lote::with('mortes')->orderBy('data_morte', 'desc')->get();

        $labels = [];
        $data = [];

        $totalMortes = 0;

        // Calcular total de mortes
        foreach ($lotes as $lote) {
            $totalMortes += collect($lote->mortes)->sum('qtde_mortes');
        }

        // Preparar dados para o gráfico
        foreach ($lotes as $lote) {
            $qtde = collect($lote->mortes)->sum('qtde_mortes');
            if ($qtde > 0) {
                $labels[] = 'Lote '.$lote->num_lote;
                $data[] = round(($qtde / $totalMortes) * 100, 2);
            }
        }

        return view('dashboard.grafico-mortes', ['labels' => $labels, 'data' => $data]);
    }

    public function index()
    {
        $this->authorize('viewAny', Morte::class);

        $dados = [
            'mortes' => Morte::with(['lote'])->select('*')->orderBy('semana', 'desc')->orderBy('data_morte', 'desc')->get(),
            'lotes' => Lote::select('*')->get(),
        ];

        return view('mortes.listar', ['dados' => $dados]);
    }

    public function create()
    {
        $this->authorize('create', Morte::class);

        $dados = [
            'lotes' => Lote::all(),
        ];

        return view('mortes.adicionar', ['dados' => $dados]);
    }

    public function store(StoreMorteRequest $request)
    {
        $this->authorize('create', Morte::class);

        $morte = new Morte;
        $morte->lote_id = $request->lote;

        $lote = Lote::find($request->lote);
        $data_inicial = $lote->data_lote;
        $data_final = $request->data_morte;

        $morte->semana = MainController::calcularSemana($data_inicial, $data_final) + 1;

        $morte->data_morte = $request->data_morte;
        $morte->qtde_mortes = $request->qtde_mortes;

        $morte->save();

        return redirect()->route('mortes.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function show($id)
    {
        $morte = Morte::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $morte);

        $dados = [
            'morte' => $morte,
        ];

        return view('mortes.detalhes', ['dados' => $dados]);
    }

    public function edit($id)
    {
        $morte = Morte::findOrFail($id);
        $this->authorize('update', $morte);

        $dados = [
            'morte' => $morte,
        ];

        return view('mortes.editar', ['dados' => $dados]);
    }

    public function update(UpdateMorteRequest $request, Morte $morte)
    {
        $this->authorize('update', $morte);

        $morte->update([
            'nome' => $request->nome,
        ]);

        return redirect()->route('mortes.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function confirm($id)
    {
        $morte = Morte::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $morte);

        $dados = [
            'morte' => $morte,
        ];

        return view('mortes.confirmar', ['dados' => $dados]);
    }

    public function destroy($id)
    {
        $morte = Morte::findOrFail(Crypt::decryptString($id));
        $this->authorize('delete', $morte);

        $morte->delete();

        return redirect()->route('mortes.index');
    }
}
