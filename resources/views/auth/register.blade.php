<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="grid grid-cols-2 gap-4" x-data>
                <div>
                    <x-input label="Nombre" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Juan"/>
                </div>
                <div>
                    <x-input label="Apellido" name="last_name"  :value="old('last_name')" required  autocomplete="family-name" placeholder="Garcia Perez"/>
                </div>
                <div>
                    <x-input label="Correo Electronico" name="email" :value="old('email')" required autocomplete="username" placeholder="juan.garciap@example.com"/>
                </div>
    
                <div>
                    <x-input label="Telefono" name="phone_number" :value="old('phone_number')" x-mask="(999) 999 9999" placeholder="(123) 456 7890" required/>
                </div>

                <div>
                    <x-password label="Contraseña" type="password" name="password" required autocomplete="new-password" placeholder="***********"/>
                </div>
    
                <div>
                    <x-password label="Confirmar Contraseña" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="***********"/>
                </div>
            </div>

            <div class="flex items-center justify-end mt-6">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Ya tienes una cuenta?') }}
                </a>

            </div>
            <div class="mt-6"> 
                <x-button type="submit" text="Registrarse" class="w-full"/>
                
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
