<x-admin titleWindow="Dashboard" :breadcrumbs="[
    ['name' => 'Panel Administrador', 'route' => route('admin.dashboard')],
    ['name' => 'Gestionar Clientes', 'route' => route('admin.clients.index')],
    ['name' => 'Editar Cliente'],
]">
    <x-card>
        <x-slot-header eyebrow="Gestor de Clientes" title="Editar Cliente"
            description="Actualiza los datos del cliente. Desde esta vista puedes revisar los datos principales antes de realizar alguna acción." />

        <form action="{{ route('admin.clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')
            <x-tabs :active="$defaultTab">
                <x-slot name="header">
                    <x-tabs-link tab="general-information">
                        <i class="fa-solid fa-info-circle me-2"></i><span>Información General</span>
                    </x-tabs-link>

                    <x-tabs-link tab="fiscal-information">
                        <i class="fa-solid fa-building-columns me-2"></i><span>Información Fiscal</span>
                    </x-tabs-link>
                </x-slot>

                <x-tab-content tab="general-information">
                    <div>
                        <x-input label="Nombre" name="name" :value="old('name', $client->name)" required autofocus autocomplete="name"
                            placeholder="Juan Carlos" />
                    </div>
                    <div>
                        <x-input label="Apellido" name="last_name" :value="old('last_name', $client->last_name)" required autocomplete="family-name"
                            placeholder="Garcia Perez" />
                    </div>
                    <div>
                        <x-input label="Correo Electronico" name="email" :value="old('email', $client->email)" required
                            autocomplete="username" placeholder="juan.garciap@example.com" />
                    </div>
                    <div>
                        <x-input label="Telefono" name="phone_number" :value="old('phone_number', $client->phone_number)" x-mask="(999) 999 9999"
                            placeholder="(123) 456 7890" required />
                    </div>
                    <div>
                        <x-input label="RFC" name="rfc" :value="old('rfc', $client->rfc)" placeholder="GAPJ850412UX9" required
                            maxlength="13" class="uppercase" />
                    </div>
                    <div>
                        <x-input label="CURP" name="curp" :value="old('curp', $client->curp)" placeholder="GAPJ850412HDFRRN03"
                            required maxlength="18" class="uppercase" />
                    </div>
                    <div>
                        <x-password label="Contraseña" type="password" name="password" autocomplete="new-password"
                            placeholder="***********" />
                    </div>
                    <div>
                        <x-password label="Confirmar Contraseña" type="password" name="password_confirmation"
                            autocomplete="new-password" placeholder="***********" />
                    </div>
                </x-tab-content>
                <x-tab-content tab="fiscal-information">
                    <div>
                        <x-select.styled label="Tipo de Persona" name="person_type" :options="[
                            ['name' => 'Persona Física', 'id' => 'Persona Física'],
                            ['name' => 'Persona Moral', 'id' => 'Persona Moral'],
                        ]"
                            select="label:name|value:id" placeholder="Selecciona el tipo de persona" value="{{ old('person_type', $client->client?->person_type) }}"/>
                    </div>
                    <div>
                        <x-select.styled label="Régimen Fiscal" name="fiscal_regime" :options="[
                            ['name' => '601 - General de Ley Personas Morales', 'id' => '601'],
                            ['name' => '603 - Personas Morales con Fines no Lucrativos', 'id' => '603'],
                            ['name' => '605 - Sueldos y Salarios e Ingresos Asimilados a Salarios', 'id' => '605'],
                            ['name' => '606 - Arrendamiento', 'id' => '606'],
                            ['name' => '612 - Personas Físicas con Actividades Empresariales y Profesionales','id' => '612',],
                            ['name' => '626 - Régimen Simplificado de Confianza', 'id' => '626'],
                        ]" select="label:name|value:id" placeholder="Selecciona el régimen fiscal" value="{{ old('fiscal_regime', $client->client?->fiscal_regime) }}" />
                    </div>
                    <div>
                        <x-select.styled label="Actividad Económica" name="economic_activity" :options="[
                            ['name' => 'Servicios profesionales', 'id' => 'Servicios profesionales'],
                            ['name' => 'Comercio al por menor', 'id' => 'Comercio al por menor'],
                            ['name' => 'Restaurantes y cafeterías', 'id' => 'Restaurantes y cafeterías'],
                            ['name' => 'Servicios de tecnología', 'id' => 'Servicios de tecnología'],
                            ['name' => 'Arrendamiento de inmuebles', 'id' => 'Arrendamiento de inmuebles'],
                            ['name' => 'Otro', 'id' => 'Otro'],
                        ]"
                            select="label:name|value:id" placeholder="Selecciona la actividad económica"
                            value="{{ old('economic_activity', $client->client?->economic_activity) }}" />
                    </div>
                    <div>
                        <x-select.styled label="Uso de CFDI" name="cfdi_use" :options="[
                            ['name' => 'G01 - Adquisición de mercancías', 'id' => 'G01'],
                            ['name' => 'G02 - Devoluciones, descuentos o bonificaciones', 'id' => 'G02'],
                            ['name' => 'G03 - Gastos en general', 'id' => 'G03'],
                            ['name' => 'I01 - Construcciones', 'id' => 'I01'],
                            ['name' => 'I02 - Mobiliario y equipo de oficina por inversiones', 'id' => 'I02'],
                            ['name' => 'I03 - Equipo de transporte', 'id' => 'I03'],
                            ['name' => 'I04 - Equipo de cómputo y accesorios', 'id' => 'I04'],
                            ['name' => 'D01 - Honorarios médicos, dentales y gastos hospitalarios', 'id' => 'D01'],
                            ['name' => 'D10 - Pagos por servicios educativos', 'id' => 'D10'],
                            ['name' => 'S01 - Sin efectos fiscales', 'id' => 'S01'],
                            ['name' => 'CP01 - Pagos', 'id' => 'CP01'],
                        ]"
                            select="label:name|value:id" placeholder="Selecciona el uso de CFDI" value="{{ old('cfdi_use', $client->client?->cfdi_use) }}" />
                    </div>
                    <div class="md:col-span-2">
                        <x-textarea label="Dirección fiscal" name="address"
                            placeholder="Calle, número exterior/interior, colonia, municipio, estado..." rows="3"
                            value="{{ old('address', $client->client?->address) }}" />
                    </div>
                    <div>
                        <x-input label="Código Postal" name="zip_code" placeholder="Ej. 97000" maxlength="5"
                            x-mask="99999" value="{{ old('zip_code', $client->client?->zip_code) }}" />
                    </div>
                    <div>
                        <x-select.styled label="Estatus" name="status" :options="[
                            ['name' => 'Activo', 'id' => 'Activo'],
                            ['name' => 'Inactivo', 'id' => 'Inactivo'],
                            ['name' => 'Pendiente', 'id' => 'Pendiente'],
                            ['name' => 'Suspendido', 'id' => 'Suspendido'],
                        ]" select="label:name|value:id"
                            placeholder="Selecciona el estatus" value="{{ old('status', $client->client?->status) }}" />
                    </div>

                    <div class="md:col-span-2">
                        <x-textarea label="Notas" name="notes"
                            placeholder="Agrega observaciones internas sobre el cliente, su situación fiscal o la cita..."
                            rows="4" value="{{ old('notes', $client->client?->notes) }}" />
                    </div>
                </x-tab-content>

                <div class="mt-6">
                    <x-button type="submit" text="Actualizar Cliente" color="indigo"
                        class="font-semibold text-[14px]" />
                </div>
        </form>
        </x-tabs>
    </x-card>
</x-admin>
