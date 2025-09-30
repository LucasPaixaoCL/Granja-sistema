<?php

namespace App\Policies;

use App\Models\ParamProgramaLuz;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParamProgramaLuzPolicy
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

    public function view(User $user, ParamProgramaLuz $paramProgramaLuz)
    {
        return $user->isAdmin();
    }

    public function create(User $user)
    {
        return $user->isAdmin();
    }

    public function update(User $user, ParamProgramaLuz $paramProgramaLuz)
    {
        return $user->isAdmin();
    }

    public function delete(User $user, ParamProgramaLuz $paramProgramaLuz)
    {
        return $user->isAdmin();
    }

    public function restore(User $user, ParamProgramaLuz $paramProgramaLuz)
    {
        return $user->isAdmin();
    }

    public function forceDelete(User $user, ParamProgramaLuz $paramProgramaLuz)
    {
        return $user->isAdmin();
    }
}
