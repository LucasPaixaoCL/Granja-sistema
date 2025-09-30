<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVendaRequest;
use App\Http\Requests\UpdateVendaRequest;
use App\Models\Cliente;
use App\Models\FormaPgto;
use App\Models\Formato;
use App\Models\Funcionario;
use App\Models\ParamSituacaoPagamento;
use App\Models\Venda;
use Illuminate\Support\Facades\Crypt;

class VendasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', Venda::class);

        $dados = [
            'vendas' => Venda::with('cliente', 'funcionario', 'formato', 'forma_pgto', 'situacao')->orderBy('data_venda', 'desc')->get(),
        ];

        return view('vendas.listar', ['dados' => $dados]);
    }

    public function create()
    {
        $this->authorize('create', Venda::class);

        $dados = [
            'clientes' => Cliente::orderBy('nome')->get(),
            'vendedores' => Funcionario::orderBy('nome')->get(),
            'formas_pgto' => FormaPgto::all(),
            'formatos' => Formato::all(),
            'situacoes' => ParamSituacaoPagamento::all(),
        ];

        return view('vendas.adicionar', ['dados' => $dados]);
    }

    public function store(StoreVendaRequest $request)
    {
        $this->authorize('create', Venda::class);

        $venda = new Venda;
        $venda->data_venda = $request->data_venda;

        $venda->formato_id = $request->formato;
        $venda->tipo = empty($request->tipo) ? 30 : $request->tipo;
        $venda->tamanho = 'G'; // alterar
        $venda->qtde = $request->quantidade;
        $venda->valor_unit = $request->valor_unitario;
        $venda->desconto = $request->desconto;
        $quantidade = (float) $request->quantidade;
        $valor_unitario = (float) $request->valor_unitario;
        $desconto = (float) $request->desconto;

        $subtotal = $quantidade * $valor_unitario - $desconto;

        if ($subtotal !== (float) $request->subtotal) {
            return back()->with('error', 'O subtotal informado não confere com o valor calculado.');
        }

        $venda->subtotal = $subtotal;
        $venda->cliente_id = $request->cliente;
        $venda->funcionario_id = $request->vendedor;

        $situacao = $request->situacao;

        if ((int) $situacao === 0) {
            $situacao = 1;
        }

        $venda->situacao_id = $situacao;

        $venda->forma_pgto_id = $request->forma_pgto;

        $ovos_vendidos = 0;

        if ((int) $request->formato == 1) { // 1 = caixa e 2 = cartela
            $ovos_vendidos = 360 * (int) $request->quantidade;
        } else {
            $ovos_vendidos = 30 * (int) $request->quantidade; // 30 pode variar
        }

        $venda->qtde_ovos = $ovos_vendidos;

        $venda->save();

        return redirect()->route('vendas.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function show($id)
    {
        $venda = Venda::with('cliente', 'funcionario', 'forma_pgto')->findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $venda);

        $dados = [
            'venda' => $venda,
        ];

        return view('vendas.detalhes', ['dados' => $dados]);
    }

    public function edit($id)
    {
        $venda = Venda::findOrFail(Crypt::decryptString($id));
        $this->authorize('update', $venda);

        $data_prevista = $venda->data_prevista;
        $data_realizada = $venda->data_realizada;

        $dados = [
            'id' => $id,
            'data_prevista' => $data_prevista,
            'data_realizada' => $data_realizada,
        ];

        return view('vendas.editar', ['dados' => $dados]);
    }

    public function update(UpdateVendaRequest $request, Venda $venda)
    {
        $this->authorize('update', $venda);

        $venda->update([
            'nome' => $request->nome,
        ]);

        return redirect()->route('vendas.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function confirm($id)
    {
        $venda = Venda::findOrFail(Crypt::decryptString($id));
        $this->authorize('view', $venda);

        $dados = [
            'venda' => $venda,
        ];

        return view('vendas.confirmar', ['dados' => $dados]);
    }

    public function destroy($id)
    {
        $venda = Venda::findOrFail(Crypt::decryptString($id));
        $this->authorize('delete', $venda);
        $venda->delete();

        return redirect()->route('vendas.index');
    }
}
