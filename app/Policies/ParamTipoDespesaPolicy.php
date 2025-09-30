<?php

namespace App\Policies;

use App\Models\ParamTipoDespesa;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParamTipoDespesaPolicy
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

    public function view(User $user, ParamTipoDespesa $paramTipoDespesa)
    {
        return $user->isAdmin();
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, ParamTipoDespesa $paramTipoDespesa)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, ParamTipoDespesa $paramTipoDespesa)
    {
        return $user->isAdmin();
    }

    public function restore(User $user, ParamTipoDespesa $paramTipoDespesa)
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, ParamTipoDespesa $paramTipoDespesa)
    {
        return $user->isAdmin();
    }
}
