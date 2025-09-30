<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

/**
 * @property-read \App\Models\UserDetail|null $detail
 * @property int $id
 * @property string $role
 */
class User extends Authenticable
{
    use HasFactory;
    use Notifiable;
    // use SoftDeletes; // descomentar para exclusão lógica

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role' => 'string',
    ];

    public function detail(): HasOne
    {
        return $this->hasOne(UserDetail::class); // cada usuário possui apenas um detalhe
    }

    public function department()
    {
        return $this->belongsTo(Department::class); // este utilizador pertence a um departamento
    }

    public function nucleos()
    {
        return $this->hasMany(Nucleo::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isRh(): bool
    {
        return $this->role === 'rh';
    }
}

