<?php

namespace App\Policies;

use App\Models\ParamConsumoRacao;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParamConsumoRacaoPolicy
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

    public function view(User $user, ParamConsumoRacao $paramConsumoRacao)
    {
        return $user->isAdmin();
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, ParamConsumoRacao $paramConsumoRacao)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, ParamConsumoRacao $paramConsumoRacao)
    {
        return $user->isAdmin();
    }

    public function restore(User $user, ParamConsumoRacao $paramConsumoRacao)
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, ParamConsumoRacao $paramConsumoRacao)
    {
        return $user->isAdmin();
    }
}
