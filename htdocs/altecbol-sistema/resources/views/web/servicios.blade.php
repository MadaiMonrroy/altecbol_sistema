@extends('layouts.web')

@section('title', 'Servicios | ALTECBOL')

@section('content')

<!-- HERO -->
<section class="relative overflow-hidden bg-slate-950">
    <div class="absolute inset-0">
        <img
            src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1600&q=80"
            alt="Infraestructura tecnológica empresarial"
            class="h-full w-full object-cover opacity-20"
        >
    </div>

    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(1,211,209,0.18),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(0,80,176,0.35),_transparent_35%),linear-gradient(to_right,_rgba(2,6,23,0.95),_rgba(0,80,176,0.88),_rgba(2,6,23,0.95))]"></div>

    <div class="relative max-w-7xl mx-auto px-6 py-12 lg:py-16 lg:pt-32">
        <div class="grid lg:grid-cols-2 gap-14 items-center">

            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
                <span class="inline-flex items-center rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm text-white/90 backdrop-blur">
                    Soluciones ALTECBOL
                </span>

                <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-bold leading-tight text-white">
                    Servicios tecnológicos
                    <span class="text-[#01d3d1]">diseñados para empresas</span>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-200">
                    Impulsamos la continuidad, seguridad y crecimiento de tu empresa con
                    infraestructura IT, ciberseguridad, comunicaciones empresariales,
                    soporte especializado y soluciones integrales.
                </p>

                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('web.contacto') }}"
                       class="inline-flex items-center justify-center rounded-2xl bg-[#01d3d1] px-6 py-3.5 font-semibold text-slate-900 transition hover:scale-[1.02]">
                        Solicitar asesoría
                    </a>

                    <a href="#soluciones"
                       class="inline-flex items-center justify-center rounded-2xl border border-white/20 px-6 py-3.5 font-semibold text-white transition hover:bg-white hover:text-[#0050b0]">
                        Ver servicios
                    </a>
                </div>

                <div class="mt-10 grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur">
                        <div class="text-2xl font-bold text-[#01d3d1]">IT</div>
                        <div class="mt-1 text-sm text-slate-200">Infraestructura</div>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur">
                        <div class="text-2xl font-bold text-[#01d3d1]">SEC</div>
                        <div class="mt-1 text-sm text-slate-200">Seguridad</div>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur">
                        <div class="text-2xl font-bold text-[#01d3d1]">COM</div>
                        <div class="mt-1 text-sm text-slate-200">Comunicaciones</div>
                    </div>
                    <div class="rounded-2xl border border-white/10 bg-white/10 p-4 backdrop-blur">
                        <div class="text-2xl font-bold text-[#01d3d1]">SUP</div>
                        <div class="mt-1 text-sm text-slate-200">Soporte</div>
                    </div>
                </div>
            </div>

            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100">
                <div class="relative grid gap-4 sm:grid-cols-2">
                    <div class="rounded-[2rem] border border-white/10 bg-white/10 p-6 backdrop-blur shadow-2xl">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-slate-300">Cloud & Data Center</span>
                            <span class="h-3 w-3 rounded-full bg-[#01d3d1]"></span>
                        </div>
                        <h3 class="mt-4 text-xl font-bold text-white">Infraestructura escalable</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-200">
                            Diseñada para disponibilidad, virtualización y crecimiento.
                        </p>
                    </div>

                    <div class="rounded-[2rem] border border-white/10 bg-white/10 p-6 backdrop-blur shadow-2xl mt-8 sm:mt-12">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-slate-300">Cybersecurity</span>
                            <span class="h-3 w-3 rounded-full bg-[#01d3d1]"></span>
                        </div>
                        <h3 class="mt-4 text-xl font-bold text-white">Protección confiable</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-200">
                            Firewalls, VPN y resguardo de datos sensibles.
                        </p>
                    </div>

                    <div class="rounded-[2rem] border border-white/10 bg-white/10 p-6 backdrop-blur shadow-2xl">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-slate-300">Managed IT Services</span>
                            <span class="h-3 w-3 rounded-full bg-[#01d3d1]"></span>
                        </div>
                        <h3 class="mt-4 text-xl font-bold text-white">Soporte continuo</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-200">
                            Monitoreo, mantenimiento y continuidad operativa.
                        </p>
                    </div>

                    <div class="rounded-[2rem] border border-white/10 bg-white/10 p-6 backdrop-blur shadow-2xl mt-8 sm:mt-12">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-slate-300">Enterprise Communications</span>
                            <span class="h-3 w-3 rounded-full bg-[#01d3d1]"></span>
                        </div>
                        <h3 class="mt-4 text-xl font-bold text-white">Conectividad empresarial</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-200">
                            Telefonía IP, redes multisede y colaboración más ágil.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="relative -mt-14">
        <svg viewBox="0 0 1440 120" class="h-24 w-full fill-white" preserveAspectRatio="none">
            <path d="M0,96L80,85.3C160,75,320,53,480,48C640,43,800,53,960,64C1120,75,1280,85,1360,90.7L1440,96L1440,120L0,120Z"></path>
        </svg>
    </div>
</section>

<!-- INTRO -->
<section class="bg-white pb-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-3 gap-6">
            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out rounded-[2rem] border border-slate-100 bg-slate-50 p-7 shadow-lg">
                <div class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">Continuidad</div>
                <h3 class="mt-3 text-xl font-bold text-slate-900">Tecnología que acompaña tu operación</h3>
                <p class="mt-3 text-sm leading-6 text-slate-600">
                    Diseñamos soluciones para reducir interrupciones y dar más estabilidad al negocio.
                </p>
            </div>

            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100 rounded-[2rem] border border-slate-100 bg-slate-50 p-7 shadow-lg">
                <div class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">Seguridad</div>
                <h3 class="mt-3 text-xl font-bold text-slate-900">Protección con visión empresarial</h3>
                <p class="mt-3 text-sm leading-6 text-slate-600">
                    La seguridad tecnológica no solo previene incidentes: protege la confianza y la continuidad.
                </p>
            </div>

            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-200 rounded-[2rem] border border-slate-100 bg-slate-50 p-7 shadow-lg">
                <div class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">Escalabilidad</div>
                <h3 class="mt-3 text-xl font-bold text-slate-900">Soluciones listas para crecer</h3>
                <p class="mt-3 text-sm leading-6 text-slate-600">
                    Implementamos tecnología alineada al presente de tu empresa y preparada para su evolución.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- SOLUCIONES -->
