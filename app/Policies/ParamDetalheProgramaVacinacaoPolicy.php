<?php

namespace App\Policies;

use App\Models\ParamDetalheProgramaVacinacao;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParamDetalheProgramaVacinacaoPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }

    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    public function view(User $user, ParamDetalheProgramaVacinacao $paramDetalheProgramaVacinacao)
    {
        return $user->isAdmin();
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, ParamDetalheProgramaVacinacao $paramDetalheProgramaVacinacao)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, ParamDetalheProgramaVacinacao $paramDetalheProgramaVacinacao)
    {
        return $user->isAdmin();
    }

    public function restore(User $user, ParamDetalheProgramaVacinacao $paramDetalheProgramaVacinacao)
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, ParamDetalheProgramaVacinacao $paramDetalheProgramaVacinacao)
    {
        return $user->isAdmin();
    }
}
