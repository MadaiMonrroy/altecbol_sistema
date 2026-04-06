@extends('layouts.web')

@section('title', 'Casos de Éxito | ALTECBOL')

@section('content')

@php
    $casos = [
        [
            'slug' => 'vencorp-call-center-tigo',
            'cliente' => 'Vencorp',
            'titulo' => 'Call Center Tigo',
            'categoria' => 'Enterprise Communications',
            'impacto' => 'Escalabilidad y automatización',
            'descripcion' => 'Implementación de un Data Center completo y configuración de Troncal SIP para fortalecer la operación de atención al cliente.',
            'enfoque' => 'Mayor capacidad de atención, crecimiento ordenado y mejor estabilidad operativa.',
            'tags' => ['Data Center', 'Troncal SIP', 'Call Center'],
            'imagen' => asset('websitio/img/project/vencorp.png'),
            'logo' => asset('websitio/img/vencorp.png'),
        ],
        [
            'slug' => 'imex-certificacion-oea',
            'cliente' => 'IMEX',
            'titulo' => 'Certificación OEA',
            'categoria' => 'Cybersecurity',
            'impacto' => 'Trazabilidad y continuidad',
            'descripcion' => 'Controles y respaldos para auditorías y trazabilidad, apoyando la aprobación del examen de certificación OEA.',
            'enfoque' => 'Fortalecer cumplimiento, continuidad operativa y soporte documental confiable.',
            'tags' => ['Cumplimiento', 'Respaldos', 'Auditoría'],
            'imagen' => asset('websitio/img/project/imexp.png'),
            'logo' => asset('websitio/img/imex.png'),
        ],
        [
            'slug' => 'mercomex-data-center',
            'cliente' => 'Mercomex',
            'titulo' => 'Data Center',
            'categoria' => 'Cloud & Data Center',
            'impacto' => 'Confiabilidad y escalabilidad',
            'descripcion' => 'Implementación de un Data Center estable y escalable con participación en procesos de certificación.',
            'enfoque' => 'Base tecnológica sólida para crecimiento, virtualización y mayor disponibilidad.',
            'tags' => ['Infraestructura', 'Virtualización', 'Escalabilidad'],
            'imagen' => asset('websitio/img/project/mercomexp.png'),
            'logo' => asset('websitio/img/mercomex.png'),
        ],
        [
            'slug' => 'grupo-lucky-red-corporativa',
            'cliente' => 'Grupo Lucky',
            'titulo' => 'Red Corporativa Segura',
            'categoria' => 'Cybersecurity',
            'impacto' => 'Multisede y control total',
            'descripcion' => 'Segmentación de red, virtualización de servicios, red mesh corporativa y firewalls de nueva generación para una operación conectada y segura.',
            'enfoque' => 'Conectar sucursales, centralizar servicios y reforzar seguridad empresarial.',
            'tags' => ['Firewall', 'Mesh', 'VPN Multisede'],
            'imagen' => asset('websitio/img/project/luckyp.png'),
            'logo' => asset('websitio/img/lucky.png'),
        ],
        [
            'slug' => 'colegio-medico-scz-red-segura',
            'cliente' => 'Colegio Médico SCZ',
            'titulo' => 'Red Segura y Protegida',
            'categoria' => 'Cybersecurity',
            'impacto' => 'Protección y estabilidad',
            'descripcion' => 'Implementación de políticas de filtrado y control de tráfico junto con firewalls inteligentes para garantizar continuidad operativa.',
            'enfoque' => 'Más seguridad perimetral, navegación controlada y mejor estabilidad del servicio.',
            'tags' => ['Filtrado', 'Firewall', 'Estabilidad'],
            'imagen' => asset('websitio/img/project/medicop.png'),
            'logo' => asset('websitio/img/medico.png'),
        ],
        [
            'slug' => 'clinica-sirani-help-desk',
            'cliente' => 'Clínica Sirani',
            'titulo' => 'Help Desk y Soporte TI',
            'categoria' => 'Managed IT Services',
            'impacto' => 'Continuidad y soporte preventivo',
            'descripcion' => 'Soporte técnico preventivo en computadoras y servidores para reducir tiempos de inactividad y mantener una operación más estable.',
            'enfoque' => 'Prevenir fallas, responder oportunamente y sostener la continuidad operativa.',
            'tags' => ['Help Desk', 'Soporte TI', 'Servidores'],
            'imagen' => asset('websitio/img/project/siranip.png'),
            'logo' => asset('websitio/img/sirani.png'),
        ],
        [
            'slug' => 'clifabol-atencion-automatica',
            'cliente' => 'Clifabol',
            'titulo' => 'Atención Automática con IVR',
            'categoria' => 'Enterprise Communications',
            'impacto' => 'Atención ordenada y trazable',
            'descripcion' => 'Implementación de IVR y derivación inteligente para optimizar la atención, mejorar el flujo de llamadas y tener mayor control operativo.',
            'enfoque' => 'Canalizar mejor consultas, reducir fricción y profesionalizar la atención telefónica.',
            'tags' => ['IVR', 'Atención', 'Trazabilidad'],
            'imagen' => asset('websitio/img/project/clifabolp.png'),
            'logo' => asset('websitio/img/clifabol.png'),
        ],
        [
            'slug' => 'zyra-bpo-call-center',
            'cliente' => 'Zyra BPO',
            'titulo' => 'Call Center y Data Center',
            'categoria' => 'Cloud & Data Center',
            'impacto' => 'Capacidad y escalabilidad',
            'descripcion' => 'Implementación de infraestructura escalable con Data Center y Troncal SIP para soportar una operación de atención al cliente de alto volumen.',
            'enfoque' => 'Escalar la operación del BPO con una plataforma más sólida y preparada para crecer.',
            'tags' => ['BPO', 'Troncal SIP', 'Data Center'],
            'imagen' => asset('websitio/img/project/zyrap.png'),
            'logo' => asset('websitio/img/zyra.png'),
        ],
        [
            'slug' => 'iga-comunicaciones-seguridad',
            'cliente' => 'Instituto IGA',
            'titulo' => 'Comunicaciones y Seguridad',
            'categoria' => 'Enterprise Communications',
            'impacto' => 'Atención y videovigilancia',
            'descripcion' => 'Implementación de IVR y actualización del sistema interno de videovigilancia para fortalecer atención, comunicación y control visual.',
            'enfoque' => 'Modernizar la atención telefónica y reforzar la supervisión de espacios internos.',
            'tags' => ['IVR', 'CCTV', 'Actualización'],
            'imagen' => asset('websitio/img/project/igap.png'),
            'logo' => asset('websitio/img/iga.png'),
        ],
    ];

    $destacado = $casos[0];

    $resumenes = [
        [
            'titulo' => 'Data Center',
            'texto' => 'Infraestructura orientada a disponibilidad, virtualización, crecimiento y continuidad operativa.',
        ],
        [
            'titulo' => 'Cybersecurity',
            'texto' => 'Firewalls, filtrado, segmentación y control de tráfico para entornos empresariales más protegidos.',
        ],
        [
            'titulo' => 'Comunicaciones',
            'texto' => 'Telefonía IP, IVR, troncales SIP y soluciones para atención empresarial más ordenada y escalable.',
        ],
    ];
