<x-admin titleWindow="Dashboard" :breadcrumbs="[
    ['name' => 'Panel Administrador', 'route' => route('admin.dashboard')],
    ['name' => 'Empleados', 'route' => route('admin.employees.index')],
    ['name' => 'Crear Empleado']
]">
    <x-card>
        <x-slot:header>
            <h2 class="text-3xl font-semibold leading-tight text-gray-800">Crear Nuevo Empleado</h2>
        </x-slot:header>

        <form action="{{ route('admin.employees.store') }}" method="POST">
            @csrf
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <x-input label="Nombre" name="name" :value="old('name')" required autofocus autocomplete="name"
                        placeholder="Juan Carlos" />
                </div>
                <div>
                    <x-input label="Apellido" name="last_name" :value="old('last_name')" required autocomplete="family-name"
                        placeholder="Garcia Perez" />
                </div>
                <div>
                    <x-input label="Correo Electronico" name="email" :value="old('email')" required
                        autocomplete="username" placeholder="juan.garciap@example.com" />
                </div>
                <div>
                    <x-input label="Telefono" name="phone_number" :value="old('phone_number')" x-mask="(999) 999 9999"
                        placeholder="(123) 456 7890" required />
                </div>
                <div>
                    <x-input label="RFC" name="rfc" :value="old('rfc')" placeholder="GAPJ850412UX9" required
                        maxlength="13" class="uppercase" />
                </div>
                <div>
                    <x-input label="CURP" name="curp" :value="old('curp')" placeholder="GAPJ850412HDFRRN03" required
                        maxlength="18" class="uppercase" />
                </div>
                <div>
                    <x-password label="Contraseña" type="password" name="password" required autocomplete="new-password"
                        placeholder="***********" />
                </div>
                <div>
                    <x-password label="Confirmar Contraseña" type="password" name="password_confirmation" required
                        autocomplete="new-password" placeholder="***********" />
                </div>
            </div>
            <div class="mt-6">
                <x-button type="submit" text="Crear Empleado" color="indigo" class="font-semibold text-[14px]" />
            </div>
        </form>
    </x-card>

</x-admin>
