@section('title', 'Iniciar sesión | ALTECBOL')
@section('auth_heading', 'Bienvenido de nuevo')
@section('auth_subheading', 'Accede a tu cuenta para comprar, revisar tus pedidos y gestionar tu información.')

<x-guest-layout>
    <x-auth-session-status
        class="mb-4 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700"
        :status="session('status')"
    />

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
            <x-input-label
                for="email"
                :value="__('Correo electrónico')"
                class="mb-2 block text-sm font-semibold text-slate-700"
            />

            <x-text-input
                id="email"
                class="block w-full rounded-2xl border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm transition duration-200 placeholder:text-slate-400 focus:border-[#296BBC] focus:ring-[#296BBC]"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
                placeholder="correo@ejemplo.com"
            />

            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm" />
        </div>

        <div>
            <div class="mb-2 flex items-center justify-between gap-3">
                <x-input-label
                    for="password"
                    :value="__('Contraseña')"
                    class="block text-sm font-semibold text-slate-700"
                />

                @if (Route::has('password.request'))
                    <a
                        class="text-xs font-medium text-[#296BBC] transition hover:text-[#035480] sm:text-sm"
                        href="{{ route('password.request') }}"
                    >
                        {{ __('¿La olvidaste?') }}
                    </a>
                @endif
            </div>

            <x-text-input
                id="password"
                class="block w-full rounded-2xl border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 shadow-sm transition duration-200 placeholder:text-slate-400 focus:border-[#296BBC] focus:ring-[#296BBC]"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="••••••••"
            />

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm" />
        </div>

        <div class="flex items-center justify-between ">
            <label for="remember_me" class="inline-flex items-center gap-2">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-slate-300 text-[#296BBC] shadow-sm focus:ring-[#296BBC]"
                    name="remember"
                >
                <span class="text-sm text-slate-600">{{ __('Recordarme') }}</span>
            </label>

            <div class="hidden items-center gap-2 sm:flex">
                <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                <span class="text-xs text-slate-500">Acceso seguro</span>
            </div>
        </div>

        <div class=" p-3 sm:p-4 flex items-left justify-start">
            {!! NoCaptcha::display() !!}
            <x-input-error :messages="$errors->get('g-recaptcha-response')" class="mt-2 text-sm" />
        </div>

        <div class="grid gap-3 pt-1 sm:grid-cols-2 flex items-center justify-between">
            <x-primary-button class="w-full justify-center rounded-2xl border-0 bg-gradient-to-r from-[#296BBC] to-[#46E1E2] px-5 py-3 text-sm font-semibold tracking-wide text-white shadow-lg shadow-cyan-500/20 transition hover:scale-[1.01] hover:opacity-95 sm:col-span-2">
                {{ __('Iniciar sesión') }}
            </x-primary-button>

            <a
                href="{{ route('register') }}"
                class="inline-flex w-full items-center justify-center rounded-2xl border border-slate-300 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-slate-400 hover:bg-slate-50 sm:col-span-2"
            >
                Crear cuenta
            </a>
        </div>
    </form>

    <div class="mt-5 grid gap-3 sm:grid-cols-2">
        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
            <p class="text-sm font-semibold text-slate-800">Compra más rápido</p>
            <p class="mt-1 text-xs leading-5 text-slate-600 sm:text-sm">
                Guarda tu acceso y agiliza tus compras futuras.
            </p>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">
            <p class="text-sm font-semibold text-slate-800">Sigue tus pedidos</p>
            <p class="mt-1 text-xs leading-5 text-slate-600 sm:text-sm">
                Revisa tu información y el estado de tus solicitudes.
            </p>
        </div>
    </div>

    {!! NoCaptcha::renderJs() !!}
</x-guest-layout>