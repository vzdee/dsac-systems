<x-admin titleWindow="Editar Cita" :breadcrumbs="[
    ['name' => 'Panel Administrador', 'route' => route('admin.dashboard')],
    ['name' => 'Gestionar Citas', 'route' => route('admin.appointments.index')],
    ['name' => 'Editar Cita'],
]">
    <x-card>
        <x-slot-header eyebrow="Gestor de Citas" title="Editar Cita"
            description="Actualiza los datos de la cita. Desde esta vista puedes revisar los datos principales antes de realizar alguna acción." />

        <livewire:admin.appointments.create-appointment :appointment="$appointment" />
    </x-card>
</x-admin>