<section id="soluciones" class="relative overflow-hidden bg-slate-50 py-20">
    <div class="absolute top-0 left-0 h-72 w-72 rounded-full bg-[#01d3d1]/10 blur-3xl"></div>
    <div class="absolute bottom-0 right-0 h-72 w-72 rounded-full bg-[#0050b0]/10 blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-6">
        <div class="max-w-3xl js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
            <span class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">Nuestras soluciones</span>
            <h2 class="mt-3 text-3xl md:text-4xl font-bold text-slate-900">
                Un portafolio pensado para necesidades tecnológicas reales
            </h2>
            <p class="mt-5 text-gray-600 leading-8">
                Desde data center y seguridad hasta videovigilancia, soporte administrado y comunicaciones,
                cubrimos áreas clave para empresas que buscan control, continuidad y mejor rendimiento.
            </p>
        </div>

        <div class="mt-10 flex items-center justify-between">
            <div class="text-sm text-slate-500">Desliza para explorar soluciones</div>
            <div class="flex gap-3">
                <button id="servicesPrev" class="h-11 w-11 rounded-full border border-slate-200 bg-white text-slate-700 shadow hover:bg-slate-100">‹</button>
                <button id="servicesNext" class="h-11 w-11 rounded-full border border-slate-200 bg-white text-slate-700 shadow hover:bg-slate-100">›</button>
            </div>
        </div>

        <div id="servicesCarousel" class="mt-8 flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-4 [scrollbar-width:none] [-ms-overflow-style:none]">
            <div class="min-w-[320px] md:min-w-[380px] lg:min-w-[420px] snap-start overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-xl">
                <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=80" alt="Cloud y data center" class="h-56 w-full object-cover">
                <div class="p-7">
                    <div class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">01</div>
                    <h3 class="mt-3 text-2xl font-bold text-slate-900">Cloud & Data Center</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-600">
                        Infraestructura y virtualización pensadas para garantizar continuidad, disponibilidad y crecimiento seguro.
                    </p>
                    <ul class="mt-5 space-y-2 text-sm text-slate-600">
                        <li>• Virtualización y consolidación</li>
                        <li>• Servidores y disponibilidad</li>
                        <li>• Escalabilidad para crecimiento</li>
                    </ul>
                </div>
            </div>

            <div class="min-w-[320px] md:min-w-[380px] lg:min-w-[420px] snap-start overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-xl">
                <img src="https://images.unsplash.com/photo-1510511459019-5dda7724fd87?auto=format&fit=crop&w=1200&q=80" alt="Ciberseguridad" class="h-56 w-full object-cover">
                <div class="p-7">
                    <div class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">02</div>
                    <h3 class="mt-3 text-2xl font-bold text-slate-900">Cybersecurity</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-600">
                        Firewalls y VPN avanzadas para proteger datos sensibles, accesos y continuidad de la operación.
                    </p>
                    <ul class="mt-5 space-y-2 text-sm text-slate-600">
                        <li>• Protección perimetral</li>
                        <li>• Acceso remoto seguro</li>
                        <li>• Defensa confiable para el negocio</li>
                    </ul>
                </div>
            </div>

            <div class="min-w-[320px] md:min-w-[380px] lg:min-w-[420px] snap-start overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-xl">
                <img src="https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1200&q=80" alt="Videovigilancia y control de acceso" class="h-56 w-full object-cover">
                <div class="p-7">
                    <div class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">03</div>
                    <h3 class="mt-3 text-2xl font-bold text-slate-900">Video Surveillance & Access Control</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-600">
                        Sistemas de videovigilancia y control para reforzar seguridad, trazabilidad y supervisión.
                    </p>
                    <ul class="mt-5 space-y-2 text-sm text-slate-600">
                        <li>• CCTV corporativo</li>
                        <li>• Control y monitoreo</li>
                        <li>• Seguridad operativa</li>
                    </ul>
                </div>
            </div>

            <div class="min-w-[320px] md:min-w-[380px] lg:min-w-[420px] snap-start overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-xl">
                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=80" alt="Managed IT Services" class="h-56 w-full object-cover">
                <div class="p-7">
                    <div class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">04</div>
                    <h3 class="mt-3 text-2xl font-bold text-slate-900">Managed IT Services</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-600">
                        Soporte técnico y monitoreo continuo para mantener tu negocio activo y con menos interrupciones.
                    </p>
                    <ul class="mt-5 space-y-2 text-sm text-slate-600">
                        <li>• Soporte empresarial</li>
                        <li>• Mantenimiento preventivo</li>
                        <li>• Continuidad tecnológica</li>
                    </ul>
                </div>
            </div>

            <div class="min-w-[320px] md:min-w-[380px] lg:min-w-[420px] snap-start overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-xl">
                <img src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?auto=format&fit=crop&w=1200&q=80" alt="Comunicaciones empresariales" class="h-56 w-full object-cover">
                <div class="p-7">
                    <div class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">05</div>
                    <h3 class="mt-3 text-2xl font-bold text-slate-900">Enterprise Communications</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-600">
                        Telefonía IP y redes multisede para conectar mejor a toda la organización y agilizar la colaboración.
                    </p>
                    <ul class="mt-5 space-y-2 text-sm text-slate-600">
                        <li>• Telefonía IP</li>
                        <li>• Troncal SIP e IVR</li>
                        <li>• Redes multisede</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- DETALLE DE SERVICIOS -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-8">

            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out rounded-[2rem] overflow-hidden border border-slate-100 bg-slate-50 shadow-lg">
                <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1200&q=80" alt="Equipo empresarial" class="h-72 w-full object-cover">
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-slate-900">Infraestructura y crecimiento tecnológico</h3>
                    <p class="mt-4 text-slate-600 leading-8">
                        Implementamos bases tecnológicas confiables para empresas que necesitan operar con orden,
                        crecer sin interrupciones y sostener procesos internos críticos.
                    </p>
                    <div class="mt-6 grid sm:grid-cols-2 gap-4">
                        <div class="rounded-2xl bg-white p-5 border border-slate-100">
                            <h4 class="font-bold text-slate-900">Servidores</h4>
                            <p class="mt-2 text-sm text-slate-600 leading-6">Disponibilidad y capacidad para procesos empresariales.</p>
                        </div>
                        <div class="rounded-2xl bg-white p-5 border border-slate-100">
                            <h4 class="font-bold text-slate-900">Virtualización</h4>
                            <p class="mt-2 text-sm text-slate-600 leading-6">Aprovechamiento eficiente y escalable de infraestructura.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100 rounded-[2rem] overflow-hidden border border-slate-100 bg-slate-50 shadow-lg">
                <img src="https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=1200&q=80" alt="Seguridad digital" class="h-72 w-full object-cover">
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-slate-900">Seguridad, monitoreo y protección</h3>
                    <p class="mt-4 text-slate-600 leading-8">
                        Fortalecemos la seguridad de la infraestructura y la conectividad para dar más confianza,
                        control y protección frente a amenazas externas.
                    </p>
                    <div class="mt-6 grid sm:grid-cols-2 gap-4">
                        <div class="rounded-2xl bg-white p-5 border border-slate-100">
                            <h4 class="font-bold text-slate-900">Firewalls y VPN</h4>
                            <p class="mt-2 text-sm text-slate-600 leading-6">Resguardo de accesos y datos sensibles.</p>
                        </div>
                        <div class="rounded-2xl bg-white p-5 border border-slate-100">
                            <h4 class="font-bold text-slate-900">Videovigilancia</h4>
                            <p class="mt-2 text-sm text-slate-600 leading-6">Supervisión, trazabilidad y control operativo.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out rounded-[2rem] overflow-hidden border border-slate-100 bg-slate-50 shadow-lg">
                <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=1200&q=80" alt="Soporte técnico" class="h-72 w-full object-cover">
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-slate-900">Soporte técnico y servicios administrados</h3>
                    <p class="mt-4 text-slate-600 leading-8">
                        Acompañamos la operación con soporte, mantenimiento y monitoreo para reducir tiempos de inactividad
                        y dar mayor tranquilidad al equipo.
                    </p>
                    <div class="mt-6 grid sm:grid-cols-2 gap-4">
                        <div class="rounded-2xl bg-white p-5 border border-slate-100">
                            <h4 class="font-bold text-slate-900">Help desk</h4>
                            <p class="mt-2 text-sm text-slate-600 leading-6">Atención a incidencias y continuidad diaria.</p>
                        </div>
                        <div class="rounded-2xl bg-white p-5 border border-slate-100">
                            <h4 class="font-bold text-slate-900">Mantenimiento</h4>
                            <p class="mt-2 text-sm text-slate-600 leading-6">Prevención y estabilidad para la operación.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100 rounded-[2rem] overflow-hidden border border-slate-100 bg-slate-50 shadow-lg">
                <img src="https://images.unsplash.com/photo-1573164574572-cb89e39749b4?auto=format&fit=crop&w=1200&q=80" alt="Comunicaciones empresariales" class="h-72 w-full object-cover">
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-slate-900">Comunicaciones empresariales</h3>
                    <p class="mt-4 text-slate-600 leading-8">
                        Conectamos equipos, sedes y operaciones con herramientas que mejoran atención, coordinación y productividad.
                    </p>
                    <div class="mt-6 grid sm:grid-cols-2 gap-4">
                        <div class="rounded-2xl bg-white p-5 border border-slate-100">
                            <h4 class="font-bold text-slate-900">Telefonía IP</h4>
                            <p class="mt-2 text-sm text-slate-600 leading-6">Llamadas empresariales más ágiles y trazables.</p>
                        </div>
                        <div class="rounded-2xl bg-white p-5 border border-slate-100">
                            <h4 class="font-bold text-slate-900">Multisede</h4>
                            <p class="mt-2 text-sm text-slate-600 leading-6">Interconexión segura entre distintas ubicaciones.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CASOS DE ÉXITO / CARRUSEL -->
