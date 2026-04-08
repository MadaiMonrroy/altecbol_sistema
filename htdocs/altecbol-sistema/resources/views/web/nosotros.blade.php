@extends('layouts.web')

@section('title', 'Nosotros | ALTECBOL')

@section('content')

<!-- HERO -->
<section class="relative overflow-hidden bg-slate-950 ">
    <div class="absolute inset-0">
        <img
            src="{{ asset('images/portada_altecbol.png') }}"
            alt="Equipo tecnológico trabajando"
            class="h-full w-full object-cover opacity-25"
        >
    </div>

    <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-[#0050b0]/20 to-slate-950/10"></div>

    <div class="relative max-w-7xl mx-auto px-6 pt-28 pb-28 lg:py-32">
        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
                <span class="inline-flex items-center rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm text-white/90 backdrop-blur">
                    Sobre ALTECBOL
                </span>

                <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-bold leading-tight text-white">
                    Tecnología pensada para
                    <span class="text-[#01d3d1]">empresas que necesitan estabilidad</span>
                </h1>

                <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-200">
                    En ALTECBOL impulsamos a las empresas con soluciones tecnológicas integrales:
                    infraestructura IT, redes, servidores, soporte técnico, comunicaciones
                    y servicios digitales orientados a la continuidad operativa.
                </p>

                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('web.contacto') }}"
                       class="inline-flex items-center justify-center rounded-2xl bg-[#01d3d1] px-6 py-3.5 font-semibold text-slate-900 transition hover:scale-[1.02]">
                        Contáctanos
                    </a>

                    <a href="{{ route('web.servicios') }}"
                       class="inline-flex items-center justify-center rounded-2xl border border-white/25 px-6 py-3.5 font-semibold text-white transition hover:scale-[1.02]">
                        Ver servicios
                    </a>
                </div>
            </div>

            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100">
                <div class="relative">
                    <div class="absolute -left-6 -top-6 h-24 w-24 rounded-full bg-[#01d3d1]/20 blur-2xl"></div>
                    <div class="absolute -bottom-8 -right-8 h-32 w-32 rounded-full bg-[#0050b0]/40 blur-3xl"></div>

                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="rounded-3xl border border-white/10 bg-white/10 p-5 backdrop-blur">
                            <div class="text-sm text-slate-300">Enfoque</div>
                            <div class="mt-2 text-3xl font-bold text-white">B2B</div>
                            <p class="mt-3 text-sm leading-6 text-slate-200">
                                Soluciones tecnológicas alineadas con necesidades empresariales reales.
                            </p>
                        </div>

                        <div class="rounded-3xl border border-white/10 bg-white/10 p-5 backdrop-blur">
                            <div class="text-sm text-slate-300">Cobertura</div>
                            <div class="mt-2 text-3xl font-bold text-white">Integral</div>
                            <p class="mt-3 text-sm leading-6 text-slate-200">
                                Redes, servidores, soporte, seguridad, comunicaciones y más.
                            </p>
                        </div>

                        <div class="rounded-3xl border border-white/10 bg-white/10 p-5 backdrop-blur sm:col-span-2">
                            <div class="text-sm text-slate-300">Compromiso</div>
                            <div class="mt-2 text-2xl font-bold text-white">
                                Continuidad operativa y crecimiento
                            </div>
                            <p class="mt-3 text-sm leading-6 text-slate-200">
                                Acompañamos a nuestros clientes con una visión técnica y estratégica para que la tecnología sea una ventaja y no una preocupación.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="relative -mt-32">
        <svg viewBox="0 0 1440 120" class="w-full h-24 text-white fill-current" preserveAspectRatio="none">
            <path d="M0,96L60,90.7C120,85,240,75,360,58.7C480,43,600,21,720,26.7C840,32,960,64,1080,74.7C1200,85,1320,75,1380,69.3L1440,64L1440,120L0,120Z"></path>
        </svg>
    </div>
</section>

<!-- QUIÉNES SOMOS -->
<section class="bg-white pb-20 pt-12">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-14 items-center">

            <!-- IMAGEN -->
            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
                <div class="relative">
                    <img
                        src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1200&q=80"
                        alt="Equipo de trabajo"
                        class="w-full h-[500px] object-cover rounded-[2rem] shadow-2xl"
                    >

                    <div class="absolute -bottom-6 -right-6 bg-[#0050b0] text-white rounded-3xl p-6 shadow-xl max-w-xs">
                        <p class="text-sm text-blue-100">Nuestra visión</p>
                        <h3 class="mt-2 text-xl font-bold">
                            Convertir la tecnología en una base confiable para la empresa
                        </h3>
                    </div>
                </div>
            </div>

            <!-- TEXTO -->
            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100">
                <span class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">
                    Quiénes somos
                </span>

                <h2 class="mt-3 text-3xl md:text-4xl font-bold text-slate-900">
                    Más que proveedores, somos aliados tecnológicos
                </h2>

                <p class="mt-6 text-gray-600 leading-8">
                    En ALTECBOL ayudamos a empresas a ordenar, fortalecer y escalar su infraestructura tecnológica,
                    entendiendo que la tecnología no es un gasto, sino una base clave para la continuidad operativa.
                </p>

                <p class="mt-4 text-gray-600 leading-8">
                    Acompañamos a cada cliente desde el diagnóstico hasta la implementación y el soporte,
                    integrando redes, servidores, seguridad, comunicaciones y servicios digitales en soluciones
                    pensadas para la realidad de cada empresa.
                </p>

                <p class="mt-4 text-gray-600 leading-8">
                    Nuestro enfoque no se basa solo en resolver problemas técnicos, sino en construir entornos
                    estables, seguros y preparados para el crecimiento, donde la tecnología trabaja a favor del negocio.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- NUESTRA HISTORIA -->
