<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galpao extends Model
{
    use HasFactory;
    protected $table = 'galpoes';

    public function lotes()
    {
        return $this->hasMany(Lote::class, 'galpoes_id');
    }
}
