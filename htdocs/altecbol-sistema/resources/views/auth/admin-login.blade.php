<x-guest-layout>
    <div class="w-full max-w-md mx-auto">
        <div class="bg-white shadow-xl rounded-2xl p-8">
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Acceso Administrativo</h1>
                <p class="text-sm text-gray-500 mt-1">Ingresa con tu cuenta de administrador</p>
            </div>

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('admin.login.store') }}" class="space-y-4">
                @csrf

                <div>
                    <x-input-label for="email" :value="'Correo electrónico'" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="password" :value="'Contraseña'" />
                    <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center">
                    <input id="remember" type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                    <label for="remember" class="ml-2 text-sm text-gray-600">Recordarme</label>
                </div>

                <div>
                    <x-primary-button class="w-full justify-center">
                        Ingresar
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>