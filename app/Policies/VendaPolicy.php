<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Venda;
use Illuminate\Auth\Access\HandlesAuthorization;

class VendaPolicy
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

    public function view(User $user, Venda $venda)
    {
        return $user->isAdmin();
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, Venda $venda)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, Venda $venda)
    {
        return $user->isAdmin();
    }

    public function restore(User $user, Venda $venda)
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, Venda $venda)
    {
        return $user->isAdmin();
    }
}
