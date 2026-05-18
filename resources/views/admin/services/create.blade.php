<x-admin titleWindow="Dashboard" :breadcrumbs="[
    ['name' => 'Panel Administrador', 'route' => route('admin.dashboard')],
    ['name' => 'Gestionar Servicios', 'route' => route('admin.services.index')],
    ['name' => 'Crear Servicio'],
]">
    <x-card>
        <x-slot:header>
            <h2 class="text-3xl font-semibold leading-tight text-gray-800">Crear Nuevo Servicio</h2>
        </x-slot:header>

        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <x-input label="Nombre *" name="name" :value="old('name')" required autofocus autocomplete="name"
                        placeholder="Ej: Cálculo de impuestos" />
                </div>
                <div>
                    <x-input label="Precio del Servicio *" name="price" type="number" step="0.01" min="0"
                        prefix="MXN $" icon="currency-dollar" position="right" :value="old('price')" clearable
                        placeholder="1200.00" />
                </div>
                <div>
                    <x-select.styled label="Estado del servicio *" name="status" :value="old('status')" required
                        placeholder="Selecciona un estado para el servicio" :options="[['name' => 'Activo', 'id' => 'Activo'], ['name' => 'Inactivo', 'id' => 'Inactivo']]"
                        select="label:name|value:id" />
                </div>
                <div class="md:col-span-2">
                    <x-textarea label="Descripción del servicio *" name="description" :value="old('description')" required
                        placeholder="Describe brevemente qué incluye este servicio" maxlength="255" count />
                </div>
            </div>
            <div class="mt-6">
                <x-button type="submit" text="Crear Servicio" color="indigo" class="font-semibold text-[12px]" />
            </div>
        </form>
    </x-card>

</x-admin>
