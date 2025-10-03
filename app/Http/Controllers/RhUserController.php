<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmAccountEmail;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Http\Requests\StoreRhUserRequest;
use App\Http\Requests\UpdateRhUserRequest;

class RhUserController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
        $this->middleware(function ($request, $next) {
            if (!Auth::user()->can("admin")) {
                abort(403, "Você não tem permissão para acessar esta página!");
            }
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colaborators = User::with("detail")->where("role", "rh")->orderBy("name", "asc")->get();
        return view("colaborators.rh-users", compact("colaborators"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        return view("colaborators.add-rh-user", compact("departments"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRhUserRequest $request)
    {
        // A autorização e validação são tratadas pelo StoreRhUserRequest

        if ($request->select_department != 2) {
            return redirect()->route("rh-users.index")->with("error", "O departamento selecionado não é válido para usuários RH.");
        }

        $token = Str::random(60);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->confirmation_token = $token;
        $user->role = "rh";
        $user->department_id = $request->select_department;
        $user->permissions = "["rh"]";
        $user->save();

        $user->detail()->create([
            "address" => $request->address,
            "zip_code" => $request->zip_code,
            "city" => $request->city,
            "phone" => $request->phone,
            "salary" => $request->salary,
            "admission_date" => $request->admission_date
        ]);

        Mail::to($user->email)->send(new ConfirmAccountEmail(route("confirm-account", $token)));

        return redirect()->route("rh-users.index")->with("success", "Colaborador criado com sucesso!");
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $rh_user)
    {
        // O parâmetro de rota é "rh_user" devido ao model binding implícito e ao prefixo de rota "rh-users"
        // Certifique-se de que o usuário tem a role "rh"
        if ($rh_user->role !== "rh") {
            return redirect()->route("rh-users.index")->with("error", "Usuário não é um colaborador RH.");
        }
        $colaborator = $rh_user->load("detail"); // Carrega os detalhes do usuário
        return view("colaborators.edit-rh-user", compact("colaborator"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRhUserRequest $request, User $rh_user)
    {
        // A autorização e validação são tratadas pelo UpdateRhUserRequest
        if ($rh_user->role !== "rh") {
            return redirect()->route("rh-users.index")->with("error", "Usuário não é um colaborador RH.");
        }

        $rh_user->detail->update([
            "salary" => $request->salary,
            "admission_date" => $request->admission_date
        ]);

        return redirect()->route("rh-users.index")->with("success", "Colaborador atualizado com sucesso!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $rh_user)
    {
        if ($rh_user->role !== "rh") {
            return redirect()->route("rh-users.index")->with("error", "Usuário não é um colaborador RH.");
        }

        $rh_user->delete();

        return redirect()->route("rh-users.index")->with("success", "Colaborador excluído com sucesso!");
    }
}

