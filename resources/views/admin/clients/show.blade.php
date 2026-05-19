<x-admin titleWindow="Detalles del Cliente" :breadcrumbs="[
    ['name' => 'Panel Administrador', 'route' => route('admin.dashboard')],
    ['name' => 'Gestionar Clientes', 'route' => route('admin.clients.index')],
    ['name' => 'Detalles Cliente'],
]">
    <x-card>
        <x-slot-header eyebrow="Gestión de Clientes" title="Detalles del Cliente"
            description="Consulta la información del cliente. Desde esta vista puedes revisar los datos principales antes de realizar alguna acción." />

        <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between mb-8">
            <div class="flex items-center gap-4 min-w-0">
                <img src="{{ $client->profile_photo_url }}" alt="{{ $client->name }}"
                    class="w-16 h-16 sm:w-20 sm:h-20 rounded-full object-cover shrink-0 ring-4 ring-gray-100">
                <div class="min-w-0">
                    <h3 class="text-xl sm:text-2xl font-semibold text-gray-900 truncate">
                        {{ "$client->name $client->last_name" }}</h3>
                    <p class="text-sm text-gray-500 truncate">{{ $client->email }}</p>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-end">
                <x-button md href="{{ route('admin.clients.index') }}" text="Regresar" icon="arrow-left" color="gray"
                    outline />
            </div>
        </div>

        <hr class="mb-8 border-gray-200" />

        <div
            class="flex flex-col gap-4 rounded-2xl border border-indigo-100 bg-indigo-50/60 p-5 sm:flex-row sm:items-center sm:justify-between sm:p-6 mt-8 mb-8">
            <div class="flex items-start gap-4">
                <div>
                    <span class="block text-sm font-semibold uppercase tracking-wide text-indigo-700">¿Necesitas editar
                        información del cliente?</span>
                    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600"> Puedes actualizar sus datos personales,
                        documentos o gestionar sus citas desde la sección de edición.</p>
                </div>
            </div>

            <div class="shrink-0">
                <x-button sm text="Editar Usuario" icon="pencil" href="{{ route('admin.clients.edit', $client) }}"
                    color="indigo" />
            </div>
        </div>

        <x-tabs :active="$defaultTab">
            <x-slot name="header">
                <x-tabs-link tab="general-information">
                    <i class="fa-solid fa-info-circle me-2"></i>
                    <span>Información General</span>
                </x-tabs-link>

                <x-tabs-link tab="fiscal-information">
                    <i class="fa-solid fa-building-columns me-2"></i>
                    <span>Información Fiscal</span>
                </x-tabs-link>

                <x-tabs-link tab="documents">
                    <i class="fa-solid fa-file me-2"></i>
                    <span>Documentos Relacionados</span>
                </x-tabs-link>

                <x-tabs-link tab="appointments">
                    <i class="fa-solid fa-calendar me-2"></i>
                    <span>Registro de Citas</span>
                </x-tabs-link>
            </x-slot>

            <x-tab-content tab="general-information">
                <x-detail-field label="Nombre: " :value="$client->name" />
                <x-detail-field label="Apellido: " :value="$client->last_name" />
                <x-detail-field label="Email: " :value="$client->email" />
                <x-detail-field label="Número de Teléfono: " :value="$client->phone_number" />
                <x-detail-field label="RFC: " :value="$client->rfc" />
                <x-detail-field label="CURP: " :value="$client->curp" />
            </x-tab-content>


            <x-tab-content tab="fiscal-information">
                <x-detail-field label="Tipo de Persona: " :value="$client->client->person_type" />
                <x-detail-field label="Régimen Fiscal: " :value="$client->client->fiscal_regime" />
                <x-detail-field label="Actividad Económica: " :value="$client->client->economic_activity" />
                <x-detail-field label="Uso del CFDI: " :value="$client->client->cfdi_use" />
                <x-detail-field label="Dirección: " :value="$client->client->address" />
                <x-detail-field label="Código Postal: " :value="$client->client->zip_code" />
                <x-detail-field label="Status" :value="$client->client->status" />
                <x-detail-field label="Notas: " :value="$client->client->notes" />
            </x-tab-content>

            <x-tab-content tab="documents">
                <div class="col-span-full rounded-2xl border border-dashed border-gray-300 bg-gray-50 p-8 text-center">
                    <i class="fa-solid fa-file-lines text-3xl text-gray-400 mb-3"></i>
                    <p class="text-sm font-medium text-gray-700">Aquí aparecerán los documentos del cliente.</p>
                    <p class="text-sm text-gray-500 mt-1">Todavía no hay documentos registrados.</p>
                </div>
            </x-tab-content>

            <x-tab-content tab="appointments">
                <div class="space-y-4">
                    @forelse ($appointments as $appointment)
                        <div class="rounded-xl border border-gray-200 bg-white p-4">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $appointment->service?->name ?? 'Sin servicio' }}</p>
                                    <p class="mt-1 text-sm text-gray-500">Contador: {{ $appointment->accountant?->user?->name ?? 'Sin contador' }} {{ $appointment->accountant?->user?->last_name ?? '' }}</p>
                                    <p class="mt-1 text-sm text-gray-500">Fecha:{{ $appointment->scheduled_at ? \Carbon\Carbon::parse($appointment->scheduled_at)->format('d M Y h:i A') : '--' }} </p>
                                    <p class="mt-1 text-sm text-gray-500">Costo de la cita: ${{ $appointment->price ?? 'Sin precio' }} MXN</p>
                                </div>
                                <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-medium text-indigo-700">{{ $appointment->status }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="rounded-xl border border-gray-200 bg-gray-50 p-6 text-center">
                            <p class="text-sm text-gray-500">Este cliente todavía no tiene citas registradas.</p>
                        </div>
                    @endforelse
                </div>
            </x-tab-content>
        </x-tabs>
    </x-card>
</x-admin>
