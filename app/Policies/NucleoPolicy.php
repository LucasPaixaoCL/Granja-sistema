<?php

namespace App\Policies;

use App\Models\Nucleo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NucleoPolicy
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

    public function view(User $user, Nucleo $nucleo)
    {
        return $user->isAdmin();
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, Nucleo $nucleo)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Nucleo $nucleo)
    {
        return $user->isAdmin();
    }

    public function restore(User $user, Nucleo $nucleo)
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, Nucleo $nucleo)
    {
        return $user->isAdmin();
    }
}
