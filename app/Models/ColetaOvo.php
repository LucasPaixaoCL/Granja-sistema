<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ColetaOvo extends Model
{
    protected $fillable = ['lote_id', 'semana', 'data_coleta', 'qtde_ovos'];

    public function lote()
    {
        return $this->belongsTo(Lote::class);
    }
}
