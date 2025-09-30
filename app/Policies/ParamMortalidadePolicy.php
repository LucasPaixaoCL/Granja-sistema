<?php

namespace App\Policies;

use App\Models\ParamMortalidade;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParamMortalidadePolicy
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

    public function view(User $user, ParamMortalidade $paramMortalidade)
    {
        return $user->isAdmin();
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, ParamMortalidade $paramMortalidade)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, ParamMortalidade $paramMortalidade)
    {
        return $user->isAdmin();
    }

    public function restore(User $user, ParamMortalidade $paramMortalidade)
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, ParamMortalidade $paramMortalidade)
    {
        return $user->isAdmin();
    }
}
