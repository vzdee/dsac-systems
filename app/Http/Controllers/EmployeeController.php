<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use TallStackUi\Traits\Interactions;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use Interactions;

    public function index()
    {
        //
        return view("admin.employees.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.employees.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // convert uppercase for rfc and curp
        $request->merge(['rfc' => strtoupper($request->rfc), 'curp' => strtoupper($request->curp)]);

        //validate data
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:15|unique:users',
            'rfc' => 'required|string|min:13|max:13|regex:/^[A-ZÑ&]{4}[0-9]{6}[A-Z0-9]{3}$/|unique:users',
            'curp' => 'required|string|min:18|max:18|regex:/^[A-Z][AEIOUX][A-Z]{2}[0-9]{6}[HM][A-Z]{5}[A-Z0-9][0-9]$/|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // create user and assign role
        $user = User::create($data);
        $user->assignRole('Contador');

        // redirect and flash message
        $this->toast()
            ->success('Creación Exitosa', 'Empleado creado correctamente')
            ->flash()
            ->send();
        return redirect()->route('admin.employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $employee)
    {
        //
        return view("admin.employees.edit", compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $employee)
    {
        // convert uppercase for rfc and curp
        $request->merge(['rfc' => strtoupper($request->rfc), 'curp' => strtoupper($request->curp)]);

        // validate data
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users,email,' . $employee->id,
            'phone_number' => 'required|string|max:15|unique:users,phone_number,' . $employee->id,
            'rfc' => 'required|string|min:13|max:13|regex:/^[A-ZÑ&]{4}[0-9]{6}[A-Z0-9]{3}$/|unique:users,rfc,' . $employee->id,
            'curp' => 'required|string|min:18|max:18|regex:/^[A-Z][AEIOUX][A-Z]{2}[0-9]{6}[HM][A-Z]{5}[A-Z0-9][0-9]$/|unique:users,curp,' . $employee->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if (empty($data['password'])) {
            unset($data['password']);
        }

        // find and update user
        $employee->update($data);

        // redirect and flash message
        $this->toast()
            ->success('Guardado Exitoso', 'Empleado actualizado correctamente')
            ->flash()
            ->send();
        return redirect()->route('admin.employees.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $employee)
    {
        
    }
}