<section class="relative overflow-hidden bg-slate-50 py-20">
    <div class="absolute top-0 right-0 h-60 w-60 rounded-full bg-[#01d3d1]/10 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 h-60 w-60 rounded-full bg-[#0050b0]/10 blur-3xl"></div>

    <div class="relative max-w-6xl mx-auto px-6">
        <div class="max-w-3xl mx-auto text-center js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
            <span class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">
                Nuestra historia
            </span>

            <h2 class="mt-3 text-3xl md:text-4xl font-bold text-slate-900">
                Un camino construido con visión, continuidad y crecimiento
            </h2>

            <p class="mt-4 text-gray-600 leading-7">
                Cada etapa refleja cómo ALTECBOL ha acompañado a empresas con soluciones tecnológicas
                pensadas para crecer con estabilidad, orden y continuidad operativa.
            </p>
        </div>

        <div class="mt-12 js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100">
            <div class="relative rounded-[2rem] bg-white/85 p-4 md:p-6 shadow-xl ring-1 ring-slate-200 backdrop-blur-sm">

                <!-- Línea vertical -->
                <div class="absolute left-6 top-8 bottom-8 w-[2px] rounded-full bg-gradient-to-b from-[#0050b0]/20 via-[#01d3d1]/50 to-[#0050b0]/20 md:left-8"></div>

                <div class="space-y-3">

                    <!-- 2018 -->
                    <div class="history-item group relative pl-8 md:pl-12" data-open="false">
                        <div class="absolute left-[6px] top-5 h-4 w-4 rounded-full border-4 border-white bg-[#01d3d1] shadow-[0_0_0_5px_rgba(1,211,209,0.10)] md:left-[10px]"></div>

                        <div class="overflow-hidden rounded-[1.25rem] border border-slate-200 bg-white shadow-sm transition duration-300 group-hover:border-[#0050b0]/20 group-hover:shadow-md">
                            <button type="button"
                                class="history-toggle flex w-full items-center justify-between gap-3 px-4 py-3.5 text-left md:px-6">
                                <div class="min-w-0">
                                    <div class="flex flex-col gap-1.5 md:flex-row md:items-center md:gap-3">
                                        <span class="inline-flex w-fit rounded-full bg-[#0050b0]/10 px-2.5 py-1 text-[11px] font-bold uppercase tracking-wide text-[#0050b0]">
                                            2018
                                        </span>
                                        <h3 class="text-base font-bold leading-snug text-slate-900 md:text-[1.05rem]">
                                            El inicio en tiempos desafiantes
                                        </h3>
                                    </div>
                                </div>

                                <span class="history-icon flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#0050b0]/10 text-[#0050b0] transition duration-300">
                                    <svg class="h-3.5 w-3.5 history-plus transition duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
                                    </svg>
                                    <svg class="hidden h-3.5 w-3.5 history-minus transition duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14"/>
                                    </svg>
                                </span>
                            </button>

                            <div class="history-content hidden px-4 pb-4 md:px-6">
                                <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-4">
                                    <div class="space-y-2.5 text-[15px] text-gray-600 leading-6">
                                        <p>
                                            En medio de una crisis económica, nace ALTECBOL con una visión clara:
                                            ser el aliado tecnológico que ayude a optimizar costos, fortalecer la
                                            seguridad y crecer de forma sostenible.
                                        </p>
                                        <p>
                                            Su fundador, Moisés, ingeniero en redes, descubrió en sus primeros proyectos
                                            que las empresas necesitaban más que soporte técnico: requerían continuidad
                                            y acompañamiento estratégico.
                                        </p>
                                        <p>
                                            ALTECBOL inició ofreciendo infraestructura TI, servidores, conectividad,
                                            cableado estructurado e internet, construyendo una base sólida para el
                                            crecimiento de sus clientes.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2019 Vencorp -->
                    <div class="history-item group relative pl-8 md:pl-12" data-open="false">
                        <div class="absolute left-[6px] top-5 h-4 w-4 rounded-full border-4 border-white bg-[#01d3d1] shadow-[0_0_0_5px_rgba(1,211,209,0.10)] md:left-[10px]"></div>

                        <div class="overflow-hidden rounded-[1.25rem] border border-slate-200 bg-white shadow-sm transition duration-300 group-hover:border-[#0050b0]/20 group-hover:shadow-md">
                            <button type="button"
                                class="history-toggle flex w-full items-center justify-between gap-3 px-4 py-3.5 text-left md:px-6">
                                <div class="min-w-0">
                                    <div class="flex flex-col gap-1.5 md:flex-row md:items-center md:gap-3">
                                        <span class="inline-flex w-fit rounded-full bg-[#0050b0]/10 px-2.5 py-1 text-[11px] font-bold uppercase tracking-wide text-[#0050b0]">
                                            2019
                                        </span>
                                        <h3 class="text-base font-bold leading-snug text-slate-900 md:text-[1.05rem]">
                                            Vencorp: de 8 computadoras a más de 300 agentes
                                        </h3>
                                    </div>
                                </div>

                                <span class="history-icon flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#0050b0]/10 text-[#0050b0] transition duration-300">
                                    <svg class="h-3.5 w-3.5 history-plus transition duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
                                    </svg>
                                    <svg class="hidden h-3.5 w-3.5 history-minus transition duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14"/>
                                    </svg>
                                </span>
                            </button>

                            <div class="history-content hidden px-4 pb-4 md:px-6">
                                <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-4">
                                    <div class="space-y-2.5 text-[15px] text-gray-600 leading-6">
                                        <p>
                                            Vencorp inició con ocho computadoras en una oficina pequeña. ALTECBOL implementó
                                            servidores, firewalls y VPN seguras, creando una base sólida para su crecimiento.
                                        </p>
                                        <p>
                                            Con los años, la operación creció a más de 300 agentes en dos pisos de call center
                                            y uno administrativo para 2023.
                                        </p>
                                        <p>
                                            Este proyecto demostró que una tecnología bien planificada permite crecer de forma
                                            segura y sin interrupciones.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2019 Lucky -->
                    <div class="history-item group relative pl-8 md:pl-12" data-open="false">
                        <div class="absolute left-[6px] top-5 h-4 w-4 rounded-full border-4 border-white bg-[#01d3d1] shadow-[0_0_0_5px_rgba(1,211,209,0.10)] md:left-[10px]"></div>

                        <div class="overflow-hidden rounded-[1.25rem] border border-slate-200 bg-white shadow-sm transition duration-300 group-hover:border-[#0050b0]/20 group-hover:shadow-md">
                            <button type="button"
                                class="history-toggle flex w-full items-center justify-between gap-3 px-4 py-3.5 text-left md:px-6">
                                <div class="min-w-0">
                                    <div class="flex flex-col gap-1.5 md:flex-row md:items-center md:gap-3">
                                        <span class="inline-flex w-fit rounded-full bg-[#0050b0]/10 px-2.5 py-1 text-[11px] font-bold uppercase tracking-wide text-[#0050b0]">
                                            2019
                                        </span>
                                        <h3 class="text-base font-bold leading-snug text-slate-900 md:text-[1.05rem]">
                                            Lucky: expansión multisede
                                        </h3>
                                    </div>
                                </div>

                                <span class="history-icon flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#0050b0]/10 text-[#0050b0] transition duration-300">
                                    <svg class="h-3.5 w-3.5 history-plus transition duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
                                    </svg>
                                    <svg class="hidden h-3.5 w-3.5 history-minus transition duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14"/>
                                    </svg>
                                </span>
                            </button>

                            <div class="history-content hidden px-4 pb-4 md:px-6">
                                <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-4">
                                    <div class="space-y-2.5 text-[15px] text-gray-600 leading-6">
                                        <p>
                                            Grupo Lucky inició operaciones en Santa Cruz ese mismo año. ALTECBOL apoyó su
                                            crecimiento desde el inicio, implementando internet, redes y servidores para una base sólida.
                                        </p>
                                        <p>
                                            Con la expansión a Cochabamba y La Paz, se trabajó en estandarizar y segmentar redes,
                                            además de centralizar la administración, garantizando uniformidad y tiempos de respuesta confiables.
                                        </p>
                                        <p>
                                            El resultado fue una infraestructura estable y lista para escalar junto al crecimiento de la empresa.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2021 Olivera -->
                    <div class="history-item group relative pl-8 md:pl-12" data-open="false">
                        <div class="absolute left-[6px] top-5 h-4 w-4 rounded-full border-4 border-white bg-[#01d3d1] shadow-[0_0_0_5px_rgba(1,211,209,0.10)] md:left-[10px]"></div>

                        <div class="overflow-hidden rounded-[1.25rem] border border-slate-200 bg-white shadow-sm transition duration-300 group-hover:border-[#0050b0]/20 group-hover:shadow-md">
                            <button type="button"
                                class="history-toggle flex w-full items-center justify-between gap-3 px-4 py-3.5 text-left md:px-6">
                                <div class="min-w-0">
                                    <div class="flex flex-col gap-1.5 md:flex-row md:items-center md:gap-3">
                                        <span class="inline-flex w-fit rounded-full bg-[#0050b0]/10 px-2.5 py-1 text-[11px] font-bold uppercase tracking-wide text-[#0050b0]">
                                            2021
                                        </span>
                                        <h3 class="text-base font-bold leading-snug text-slate-900 md:text-[1.05rem]">
                                            Olivera: tecnología para la certificación
                                        </h3>
                                    </div>
                                </div>

                                <span class="history-icon flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#0050b0]/10 text-[#0050b0] transition duration-300">
                                    <svg class="h-3.5 w-3.5 history-plus transition duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
                                    </svg>
                                    <svg class="hidden h-3.5 w-3.5 history-minus transition duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14"/>
                                    </svg>
                                </span>
                            </button>

                            <div class="history-content hidden px-4 pb-4 md:px-6">
                                <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-4">
                                    <div class="space-y-2.5 text-[15px] text-gray-600 leading-6">
                                        <p>
                                            En 2021, Olivera enfrentaba el reto de crecer y cumplir con exigentes estándares internacionales.
                                            Con apenas 15 computadoras y sin cableado estructurado, ALTECBOL rediseñó su infraestructura desde cero.
                                        </p>
                                        <p>
                                            Se implementaron cableado certificado, servidores, biométricos, alarmas y sensores,
                                            transformando la tecnología en un pilar de trazabilidad, control y confianza.
                                        </p>
                                        <p>
                                            Gracias a este trabajo, en 2022 la empresa logró la certificación OEA.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2022 Imex -->
                    <div class="history-item group relative pl-8 md:pl-12" data-open="false">
                        <div class="absolute left-[6px] top-5 h-4 w-4 rounded-full border-4 border-white bg-[#01d3d1] shadow-[0_0_0_5px_rgba(1,211,209,0.10)] md:left-[10px]"></div>

                        <div class="overflow-hidden rounded-[1.25rem] border border-slate-200 bg-white shadow-sm transition duration-300 group-hover:border-[#0050b0]/20 group-hover:shadow-md">
                            <button type="button"
                                class="history-toggle flex w-full items-center justify-between gap-3 px-4 py-3.5 text-left md:px-6">
                                <div class="min-w-0">
                                    <div class="flex flex-col gap-1.5 md:flex-row md:items-center md:gap-3">
                                        <span class="inline-flex w-fit rounded-full bg-[#0050b0]/10 px-2.5 py-1 text-[11px] font-bold uppercase tracking-wide text-[#0050b0]">
                                            2022
                                        </span>
                                        <h3 class="text-base font-bold leading-snug text-slate-900 md:text-[1.05rem]">
                                            Imex: replicando el modelo de éxito
                                        </h3>
                                    </div>
                                </div>

                                <span class="history-icon flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#0050b0]/10 text-[#0050b0] transition duration-300">
                                    <svg class="h-3.5 w-3.5 history-plus transition duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
                                    </svg>
                                    <svg class="hidden h-3.5 w-3.5 history-minus transition duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14"/>
                                    </svg>
                                </span>
                            </button>

                            <div class="history-content hidden px-4 pb-4 md:px-6">
                                <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-4">
                                    <div class="space-y-2.5 text-[15px] text-gray-600 leading-6">
                                        <p>
                                            Siguiendo la misma metodología aplicada con Olivera, Imex implementó una infraestructura
                                            orientada a la continuidad y al cumplimiento de normas internacionales.
                                        </p>
                                        <p>
                                            El proyecto también alcanzó la certificación OEA, confirmando que un proceso bien diseñado
                                            acelera resultados sin comprometer la calidad.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2019-2024 -->
                    <div class="history-item group relative pl-8 md:pl-12" data-open="false">
                        <div class="absolute left-[6px] top-5 h-4 w-4 rounded-full border-4 border-white bg-[#01d3d1] shadow-[0_0_0_5px_rgba(1,211,209,0.10)] md:left-[10px]"></div>

                        <div class="overflow-hidden rounded-[1.25rem] border border-slate-200 bg-white shadow-sm transition duration-300 group-hover:border-[#0050b0]/20 group-hover:shadow-md">
                            <button type="button"
                                class="history-toggle flex w-full items-center justify-between gap-3 px-4 py-3.5 text-left md:px-6">
                                <div class="min-w-0">
                                    <div class="flex flex-col gap-1.5 md:flex-row md:items-center md:gap-3">
                                        <span class="inline-flex w-fit rounded-full bg-[#0050b0]/10 px-2.5 py-1 text-[11px] font-bold uppercase tracking-wide text-[#0050b0]">
                                            2019–2024
                                        </span>
                                        <h3 class="text-base font-bold leading-snug text-slate-900 md:text-[1.05rem]">
                                            Una red de confianza
                                        </h3>
                                    </div>
                                </div>

                                <span class="history-icon flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#0050b0]/10 text-[#0050b0] transition duration-300">
                                    <svg class="h-3.5 w-3.5 history-plus transition duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
                                    </svg>
                                    <svg class="hidden h-3.5 w-3.5 history-minus transition duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14"/>
                                    </svg>
                                </span>
                            </button>

                            <div class="history-content hidden px-4 pb-4 md:px-6">
                                <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-4">
                                    <div class="space-y-2.5 text-[15px] text-gray-600 leading-6">
                                        <p>
                                            Durante estos años, más empresas confiaron en este modelo de trabajo, entre ellas:
                                            Clínica Sirani, Intexplast, Seltacorp, Vialcruz, Mercomex, Vaxland,
                                            Colegio Médico SCZ y Area SRL, entre otras.
                                        </p>
                                        <p>
                                            Cada proyecto siguió un esquema simple y efectivo:
                                            <span class="font-semibold text-slate-900">Reto → Solución → Continuidad.</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- HOY -->
                    <div class="history-item group relative pl-8 md:pl-12" data-open="true">
                        <div class="absolute left-[6px] top-5 h-4 w-4 rounded-full border-4 border-white bg-[#01d3d1] shadow-[0_0_0_5px_rgba(1,211,209,0.10)] md:left-[10px]"></div>

                        <div class="overflow-hidden rounded-[1.25rem] border border-[#0050b0]/15 bg-white shadow-sm transition duration-300 group-hover:border-[#0050b0]/20 group-hover:shadow-md">
                            <button type="button"
                                class="history-toggle flex w-full items-center justify-between gap-3 px-4 py-3.5 text-left md:px-6">
                                <div class="min-w-0">
                                    <div class="flex flex-col gap-1.5 md:flex-row md:items-center md:gap-3">
                                        <span class="inline-flex w-fit rounded-full bg-[#0050b0] px-2.5 py-1 text-[11px] font-bold uppercase tracking-wide text-white">
                                            Hoy
                                        </span>
                                        <h3 class="text-base font-bold leading-snug text-slate-900 md:text-[1.05rem]">
                                            Hacia alianzas estratégicas
                                        </h3>
                                    </div>
                                </div>

                                <span class="history-icon flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-[#0050b0] text-white transition duration-300">
                                    <svg class="hidden h-3.5 w-3.5 history-plus transition duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
                                    </svg>
                                    <svg class="h-3.5 w-3.5 history-minus transition duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14"/>
                                    </svg>
                                </span>
                            </button>

                            <div class="history-content px-4 pb-4 md:px-6">
                                <div class="rounded-xl border border-dashed border-slate-200 bg-slate-50 px-4 py-4">
                                    <div class="space-y-2.5 text-[15px] text-gray-600 leading-6">
                                        <p>
                                            Actualmente, ALTECBOL se enfoca en fortalecer alianzas con líderes globales como
                                            Microsoft, Fortinet, Palo Alto, Sophos e IBM para ofrecer soluciones más robustas
                                            y elevar su capacidad tecnológica.
                                        </p>
                                        <p>
                                            Desde 2018, su propósito se mantiene firme: convertir los retos en oportunidades
                                            y transformar la complejidad tecnológica en continuidad, acompañando a cada empresa
                                            en su camino hacia el crecimiento.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- MISIÓN / VISIÓN / VALORES -->
