<?php

namespace App\Policies;

use App\Models\ParamFaseAve;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParamFaseAvePolicy
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

    public function view(User $user, ParamFaseAve $paramFaseAve)
    {
        return $user->isAdmin();
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, ParamFaseAve $paramFaseAve)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, ParamFaseAve $paramFaseAve)
    {
        return $user->isAdmin();
    }

    public function restore(User $user, ParamFaseAve $paramFaseAve)
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, ParamFaseAve $paramFaseAve)
    {
        return $user->isAdmin();
    }
}
