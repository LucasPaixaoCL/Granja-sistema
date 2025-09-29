<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function nucleo()
    {
        return $this->belongsTo(Nucleo::class); // este utilizador pertence a um departamento
    }

    public function coletas()
    {
        return $this->hasMany(ColetaOvo::class);
    }

    public function mortes()
    {
        return $this->hasMany(Morte::class);
    }

    public function programa_vacinacao()
    {
        return $this->hasMany(ParamProgramaVacinacao::class);
    }

    public function galpoes()
    {
        return $this->belongsTo(Galpao::class);
    }
}
