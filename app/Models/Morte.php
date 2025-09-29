<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Morte extends Model
{
    use HasFactory;
    protected $fillable = ['lote_id', 'semana', 'data_morte', 'qtde_,mortes'];

    public function lote()
    {
        return $this->belongsTo(Lote::class);
    }
}
