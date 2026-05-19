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
        $defaultTab = 'general-information';
        return view("admin.clients.create", compact('defaultTab'));
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
            // validate client data
            'person_type' => 'nullable|in:Persona Física,Persona Moral',
            'fiscal_regime' => 'nullable|size:3|in:601,603,605,606,612,626',
            'economic_activity' => 'nullable|in:Servicios profesionales,Comercio al por menor,Restaurantes y cafeterías,Servicios de tecnología,Arrendamiento de inmuebles,Otro',
            'cfdi_use' => 'nullable|max:4|in:G01,G02,G03,I01,I02,I03,I04,D01,D10,S01,CP01',
            'address' => 'nullable|string|max:255',
            'zip_code' => 'nullable|digits:5',
            'status' => 'nullable|in:Activo,Inactivo,Pendiente,Suspendido',
            'notes' => 'nullable|string|max:255',
        ]);

        // user data
        $userData = [
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'rfc' => $data['rfc'],
            'curp' => $data['curp'],
            'password' => $data['password'],
        ];

        // client data
        $clientData = [
            'person_type' => $data['person_type'] ?? null,
            'fiscal_regime' => $data['fiscal_regime'] ?? null,
            'economic_activity' => $data['economic_activity'] ?? null,
            'cfdi_use' => $data['cfdi_use'] ?? null,
            'address' => $data['address'] ?? null,
            'zip_code' => $data['zip_code'] ?? null,
            'status' => $data['status'] ?? 'Activo',
            'notes' => $data['notes'] ?? null,
        ];

        // create user and assign role
        $user = User::create($userData);
        $user->assignRole('Cliente');
        $user->client()->Create($clientData);

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
        $client->load(['client.appointments.accountant.user', 'client.appointments.service',]);
        $appointments = $client->client?->appointments ?? collect();
        return view('admin.clients.show', compact('client', 'defaultTab', 'appointments'));
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
            // validate client data
            'person_type' => 'nullable|in:Persona Física,Persona Moral',
            'fiscal_regime' => 'nullable|size:3|in:601,603,605,606,612,626',
            'economic_activity' => 'nullable|in:Servicios profesionales,Comercio al por menor,Restaurantes y cafeterías,Servicios de tecnología,Arrendamiento de inmuebles,Otro',
            'cfdi_use' => 'nullable|max:4|in:G01,G02,G03,I01,I02,I03,I04,D01,D10,S01,CP01',
            'address' => 'nullable|string|max:255',
            'zip_code' => 'nullable|digits:5',
            'status' => 'nullable|in:Activo,Inactivo,Pendiente,Suspendido',
            'notes' => 'nullable|string|max:255',
        ]);

        // user data
        $userData = [
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'rfc' => $data['rfc'],
            'curp' => $data['curp'],
        ];

        // update password only if it was provided
        if (!empty($data['password'])) {
            $userData['password'] = $data['password'];
        }

        // client data
        $clientData = [
            'person_type' => $data['person_type'] ?? null,
            'fiscal_regime' => $data['fiscal_regime'] ?? null,
            'economic_activity' => $data['economic_activity'] ?? null,
            'cfdi_use' => $data['cfdi_use'] ?? null,
            'address' => $data['address'] ?? null,
            'zip_code' => $data['zip_code'] ?? null,
            'status' => $data['status'] ?? 'Activo',
            'notes' => $data['notes'] ?? null,
        ];

        // update client
        $client->update($userData);
        $client->client()->updateOrCreate(['user_id' => $client->id], $clientData);


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
