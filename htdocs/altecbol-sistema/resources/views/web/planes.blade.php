@extends('layouts.web')

@section('title', 'Planes | ALTECBOL')

@section('content')

    <!-- HERO -->
    <section class="relative overflow-hidden bg-slate-950">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1600&q=80"
                alt="Infraestructura cloud empresarial" class="h-full w-full object-cover opacity-20">
        </div>

        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(1,211,209,0.18),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(0,80,176,0.35),_transparent_35%),linear-gradient(to_right,_rgba(2,6,23,0.96),_rgba(0,80,176,0.88),_rgba(2,6,23,0.96))]">
        </div>

        <div class="relative max-w-7xl mx-auto px-6 py-24 lg:py-32">
            <div class="grid lg:grid-cols-2 gap-14 items-center">
                <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
                    <span
                        class="inline-flex items-center rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm text-white/90 backdrop-blur">
                        Planes ALTECBOL
                    </span>

                    <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-bold leading-tight text-white">
                        Planes tecnológicos
                        <span class="text-[#01d3d1]">pensados para crecer con tu empresa</span>
                    </h1>

                    <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-200">
                        Elige entre soporte mensualizado, infraestructura cloud y planes empresariales
                        diseñados para darte continuidad, seguridad y mejor rendimiento operativo.
                    </p>

                    <div class="mt-8 flex flex-col sm:flex-row gap-4">
                        <a href="#planes-mensuales"
                            class="inline-flex items-center justify-center rounded-2xl bg-[#01d3d1] px-6 py-3.5 font-semibold text-slate-900 transition hover:scale-[1.02]">
                            Ver planes
                        </a>

                        <a href="{{ route('web.contacto') }}"
                            class="inline-flex items-center justify-center rounded-2xl border border-white/20 px-6 py-3.5 font-semibold text-white transition hover:bg-white hover:text-[#0050b0]">
                            Solicitar propuesta
                        </a>
                    </div>
                </div>

                <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100">
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="rounded-[2rem] border border-white/10 bg-white/10 p-6 backdrop-blur shadow-2xl">
                            <div class="text-sm text-slate-300">Modelo destacado</div>
                            <h3 class="mt-3 text-2xl font-bold text-white">Cloud & Data Center</h3>
                            <p class="mt-3 text-sm leading-6 text-slate-200">
                                Infraestructura y virtualización para continuidad y crecimiento seguro.
                            </p>
                        </div>

                        <div
                            class="rounded-[2rem] border border-white/10 bg-white/10 p-6 backdrop-blur shadow-2xl mt-8 sm:mt-12">
                            <div class="text-sm text-slate-300">Modelo recurrente</div>
                            <h3 class="mt-3 text-2xl font-bold text-white">Managed IT Services</h3>
                            <p class="mt-3 text-sm leading-6 text-slate-200">
                                Soporte técnico y monitoreo continuo para mantener el negocio activo.
                            </p>
                        </div>

                        <div
                            class="rounded-[2rem] border border-white/10 bg-white/10 p-6 backdrop-blur shadow-2xl sm:col-span-2">
                            <div class="text-sm text-slate-300">Ideal para</div>
                            <h3 class="mt-3 text-2xl font-bold text-white">Empresas que buscan orden, continuidad y
                                escalabilidad</h3>
                            <p class="mt-3 text-sm leading-6 text-slate-200">
                                Estos planes están pensados para organizaciones que necesitan acompañamiento,
                                soporte y una base tecnológica confiable para operar mejor.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative -mt-14">
            <svg viewBox="0 0 1440 120" class="h-24 w-full fill-white" preserveAspectRatio="none">
                <path
                    d="M0,96L80,85.3C160,75,320,53,480,48C640,43,800,53,960,64C1120,75,1280,85,1360,90.7L1440,96L1440,120L0,120Z">
                </path>
            </svg>
        </div>
    </section>

    <!-- TABS VISUALES -->
    <section class="bg-white pb-10">
        <div class="max-w-7xl mx-auto px-6">
            <div
                class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out rounded-[2rem] border border-slate-100 bg-slate-50 p-4 md:p-5 shadow-lg">
                <div class="grid md:grid-cols-3 gap-3">
                    <a href="#planes-mensuales"
                        class="rounded-2xl bg-white px-5 py-4 border border-slate-100 hover:border-[#0050b0] hover:shadow-md transition">
                        <div class="text-sm font-semibold text-[#0050b0]">01</div>
                        <div class="mt-1 font-bold text-slate-900">Servicio mensualizado</div>
                        <div class="mt-1 text-sm text-slate-600">Soporte continuo y acompañamiento TI</div>
                    </a>

                    <a href="#planes-cloud"
                        class="rounded-2xl bg-white px-5 py-4 border border-slate-100 hover:border-[#0050b0] hover:shadow-md transition">
                        <div class="text-sm font-semibold text-[#0050b0]">02</div>
                        <div class="mt-1 font-bold text-slate-900">Servidores en la nube</div>
                        <div class="mt-1 text-sm text-slate-600">Tu servicio destacado y escalable</div>
                    </a>

                    <a href="#planes-empresariales"
                        class="rounded-2xl bg-white px-5 py-4 border border-slate-100 hover:border-[#0050b0] hover:shadow-md transition">
                        <div class="text-sm font-semibold text-[#0050b0]">03</div>
                        <div class="mt-1 font-bold text-slate-900">Paquetes empresariales</div>
                        <div class="mt-1 text-sm text-slate-600">Comunicación, seguridad y soluciones a medida</div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- PLANES MENSUALIZADOS -->
    <section id="planes-mensuales" class="relative overflow-hidden bg-slate-50 py-20">
        <div class="absolute top-0 left-0 h-72 w-72 rounded-full bg-[#01d3d1]/10 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 h-72 w-72 rounded-full bg-[#0050b0]/10 blur-3xl"></div>

        @php
            $wa = '59164347465';

            $msg1 = urlencode("Hola, estoy interesado en el Plan Básico (Starter Care).

Me gustaría recibir información sobre:
• Soporte helpdesk remoto y en sitio
• Atención de incidencias
• Soporte básico de red
• Mantenimiento correctivo de equipos ya instalados

¿Podrían enviarme más detalles y una cotización?");

            $msg2 = urlencode("Hola, estoy interesado en el Plan Intermedio (Business Care).

Me gustaría recibir información sobre:
• Todo lo incluido en el Plan Básico
• Mantenimiento preventivo programado
• Instalación de nuevos equipos TI
• Control y mantenimiento de red
• Soporte a servidores

¿Podrían enviarme más detalles y una cotización?");

            $msg3 = urlencode("Hola, estoy interesado en el Plan Avanzado (Enterprise Care).

Me gustaría recibir información sobre:
• Todo lo incluido en el Plan Intermedio
• Instalación de cableado estructurado
• Instalación de nuevos equipos
• Integración de cámaras y biométricos
• Cobertura completa de infraestructura tecnológica

¿Podrían enviarme más detalles y una cotización?");
        @endphp

        <div class="relative max-w-7xl mx-auto px-6">
            <div class="max-w-3xl js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
                <span class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">
                    Servicio mensualizado
                </span>

                <h2 class="mt-3 text-3xl md:text-4xl font-bold text-slate-900">
                    Planes de soporte para empresas que necesitan continuidad diaria
                </h2>

                <p class="mt-5 text-gray-600 leading-8">
                    Elige el nivel de soporte y acompañamiento según la complejidad de tu operación
                    y el crecimiento de tu empresa.
                </p>
            </div>

            <div class="mt-12 grid xl:grid-cols-3 gap-8 items-center">

                <!-- PLAN 1 -->
                <article
                    class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out max-w-md xl:max-w-none mx-auto rounded-[2rem] border border-slate-200 bg-white p-7 shadow-lg hover:-translate-y-1 hover:shadow-2xl">
                    <div class="flex items-start justify-between">
                        <div>
                            <div class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">Básico</div>
                            <h3 class="mt-2 text-2xl font-bold text-slate-900">Starter Care</h3>
                        </div>
                        <span
                            class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">Entrada</span>
                    </div>

                    <p class="mt-5 text-slate-600 leading-7">
                        Soporte técnico para resolver incidencias y mantener en funcionamiento
                        los equipos y red existentes.
                    </p>

                    <div class="mt-8 rounded-2xl bg-slate-50 p-5 border border-slate-100">
                        <div class="text-sm text-slate-500">Ideal para</div>
                        <div class="mt-2 font-semibold text-slate-900">
                            Pequeñas empresas u oficinas con operación estable
                        </div>
                    </div>

                    <ul class="mt-8 space-y-3 text-sm text-slate-700">
                        <li>• Soporte helpdesk remoto y en sitio</li>
                        <li>• Atención de incidencias</li>
                        <li>• Soporte básico de red</li>
                        <li>• Mantenimiento correctivo de equipos ya instalados</li>
                    </ul>

                    <a href="https://wa.me/{{ $wa }}?text={{ $msg1 }}" target="_blank"
                        rel="noopener noreferrer"
                        class="mt-8 inline-flex w-full justify-center rounded-2xl border border-[#0050b0] px-5 py-3.5 font-semibold text-[#0050b0] transition hover:bg-[#0050b0] hover:text-white">
                        Solicitar plan
                    </a>
                </article>

                <!-- PLAN 2 -->
                <article
                    class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100 relative z-10 scale-[1.02] lg:scale-[1.05] rounded-[2rem] border-2 border-[#01d3d1] bg-gradient-to-b from-white to-cyan-50 p-9 shadow-2xl hover:-translate-y-1">
                    <div
                        class="absolute -top-4 left-1/2 -translate-x-1/2 rounded-full bg-[#01d3d1] px-4 py-2 text-xs font-bold uppercase tracking-wider text-slate-900 shadow-lg">
                        Más solicitado
                    </div>

                    <div class="flex items-start justify-between">
                        <div>
                            <div class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">Plus</div>
                            <h3 class="mt-2 text-2xl font-bold text-slate-900">Business Care</h3>
                        </div>
                        <span
                            class="rounded-full bg-[#0050b0] px-3 py-1 text-xs font-semibold text-white">Recomendado</span>
                    </div>

                    <p class="mt-5 text-slate-600 leading-7">
                        Soporte más completo con mantenimiento preventivo, control de equipos
                        y acompañamiento técnico continuo.
                    </p>

                    <div class="mt-8 rounded-2xl bg-white p-5 border border-cyan-100 shadow-sm">
                        <div class="text-sm text-slate-500">Ideal para</div>
                        <div class="mt-2 font-semibold text-slate-900">
                            Empresas con varias áreas, personal operativo y dependencia tecnológica constante
                        </div>
                    </div>

                    <ul class="mt-8 space-y-3 text-sm text-slate-700">
                        <li>• Todo lo del plan Starter Care</li>
                        <li>• Mantenimiento preventivo programado</li>
                        <li>• Instalación de nuevos equipos TI</li>
                        <li>• Control y mantenimiento de red (routers, switches)</li>
                        <li>• Soporte a servidores</li>
                    </ul>

                    <a href="https://wa.me/{{ $wa }}?text={{ $msg2 }}" target="_blank"
                        rel="noopener noreferrer"
                        class="mt-8 inline-flex w-full justify-center rounded-2xl bg-[#01d3d1] px-5 py-3.5 font-semibold text-slate-900 shadow-lg transition hover:scale-[1.01] hover:shadow-2xl">
                        Quiero este plan
                    </a>
                </article>

                <!-- PLAN 3 -->
                <article
                    class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-200 max-w-md xl:max-w-none mx-auto rounded-[2rem] border border-slate-200 bg-white p-7 shadow-lg hover:-translate-y-1 hover:shadow-2xl">
                    <div class="flex items-start justify-between">
                        <div>
                            <div class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">Avanzado</div>
                            <h3 class="mt-2 text-2xl font-bold text-slate-900">Enterprise Care</h3>
                        </div>
                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">Full</span>
                    </div>

                    <p class="mt-5 text-slate-600 leading-7">
                        Cobertura completa que incluye infraestructura, nuevas implementaciones
                        y sistemas adicionales.
                    </p>

                    <div class="mt-8 rounded-2xl bg-slate-50 p-5 border border-slate-100">
                        <div class="text-sm text-slate-500">Ideal para</div>
                        <div class="mt-2 font-semibold text-slate-900">
                            Empresas con múltiples sedes, áreas críticas o alta dependencia de TI
                        </div>
                    </div>

                    <ul class="mt-8 space-y-3 text-sm text-slate-700">
                        <li>• Todo lo del plan Business Care</li>
                        <li>• Instalación de cableado estructurado</li>
                        <li>• Instalación de nuevos equipos</li>
                        <li>• Integración de cámaras y biométricos</li>
                        <li>• Cobertura completa de infraestructura tecnológica</li>
                    </ul>

                    <a href="https://wa.me/{{ $wa }}?text={{ $msg3 }}" target="_blank"
                        rel="noopener noreferrer"
                        class="mt-8 inline-flex w-full justify-center rounded-2xl border border-[#0050b0] px-5 py-3.5 font-semibold text-[#0050b0] transition hover:bg-[#0050b0] hover:text-white">
                        Solicitar propuesta
                    </a>
                </article>

            </div>
        </div>
    </section>

    <!-- CLOUD / SERVIDORES -->
    <section id="planes-cloud" class="bg-white py-20">
        @php
            $waCloud = '59164347465';

            $msgCloud = urlencode("Hola, estoy interesado en una solución de servidores cloud para mi empresa.

Me gustaría recibir orientación sobre:
• Qué tipo de servidor sería el más adecuado
• Qué nivel de disponibilidad necesito
• Qué opción recomiendan según mi sistema y operación
• Qué plan se ajusta mejor al tamaño de mi empresa

¿Podrían brindarme más información?");
        @endphp

        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-[1.05fr_.95fr] gap-12 items-start">

                <!-- IZQUIERDA -->
                <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
                    <span class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">
                        Cloud & Servidores
                    </span>

                    <h2 class="mt-3 text-3xl md:text-4xl font-bold text-slate-900">
                        Servidores empresariales diseñados según la exigencia real de tu operación
                    </h2>

                    <p class="mt-5 text-slate-600 leading-8">
                        No todas las empresas necesitan el mismo tipo de servidor. La solución adecuada
                        depende del volumen de información que maneja tu sistema, la cantidad de usuarios,
                        el nivel de continuidad que necesita tu operación y el impacto que tendría una caída
                        del servicio en tu negocio.
                    </p>

                    <!-- IMÁGENES -->
                    <div class="mt-8 grid sm:grid-cols-2 gap-5">
                        <div class="overflow-hidden rounded-[1.75rem] border border-slate-100 shadow-lg">
                            <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=80"
                                alt="Infraestructura de servidores empresariales" class="h-56 w-full object-cover">
                        </div>

                        <div class="overflow-hidden rounded-[1.75rem] border border-slate-100 shadow-lg">
                            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=80"
                                alt="Operación empresarial conectada a servidores cloud" class="h-56 w-full object-cover">
                        </div>
                    </div>

                    <!-- BLOQUE EXPLICATIVO -->
                    <div class="mt-8 rounded-[1.75rem] border border-slate-200 bg-slate-50 p-6">
                        <h3 class="text-lg font-bold text-slate-900">
                            ¿Cómo se define el servidor ideal para tu empresa?
                        </h3>

                        <div class="mt-4 grid sm:grid-cols-2 gap-3 text-sm text-slate-700">
                            <div class="rounded-xl border border-slate-100 bg-white px-4 py-3">
                                • Cuánta información procesa y almacena tu sistema
                            </div>

                            <div class="rounded-xl border border-slate-100 bg-white px-4 py-3">
                                • Cuántas personas lo utilizan de forma simultánea
                            </div>

                            <div class="rounded-xl border border-slate-100 bg-white px-4 py-3">
                                • Qué tan sensible o crítica es la información del negocio
                            </div>

                            <div class="rounded-xl border border-slate-100 bg-white px-4 py-3">
                                • Qué tan importante es mantener la operación disponible en todo momento
                            </div>
                        </div>
                    </div>
                    <!-- CTA NATURAL -->
                    <div
                        class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-300 rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-sm">
                        <p class="text-sm leading-7 text-slate-600">
                            El servidor adecuado no depende solo del tamaño de la empresa, sino del nivel de
                            exigencia de su operación. <span class="font-semibold text-slate-900">Si quieres,
                                podemos orientarte para identificar la opción más conveniente según tu sistema,
                                tu información y tu nivel de continuidad requerido.</span>
                        </p>

                        <div class="mt-4">
                            <a href="https://wa.me/{{ $waCloud }}?text={{ $msgCloud }}" target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 text-sm font-semibold text-[#0050b0] transition hover:text-[#01b8b6]">
                                Consultar opción recomendada para mi empresa
                                <span class="text-base">→</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- DERECHA -->
                <div class="space-y-5">

                    <!-- PLAN 1 -->
                    <article
                        class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out rounded-[2rem] border border-slate-200 bg-slate-50 p-6 shadow-sm hover:shadow-xl">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <div class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">
                                    Base
                                </div>
                                <h3 class="mt-1 text-2xl font-bold text-slate-900">
                                    Cloud Start
                                </h3>
                            </div>

                            <span
                                class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-semibold text-slate-700">
                                Inicial
                            </span>
                        </div>

                        <p class="mt-4 text-sm leading-7 text-slate-600">
                            Para empresas que necesitan alojar sistemas livianos o procesos internos con una
                            base estable, ordenada y confiable.
                        </p>

                        <ul class="mt-5 space-y-2 text-sm text-slate-700">
                            <li>• Entorno adecuado para operaciones de baja o media exigencia</li>
                            <li>• Implementación inicial del servicio</li>
                            <li>• Respaldo base para proteger la información</li>
                            <li>• Opción recomendada para empezar con infraestructura cloud</li>
                        </ul>
                    </article>

                    <!-- PLAN 2 -->
                    <article
                        class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100 relative rounded-[2rem] border-2 border-[#01d3d1] bg-gradient-to-b from-[#0050b0] to-[#0b63d1] p-7 text-white shadow-2xl">
                        <div
                            class="absolute -top-4 left-6 rounded-full bg-[#01d3d1] px-4 py-2 text-xs font-bold uppercase tracking-wider text-slate-900 shadow-lg">
                            Más solicitado
                        </div>

                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <div class="text-sm font-semibold uppercase tracking-wider text-cyan-100">
                                    Business
                                </div>
                                <h3 class="mt-1 text-2xl font-bold">
                                    Cloud Business
                                </h3>
                            </div>

                            <span
                                class="rounded-full border border-white/15 bg-white/10 px-3 py-1 text-xs font-semibold text-white">
                                Recomendado
                            </span>
                        </div>

                        <p class="mt-4 text-sm leading-7 text-blue-50">
                            Para empresas que dependen de sus sistemas todos los días y necesitan mayor
                            estabilidad, mejor respuesta y continuidad operativa más sólida.
                        </p>

                        <ul class="mt-5 space-y-2 text-sm text-blue-50">
                            <li>• Mayor capacidad para soportar crecimiento y uso constante</li>
                            <li>• Mejor nivel de disponibilidad para la operación diaria</li>
                            <li>• Respaldo ampliado y mayor cuidado de la información</li>
                            <li>• Seguimiento técnico periódico</li>
                            <li>• Ideal para ERP, bases de datos, archivos y sistemas empresariales</li>
                        </ul>
                    </article>

                    <!-- PLAN 3 -->
                    <article
                        class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-200 rounded-[2rem] border border-slate-200 bg-slate-50 p-6 shadow-sm hover:shadow-xl">
                        <div class="flex items-center justify-between gap-4">
                            <div>
                                <div class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">
                                    Crítico
                                </div>
                                <h3 class="mt-1 text-2xl font-bold text-slate-900">
                                    Cloud Enterprise
                                </h3>
                            </div>

                            <span
                                class="rounded-full border border-slate-200 bg-white px-3 py-1 text-xs font-semibold text-slate-700">
                                Avanzado
                            </span>
                        </div>

                        <p class="mt-4 text-sm leading-7 text-slate-600">
                            Para operaciones donde una caída del sistema, lentitud o pérdida de información
                            tiene impacto directo en la continuidad del negocio.
                        </p>

                        <ul class="mt-5 space-y-2 text-sm text-slate-700">
                            <li>• Infraestructura preparada para alta exigencia operativa</li>
                            <li>• Mayor continuidad para procesos críticos</li>
                            <li>• Escalabilidad según crecimiento y demanda</li>
                            <li>• Protección más rigurosa de información sensible</li>
                            <li>• Atención más cercana para entornos de mayor responsabilidad</li>
                        </ul>
                    </article>



                </div>
            </div>
        </div>
    </section>
    <!-- COMPARATIVA -->
    <section class="relative overflow-hidden bg-slate-50 py-20">
        <div class="relative max-w-7xl mx-auto px-6">
            <div class="max-w-4xl js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
                <span class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">Comparativa rápida</span>

                <h2 class="mt-3 text-3xl md:text-4xl font-bold text-slate-900">
                    ¿Qué nivel de soporte e infraestructura necesita realmente tu empresa?
                </h2>

                <p class="mt-5 text-slate-600 leading-8">
                    Esta comparativa te ayuda a identificar si tu operación puede mantenerse con soporte básico,
                    si ya necesita una infraestructura cloud más estable, o si requiere un entorno de mayor continuidad
                    para proteger sistemas, información y procesos críticos.
                </p>
            </div>

            <div class="mt-10 overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-xl">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-slate-900 text-white">
                            <tr>
                                <th class="px-6 py-5 text-left font-semibold">Criterio</th>
                                <th class="px-6 py-5 text-left font-semibold">Starter Care / Cloud Start</th>
                                <th class="px-6 py-5 text-left font-semibold bg-[#0050b0]">Business Care / Cloud Business
                                </th>
                                <th class="px-6 py-5 text-left font-semibold">Enterprise Care / Cloud Enterprise</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-slate-100">
                            <tr>
                                <td class="px-6 py-5 font-medium text-slate-900">Tipo de operación</td>
                                <td class="px-6 py-5 text-slate-600">
                                    Operación estable, con menor carga tecnológica
                                </td>
                                <td class="px-6 py-5 text-slate-600">
                                    Operación activa que depende del sistema todos los días
                                </td>
                                <td class="px-6 py-5 text-slate-600">
                                    Operación crítica donde una caída afecta directamente al negocio
                                </td>
                            </tr>

                            <tr class="bg-slate-50/70">
                                <td class="px-6 py-5 font-medium text-slate-900">Dónde puede correr tu sistema</td>
                                <td class="px-6 py-5 text-slate-600">
                                    En entorno básico o cloud inicial
                                </td>
                                <td class="px-6 py-5 text-slate-600">
                                    En cloud empresarial para mayor estabilidad y continuidad
                                </td>
                                <td class="px-6 py-5 text-slate-600">
                                    En infraestructura cloud de alta exigencia
                                </td>
                            </tr>

                            <tr>
                                <td class="px-6 py-5 font-medium text-slate-900">Cuándo conviene pasar a cloud</td>
                                <td class="px-6 py-5 text-slate-600">
                                    Cuando ya no quieres depender de una sola PC o equipo local
                                </td>
                                <td class="px-6 py-5 text-slate-600">
                                    Cuando necesitas más estabilidad sin hacer una gran inversion
                                </td>
                                <td class="px-6 py-5 text-slate-600">
                                    Cuando tu operación no puede detenerse y necesitas continuidad más robusta
                                </td>
                            </tr>

                            <tr class="bg-slate-50/70">
                                <td class="px-6 py-5 font-medium text-slate-900">Nivel de respaldo y continuidad</td>
                                <td class="px-6 py-5 text-slate-600">
                                    Protección base para operación inicial
                                </td>
                                <td class="px-6 py-5 text-slate-600">
                                    Respaldo ampliado y mejor continuidad operativa
                                </td>
                                <td class="px-6 py-5 text-slate-600">
                                    Mayor protección para información sensible y procesos críticos
                                </td>
                            </tr>

                            <tr>
                                <td class="px-6 py-5 font-medium text-slate-900">Nivel de soporte y acompañamiento</td>
                                <td class="px-6 py-5 text-slate-600">
                                    Soporte recurrente para incidencias y operación diaria
                                </td>
                                <td class="px-6 py-5 text-slate-600">
                                    Soporte preventivo con mayor control sobre la infraestructura
                                </td>
                                <td class="px-6 py-5 text-slate-600">
                                    Soporte ampliado con cobertura más completa y prioritaria
                                </td>
                            </tr>

                            <tr class="bg-slate-50/70">
                                <td class="px-6 py-5 font-medium text-slate-900">Perfil de empresa</td>
                                <td class="px-6 py-5 text-slate-600">
                                    Pequeñas empresas u oficinas con operación estable
                                </td>
                                <td class="px-6 py-5 text-slate-600">
                                    Empresas con varias áreas, usuarios constantes y mayor dependencia tecnológica
                                </td>
                                <td class="px-6 py-5 text-slate-600">
                                    Empresas con procesos críticos, crecimiento sostenido o alta exigencia operativa
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- PAQUETES EMPRESARIALES -->
    <section id="planes-empresariales" class="relative overflow-hidden bg-white py-20">
        @php
            $waPack = '59164347465';

            $msgPack1 = urlencode("Hola, estoy interesado en el paquete empresarial Operación Conectada.

Me gustaría recibir información sobre:
• Soporte TI mensualizado
• Servidores en la nube
• Beneficio por combinar 2 servicios

¿Podrían brindarme más detalles y una cotización?");

            $msgPack2 = urlencode("Hola, estoy interesado en el paquete empresarial Operación Protegida.

Me gustaría recibir información sobre:
• Soporte TI mensualizado
• Ciberseguridad
• Servidores en la nube
• Beneficio por combinar 3 servicios

¿Podrían brindarme más detalles y una cotización?");

            $msgPack3 = urlencode("Hola, estoy interesado en el paquete empresarial Infraestructura Integral.

Me gustaría recibir información sobre:
• Soporte TI mensualizado
• Comunicaciones empresariales
• Videovigilancia y control de acceso
• Servidores en la nube o ciberseguridad
• Beneficio por combinar 4 o más servicios

¿Podrían brindarme más detalles y una cotización?");
        @endphp

        <div class="absolute top-0 left-0 h-72 w-72 rounded-full bg-[#01d3d1]/10 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 h-72 w-72 rounded-full bg-[#0050b0]/10 blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-[1.1fr_.9fr] gap-10 items-start">

                <!-- IZQUIERDA -->
                <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
                    <span class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">
                        Paquetes empresariales
                    </span>

                    <h2 class="mt-3 text-3xl md:text-4xl font-bold text-slate-900">
                        Combina servicios y obtén mejores condiciones para tu empresa
                    </h2>

                    <p class="mt-5 max-w-3xl text-slate-600 leading-8">
                        Estos paquetes están pensados para empresas que necesitan integrar varias soluciones
                        en una sola propuesta. Mientras más servicios combines, mejores beneficios puedes obtener
                        y mayor valor recibe tu operación.
                    </p>

                    <div class="mt-10 space-y-5">

                        <!-- PAQUETE 1 -->
                        <a href="https://wa.me/{{ $waPack }}?text={{ $msgPack1 }}" target="_blank"
                            rel="noopener noreferrer"
                            class="group block overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                            <div class="flex flex-col gap-5 md:flex-row md:items-start md:justify-between">
                                <div class="min-w-0">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span
                                            class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">
                                            2 servicios
                                        </span>
                                        <span
                                            class="inline-flex rounded-full bg-[#0050b0]/10 px-3 py-1 text-xs font-semibold text-[#0050b0]">
                                            Ideal para empezar
                                        </span>
                                    </div>

                                    <h3 class="mt-4 text-xl md:text-2xl font-bold text-slate-900">
                                        Operación Conectada
                                    </h3>

                                    <p class="mt-3 text-sm leading-7 text-slate-600">
                                        Para empresas que buscan estabilidad operativa sin invertir desde el inicio
                                        en una infraestructura propia.
                                    </p>

                                    <div class="mt-4 flex flex-wrap gap-2">
                                        <span
                                            class="inline-flex rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-medium text-slate-700">Soporte
                                            TI</span>
                                        <span
                                            class="inline-flex rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-medium text-slate-700">Servidores
                                            en la nube</span>
                                    </div>
                                </div>

                                <div class="shrink-0">
                                    <div
                                        class="rounded-[1.5rem] bg-slate-900 px-5 py-4 text-center shadow-lg min-w-[120px]">
                                        <div class="text-xs font-semibold uppercase tracking-wider text-slate-300">
                                            Beneficio
                                        </div>
                                        <div class="mt-1 text-3xl font-bold text-white">
                                            10%
                                        </div>
                                        <div class="text-xs text-slate-300">
                                            de descuento
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- PAQUETE 2 -->
                        <a href="https://wa.me/{{ $waPack }}?text={{ $msgPack2 }}" target="_blank"
                            rel="noopener noreferrer"
                            class="group block overflow-hidden rounded-[2rem] border-2 border-[#01d3d1] bg-gradient-to-br from-white to-cyan-50 p-6 shadow-xl transition duration-300 hover:-translate-y-1 hover:shadow-2xl">
                            <div class="flex flex-col gap-5 md:flex-row md:items-start md:justify-between">
                                <div class="min-w-0">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span
                                            class="inline-flex rounded-full bg-white px-3 py-1 text-xs font-semibold text-slate-700 border border-cyan-100">
                                            3 servicios
                                        </span>
                                        <span
                                            class="inline-flex rounded-full bg-[#0050b0] px-3 py-1 text-xs font-semibold text-white">
                                            Mejor equilibrio
                                        </span>
                                    </div>

                                    <h3 class="mt-4 text-xl md:text-2xl font-bold text-slate-900">
                                        Operación Protegida
                                    </h3>

                                    <p class="mt-3 text-sm leading-7 text-slate-600">
                                        Para empresas que necesitan operar con más estabilidad, proteger su información
                                        y reducir riesgos en el día a día.
                                    </p>

                                    <div class="mt-4 flex flex-wrap gap-2">
                                        <span
                                            class="inline-flex rounded-full border border-cyan-100 bg-white px-3 py-1 text-xs font-medium text-slate-700">Soporte
                                            TI</span>
                                        <span
                                            class="inline-flex rounded-full border border-cyan-100 bg-white px-3 py-1 text-xs font-medium text-slate-700">Ciberseguridad</span>
                                        <span
                                            class="inline-flex rounded-full border border-cyan-100 bg-white px-3 py-1 text-xs font-medium text-slate-700">Cloud</span>
                                    </div>
                                </div>

                                <div class="shrink-0">
                                    <div
                                        class="rounded-[1.5rem] bg-[#0050b0] px-5 py-4 text-center shadow-lg min-w-[140px]">
                                        <div class="text-xs font-semibold uppercase tracking-wider text-cyan-100">
                                            Beneficio
                                        </div>
                                        <div class="mt-1 text-3xl font-bold text-white">
                                            15%
                                        </div>
                                        <div class="text-xs text-cyan-100">
                                            de descuento
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <!-- PAQUETE 3 -->
                        <a href="https://wa.me/{{ $waPack }}?text={{ $msgPack3 }}" target="_blank"
                            rel="noopener noreferrer"
                            class="group block overflow-hidden rounded-[2rem] border border-slate-200 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                            <div class="flex flex-col gap-5 md:flex-row md:items-start md:justify-between">
                                <div class="min-w-0">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span
                                            class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">
                                            4 o más servicios
                                        </span>
                                        <span
                                            class="inline-flex rounded-full bg-[#0050b0]/10 px-3 py-1 text-xs font-semibold text-[#0050b0]">
                                            Solución integral
                                        </span>
                                    </div>

                                    <h3 class="mt-4 text-xl md:text-2xl font-bold text-slate-900">
                                        Infraestructura Integral
                                    </h3>

                                    <p class="mt-3 text-sm leading-7 text-slate-600">
                                        Para empresas que quieren una solución más completa, centralizada y con
                                        mejores condiciones al integrar varias áreas de su operación.
                                    </p>

                                    <div class="mt-4 flex flex-wrap gap-2">
                                        <span
                                            class="inline-flex rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-medium text-slate-700">Soporte
                                            TI</span>
                                        <span
                                            class="inline-flex rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-medium text-slate-700">Comunicaciones</span>
                                        <span
                                            class="inline-flex rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-medium text-slate-700">Videovigilancia</span>
                                        <span
                                            class="inline-flex rounded-full border border-slate-200 bg-slate-50 px-3 py-1 text-xs font-medium text-slate-700">Cloud
                                            / Seguridad</span>
                                    </div>
                                </div>

                                <div class="shrink-0">
                                    <div
                                        class="rounded-[1.5rem] bg-slate-900 px-5 py-4 text-center shadow-lg min-w-[140px]">
                                        <div class="text-xs font-semibold uppercase tracking-wider text-slate-300">
                                            Beneficio
                                        </div>
                                        <div class="mt-1 text-2xl font-bold text-white leading-tight">
                                            Hasta 20%
                                        </div>
                                        <div class="text-xs text-slate-300">
                                            de descuento
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

                <!-- DERECHA -->
                <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100">
                    <div
                        class="overflow-hidden rounded-[2rem] bg-gradient-to-br from-[#0050b0] via-[#0b63d1] to-slate-900 p-8 text-white shadow-2xl">
                        <div
                            class="inline-flex rounded-full border border-white/15 bg-white/10 px-4 py-1.5 text-xs font-semibold uppercase tracking-wider text-cyan-100">
                            Beneficios por combinación
                        </div>

                        <h3 class="mt-5 text-3xl font-bold leading-tight">
                            Más servicios integrados, más valor para tu operación
                        </h3>

                        <p class="mt-4 text-sm leading-7 text-blue-50">
                            Cuando una empresa integra varias soluciones en una misma propuesta,
                            mejora la coordinación, optimiza costos y obtiene una atención más alineada
                            a su operación real.
                        </p>

                        <div class="mt-8 space-y-4">
                            <div class="rounded-[1.5rem] border border-white/10 bg-white/10 p-4 backdrop-blur">
                                <div class="text-sm font-semibold text-white">Mejor integración</div>
                                <p class="mt-1 text-sm leading-6 text-blue-100">
                                    Los servicios funcionan mejor cuando están pensados como una sola solución.
                                </p>
                            </div>

                            <div class="rounded-[1.5rem] border border-white/10 bg-white/10 p-4 backdrop-blur">
                                <div class="text-sm font-semibold text-white">Menos fricción operativa</div>
                                <p class="mt-1 text-sm leading-6 text-blue-100">
                                    Centralizar atención y soluciones simplifica la gestión diaria.
                                </p>
                            </div>

                            <div class="rounded-[1.5rem] border border-white/10 bg-white/10 p-4 backdrop-blur">
                                <div class="text-sm font-semibold text-white">Mejores condiciones</div>
                                <p class="mt-1 text-sm leading-6 text-blue-100">
                                    Al combinar servicios, accedes a beneficios y descuentos progresivos.
                                </p>
                            </div>
                        </div>

                        <div class="mt-8 border-t border-white/10 pt-6">
                            <a href="https://wa.me/{{ $waPack }}?text={{ urlencode('Hola, quiero información sobre los paquetes empresariales y los beneficios por combinar servicios.') }}"
                                target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center gap-2 text-sm font-semibold text-white transition hover:text-[#01d3d1]">
                                Consultar paquetes empresariales
                                <span class="text-base">→</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
<!-- CTA FINAL -->
<section class="bg-white py-1 pb-20 ">
    <div class="max-w-7xl mx-auto px-6">
        <div
            class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out relative overflow-hidden rounded-[2.5rem] border border-slate-200 bg-slate-950 px-8 py-10 md:px-10 md:py-12 lg:px-14 lg:py-14 shadow-[0_24px_80px_rgba(15,23,42,0.16)]">

            <!-- FONDO DECORATIVO -->
            <div class="absolute inset-0">
                <div class="absolute -top-20 -left-16 h-64 w-64 rounded-full bg-[#01d3d1]/10 blur-3xl"></div>
                <div class="absolute -bottom-24 -right-10 h-72 w-72 rounded-full bg-[#0050b0]/20 blur-3xl"></div>
                <div class="absolute inset-0 opacity-[0.05]"
                    style="background-image: linear-gradient(to right, rgba(255,255,255,.18) 1px, transparent 1px), linear-gradient(to bottom, rgba(255,255,255,.18) 1px, transparent 1px); background-size: 34px 34px;">
                </div>
                <div class="absolute inset-0 bg-[linear-gradient(135deg,rgba(2,6,23,0.92)_0%,rgba(15,23,42,0.96)_45%,rgba(2,6,23,0.98)_100%)]"></div>
            </div>

            <div class="relative grid lg:grid-cols-[1.15fr_.85fr] gap-10 items-center">

                <!-- TEXTO -->
                <div>
                    <span
                        class="inline-flex items-center rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-[11px] font-semibold uppercase tracking-[0.22em] text-cyan-100">
                        Solución a medida
                    </span>

                    <h2 class="mt-5 max-w-3xl text-3xl font-bold leading-tight text-white md:text-4xl lg:text-[2.7rem]">
                        Si tu empresa necesita algo más específico, diseñamos una propuesta según tu operación real
                    </h2>

                    <p class="mt-5 max-w-2xl text-base leading-8 text-slate-300">
                        No todas las empresas encajan en una sola estructura. Podemos ayudarte a definir una solución
                        según tu nivel de soporte, infraestructura, continuidad operativa, seguridad y crecimiento.
                    </p>

                    <!-- MINI PUNTOS -->
                    <div class="mt-8 grid sm:grid-cols-3 gap-3">
                        <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-4 backdrop-blur-sm">
                            <div class="text-sm font-semibold text-white">Más claridad</div>
                            <p class="mt-1 text-sm leading-6 text-slate-300">
                                Evaluamos qué necesitas realmente.
                            </p>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-4 backdrop-blur-sm">
                            <div class="text-sm font-semibold text-white">Más precisión</div>
                            <p class="mt-1 text-sm leading-6 text-slate-300">
                                Ajustamos la propuesta a tu operación.
                            </p>
                        </div>

                        <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-4 backdrop-blur-sm">
                            <div class="text-sm font-semibold text-white">Más continuidad</div>
                            <p class="mt-1 text-sm leading-6 text-slate-300">
                                Priorizamos estabilidad y crecimiento.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- ACCIONES -->
                <div class="lg:pl-6">
                    <div class="rounded-[2rem] border border-white/10 bg-white/5 p-5 md:p-6 backdrop-blur-sm shadow-[0_10px_40px_rgba(0,0,0,0.18)]">
                        <div class="text-sm font-semibold uppercase tracking-[0.18em] text-cyan-100">
                            Siguiente paso
                        </div>

                        <p class="mt-3 text-sm leading-7 text-slate-300">
                            Cuéntanos qué necesita tu empresa y te orientamos con una propuesta clara, escalable y alineada a tu operación.
                        </p>

                        <div class="mt-6 space-y-3">
                            <a href="{{ route('web.contacto') }}"
                                class="inline-flex w-full items-center justify-center rounded-2xl bg-[#01d3d1] px-6 py-3.5 font-semibold text-slate-950 transition hover:-translate-y-0.5 hover:shadow-[0_14px_30px_rgba(1,211,209,0.22)]">
                                Solicitar propuesta personalizada
                            </a>

                            <a href="{{ route('web.servicios') }}"
                                class="inline-flex w-full items-center justify-center rounded-2xl border border-white/15 bg-transparent px-6 py-3.5 font-semibold text-white transition hover:bg-white hover:text-slate-950">
                                Explorar todos los servicios
                            </a>
                        </div>

                        <div class="mt-5 border-t border-white/10 pt-4">
                            <p class="text-xs leading-6 text-slate-400">
                                Propuestas según infraestructura, cantidad de usuarios, nivel de criticidad y necesidades de crecimiento.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fadeItems = document.querySelectorAll('.js-fade');

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

            fadeItems.forEach((item) => observer.observe(item));
        });
    </script>

@endsection
