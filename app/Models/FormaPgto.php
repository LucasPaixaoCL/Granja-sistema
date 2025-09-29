<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormaPgto extends Model
{
    use HasFactory;
    protected $table = 'formas_pgto';

    public function vendas()
    {
        return $this->hasMany(Venda::class, 'forma_pgto_id');
    }
}
