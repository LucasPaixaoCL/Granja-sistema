<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RhManagementController extends Controller
{
    public function index()
    {
        Auth::user()->can('rh') ?: abort(403, 'Você não tem permissão para acessar esta página!');
        $colaborators = User::with('detail', 'department')->where('role', 'colaborator')->get();
        return view('colaborators.colaborators', compact('colaborators'));
    }
}
