<x-admin titleWindow="Detalles de la Cita" :breadcrumbs="[
    ['name' => 'Panel Administrador', 'route' => route('admin.dashboard')],
    ['name' => 'Gestionar Citas', 'route' => route('admin.appointments.index')],
    ['name' => 'Detalles de la Cita'],
]">

    <x-card>
        <x-slot-header eyebrow="Gestión de citas" title="Detalles de la Cita"
            description="Consulta la información del cliente, contador, servicio y fecha programada. Desde esta vista puedes revisar los datos principales antes de realizar alguna acción." />

        <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between mb-8">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-3">
                <div class="bg-gray-50 px-4 py-3 rounded-lg">
                    <p class="text-xs font-medium uppercase tracking-wide text-gray-500"> Número de cita</p>
                    <p class="mt-1 text-sm font-semibold text-gray-900">#{{ $appointment->id }}</p>
                </div>
                <div class="bg-gray-50 px-4 py-3 rounded-lg">
                    <p class="text-xs font-medium uppercase tracking-wide text-gray-500"> Cliente</p>
                    <p class="mt-1 truncate text-sm font-semibold text-gray-900"> {{ $appointment->client->user->name }}
                        {{ $appointment->client->user->last_name }}</p>
                </div>
                <div class="bg-gray-50 px-4 py-3 rounded-lg">
                    <p class="text-xs font-medium uppercase tracking-wide text-gray-500"> Estado</p>
                    <span class="mt-1 inline-flex bg-green-100 px-2 py-0.5 text-xs font-semibold text-green-700">
                        {{ $appointment->status }} </span>
                </div>
            </div>
            <div class="flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-end">
                <x-button md href="{{ route('admin.clients.index') }}" text="Regresar" icon="arrow-left"
                    color="gray"outline />
            </div>
        </div>

        <hr class="mb-8 border-gray-200" />

        <x-tabs :active="$defaultTab">
            <x-slot name="header">
                <x-tabs-link tab="client-information">
                    <i class="fa-solid fa-user me-2"></i>Información del Cliente
                </x-tabs-link>
                <x-tabs-link tab="fiscal-information">
                    <i class="fa-solid fa-building-columns me-2"></i>Información Fiscal del Cliente
                </x-tabs-link>
                <x-tabs-link tab="appointments-details">
                    <i class="fa-solid fa-calendar me-2"></i>Información de la Cita
                </x-tabs-link>
            </x-slot>

            <x-tab-content tab="client-information">
                <x-detail-field label="Nombre: " :value="$appointment->client->user->name" />
                <x-detail-field label="Apellido: " :value="$appointment->client->user->last_name" />
                <x-detail-field label="Email: " :value="$appointment->client->user->email" />
                <x-detail-field label="Número de Teléfono: " :value="$appointment->client->user->phone_number" />
                <x-detail-field label="RFC: " :value="$appointment->client->user->rfc" />
                <x-detail-field label="CURP: " :value="$appointment->client->user->curp" />
            </x-tab-content>
            <x-tab-content tab="fiscal-information">
                <x-detail-field label="Tipo de Persona: " :value="$appointment->client->person_type" />
                <x-detail-field label="Régimen Fiscal: " :value="$appointment->client->fiscal_regime" />
                <x-detail-field label="Actividad Económica: " :value="$appointment->client->economic_activity" />
                <x-detail-field label="Uso del CFDI: " :value="$appointment->client->cfdi_use" />
                <x-detail-field label="Dirección: " :value="$appointment->client->address" />
                <x-detail-field label="Código Postal: " :value="$appointment->client->zip_code" />
                <x-detail-field label="Status" :value="$appointment->client->status" />
            </x-tab-content>

            <x-tab-content tab="appointments-details">
                <x-detail-field label="Tipo de Servicio: " :value="$appointment->service->name" />
                <x-detail-field label="Empleado Asignado: " :value="$appointment->accountant->user->name . ' ' . $appointment->accountant->user->last_name" />
                <x-detail-field label="Fecha Programada: " :value="$appointment->scheduled_at->format('d M Y H:i A')" />
                <x-detail-field label="Notas de la cita: " :value="$appointment->notes ?? 'No hay comentarios'" />
                <x-detail-field label="Status" :value="$appointment->status" />
            </x-tab-content>
        </x-tabs>
    </x-card>
</x-admin>
