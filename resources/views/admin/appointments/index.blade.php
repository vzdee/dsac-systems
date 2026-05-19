<x-admin titleWindow="Gestionar Citas" :breadcrumbs="[
  ['name' => 'Panel Administrador', 'route' => route('admin.dashboard')], 
  ['name' => 'Gestionar Citas']
  ]">
    <x-card>
        <x-slot:header>
          <div class="flex flex-col items-start gap-2">
            <h2 class="text-3xl font-semibold leading-tight text-gray-800">Gestionar Citas</h2>
            <p class="mb-4 text-gray-600">Aqui puedes gestionar las citas de tu sistema, visualizar su información y realizar modificaciones según sea necesario. 
              <br>Tambien podrás enviar documentos según sea necesario para mantener tu sistema actualizado, seguro y profesional. </p>
          </div>
        </x-slot:header>
        <div class="flex justify-end mr-8 mb-4">
          <x-button icon="plus" text="Crear Nueva Cita" color="indigo" class="font-semibold text-[14px]" href="{{ route('admin.appointments.create') }}" md/>
        </div>

        <livewire:admin.appointment-table/> 
    </x-card>
</x-admin>
