<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ColaboradoresController extends Controller
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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colaborators = User::with('detail', 'department')->where('role', '<>', 'admin')->get();
        return view('colaborators.admin-all-colaborators', compact('colaborators'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $colaborator)
    {
        // A permissão 'rh' não está sendo tratada pelo middleware global, então a mantemos aqui.
        // verificar se o id é o mesmo do usuário // nao pode mostrar os seus próprios detalhes
        if (Auth::user()->id === $colaborator->id) {
            return redirect()->route('home');
        }

        $colaborator->load('detail', 'department');

        return view('colaborators.show-details', compact('colaborator'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $colaborator)
    {
        if (Auth::user()->id === $colaborator->id) {
            return redirect()->route('home')->with('error', 'Você não pode excluir seu próprio perfil.');
        }

        $colaborator->delete();

        return redirect()->route('colaborators.all')->with('success', 'Colaborador excluído com sucesso!');
    }
}

