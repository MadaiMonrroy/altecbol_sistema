@extends('layouts.web')

@section('title', 'Inicio | ALTECBOL')

@section('content')

    <!-- HERO -->
    <section id="hero-altecbol"
        class="relative overflow-hidden bg-slate-950 pt-28 pb-40 text-white md:pt-36 md:pb-48 lg:pt-36 lg:pb-52">
        <!-- VIDEO -->
        <video autoplay muted loop playsinline preload="metadata" poster="{{ asset('images/hero-poster.jpg') }}"
            class="absolute inset-0 h-full w-full object-cover">
            <source src="{{ asset('videos/video-intro.mp4') }}" type="video/mp4">
            Tu navegador no soporta video HTML5.
        </video>

        <!-- OVERLAYS -->
        <div class="absolute inset-0 bg-slate-950/35"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-[#031027]/70 via-[#0048a3]/30 to-[#031027]/60"></div>

        <!-- DECORACIÓN -->
        <div class="absolute -left-16 top-20 h-72 w-72 rounded-full bg-cyan-300/20 blur-3xl"></div>
        <div class="absolute -right-20 bottom-8 h-96 w-96 rounded-full bg-blue-400/10 blur-3xl"></div>

        <div class="relative z-10 mx-auto flex max-w-7xl items-start px-6">
            <div class="max-w-4xl">
                <div
                    class="mb-5 inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm text-white/90 backdrop-blur-md">
                    <span class="h-2.5 w-2.5 rounded-full bg-altecbol-secondary"></span>
                    Aliado tecnológico integral para empresas
                </div>

                <h1 class="max-w-4xl text-4xl font-bold leading-[1.02] md:text-5xl xl:text-6xl">
                    Tecnología que conecta, 
                    <span class="text-altecbol-secondary">protege y hace crecer</span>
                    tu empresa
                </h1>

                <p class="mt-5 max-w-2xl text-base leading-7 text-blue-50/90 md:text-lg">
                    En ALTECBOL integramos redes, servidores, soporte técnico, comunicaciones, seguridad,
                    desarrollo de software y equipamiento tecnológico para que tu operación sea más estable,
                    segura y escalable.
                </p>

                <div class="mt-8 flex flex-col gap-4 sm:flex-row">
                    <a href="{{ route('web.casos.index') }}"
                        class="rounded-2xl bg-altecbol-secondary px-7 py-4 text-center font-semibold text-slate-900 transition hover:scale-[1.02]">
                        Casos de éxito
                    </a>

                    <a href="{{ route('web.nosotros') }}"
                        class="rounded-2xl font-semibold border border-white/30 px-7 py-4 text-center  text-white transition hover:scale-[1.02] ">
                        Por qué elegirnos
                    </a>
                </div>

                <div class="mt-8 flex flex-wrap gap-3">
                    <div
                        class="rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm text-white/90 backdrop-blur-md">
                        Servidores en la Nube
                    </div>
                    <div
                        class="rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm text-white/90 backdrop-blur-md">
                        Redes empresariales
                    </div>
                    <div
                        class="rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm text-white/90 backdrop-blur-md">
                        Servidores y virtualización
                    </div>
                    <div
                        class="rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm text-white/90 backdrop-blur-md">
                        Soporte técnico
                    </div>
                    <div
                        class="rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm text-white/90 backdrop-blur-md">
                        Telefonía IP y call center
                    </div>
                    <div
                        class="rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm text-white/90 backdrop-blur-md">
                        Desarrollo de software
                    </div>

                </div>
            </div>
        </div>

        <!-- ONDA INFERIOR -->
        <div id="hero-wave-wrap" class="pointer-events-none absolute bottom-[-2px] left-0 z-20 w-full overflow-hidden">
            <div class="absolute bottom-0 left-0 h-24 w-full bg-white md:h-28"></div>

            <svg viewBox="0 0 1440 220" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg"
                class="relative block h-[230px] md:h-[260px] w-full">
                <path id="hero-wave-path" fill="#ffffff"
                    d="M0,90L80,84C160,78,320,66,480,70C640,74,800,94,960,102C1120,110,1280,106,1360,104L1440,102V220H1360C1280,220,1120,220,960,220C800,220,640,220,480,220C320,220,160,220,80,220H0Z">
                </path>
            </svg>
        </div>
    </section>

    <!-- CINTA 1: TODOS LOS SERVICIOS -->
    <section class="relative z-30 -mt-20 bg-white py-8 md:-mt-24 lg:-mt-28">
        <div class="marquee js-marquee" data-speed="0.6" data-direction="right">
            <div class="marquee__viewport">
                <div class="marquee__track js-marquee-track">
                    <div class="marquee__group js-marquee-group">

                        <div
                            class="flex min-w-[320px] items-center gap-4 rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 shadow-sm">
                            <img src="{{ asset('websitio/img/soluciones/redes_infraestructura.png') }}"
                                alt="Redes empresariales" class="h-16 w-16 rounded-xl object-cover">
                            <div>
                                <div class="font-semibold text-slate-900">Redes empresariales</div>
                                <div class="text-sm text-gray-600">Routing, switching, VLAN, MPLS, VPN y WiFi corporativo
                                </div>
                            </div>
                        </div>

                        <div
                            class="flex min-w-[320px] items-center gap-4 rounded-2xl border border-slate-200 bg-white px-5 py-4 shadow-sm">
                            <img src="{{ asset('websitio/img/soluciones/servidores_virtualizacion.png') }}"
                                alt="Servidores e infraestructura" class="h-16 w-16 rounded-xl object-cover">
                            <div>
                                <div class="font-semibold text-slate-900">Servidores e infraestructura</div>
                                <div class="text-sm text-gray-600">Virtualización, storage, continuidad y rendimiento</div>
                            </div>
                        </div>

                        <div
                            class="flex min-w-[320px] items-center gap-4 rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 shadow-sm">
                            <img src="{{ asset('websitio/img/soluciones/soporte_tecnico.png') }}" alt="Soporte técnico"
                                class="h-16 w-16 rounded-xl object-cover">
                            <div>
                                <div class="font-semibold text-slate-900">Soporte técnico y gestión IT</div>
                                <div class="text-sm text-gray-600">Monitoreo, mantenimiento y respuesta especializada</div>
                            </div>
                        </div>

                        <div
                            class="flex min-w-[320px] items-center gap-4 rounded-2xl border border-slate-200 bg-white px-5 py-4 shadow-sm">
                            <img src="{{ asset('websitio/img/soluciones/telefonia_ip.png') }}"
                                alt="Telefonía IP y call center" class="h-16 w-16 rounded-xl object-cover">
                            <div>
                                <div class="font-semibold text-slate-900">Telefonía IP y call center</div>
                                <div class="text-sm text-gray-600">IVR, colas, grabación y plataformas de atención</div>
                            </div>
                        </div>

                        <div
                            class="flex min-w-[320px] items-center gap-4 rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 shadow-sm">
                            <img src="{{ asset('websitio/img/soluciones/tu_sistema_nube.png') }}"
                                alt="Alquiler de servidores" class="h-16 w-16 rounded-xl object-cover">
                            <div>
                                <div class="font-semibold text-slate-900">Alquiler de servidores</div>
                                <div class="text-sm text-gray-600">Infraestructura dedicada para sistemas y operación
                                    crítica</div>
                            </div>
                        </div>

                        <div
                            class="flex min-w-[320px] items-center gap-4 rounded-2xl border border-slate-200 bg-white px-5 py-4 shadow-sm">
                            <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=300&q=80"
                                alt="Desarrollo de software" class="h-16 w-16 rounded-xl object-cover">
                            <div>
                                <div class="font-semibold text-slate-900">Desarrollo de software</div>
                                <div class="text-sm text-gray-600">Sistemas a medida, automatización y soluciones web</div>
                            </div>
                        </div>

                        <div
                            class="flex min-w-[320px] items-center gap-4 rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 shadow-sm">
                            <img src="https://images.unsplash.com/photo-1555949963-aa79dcee981c?auto=format&fit=crop&w=300&q=80"
                                alt="Ciberseguridad" class="h-16 w-16 rounded-xl object-cover">
                            <div>
                                <div class="font-semibold text-slate-900">Ciberseguridad</div>
                                <div class="text-sm text-gray-600">Fortinet, firewalls, segmentación y acceso seguro</div>
                            </div>
                        </div>

                        <div
                            class="flex min-w-[320px] items-center gap-4 rounded-2xl border border-slate-200 bg-white px-5 py-4 shadow-sm">
                            <img src="{{ asset('websitio/img/soluciones/videovigilancia_acceso.png') }}"
                                alt="Cámaras y control de acceso" class="h-16 w-16 rounded-xl object-cover">
                            <div>
                                <div class="font-semibold text-slate-900">Cámaras y control de acceso</div>
                                <div class="text-sm text-gray-600">Video vigilancia, biométricos y control de ingresos</div>
                            </div>
                        </div>

                        <div
                            class="flex min-w-[320px] items-center gap-4 rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 shadow-sm">
                            <img src="{{ asset('websitio/img/project/luckyp.png') }}"
                                alt="Cableado estructurado" class="h-16 w-16 rounded-xl object-cover">
                            <div>
                                <div class="font-semibold text-slate-900">Cableado estructurado</div>
                                <div class="text-sm text-gray-600">Orden, rendimiento y escalabilidad para tu red</div>
                            </div>
                        </div>

                        <div
                            class="flex min-w-[320px] items-center gap-4 rounded-2xl border border-slate-200 bg-white px-5 py-4 shadow-sm">
                            <img src="{{ asset('websitio/img/productos/AP361.webp') }}"
                                alt="Venta de productos tecnológicos" class="h-16 w-16 rounded-xl object-cover">
                            <div>
                                <div class="font-semibold text-slate-900">Productos tecnológicos</div>
                                <div class="text-sm text-gray-600">Equipamiento, licencias y soluciones para empresa</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SOLUCIONES DESTACADAS -->
    <section class="relative overflow-hidden py-20">
        <!-- FONDO DECORATIVO -->
        <div class="pointer-events-none absolute inset-0">
            <!-- glow principales -->
            <div class="sd-orb sd-orb-a absolute -left-20 top-14 h-72 w-80 rounded-full bg-[#01d3d1]/20 blur-3xl"></div>
            <div class="sd-orb sd-orb-b absolute right-[-70px] top-16 h-96 w-96 rounded-full bg-[#0050b0]/22 blur-2xl">
            </div>
            <div class="sd-orb sd-orb-c absolute bottom-[-80px] left-1/3 h-80 w-80 rounded-full bg-[#01d3d1]/12 blur-3xl">
            </div>

            <!-- paneles translúcidos -->
            <div
                class="sd-panel sd-panel-a absolute left-[6%] top-[16%] h-32 w-32 rotate-12 rounded-[2rem] border border-white/70 bg-white/45 shadow-[0_14px_40px_rgba(2,6,23,0.05)] backdrop-blur-md">
            </div>
            <div
                class="sd-panel sd-panel-b absolute right-[8%] top-[12%] h-24 w-24 -rotate-12 rounded-[1.75rem] border border-[#0050b0]/12 bg-white/50 shadow-[0_14px_40px_rgba(2,6,23,0.05)] backdrop-blur-md">
            </div>
            <div
                class="sd-panel sd-panel-c absolute left-[14%] bottom-[10%] h-24 w-24 rotate-6 rounded-[1.5rem] border border-[#01d3d1]/20 bg-white/45 shadow-[0_14px_40px_rgba(2,6,23,0.05)] backdrop-blur-md">
            </div>

            <svg class="absolute inset-0 h-full w-full opacity-[0.95]" viewBox="0 0 1440 900" fill="none"
                xmlns="http://www.w3.org/2000/svg">

                <!-- red principal superior izquierda -->
                <path class="sd-line sd-line-dark" d="M40 800 C140 170, 240 165, 335 205 S520 255, 610 205"
                    stroke="url(#darkLineA)" stroke-width="2.6" stroke-linecap="round" stroke-dasharray="8 10"
                    filter="url(#glowDark)" />


                <!-- NODOS -->
                <circle class="sd-node" cx="80" cy="210" r="7" fill="#0050b0" />
                <circle class="sd-node" cx="335" cy="100" r="8" fill="#0050b0" />


                <circle class="sd-node" cx="930" cy="300" r="6.5" fill="#01d3d1" />
                <circle class="sd-node" cx="1215" cy="205" r="8" fill="#0050b0" />
                <circle class="sd-node" cx="1410" cy="250" r="6.5" fill="#01d3d1" />



                <circle class="sd-node" cx="180" cy="735" r="6.5" fill="#01d3d1" />
                <circle class="sd-node" cx="565" cy="730" r="8" fill="#0050b0" />
                <circle class="sd-node" cx="980" cy="725" r="6.5" fill="#01d3d1" />

                <defs>


                    <linearGradient id="darkLineB" x1="0" y1="0" x2="1440" y2="0">
                        <stop stop-color="#0f172a" stop-opacity="0" />
                        <stop offset="0.25" stop-color="#0f172a" stop-opacity="0.65" />
                        <stop offset="0.5" stop-color="#0050b0" stop-opacity="0.95" />
                        <stop offset="0.75" stop-color="#0f172a" stop-opacity="0.65" />
                        <stop offset="1" stop-color="#0f172a" stop-opacity="0" />
                    </linearGradient>

                    <filter id="glowDark">
                        <feGaussianBlur stdDeviation="1.8" result="blur" />
                        <feMerge>
                            <feMergeNode in="blur" />
                            <feMergeNode in="SourceGraphic" />
                        </feMerge>
                    </filter>
                </defs>
            </svg>

            <!-- grid sutil -->
            <div class="absolute inset-0 opacity-[0.06]"
                style="background-image:
                linear-gradient(rgba(0,80,176,0.16) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0,80,176,0.16) 1px, transparent 1px);
                background-size: 40px 40px;">
            </div>
        </div>

        <div class="relative mx-auto  px-6">
            <div class="mx-auto max-w-3xl text-center">
                <span
                    class="inline-flex items-center gap-2 rounded-full border border-altecbol-primary/10 bg-white px-4 py-2 text-sm font-semibold uppercase tracking-[0.18em] text-altecbol-primary shadow-sm">
                    <span class="h-2.5 w-2.5 rounded-full bg-altecbol-secondary"></span>
                    Soluciones destacadas
                </span>

                <h2 class="mt-4 text-3xl font-bold text-slate-900 md:text-4xl">
                    Tecnología diseñada para estabilidad, seguridad y crecimiento empresarial
                </h2>

                <p class="mt-4 leading-7 text-gray-600">
                    Integramos infraestructura, conectividad, soporte y comunicaciones para que tu empresa
                    opere mejor, reduzca riesgos y tenga una base tecnológica preparada para crecer.
                </p>
            </div>

            <div class="mt-16 grid gap-8 md:grid-cols-2 xl:grid-cols-4 2xl:gap-10">

                <article
                    class="group relative overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-sm transition duration-500 hover:-translate-y-2 hover:border-altecbol-primary/20 hover:shadow-[0_25px_60px_rgba(2,6,23,0.12)]">
                    <div class="absolute left-0 top-0 h-full w-1 bg-gradient-to-b from-[#0050b0] to-[#01d3d1]"></div>
                    <div
                        class="absolute right-5 top-5 text-6xl font-black leading-none text-slate-100 transition duration-500 group-hover:scale-110 group-hover:text-slate-200">
                        01</div>

                    <div class="relative overflow-hidden">
                        <img src="{{ asset('websitio/img/soluciones/redes_infraestructura.png') }}"
                            alt="Infraestructura y Data Center"
                            class="h-52 w-full object-cover transition duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/35 via-transparent to-transparent">
                        </div>
                    </div>

                    <div class="relative p-6">
                        <div
                            class="mb-5 flex h-12 w-12 items-center justify-center rounded-2xl bg-altecbol-primary/10 text-altecbol-primary transition duration-300 group-hover:bg-altecbol-primary group-hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 12a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1M5 12h14M5 12a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1m-2 3h.01M14 15h.01M17 9h.01M14 9h.01" />
                            </svg>
                        </div>

                        <h3 class="text-lg font-bold text-slate-900">
                            Infraestructura y Data Center
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-gray-600">
                            Diseñamos, implementamos y optimizamos entornos tecnológicos con servidores, virtualización,
                            almacenamiento y plataformas preparadas para la continuidad operativa.
                        </p>

                        <div class="mt-6 flex items-center justify-between">
                            <span class="text-sm font-semibold text-altecbol-primary">Continuidad operativa</span>
                            <span
                                class="h-[3px] w-14 rounded-full bg-gradient-to-r from-[#0050b0] to-[#01d3d1] transition-all duration-500 group-hover:w-20"></span>
                        </div>
                    </div>
                </article>

                <article
                    class="group relative overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-sm transition duration-500 hover:-translate-y-2 hover:border-altecbol-primary/20 hover:shadow-[0_25px_60px_rgba(2,6,23,0.12)]">
                    <div class="absolute left-0 top-0 h-full w-1 bg-gradient-to-b from-[#0050b0] to-[#01d3d1]"></div>
                    <div
                        class="absolute right-5 top-5 text-6xl font-black leading-none text-slate-100 transition duration-500 group-hover:scale-110 group-hover:text-slate-200">
                        02</div>

                    <div class="relative overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1597733336794-12d05021d510?auto=format&fit=crop&w=900&q=80"
                            alt="Redes y conectividad empresarial"
                            class="h-52 w-full object-cover transition duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/35 via-transparent to-transparent">
                        </div>
                    </div>

                    <div class="relative p-6">
                        <div
                            class="mb-5 flex h-12 w-12 items-center justify-center rounded-2xl bg-altecbol-primary/10 text-altecbol-primary transition duration-300 group-hover:bg-altecbol-primary group-hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.111 16.404a5.5 5.5 0 017.778 0M5.283 13.576a9.5 9.5 0 0113.434 0M2.454 10.747a13.5 13.5 0 0119.092 0M12 20h.01" />
                            </svg>
                        </div>

                        <h3 class="text-lg font-bold text-slate-900">
                            Redes y Conectividad Empresarial
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-gray-600">
                            Implementamos redes seguras, segmentadas y escalables con switching, routing,
                            WiFi corporativo, MPLS, VPN y alta disponibilidad.
                        </p>

                        <div class="mt-6 flex items-center justify-between">
                            <span class="text-sm font-semibold text-altecbol-primary">Conectividad segura</span>
                            <span
                                class="h-[3px] w-14 rounded-full bg-gradient-to-r from-[#0050b0] to-[#01d3d1] transition-all duration-500 group-hover:w-20"></span>
                        </div>
                    </div>
                </article>

                <article
                    class="group relative overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-sm transition duration-500 hover:-translate-y-2 hover:border-altecbol-primary/20 hover:shadow-[0_25px_60px_rgba(2,6,23,0.12)]">
                    <div class="absolute left-0 top-0 h-full w-1 bg-gradient-to-b from-[#0050b0] to-[#01d3d1]"></div>
                    <div
                        class="absolute right-5 top-5 text-6xl font-black leading-none text-slate-100 transition duration-500 group-hover:scale-110 group-hover:text-slate-200">
                        03</div>

                    <div class="relative overflow-hidden">
                        <img src="{{ asset('websitio/img/soluciones/soporte_tecnico.png') }}"
                            alt="Soporte técnico y gestión IT"
                            class="h-52 w-full object-cover transition duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/35 via-transparent to-transparent">
                        </div>
                    </div>

                    <div class="relative p-6">
                        <div
                            class="mb-5 flex h-12 w-12 items-center justify-center rounded-2xl bg-altecbol-primary/10 text-altecbol-primary transition duration-300 group-hover:bg-altecbol-primary group-hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z" />
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </svg>
                        </div>

                        <h3 class="text-lg font-bold text-slate-900">
                            Soporte Técnico y Gestión IT
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-gray-600">
                            Monitoreo, mantenimiento, diagnóstico y asistencia especializada para reducir fallos,
                            prevenir interrupciones y sostener la operación del negocio.
                        </p>

                        <div class="mt-6 flex items-center justify-between">
                            <span class="text-sm font-semibold text-altecbol-primary">Operación continua</span>
                            <span
                                class="h-[3px] w-14 rounded-full bg-gradient-to-r from-[#0050b0] to-[#01d3d1] transition-all duration-500 group-hover:w-20"></span>
                        </div>
                    </div>
                </article>

                <article
                    class="group relative overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-sm transition duration-500 hover:-translate-y-2 hover:border-altecbol-primary/20 hover:shadow-[0_25px_60px_rgba(2,6,23,0.12)]">
                    <div class="absolute left-0 top-0 h-full w-1 bg-gradient-to-b from-[#0050b0] to-[#01d3d1]"></div>
                    <div
                        class="absolute right-5 top-5 text-6xl font-black leading-none text-slate-100 transition duration-500 group-hover:scale-110 group-hover:text-slate-200">
                        04</div>

                    <div class="relative overflow-hidden">
                        <img src="{{ asset('websitio/img/soluciones/telefonia_ip.png') }}"
                            alt="Comunicaciones y call center"
                            class="h-52 w-full object-cover transition duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/35 via-transparent to-transparent">
                        </div>
                    </div>

                    <div class="relative p-6">
                        <div
                            class="mb-5 flex h-12 w-12 items-center justify-center rounded-2xl bg-altecbol-primary/10 text-altecbol-primary transition duration-300 group-hover:bg-altecbol-primary group-hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M18.427 14.768 17.2 13.542a1.733 1.733 0 0 0-2.45 0l-.613.613a1.732 1.732 0 0 1-2.45 0l-1.838-1.84a1.735 1.735 0 0 1 0-2.452l.612-.613a1.735 1.735 0 0 0 0-2.452L9.237 5.572a1.6 1.6 0 0 0-2.45 0c-3.223 3.2-1.702 6.896 1.519 10.117 3.22 3.221 6.914 4.745 10.12 1.535a1.601 1.601 0 0 0 0-2.456Z" />
                            </svg>
                        </div>

                        <h3 class="text-lg font-bold text-slate-900">
                            Comunicaciones y Call Center
                        </h3>

                        <p class="mt-3 text-sm leading-6 text-gray-600">
                            Implementamos telefonía IP, IVR, grabación, colas, extensiones y soluciones de comunicación
                            para atención al cliente y operación multisede.
                        </p>

                        <div class="mt-6 flex items-center justify-between">
                            <span class="text-sm font-semibold text-altecbol-primary">Comunicación empresarial</span>
                            <span
                                class="h-[3px] w-14 rounded-full bg-gradient-to-r from-[#0050b0] to-[#01d3d1] transition-all duration-500 group-hover:w-20"></span>
                        </div>
                    </div>
                </article>

            </div>
        </div>
        <style>
            @keyframes sdFloatA {

                0%,
                100% {
                    transform: translate3d(0, 0, 0) scale(1);
                }

                50% {
                    transform: translate3d(18px, -16px, 0) scale(1.08);
                }
            }

            @keyframes sdFloatB {

                0%,
                100% {
                    transform: translate3d(0, 0, 0) scale(1);
                }

                50% {
                    transform: translate3d(-20px, 14px, 0) scale(1.06);
                }
            }

            @keyframes sdFloatC {

                0%,
                100% {
                    transform: translate3d(0, 0, 0) scale(1);
                }

                50% {
                    transform: translate3d(10px, -18px, 0) scale(1.05);
                }
            }

            @keyframes sdPanelA {

                0%,
                100% {
                    transform: translateY(0) rotate(12deg);
                }

                50% {
                    transform: translateY(-12px) rotate(16deg);
                }
            }

            @keyframes sdPanelB {

                0%,
                100% {
                    transform: translateY(0) rotate(-12deg);
                }

                50% {
                    transform: translateY(14px) rotate(-8deg);
                }
            }

            @keyframes sdPanelC {

                0%,
                100% {
                    transform: translateY(0) rotate(6deg);
                }

                50% {
                    transform: translateY(-10px) rotate(10deg);
                }
            }

            @keyframes sdPulseNode {

                0%,
                100% {
                    opacity: 0.6;
                    transform: scale(1);
                }

                50% {
                    opacity: 1;
                    transform: scale(1.6);
                }
            }

            @keyframes sdLineFlow {

                0%,
                100% {
                    opacity: 0.18;
                }

                50% {
                    opacity: 0.42;
                }
            }

            .sd-orb-a {
                animation: sdFloatA 9s ease-in-out infinite;
            }

            .sd-orb-b {
                animation: sdFloatB 11s ease-in-out infinite;
            }

            .sd-orb-c {
                animation: sdFloatC 10s ease-in-out infinite;
            }

            .sd-panel-a {
                animation: sdPanelA 8s ease-in-out infinite;
            }

            .sd-panel-b {
                animation: sdPanelB 10s ease-in-out infinite;
            }

            .sd-panel-c {
                animation: sdPanelC 9s ease-in-out infinite;
            }

            .sd-line {
                animation: sdLineMove 8s linear infinite, sdLineFlow 5s ease-in-out infinite;
                opacity: 0.95;
            }

            .sd-line-dark {
                opacity: 1;
            }

            .sd-line-soft {
                animation-duration: 11s, 6s;
                opacity: 0.72;
            }

            .sd-node {
                transform-box: fill-box;
                transform-origin: center;
                filter: drop-shadow(0 0 8px rgba(1, 211, 207, 0.096));
                animation: sdPulseNode 2.8s ease-in-out infinite;
            }

            .sd-node:nth-of-type(2n) {
                animation-delay: .35s;
            }

            .sd-node:nth-of-type(3n) {
                animation-delay: .75s;
            }

            @keyframes sdLineMove {
                0% {
                    stroke-dashoffset: 0;
                }

                100% {
                    stroke-dashoffset: -72;
                }
            }
        </style>
    </section>
    <!-- QUÉ HACEMOS -->
    <section class="relative overflow-hidden bg-white py-24">
        <!-- DECORACIÓN DE FONDO -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute left-0 top-0 h-72 w-72 rounded-full bg-[#01d3d1]/10 blur-3xl"></div>
            <div class="absolute right-0 top-20 h-80 w-80 rounded-full bg-[#0050b0]/10 blur-3xl"></div>
            <div class="absolute bottom-0 left-1/3 h-64 w-64 rounded-full bg-sky-100 blur-3xl"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-6">
            <div class="mx-auto max-w-3xl text-center">
                <span
                    class="inline-flex items-center gap-2 rounded-full border border-altecbol-primary/10 bg-altecbol-primary/5 px-4 py-2 text-sm font-semibold uppercase tracking-[0.18em] text-altecbol-primary">
                    <span class="h-2.5 w-2.5 rounded-full bg-altecbol-secondary"></span>
                    Ecosistema tecnológico
                </span>

                <h2 class="mt-4 text-3xl font-bold tracking-tight text-slate-900 md:text-4xl xl:text-5xl">
                    Soluciones tecnológicas integrales para empresas
                </h2>

                <p class="mt-5 text-base leading-8 text-gray-600 md:text-lg">
                    En ALTECBOL conectamos infraestructura, seguridad, comunicaciones, software y equipamiento
                    para resolver necesidades reales de negocio con una visión técnica clara y enfocada en resultados.
                </p>
            </div>

            <div class="mt-16 grid gap-7 md:grid-cols-2 xl:grid-cols-3">

                <!-- CARD 1 -->
                <article
                    class="group relative overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-2 hover:border-altecbol-primary/20 hover:shadow-2xl">

                    <div
                        class="absolute -right-6 -top-6 h-28 w-28 rounded-full bg-[#0050b0]/10 blur-2xl transition duration-300 group-hover:bg-[#0050b0]/20">
                    </div>

                    <div class="relative z-10">
                        <span
                            class="inline-flex -translate-y-1 items-center rounded-full bg-[#0050b0] px-4 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-white shadow-lg">
                            Infraestructura
                        </span>

                        <div class="mt-5 flex items-start justify-between gap-4">
                            <h3 class="text-xl font-bold leading-7 text-slate-900">
                                Infraestructura, servidores y virtualización
                            </h3>
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-altecbol-primary transition duration-300 group-hover:bg-altecbol-primary group-hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 12a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1M5 12h14M5 12a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1m-2 3h.01M14 15h.01M17 9h.01M14 9h.01" />

                                </svg>


                            </div>
                        </div>

                        <p class="mt-4 text-sm leading-7 text-gray-600">
                            Implementamos servidores físicos y virtuales, plataformas en Proxmox, VMware, Linux y Windows
                            Server,
                            además de servicios de alquiler de servidores para empresas que necesitan capacidad y
                            continuidad.
                        </p>

                        <div class="mt-6 flex flex-wrap gap-2">
                            <span
                                class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Proxmox</span>
                            <span
                                class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">VMware</span>
                            <span
                                class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Servidores</span>
                        </div>
                    </div>
                </article>

                <!-- CARD 2 -->
                <article
                    class="group relative overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-2 hover:border-cyan-400/20 hover:shadow-2xl">

                    <div
                        class="absolute -left-6 -top-6 h-28 w-28 rounded-full bg-[#01d3d1]/10 blur-2xl transition duration-300 group-hover:bg-[#01d3d1]/20">
                    </div>

                    <div class="relative z-10">
                        <span
                            class="inline-flex -translate-y-1 items-center rounded-full bg-[#01d3d1] px-4 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-slate-900 shadow-lg">
                            Redes y seguridad
                        </span>

                        <div class="mt-5 flex items-start justify-between gap-4">
                            <h3 class="text-xl font-bold leading-7 text-slate-900">
                                Redes, WiFi corporativo y seguridad perimetral
                            </h3>
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-altecbol-primary transition duration-300 group-hover:bg-[#01d3d1] group-hover:text-slate-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.111 16.404a5.5 5.5 0 017.778 0M5.283 13.576a9.5 9.5 0 0113.434 0M2.454 10.747a13.5 13.5 0 0119.092 0M12 20h.01" />
                                </svg>
                            </div>
                        </div>

                        <p class="mt-4 text-sm leading-7 text-gray-600">
                            Diseñamos y configuramos redes cableadas e inalámbricas con MikroTik, Fortinet, switching,
                            segmentación, VPN, MPLS, failover y administración de tráfico.
                        </p>

                        <div class="mt-6 flex flex-wrap gap-2">
                            <span
                                class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">MikroTik</span>
                            <span
                                class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Fortinet</span>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">VPN /
                                MPLS</span>
                        </div>
                    </div>
                </article>

                <!-- CARD 3 -->
                <article
                    class="group relative overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-2 hover:border-slate-300 hover:shadow-2xl">

                    <div
                        class="absolute right-0 top-0 h-24 w-24 rounded-full bg-slate-200/50 blur-2xl transition duration-300 group-hover:bg-slate-300/50">
                    </div>

                    <div class="relative z-10">
                        <span
                            class="inline-flex -translate-y-1 items-center rounded-full bg-slate-900 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-white shadow-lg">
                            Soporte IT
                        </span>

                        <div class="mt-5 flex items-start justify-between gap-4">
                            <h3 class="text-xl font-bold leading-7 text-slate-900">
                                Soporte técnico y gestión continua
                            </h3>
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-slate-700 transition duration-300 group-hover:bg-slate-900 group-hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M21 13v-2a1 1 0 0 0-1-1h-.757l-.707-1.707.535-.536a1 1 0 0 0 0-1.414l-1.414-1.414a1 1 0 0 0-1.414 0l-.536.535L14 4.757V4a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v.757l-1.707.707-.536-.535a1 1 0 0 0-1.414 0L4.929 6.343a1 1 0 0 0 0 1.414l.536.536L4.757 10H4a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h.757l.707 1.707-.535.536a1 1 0 0 0 0 1.414l1.414 1.414a1 1 0 0 0 1.414 0l.536-.535 1.707.707V20a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-.757l1.707-.708.536.536a1 1 0 0 0 1.414 0l1.414-1.414a1 1 0 0 0 0-1.414l-.535-.536.707-1.707H20a1 1 0 0 0 1-1Z" />
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                </svg>
                            </div>
                        </div>


                        <p class="mt-4 text-sm leading-7 text-gray-600">
                            Brindamos atención técnica, mantenimiento preventivo y correctivo, monitoreo de servicios y
                            acompañamiento para mantener estable la operación tecnológica de cada cliente.
                        </p>

                        <div class="mt-6 flex flex-wrap gap-2">
                            <span
                                class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Monitoreo</span>
                            <span
                                class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Mantenimiento</span>
                            <span
                                class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Continuidad</span>
                        </div>
                    </div>
                </article>

                <!-- CARD 4 -->
                <article
                    class="group relative overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-2 hover:border-altecbol-primary/20 hover:shadow-2xl">

                    <div
                        class="absolute bottom-0 right-0 h-28 w-28 rounded-full bg-blue-100 blur-2xl transition duration-300 group-hover:bg-blue-200">
                    </div>

                    <div class="relative z-10">
                        <span
                            class="inline-flex -translate-y-1 items-center rounded-full bg-gradient-to-r from-[#0050b0] to-[#01d3d1] px-4 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-white shadow-lg">
                            Comunicaciones
                        </span>

                        <div class="mt-5 flex items-start justify-between gap-4">
                            <h3 class="text-xl font-bold leading-7 text-slate-900">
                                Telefonía IP y soluciones para call center
                            </h3>
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-altecbol-primary transition duration-300 group-hover:bg-altecbol-primary group-hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M18.427 14.768 17.2 13.542a1.733 1.733 0 0 0-2.45 0l-.613.613a1.732 1.732 0 0 1-2.45 0l-1.838-1.84a1.735 1.735 0 0 1 0-2.452l.612-.613a1.735 1.735 0 0 0 0-2.452L9.237 5.572a1.6 1.6 0 0 0-2.45 0c-3.223 3.2-1.702 6.896 1.519 10.117 3.22 3.221 6.914 4.745 10.12 1.535a1.601 1.601 0 0 0 0-2.456Z" />

                                </svg>



                            </div>
                        </div>

                        <p class="mt-4 text-sm leading-7 text-gray-600">
                            Configuramos telefonía IP, IVR, extensiones, grabación, colas, herramientas de atención
                            y plataformas de comunicación para entornos de alto volumen operativo.
                        </p>

                        <div class="mt-6 flex flex-wrap gap-2">
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">IVR</span>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Call
                                Center</span>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Telefonía
                                IP</span>
                        </div>
                    </div>
                </article>

                <!-- CARD 5 -->
                <article
                    class="group relative overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-2 hover:border-emerald-300/30 hover:shadow-2xl">

                    <div
                        class="absolute -right-8 bottom-0 h-28 w-28 rounded-full bg-emerald-100 blur-2xl transition duration-300 group-hover:bg-emerald-200">
                    </div>

                    <div class="relative z-10">
                        <span
                            class="inline-flex -translate-y-1 items-center rounded-full bg-emerald-500 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-white shadow-lg">
                            Seguridad física
                        </span>

                        <div class="mt-5 flex items-start justify-between gap-4">
                            <h3 class="text-xl font-bold leading-7 text-slate-900">
                                Video vigilancia y control de acceso
                            </h3>
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-emerald-600 transition duration-300 group-hover:bg-emerald-500 group-hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M14 6H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1Zm7 11-6-2V9l6-2v10Z" />
                                </svg>

                            </div>
                        </div>

                        <p class="mt-4 text-sm leading-7 text-gray-600">
                            Instalamos cámaras, biométricos, cerraduras y sistemas de control de acceso para reforzar
                            la seguridad física y mejorar el control de ingreso en oficinas, plantas y sucursales.
                        </p>

                        <div class="mt-6 flex flex-wrap gap-2">
                            <span
                                class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">CCTV</span>
                            <span
                                class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Biométricos</span>
                            <span
                                class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Acceso</span>
                        </div>
                    </div>
                </article>

                <!-- CARD 6 -->
                <article
                    class="group relative overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-7 shadow-sm transition duration-300 hover:-translate-y-2 hover:border-violet-300/30 hover:shadow-2xl">

                    <div
                        class="absolute left-0 top-0 h-28 w-28 rounded-full bg-violet-100 blur-2xl transition duration-300 group-hover:bg-violet-200">
                    </div>

                    <div class="relative z-10">
                        <span
                            class="inline-flex -translate-y-1 items-center rounded-full bg-violet-600 px-4 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-white shadow-lg">
                            Software a medida
                        </span>

                        <div class="mt-5 flex items-start justify-between gap-4">
                            <h3 class="text-xl font-bold leading-7 text-slate-900">
                                Desarrollo de software y soluciones a medida
                            </h3>
                            <div
                                class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-violet-600 transition duration-300 group-hover:bg-violet-600 group-hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14" />

                                </svg>

                            </div>
                        </div>

                        <p class="mt-4 text-sm leading-7 text-gray-600">
                            Desarrollamos sistemas empresariales, plataformas web, automatizaciones y herramientas digitales
                            adaptadas a la operación y al crecimiento de cada empresa.
                        </p>

                        <div class="mt-6 flex flex-wrap gap-2">
                            <span
                                class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Laravel</span>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Vue
                                Js</span>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Node
                                Js</span>

                            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-700">Web</span>
                        </div>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- VALOR -->
    <section id="valor-section" class="relative overflow-hidden py-24 text-white">
        <!-- Fondo parallax -->
        <div class="absolute inset-0">
            <div id="valor-parallax" class="absolute inset-x-0 -top-40 -bottom-40 will-change-transform"
                style="
            background-image: url('{{ asset('images/portada_altecbol.png') }}');
            background-size: cover;
            background-position: center top;
            background-repeat: no-repeat;
            transform: translate3d(0, -120px, 0);
        ">
            </div>

            <div class="absolute inset-0 bg-slate-950/55"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950/45 via-slate-900/25 to-slate-950/45"></div>
        </div>

        <div class="relative mx-auto max-w-7xl px-6">
            <div class="grid gap-12 lg:grid-cols-2 lg:items-center">
                <div>
                    <span class="text-sm font-semibold uppercase tracking-[0.18em] text-altecbol-secondary">
                        Valor para tu empresa
                    </span>
                    <h2 class="mt-3 text-3xl font-bold md:text-4xl">
                        No solo implementamos tecnología. La hacemos funcionar.
                    </h2>
                    <p class="mt-5 leading-7 text-slate-200">
                        Acompañamos a empresas en la organización, mejora y crecimiento de su entorno tecnológico,
                        asegurando estabilidad, seguridad, continuidad operativa y capacidad de evolución.
                    </p>

                    <div class="mt-8 space-y-5">
                        <div class="flex gap-4">
                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-altecbol-secondary font-semibold text-slate-900">
                                1
                            </div>
                            <div>
                                <h3 class="font-semibold text-white">Visión integral del negocio</h3>
                                <p class="mt-1 text-sm text-slate-200">
                                    Integramos infraestructura, comunicaciones, seguridad y software con enfoque práctico.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-altecbol-secondary font-semibold text-slate-900">
                                2
                            </div>
                            <div>
                                <h3 class="font-semibold text-white">Implementaciones adaptadas</h3>
                                <p class="mt-1 text-sm text-slate-200">
                                    Diseñamos soluciones según el tamaño, operación y objetivos de cada empresa.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-altecbol-secondary font-semibold text-slate-900">
                                3
                            </div>
                            <div>
                                <h3 class="font-semibold text-white">Acompañamiento a largo plazo</h3>
                                <p class="mt-1 text-sm text-slate-200">
                                    No solo instalamos: damos soporte, evolución y continuidad a cada proyecto.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="overflow-hidden rounded-[2rem] bg-white/10 p-8 ring-1 ring-white/15 backdrop-blur-sm">
                    <div class="grid gap-6 sm:grid-cols-2">
                        <div class="rounded-2xl border border-white/10 bg-white/10 p-5">
                            <h4 class="font-semibold text-white">Conectividad</h4>
                            <p class="mt-2 text-sm text-slate-200">Redes, enlaces, WiFi, VPN y continuidad operativa.</p>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/10 p-5">
                            <h4 class="font-semibold text-white">Infraestructura</h4>
                            <p class="mt-2 text-sm text-slate-200">Servidores, virtualización, data center y alquiler de
                                capacidad.</p>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/10 p-5">
                            <h4 class="font-semibold text-white">Comunicaciones</h4>
                            <p class="mt-2 text-sm text-slate-200">Telefonía IP, IVR y soluciones para call center.</p>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/10 p-5">
                            <h4 class="font-semibold text-white">Transformación digital</h4>
                            <p class="mt-2 text-sm text-slate-200">Software a medida, automatización y herramientas
                                empresariales.</p>
                        </div>
                    </div>

                    <a href="{{ route('web.contacto') }}"
                        class="mt-8 inline-block rounded-2xl bg-altecbol-secondary px-6 py-3 font-semibold text-slate-900 transition hover:opacity-90">
                        Hablar con ALTECBOL
                    </a>
                </div>
            </div>
        </div>
    </section>

    @php
        $casosHome = [
            [
                'slug' => 'vencorp-call-center-tigo',
                'cliente' => 'Vencorp',
                'titulo' => 'Infraestructura de Call Center para Tigo',
                'descripcion' =>
                    'Implementación de Data Center y Troncal SIP para fortalecer la operación de atención al cliente.',
                'imagen' => asset('websitio/img/project/vencorp.png'),
                'categoria' => 'Enterprise Communications',
                'resultado' => 'Mayor estabilidad operativa',
                'logo' => asset('websitio/img/vencorp.png'),
            ],
            [
                'slug' => 'imex-certificacion-oea',
                'cliente' => 'IMEX',
                'titulo' => 'Infraestructura tecnológica para certificación OEA',
                'descripcion' =>
                    'Controles, respaldos y trazabilidad para apoyar procesos de auditoría y continuidad operativa.',
                'imagen' => asset('websitio/img/project/imexp.png'),
                'categoria' => 'Cybersecurity',
                'resultado' => 'Mayor trazabilidad y control',
                'logo' => asset('websitio/img/imex.png'),
            ],
            [
                'slug' => 'mercomex-data-center',
                'cliente' => 'Mercomex',
                'titulo' => 'Data Center empresarial',
                'descripcion' =>
                    'Infraestructura estable, escalable y preparada para soportar el crecimiento operativo.',
                'imagen' => asset('websitio/img/project/mercomexp.png'),
                'categoria' => 'Cloud & Data Center',
                'resultado' => 'Escalabilidad para crecimiento',
                'logo' => asset('websitio/img/mercomex.png'),
            ],
            [
                'slug' => 'grupo-lucky-red-corporativa',
                'cliente' => 'Grupo Lucky',
                'titulo' => 'Red corporativa segura',
                'descripcion' => 'Segmentación, conectividad y protección para una operación multisede más confiable.',
                'imagen' => asset('websitio/img/project/luckyp.png'),
                'categoria' => 'Cybersecurity',
                'resultado' => 'Red más segura y confiable',
                'logo' => asset('websitio/img/lucky.png'),
            ],
            [
                'slug' => 'colegio-medico-scz-red-segura',
                'cliente' => 'Colegio Médico SCZ',
                'titulo' => 'Red segura y protegida',
                'descripcion' =>
                    'Políticas de filtrado, control de tráfico y seguridad perimetral para mayor continuidad.',
                'imagen' => asset('websitio/img/project/medicop.png'),
                'categoria' => 'Cybersecurity',
                'resultado' => 'Mayor continuidad operativa',
                'logo' => asset('websitio/img/medico.png'),
            ],
            [
                'slug' => 'zyra-bpo-call-center',
                'cliente' => 'Zyra BPO',
                'titulo' => 'Call Center con data center y SIP',
                'descripcion' => 'Infraestructura escalable para operación BPO con comunicaciones más estables.',
                'imagen' => asset('websitio/img/project/zyrap.png'),
                'categoria' => 'Enterprise Communications',
                'resultado' => 'Comunicaciones más estables',
                'logo' => asset('websitio/img/zyra.png'),
            ],
        ];
    @endphp

    <!-- CASOS DE ÉXITO -->
    <section class="relative overflow-hidden bg-white py-24">
        <!-- Fondos decorativos -->
        <div class="pointer-events-none absolute inset-0">
            <div class="absolute left-[-80px] top-10 h-72 w-72 rounded-full bg-[#01d3d1]/10 blur-3xl"></div>
            <div class="absolute right-[-100px] top-20 h-80 w-80 rounded-full bg-[#0050b0]/10 blur-3xl"></div>
            <div class="absolute bottom-0 left-1/3 h-72 w-72 rounded-full bg-sky-100/70 blur-3xl"></div>

            <div class="absolute inset-0 opacity-[0.04]"
                style="background-image:
                linear-gradient(rgba(0,80,176,0.18) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0,80,176,0.18) 1px, transparent 1px);
                background-size: 38px 38px;">
            </div>
        </div>

        <div class="relative mx-auto max-w-7xl px-6">
            <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                <div class="max-w-3xl">
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-[#0050b0]/10 bg-[#0050b0]/5 px-4 py-2 text-sm font-semibold uppercase tracking-[0.18em] text-[#0050b0]">
                        <span class="h-2.5 w-2.5 rounded-full bg-[#01d3d1]"></span>
                        Casos de éxito
                    </span>

                    <h2 class="mt-4 text-3xl font-bold text-slate-900 md:text-4xl">
                        Proyectos reales que reflejan resultados concretos
                    </h2>

                    <p class="mt-4 max-w-2xl leading-7 text-gray-600">
                        Conoce algunas implementaciones donde ayudamos a empresas a fortalecer su infraestructura,
                        seguridad, conectividad y continuidad operativa.
                    </p>
                </div>

                <a href="{{ route('web.casos.index') }}"
                    class="inline-flex items-center justify-center rounded-2xl border border-[#0050b0] px-6 py-3 font-semibold text-[#0050b0] transition hover:bg-[#0050b0] hover:text-white">
                    Ver todos los casos
                </a>
            </div>

            <div class="mt-16 grid gap-8 md:grid-cols-2 xl:grid-cols-3">
                @foreach ($casosHome as $caso)
                    <a href="{{ route('web.casos.show', $caso['slug']) }}"
                        class="group relative block overflow-visible rounded-[2rem] border border-slate-200 bg-white shadow-sm transition duration-500 hover:-translate-y-2 hover:border-[#0050b0]/20 hover:shadow-[0_25px_60px_rgba(2,6,23,0.12)]">



                        <!-- Logo flotante -->
                        <div class="absolute left-6 top-6 z-20">
                            <div
                                class="flex h-16 w-16 items-center justify-center rounded-2xl border border-white/80 bg-white/95 shadow-[0_12px_30px_rgba(2,6,23,0.12)] backdrop-blur">
                                <img src="{{ $caso['logo'] }}" alt="Logo {{ $caso['cliente'] }}"
                                    class="w-44 object-contain">
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div class="relative overflow-hidden rounded-t-[2rem]">
                            <img src="{{ $caso['imagen'] }}" alt="{{ $caso['cliente'] }}"
                                class="h-64 w-full object-cover transition duration-700 group-hover:scale-105">

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-900/20 to-transparent">
                            </div>

                            <div class="absolute bottom-4 left-4 right-4 flex items-end justify-between gap-3">
                                <span
                                    class="inline-flex rounded-full border border-white/20 bg-white/15 px-3 py-1 text-xs font-semibold text-white backdrop-blur-md">
                                    {{ $caso['categoria'] }}
                                </span>

                                <span
                                    class="rounded-full bg-[#01d3d1] px-3 py-1 text-xs font-bold text-slate-900 shadow-md">
                                    Implementado
                                </span>
                            </div>
                        </div>

                        <!-- Contenido -->
                        <div class="p-6 pt-5">
                            <div>
                                <h3 class="text-xl font-bold text-slate-900">
                                    {{ $caso['cliente'] }}
                                </h3>

                                <p class="mt-2 text-sm font-semibold text-[#0050b0]">
                                    {{ $caso['titulo'] }}
                                </p>
                            </div>

                            <p class="mt-4 text-sm leading-6 text-gray-600">
                                {{ $caso['descripcion'] }}
                            </p>

                            <div class="mt-5 rounded-2xl bg-slate-50 p-4 ring-1 ring-slate-200">
                                <div class="text-[11px] font-semibold uppercase tracking-[0.18em] text-slate-500">
                                    Resultado / enfoque
                                </div>
                                <div class="mt-2 text-sm font-semibold text-slate-800">
                                    {{ $caso['resultado'] }}
                                </div>
                            </div>

                            <div class="mt-6 flex items-center justify-between">
                                <span class="text-sm font-semibold text-[#0050b0]">
                                    Ver caso completo
                                </span>

                                <span
                                    class="flex h-10 w-10 items-center justify-center rounded-full bg-[#0050b0]/10 text-[#0050b0]">
                                    →
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CINTA 2: SERVICIOS DESTACADOS -->
    <section class="bg-slate-50 py-8">
        <div class="marquee js-marquee" data-speed="0.55" data-direction="left">
            <div class="marquee__viewport">
                <div class="marquee__track js-marquee-track">
                    <div class="marquee__group js-marquee-group">

                        <div class="min-w-[300px] overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-slate-200">
                            <img src="{{ asset('websitio/img/soluciones/redes_infraestructura.png') }}"
                                alt="Infraestructura y Data Center" class="h-48 w-full object-cover">
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-slate-900">Infraestructura y Data Center</h3>
                                <p class="mt-2 text-sm leading-6 text-gray-600">
                                    Plataformas empresariales sólidas, virtualizadas y listas para crecer.
                                </p>
                            </div>
                        </div>

                        <div class="min-w-[300px] overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-slate-200">
                            <img src="{{ asset('websitio/img/soluciones/servidores_virtualizacion.png') }}"
                                alt="Redes y conectividad" class="h-48 w-full object-cover">
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-slate-900">Redes y conectividad</h3>
                                <p class="mt-2 text-sm leading-6 text-gray-600">
                                    Cobertura, segmentación, seguridad y estabilidad para operar sin interrupciones.
                                </p>
                            </div>
                        </div>

                        <div class="min-w-[300px] overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-slate-200">
                            <img src="{{ asset('websitio/img/project/siranip.png') }}"
                                alt="Soporte técnico y gestión IT" class="h-48 w-full object-cover">
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-slate-900">Soporte técnico y gestión IT</h3>
                                <p class="mt-2 text-sm leading-6 text-gray-600">
                                    Atención especializada para sostener la continuidad tecnológica del negocio.
                                </p>
                            </div>
                        </div>

                        <div class="min-w-[300px] overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-slate-200">
                            <img src="{{ asset('websitio/img/soluciones/telefonia_ip.png') }}"
                                alt="Telefonía IP y call center" class="h-48 w-full object-cover">
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-slate-900">Telefonía IP y call center</h3>
                                <p class="mt-2 text-sm leading-6 text-gray-600">
                                    Soluciones de comunicación para atención eficiente y operación organizada.
                                </p>
                            </div>
                        </div>

                        <div class="min-w-[300px] overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-slate-200">
                            <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=900&q=80"
                                alt="Alquiler de servidores" class="h-48 w-full object-cover">
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-slate-900">Servidores en la Nube ALTECBOL</h3>
                                <p class="mt-2 text-sm leading-6 text-gray-600">
                                    Capacidad tecnológica disponible para sistemas, aplicaciones y servicios críticos.
                                </p>
                            </div>
                        </div>

                        <div class="min-w-[300px] overflow-hidden rounded-[2rem] bg-white shadow-sm ring-1 ring-slate-200">
                            <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=900&q=80"
                                alt="Desarrollo de software" class="h-48 w-full object-cover">
                            <div class="p-5">
                                <h3 class="text-lg font-bold text-slate-900">Desarrollo de software</h3>
                                <p class="mt-2 text-sm leading-6 text-gray-600">
                                    Plataformas y sistemas a medida para procesos más ágiles y controlados.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA TIENDA -->
    <section class="bg-white py-20">
        <div class="mx-auto max-w-7xl px-6">
            <div
                class="grid items-center gap-10 rounded-[2rem] bg-slate-50 p-8 ring-1 ring-slate-200 lg:grid-cols-2 lg:p-12">
                <div>
                    <span class="text-sm font-semibold uppercase tracking-[0.18em] text-altecbol-primary">
                        Tienda virtual
                    </span>
                    <h2 class="mt-3 text-3xl font-bold text-slate-900 md:text-4xl">
                        Equipamiento y soluciones listas para implementar en tu empresa
                    </h2>
                    <p class="mt-5 leading-7 text-gray-600">
                        Encuentra productos, infraestructura, licencias y equipamiento tecnológico
                        con asesoría técnica y respaldo profesional.
                    </p>
                </div>

                <div class="flex flex-col gap-4 sm:flex-row lg:justify-end">
                    <a href="{{ route('web.tienda.index') }}"
                        class="rounded-2xl bg-altecbol-primary px-7 py-4 text-center font-semibold text-white transition hover:opacity-95">
                        Ir a la tienda
                    </a>

                    <a href="{{ route('web.contacto') }}"
                        class="rounded-2xl border border-altecbol-primary px-7 py-4 text-center font-semibold text-altecbol-primary transition hover:bg-altecbol-primary hover:text-white">
                        Solicitar cotización
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
        .marquee {
            position: relative;
            width: 100%;
        }

        .marquee__viewport {
            overflow: hidden;
            width: 100%;
        }

        .marquee__track {
            display: flex;
            align-items: stretch;
            width: max-content;
            will-change: transform;
        }

        .marquee__group {
            display: flex;
            gap: 1.5rem;
            flex-shrink: 0;
            width: max-content;
            padding-right: 1.5rem;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hero = document.getElementById('hero-altecbol');
            const wavePath = document.getElementById('hero-wave-path');

            if (!hero || !wavePath) return;

            let currentAmp = 0;
            let currentLift = 0;
            let currentBias = 0;

            let targetAmp = 0;
            let targetLift = 0;
            let targetBias = 0;

            function buildWavePath(amp = 0, lift = 0, bias = 0) {
                const y0 = 90 + lift;
                const y1 = 84 + amp * 0.6 + lift;
                const y2 = 78 + amp * 1.0 + lift;
                const y3 = 66 + amp * 1.2 + lift;
                const y4 = 70 - amp * 0.2 + lift;
                const y5 = 74 - amp * 0.5 + lift;
                const y6 = 94 - amp * 0.9 + lift;
                const y7 = 102 - amp * 1.0 + lift;
                const y8 = 110 - amp * 0.7 + lift + bias;
                const y9 = 106 - amp * 0.3 + lift + bias;
                const y10 = 104 + amp * 0.2 + lift + bias;
                const y11 = 102 + amp * 0.35 + lift + bias;

                return `
                    M0,${y0}
                    L80,${y1}
                    C160,${y2},320,${y3},480,${y4}
                    C640,${y5},800,${y6},960,${y7}
                    C1120,${y8},1280,${y9},1360,${y10}
                    L1440,${y11}
                    V220
                    H0
                    Z
                `.replace(/\s+/g, ' ').trim();
            }

            hero.addEventListener('mousemove', function(e) {
                const rect = hero.getBoundingClientRect();
                const x = (e.clientX - rect.left) / rect.width;
                const y = (e.clientY - rect.top) / rect.height;

                const offsetX = x - 0.5;
                const offsetY = y - 0.5;

                targetAmp = offsetX * 65;
                targetLift = offsetY * 24;
                targetBias = offsetX * 22;
            });

            hero.addEventListener('mouseleave', function() {
                targetAmp = 0;
                targetLift = 0;
                targetBias = 0;
            });

            function animateWave() {
                currentAmp += (targetAmp - currentAmp) * 0.14;
                currentLift += (targetLift - currentLift) * 0.14;
                currentBias += (targetBias - currentBias) * 0.14;

                wavePath.setAttribute('d', buildWavePath(currentAmp, currentLift, currentBias));

                requestAnimationFrame(animateWave);
            }

            animateWave();

            const marquees = document.querySelectorAll('.js-marquee');

            marquees.forEach((marquee) => {
                const viewport = marquee.querySelector('.marquee__viewport');
                const track = marquee.querySelector('.js-marquee-track');
                const originalGroup = marquee.querySelector('.js-marquee-group');

                if (!viewport || !track || !originalGroup) return;

                const speed = parseFloat(marquee.dataset.speed || '0.6');
                const direction = marquee.dataset.direction || 'right';

                let position = 0;
                let animationId = null;
                let paused = false;
                let groupWidth = 0;

                function buildTrack() {
                    const originalHTML = originalGroup.outerHTML;
                    track.innerHTML = '';

                    const tempWrapper = document.createElement('div');
                    tempWrapper.innerHTML = originalHTML;
                    const firstGroup = tempWrapper.firstElementChild;
                    track.appendChild(firstGroup);

                    groupWidth = firstGroup.offsetWidth;

                    const copiesNeeded = Math.ceil((viewport.offsetWidth + groupWidth * 2) / groupWidth) +
                        2;

                    for (let i = 0; i < copiesNeeded; i++) {
                        const cloneWrap = document.createElement('div');
                        cloneWrap.innerHTML = originalHTML;
                        track.appendChild(cloneWrap.firstElementChild);
                    }

                    if (direction === 'left') {
                        position = -groupWidth;
                    } else {
                        position = 0;
                    }

                    track.style.transform = `translate3d(${position}px, 0, 0)`;
                }

                function animate() {
                    if (!paused) {
                        if (direction === 'right') {
                            position -= speed;

                            if (Math.abs(position) >= groupWidth) {
                                position += groupWidth;
                            }
                        } else {
                            position += speed;

                            if (position >= 0) {
                                position -= groupWidth;
                            }
                        }

                        track.style.transform = `translate3d(${position}px, 0, 0)`;
                    }

                    animationId = requestAnimationFrame(animate);
                }

                marquee.addEventListener('mouseenter', () => {
                    paused = true;
                });

                marquee.addEventListener('mouseleave', () => {
                    paused = false;
                });

                let resizeTimeout;
                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimeout);
                    resizeTimeout = setTimeout(() => {
                        cancelAnimationFrame(animationId);
                        buildTrack();
                        animate();
                    }, 150);
                });

                buildTrack();
                animate();
            });


        });
        window.addEventListener('load', function() {
            const section = document.getElementById('valor-section');
            const bg = document.getElementById('valor-parallax');

            if (!section || !bg) return;

            function updateValorParallax() {
                const rect = section.getBoundingClientRect();
                const windowH = window.innerHeight;

                if (rect.bottom < 0 || rect.top > windowH) return;

                const progress = (windowH - rect.top) / (windowH + rect.height);
                const clamped = Math.max(0, Math.min(1, progress));

                const start = -120;
                const end = 120;
                const moveY = start + ((end - start) * clamped);

                bg.style.transform = `translate3d(0, ${moveY}px, 0)`;
            }

            updateValorParallax();
            window.addEventListener('scroll', updateValorParallax, {
                passive: true
            });
            window.addEventListener('resize', updateValorParallax);
        });
    </script>
@endsection