<section class="relative overflow-hidden bg-white py-20">
    <div class="absolute -top-10 -right-10 h-56 w-56 rounded-full bg-[#01d3d1]/10 blur-3xl"></div>
    <div class="absolute -bottom-10 -left-10 h-56 w-56 rounded-full bg-[#0050b0]/10 blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        <!-- ENCABEZADO -->
        <div class="max-w-3xl js-fade opacity-0 translate-y-8 transition duration-700 ease-out">
            <span class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">
                Nuestra esencia
            </span>

            <h2 class="mt-3 text-3xl md:text-4xl font-bold text-slate-900">
                Principios que sostienen nuestra forma de trabajar
            </h2>

            <p class="mt-4 text-gray-600 leading-7">
                En ALTECBOL trabajamos con una visión de continuidad, confianza y crecimiento,
                construyendo relaciones sólidas a través de soluciones tecnológicas integrales.
            </p>
        </div>

        <!-- MISIÓN Y VISIÓN -->
        <div class="mt-12 grid gap-6 lg:grid-cols-2">

            <!-- MISIÓN -->
            <div class="js-fade opacity-0 translate-y-8 transition duration-700 ease-out rounded-[1.75rem] border border-slate-200 bg-slate-50 p-6 md:p-8 shadow-sm">
                <div class="flex items-start gap-4">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#0050b0]/10 text-[#0050b0]">
                        <!-- target -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="8"></circle>
                            <circle cx="12" cy="12" r="4"></circle>
                            <circle cx="12" cy="12" r="1.5" fill="currentColor" stroke="none"></circle>
                        </svg>
                    </div>

                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wide text-[#0050b0]">
                            Misión
                        </p>
                        <h3 class="mt-1 text-xl font-bold text-slate-900">
                            Lo que hacemos
                        </h3>
                    </div>
                </div>

                <p class="mt-5 text-gray-600 leading-7">
                    Proveer soluciones tecnológicas integrales con soporte permanente,
                    garantizando la continuidad, seguridad y eficiencia de las operaciones
                    de nuestros clientes.
                </p>
            </div>

            <!-- VISIÓN -->
            <div class="js-fade opacity-0 translate-y-8 transition duration-700 ease-out delay-100 rounded-[1.75rem] bg-gradient-to-br from-[#0050b0] to-[#0b63d1] p-6 md:p-8 text-white shadow-xl">
                <div class="flex items-start gap-4">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-white/15 text-white backdrop-blur">
                        <!-- eye -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6-10-6-10-6z"/>
                            <circle cx="12" cy="12" r="2.5"></circle>
                        </svg>
                    </div>

                    <div>
                        <p class="text-sm font-semibold uppercase tracking-wide text-[#01d3d1]">
                            Visión
                        </p>
                        <h3 class="mt-1 text-xl font-bold text-white">
                            Hacia dónde vamos
                        </h3>
                    </div>
                </div>

                <p class="mt-5 leading-7 text-blue-100">
                    Consolidarnos como el socio tecnológico de referencia en Bolivia y la región,
                    reconocidos por la confianza, la transparencia y la capacidad de evolucionar
                    junto al crecimiento de nuestros clientes.
                </p>
            </div>

        </div>

        <!-- VALORES -->
        <div class="mt-12">
            <div class="mb-6 js-fade opacity-0 translate-y-8 transition duration-700 ease-out">
                <span class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">
                    Valores
                </span>

                <h3 class="mt-2 text-2xl md:text-3xl font-bold text-slate-900">
                    La base de cada relación y cada proyecto
                </h3>
            </div>

            <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">

                <!-- Transparencia -->
                <div class="js-fade opacity-0 translate-y-8 transition duration-300 ease-out rounded-[1.5rem] border border-slate-200 bg-white p-5 shadow-sm hover:-translate-y-1 hover:shadow-md">
                    <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-[#0050b0]/10 text-[#0050b0]">
                        <!-- eye -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6-10-6-10-6z"/>
                            <circle cx="12" cy="12" r="2.5"></circle>
                        </svg>
                    </div>

                    <h4 class="mt-4 text-lg font-bold text-slate-900">Transparencia</h4>
                    <p class="mt-2 text-sm leading-6 text-gray-600">
                        Mantenemos relaciones claras, honestas y confiables en cada proyecto.
                    </p>
                </div>

                <!-- Compromiso -->
                <div class="js-fade opacity-0 translate-y-8 transition duration-300 ease-out delay-100 rounded-[1.5rem] border border-slate-200 bg-white p-5 shadow-sm hover:-translate-y-1 hover:shadow-md">
                    <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-[#0050b0]/10 text-[#0050b0]">
                        <!-- handshake simplificado -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12l2 2a2 2 0 002.8 0L16 11"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10l4-4 4 4-4 4-4-4z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 10l4-4 4 4-4 4-4-4z"/>
                        </svg>

                    </div>

                    <h4 class="mt-4 text-lg font-bold text-slate-900">Compromiso</h4>
                    <p class="mt-2 text-sm leading-6 text-gray-600">
                        Respondemos con cercanía, responsabilidad y acompañamiento constante.
                    </p>
                </div>

                <!-- Adaptabilidad -->
                <div class="js-fade opacity-0 translate-y-8 transition duration-300 ease-out delay-200 rounded-[1.5rem] border border-slate-200 bg-white p-5 shadow-sm hover:-translate-y-1 hover:shadow-md">
                    <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-[#0050b0]/10 text-[#0050b0]">
                        <!-- arrows repeat -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 1l4 4-4 4"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 11V9a4 4 0 014-4h14"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 23l-4-4 4-4"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 13v2a4 4 0 01-4 4H3"/>
                        </svg>
                    </div>

                    <h4 class="mt-4 text-lg font-bold text-slate-900">Adaptabilidad</h4>
                    <p class="mt-2 text-sm leading-6 text-gray-600">
                        Ajustamos cada solución a la realidad y evolución de cada empresa.
                    </p>
                </div>

                <!-- Resiliencia digital -->
                <div class="js-fade opacity-0 translate-y-8 transition duration-300 ease-out delay-300 rounded-[1.5rem] border border-slate-200 bg-white p-5 shadow-sm hover:-translate-y-1 hover:shadow-md">
                    <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-[#0050b0]/10 text-[#0050b0]">
                        <!-- shield-check -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3l7 3v6c0 5-3.5 8-7 9-3.5-1-7-4-7-9V6l7-3z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4"/>
                        </svg>
                    </div>

                    <h4 class="mt-4 text-lg font-bold text-slate-900">Resiliencia digital</h4>
                    <p class="mt-2 text-sm leading-6 text-gray-600">
                        Protegemos la continuidad operativa frente a cambios y desafíos.
                    </p>
                </div>

            </div>
        </div>

    </div>
</section>
<!-- ESPECIALIDADES -->
<section class="relative overflow-hidden bg-slate-50 py-20">
    <div class="absolute top-0 left-0 h-72 w-72 rounded-full bg-[#01d3d1]/10 blur-3xl"></div>
    <div class="absolute bottom-0 right-0 h-72 w-72 rounded-full bg-[#0050b0]/10 blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-6">
        <div class="max-w-3xl mx-auto text-center js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
            <span class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">Lo que hacemos</span>
            <h2 class="mt-3 text-3xl md:text-4xl font-bold text-slate-900">
                Soluciones tecnológicas para entornos empresariales
            </h2>
            <p class="mt-5 text-gray-600 leading-8">
                Diseñamos e implementamos soluciones que mejoran conectividad, control, productividad y continuidad.
            </p>
        </div>

        <div class="mt-14 grid md:grid-cols-2 xl:grid-cols-3 gap-6">

            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out rounded-[1.75rem] bg-white shadow-lg border border-slate-100 overflow-hidden">
                <img
                    src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=80"
                    alt="Infraestructura IT"
                    class="h-56 w-full object-cover"
                >
                <div class="p-6">
                    <h3 class="text-xl font-bold text-slate-900">Infraestructura IT</h3>
                    <p class="mt-3 text-sm text-gray-600 leading-6">
                        Servidores, virtualización, organización tecnológica y entornos empresariales robustos.
                    </p>
                </div>
            </div>

            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100 rounded-[1.75rem] bg-white shadow-lg border border-slate-100 overflow-hidden">
                <img
                    src="https://images.unsplash.com/photo-1544197150-b99a580bb7a8?auto=format&fit=crop&w=1200&q=80"
                    alt="Redes y conectividad"
                    class="h-56 w-full object-cover"
                >
                <div class="p-6">
                    <h3 class="text-xl font-bold text-slate-900">Redes y conectividad</h3>
                    <p class="mt-3 text-sm text-gray-600 leading-6">
                        Soluciones de red para empresas que necesitan estabilidad, rendimiento y crecimiento.
                    </p>
                </div>
            </div>

            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-200 rounded-[1.75rem] bg-white shadow-lg border border-slate-100 overflow-hidden">
                <img
                    src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?auto=format&fit=crop&w=1200&q=80"
                    alt="Soporte y monitoreo"
                    class="h-56 w-full object-cover"
                >
                <div class="p-6">
                    <h3 class="text-xl font-bold text-slate-900">Soporte y continuidad</h3>
                    <p class="mt-3 text-sm text-gray-600 leading-6">
                        Soporte técnico, mantenimiento y acompañamiento para reducir interrupciones operativas.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- VALORES -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
                <span class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">Nuestra forma de trabajar</span>
                <h2 class="mt-3 text-3xl md:text-4xl font-bold text-slate-900">
                    Tecnología con criterio, cercanía y compromiso
                </h2>

                <div class="mt-8 space-y-5">
                    <div class="flex gap-4">
                        <div class="h-11 w-11 shrink-0 rounded-2xl bg-[#0050b0] text-white flex items-center justify-center font-bold">1</div>
                        <div>
                            <h3 class="font-bold text-slate-900">Diagnóstico real</h3>
                            <p class="mt-1 text-sm text-gray-600 leading-6">
                                Entendemos primero la operación y luego proponemos la solución.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="h-11 w-11 shrink-0 rounded-2xl bg-[#0050b0] text-white flex items-center justify-center font-bold">2</div>
                        <div>
                            <h3 class="font-bold text-slate-900">Implementación profesional</h3>
                            <p class="mt-1 text-sm text-gray-600 leading-6">
                                Ejecutamos con orden, calidad técnica y enfoque en continuidad.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="h-11 w-11 shrink-0 rounded-2xl bg-[#0050b0] text-white flex items-center justify-center font-bold">3</div>
                        <div>
                            <h3 class="font-bold text-slate-900">Acompañamiento</h3>
                            <p class="mt-1 text-sm text-gray-600 leading-6">
                                Buscamos relaciones de largo plazo basadas en confianza y resultados.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100">
                <div class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-[#0050b0] to-[#0b63d1] p-8 text-white shadow-2xl">
                    <div class="absolute top-0 right-0 h-40 w-40 rounded-full bg-white/10 blur-3xl"></div>

                    <h3 class="text-2xl font-bold">Áreas donde aportamos valor</h3>

                    <div class="mt-8 grid sm:grid-cols-2 gap-4">
                        <div class="rounded-2xl border border-white/10 bg-white/10 p-5">
                            <h4 class="font-semibold">Infraestructura</h4>
                            <p class="mt-2 text-sm text-blue-100">Servidores, virtualización y organización tecnológica.</p>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/10 p-5">
                            <h4 class="font-semibold">Conectividad</h4>
                            <p class="mt-2 text-sm text-blue-100">Redes cableadas, inalámbricas y continuidad operativa.</p>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/10 p-5">
                            <h4 class="font-semibold">Comunicaciones</h4>
                            <p class="mt-2 text-sm text-blue-100">Telefonía IP y soluciones para atención empresarial.</p>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/10 p-5">
                            <h4 class="font-semibold">Servicios digitales</h4>
                            <p class="mt-2 text-sm text-blue-100">Licencias, dominios, hosting y herramientas de productividad.</p>
                        </div>
                    </div>

                    <a href="{{ route('web.contacto') }}"
                       class="mt-8 inline-flex items-center justify-center rounded-2xl bg-[#01d3d1] px-6 py-3.5 font-semibold text-slate-900 transition hover:scale-[1.02]">
                        Solicitar información
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA FINAL -->
<section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out rounded-[2rem] border border-slate-200 bg-white p-8 md:p-10 lg:p-12 shadow-[0_20px_60px_rgba(15,23,42,0.08)]">
            <div class="grid gap-8 lg:grid-cols-[1.4fr_auto] lg:items-center">

                <!-- CONTENIDO -->
                <div class="max-w-2xl">
                    <span class="text-sm font-semibold uppercase tracking-[0.18em] text-[#0050b0]">
                        Trabajemos juntos
                    </span>

                    <h2 class="mt-4 text-3xl md:text-4xl font-bold leading-tight text-slate-900">
                        Impulsemos una infraestructura tecnológica más estable para tu empresa
                    </h2>

                    <p class="mt-4 text-base leading-7 text-slate-600 md:text-lg">
                        En ALTECBOL te ayudamos a fortalecer conectividad, continuidad operativa y soporte tecnológico con una solución alineada a tu negocio.
                    </p>
                </div>

                <!-- ACCIONES -->
                <div class="flex flex-col sm:flex-row gap-4 lg:justify-end">
                    <a href="{{ route('web.contacto') }}"
                       class="inline-flex items-center justify-center rounded-2xl bg-[#0050b0] px-6 py-3.5 font-semibold text-white transition duration-300 hover:bg-[#003f8c]">
                        Contactar ahora
                    </a>

                    <a href="{{ route('web.servicios') }}"
                       class="inline-flex items-center justify-center rounded-2xl border border-slate-300 bg-white px-6 py-3.5 font-semibold text-slate-700 transition duration-300 hover:border-[#0050b0] hover:text-[#0050b0]">
                        Ver soluciones
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const items = document.querySelectorAll('.js-fade');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('opacity-0', 'translate-y-8');
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.15
        });

        items.forEach((item) => observer.observe(item));

         const historyItems = document.querySelectorAll('.history-item');

        function closeItem(item) {
            item.dataset.open = 'false';

            const content = item.querySelector('.history-content');
            const plus = item.querySelector('.history-plus');
            const minus = item.querySelector('.history-minus');
            const iconWrap = item.querySelector('.history-icon');

            content.classList.add('hidden');
            plus.classList.remove('hidden');
            minus.classList.add('hidden');

            iconWrap.classList.remove('bg-[#0050b0]', 'text-white');
            iconWrap.classList.add('bg-[#0050b0]/10', 'text-[#0050b0]');
        }

        function openItem(item) {
            item.dataset.open = 'true';

            const content = item.querySelector('.history-content');
            const plus = item.querySelector('.history-plus');
            const minus = item.querySelector('.history-minus');
            const iconWrap = item.querySelector('.history-icon');

            content.classList.remove('hidden');
            plus.classList.add('hidden');
            minus.classList.remove('hidden');

            iconWrap.classList.remove('bg-[#0050b0]/10', 'text-[#0050b0]');
            iconWrap.classList.add('bg-[#0050b0]', 'text-white');
        }

        historyItems.forEach((item) => {
            const button = item.querySelector('.history-toggle');

            button.addEventListener('click', function () {
                const isOpen = item.dataset.open === 'true';

                historyItems.forEach((other) => closeItem(other));

                if (!isOpen) {
                    openItem(item);
                }
            });
        });
    });
</script>

@endsection