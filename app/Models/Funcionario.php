<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    public function vendas()
    {
        return $this->hasMany(Venda::class, 'funcionario_id');
    }
}
