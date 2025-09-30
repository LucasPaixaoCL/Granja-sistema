<?php

namespace App\Policies;

use App\Models\ParamNaturezaDespesa;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParamNaturezaDespesaPolicy
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

    public function view(User $user, ParamNaturezaDespesa $paramNaturezaDespesa)
    {
        return $user->isAdmin();
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, ParamNaturezaDespesa $paramNaturezaDespesa)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, ParamNaturezaDespesa $paramNaturezaDespesa)
    {
        return $user->isAdmin();
    }

    public function restore(User $user, ParamNaturezaDespesa $paramNaturezaDespesa)
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, ParamNaturezaDespesa $paramNaturezaDespesa)
    {
        return $user->isAdmin();
    }
}
