<x-admin titleWindow="Gestionar Empleados" :breadcrumbs="[
  ['name' => 'Panel Administrador', 'route' => route('admin.dashboard')], 
  ['name' => 'Gestionar Empleados']
  ]">
    <x-card>
        <x-slot:header>
          <div class="flex flex-col items-start gap-2">
            <h2 class="text-3xl font-semibold leading-tight text-gray-800">Gestionar Empleados</h2>
            <p class="mb-4 text-gray-600">Administra los empleados de tu empresa. Puedes crear, editar o eliminar empleados según sea necesario.</p>
          </div>
        </x-slot:header>
        <div class="flex justify-end mr-8 mb-4">
          <x-button icon="plus" text="Crear Nuevo Empleado" color="indigo" class="font-semibold text-[14px]" href="{{ route('admin.employees.create') }}" md/>
        </div>
        <livewire:admin.employee-table />
    </x-card>


</x-admin>
