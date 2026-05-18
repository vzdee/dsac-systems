<x-guest-layout>
    <x-authentication-card title="Bienvenido de nuevo" description="Ingresa a tu cuenta para continuar.">
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-input label="Correo Electrónico *" name="email" :value="old('email')" required autofocus
                    autocomplete="username" placeholder="juan.garciap@example.com" />
            </div>

            <div class="mt-4">
                <x-password label="Contraseña *" name="password" required placeholder="***********" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <div class="">
                    <x-checkbox label="Remember Me" name="remember" sm color="indigo"/>
                </div>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Olvidaste tu contraseña?') }}
                    </a>
                @endif
            </div>
            <div class="mt-6">
                <x-button class="w-full text-[14px] font-medium" type="submit" text="Iniciar Sesion" color="indigo"/>
            </div>

        </form>
    </x-authentication-card>
</x-guest-layout>
