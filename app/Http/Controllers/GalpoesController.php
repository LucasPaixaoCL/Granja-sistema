<?php

namespace App\Http\Controllers;

use App\Models\Galpao;
use App\Http\Requests\StoreGalpaoRequest;
use App\Http\Requests\UpdateGalpaoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class GalpoesController extends Controller
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
            "galpoes" => Galpao::orderBy("descricao")->get()
        ];

        return view("galpoes.listar", compact("dados"));
    }

    public function create()
    {
        return view("galpoes.adicionar");
    }

    public function store(StoreGalpaoRequest $request)
    {

        $galpao = new Galpao();
        $galpao->descricao = $request->descricao;
        $galpao->largura = $request->largura;
        $galpao->comprimento = $request->comprimento;
        $galpao->densidade = $request->densidade;
        $galpao->save();

        return redirect()->route("galpoes.index")->with("success", "Gravado com sucesso!!!");
    }

    public function show(Galpao $galpao)
    {
        $dados = [
            "galpao" => $galpao
        ];

        return view("galpoes.detalhes", compact("dados"));
    }

    public function edit(Galpao $galpao)
    {
        $dados = [
            "galpao" => $galpao
        ];

        return view("galpoes.editar", compact("dados"));
    }

    public function update(UpdateGalpaoRequest $request, Galpao $galpao)
    {

        $galpao->update([
            "descricao" => $request->descricao,
            "largura" => $request->largura,
            "comprimento" => $request->comprimento,
            "densidade" => $request->densidade
        ]);

        return redirect()->route("galpoes.index")->with("success", "Gravado com sucesso!!!");
    }



    public function destroy(Galpao $galpao)
    {

        if ($galpao->lotes()->exists()) {
            return back()->with("error", "Não é possível excluir este galpão pois há lotes associados a ele.");
        }

        $galpao->delete();
        return redirect()->route("galpoes.index");
    }
}

