<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParamDetalheProgramaVacinacao extends Model
{
    use HasFactory;
    protected $table = 'param_detalhes_programa_vacinacao';

    public function programa()
    {
        return $this->belongsTo(ParamProgramaVacinacao::class, 'param_programa_vacinacao_id');
    }

    public function via_aplicacao()
    {
        return $this->belongsTo(ParamViaAplicacao::class, 'param_via_aplicacao_id');
    }
}
