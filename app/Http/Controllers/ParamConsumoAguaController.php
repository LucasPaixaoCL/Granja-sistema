<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParamConsumoAguaController extends Controller
{
    public function index()
    {
        return view('parametros.consumo_agua.index');
    }
}

