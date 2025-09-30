<?php

namespace App\Policies;

use App\Models\ParamProgramaVacinacao;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParamProgramaVacinacaoPolicy
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

    public function view(User $user, ParamProgramaVacinacao $paramProgramaVacinacao)
    {
        return $user->isAdmin();
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, ParamProgramaVacinacao $paramProgramaVacinacao)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, ParamProgramaVacinacao $paramProgramaVacinacao)
    {
        return $user->isAdmin();
    }

    public function restore(User $user, ParamProgramaVacinacao $paramProgramaVacinacao)
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, ParamProgramaVacinacao $paramProgramaVacinacao)
    {
        return $user->isAdmin();
    }
}
