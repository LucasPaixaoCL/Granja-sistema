<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParamProgramaVacinacao extends Model
{
    use HasFactory;
    protected $table = 'param_programa_vacinacao';

    public function detalhes()
    {
        return $this->hasMany(ParamDetalheProgramaVacinacao::class, 'param_programa_vacinacao_id');
    }

    public function lote()
    {
        return $this->belongsTo(Lote::class, 'param_programa_vacinacao_id');
    }
}
