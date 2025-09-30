<?php

namespace App\Policies;

use App\Models\Morte;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MortePolicy
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

    public function view(User $user, Morte $morte)
    {
        return $user->isAdmin();
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, Morte $morte)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Morte $morte)
    {
        return $user->isAdmin();
    }

    public function restore(User $user, Morte $morte)
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, Morte $morte)
    {
        return $user->isAdmin();
    }
}
