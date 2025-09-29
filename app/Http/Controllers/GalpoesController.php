<?php

namespace App\Http\Controllers;

use App\Models\Galpao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class GalpoesController extends Controller
{
    public function __construct()
    {
        $this->middleware(\'auth\');
        $this->middleware(function ($request, $next) {
            if (!Auth::user()->can(\'admin\')) {
                abort(403, \'Você não tem permissão para acessar esta página!\');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $dados = [
            \'galpoes\' => Galpao::orderBy(\'descricao\')->get()
        ];

        return view(\'galpoes.listar\', compact(\'dados\'));
    }

    public function create()
    {
        return view(\'galpoes.adicionar\');
    }

    public function store(Request $request)
    {
        $request->validate([
            \'descricao\' => \'required|min:3|max:30\'
        ]);

        $galpao = new Galpao();
        $galpao->descricao = $request->descricao;
        $galpao->largura = $request->largura;
        $galpao->comprimento = $request->comprimento;
        $galpao->densidade = $request->densidade;
        $galpao->save();

        return redirect()->route(\'galpoes.index\')->with(\'success\', \'Gravado com sucesso!!!\');
    }

    public function show($id)
    {
        $dados = [
            \'galpao\' => Galpao::findOrFail(Crypt::decryptString($id))
        ];

        return view(\'galpoes.detalhes\', compact(\'dados\'));
    }

    public function edit($id)
    {
        $dados = [
            \'galpao\' => Galpao::findOrFail(Crypt::decryptString($id))
        ];

        return view(\'galpoes.editar\', compact(\'dados\'));
    }

    public function update(Request $request)
    {
        $request->validate([
            \'descricao\' => \'required|min:3|max:30\'
        ]);

        $despesa = Galpao::findOrFail($request->id);

        $despesa->update([
            \'descricao\' => $request->descricao
        ]);

        return redirect()->route(\'galpoes.index\')->with(\'success\', \'Gravado com sucesso!!!\');
    }

    public function confirm($id)
    {
        $galpaoId = Crypt::decryptString($id);

        $dados = [
            \'galpao\' => Galpao::findOrFail($galpaoId)
        ];

        return view(\'galpoes.confirmar\', compact(\'dados\'));
    }

    public function destroy($id)
    {
        $galpaoId = Crypt::decryptString($id);

        $galpao = Galpao::findOrFail($galpaoId);

        if ($galpao->lotes()->exists()) {
            return back()->with(\'error\', \'Não é possível excluir este galpão pois há lotes associados a ele.\');
        }

        $galpao->delete();
        return redirect()->route(\'galpoes.index\');
    }
}

