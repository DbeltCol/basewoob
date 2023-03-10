<x-guest-layout>

    @include('messages')

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('autenticateToken') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Código 4 digitos')" />

                <x-input id="token" class="block mt-1 w-full" type="number" name="token" :value="old('token')" required autofocus />
            </div>


            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-3">
                    {{ __('Autenticar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