@endphp


<section class="relative overflow-hidden bg-slate-950 pt-11">
    <div class="absolute inset-0">
        <img
            src="https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1600&q=80"
            alt="Casos de éxito ALTECBOL"
            class="h-full w-full object-cover opacity-20"
        >
    </div>

    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(1,211,209,0.16),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(0,80,176,0.32),_transparent_35%),linear-gradient(to_right,_rgba(2,6,23,0.96),_rgba(0,80,176,0.88),_rgba(2,6,23,0.96))]"></div>

    <div class="relative max-w-7xl mx-auto px-6 py-20 lg:py-24">
        <div class="max-w-4xl js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
            <span class="inline-flex items-center rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm text-white/90 backdrop-blur">
                Casos de Éxito ALTECBOL
            </span>

            <h1 class="mt-6 text-4xl md:text-5xl font-bold leading-tight text-white">
                Proyectos que demuestran
                <span class="text-[#01d3d1]">continuidad, seguridad y crecimiento real</span>
            </h1>

            <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-200">
                Más que implementar tecnología, acompañamos a empresas en retos concretos:
                comunicaciones, data center, ciberseguridad, trazabilidad, soporte y expansión operativa.
            </p>
        </div>
    </div>

    <div class="relative -mt-10">
        <svg viewBox="0 0 1440 120" class="h-20 w-full fill-white" preserveAspectRatio="none">
            <path d="M0,96L80,85.3C160,75,320,53,480,48C640,43,800,53,960,64C1120,75,1280,85,1360,90.7L1440,96L1440,120L0,120Z"></path>
        </svg>
    </div>
</section>


