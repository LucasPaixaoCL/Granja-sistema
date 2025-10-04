<?php

namespace App\Http\Controllers;

use App\Models\ColetaOvo;
use App\Models\Lote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class DashboardsController extends Controller
{
    public function dashboard()
    {

        $dados = [
            'result' => $this->qtdeOvosProduzidos()
        ];
        return view('home', compact('dados'));
    }

    private function qtdeOvosProduzidos()
    {

        $totalOvos = ColetaOvo::sum('qtde_ovos');
        $totalAves = Lote::sum('qtde_aves');
        $percentualProducao = $totalAves > 0 ? ($totalOvos / $totalAves) * 100 : 0;
        $result = [
            'total_ovos' => $totalOvos,
            'totalAves' => $totalAves,
            'percentualProducao' => $percentualProducao
        ];
        return $result;
    }
}
