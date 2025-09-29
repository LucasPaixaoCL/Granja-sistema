<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id');
    }

    public function formato()
    {
        return $this->belongsTo(Formato::class, 'formato_id');
    }

    public function forma_pgto()
    {
        return $this->belongsTo(FormaPgto::class, 'forma_pgto_id');
    }

    public function situacao()
    {
        return $this->belongsTo(ParamSituacaoPagamento::class, 'situacao_id');
    }
}
