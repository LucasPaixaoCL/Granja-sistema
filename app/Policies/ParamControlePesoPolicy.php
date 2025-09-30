<?php

namespace App\Policies;

use App\Models\ParamControlePeso;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParamControlePesoPolicy
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

    public function view(User $user, ParamControlePeso $paramControlePeso)
    {
        return $user->isAdmin();
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, ParamControlePeso $paramControlePeso)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, ParamControlePeso $paramControlePeso)
    {
        return $user->isAdmin();
    }

    public function restore(User $user, ParamControlePeso $paramControlePeso)
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, ParamControlePeso $paramControlePeso)
    {
        return $user->isAdmin();
    }
}
