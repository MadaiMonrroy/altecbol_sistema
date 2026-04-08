<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name'))</title>

        <link rel="icon" href="{{ asset('images/icon_color.png') }}" sizes="any">
        <link rel="shortcut icon" href="{{ asset('images/icon_color.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/icon_color.png') }}">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600;700;800&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            @keyframes fadeInSoft {
                from {
                    opacity: 0;
                    transform: translateY(20px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes floatSlow {
                0%, 100% {
                    transform: translateY(0px) translateX(0px);
                }
                50% {
                    transform: translateY(-10px) translateX(6px);
                }
            }

            @keyframes pulseSoft {
                0%, 100% {
                    opacity: .35;
                    transform: scale(1);
                }
                50% {
                    opacity: .6;
                    transform: scale(1.06);
                }
            }

            .auth-fade-in {
                animation: fadeInSoft .85s ease-out both;
            }

            .auth-float {
                animation: floatSlow 7s ease-in-out infinite;
            }

            .auth-pulse {
                animation: pulseSoft 6s ease-in-out infinite;
            }

            .auth-grid-bg {
                background-image:
                    linear-gradient(rgba(255,255,255,0.05) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(255,255,255,0.05) 1px, transparent 1px);
                background-size: 34px 34px;
            }

            .auth-glass {
                background: rgba(255, 255, 255, 0.90);
                backdrop-filter: blur(16px);
                -webkit-backdrop-filter: blur(16px);
            }

            .auth-brand-card {
                background: linear-gradient(180deg, rgba(255,255,255,0.12), rgba(255,255,255,0.05));
                border: 1px solid rgba(255,255,255,0.14);
                box-shadow: 0 15px 50px rgba(0,0,0,.18);
            }

            .auth-shadow-premium {
                box-shadow:
                    0 20px 60px rgba(2, 6, 23, 0.22),
                    0 8px 24px rgba(41, 107, 188, 0.10);
            }
        </style>
    </head>

    <body class="font-sans antialiased bg-slate-950 text-slate-900">
        <div class="relative min-h-screen overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-[#031524] via-[#0c1c35] to-[#06111d]"></div>
            <div class="absolute inset-0 auth-grid-bg opacity-30"></div>

            <div class="absolute -top-20 -left-16 h-72 w-72 rounded-full bg-[#46E1E2]/20 blur-3xl auth-pulse"></div>
            <div class="absolute top-1/4 -right-20 h-80 w-80 rounded-full bg-[#296BBC]/20 blur-3xl auth-pulse"></div>
            <div class="absolute bottom-0 left-1/4 h-60 w-60 rounded-full bg-cyan-300/10 blur-3xl auth-float"></div>

            <div class="relative z-10 min-h-screen">
                <div class="mx-auto flex min-h-screen max-w-7xl items-center justify-center px-4 py-6 sm:px-6 lg:px-8">
                    <div class="grid w-full max-w-6xl overflow-hidden rounded-[30px] border border-white/10 bg-white/5 auth-shadow-premium lg:grid-cols-2">
                        
                        <div class="relative hidden lg:flex flex-col justify-between p-10 xl:p-14">
                            <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>

                            <div class="relative z-10 auth-fade-in">
                                <a href="{{ url('/') }}" class="inline-flex items-center gap-3">
                                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-white/10 ring-1 ring-white/10">
                                        <img
                                            src="{{ asset('images/icon_color.png') }}"
                                            alt="ALTECBOL"
                                            class="h-9 w-9 object-contain"
                                        >
                                    </div>
                                    <div>
                                        <p class="text-xs uppercase tracking-[0.28em] text-cyan-200/70">ALTECBOL</p>
                                        <p class="text-sm text-white/70">Tecnología para empresas</p>
                                    </div>
                                </a>

                                <div class="mt-10 max-w-xl">
                                    <span class="inline-flex items-center rounded-full border border-cyan-300/15 bg-white/10 px-4 py-2 text-xs font-medium tracking-wide text-cyan-100">
                                        Acceso seguro para clientes
                                    </span>

                                    <h1 class="mt-6 text-4xl font-extrabold leading-tight text-white xl:text-5xl">
                                        Gestiona tu cuenta y compra con una experiencia
                                        <span class="bg-gradient-to-r from-[#46E1E2] to-[#7dd3fc] bg-clip-text text-transparent">
                                            moderna y confiable
                                        </span>
                                    </h1>

                                    <p class="mt-6 text-base leading-8 text-white/72 xl:text-lg">
                                        Accede a tu cuenta para revisar productos, gestionar pedidos y continuar tus compras
                                        con una interfaz pensada para brindar confianza, claridad y una experiencia profesional.
                                    </p>
                                </div>

                                <div class="mt-10 grid gap-4 sm:grid-cols-2">
                                    <div class="auth-brand-card rounded-2xl p-5">
                                        <p class="text-sm font-semibold text-white">Compra con confianza</p>
                                        <p class="mt-2 text-sm leading-6 text-white/70">
                                            Consulta productos, disponibilidad y continúa tu proceso de compra de manera simple.
                                        </p>
                                    </div>

                                    <div class="auth-brand-card rounded-2xl p-5">
                                        <p class="text-sm font-semibold text-white">Tu cuenta siempre a mano</p>
                                        <p class="mt-2 text-sm leading-6 text-white/70">
                                            Accede a tu información, historial y beneficios desde cualquier dispositivo.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="relative z-10 auth-fade-in">
                                <div class="flex items-center gap-3 rounded-2xl border border-white/10 bg-white/10 px-4 py-4 text-sm text-white/75">
                                    <span class="inline-block h-2.5 w-2.5 rounded-full bg-emerald-400"></span>
                                    Plataforma segura, rápida y adaptada para una experiencia comercial profesional.
                                </div>
                            </div>
                        </div>

                        <div class="relative flex min-h-[100svh] items-center justify-center p-4 sm:p-6 lg:min-h-full lg:p-10">
                            <div class="absolute inset-0 bg-white/92 dark:bg-slate-900/70"></div>

                            <div class="relative z-10 w-full max-w-md auth-fade-in">
                                <div class="auth-glass rounded-[28px] border border-slate-200/80 p-5 shadow-2xl sm:p-7 lg:p-8">
                                    
                                    <div class="mb-6 flex flex-col items-center text-center sm:mb-8">
                                        <a href="{{ url('/') }}" class="mb-4 inline-flex lg:hidden">
                                            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-[#296BBC] to-[#46E1E2] shadow-lg shadow-cyan-500/20">
                                                <img
                                                    src="{{ asset('images/icon_color.png') }}"
                                                    alt="ALTECBOL"
                                                    class="h-8 w-8 object-contain"
                                                >
                                            </div>
                                        </a>

                                        <div class="hidden lg:inline-flex mb-4 h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-[#296BBC] to-[#46E1E2] shadow-lg shadow-cyan-500/20">
                                            <img
                                                src="{{ asset('images/icon_color.png') }}"
                                                alt="ALTECBOL"
                                                class="h-8 w-8 object-contain"
                                            >
                                        </div>

                                        <h2 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                                            @yield('auth_heading', 'Bienvenido')
                                        </h2>

                                        <p class="mt-2 max-w-sm text-sm leading-6 text-slate-600 sm:text-[15px]">
                                            @yield('auth_subheading', 'Ingresa con tus credenciales para acceder a tu cuenta.')
                                        </p>
                                    </div>

                                    {{ $slot }}

                                    <div class="mt-6 border-t border-slate-200 pt-5 text-center">
                                        <p class="text-xs leading-5 text-slate-500 sm:text-sm">
                                            ¿Deseas volver al sitio principal?
                                            <a href="{{ url('/') }}" class="font-semibold text-[#296BBC] hover:text-[#035480]">
                                                Ir al inicio
                                            </a>
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-5 text-center lg:hidden">
                                    <p class="text-xs leading-5 text-white/65 sm:text-sm">
                                        Compra, consulta y gestiona tu cuenta desde cualquier dispositivo.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>