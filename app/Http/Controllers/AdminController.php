<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
        return view("home");
    }
}