<section class="relative overflow-hidden bg-white py-16">
    <div class="absolute -top-12 right-10 h-44 w-44 rounded-full bg-[#01d3d1]/10 blur-3xl transition-all duration-500 hover:scale-110"></div>
    <div class="absolute bottom-0 left-0 h-52 w-52 rounded-full bg-[#0050b0]/8 blur-3xl transition-all duration-500 hover:scale-110"></div>

    <div class="relative max-w-7xl mx-auto px-6">
        <a href="{{ route('web.casos.show', $destacado['slug']) }}"
           class="group grid overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-[0_20px_55px_rgba(15,23,42,0.09)] transition-all duration-500 hover:-translate-y-1 hover:shadow-[0_28px_70px_rgba(15,23,42,0.12)] lg:grid-cols-[1.08fr_.92fr]">

            <div class="relative min-h-[360px] overflow-hidden">
                <img
                    src="{{ $destacado['imagen'] }}"
                    alt="{{ $destacado['cliente'] }}"
                    class="h-full w-full object-cover transition duration-700 group-hover:scale-105"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/65 via-slate-950/10 to-transparent"></div>

                <div class="absolute left-6 top-6">
                    <span class="inline-flex items-center rounded-full border border-white/60 bg-white/90 px-3 py-1 text-xs font-semibold tracking-wide text-[#0050b0] shadow-sm backdrop-blur">
                        Caso destacado
                    </span>
                </div>

                <div class="absolute bottom-6 left-6 right-6">
                    <div class="flex flex-wrap gap-2">
                        @foreach($destacado['tags'] as $tag)
                            <span class="rounded-full border border-white/15 bg-white/10 px-3 py-1 text-xs font-medium text-white backdrop-blur">
                                {{ $tag }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="relative overflow-hidden bg-[linear-gradient(180deg,#0f172a_0%,#111827_58%,#0b1120_100%)] p-8 text-white lg:p-10">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(1,211,209,0.16),transparent_26%),radial-gradient(circle_at_bottom_left,rgba(0,80,176,0.18),transparent_30%)]"></div>
                <div class="absolute top-0 left-0 h-px w-full bg-gradient-to-r from-transparent via-cyan-300/30 to-transparent"></div>

                <div class="relative z-10 text-sm font-semibold uppercase tracking-wider text-cyan-200">
                    {{ $destacado['cliente'] }}
                </div>

                <h2 class="relative z-10 mt-3 text-3xl font-bold leading-tight">
                    {{ $destacado['titulo'] }}
                </h2>

                <p class="relative z-10 mt-5 text-slate-200 leading-8">
                    {{ $destacado['descripcion'] }}
                </p>

                <div class="relative z-10 mt-6 rounded-[1.5rem] border border-cyan-400/15 bg-cyan-400/[0.06] p-5">
                    <div class="text-xs uppercase tracking-wider text-cyan-200">Enfoque</div>
                    <div class="mt-2 text-base leading-7 text-white/95">{{ $destacado['enfoque'] }}</div>
                </div>

                <div class="relative z-10 mt-8 grid gap-4 sm:grid-cols-2">
                    <div class="rounded-[1.5rem] border border-white/10 bg-white/5 p-5 transition-all duration-300 group-hover:bg-white/10">
                        <div class="text-xs uppercase tracking-wider text-cyan-100">Solución</div>
                        <div class="mt-2 text-lg font-semibold">{{ $destacado['categoria'] }}</div>
                    </div>

                    <div class="rounded-[1.5rem] border border-white/10 bg-white/5 p-5 transition-all duration-300 group-hover:bg-white/10">
                        <div class="text-xs uppercase tracking-wider text-cyan-100">Impacto</div>
                        <div class="mt-2 text-lg font-semibold">{{ $destacado['impacto'] }}</div>
                    </div>
                </div>

                <div class="relative z-10 mt-8 inline-flex items-center gap-2 font-semibold text-white">
                    Ver caso completo
                    <span class="transition group-hover:translate-x-1">→</span>
                </div>
            </div>
        </a>
    </div>
</section>

