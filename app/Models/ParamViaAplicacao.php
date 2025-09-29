<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParamViaAplicacao extends Model
{
    use HasFactory;
    protected $table = 'param_via_aplicacao';

    public function detalhes()
    {
        return $this->hasMany(ParamDetalheProgramaVacinacao::class, 'param_programa_vacinacao_id');
    }

    public function detalhes_via_aplicacao()
    {
        return $this->hasMany(ParamDetalheProgramaVacinacao::class, 'param_via_aplicacao_id');
    }
}
