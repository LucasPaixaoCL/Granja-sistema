<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (!Auth::user()->can('admin')) {
                abort(403, 'Você não tem permissão para acessar esta página!');
            }
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::orderBy('name', 'asc')->get();
        return view('department.departments', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.add-department');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepartmentRequest $request)
    {
        // A autorização e validação são tratadas pelo StoreDepartmentRequest
        Department::create([
            'name' => $request->name
        ]);

        return redirect()->route('departments.index')->with('success', 'Departamento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        // Este método não é usado na implementação original, mas é parte do resource controller.
        // Pode ser implementado se houver uma view de detalhes para um único departamento.
        abort(404); // Ou redirecionar para a lista, ou implementar a view.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        if ($this->isDepartmentBlocked($department->id)) {
            return redirect()->route('departments.index')->with('error', 'Este departamento não pode ser editado.');
        }

        return view('department.edit-department', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        // A autorização e validação são tratadas pelo UpdateDepartmentRequest
        if ($this->isDepartmentBlocked($department->id)) {
            return redirect()->route('departments.index')->with('error', 'Este departamento não pode ser atualizado.');
        }

        $department->update([
            'name' => $request->name
        ]);

        return redirect()->route('departments.index')->with('success', 'Departamento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        if ($this->isDepartmentBlocked($department->id)) {
            return redirect()->route('departments.index')->with('error', 'Este departamento não pode ser excluído.');
        }

        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Departamento excluído com sucesso!');
    }

    private function isDepartmentBlocked($id)
    {
        return in_array(intval($id), [1, 2]);
    }
}

