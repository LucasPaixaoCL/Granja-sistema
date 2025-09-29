<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nucleo extends Model
{
    protected $fillable = ['user_id', 'nome'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lotes()
    {
        return $this->hasMany(Lote::class);
    }
}
