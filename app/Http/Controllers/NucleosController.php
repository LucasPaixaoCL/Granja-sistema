<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNucleoRequest;
use App\Http\Requests\UpdateNucleoRequest;
use App\Models\Lote;
use App\Models\Nucleo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class NucleosController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware(function ($request, $next) {
            if (!Auth::user()->can("admin")) {
                abort(403, "Você não tem permissão para acessar esta página!");
            }
            return $next($request);
        });
    }

    public function index()
    {
        $dados = [
            "nucleos" => Nucleo::select("*")
                ->limit(10)
                ->get(),
        ];

        return view("nucleos.listar", ["dados" => $dados]);
    }

    public function create()
    {
        $dados = [
            "situacoes" => [
                ["id" => 1, "descricao" => "Ativo"],
                ["id" => 0, "descricao" => "Inativo"],
            ],
        ];

        return view("nucleos.adicionar", ["dados" => $dados]);
    }

    public function store(StoreNucleoRequest $request)
    {
        $nucleo = new Nucleo;
        $nucleo->user_id = 1;
        $nucleo->descricao = $request->descricao;
        $nucleo->area_total = $request->area_total;
        $nucleo->observacoes = $request->observacoes;
        $nucleo->situacao = $request->situacao;
        $nucleo->created_at = now();
        $nucleo->updated_at = now();
        $nucleo->save();

        return redirect()->route("nucleos.index")->with("success", "Gravado com sucesso!!!");
    }

    public function show(Nucleo $nucleo)
    {

        $dados = [
            "nucleo" => $nucleo,
            "total_lotes" => Lote::count(),
        ];

        return view("nucleos.detalhes", ["dados" => $dados]);
    }

    public function edit(Nucleo $nucleo)
    {

        $dados = [
            "id" => $nucleo->id,
            "nucleo" => $nucleo,
            "situacoes" => [
                ["id" => 1, "descricao" => "Ativo"],
                ["id" => 0, "descricao" => "Inativo"],
            ],
        ];

        return view("nucleos.editar", ["dados" => $dados]);
    }

    public function update(UpdateNucleoRequest $request, Nucleo $nucleo)
    {
        $nucleo->user_id = 1;
        $nucleo->descricao = $request->descricao;
        $nucleo->area_total = $request->area_total;
        $nucleo->observacoes = $request->observacoes;
        $nucleo->situacao = $request->situacao;
        $nucleo->updated_at = now();
        $nucleo->save();

        return redirect()->route("nucleos.index")->with("success", "Gravado com sucesso!!!");
    }


    public function destroy(Nucleo $nucleo)
    {

        if ($nucleo->lotes()->exists()) {
            return back()->with("error", "Não é possível excluir este núcleo pois há lotes associados a ele.");
        }

        $nucleo->delete();

        return redirect()->route("nucleos.index");
    }
}

