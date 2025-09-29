<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'email', 'telefone', 'titulo', 'arquivo'];

    public function vendas()
    {
        return $this->hasMany(Venda::class);
    }

    protected static function booted() // função para remover os arquivos quando o registro é excluído
    {
        static::deleting(function ($cliente) {
            if ($cliente->arquivo && Storage::disk('public')->exists($cliente->arquivo)) {
                Storage::disk('public')->delete($cliente->arquivo);
            }
        });
    }
}
