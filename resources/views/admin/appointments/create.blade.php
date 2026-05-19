<x-admin titleWindow="Crear Nueva Cita" :breadcrumbs="[
    ['name' => 'Panel Administrador', 'route' => route('admin.dashboard')],
    ['name' => 'Gestionar Citas', 'route' => route('admin.appointments.index')],
    ['name' => 'Crear Nueva Cita'],
]">
    <x-card>
        <x-slot:header>
            <div class="flex flex-col items-start gap-2">
                <h2 class="text-3xl font-semibold leading-tight text-gray-800">Crear Nueva Cita</h2>
                <p class="mb-4 text-gray-600">Aquí puedes crear una nueva cita para tu sistema. Completa el formulario
                    con la información necesaria y haz clic en "Guardar" para agregar la cita a tu sistema.</p>
            </div>
        </x-slot:header>

        <livewire:admin.appointments.create-appointment />
    </x-card>
</x-admin>
