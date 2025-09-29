<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValorParametro extends Model
{
    protected $table = 'valores_parametro';
    
    public function parametro()
    {
        return $this->belongsTo(Parametro::class);
    }
}
