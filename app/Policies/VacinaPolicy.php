<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vacina;
use Illuminate\Auth\Access\HandlesAuthorization;

class VacinaPolicy
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

    public function view(User $user, Vacina $vacina)
    {
        return $user->isAdmin();
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, Vacina $vacina)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Vacina $vacina)
    {
        return $user->isAdmin();
    }

    public function restore(User $user, Vacina $vacina)
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, Vacina $vacina)
    {
        return $user->isAdmin();
    }
}