<section class="relative bg-slate-950 py-24">
    <!-- Fondo decorativo premium -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <!-- Base -->
        <div class="absolute inset-0 bg-[linear-gradient(180deg,#020617_0%,#071224_42%,#020617_100%)]"></div>

        <!-- Glow principal -->
        <div class="absolute -top-28 left-1/2 h-[460px] w-[460px] -translate-x-1/2 rounded-full bg-cyan-400/10 blur-3xl"></div>
        <div class="absolute top-10 -left-20 h-[340px] w-[340px] rounded-full bg-[#0050b0]/20 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 h-[320px] w-[320px] rounded-full bg-[#01d3d1]/10 blur-3xl"></div>
        <div class="absolute bottom-10 left-[18%] h-[240px] w-[240px] rounded-full bg-sky-500/10 blur-3xl"></div>

        <!-- Textura -->
        <div class="absolute inset-0 opacity-[0.05]"
            style="background-image:
                linear-gradient(rgba(255,255,255,0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.08) 1px, transparent 1px);
                background-size: 42px 42px;">
        </div>

        <!-- Overlays -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(1,211,209,0.12),transparent_24%),radial-gradient(circle_at_top_right,rgba(0,80,176,0.18),transparent_30%),radial-gradient(circle_at_bottom_center,rgba(1,211,209,0.08),transparent_30%)]"></div>
        <div class="absolute inset-0 bg-[linear-gradient(to_bottom,rgba(255,255,255,0.03),transparent_18%,transparent_82%,rgba(255,255,255,0.02))]"></div>

        <!-- Líneas -->
        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-cyan-300/20 to-transparent"></div>
        <div class="absolute inset-x-0 bottom-0 h-px bg-gradient-to-r from-transparent via-cyan-300/20 to-transparent"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6">
        <!-- Header -->
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6">
            <div class="max-w-3xl js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
                <span class="inline-flex items-center rounded-full border border-cyan-400/20 bg-cyan-400/10 px-4 py-1.5 text-sm font-semibold uppercase tracking-[0.18em] text-cyan-300">
                    Casos de éxito
                </span>

                <h2 class="mt-5 text-3xl md:text-4xl lg:text-5xl font-bold tracking-tight text-white">
                    Proyectos implementados con impacto real
                </h2>

                <p class="mt-5 max-w-2xl text-base md:text-lg leading-8 text-slate-300">
                    Soluciones reales en call center, telefonía IP, data center, redes seguras,
                    soporte TI, IVR, videovigilancia y conectividad multisede.
                </p>
            </div>

            <div class="flex gap-3">
                <button id="casesPrev"
                    class="h-12 w-12 rounded-full border border-white/10 bg-white/5 text-white transition-all duration-300 hover:-translate-y-0.5 hover:border-cyan-400/40 hover:bg-white hover:text-slate-900 hover:shadow-[0_0_30px_rgba(255,255,255,0.12)]">
                    <span class="text-xl leading-none">‹</span>
                </button>

                <button id="casesNext"
                    class="h-12 w-12 rounded-full border border-white/10 bg-white/5 text-white transition-all duration-300 hover:-translate-y-0.5 hover:border-cyan-400/40 hover:bg-white hover:text-slate-900 hover:shadow-[0_0_30px_rgba(255,255,255,0.12)]">
                    <span class="text-xl leading-none">›</span>
                </button>
            </div>
        </div>

        <!-- Carrusel -->
        <div id="casesCarousel"
            class="mt-12 flex gap-6 overflow-x-auto overflow-y-visible scroll-smooth snap-x snap-mandatory px-1 pt-5 pb-8 [scrollbar-width:none] [-ms-overflow-style:none]">

            <!-- CASE-001 -->
            <article
                class="group relative isolate min-w-[320px] md:min-w-[380px] snap-start rounded-[2rem] border border-white/10 bg-[linear-gradient(180deg,rgba(15,23,42,0.88)_0%,rgba(8,15,30,0.96)_100%)] p-7 backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,0.25)] transition-all duration-500 ease-out hover:-translate-y-3 hover:scale-[1.02] hover:border-cyan-400/40 hover:shadow-[0_24px_70px_rgba(0,0,0,0.45)]">
                <div class="absolute inset-0 rounded-[2rem] opacity-0 transition-opacity duration-500 group-hover:opacity-100 bg-[radial-gradient(circle_at_top,rgba(1,211,209,0.14),transparent_35%),linear-gradient(135deg,rgba(1,211,209,0.05),transparent_45%,rgba(0,80,176,0.08))]"></div>
                <div class="absolute inset-0 rounded-[2rem] ring-1 ring-inset ring-white/5 group-hover:ring-cyan-300/20"></div>

                <div class="relative z-10 flex items-center justify-between gap-4">
                    <span class="text-xs font-semibold uppercase tracking-[0.22em] text-cyan-300">CASE-001</span>
                    <span class="case-badge">Call Center</span>
                </div>

                <h3 class="relative z-10 mt-5 text-2xl font-bold leading-tight text-white">
                    Vencorp — Call Center Tigo
                </h3>

                <p class="relative z-10 mt-4 text-sm leading-8 text-slate-300">
                    Implementación de telefonía IP y troncal SIP para soportar una operación de atención
                    más ordenada, escalable y preparada para automatización.
                </p>

                <div class="relative z-10 mt-5 rounded-2xl border border-cyan-400/15 bg-cyan-400/[0.06] p-4 transition-all duration-500 group-hover:border-cyan-300/25 group-hover:bg-cyan-400/[0.08]">
                    <p class="text-sm font-medium leading-7 text-cyan-100">
                        <span class="font-semibold text-cyan-300">Enfoque:</span>
                        mejorar capacidad de atención, estabilidad operativa y crecimiento del call center.
                    </p>
                </div>

                <div class="relative z-10 mt-5 flex flex-wrap gap-2 text-xs">
                    <span class="case-tag">CALL CENTER</span>
                    <span class="case-tag">TRONCAL SIP</span>
                    <span class="case-tag">TELEFONÍA IP</span>
                    <span class="case-tag">ESCALABILIDAD</span>
                </div>
            </article>

            <!-- CASE-002 -->
            <article
                class="group relative isolate min-w-[320px] md:min-w-[380px] snap-start rounded-[2rem] border border-white/10 bg-[linear-gradient(180deg,rgba(15,23,42,0.88)_0%,rgba(8,15,30,0.96)_100%)] p-7 backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,0.25)] transition-all duration-500 ease-out hover:-translate-y-3 hover:scale-[1.02] hover:border-cyan-400/40 hover:shadow-[0_24px_70px_rgba(0,0,0,0.45)]">
                <div class="absolute inset-0 rounded-[2rem] opacity-0 transition-opacity duration-500 group-hover:opacity-100 bg-[radial-gradient(circle_at_top,rgba(1,211,209,0.14),transparent_35%),linear-gradient(135deg,rgba(1,211,209,0.05),transparent_45%,rgba(0,80,176,0.08))]"></div>
                <div class="absolute inset-0 rounded-[2rem] ring-1 ring-inset ring-white/5 group-hover:ring-cyan-300/20"></div>

                <div class="relative z-10 flex items-center justify-between gap-4">
                    <span class="text-xs font-semibold uppercase tracking-[0.22em] text-cyan-300">CASE-002</span>
                    <span class="case-badge">Auditoría</span>
                </div>

                <h3 class="relative z-10 mt-5 text-2xl font-bold leading-tight text-white">
                    IMEX — Certificación OEA
                </h3>

                <p class="relative z-10 mt-4 text-sm leading-8 text-slate-300">
                    Implementación de controles, respaldos y lineamientos de continuidad para reforzar
                    trazabilidad, auditoría y soporte documental durante su proceso de certificación.
                </p>

                <div class="relative z-10 mt-5 rounded-2xl border border-cyan-400/15 bg-cyan-400/[0.06] p-4 transition-all duration-500 group-hover:border-cyan-300/25 group-hover:bg-cyan-400/[0.08]">
                    <p class="text-sm font-medium leading-7 text-cyan-100">
                        <span class="font-semibold text-cyan-300">Enfoque:</span>
                        fortalecer control interno, disponibilidad de información y cumplimiento operativo.
                    </p>
                </div>

                <div class="relative z-10 mt-5 flex flex-wrap gap-2 text-xs">
                    <span class="case-tag">OEA</span>
                    <span class="case-tag">RESPALDOS</span>
                    <span class="case-tag">TRAZABILIDAD</span>
                    <span class="case-tag">CONTINUIDAD</span>
                </div>
            </article>

            <!-- CASE-003 -->
            <article
                class="group relative isolate min-w-[320px] md:min-w-[380px] snap-start rounded-[2rem] border border-white/10 bg-[linear-gradient(180deg,rgba(15,23,42,0.88)_0%,rgba(8,15,30,0.96)_100%)] p-7 backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,0.25)] transition-all duration-500 ease-out hover:-translate-y-3 hover:scale-[1.02] hover:border-cyan-400/40 hover:shadow-[0_24px_70px_rgba(0,0,0,0.45)]">
                <div class="absolute inset-0 rounded-[2rem] opacity-0 transition-opacity duration-500 group-hover:opacity-100 bg-[radial-gradient(circle_at_top,rgba(1,211,209,0.14),transparent_35%),linear-gradient(135deg,rgba(1,211,209,0.05),transparent_45%,rgba(0,80,176,0.08))]"></div>
                <div class="absolute inset-0 rounded-[2rem] ring-1 ring-inset ring-white/5 group-hover:ring-cyan-300/20"></div>

                <div class="relative z-10 flex items-center justify-between gap-4">
                    <span class="text-xs font-semibold uppercase tracking-[0.22em] text-cyan-300">CASE-003</span>
                    <span class="case-badge">Infraestructura</span>
                </div>

                <h3 class="relative z-10 mt-5 text-2xl font-bold leading-tight text-white">
                    Mercomex — Data Center
                </h3>

                <p class="relative z-10 mt-4 text-sm leading-8 text-slate-300">
                    Implementación de infraestructura estable, virtualizada y escalable para acompañar
                    el crecimiento del negocio y mejorar disponibilidad de sus servicios internos.
                </p>

                <div class="relative z-10 mt-5 rounded-2xl border border-cyan-400/15 bg-cyan-400/[0.06] p-4 transition-all duration-500 group-hover:border-cyan-300/25 group-hover:bg-cyan-400/[0.08]">
                    <p class="text-sm font-medium leading-7 text-cyan-100">
                        <span class="font-semibold text-cyan-300">Enfoque:</span>
                        mayor confiabilidad operativa, mejor aprovechamiento de recursos y base para expansión.
                    </p>
                </div>

                <div class="relative z-10 mt-5 flex flex-wrap gap-2 text-xs">
                    <span class="case-tag">DATA CENTER</span>
                    <span class="case-tag">VIRTUALIZACIÓN</span>
                    <span class="case-tag">CONFIABILIDAD</span>
                    <span class="case-tag">DISPONIBILIDAD</span>
                </div>
            </article>

            <!-- CASE-004 -->
            <article
                class="group relative isolate min-w-[320px] md:min-w-[380px] snap-start rounded-[2rem] border border-white/10 bg-[linear-gradient(180deg,rgba(15,23,42,0.88)_0%,rgba(8,15,30,0.96)_100%)] p-7 backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,0.25)] transition-all duration-500 ease-out hover:-translate-y-3 hover:scale-[1.02] hover:border-cyan-400/40 hover:shadow-[0_24px_70px_rgba(0,0,0,0.45)]">
                <div class="absolute inset-0 rounded-[2rem] opacity-0 transition-opacity duration-500 group-hover:opacity-100 bg-[radial-gradient(circle_at_top,rgba(1,211,209,0.14),transparent_35%),linear-gradient(135deg,rgba(1,211,209,0.05),transparent_45%,rgba(0,80,176,0.08))]"></div>
                <div class="absolute inset-0 rounded-[2rem] ring-1 ring-inset ring-white/5 group-hover:ring-cyan-300/20"></div>

                <div class="relative z-10 flex items-center justify-between gap-4">
                    <span class="text-xs font-semibold uppercase tracking-[0.22em] text-cyan-300">CASE-004</span>
                    <span class="case-badge">Multisede</span>
                </div>

                <h3 class="relative z-10 mt-5 text-2xl font-bold leading-tight text-white">
                    Grupo Lucky — Multisede
                </h3>

                <p class="relative z-10 mt-4 text-sm leading-8 text-slate-300">
                    Integración segura entre sedes en distintas ciudades mediante VPN, junto con
                    virtualización de servicios contables y telefonía para una operación más unificada.
                </p>

                <div class="relative z-10 mt-5 rounded-2xl border border-cyan-400/15 bg-cyan-400/[0.06] p-4 transition-all duration-500 group-hover:border-cyan-300/25 group-hover:bg-cyan-400/[0.08]">
                    <p class="text-sm font-medium leading-7 text-cyan-100">
                        <span class="font-semibold text-cyan-300">Enfoque:</span>
                        acceso seguro, centralización de servicios y continuidad entre sucursales.
                    </p>
                </div>

                <div class="relative z-10 mt-5 flex flex-wrap gap-2 text-xs">
                    <span class="case-tag">VPN</span>
                    <span class="case-tag">MULTISEDE</span>
                    <span class="case-tag">VIRTUALIZACIÓN</span>
                    <span class="case-tag">UNIFICACIÓN</span>
                </div>
            </article>

            <!-- CASE-005 -->
            <article
                class="group relative isolate min-w-[320px] md:min-w-[380px] snap-start rounded-[2rem] border border-white/10 bg-[linear-gradient(180deg,rgba(15,23,42,0.88)_0%,rgba(8,15,30,0.96)_100%)] p-7 backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,0.25)] transition-all duration-500 ease-out hover:-translate-y-3 hover:scale-[1.02] hover:border-cyan-400/40 hover:shadow-[0_24px_70px_rgba(0,0,0,0.45)]">
                <div class="absolute inset-0 rounded-[2rem] opacity-0 transition-opacity duration-500 group-hover:opacity-100 bg-[radial-gradient(circle_at_top,rgba(1,211,209,0.14),transparent_35%),linear-gradient(135deg,rgba(1,211,209,0.05),transparent_45%,rgba(0,80,176,0.08))]"></div>
                <div class="absolute inset-0 rounded-[2rem] ring-1 ring-inset ring-white/5 group-hover:ring-cyan-300/20"></div>

                <div class="relative z-10 flex items-center justify-between gap-4">
                    <span class="text-xs font-semibold uppercase tracking-[0.22em] text-cyan-300">CASE-005</span>
                    <span class="case-badge">Seguridad</span>
                </div>

                <h3 class="relative z-10 mt-5 text-2xl font-bold leading-tight text-white">
                    Colegio Médico — Red Segura
                </h3>

                <p class="relative z-10 mt-4 text-sm leading-8 text-slate-300">
                    Fortalecimiento de conectividad con protección frente a ataques externos y mejoras
                    en la confiabilidad del acceso a internet para el personal.
                </p>

                <div class="relative z-10 mt-5 rounded-2xl border border-cyan-400/15 bg-cyan-400/[0.06] p-4 transition-all duration-500 group-hover:border-cyan-300/25 group-hover:bg-cyan-400/[0.08]">
                    <p class="text-sm font-medium leading-7 text-cyan-100">
                        <span class="font-semibold text-cyan-300">Enfoque:</span>
                        más seguridad perimetral, mejor experiencia de red y continuidad en el trabajo diario.
                    </p>
                </div>

                <div class="relative z-10 mt-5 flex flex-wrap gap-2 text-xs">
                    <span class="case-tag">FIREWALL</span>
                    <span class="case-tag">PROTECCIÓN</span>
                    <span class="case-tag">RED SEGURA</span>
                    <span class="case-tag">CONFIABILIDAD</span>
                </div>
            </article>

            <!-- CASE-006 -->
            <article
                class="group relative isolate min-w-[320px] md:min-w-[380px] snap-start rounded-[2rem] border border-white/10 bg-[linear-gradient(180deg,rgba(15,23,42,0.88)_0%,rgba(8,15,30,0.96)_100%)] p-7 backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,0.25)] transition-all duration-500 ease-out hover:-translate-y-3 hover:scale-[1.02] hover:border-cyan-400/40 hover:shadow-[0_24px_70px_rgba(0,0,0,0.45)]">
                <div class="absolute inset-0 rounded-[2rem] opacity-0 transition-opacity duration-500 group-hover:opacity-100 bg-[radial-gradient(circle_at_top,rgba(1,211,209,0.14),transparent_35%),linear-gradient(135deg,rgba(1,211,209,0.05),transparent_45%,rgba(0,80,176,0.08))]"></div>
                <div class="absolute inset-0 rounded-[2rem] ring-1 ring-inset ring-white/5 group-hover:ring-cyan-300/20"></div>

                <div class="relative z-10 flex items-center justify-between gap-4">
                    <span class="text-xs font-semibold uppercase tracking-[0.22em] text-cyan-300">CASE-006</span>
                    <span class="case-badge">Soporte TI</span>
                </div>

                <h3 class="relative z-10 mt-5 text-2xl font-bold leading-tight text-white">
                    Clínica Sirani — Help Desk
                </h3>

                <p class="relative z-10 mt-4 text-sm leading-8 text-slate-300">
                    Soporte técnico preventivo en computadoras y servidores para mejorar disponibilidad,
                    reducir tiempos de inactividad y mantener la operación más estable.
                </p>

                <div class="relative z-10 mt-5 rounded-2xl border border-cyan-400/15 bg-cyan-400/[0.06] p-4 transition-all duration-500 group-hover:border-cyan-300/25 group-hover:bg-cyan-400/[0.08]">
                    <p class="text-sm font-medium leading-7 text-cyan-100">
                        <span class="font-semibold text-cyan-300">Enfoque:</span>
                        prevención, respuesta oportuna y continuidad en entornos críticos de atención.
                    </p>
                </div>

                <div class="relative z-10 mt-5 flex flex-wrap gap-2 text-xs">
                    <span class="case-tag">HELP DESK</span>
                    <span class="case-tag">SOPORTE TI</span>
                    <span class="case-tag">SERVIDORES</span>
                    <span class="case-tag">CONTINUIDAD</span>
                </div>
            </article>

            <!-- CASE-007 -->
            <article
                class="group relative isolate min-w-[320px] md:min-w-[380px] snap-start rounded-[2rem] border border-white/10 bg-[linear-gradient(180deg,rgba(15,23,42,0.88)_0%,rgba(8,15,30,0.96)_100%)] p-7 backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,0.25)] transition-all duration-500 ease-out hover:-translate-y-3 hover:scale-[1.02] hover:border-cyan-400/40 hover:shadow-[0_24px_70px_rgba(0,0,0,0.45)]">
                <div class="absolute inset-0 rounded-[2rem] opacity-0 transition-opacity duration-500 group-hover:opacity-100 bg-[radial-gradient(circle_at_top,rgba(1,211,209,0.14),transparent_35%),linear-gradient(135deg,rgba(1,211,209,0.05),transparent_45%,rgba(0,80,176,0.08))]"></div>
                <div class="absolute inset-0 rounded-[2rem] ring-1 ring-inset ring-white/5 group-hover:ring-cyan-300/20"></div>

                <div class="relative z-10 flex items-center justify-between gap-4">
                    <span class="text-xs font-semibold uppercase tracking-[0.22em] text-cyan-300">CASE-007</span>
                    <span class="case-badge">IVR</span>
                </div>

                <h3 class="relative z-10 mt-5 text-2xl font-bold leading-tight text-white">
                    Clínica Clifabol — Atención Automática
                </h3>

                <p class="relative z-10 mt-4 text-sm leading-8 text-slate-300">
                    Implementación de un call center moderno con IVR, derivación inteligente y mejor
                    control de llamadas para optimizar la atención al paciente.
                </p>

                <div class="relative z-10 mt-5 rounded-2xl border border-cyan-400/15 bg-cyan-400/[0.06] p-4 transition-all duration-500 group-hover:border-cyan-300/25 group-hover:bg-cyan-400/[0.08]">
                    <p class="text-sm font-medium leading-7 text-cyan-100">
                        <span class="font-semibold text-cyan-300">Enfoque:</span>
                        ordenar llamadas, dirigir mejor cada consulta y mejorar eficiencia en atención.
                    </p>
                </div>

                <div class="relative z-10 mt-5 flex flex-wrap gap-2 text-xs">
                    <span class="case-tag">IVR</span>
                    <span class="case-tag">ATENCIÓN</span>
                    <span class="case-tag">DERIVACIÓN</span>
                    <span class="case-tag">TRAZABILIDAD</span>
                </div>
            </article>

            <!-- CASE-008 -->
            <article
                class="group relative isolate min-w-[320px] md:min-w-[380px] snap-start rounded-[2rem] border border-white/10 bg-[linear-gradient(180deg,rgba(15,23,42,0.88)_0%,rgba(8,15,30,0.96)_100%)] p-7 backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,0.25)] transition-all duration-500 ease-out hover:-translate-y-3 hover:scale-[1.02] hover:border-cyan-400/40 hover:shadow-[0_24px_70px_rgba(0,0,0,0.45)]">
                <div class="absolute inset-0 rounded-[2rem] opacity-0 transition-opacity duration-500 group-hover:opacity-100 bg-[radial-gradient(circle_at_top,rgba(1,211,209,0.14),transparent_35%),linear-gradient(135deg,rgba(1,211,209,0.05),transparent_45%,rgba(0,80,176,0.08))]"></div>
                <div class="absolute inset-0 rounded-[2rem] ring-1 ring-inset ring-white/5 group-hover:ring-cyan-300/20"></div>

                <div class="relative z-10 flex items-center justify-between gap-4">
                    <span class="text-xs font-semibold uppercase tracking-[0.22em] text-cyan-300">CASE-008</span>
                    <span class="case-badge">BPO</span>
                </div>

                <h3 class="relative z-10 mt-5 text-2xl font-bold leading-tight text-white">
                    Zyra BPO — Call Center
                </h3>

                <p class="relative z-10 mt-4 text-sm leading-8 text-slate-300">
                    Implementación de infraestructura escalable con data center y troncal SIP para
                    soportar una operación de atención al cliente con mayor capacidad y estabilidad.
                </p>

                <div class="relative z-10 mt-5 rounded-2xl border border-cyan-400/15 bg-cyan-400/[0.06] p-4 transition-all duration-500 group-hover:border-cyan-300/25 group-hover:bg-cyan-400/[0.08]">
                    <p class="text-sm font-medium leading-7 text-cyan-100">
                        <span class="font-semibold text-cyan-300">Enfoque:</span>
                        escalabilidad operativa, soporte al crecimiento y mejor desempeño del entorno BPO.
                    </p>
                </div>

                <div class="relative z-10 mt-5 flex flex-wrap gap-2 text-xs">
                    <span class="case-tag">BPO</span>
                    <span class="case-tag">TRONCAL SIP</span>
                    <span class="case-tag">DATA CENTER</span>
                    <span class="case-tag">ESCALABILIDAD</span>
                </div>
            </article>

            <!-- CASE-009 -->
            <article
                class="group relative isolate min-w-[320px] md:min-w-[380px] snap-start rounded-[2rem] border border-white/10 bg-[linear-gradient(180deg,rgba(15,23,42,0.88)_0%,rgba(8,15,30,0.96)_100%)] p-7 backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,0.25)] transition-all duration-500 ease-out hover:-translate-y-3 hover:scale-[1.02] hover:border-cyan-400/40 hover:shadow-[0_24px_70px_rgba(0,0,0,0.45)]">
                <div class="absolute inset-0 rounded-[2rem] opacity-0 transition-opacity duration-500 group-hover:opacity-100 bg-[radial-gradient(circle_at_top,rgba(1,211,209,0.14),transparent_35%),linear-gradient(135deg,rgba(1,211,209,0.05),transparent_45%,rgba(0,80,176,0.08))]"></div>
                <div class="absolute inset-0 rounded-[2rem] ring-1 ring-inset ring-white/5 group-hover:ring-cyan-300/20"></div>

                <div class="relative z-10 flex items-center justify-between gap-4">
                    <span class="text-xs font-semibold uppercase tracking-[0.22em] text-cyan-300">CASE-009</span>
                    <span class="case-badge">Seguridad</span>
                </div>

                <h3 class="relative z-10 mt-5 text-2xl font-bold leading-tight text-white">
                    Instituto IGA — Comunicaciones y Seguridad
                </h3>

                <p class="relative z-10 mt-4 text-sm leading-8 text-slate-300">
                    Implementación de IVR y actualización del sistema interno de cámaras para fortalecer
                    atención, comunicación y videovigilancia dentro de la institución.
                </p>

                <div class="relative z-10 mt-5 rounded-2xl border border-cyan-400/15 bg-cyan-400/[0.06] p-4 transition-all duration-500 group-hover:border-cyan-300/25 group-hover:bg-cyan-400/[0.08]">
                    <p class="text-sm font-medium leading-7 text-cyan-100">
                        <span class="font-semibold text-cyan-300">Enfoque:</span>
                        modernizar atención telefónica y reforzar control visual de los espacios.
                    </p>
                </div>

                <div class="relative z-10 mt-5 flex flex-wrap gap-2 text-xs">
                    <span class="case-tag">IVR</span>
                    <span class="case-tag">CCTV</span>
                    <span class="case-tag">ACTUALIZACIÓN</span>
                    <span class="case-tag">VIDEOVIGILANCIA</span>
                </div>
            </article>
        </div>
    </div>
