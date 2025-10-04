<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class FuncionariosController extends Controller
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
            'funcionarios' => Funcionario::orderBy('nome', 'asc')->get()
        ];

        return view('funcionarios.listar', compact('dados'));
    }

    public function create()
    {
        return view('funcionarios.adicionar');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3|max:30'
        ]);

        $funcionario = new Funcionario();
        $funcionario->nome = $request->nome;
        $funcionario->save();

        return redirect()->route('funcionarios.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function show($id)
    {
        $dados = [
            'funcionario' => Funcionario::findOrFail(Crypt::decryptString($id))
        ];

        return view('funcionarios.detalhes', compact('dados'));
    }

    public function edit($id)
    {
        $dados = [
            'funcionario' => Funcionario::findOrFail(Crypt::decryptString($id))
        ];

        return view('funcionarios.editar', compact('dados'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:3|max:30'
        ]);

        $funcionario = Funcionario::findOrFail($request->id);

        $funcionario->update([
            'nome' => $request->nome
        ]);

        return redirect()->route('funcionarios.index')->with('success', 'Gravado com sucesso!!!');
    }

    public function confirm($id)
    {
        $dados = [
            'funcionario' => Funcionario::findOrFail(Crypt::decryptString($id))
        ];

        return view('funcionarios.confirmar', compact('dados'));
    }

    public function destroy($id)
    {
        $funcionario = Funcionario::findOrFail(Crypt::decryptString($id));
        $funcionario->delete();
        return redirect()->route('funcionarios.index');
    }
}

