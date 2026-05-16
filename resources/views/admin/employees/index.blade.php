<x-admin titleWindow="Dashboard" :breadcrumbs="[
  ['name' => 'Panel Administrador', 'route' => route('admin.dashboard')], 
  ['name' => 'Empleados']
  ]">
    <x-card>
        <x-slot:header>
            <h2 class="text-3xl font-semibold leading-tight text-gray-800">Gestionar Empleados</h2>
        </x-slot:header>
        <livewire:employee-table />
    </x-card>


</x-admin>
