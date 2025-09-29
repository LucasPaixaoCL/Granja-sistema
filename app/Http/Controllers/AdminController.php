<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        Auth::user()->can('admin') ?: abort(403, 'Você não tem permissão para acessar esta página!');
       
        return view('home', compact('data'));
    }
}
