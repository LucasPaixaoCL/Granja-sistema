<?php

namespace Illuminate\Support\Facades;

use App\Models\User;

class Auth
{
    /**
     * Get the currently authenticated user.
     *
     * @return \App\Models\User|null
     */
    public static function user() { return new User(); }

    /**
     * Determine if the current user is authenticated.
     *
     * @return bool
     */
    public static function check() { return true; }
}

namespace Illuminate\Contracts\Auth;

interface Authenticatable
{
    public function can($ability, $arguments = []): bool;
}

