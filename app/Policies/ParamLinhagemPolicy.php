<?php

namespace App\Policies;

use App\Models\ParamLinhagem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParamLinhagemPolicy
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

    public function view(User $user, ParamLinhagem $paramLinhagem)
    {
        return $user->isAdmin();
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, ParamLinhagem $paramLinhagem)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, ParamLinhagem $paramLinhagem)
    {
        return $user->isAdmin();
    }

    public function restore(User $user, ParamLinhagem $paramLinhagem)
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, ParamLinhagem $paramLinhagem)
    {
        return $user->isAdmin();
    }
}