<section class="relative overflow-hidden bg-[linear-gradient(180deg,#f8fafc_0%,#ffffff_38%,#f8fafc_100%)] py-20">
    <div class="absolute top-12 left-0 h-72 w-72 rounded-full bg-[#01d3d1]/10 blur-3xl"></div>
    <div class="absolute bottom-0 right-0 h-80 w-80 rounded-full bg-[#0050b0]/10 blur-3xl"></div>
    <div class="absolute inset-0 opacity-[0.04]"
        style="background-image:
            linear-gradient(rgba(15,23,42,0.08) 1px, transparent 1px),
            linear-gradient(90deg, rgba(15,23,42,0.08) 1px, transparent 1px);
            background-size: 40px 40px;">
    </div>

    <div class="relative max-w-7xl mx-auto px-6">
        <div class="max-w-3xl js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
            <span class="inline-flex items-center rounded-full border border-[#0050b0]/10 bg-white px-4 py-1.5 text-sm font-semibold uppercase tracking-[0.18em] text-[#0050b0] shadow-sm">
                Casos seleccionados
            </span>

            <h2 class="mt-4 text-3xl md:text-4xl font-bold text-slate-900">
                Empresas que confiaron en ALTECBOL para resolver retos reales
            </h2>

            <p class="mt-5 text-slate-600 leading-8">
                Cada proyecto responde a una necesidad concreta: crecimiento, seguridad, cumplimiento,
                atención al cliente o continuidad. La tecnología se adapta a la operación real del negocio.
            </p>
        </div>

        <div class="mt-12 grid gap-8 md:grid-cols-2 xl:grid-cols-3">
            @foreach($casos as $index => $caso)
                <article class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-{{ ($index % 3) * 100 }}">
                    <a href="{{ route('web.casos.show', $caso['slug']) }}"
                       class="group relative block h-full rounded-[2rem] border border-slate-200/90 bg-white shadow-[0_16px_40px_rgba(15,23,42,0.07)] transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_24px_60px_rgba(15,23,42,0.12)]">

                        <!-- brillo sutil -->
                        <div class="pointer-events-none absolute inset-0 rounded-[2rem] opacity-0 transition duration-500 group-hover:opacity-100 bg-[radial-gradient(circle_at_top_right,rgba(1,211,209,0.08),transparent_28%),radial-gradient(circle_at_bottom_left,rgba(0,80,176,0.08),transparent_30%)]"></div>

                        <!-- borde fino hover -->
                        <div class="pointer-events-none absolute inset-0 rounded-[2rem] ring-1 ring-inset ring-transparent transition duration-500 group-hover:ring-[#01d3d1]/20"></div>

                        <!-- wrapper real para evitar esquinas cuadradas -->
                        <div class="relative overflow-hidden rounded-[2rem]">
                            <!-- imagen -->
                            <div class="relative overflow-hidden rounded-t-[2rem]">
                                <img
                                    src="{{ $caso['imagen'] }}"
                                    alt="{{ $caso['cliente'] }}"
                                    class="h-64 w-full rounded-t-[2rem] object-cover transform-gpu transition duration-700 ease-out group-hover:scale-[1.06]"
                                >

                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/55 via-slate-950/10 to-transparent"></div>

                                <!-- categoria discreta -->
                                <div class="absolute right-5 top-5">
                                    <span class="inline-flex items-center rounded-full border border-white/60 bg-white/88 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.16em] text-[#01d3d1] shadow-sm backdrop-blur">
                                        {{ $caso['categoria'] }}
                                    </span>
                                </div>
                            </div>

                            <!-- logo flotante -->
                            <div class="pointer-events-none absolute left-6 top-[232px] z-20">
                                <div class="flex h-[72px] w-[72px] items-center justify-center rounded-[1.35rem] border border-white/80 bg-white/95  shadow-[0_14px_34px_rgba(15,23,42,0.16)] backdrop-blur transition-all duration-500 group-hover:-translate-y-1 group-hover:scale-[1.04]">
                                    <img
                                        src="{{ $caso['logo'] }}"
                                        alt="Logo {{ $caso['cliente'] }}"
                                        class=" object-contain"
                                    >
                                </div>
                            </div>

                            <!-- contenido -->
                            <div class="relative px-7 pb-7 pt-12">
                                <div class="text-sm font-semibold uppercase tracking-[0.16em] text-[#0050b0]">
                                    {{ $caso['cliente'] }}
                                </div>

                                <h3 class="mt-3 text-[1.95rem] font-bold leading-tight text-slate-900 transition duration-300 group-hover:text-[#0050b0]">
                                    {{ $caso['titulo'] }}
                                </h3>

                                <p class="mt-4 text-sm leading-8 text-slate-600">
                                    {{ $caso['descripcion'] }}
                                </p>

                                <div class="mt-5 rounded-[1.35rem] border border-slate-200 bg-[linear-gradient(180deg,#f8fafc_0%,#f1f5f9_100%)] p-4 transition-all duration-300 group-hover:border-[#01d3d1]/20 group-hover:bg-cyan-50/40">
                                    <div class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-500">
                                        Impacto
                                    </div>
                                    <div class="mt-2 text-sm font-medium leading-6 text-slate-800">
                                        {{ $caso['impacto'] }}
                                    </div>
                                </div>

                                <div class="mt-5 flex flex-wrap gap-2">
                                    @foreach($caso['tags'] as $tag)
                                        <span class="rounded-full border border-slate-200 bg-white px-3 py-1.5 text-[11px] font-semibold uppercase tracking-[0.08em] text-slate-600 transition-all duration-300 group-hover:border-[#0050b0]/10 group-hover:bg-slate-50">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
                                </div>

                                <div class="mt-6 inline-flex items-center gap-2 font-semibold text-[#0050b0]">
                                    Explorar caso
                                    <span class="transition duration-300 group-hover:translate-x-1">→</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="relative overflow-hidden bg-white py-20">
    <div class="absolute top-10 right-[8%] h-44 w-44 rounded-full bg-[#01d3d1]/10 blur-3xl transition-all duration-500 hover:scale-110"></div>
    <div class="absolute bottom-0 left-[6%] h-52 w-52 rounded-full bg-[#0050b0]/8 blur-3xl transition-all duration-500 hover:scale-110"></div>

    <div class="relative max-w-7xl mx-auto px-6">
        <div class="grid gap-6 md:grid-cols-3">
            @foreach($resumenes as $index => $item)
                <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-{{ $index * 100 }} group rounded-[1.75rem] border border-slate-200 bg-[linear-gradient(180deg,#ffffff_0%,#f8fafc_100%)] p-7 shadow-[0_10px_28px_rgba(15,23,42,0.05)] transition-all duration-500 hover:-translate-y-1 hover:border-[#01d3d1]/20 hover:shadow-[0_18px_38px_rgba(15,23,42,0.08)]">
                    <div class="flex items-center gap-3">
                        <div class="h-3 w-3 rounded-full bg-[#01d3d1] shadow-[0_0_0_6px_rgba(1,211,209,0.14)] transition-all duration-300 group-hover:scale-110"></div>
                        <div class="text-2xl md:text-3xl font-bold text-[#0050b0]">{{ $item['titulo'] }}</div>
                    </div>

                    <p class="mt-4 text-slate-600 leading-7">
                        {{ $item['texto'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="relative overflow-hidden">
    
    <div class="relative max-w-7xl mx-auto px-6 pb-20">
        <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out overflow-hidden rounded-[2rem] border border-slate-200/80 bg-white p-10 lg:p-14 shadow-[0_20px_60px_rgba(15,23,42,0.08)]">
            <div class="grid lg:grid-cols-2 gap-8 items-center">
                <div class="max-w-2xl">
                    <span class="inline-flex items-center rounded-full border border-[#01d3d1]/20 bg-[#01d3d1]/10 px-4 py-1.5 text-sm font-semibold uppercase tracking-[0.18em] text-[#0050b0]">
                        Tu proyecto puede ser el siguiente
                    </span>

                    <h2 class="mt-4 text-3xl md:text-4xl font-bold tracking-tight text-slate-900">
                        Diseñemos una solución alineada a la realidad de tu empresa
                    </h2>

                    <p class="mt-4 leading-8 text-slate-600">
                        Si necesitas infraestructura, seguridad, soporte o comunicaciones empresariales,
                        podemos ayudarte a convertir un reto operativo en una solución clara, escalable y bien implementada.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 lg:justify-end">
                    <a href="{{ route('web.contacto') }}"
                       class="inline-flex items-center justify-center rounded-2xl bg-slate-900 px-6 py-3.5 font-semibold text-white shadow-lg shadow-slate-900/10 transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#0050b0]">
                        Quiero una propuesta
                    </a>

                    <a href="{{ route('web.servicios') }}"
                       class="inline-flex items-center justify-center rounded-2xl border border-slate-300 bg-white px-6 py-3.5 font-semibold text-slate-700 transition-all duration-300 hover:-translate-y-0.5 hover:border-[#0050b0]/30 hover:text-[#0050b0] hover:shadow-md">
                        Ver servicios
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
    }, { threshold: 0.12 });

    fadeItems.forEach((item) => observer.observe(item));
});
</script>

@endsection