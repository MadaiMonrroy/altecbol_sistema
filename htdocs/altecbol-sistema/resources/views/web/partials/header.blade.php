<header id="siteHeader" class="fixed top-0 left-0 z-50 w-full">
    <!-- TOP SOCIAL BAR -->
    <div id="topSocialBar"
        class="hidden lg:block w-full text-white overflow-hidden bg-transparent transition-all duration-500">
        <div class="w-full px-6 md:px-10 xl:px-16 2xl:px-20 pt-1">
            <div class="flex items-center justify-between h-10">
                <div class="hidden md:flex items-center gap-3 text-sm tracking-wide text-white/75">
                    <span>Soluciones tecnológicas empresariales</span>
                </div>

                <div class="hidden lg:flex items-center gap-2 ml-auto">
                    <a href="https://www.facebook.com/profile.php?id=61581125392128"
                        class="flex h-8 w-8 items-center justify-center rounded-full bg-white/10 hover:bg-white/20 transition-all duration-300"
                        aria-label="Facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M22 12a10 10 0 10-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.23.19 2.23.19v2.45h-1.26c-1.24 0-1.63.77-1.63 1.56V12h2.78l-.44 2.89h-2.34v6.99A10 10 0 0022 12z" />
                        </svg>
                    </a>

                    <a href="https://www.instagram.com/altecbol.oficial/"
                        class="flex h-8 w-8 items-center justify-center rounded-full bg-white/10 hover:bg-white/20 transition-all duration-300"
                        aria-label="Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 1.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20.5h8.5a4.25 4.25 0 004.25-4.25v-8.5A4.25 4.25 0 0016.25 3.5h-8.5zM12 7a5 5 0 110 10 5 5 0 010-10zm0 1.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7zm5.25-.88a1.13 1.13 0 110 2.26 1.13 1.13 0 010-2.26z" />
                        </svg>
                    </a>

                    <a href="https://www.linkedin.com/company/altecbol/"
                        class="flex h-8 w-8 items-center justify-center rounded-full bg-white/10 hover:bg-white/20 transition-all duration-300"
                        aria-label="LinkedIn">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M6.94 8.5H3.56V20h3.38V8.5zM5.25 3A1.97 1.97 0 103 4.97 1.98 1.98 0 005.25 3zM20.44 13.04c0-3.18-1.7-4.66-3.97-4.66a3.43 3.43 0 00-3.1 1.7V8.5h-3.24c.04 1 .04 11.5 0 11.5h3.24v-6.42c0-.34.03-.68.12-.92a2.12 2.12 0 011.99-1.41c1.4 0 1.96 1.07 1.96 2.64V20H21c.02-3.2.02-5.78.02-6.96z" />
                        </svg>
                    </a>

                    <a href="https://www.tiktok.com/@altecbol"
                        class="flex h-8 w-8 items-center justify-center rounded-full bg-white/10 hover:bg-white/20 transition-all duration-300"
                        aria-label="TikTok">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M16.5 3c.35 1.87 1.47 3.46 3 4.32v2.46a7.03 7.03 0 01-3-.82v5.33a5.29 5.29 0 11-5.28-5.29c.22 0 .44.02.65.05v2.64a2.67 2.67 0 00-.65-.08 2.67 2.67 0 102.66 2.68V3h2.62z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN NAVBAR -->
    <div id="mainNavbar" class="w-full transition-all duration-500 ease-out bg-transparent">
        <div class="w-full px-6 md:px-10 xl:px-16 2xl:px-20">
            <div class="h-[87px] flex items-center justify-center transition-all duration-500 -mt-1">
                <!-- DESKTOP -->
                <div class="hidden lg:flex items-center justify-center gap-8 xl:gap-10 w-full">
                    <!-- LOGO -->
                    <div class="shrink-0">
                        <a href="{{ route('web.home') }}" class="flex items-center">
                            <img id="siteLogo" src="{{ asset('images/logo-bn.png') }}"
                                data-logo-light="{{ asset('images/logo-bn.png') }}"
                                data-logo-dark="{{ asset('images/logo-altecbol.png') }}" alt="ALTECBOL"
                                class="h-20 w-auto object-contain transition-all duration-300">
                        </a>
                    </div>

                    <!-- MENU -->
                    <nav id="desktopMenu"
                        class="flex items-center gap-6 xl:gap-7 text-lg font-medium text-white transition-all duration-500">
                        <a href="{{ route('web.home') }}"
                            class="hover:text-altecbol-secondary transition whitespace-nowrap">Inicio</a>
                        <a href="{{ route('web.nosotros') }}"
                            class="hover:text-altecbol-secondary transition whitespace-nowrap">Nosotros</a>
                        <a href="{{ route('web.servicios') }}"
                            class="hover:text-altecbol-secondary transition whitespace-nowrap">Servicios</a>
                        <a href="{{ route('web.planes') }}"
                            class="hover:text-altecbol-secondary transition whitespace-nowrap">Planes</a>
                        <a href="{{ route('web.casos.index') }}"
                            class="hover:text-altecbol-secondary transition whitespace-nowrap">Casos de éxito</a>
                        <a href="{{ route('web.blog') }}"
                            class="hover:text-altecbol-secondary transition whitespace-nowrap">Blog</a>
                        <a href="{{ route('web.tienda.index') }}"
                            class="hover:text-altecbol-secondary transition whitespace-nowrap">Tienda</a>
                        <a href="{{ route('web.contacto') }}"
                            class="hover:text-altecbol-secondary transition whitespace-nowrap">Contacto</a>
                    </nav>

                    <!-- ACTIONS -->
                    <div class="flex items-center gap-3 shrink-0">

                        {{-- <a href="{{ route('web.contacto') }}"
       class="px-5 py-2.5 rounded-xl bg-altecbol-secondary text-slate-900 font-semibold hover:opacity-90 transition shadow-card whitespace-nowrap">
        Solicitar información
    </a> --}}

                        <a href="{{ route('web.mi-cuenta.favoritos') }}" id="wishlistBtn"
                            class="relative inline-flex items-center justify-center w-11 h-11 rounded-full border border-white/60 bg-white/10 text-white backdrop-blur-md hover:bg-white/20 transition-all duration-500 shadow-sm"
                            aria-label="Favoritos">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.9">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m21.435 6.582c-.694-2.16-2.773-3.582-5.06-3.582-1.808 0-3.372.88-4.375 2.218C10.997 3.88 9.433 3 7.625 3 5.338 3 3.259 4.422 2.565 6.582c-.57 1.773-.114 3.792 1.202 5.284L12 21l8.233-9.134c1.316-1.492 1.772-3.511 1.202-5.284Z" />
                            </svg>
                        </a>

                        <a href="{{ route('web.tienda.carrito') }}" id="cartBtn"
                            class="relative inline-flex items-center justify-center w-11 h-11 rounded-full border border-white/60 bg-white/10 text-white backdrop-blur-md hover:bg-white/20 transition-all duration-500 shadow-sm"
                            aria-label="Carrito">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.9">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.837L5.61 7.5m0 0L6.75 12.75A2.25 2.25 0 009 14.5h7.875a2.25 2.25 0 002.196-1.758l1.038-4.5A1.125 1.125 0 0019.013 7.5H5.61zm3.14 11.25a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm10.5 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                            </svg>
                        </a>

                        <div class="relative shrink-0 overflow-visible" id="desktopProfileWrap">
                            @auth
                                <div class="flex items-center gap-3">
                                    <button type="button" id="profileBtn"
                                        class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-full border border-white/60 bg-white/10 text-white backdrop-blur-md hover:bg-white/20 transition-all duration-500 shadow-sm"
                                        aria-label="Mi cuenta" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 pointer-events-none"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.118a7.5 7.5 0 0115 0A17.933 17.933 0 0112 21.75a17.933 17.933 0 01-7.5-1.632z" />
                                        </svg>
                                    </button>

                                    <div class="min-w-0 leading-tight" id="profileTextWrap">
                                        <div id="profileHelloText" class="max-w-[95px] truncate text-xs text-white/75">
                                            Hola, {{ auth()->user()->name }}
                                        </div>
                                        <div id="profileAccountText"
                                            class="text-sm font-semibold text-white whitespace-nowrap">
                                            Mi cuenta
                                        </div>
                                    </div>
                                </div>

                                <div id="profileDropdown"
                                    class="hidden absolute right-0 top-full mt-4 z-[9999] w-[300px]
    overflow-hidden rounded-[1.35rem]
    bg-white/70 dark:bg-[#0b1e3a]/80
    backdrop-blur-2xl
    shadow-[0_18px_45px_rgba(15,23,42,0.18)]">
                                    <div
                                        class="select-none px-5 py-4 border-b border-white/10 bg-[#0050b0]/92 backdrop-blur-xl">
                                        <p class="text-[11px] uppercase tracking-[0.14em] text-white/70">Sesión iniciada
                                        </p>
                                        <p class="mt-1 text-[1.05rem] font-semibold leading-tight text-white">
                                            {{ auth()->user()->name }}
                                        </p>
                                        <p class="mt-0.5 text-sm text-white/82 truncate">
                                            {{ auth()->user()->email }}
                                        </p>
                                    </div>

                                    <div class="p-2.5 bg-transparent">
                                        <a href="{{ route('web.mi-cuenta.index') }}"
                                            class="flex items-center gap-3 rounded-xl px-3.5 py-3 text-sm font-semibold text-[#0050b0] dark:text-white hover:bg-[#0050b0]/8 dark:hover:bg-white/10 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 text-[#0050b0] dark:text-white" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.118a7.5 7.5 0 0115 0A17.933 17.933 0 0112 21.75a17.933 17.933 0 01-7.5-1.632z" />
                                            </svg>
                                            Mi cuenta
                                        </a>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="flex w-full items-center gap-3 rounded-xl px-3.5 py-3 text-sm font-semibold
text-slate-500 dark:text-slate-300
hover:bg-slate-100/60 dark:hover:bg-white/10
transition">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m-3 0l3-3m0 0l-3-3m3 3H9" />
                                                </svg>
                                                Cerrar sesión
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('login') }}" id="profileBtn"
                                    class="inline-flex items-center justify-center w-11 h-11 rounded-full border border-white/60 bg-white/10 text-white backdrop-blur-md hover:bg-white/20 transition-all duration-500 shadow-sm"
                                    aria-label="Iniciar sesión">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.118a7.5 7.5 0 0115 0A17.933 17.933 0 0112 21.75a17.933 17.933 0 01-7.5-1.632z" />
                                    </svg>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- MOBILE -->
                <div class="flex lg:hidden items-center justify-between w-full gap-4">
                    <div class="shrink-0">
                        <a href="{{ route('web.home') }}" class="flex items-center gap-3">
                            <div
                                class="w-11 h-11 rounded-xl bg-altecbol-primary text-white flex items-center justify-center font-bold text-lg shadow-card">
                                A
                            </div>
                            <div>
                                <div class="text-lg font-bold text-white leading-tight transition-all duration-500"
                                    id="mobileLogoText">ALTECBOL</div>
                                <div class="text-[11px] text-white/75 leading-tight transition-all duration-500"
                                    id="mobileLogoSubText">Soluciones Tecnológicas</div>
                            </div>
                        </a>
                    </div>

                    <div class="flex items-center gap-2">
                        <a href="{{ route('web.tienda.index') }}" id="mobileCartBtn"
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full border border-white/65 bg-white/10 text-white backdrop-blur-sm transition-all duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.837L5.61 7.5m0 0L6.75 12.75A2.25 2.25 0 009 14.5h7.875a2.25 2.25 0 002.196-1.758l1.038-4.5A1.125 1.125 0 0019.013 7.5H5.61zm3.14 11.25a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zm10.5 0a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                            </svg>
                        </a>

                        <div class="relative overflow-visible">
                            @auth
                                <button type="button" id="mobileProfileBtn"
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full border border-white/65 bg-white/10 text-white backdrop-blur-sm transition-all duration-500"
                                    aria-label="Mi cuenta" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 pointer-events-none"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.118a7.5 7.5 0 0115 0A17.933 17.933 0 0112 21.75a17.933 17.933 0 01-7.5-1.632z" />
                                    </svg>
                                </button>

                                <div id="mobileProfileDropdown"
                                    class="hidden absolute right-0 top-full mt-4 z-[9999] w-64 overflow-hidden rounded-2xl bg-white/72 dark:bg-[#0b1e3a]/82 backdrop-blur-2xl shadow-[0_18px_45px_rgba(15,23,42,0.18)]">

                                    <div
                                        class="select-none px-4 py-4 border-b border-white/10 bg-[#0050b0]/92 backdrop-blur-xl">
                                        <p class="text-[11px] uppercase tracking-[0.14em] text-white/70">Sesión iniciada
                                        </p>
                                        <p class="mt-1 font-semibold text-white">{{ auth()->user()->name }}</p>
                                        <p class="mt-0.5 text-sm text-white/82 truncate">{{ auth()->user()->email }}</p>
                                    </div>

                                    <div class="p-2 bg-transparent">
                                        <a href="{{ route('web.mi-cuenta.index') }}"
                                            class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-[#0050b0] dark:text-white hover:bg-[#0050b0]/8 dark:hover:bg-white/10 transition">
                                            Mi cuenta
                                        </a>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit"
                                                class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-slate-500 dark:text-slate-300 hover:bg-slate-100/60 dark:hover:bg-white/10 transition">
                                                Cerrar sesión
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <a href="{{ route('login') }}" id="mobileProfileBtn"
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full border border-white/65 bg-white/10 text-white backdrop-blur-sm transition-all duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.9">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6.75a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.5 20.118a7.5 7.5 0 0115 0A17.933 17.933 0 0112 21.75a17.933 17.933 0 01-7.5-1.632z" />
                                    </svg>
                                </a>
                            @endauth
                        </div>

                        <button id="mobileMenuButton"
                            class="inline-flex items-center justify-center w-11 h-11 rounded-full border border-white/65 bg-white/10 text-white backdrop-blur-sm transition-all duration-500 shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- MOBILE MENU -->
            <div id="mobileMenu"
                class="lg:hidden overflow-hidden max-h-0 opacity-0 -translate-y-2 pointer-events-none transition-all duration-500 ease-out">
                <div
                    class="mobile-menu-panel relative mt-3 overflow-hidden rounded-[1.75rem] border border-white/20 mb-7">

                    <!-- Fondo blur completo -->
                    <div class="absolute inset-0 mobile-menu-surface"></div>

                    <!-- brillo superior -->
                    <div
                        class="pointer-events-none absolute -top-10 left-1/2 h-24 w-[72%] -translate-x-1/2 rounded-full bg-white/12 blur-2xl">
                    </div>

                    <!-- glow cyan suave -->
                    <div
                        class="pointer-events-none absolute top-16 left-1/2 h-24 w-[78%] -translate-x-1/2 rounded-full bg-cyan-400/16 blur-3xl">
                    </div>

                    <!-- textura -->
                    <div class="pointer-events-none absolute inset-0 opacity-[0.05]"
                        style="background-image:
                linear-gradient(rgba(255,255,255,0.14) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.14) 1px, transparent 1px);
                background-size: 28px 28px;">
                    </div>

                    <!-- borde interno -->
                    <div
                        class="pointer-events-none absolute inset-0 rounded-[1.75rem] ring-1 ring-inset ring-white/10">
                    </div>

                    <div class="relative z-10 px-5 py-5">
                        <nav id="mobileMenuLinks" class="flex flex-col text-sm font-medium text-white">
                            <a href="{{ route('web.home') }}" class="mobile-nav-link">Inicio</a>
                            <a href="{{ route('web.nosotros') }}" class="mobile-nav-link">Nosotros</a>
                            <a href="{{ route('web.servicios') }}" class="mobile-nav-link">Servicios</a>
                            <a href="{{ route('web.planes') }}" class="mobile-nav-link">Planes</a>
                            <a href="{{ route('web.casos.index') }}" class="mobile-nav-link">Casos de éxito</a>
                            <a href="{{ route('web.blog') }}" class="mobile-nav-link">Blog</a>
                            <a href="{{ route('web.tienda.index') }}" class="mobile-nav-link">Tienda</a>
                            <a href="{{ route('web.contacto') }}" class="mobile-nav-link">Contacto</a>
                        </nav>

                        <div class="mt-5 pt-4 border-t border-white/10">
                            <a href="{{ route('web.servicios') }}" id="mobileStoreBtn"
                                class="mobile-menu-cta inline-flex w-full items-center justify-center rounded-[1.15rem] border border-white/15 bg-white/5 px-5 py-3.5 text-sm font-semibold text-white transition-all duration-300 hover:bg-white/10">
                                Ver servicios
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<style>
    .mobile-menu-panel {
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
    }

    .mobile-menu-surface {
        background:
            linear-gradient(180deg, rgba(8, 23, 50, 0.88) 0%, rgba(13, 42, 88, 0.84) 52%, rgba(8, 23, 50, 0.90) 100%);
    }

    .mobile-nav-link {
        padding: 0.95rem 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.10);
        color: rgba(255, 255, 255, 0.96);
        transition: all .3s ease;
    }

    .mobile-nav-link:last-child {
        border-bottom: none;
    }

    .mobile-nav-link:hover {
        color: #ffffff;
        transform: translateX(4px);
        border-bottom-color: rgba(1, 211, 209, 0.25);
    }

    .mobile-menu-cta {
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.08);
    }

    .mobile-menu-cta:hover {
        transform: translateY(-1px);
    }

    .mobile-menu-open {
        max-height: 650px !important;
        opacity: 1 !important;
        transform: translateY(0) !important;
        pointer-events: auto !important;
    }

    .mobile-menu-closed {
        max-height: 0 !important;
        opacity: 0 !important;
        transform: translateY(-8px) !important;
        pointer-events: none !important;
    }

    /* versión clara cuando el header cambia */
    .mobile-menu-panel.is-light .mobile-menu-surface {
        background:
            linear-gradient(180deg, rgba(255, 255, 255, 0.88) 0%, rgba(241, 245, 249, 0.92) 55%, rgba(248, 250, 252, 0.94) 100%);
    }

    .mobile-menu-panel.is-light {
        border-color: rgba(148, 163, 184, 0.22);
        box-shadow: 0 24px 60px rgba(15, 23, 42, 0.12);
    }

    .mobile-menu-panel.is-light .mobile-nav-link {
        color: #0f172a;
        border-bottom-color: rgba(15, 23, 42, 0.08);
    }

    .mobile-menu-panel.is-light .mobile-nav-link:hover {
        color: #0050b0;
        border-bottom-color: rgba(0, 80, 176, 0.18);
    }

    .mobile-menu-panel.is-light .mobile-menu-cta {
        border-color: rgba(148, 163, 184, 0.28);
        background: rgba(255, 255, 255, 0.70);
        color: #0f172a;
    }

    .mobile-menu-panel.is-light .mobile-menu-cta:hover {
        background: rgba(255, 255, 255, 0.92);
        color: #0050b0;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const topBar = document.getElementById('topSocialBar');
        const navbar = document.getElementById('mainNavbar');
        const menu = document.getElementById('desktopMenu');
        const siteLogo = document.getElementById('siteLogo');
const mobileWishlistBtn = document.getElementById('mobileWishlistBtn');
        const btnStore = document.getElementById('btnStore');
        const cart = document.getElementById('cartBtn');
        const profile = document.getElementById('profileBtn');
        const wishlist = document.getElementById('wishlistBtn');
        const profileHelloText = document.getElementById('profileHelloText');
        const profileAccountText = document.getElementById('profileAccountText');
        const mobileLogoText = document.getElementById('mobileLogoText');
        const mobileLogoSubText = document.getElementById('mobileLogoSubText');
        const mobileCartBtn = document.getElementById('mobileCartBtn');
        const mobileProfileBtn = document.getElementById('mobileProfileBtn');
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        const mobileMenuLinks = document.querySelectorAll('#mobileMenuLinks a');
        const mobileStoreBtn = document.getElementById('mobileStoreBtn');

        const desktopProfileWrap = document.getElementById('desktopProfileWrap');
        const desktopProfileTrigger = document.getElementById('profileBtn');
        const desktopProfileMenu = document.getElementById('profileDropdown');

        const mobileProfileTrigger = document.getElementById('mobileProfileBtn');
        const mobileProfileMenu = document.getElementById('mobileProfileDropdown');

        const fullHeight = 46;
        const hideDistance = 120;

        let desktopProfileTimeout;
        let mobileMenuOpen = false;

        function openMobileMenu() {
            if (!mobileMenu || !mobileMenuButton) return;

            mobileMenu.classList.remove('mobile-menu-closed');
            mobileMenu.classList.add('mobile-menu-open');
            mobileMenuButton.setAttribute('aria-expanded', 'true');

            mobileMenuButton.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        `;

            mobileMenuOpen = true;
        }

        function closeMobileMenu() {
            if (!mobileMenu || !mobileMenuButton) return;

            mobileMenu.classList.remove('mobile-menu-open');
            mobileMenu.classList.add('mobile-menu-closed');
            mobileMenuButton.setAttribute('aria-expanded', 'false');

            mobileMenuButton.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        `;

            mobileMenuOpen = false;
        }

        function toggleMobileMenu() {
            if (mobileMenuOpen) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        }

        function hideMenu(menu, trigger) {
            if (!menu) return;
            menu.classList.add('hidden');
            if (trigger) trigger.setAttribute('aria-expanded', 'false');
        }

        function showMenu(menu, trigger) {
            if (!menu) return;
            menu.classList.remove('hidden');
            if (trigger) trigger.setAttribute('aria-expanded', 'true');
        }

        function toggleMenu(menu, trigger, otherMenu, otherTrigger) {
            if (!menu || !trigger) return;

            const isHidden = menu.classList.contains('hidden');
            hideMenu(otherMenu, otherTrigger);

            if (isHidden) {
                showMenu(menu, trigger);
            } else {
                hideMenu(menu, trigger);
            }
        }

        function setTransparentState() {
            const mobileMenuPanel = document.querySelector('.mobile-menu-panel');
            if (mobileMenuPanel) {
                mobileMenuPanel.classList.remove('is-light');
            }
            if (menu) {
                menu.classList.remove('text-gray-700');
                menu.classList.add('text-white');
            }
if (mobileWishlistBtn) {
    mobileWishlistBtn.className =
        "inline-flex items-center justify-center w-10 h-10 rounded-full border border-white/65 bg-white/10 text-white backdrop-blur-sm transition-all duration-500";
}
            if (wishlist) {
                wishlist.className =
                    "relative inline-flex items-center justify-center w-11 h-11 rounded-full border border-white/60 bg-white/10 text-white backdrop-blur-md hover:bg-white hover:text-altecbol-primary hover:border-white transition-all duration-500 shadow-sm";
            }

            if (profileHelloText) {
                profileHelloText.className = "max-w-[95px] truncate text-xs text-white/75 dark:text-white/75";
            }

            if (profileAccountText) {
                profileAccountText.className = "text-sm font-semibold text-white whitespace-nowrap";
            }

            if (siteLogo) {
                siteLogo.src = siteLogo.dataset.logoLight;
            }

            if (btnStore) {
                btnStore.className =
                    "px-4 py-2.5 rounded-lg border border-white/70 text-white hover:bg-white hover:text-altecbol-primary transition-all duration-500 whitespace-nowrap";
            }

            if (cart) {
                cart.className =
                    "relative inline-flex items-center justify-center w-11 h-11 rounded-full border border-white/65 bg-white/10 text-white backdrop-blur-sm hover:bg-white hover:text-altecbol-primary hover:border-white transition-all duration-500 shadow-sm";
            }

            if (profile) {
                profile.className =
                    "inline-flex items-center justify-center w-11 h-11 rounded-full border border-white/60 bg-white/10 text-white backdrop-blur-md hover:bg-white hover:text-altecbol-primary hover:border-white transition-all duration-500 shadow-sm";
            }

            if (mobileLogoText) {
                mobileLogoText.classList.remove('text-altecbol-primary');
                mobileLogoText.classList.add('text-white');
            }

            if (mobileLogoSubText) {
                mobileLogoSubText.classList.remove('text-gray-500');
                mobileLogoSubText.classList.add('text-white/75');
            }

            if (mobileCartBtn) {
                mobileCartBtn.className =
                    "inline-flex items-center justify-center w-10 h-10 rounded-full border border-white/65 bg-white/10 text-white backdrop-blur-sm transition-all duration-500";
            }

            if (mobileProfileBtn) {
                mobileProfileBtn.className =
                    "inline-flex items-center justify-center w-10 h-10 rounded-full border border-white/65 bg-white/10 text-white backdrop-blur-sm transition-all duration-500";
            }

            if (mobileMenuButton) {
                mobileMenuButton.className =
                    "inline-flex items-center justify-center w-11 h-11 rounded-full border border-white/65 bg-white/10 text-white backdrop-blur-sm transition-all duration-500 shrink-0";
            }

            if (mobileMenu) {
                mobileMenu.classList.remove('text-gray-700');
                mobileMenu.classList.add('text-white');
            }

            if (mobileStoreBtn) {
                mobileStoreBtn.className =
                    "px-4 py-3 rounded-lg border border-white/70 text-white text-center hover:bg-white hover:text-altecbol-primary transition-all duration-500";
            }
        }

        function setLightState() {
            const mobileMenuPanel = document.querySelector('.mobile-menu-panel');
            if (mobileMenuPanel) {
                mobileMenuPanel.classList.add('is-light');
            }
            if (mobileWishlistBtn) {
    mobileWishlistBtn.className =
        "inline-flex items-center justify-center w-10 h-10 rounded-full border border-gray-300 bg-white text-gray-700 transition-all duration-500 shadow-sm";
}
            if (menu) {
                menu.classList.remove('text-white');
                menu.classList.add('text-gray-700');
            }

            if (wishlist) {
                wishlist.className =
                    "relative inline-flex items-center justify-center w-11 h-11 rounded-full border border-gray-300 bg-white text-gray-700 hover:bg-altecbol-primary hover:text-white hover:border-altecbol-primary transition-all duration-500 shadow-sm";
            }

            if (profileHelloText) {
                profileHelloText.className = "max-w-[95px] truncate text-xs text-slate-500";
            }

            if (profileAccountText) {
                profileAccountText.className = "text-sm font-semibold text-[#0050b0] whitespace-nowrap";
            }

            if (siteLogo) {
                siteLogo.src = siteLogo.dataset.logoDark;
            }

            if (btnStore) {
                btnStore.className =
                    "px-4 py-2.5 rounded-lg border border-altecbol-primary text-altecbol-primary bg-white hover:bg-altecbol-primary hover:text-white transition-all duration-500 whitespace-nowrap shadow-sm";
            }

            if (cart) {
                cart.className =
                    "relative inline-flex items-center justify-center w-11 h-11 rounded-full border border-gray-300 bg-white text-gray-700 hover:bg-altecbol-primary hover:text-white hover:border-altecbol-primary transition-all duration-500 shadow-sm";
            }

            if (profile) {
                profile.className =
                    "inline-flex items-center justify-center w-11 h-11 rounded-full border border-gray-300 bg-white text-gray-700 hover:bg-altecbol-primary hover:text-white hover:border-altecbol-primary transition-all duration-500 shadow-sm";
            }

            if (mobileLogoText) {
                mobileLogoText.classList.remove('text-white');
                mobileLogoText.classList.add('text-altecbol-primary');
            }

            if (mobileLogoSubText) {
                mobileLogoSubText.classList.remove('text-white/75');
                mobileLogoSubText.classList.add('text-gray-500');
            }

            if (mobileCartBtn) {
                mobileCartBtn.className =
                    "inline-flex items-center justify-center w-10 h-10 rounded-full border border-gray-300 bg-white text-gray-700 transition-all duration-500 shadow-sm";
            }

            if (mobileProfileBtn) {
                mobileProfileBtn.className =
                    "inline-flex items-center justify-center w-10 h-10 rounded-full border border-gray-300 bg-white text-gray-700 transition-all duration-500 shadow-sm";
            }

            if (mobileMenuButton) {
                mobileMenuButton.className =
                    "inline-flex items-center justify-center w-11 h-11 rounded-full border border-gray-300 bg-white text-gray-700 transition-all duration-500 shrink-0 shadow-sm";
            }

            if (mobileMenu) {
                mobileMenu.classList.remove('text-white');
                mobileMenu.classList.add('text-gray-700');
            }

            if (mobileStoreBtn) {
                mobileStoreBtn.className =
                    "px-4 py-3 rounded-lg border border-altecbol-primary text-altecbol-primary bg-white text-center hover:bg-altecbol-primary hover:text-white transition-all duration-500";
            }
        }

        function updateHeader() {
            const scrollY = window.scrollY;
            const progress = Math.min(scrollY / hideDistance, 1);
            const navProgress = Math.min(scrollY / 60, 1);

            if (topBar) {
                topBar.style.maxHeight = `${fullHeight * (1 - progress)}px`;
                topBar.style.opacity = 1 - progress;
                topBar.style.transform = `translateY(${-6 * progress}px)`;
            }

            if (navbar) {
                navbar.style.backgroundColor = `rgba(255,255,255,${navProgress * 0.96})`;
                navbar.style.backdropFilter = "blur(14px)";
                navbar.style.webkitBackdropFilter = "blur(14px)";
                navbar.style.borderBottom = `1px solid rgba(15,23,42,${navProgress * 0.08})`;
                navbar.style.boxShadow = `0 10px 30px rgba(15,23,42,${navProgress * 0.08})`;
            }

            if (scrollY > 40) {
                setLightState();
            } else {
                setTransparentState();
            }
        }

        if (desktopProfileWrap && desktopProfileTrigger && desktopProfileMenu) {
            desktopProfileWrap.addEventListener('mouseenter', function() {
                clearTimeout(desktopProfileTimeout);
                showMenu(desktopProfileMenu, desktopProfileTrigger);
            });

            desktopProfileWrap.addEventListener('mouseleave', function() {
                desktopProfileTimeout = setTimeout(() => {
                    hideMenu(desktopProfileMenu, desktopProfileTrigger);
                }, 140);
            });
        }

        if (mobileProfileTrigger && mobileProfileMenu) {
            mobileProfileTrigger.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                toggleMenu(
                    mobileProfileMenu,
                    mobileProfileTrigger,
                    desktopProfileMenu,
                    desktopProfileTrigger
                );
            });
        }

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                toggleMobileMenu();
            });

            closeMobileMenu();
        }

        if (mobileMenuLinks.length) {
            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', function() {
                    closeMobileMenu();
                });
            });
        }

        document.addEventListener('click', function(e) {
            if (mobileProfileMenu && mobileProfileTrigger) {
                if (!mobileProfileMenu.contains(e.target) && !mobileProfileTrigger.contains(e.target)) {
                    hideMenu(mobileProfileMenu, mobileProfileTrigger);
                }
            }

            if (mobileMenu && mobileMenuButton) {
                if (!mobileMenu.contains(e.target) && !mobileMenuButton.contains(e.target)) {
                    closeMobileMenu();
                }
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                hideMenu(desktopProfileMenu, desktopProfileTrigger);
                hideMenu(mobileProfileMenu, mobileProfileTrigger);
                closeMobileMenu();
            }
        });

        window.addEventListener('scroll', updateHeader, {
            passive: true
        });
        updateHeader();
    });
</script>
