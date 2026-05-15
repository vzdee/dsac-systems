<x-guest-layout>
    <x-authentication-card title="Recuperar Contraseña" description="Ingresa tu correo electrónico para recibir el enlace de recuperación.">
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-input label="Correo Electrónico" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="juan.garciap@example.com" />
            </div>
            <div class="flex justify-end mt-6">
                @if(Route::has('login'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Regresar a Iniciar Sesión') }}
                    </a>
                @endif
            </div>

            <div class="mt-6">
                <x-button type="submit" class="w-full" text="Reestablecer Contraseña" />
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
