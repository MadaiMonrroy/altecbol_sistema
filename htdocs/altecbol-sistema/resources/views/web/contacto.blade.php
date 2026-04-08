@extends('layouts.web')

@section('title', 'Contacto | ALTECBOL')

@section('content')

<section class="relative overflow-hidden bg-slate-950">
    <div class="absolute inset-0">
        <img
            src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1600&q=80"
            alt="Contacto ALTECBOL"
            class="h-full w-full object-cover opacity-20"
        >
    </div>

    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(1,211,209,0.12),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(0,80,176,0.22),_transparent_35%),linear-gradient(to_right,_rgba(2,6,23,0.97),_rgba(0,80,176,0.88),_rgba(2,6,23,0.97))]"></div>

    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute -left-24 top-10 h-56 w-56 rounded-full bg-cyan-400/10 blur-3xl"></div>
        <div class="absolute right-0 top-0 h-72 w-72 rounded-full bg-blue-500/10 blur-3xl"></div>
        <div class="absolute bottom-0 left-1/3 h-64 w-64 rounded-full bg-sky-500/10 blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6 py-10 md:py-4 lg:py-12 ">
        <div class="max-w-4xl js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out pt-20 md:pt-20">
            <span class="inline-flex items-center rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm font-medium text-white/90 backdrop-blur">
                Contacto ALTECBOL
            </span>

            <h1 class="mt-6 text-4xl md:text-5xl lg:text-6xl font-bold leading-tight text-white">
                Conversemos sobre la
                <span class="bg-gradient-to-r from-cyan-300 via-sky-300 to-white bg-clip-text text-transparent">
                    tecnología que tu empresa necesita
                </span>
            </h1>

            <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-200">
                Si buscas soporte, infraestructura, comunicaciones, seguridad o una propuesta tecnológica a medida,
                estamos listos para ayudarte con una atención clara, profesional y orientada a resultados.
            </p>

            
        </div>
    </div>

    <div class="relative -mt-10">
        <svg viewBox="0 0 1440 120" class="h-20 w-full fill-white" preserveAspectRatio="none">
            <path d="M0,96L80,85.3C160,75,320,53,480,48C640,43,800,53,960,64C1120,75,1280,85,1360,90.7L1440,96L1440,120L0,120Z"></path>
        </svg>
    </div>
</section>

