<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlePeso extends Model
{
    use HasFactory;
    protected $fillable = ['peso_real', 'data_pesagem'];
    protected $table = 'controle_peso';
}
