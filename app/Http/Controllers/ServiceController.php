<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use TallStackUi\Traits\Interactions;

class ServiceController extends Controller
{
    use Interactions;
    public function index()
    {
        //
        return view("admin.services.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("admin.services.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate data requested
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|decimal:0,2',
            'status' => 'required|in:Activo,Inactivo',
            'description' => 'required|string|max:255',
        ]);

        // create service
        $service = Service::create($data);
        $this->toast()
            ->success('Creación Exitosa', 'Servicio creado correctamente')
            ->flash()
            ->send();
        return redirect()->route('admin.services.index');
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
    public function edit(Service $service)
    {
        //
        return view("admin.services.edit", compact("service"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|decimal:0,2',
            'status' => 'required|in:Activo,Inactivo',
            'description' => 'required|string|max:255',
        ]);
        // update service and redirect to index
        $service->update($data);
        $this->toast()
            ->success('Actualización Exitosa', 'Servicio actualizado correctamente')
            ->flash()
            ->send();
        return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
