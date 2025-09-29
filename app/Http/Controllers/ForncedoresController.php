<?php

namespace App\Http\Controllers;

use App\Models\Forncedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ForncedoresController extends Controller
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
        $fornecedores = Forncedor::all();
        return view('fornecedores.listar', compact('fornecedores'));
    }

    public function create()
    {
        return view('fornecedores.adicionar');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3|max:30'
        ]);

        $fornecedor = new Forncedor();
        $fornecedor->nome = $request->nome;
        $fornecedor->email = $request->email;
        $fornecedor->telefone = $request->telefone;
        $fornecedor->save();

        return redirect()->route('fornecedores.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function show($id)
    {
        $dados = [
            'fornecedor' => Forncedor::findOrFail(Crypt::decryptString($id))
        ];

        return view('fornecedores.detalhes', compact('dados'));
    }

    public function edit($id)
    {
        $dados = [
            'fornecedor' => Forncedor::findOrFail(Crypt::decryptString($id))
        ];

        return view('fornecedores.editar', compact('fornecedor'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3|max:30'
        ]);

        $fornecedor = Forncedor::findOrFail($request->id);

        $fornecedor->update([
            'nome' => $request->nome
        ]);

        return redirect()->route('fornecedores.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function confirm($id)
    {
        $dados = [
            'fornecedor' => Forncedor::findOrFail(Crypt::decryptString($id))
        ];

        return view('fornecedores.confirmar', compact('dados'));
    }

    public function destroy($id)
    {
        $fornecedor = Forncedor::findOrFail(Crypt::decryptString($id));
        $fornecedor->delete();
        return redirect()->route('fornecedores.index');
    }
}

