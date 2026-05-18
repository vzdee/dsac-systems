<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use TallStackUi\Traits\Interactions;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    use Interactions;

    public function index()
    {
        //
        return view("admin.clients.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.clients.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // uppercase for rfc and curp
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
        $client = User::create($data);
        $client->assignRole('Cliente');

        // redirecto to clients and show success message
        $this->toast()
            ->success('Creación Exitosa', 'Cliente creado correctamente')
            ->flash()
            ->send();
        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $client)
    {
        //
        $defaultTab = 'general-information';
        return view('admin.clients.show', compact('client', 'defaultTab'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $client)
    {
        //
        $defaultTab = 'general-information';
        return view('admin.clients.edit', compact('client', 'defaultTab'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $client)
    {
        //uppercase for rfc and curp
        $request->merge(['rfc' => strtoupper($request->rfc), 'curp' => strtoupper($request->curp)]);

        // validate data
        $data = $request->validate([
            'name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:255|unique:users,email,' . $client->id,
            'phone_number' => 'required|string|max:15|unique:users,phone_number,' . $client->id,
            'rfc' => 'required|string|min:13|max:13|regex:/^[A-ZÑ&]{4}[0-9]{6}[A-Z0-9]{3}$/|unique:users,rfc,' . $client->id,
            'curp' => 'required|string|min:18|max:18|regex:/^[A-Z][AEIOUX][A-Z]{2}[0-9]{6}[HM][A-Z]{5}[A-Z0-9][0-9]$/|unique:users,curp,' . $client->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // verify if password is empty
        if (empty($data['password'])) {
            unset($data['password']);
        }

        // update client
        $client->update($data);

        // redirect to clients and show success message
        $this->toast()
            ->success('Actualización Exitosa', 'Cliente actualizado correctamente')
            ->flash()
            ->send();
        return redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
