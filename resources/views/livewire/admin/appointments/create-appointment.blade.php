<div>
    @php
        $selectClass = 'w-full rounded-md border-gray-300 text-sm focus:border-indigo-500 focus:ring-indigo-500';

        $summaryRow = 'flex items-start justify-between gap-4 border-b border-gray-100 pb-3';
        $summaryLabel = 'text-gray-500';
        $summaryValue = 'font-medium text-gray-700 text-right';
    @endphp
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 p-6">

        {{-- Lado izquierdo / Resumen --}}
        <div class="xl:col-span-1">
            <div class="sticky top-24 rounded-2xl border border-gray-200 bg-white p-6">
                {{-- Header resumen --}}
                <div class="mb-6">
                    <div class="flex items-center gap-4 rounded-2xl bg-indigo-50 border border-indigo-100 p-4">
                        <div
                            class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-white text-indigo-500">
                            <i class="fa-regular fa-calendar-check text-2xl"></i>
                        </div>
                        <div class="flex flex-col">
                            <h3 class="text-lg font-semibold text-indigo-600"> Resumen de la cita</h3>
                            <p class="text-sm text-indigo-500">Verifica los datos antes de guardar.</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-4 text-sm">

                    {{-- Contador --}}
                    <div class="{{ $summaryRow }}">
                        <span class="{{ $summaryLabel }}">Nombre del Empleado:</span>

                        <span class="{{ $summaryValue }}">
                            @if ($accountant_id)
                                @php
                                    $selectedAccountant = $accountants->firstWhere('id', $accountant_id);
                                @endphp

                                {{ trim(($selectedAccountant?->user?->name ?? '') . ' ' . ($selectedAccountant?->user?->last_name ?? '')) ?: 'Sin nombre' }}
                            @else
                                <span class="text-gray-400">Sin seleccionar</span>
                            @endif
                        </span>
                    </div>

                    {{-- Cliente --}}
                    <div class="{{ $summaryRow }}">
                        <span class="{{ $summaryLabel }}">Nombre del Cliente:</span>
                        <span class="{{ $summaryValue }}">
                            @if ($client_id)
                                @php
                                    $selectedClient = $clients->firstWhere('id', $client_id);
                                @endphp
                                {{ trim(($selectedClient?->user?->name ?? '') . ' ' . ($selectedClient?->user?->last_name ?? '')) ?: 'Sin nombre' }}
                            @else
                                <span class="text-gray-400">Sin seleccionar</span>
                            @endif
                        </span>
                    </div>

                    {{-- Servicio --}}
                    <div class="{{ $summaryRow }}">
                        <span class="{{ $summaryLabel }}">Tipo de Servicio:</span>
                        <span class="{{ $summaryValue }}">
                            @if ($service_id)
                                {{ $services->firstWhere('id', $service_id)?->name ?? 'Sin servicio' }}
                            @else
                                <span class="text-gray-400">Sin seleccionar</span>
                            @endif
                        </span>
                    </div>

                    {{-- Precio --}}
                    <div class="{{ $summaryRow }}">
                        <span class="{{ $summaryLabel }}">Precio Total:</span>
                        <span class="{{ $summaryValue }}">
                            @if ($service_id)
                                ${{ number_format($services->firstWhere('id', $service_id)?->price ?? 0, 2) }}
                            @else
                                --
                            @endif
                        </span>
                    </div>

                    {{-- Fecha --}}
                    <div class="{{ $summaryRow }}">
                        <span class="{{ $summaryLabel }}">Fecha de la cita:</span>
                        <span class="{{ $summaryValue }}">
                            {{ $this->formattedDate() }}
                        </span>
                    </div>

                    {{-- Hora --}}
                    <div class="{{ $summaryRow }}">
                        <span class="{{ $summaryLabel }}">Horario de la cita:</span>
                        <span class="{{ $summaryValue }}">{{ $this->formattedTime() }}</span>
                    </div>

                    {{-- Estado --}}
                    <div class="flex items-start justify-between gap-4">
                        <span class="{{ $summaryLabel }}">Estado del Servicio:</span>
                        @switch($status)
                            @case('Pendiente')
                                <span
                                    class="inline-flex items-center rounded-full bg-yellow-100 px-3 py-1 text-xs font-medium text-yellow-700">Pendiente</span>
                            @break

                            @case('Confirmada')
                                <span
                                    class="inline-flex items-center rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700">Confirmada</span>
                            @break

                            @case('Cancelada')
                                <span
                                    class="inline-flex items-center rounded-full bg-red-100 px-3 py-1 text-xs font-medium text-red-700">
                                    Cancelada</span>
                            @break

                            @case('Completada')
                                <span
                                    class="inline-flex items-center rounded-full bg-indigo-100 px-3 py-1 text-xs font-medium text-indigo-700">Completada</span>
                            @break
                        @endswitch
                    </div>
                </div>

                {{-- Aviso --}}
                <div class="mt-6 rounded-2xl border border-red-100 bg-red-50 p-4">
                    <div class="flex gap-3">
                        <div class="mt-0.5 text-red-500">
                            <i class="fa-solid fa-circle-info"></i>
                        </div>
                        <p class="text-sm leading-relaxed text-red-500">El precio se calculará automáticamente desde la
                            base de datos según el tipo de servicio seleccionado.</p>
                    </div>
                </div>

                {{-- Botones --}}
                <div class="mt-6 flex flex-col gap-3">
                    <x-button type="submit" :text="$appointment ? 'Guardar Cambios' : 'Confirmar Cita'" form="appointmentForm" color="indigo"
                        class="w-full text-sm" />
                    <x-button href="{{ route('admin.appointments.index') }}" text="Cancelar" color="gray"
                        class="w-full text-sm" outline />
                </div>
            </div>
        </div>

        {{-- Lado derecho / Formulario --}}
        <div class="xl:col-span-2">
            <form id="appointmentForm" wire:submit.prevent="save" class="space-y-6">
                {{-- Encabezado formulario --}}
                <div class="flex flex-col items-start gap-2 rounded-2xl">
                    <div class="flex p-5 items-center justify-evenly gap-4 rounded-xl bg-indigo-100 text-indigo-500">
                        <div><i class="fa-regular fa-clipboard text-4xl"></i></div>
                        <div>
                            <h2 class="text-2xl font-semibold text-indigo-800">{{ $appointment ? 'Editar detalles de la cita' : 'Detalles de la cita' }}</h2>
                            <p class="text-sm text-indigo-600">{{ $appointment ? 'Actualiza la información de la cita seleccionada.' : 'Completa el formulario para crear una nueva cita.' }}</p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

                    {{-- Empleado --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1"> Empleado <span
                                class="text-red-600">*</span> </label>
                        <select wire:model.live="accountant_id" class="{{ $selectClass }}">
                            <option value="">Selecciona un empleado para la cita</option>
                            @foreach ($accountants as $accountant)
                                <option value="{{ $accountant->id }}">
                                    {{ trim(($accountant->user?->name ?? '') . ' ' . ($accountant->user?->last_name ?? '')) ?: 'Sin nombre' }}
                                </option>
                            @endforeach
                        </select>

                        @error('accountant_id')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Cliente --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1"> Cliente <span
                                class="text-red-600">*</span></label>
                        <select wire:model.live="client_id" class="{{ $selectClass }}">
                            <option value="">Selecciona un cliente</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">
                                    {{ trim(($client->user?->name ?? '') . ' ' . ($client->user?->last_name ?? '')) ?: 'Sin nombre' }}
                                </option>
                            @endforeach
                        </select>
                        @error('client_id')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Servicio --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1"> Servicio <span
                                class="text-red-600">*</span></label>
                        <select wire:model.live="service_id" class="{{ $selectClass }}">
                            <option value="">Selecciona un servicio</option>
                            @foreach ($services as $service)
                                <option value="{{ $service->id }}">
                                    {{ $service->name }} - ${{ number_format($service->price ?? 0, 2) }}
                                </option>
                            @endforeach
                        </select>
                        @error('service_id')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Fecha --}}
                    <div>
                        <x-date label="Fecha *" wire:model.live="scheduled_date" format="DD/MM/YYYY" :min-date="now()"/>
                        @error('scheduled_date')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Hora --}}
                    <div>
                        <x-time label="Hora *" wire:model.live="scheduled_time" :step-minute="5" />
                        @error('scheduled_time')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Estado --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1"> Estado <span
                                class="text-red-600">*</span></label>
                        <select wire:model.live="status" class="{{ $selectClass }}">
                            <option value="Pendiente">Pendiente</option>
                            <option value="Confirmada">Confirmada</option>
                            <option value="Cancelada">Cancelada</option>
                            <option value="Completada">Completada</option>
                        </select>

                        @error('status')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Notas --}}
                <div>
                    <x-textarea label="Notas adicionales" wire:model="notes" rows="4" class="resize-none"
                        placeholder="Escribe alguna observación de la situación del cliente, este campo es opcional..." />
                    @error('notes')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </form>
        </div>
    </div>
</div>
