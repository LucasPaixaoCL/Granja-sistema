<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use App\Models\FormaPgto;
use App\Models\Funcionario;
use App\Models\ParamCategoriaDespesa;
use App\Models\ParamNaturezaDespesa;
use App\Models\ParamTipoDespesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DespesasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Auth::user()->can('admin')) {
                abort(403, 'Você não tem permissão para acessar esta página!');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $dados = [
            'despesas' => Despesa::all()
        ];

        return view('despesas.listar', compact('dados'));
    }

    public function create()
    {
        $dados = [
            'tipo_despesa' => ParamTipoDespesa::orderBy('descricao')->get(),
            'natureza_despesa' => ParamNaturezaDespesa::orderBy('descricao')->get(),
            'categorias_despesa' => ParamCategoriaDespesa::orderBy('descricao')->get(),
            'vendedores' => Funcionario::where('tipo', 'A')->orderBy('nome')->get(),
            'formas_pgto' => FormaPgto::all()
        ];

        //dd($dados);

        return view('despesas.adicionar', compact('dados'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'data_vencimento' => 'required',
        //     'vlr_cobranca' => 'required',
        //     'descricao' => 'required'
        // ]);

        $despesa = new Despesa();
        $despesa->data_pedido = $request->data_pedido;
        $despesa->data_vencimento = $request->data_vencimento;
        $despesa->data_pagamento = $request->data_pagamento;
        $despesa->vlr_cobranca = $request->vlr_cobranca;
        $despesa->vlr_pago = $request->vlr_pago;
        $despesa->multa_juros = $request->multa_juros;
        $despesa->descricao = $request->descricao;
        $despesa->tipo_id = $request->tipo_despesa;
        $despesa->natureza_id = $request->natureza_despesa;
        $despesa->categoria_id = $request->categoria_despesa;
        $despesa->situacao = $request->situacao;
        $despesa->forma_pgto_id = $request->forma_pgto;
        $despesa->quem_pagou = $request->quem_pagou;
        $despesa->observacoes = $request->observacoes;
        $despesa->save();

        return redirect()->route('despesas.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function show($id)
    {
        $despesa = Despesa::findOrFail(Crypt::decryptString($id));
        return view('despesas.detalhes', compact('despesa'));
    }

    public function edit($id)
    {
        $despesa = Despesa::findOrFail(Crypt::decryptString($id));
        return view('despesas.editar', compact('despesa'));
    }

    public function update(Request $request)
    {
        // $request->validate([
        //     'nome' => 'required|min:3|max:30'
        // ]);

        $despesa = Despesa::findOrFail($request->id);

        $despesa->update([
            'nome' => $request->nome
        ]);

        return redirect()->route('despesas.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function confirm($id)
    {
        $despesa = Despesa::findOrFail(Crypt::decryptString($id));
        return view('despesas.confirmar', compact('despesa'));
    }

    public function destroy($id)
    {
        $despesa = Despesa::findOrFail(Crypt::decryptString($id));
        $despesa->delete();
        return redirect()->route('despesas.index');
    }
}