<section class="relative bg-white py-2 lg:py-5">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(59,130,246,0.04),_transparent_22%),radial-gradient(circle_at_bottom_right,_rgba(6,182,212,0.05),_transparent_24%)]"></div>

    <div class="relative max-w-7xl mx-auto px-6">
        <div class="grid xl:grid-cols-[1.05fr_.95fr] gap-8 items-start">

            <!-- INFORMACIÓN -->
            <div class="space-y-6">
                <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out rounded-[2rem] border border-slate-200 bg-white p-8 lg:p-9 shadow-[0_18px_55px_rgba(15,23,42,0.06)]">
                    <div class="flex flex-wrap items-start justify-between gap-5">
                        <div class="max-w-2xl">
                            <span class="inline-flex items-center rounded-full bg-[#0050b0]/8 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-[#0050b0]">
                                Hablemos
                            </span>

                            <h2 class="mt-4 text-3xl font-bold leading-tight text-slate-900">
                                Un aliado tecnológico para acompañar tu operación
                            </h2>

                            <p class="mt-5 text-slate-600 leading-8">
                                En ALTECBOL ayudamos a empresas a fortalecer su conectividad, continuidad operativa,
                                seguridad, soporte técnico y capacidad tecnológica con soluciones adaptadas a cada necesidad.
                            </p>
                        </div>

                        <div class="flex h-16 w-16 items-center justify-center rounded-[1.5rem] bg-gradient-to-br from-[#0050b0] to-[#0d377a] text-white shadow-lg shadow-blue-900/20">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.7">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 7.5h18M6.75 3h10.5A2.25 2.25 0 0119.5 5.25v13.5A2.25 2.25 0 0117.25 21h-10.5A2.25 2.25 0 014.5 18.75V5.25A2.25 2.25 0 016.75 3z" />
                            </svg>
                        </div>
                    </div>

                    <div class="mt-8 grid sm:grid-cols-2 gap-4">
                        <div class="rounded-[1.5rem] border border-slate-200 bg-slate-50 p-5">
                            <div class="text-sm font-medium text-slate-500">Atención</div>
                            <div class="mt-2 text-lg font-semibold text-slate-900">Comercial y técnica</div>
                        </div>

                        <div class="rounded-[1.5rem] border border-slate-200 bg-slate-50 p-5">
                            <div class="text-sm font-medium text-slate-500">Enfoque</div>
                            <div class="mt-2 text-lg font-semibold text-slate-900">Empresas y soluciones B2B</div>
                        </div>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-5">
                    <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100 group rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-[0_12px_35px_rgba(15,23,42,0.05)] hover:-translate-y-1 hover:shadow-[0_20px_50px_rgba(15,23,42,0.08)]">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#0050b0]/10 text-[#0050b0] transition group-hover:bg-[#0050b0] group-hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5h18M3 7l9 6 9-6M4 19h16a1 1 0 001-1V6a1 1 0 00-1-1H4a1 1 0 00-1 1v12a1 1 0 001 1z"/>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-xl font-bold text-slate-900">Correo</h3>
                        <p class="mt-3 text-slate-600 leading-7">
                            Ideal para propuestas, solicitudes de información o seguimiento comercial.
                        </p>
                        <div class="mt-4 font-semibold text-[#0050b0] break-all">
                            info@altecbol.com.bo
                        </div>
                    </div>

                    <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-200 group rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-[0_12px_35px_rgba(15,23,42,0.05)] hover:-translate-y-1 hover:shadow-[0_20px_50px_rgba(15,23,42,0.08)]">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#0050b0]/10 text-[#0050b0] transition group-hover:bg-[#0050b0] group-hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 5.25C3 4.56 3.56 4 4.25 4h2.3a1 1 0 01.97.757l.57 2.281a1 1 0 01-.502 1.123l-1.27.726a11.04 11.04 0 005.516 5.516l.726-1.27a1 1 0 011.123-.502l2.281.57a1 1 0 01.757.97v2.3a1.25 1.25 0 01-1.25 1.25H18C9.716 20 4 14.284 4 7V5.25z"/>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-xl font-bold text-slate-900">Teléfono / WhatsApp</h3>
                        <p class="mt-3 text-slate-600 leading-7">
                            Para coordinar reuniones, consultas rápidas o seguimiento de servicios.
                        </p>
                        <div class="mt-4 font-semibold text-[#0050b0]">
                            +591 64347465
                        </div>
                    </div>

                    <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-300 group rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-[0_12px_35px_rgba(15,23,42,0.05)] hover:-translate-y-1 hover:shadow-[0_20px_50px_rgba(15,23,42,0.08)]">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#0050b0]/10 text-[#0050b0] transition group-hover:bg-[#0050b0] group-hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 12.414m0 0L9.172 8.172m4.242 4.242L21 21M3 10a7 7 0 1114 0c0 4.418-7 11-7 11S3 14.418 3 10z"/>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-xl font-bold text-slate-900">Ubicación</h3>
                        <p class="mt-3 text-slate-600 leading-7">
                            Atención para empresas en Santa Cruz y proyectos tecnológicos corporativos.
                        </p>
                        <div class="mt-4 font-semibold text-[#0050b0]">
                            Santa Cruz, Bolivia
                        </div>
                    </div>

                    <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-400 group rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-[0_12px_35px_rgba(15,23,42,0.05)] hover:-translate-y-1 hover:shadow-[0_20px_50px_rgba(15,23,42,0.08)]">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#0050b0]/10 text-[#0050b0] transition group-hover:bg-[#0050b0] group-hover:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h8M8 14h5M7 4h10a2 2 0 012 2v12l-3-2-3 2-3-2-3 2V6a2 2 0 012-2z"/>
                            </svg>
                        </div>
                        <h3 class="mt-5 text-xl font-bold text-slate-900">Servicios</h3>
                        <p class="mt-3 text-slate-600 leading-7">
                            Infraestructura IT, redes, cloud, ciberseguridad, telefonía IP y soporte.
                        </p>
                        <div class="mt-4 font-semibold text-[#0050b0]">
                            Soluciones tecnológicas empresariales
                        </div>
                    </div>
                </div>
            </div>

            <!-- FORMULARIO -->
            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out rounded-[2rem] border border-slate-200 bg-white p-7 md:p-8 shadow-[0_18px_55px_rgba(15,23,42,0.06)]">
                <div class="mb-6">
                    <span class="inline-flex items-center rounded-full bg-[#0050b0]/8 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-[#0050b0]">
                        Formulario de contacto
                    </span>
                    <h2 class="mt-4 text-3xl font-bold text-slate-900">
                        Cuéntanos qué necesitas
                    </h2>
                    <p class="mt-3 text-slate-600 leading-7">
                        Déjanos tus datos y una breve descripción. Te contactaremos con una guía inicial o una propuesta según tu necesidad.
                    </p>
                </div>

                @if(session('success'))
                    <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-4 text-emerald-700">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('web.contacto.enviar') }}" method="POST" class="space-y-5">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Nombre</label>
                            <input
                                type="text"
                                name="nombre"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-slate-700 outline-none transition-all duration-300 focus:border-[#0050b0] focus:bg-white focus:ring-4 focus:ring-blue-100"
                                placeholder="Tu nombre"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Empresa</label>
                            <input
                                type="text"
                                name="empresa"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-slate-700 outline-none transition-all duration-300 focus:border-[#0050b0] focus:bg-white focus:ring-4 focus:ring-blue-100"
                                placeholder="Nombre de tu empresa"
                            >
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-5">
                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Correo electrónico</label>
                            <input
                                type="email"
                                name="email"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-slate-700 outline-none transition-all duration-300 focus:border-[#0050b0] focus:bg-white focus:ring-4 focus:ring-blue-100"
                                placeholder="correo@empresa.com"
                            >
                        </div>

                        <div>
                            <label class="mb-2 block text-sm font-semibold text-slate-700">Teléfono</label>
                            <input
                                type="text"
                                name="telefono"
                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-slate-700 outline-none transition-all duration-300 focus:border-[#0050b0] focus:bg-white focus:ring-4 focus:ring-blue-100"
                                placeholder="+591 ..."
                            >
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">Tipo de consulta</label>
                        <select
                            name="tipo_consulta"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-slate-700 outline-none transition-all duration-300 focus:border-[#0050b0] focus:bg-white focus:ring-4 focus:ring-blue-100"
                        >
                            <option value="">Selecciona una opción</option>
                            <option>Infraestructura IT</option>
                            <option>Redes y conectividad</option>
                            <option>Cloud / servidores</option>
                            <option>Ciberseguridad</option>
                            <option>Telefonía IP</option>
                            <option>Soporte técnico</option>
                            <option>Cotización</option>
                            <option>Otro</option>
                        </select>
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-semibold text-slate-700">Mensaje</label>
                        <textarea
                            name="mensaje"
                            rows="6"
                            class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3.5 text-slate-700 outline-none transition-all duration-300 focus:border-[#0050b0] focus:bg-white focus:ring-4 focus:ring-blue-100"
                            placeholder="Cuéntanos brevemente qué necesitas..."
                        ></textarea>
                    </div>

                    <button
                        type="submit"
                        class="inline-flex w-full items-center justify-center rounded-2xl bg-[#0d377a] px-6 py-4 font-semibold text-white shadow-lg shadow-blue-900/10 transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#0050b0]"
                    >
                        Enviar consulta
                    </button>
                </form>
            </div>

        </div>
    </div>
</section>

<section class="bg-slate-50 py-16 lg:py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-[1.1fr_.9fr] gap-8 items-stretch">

            <!-- MAPA -->
            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out rounded-[2rem] overflow-hidden border border-slate-200 bg-white shadow-[0_18px_55px_rgba(15,23,42,0.06)]">
                <div class="border-b border-slate-200 px-6 py-5">
                    <span class="inline-flex items-center rounded-full bg-[#0050b0]/8 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-[#0050b0]">
                        Ubicación
                    </span>
                    <h3 class="mt-3 text-2xl font-bold text-slate-900">
                        Nuestra presencia y área de atención
                    </h3>
                    <p class="mt-2 text-slate-600 leading-7">
                        Atendemos proyectos empresariales en Santa Cruz, Bolivia, y acompañamos iniciativas tecnológicas con enfoque corporativo.
                    </p>
                </div>

                <div class="relative h-[420px] w-full">
                    <iframe
                        src="https://www.google.com/maps?q=Santa+Cruz+Bolivia&z=13&output=embed"
                        class="h-full w-full"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>

                    <div class="pointer-events-none absolute inset-x-0 top-0 h-20 bg-gradient-to-b from-white via-white/70 to-transparent"></div>
                </div>
            </div>

            <!-- CARD LATERAL -->
            <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out delay-100 rounded-[2rem] border border-slate-200 bg-white p-7 shadow-[0_18px_55px_rgba(15,23,42,0.06)]">
                <span class="inline-flex items-center rounded-full bg-[#0050b0]/8 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-[#0050b0]">
                    Atención empresarial
                </span>

                <h3 class="mt-4 text-2xl font-bold text-slate-900">
                    Coordinemos una reunión o evaluación
                </h3>

                <p class="mt-4 text-slate-600 leading-8">
                    Si tu empresa necesita soporte, una nueva infraestructura o una propuesta tecnológica más sólida,
                    podemos ayudarte a evaluar la mejor ruta con una visión práctica y escalable.
                </p>

                <div class="mt-6 space-y-3">
                    <div class="flex items-start gap-3 rounded-2xl bg-slate-50 px-4 py-4">
                        <div class="mt-1 h-2.5 w-2.5 rounded-full bg-[#0050b0]"></div>
                        <div class="text-slate-700">Diagnóstico inicial de necesidad tecnológica</div>
                    </div>
                    <div class="flex items-start gap-3 rounded-2xl bg-slate-50 px-4 py-4">
                        <div class="mt-1 h-2.5 w-2.5 rounded-full bg-[#0050b0]"></div>
                        <div class="text-slate-700">Revisión de infraestructura, soporte o comunicaciones</div>
                    </div>
                    <div class="flex items-start gap-3 rounded-2xl bg-slate-50 px-4 py-4">
                        <div class="mt-1 h-2.5 w-2.5 rounded-full bg-[#0050b0]"></div>
                        <div class="text-slate-700">Propuesta comercial y técnica según el caso</div>
                    </div>
                    <div class="flex items-start gap-3 rounded-2xl bg-slate-50 px-4 py-4">
                        <div class="mt-1 h-2.5 w-2.5 rounded-full bg-[#0050b0]"></div>
                        <div class="text-slate-700">Enfoque B2B con soluciones escalables</div>
                    </div>
                </div>

                <div class="mt-8 grid sm:grid-cols-2 gap-3">
                    <a href="{{ route('web.servicios') }}"
                       class="inline-flex items-center justify-center rounded-2xl bg-[#0d377a] px-5 py-3.5 font-semibold text-white transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#0050b0]">
                        Ver servicios
                    </a>

                    <a href="{{ route('web.planes') }}"
                       class="inline-flex items-center justify-center rounded-2xl border border-slate-300 px-5 py-3.5 font-semibold text-slate-700 transition-all duration-300 hover:border-[#0050b0] hover:text-[#0050b0]">
                        Ver planes
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative overflow-hidden bg-white py-20 lg:py-24">
    <div class="absolute inset-0">
        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent"></div>
        <div class="absolute -top-10 left-0 h-56 w-56 rounded-full bg-blue-100/50 blur-3xl"></div>
        <div class="absolute -bottom-10 right-0 h-56 w-56 rounded-full bg-cyan-100/60 blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6">
        <div class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out rounded-[2rem] border border-slate-800 bg-[linear-gradient(135deg,#020617_0%,#0f172a_45%,#0b1328_100%)] p-8 md:p-10 lg:p-14 text-white shadow-[0_30px_80px_rgba(2,6,23,0.35)]">
            <div class="absolute inset-0 opacity-100 pointer-events-none">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(56,189,248,0.12),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(59,130,246,0.14),_transparent_32%)]"></div>
                <div class="absolute inset-0 bg-[linear-gradient(120deg,transparent_0%,rgba(255,255,255,0.03)_35%,transparent_70%)]"></div>
            </div>

            <div class="relative grid lg:grid-cols-[1.1fr_.9fr] gap-8 items-center">
                <div>
                    <span class="inline-flex items-center rounded-full border border-white/10 bg-white/5 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-sky-200 backdrop-blur">
                        ALTECBOL
                    </span>

                    <h2 class="mt-4 text-3xl md:text-4xl lg:text-[2.7rem] font-bold leading-tight">
                        Hagamos que la tecnología trabaje
                        <span class="text-sky-300">a favor de tu empresa</span>
                    </h2>

                    <p class="mt-5 max-w-2xl text-slate-300 leading-8">
                        Desde infraestructura y soporte hasta cloud, seguridad y comunicaciones,
                        te ayudamos a construir una operación más estable, moderna y preparada para crecer.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-3">
                        <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-slate-200 backdrop-blur">
                            Soporte empresarial
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-slate-200 backdrop-blur">
                            Redes y conectividad
                        </div>
                        <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-slate-200 backdrop-blur">
                            Infraestructura y cloud
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <div class="rounded-[1.75rem] border border-white/10 bg-white/5 p-5 sm:p-6 backdrop-blur-xl">
                        <div class="space-y-4">
                            <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-4">
                                <div class="text-sm text-slate-400">Ideal para</div>
                                <div class="mt-1 font-semibold text-white">Empresas que buscan orden, continuidad y escalabilidad</div>
                            </div>

                            <div class="rounded-2xl border border-white/10 bg-white/5 px-4 py-4">
                                <div class="text-sm text-slate-400">Podemos ayudarte con</div>
                                <div class="mt-1 font-semibold text-white">Soporte, infraestructura, telefonía IP, servidores y seguridad</div>
                            </div>
                        </div>

                        <div class="mt-6 flex flex-col sm:flex-row gap-3">
                            <a href="{{ route('web.planes') }}"
                               class="inline-flex flex-1 items-center justify-center rounded-2xl bg-white px-6 py-3.5 font-semibold text-slate-900 transition-all duration-300 hover:-translate-y-0.5">
                                Ver planes
                            </a>

                            <a href="{{ route('web.tienda.index') }}"
                               class="inline-flex flex-1 items-center justify-center rounded-2xl border border-white/15 bg-white/5 px-6 py-3.5 font-semibold text-white transition-all duration-300 hover:bg-white hover:text-slate-900">
                                Ir a tienda
                            </a>
                        </div>
                    </div>
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