</section>

<style>
    .case-badge {
        border-radius: 9999px;
        border: 1px solid rgba(255,255,255,0.10);
        background: rgba(255,255,255,0.05);
        padding: 0.4rem 0.85rem;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: rgb(203 213 225);
        transition: all .35s ease;
    }

    .group:hover .case-badge {
        border-color: rgba(34, 211, 238, 0.22);
        background: rgba(34, 211, 238, 0.08);
        color: white;
    }

    .case-tag {
        padding: 0.45rem 0.8rem;
        border-radius: 9999px;
        border: 1px solid rgba(255,255,255,0.08);
        background: rgba(255,255,255,0.06);
        color: rgb(226 232 240);
        font-weight: 600;
        letter-spacing: 0.04em;
        transition: all .35s ease;
    }

    .group:hover .case-tag {
        border-color: rgba(34, 211, 238, 0.18);
        background: rgba(34, 211, 238, 0.08);
        color: white;
    }

    #casesCarousel::-webkit-scrollbar {
        display: none;
    }
</style>
<!-- CTA -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div
            class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out relative overflow-hidden rounded-[2rem] border border-slate-200/80 bg-[linear-gradient(180deg,#ffffff_0%,#f8fafc_100%)] p-10 lg:p-14 shadow-[0_20px_60px_rgba(15,23,42,0.08)]">

            <!-- Fondo decorativo sutil -->
            <div class="pointer-events-none absolute inset-0">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(1,211,209,0.10),transparent_22%),radial-gradient(circle_at_bottom_left,rgba(0,80,176,0.06),transparent_26%)]"></div>
                <div class="absolute inset-0 opacity-[0.04]"
                    style="background-image:
                        linear-gradient(rgba(15,23,42,0.08) 1px, transparent 1px),
                        linear-gradient(90deg, rgba(15,23,42,0.08) 1px, transparent 1px);
                        background-size: 32px 32px;">
                </div>
                <div class="absolute top-0 left-0 h-px w-full bg-gradient-to-r from-transparent via-[#01d3d1]/30 to-transparent"></div>
            </div>

            <div class="relative z-10 grid lg:grid-cols-2 gap-8 items-center">
                <div class="max-w-2xl">
                    <span
                        class="inline-flex items-center rounded-full border border-[#01d3d1]/20 bg-[#01d3d1]/10 px-4 py-1.5 text-sm font-semibold uppercase tracking-[0.18em] text-[#0050b0]">
                        Consultoría tecnológica
                    </span>

                    <h2 class="mt-4 text-3xl md:text-4xl font-bold tracking-tight text-slate-900">
                        Llevemos tu empresa al siguiente nivel
                    </h2>

                    <p class="mt-4 leading-8 text-slate-600">
                        Si necesitas una solución tecnológica alineada a tu operación, conversemos para
                        diseñar una estrategia clara, escalable y adaptada a las necesidades reales de tu empresa.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 lg:justify-end">
                    <a href="{{ route('web.contacto') }}"
                        class="inline-flex items-center justify-center rounded-2xl bg-slate-900 px-6 py-3.5 font-semibold text-white shadow-lg shadow-slate-900/10 transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#0050b0]">
                        Agendar asesoría
                    </a>

                    <a href="{{ route('web.nosotros') }}"
                        class="inline-flex items-center justify-center rounded-2xl border border-slate-300 bg-white px-6 py-3.5 font-semibold text-slate-700 transition-all duration-300 hover:-translate-y-0.5 hover:border-[#0050b0]/30 hover:text-[#0050b0] hover:shadow-md">
                        Conocer ALTECBOL
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const fadeItems = document.querySelectorAll('.js-fade');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.remove('opacity-0', 'translate-y-8');
                entry.target.classList.add('opacity-100', 'translate-y-0');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.15 });

    fadeItems.forEach((item) => observer.observe(item));

    function setupCarousel(prevId, nextId, carouselId) {
        const prev = document.getElementById(prevId);
        const next = document.getElementById(nextId);
        const carousel = document.getElementById(carouselId);

        if (!prev || !next || !carousel) return;

        const getScrollAmount = () => Math.min(carousel.clientWidth * 0.9, 420);

        prev.addEventListener('click', () => {
            carousel.scrollBy({ left: -getScrollAmount(), behavior: 'smooth' });
        });

        next.addEventListener('click', () => {
            carousel.scrollBy({ left: getScrollAmount(), behavior: 'smooth' });
        });
    }

    setupCarousel('servicesPrev', 'servicesNext', 'servicesCarousel');
    setupCarousel('casesPrev', 'casesNext', 'casesCarousel');
});
</script>

@endsection