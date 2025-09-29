<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParamSituacaoPagamento extends Model
{
    use HasFactory;
    protected $table = 'param_situacao_pagamento';

    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }
}
