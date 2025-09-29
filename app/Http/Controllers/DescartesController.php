<?php

namespace App\Http\Controllers;

use App\Models\Descarte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DescartesController extends Controller
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
            \'descartes\' => Descarte::orderBy(\'data_descarte\', \'desc\')->get()
        ];

        return view(\'descartes.listar\', compact(\'dados\'));
    }

    public function create()
    {
        return view(\'descartes.adicionar\');
    }

    public function store(Request $request)
    {
        $request->validate([
            \'data_descarte\' => \'required|date|unique:descartes,data_descarte\',
            \'qtde_ovos\' => \'required|integer|min:1\'
        ]);

        $descarte = new Descarte();
        $descarte->data_descarte = $request->data_descarte;
        $descarte->qtde_ovos = $request->qtde_ovos;
        $descarte->save();

        return redirect()->route(\'descartes.index\')->with(\'success\', \'Gravado com sucesso!!!\');
    }

    public function show($id)
    {
        $dados = [
            \'descarte\' => Descarte::findOrFail(Crypt::decryptString($id))
        ];

        return view(\'descartes.detalhes\', compact(\'dados\'));
    }

    public function edit($id)
    {
        $dados = [
            \'descarte\' => Descarte::findOrFail(Crypt::decryptString($id))
        ];

        return view(\'descartes.editar\', compact(\'dados\'));
    }

    public function update(Request $request)
    {
        // $request->validate([
        //     \'nome\' => \'required|min:3|max:30\'
        // ]);

        $despesa = Descarte::findOrFail($request->id);

        $despesa->update([
            \'nome\' => $request->nome
        ]);

        return redirect()->route(\'descartes.index\')->with(\'success\', \'Gravado com sucesso!!!\');
    }

    public function confirm($id)
    {
        $dados = [
            \'descarte\' => Descarte::findOrFail(Crypt::decryptString($id))
        ];

        return view(\'descartes.confirmar\', compact(\'dados\'));
    }

    public function destroy($id)
    {
        $descarte = Descarte::findOrFail(Crypt::decryptString($id));
        $descarte->delete();
        return redirect()->route(\'descartes.index\');
    }
}

