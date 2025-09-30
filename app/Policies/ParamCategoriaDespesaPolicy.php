<?php

namespace App\Policies;

use App\Models\ParamCategoriaDespesa;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParamCategoriaDespesaPolicy
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

    public function view(User $user, ParamCategoriaDespesa $paramCategoriaDespesa)
    {
        return $user->isAdmin();
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, ParamCategoriaDespesa $paramCategoriaDespesa)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, ParamCategoriaDespesa $paramCategoriaDespesa)
    {
        return $user->isAdmin();
    }

    public function restore(User $user, ParamCategoriaDespesa $paramCategoriaDespesa)
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, ParamCategoriaDespesa $paramCategoriaDespesa)
    {
        return $user->isAdmin();
    }
}
