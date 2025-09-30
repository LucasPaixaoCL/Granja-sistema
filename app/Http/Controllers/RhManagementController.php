<?php

namespace App\Http\Controllers;

use App\Models\User;

class RhManagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('viewAny', User::class);
        $colaborators = User::with('detail', 'department')->where('role', 'colaborator')->get();

        return view('colaborators.colaborators', ['colaborators' => $colaborators]);
    }
}
