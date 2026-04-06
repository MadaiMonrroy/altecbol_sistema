@extends('layouts.web')

@section('title', 'Blog | ALTECBOL')

@section('content')

    @php
        $posts = [
            [
                'title' => '5 señales de que tu empresa necesita modernizar su infraestructura IT',
                'slug' => '5-senales-modernizar-infraestructura-it',
                'category' => 'Infraestructura',
                'excerpt' =>
                    'Detecta cuándo tu red, tus servidores o tus procesos tecnológicos están frenando la productividad y elevando el riesgo operativo.',
                'image' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=80',
                'date' => '12 Mar 2026',
                'read_time' => '5 min',
                'featured' => true,
            ],
            [
                'title' => 'Cómo reducir caídas operativas con soporte TI mensualizado',
                'slug' => 'como-reducir-caidas-operativas-con-soporte-ti-mensualizado',
                'category' => 'Managed IT',
                'excerpt' =>
                    'El soporte reactivo ya no es suficiente. Te mostramos por qué el acompañamiento preventivo mejora la continuidad del negocio.',
                'image' =>
                    'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=80',
                'date' => '10 Mar 2026',
                'read_time' => '4 min',
                'featured' => false,
            ],
            [
                'title' => 'Firewall, antivirus y filtrado web: qué necesita realmente una empresa',
                'slug' => 'firewall-antivirus-filtrado-web-que-necesita-una-empresa',
                'category' => 'Cybersecurity',
                'excerpt' =>
                    'No toda protección funciona igual. Aprende a diferenciar capas de seguridad y elegir una estrategia coherente para tu operación.',
                'image' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=1200&q=80',
                'date' => '08 Mar 2026',
                'read_time' => '6 min',
                'featured' => false,
            ],
            [
                'title' => 'Telefonía IP para empresas: cuándo conviene migrar',
                'slug' => 'telefonia-ip-para-empresas-cuando-conviene-migrar',
                'category' => 'Comunicaciones',
                'excerpt' =>
                    'Si tu empresa depende de llamadas, atención al cliente o sedes conectadas, esta guía te ayudará a evaluar el cambio.',
                'image' =>
                    'https://images.unsplash.com/photo-1573164574572-cb89e39749b4?auto=format&fit=crop&w=1200&q=80',
                'date' => '05 Mar 2026',
                'read_time' => '5 min',
                'featured' => false,
            ],
            [
                'title' => 'Videovigilancia y control de acceso: más que cámaras',
                'slug' => 'videovigilancia-y-control-de-acceso-mas-que-camaras',
                'category' => 'Seguridad Física',
                'excerpt' =>
                    'La seguridad empresarial moderna combina visibilidad, control y trazabilidad para proteger personas, activos y procesos.',
                'image' =>
                    'https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1200&q=80',
                'date' => '02 Mar 2026',
                'read_time' => '4 min',
                'featured' => false,
            ],
            [
                'title' => 'Cloud y virtualización: ventajas reales para una empresa en crecimiento',
                'slug' => 'cloud-y-virtualizacion-ventajas-reales-para-una-empresa-en-crecimiento',
                'category' => 'Cloud & Data Center',
                'excerpt' =>
                    'Menos dependencia de hardware aislado, más flexibilidad y mejor continuidad para aplicaciones críticas y crecimiento futuro.',
                'image' =>
                    'https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1200&q=80',
                'date' => '28 Feb 2026',
                'read_time' => '6 min',
                'featured' => false,
            ],
            [
                'title' => 'La IA ya toma decisiones por tu empresa',
                'slug' => 'ia-empleado-digital-empresas-2026',
                'category' => 'Inteligencia Artificial',
                'excerpt' =>
                    'Ya no se trata de usar IA, sino de delegarle procesos completos. Descubre cómo está cambiando la operación empresarial.',
                'image' =>
                    'https://images.unsplash.com/photo-1676299081847-824916de030a?auto=format&fit=crop&w=1200&q=80',
                'date' => '22 Mar 2026',
                'read_time' => '6 min',
                'featured' => false,
            ],
            [
                'title' => 'Tu empresa ya fue vulnerada (aunque no lo sepas)',
                'slug' => 'empresa-ya-comprometida-ciberseguridad-2026',
                'category' => 'Cybersecurity',
                'excerpt' =>
                    'Los ataques actuales no empiezan con alertas. Empiezan silenciosamente. Aprende cómo detectar lo que no estás viendo.',
                'image' =>
                    'https://images.unsplash.com/photo-1510511459019-5dda7724fd87?auto=format&fit=crop&w=1200&q=80',
                'date' => '21 Mar 2026',
                'read_time' => '5 min',
                'featured' => false,
            ],
            [
                'title' => 'Cloud 3.0: migrar ya no es suficiente',
                'slug' => 'cloud-3-0-empresas-2026',
                'category' => 'Cloud & Data Center',
                'excerpt' =>
                    'La ventaja ya no está en usar cloud, sino en cómo lo diseñas. Tu arquitectura define tu crecimiento.',
                'image' =>
                    'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1200&q=80',
                'date' => '20 Mar 2026',
                'read_time' => '5 min',
                'featured' => false,
            ],
            [
                'title' => 'Cada proceso manual te está costando dinero',
                'slug' => 'automatizacion-procesos-empresas-2026',
                'category' => 'Automatización',
                'excerpt' =>
                    'No es eficiencia, es rentabilidad. Automatizar hoy no es opcional si quieres escalar sin perder margen.',
                'image' =>
                    'https://images.unsplash.com/photo-1581092160607-ee22621dd758?auto=format&fit=crop&w=1200&q=80',
                'date' => '19 Mar 2026',
                'read_time' => '4 min',
                'featured' => false,
            ],
            [
                'title' => 'Tu infraestructura está frenando tu empresa',
                'slug' => 'infraestructura-it-frena-crecimiento',
                'category' => 'Infraestructura',
                'excerpt' =>
                    'El problema no es visible hasta que afecta el negocio. Aprende a identificar los límites ocultos de tu sistema.',
                'image' =>
                    'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=1200&q=80',
                'date' => '18 Mar 2026',
                'read_time' => '5 min',
                'featured' => false,
            ],
            [
                'title' => 'La ciberseguridad ahora se defiende sola',
                'slug' => 'ciberseguridad-autonoma-empresas',
                'category' => 'Cybersecurity',
                'excerpt' =>
                    'Los sistemas modernos ya detectan y responden ataques sin intervención humana. Así funciona la nueva seguridad.',
                'image' =>
                    'https://images.unsplash.com/photo-1563986768609-322da13575f3?auto=format&fit=crop&w=1200&q=80',
                'date' => '17 Mar 2026',
                'read_time' => '6 min',
                'featured' => false,
            ],
            [
                'title' => 'El software no desaparece, está evolucionando con IA',
                'slug' => 'empresas-reemplazan-software-ia',
                'category' => 'Innovación',
                'excerpt' =>
                    'La inteligencia artificial no reemplaza el software. Lo transforma en algo más flexible, adaptable y alineado al negocio.',
                'image' =>
                    'https://images.unsplash.com/photo-1677442135136-760c813028c0?auto=format&fit=crop&w=1200&q=80',
                'date' => '16 Mar 2026',
                'read_time' => '6 min',
                'featured' => false,
            ],
            [
                'title' => 'No necesitas más personal, necesitas sistemas',
                'slug' => 'menos-personal-mejores-sistemas',
                'category' => 'Gestión TI',
                'excerpt' =>
                    'Las empresas más eficientes no crecen en equipo, crecen en estructura. Optimiza tu operación con tecnología.',
                'image' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1200&q=80',
                'date' => '15 Mar 2026',
                'read_time' => '4 min',
                'featured' => false,
            ],
            [
                'title' => 'Tus datos son tu activo más valioso',
                'slug' => 'datos-activo-estrategico-empresa',
                'category' => 'Data & Analytics',
                'excerpt' =>
                    'Las decisiones más importantes no se basan en intuición, sino en datos. Aprende cómo aprovecharlos.',
                'image' => 'https://images.unsplash.com/photo-1555949963-aa79dcee981c?auto=format&fit=crop&w=1200&q=80',
                'date' => '14 Mar 2026',
                'read_time' => '5 min',
                'featured' => false,
            ],
            [
                'title' => 'Todo está cambiando al mismo tiempo (y es un problema)',
                'slug' => 'convergencia-tecnologica-empresas',
                'category' => 'Transformación Digital',
                'excerpt' =>
                    'IA, cloud y automatización avanzan juntos. Si no entiendes esta convergencia, tu empresa quedará atrás.',
                'image' =>
                    'https://images.unsplash.com/photo-1535223289827-42f1e9919769?auto=format&fit=crop&w=1200&q=80',
                'date' => '13 Mar 2026',
                'read_time' => '6 min',
                'featured' => false,
            ],
        ];

        $featured = collect($posts)->firstWhere('featured', true);
        $latest = collect($posts)->where('featured', false)->take(3)->values();
        $more = collect($posts)->where('featured', false)->slice(3)->values();
    @endphp

    <style>
        @keyframes gridMove {
            0% {
                transform: translate3d(0, 0, 0);
            }

            100% {
                transform: translate3d(0, 42px, 0);
            }
        }

        @keyframes floatParticle {

            0%,
            100% {
                transform: translate3d(0, 0, 0) scale(1);
                opacity: .25;
            }

            50% {
                transform: translate3d(0, -48px, 0) scale(1.2);
                opacity: .95;
            }
        }

        @keyframes floatParticleAlt {

            0%,
            100% {
                transform: translate3d(0, 0, 0) scale(1);
                opacity: .18;
            }

            50% {
                transform: translate3d(22px, -34px, 0) scale(1.15);
                opacity: .8;
            }
        }

        @keyframes orbFloatA {

            0%,
            100% {
                transform: translate3d(0, 0, 0);
            }

            50% {
                transform: translate3d(30px, -28px, 0);
            }
        }

        @keyframes orbFloatB {

            0%,
            100% {
                transform: translate3d(0, 0, 0);
            }

            50% {
                transform: translate3d(-30px, 24px, 0);
            }
        }

        @keyframes orbFloatC {

            0%,
            100% {
                transform: translate3d(0, 0, 0);
            }

            50% {
                transform: translate3d(16px, -20px, 0);
            }
        }

        @keyframes linePulse {

            0%,
            100% {
                opacity: .25;
                transform: scaleX(1);
            }

            50% {
                opacity: .7;
                transform: scaleX(1.04);
            }
        }

        @keyframes shineMove {
            0% {
                transform: translateX(-130%);
            }

            100% {
                transform: translateX(130%);
            }
        }

        .blog-grid-bg {
            background-image:
                linear-gradient(to right, rgba(1, 211, 209, 0.14) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(1, 211, 209, 0.14) 1px, transparent 1px);
            background-size: 42px 42px;
            animation: gridMove 10s linear infinite;
        }

        .blog-line {
            position: absolute;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(1, 211, 209, .9), transparent);
            animation: linePulse 2.2s ease-in-out infinite;
            filter: drop-shadow(0 0 10px rgba(1, 211, 209, .4));
        }

        .blog-line.line-1 {
            width: 260px;
            top: 22%;
            left: 6%;
            transform: rotate(-12deg);
        }

        .blog-line.line-2 {
            width: 220px;
            top: 62%;
            right: 8%;
            transform: rotate(18deg);
            animation-delay: .6s;
        }

        .blog-line.line-3 {
            width: 180px;
            top: 38%;
            right: 28%;
            transform: rotate(-20deg);
            animation-delay: 1s;
        }

        .blog-particle {
            position: absolute;
            width: 7px;
            height: 7px;
            border-radius: 999px;
            background: rgba(1, 211, 209, .95);
            box-shadow: 0 0 18px rgba(1, 211, 209, .65);
            animation: floatParticle 5.2s ease-in-out infinite;
        }

        .blog-particle.alt {
            background: rgba(0, 80, 176, .85);
            box-shadow: 0 0 18px rgba(0, 80, 176, .45);
            animation: floatParticleAlt 4.6s ease-in-out infinite;
        }

        .blog-particle.p1 {
            left: 10%;
            top: 66%;
        }

        .blog-particle.p2 {
            left: 24%;
            top: 26%;
            animation-delay: .7s;
        }

        .blog-particle.p3 {
            left: 46%;
            top: 78%;
            animation-delay: 1.1s;
        }

        .blog-particle.p4 {
            left: 68%;
            top: 34%;
            animation-delay: 1.6s;
        }

        .blog-particle.p5 {
            left: 83%;
            top: 62%;
            animation-delay: 2s;
        }

        .blog-particle.p6 {
            left: 58%;
            top: 18%;
            animation-delay: .5s;
        }

        .blog-orb-a {
            animation: orbFloatA 5.6s ease-in-out infinite;
        }

        .blog-orb-b {
            animation: orbFloatB 6.4s ease-in-out infinite;
        }

        .blog-orb-c {
            animation: orbFloatC 4.8s ease-in-out infinite;
        }

        .glass-card {
            background: rgba(255, 255, 255, .82);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, .6);
        }

        .card-hover-pro {
            transition:
                transform .45s cubic-bezier(.22, 1, .36, 1),
                box-shadow .45s cubic-bezier(.22, 1, .36, 1),
                border-color .35s ease;
        }

        .card-hover-pro:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 80px rgba(15, 23, 42, 0.14);
        }

        .shine-card {
            position: relative;
            isolation: isolate;
            overflow: hidden;
        }

        .shine-card::before {
            content: "";
            position: absolute;
            inset: -1px;
            background: linear-gradient(115deg, transparent 28%, rgba(255, 255, 255, .5) 48%, transparent 70%);
            transform: translateX(-130%);
            opacity: 0;
            z-index: 1;
            pointer-events: none;
        }

        .shine-card:hover::before {
            opacity: 1;
            animation: shineMove 1s ease;
        }

        .blog-image-overlay {
            background:
                linear-gradient(to top, rgba(2, 6, 23, 0.76), transparent 58%),
                linear-gradient(to right, rgba(0, 80, 176, 0.20), transparent 42%);
        }

        .premium-ring {
            box-shadow:
                inset 0 1px 0 rgba(255, 255, 255, .5),
                0 18px 45px rgba(2, 6, 23, .08);
        }

        .btn-premium-primary {
            position: relative;
            overflow: hidden;
            transition: all .35s cubic-bezier(.22, 1, .36, 1);
        }

        .btn-premium-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(0, 80, 176, .16);
        }

        .btn-premium-secondary {
            transition: all .35s cubic-bezier(.22, 1, .36, 1);
        }

        .btn-premium-secondary:hover {
            transform: translateY(-2px);
        }

        .btn-premium-primary::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, transparent 30%, rgba(255, 255, 255, .28), transparent 70%);
            transform: translateX(-120%);
            transition: transform .7s ease;
        }

        .btn-premium-primary:hover::after {
            transform: translateX(120%);
        }

        .latest-thumb {
            width: 100%;
            min-width: 100%;
        }


        @media (min-width: 640px) {
            .latest-thumb {
                width: 154px;
                min-width: 154px;
            }

            .latest-thumb-inner {
                aspect-ratio: 4 / 3;
            }
        }

        .latest-thumb-inner {
            aspect-ratio: 16 / 10;
        }


        .floating-grid-light {
            background-image:
                linear-gradient(to right, rgba(15, 23, 42, .14) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(15, 23, 42, .14) 1px, transparent 1px);
            background-size: 36px 36px;
        }

        @media (max-width: 639px) {
            .mobile-stack-card {
                padding: 0.9rem;
                border-radius: 1.25rem;
            }

            .mobile-stack-card .mobile-stack-wrap {
                display: flex;
                flex-direction: column;
                gap: 0.9rem;
            }

            .mobile-stack-card .mobile-content {
                width: 100%;
            }

            .mobile-stack-card .mobile-top-row {
                display: flex;
                align-items: flex-start;
                justify-content: space-between;
                gap: 0.75rem;
            }

            .mobile-stack-card .mobile-actions {
                display: flex;
                align-items: center;
                gap: 0.4rem;
                flex-shrink: 0;
            }

            .mobile-stack-card .mobile-actions button {
                height: 2.25rem;
                width: 2.25rem;
                min-width: 2.25rem;
                border-radius: 0.85rem;
            }

            .mobile-stack-card h3 {
                font-size: 1rem;
                line-height: 1.45rem;
            }

            .mobile-stack-card p {
                font-size: 0.8rem;
                line-height: 1.45rem;
            }

            .mobile-stack-card .mobile-meta {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 0.75rem;
                flex-wrap: wrap;
            }

            .mobile-stack-card .mobile-meta a {
                white-space: nowrap;
            }
        }
    </style>

    <section class="relative overflow-hidden bg-slate-950">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1600&q=80"
                alt="Blog de tecnología" class="h-full w-full object-cover opacity-[0.14]">
        </div>

        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(1,211,209,0.18),_transparent_22%),radial-gradient(circle_at_bottom_right,_rgba(0,80,176,0.34),_transparent_34%),linear-gradient(to_right,_rgba(2,6,23,0.97),_rgba(0,80,176,0.88),_rgba(2,6,23,0.97))]">
        </div>

        <div class="pointer-events-none absolute inset-0 overflow-hidden">
            <div class="blog-grid-bg absolute inset-0 opacity-[0.11]"></div>

            <div class="blog-line line-1"></div>
            <div class="blog-line line-2"></div>
            <div class="blog-line line-3"></div>

            <div
                class="blog-orb-a absolute -top-40 left-[16%] h-[28rem] w-[28rem] rounded-full bg-[#01d3d1]/18 blur-[120px]">
            </div>
            <div
                class="blog-orb-b absolute bottom-[-12rem] right-[8%] h-[34rem] w-[34rem] rounded-full bg-[#0050b0]/30 blur-[140px]">
            </div>
            <div class="blog-orb-c absolute top-[18%] right-[34%] h-[18rem] w-[18rem] rounded-full bg-white/5 blur-[90px]">
            </div>

            <div class="absolute inset-0">
                <div class="blog-particle p1"></div>
                <div class="blog-particle p2 alt"></div>
                <div class="blog-particle p3"></div>
                <div class="blog-particle p4 alt"></div>
                <div class="blog-particle p5"></div>
                <div class="blog-particle p6 alt"></div>
            </div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 py-20 sm:py-24 lg:py-32">
            <div class="max-w-4xl js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
                <span
                    class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-3 sm:px-4 py-2 text-[11px] sm:text-sm font-medium text-white/90 backdrop-blur-md premium-ring">
                    <span class="h-2.5 w-2.5 rounded-full bg-[#01d3d1] shadow-[0_0_18px_rgba(1,211,209,.95)]"></span>
                    Blog ALTECBOL
                </span>

                <h1 class="mt-5 text-3xl sm:text-4xl lg:text-6xl font-bold leading-[1.08] text-white">
                    Contenido de valor para empresas que buscan
                    <span class="text-[#01d3d1]">tecnología, eficiencia y profesionalismo</span>
                </h1>

                <p class="mt-5 max-w-3xl text-sm sm:text-base lg:text-lg leading-7 sm:leading-8 text-slate-200">
                    Publicaciones sobre infraestructura, software, ciberseguridad, continuidad operativa y transformación
                    digital
                    con enfoque empresarial.
                </p>

                <div class="mt-7 flex flex-wrap gap-2.5 sm:gap-3">
                    <span
                        class="rounded-full border border-white/10 bg-white/10 px-3 py-2 text-[11px] sm:text-sm text-white/85 backdrop-blur-md premium-ring">Software</span>
                    <span
                        class="rounded-full border border-white/10 bg-white/10 px-3 py-2 text-[11px] sm:text-sm text-white/85 backdrop-blur-md premium-ring">Infraestructura</span>
                    <span
                        class="rounded-full border border-white/10 bg-white/10 px-3 py-2 text-[11px] sm:text-sm text-white/85 backdrop-blur-md premium-ring">Cloud</span>
                    <span
                        class="rounded-full border border-white/10 bg-white/10 px-3 py-2 text-[11px] sm:text-sm text-white/85 backdrop-blur-md premium-ring">Seguridad</span>
                </div>
            </div>
        </div>

        <div class="relative -mt-10 sm:-mt-14">
            <svg viewBox="0 0 1440 120" class="h-16 sm:h-24 w-full fill-white" preserveAspectRatio="none">
                <path
                    d="M0,96L80,85.3C160,75,320,53,480,48C640,43,800,53,960,64C1120,75,1280,85,1360,90.7L1440,96L1440,120L0,120Z">
                </path>
            </svg>
        </div>
    </section>

    <section class="relative bg-white pb-14 sm:pb-16">
        <div
            class="pointer-events-none absolute inset-x-0 top-0 h-44 bg-[radial-gradient(circle_at_center,_rgba(1,211,209,0.12),_transparent_62%)]">
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6">
            <div class="grid xl:grid-cols-[1.15fr_.85fr] gap-6 lg:gap-8 items-stretch">

                <article
                    class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out group shine-card card-hover-pro overflow-hidden rounded-[1.75rem] sm:rounded-[2rem] glass-card premium-ring shadow-[0_22px_60px_rgba(15,23,42,0.10)]">
                    <div class="grid lg:grid-cols-2 h-full">
                        <div class="relative overflow-hidden">
                            <a href="{{ route('web.blog-show', $featured['slug']) }}" class="block h-full">
                                <img src="{{ $featured['image'] }}" alt="{{ $featured['title'] }}"
                                    class="h-[260px] sm:h-[320px] lg:h-full w-full object-cover transition duration-700 group-hover:scale-110 brightness-[0.92] group-hover:brightness-100">
                            </a>

                            <div class="absolute inset-0 blog-image-overlay"></div>

                            <div class="absolute left-3 top-3 sm:left-5 sm:top-5 z-[2]">
                                <span
                                    class="inline-flex rounded-full bg-[#0050b0] px-3 py-1.5 text-[10px] sm:text-xs font-semibold uppercase tracking-[0.18em] text-white shadow-[0_12px_28px_rgba(0,80,176,.35)]">
                                    Destacado
                                </span>
                            </div>

                            <div class="absolute right-3 top-3 sm:right-5 sm:top-5 z-[2] flex items-center gap-2">
                                <button type="button"
                                    class="favorite-btn inline-flex h-10 w-10 sm:h-11 sm:w-11 items-center justify-center rounded-xl sm:rounded-2xl border border-white/20 bg-white/15 text-white backdrop-blur-md transition-all duration-300 hover:scale-110 hover:rotate-6 hover:bg-white/25"
                                    data-post="{{ $featured['slug'] }}" aria-label="Agregar a favoritos">
                                    <svg class="favorite-icon h-5 w-5" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.9">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.995 21s-6.716-4.35-9.193-8.117C.72 9.73 1.38 5.772 4.75 4.03c2.147-1.11 4.702-.59 6.245 1.206 1.544-1.796 4.1-2.316 6.245-1.206 3.37 1.742 4.03 5.7 1.948 8.853C18.711 16.65 11.995 21 11.995 21Z" />
                                    </svg>
                                </button>

                                <button type="button"
                                    class="share-btn inline-flex h-10 w-10 sm:h-11 sm:w-11 items-center justify-center rounded-xl sm:rounded-2xl border border-white/20 bg-white/15 text-white backdrop-blur-md transition-all duration-300 hover:scale-110 hover:rotate-6 hover:bg-white/25"
                                    data-title="{{ $featured['title'] }}"
                                    data-url="{{ route('web.blog-show', $featured['slug']) }}"
                                    aria-label="Compartir artículo">
                                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.9">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="M7.926 10.898 15 7.727m-7.074 5.39L15 16.29M8 12a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm12 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm0-11a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />

                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="p-4 sm:p-7 lg:p-9 flex flex-col justify-center relative z-[2]">
                            <div class="flex flex-wrap items-center gap-2 sm:gap-3 text-xs sm:text-sm">
                                <span
                                    class="rounded-full border border-[#0050b0]/10 bg-[#0050b0]/5 px-3 py-1 font-semibold uppercase tracking-wider text-[#0050b0]">
                                    {{ $featured['category'] }}
                                </span>
                                <span class="text-slate-500">{{ $featured['date'] }}</span>
                                <span class="text-slate-300 hidden sm:inline">•</span>
                                <span class="text-slate-500">{{ $featured['read_time'] }}</span>
                            </div>

                            <a href="{{ route('web.blog-show', $featured['slug']) }}" class="block">
                                <h2
                                    class="mt-4 text-xl sm:text-3xl font-bold leading-tight text-slate-900 transition group-hover:text-[#0050b0]">
                                    {{ $featured['title'] }}
                                </h2>
                            </a>

                            <p class="mt-4 text-[13px] sm:text-[15px] leading-6 sm:leading-7 text-slate-600">
                                {{ $featured['excerpt'] }}
                            </p>

                            <div class="mt-6 sm:mt-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                                <a href="{{ route('web.blog-show', $featured['slug']) }}"
                                    class="btn-premium-primary inline-flex items-center justify-center gap-2.5 rounded-2xl border border-[#d6e5ff] bg-white px-5 py-3.5 font-semibold text-slate-900 premium-ring hover:border-[#bfd7ff]">
                                    <svg class="h-5 w-5 text-[#0050b0]" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.9">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.25 6.75 6.75 17.25m10.5-10.5H9.75m7.5 0v7.5" />
                                    </svg>
                                    <span>Leer artículo</span>
                                </a>

                                <div class="inline-flex items-center gap-2 text-xs sm:text-sm text-slate-400">
                                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                                    Enfoque empresarial
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

                <div class="space-y-4 sm:space-y-6">
                    @foreach ($latest as $index => $post)
                        <article
                            class="mobile-stack-card js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out group rounded-[1.35rem] sm:rounded-[1.75rem] glass-card premium-ring card-hover-pro p-4 sm:p-[1.125rem] shadow-[0_14px_36px_rgba(15,23,42,0.08)]"
                            style="transition-delay: {{ ($index + 1) * 100 }}ms;">
                            <div class="mobile-stack-wrap flex flex-col sm:flex-row gap-4">
                                <div class="latest-thumb shrink-0">
                                    <div
                                        class="latest-thumb-inner relative overflow-hidden rounded-[1.1rem] sm:rounded-2xl">
                                        <a href="{{ route('web.blog-show', $post['slug']) }}" class="block h-full">
                                            <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}"
                                                class="h-full w-full object-cover transition duration-700 group-hover:scale-110 brightness-[0.95] group-hover:brightness-100">
                                        </a>
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/30 to-transparent">
                                        </div>
                                    </div>
                                </div>

                                <div class="mobile-content min-w-0 flex-1 flex flex-col justify-between">
                                    <div>
                                        <div class="mobile-top-row flex items-start justify-between gap-3">
                                            <div
                                                class="pr-2 text-[10px] sm:text-xs font-semibold uppercase tracking-wider text-[#0050b0]">
                                                {{ $post['category'] }}
                                            </div>

                                            <div class="mobile-actions flex items-center gap-1.5 sm:gap-2 shrink-0">
                                                <button type="button"
                                                    class="favorite-btn inline-flex h-9 w-9 items-center justify-center rounded-xl border border-slate-200 bg-white/85 text-slate-500 backdrop-blur transition-all duration-300 hover:border-rose-200 hover:text-rose-500 hover:scale-110 hover:rotate-6"
                                                    data-post="{{ $post['slug'] }}" aria-label="Agregar a favoritos">
                                                    <svg class="favorite-icon h-5 w-5 sm:h-5 sm:w-5" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="1.9">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                                                    </svg>
                                                </button>

                                                <button type="button"
                                                    class="share-btn inline-flex h-9 w-9 items-center justify-center rounded-xl border border-slate-200 bg-white/85 text-slate-500 backdrop-blur transition-all duration-300 hover:border-cyan-200 hover:text-[#0050b0] hover:scale-110 hover:rotate-6"
                                                    data-title="{{ $post['title'] }}"
                                                    data-url="{{ route('web.blog-show', $post['slug']) }}"
                                                    aria-label="Compartir artículo">
                                                    <svg class="h-5 w-5 sm:h-5 sm:w-5" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="1.9">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-width="2"
                                                            d="M7.926 10.898 15 7.727m-7.074 5.39L15 16.29M8 12a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm12 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm0-11a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <a href="{{ route('web.blog-show', $post['slug']) }}" class="block">
                                            <h3
                                                class="mt-2 text-base sm:text-lg font-bold leading-snug text-slate-900 transition group-hover:text-[#0050b0]">
                                                {{ $post['title'] }}
                                            </h3>
                                        </a>

                                        <p class="mt-2 line-clamp-2 text-[13px] sm:text-sm leading-6 text-slate-600">
                                            {{ $post['excerpt'] }}
                                        </p>
                                    </div>

                                    <div class="mobile-meta mt-3 flex items-center justify-between gap-3">
                                        <div class="text-[11px] sm:text-xs text-slate-500">
                                            {{ $post['date'] }} · {{ $post['read_time'] }}
                                        </div>

                                        <a href="{{ route('web.blog-show', $post['slug']) }}"
                                            class="inline-flex items-center gap-1.5 text-[11px] sm:text-xs font-semibold text-[#0050b0] transition-all duration-300 hover:gap-2">
                                            Ver más
                                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M7 17 17 7m0 0H9m8 0v8" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="relative overflow-hidden bg-slate-50 py-16 sm:py-20">
        <div class="absolute top-0 left-0 h-72 w-72 rounded-full bg-[#01d3d1]/10 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 h-72 w-72 rounded-full bg-[#0050b0]/10 blur-3xl"></div>
        <div class="absolute inset-0 floating-grid-light opacity-[0.04]"></div>

        <div class="pointer-events-none absolute inset-0 overflow-hidden">
            <div class="absolute top-[14%] left-[8%] h-28 w-28 rounded-full border border-[#01d3d1]/20"></div>
            <div class="absolute top-[22%] right-[14%] h-24 w-24 rounded-full border border-[#0050b0]/15"></div>
            <div class="absolute bottom-[18%] left-[20%] h-20 w-20 rounded-full border border-[#01d3d1]/20"></div>
            <div
                class="absolute top-[38%] left-[12%] h-px w-28 bg-gradient-to-r from-transparent via-[#01d3d1]/50 to-transparent">
            </div>
            <div
                class="absolute bottom-[20%] right-[18%] h-px w-36 bg-gradient-to-r from-transparent via-[#0050b0]/40 to-transparent">
            </div>
        </div>

        <div class="relative mx-auto max-w-7xl px-4 sm:px-6">
            <div class="max-w-3xl js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
                <span class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">Más artículos</span>
                <h2 class="mt-3 text-3xl md:text-4xl font-bold text-slate-900">
                    Recursos útiles para decisiones tecnológicas más inteligentes
                </h2>
                <p class="mt-4 text-slate-600 leading-7">
                    Una presentación más sólida, más limpia y más alineada a una marca tecnológica corporativa.
                </p>
            </div>

            <div class="mt-10 sm:mt-12 grid sm:grid-cols-2 xl:grid-cols-3 gap-5 sm:gap-8">
                @foreach ($more as $index => $post)
                    <article
                        class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out group shine-card card-hover-pro overflow-hidden rounded-[1.5rem] sm:rounded-[2rem] glass-card premium-ring shadow-[0_16px_44px_rgba(15,23,42,0.08)]"
                        style="transition-delay: {{ ($index + 1) * 100 }}ms;">
                        <div class="relative overflow-hidden">
                            <a href="{{ route('web.blog-show', $post['slug']) }}" class="block">
                                <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}"
                                    class="h-52 sm:h-60 w-full object-cover transition duration-700 group-hover:scale-110 brightness-[0.95] group-hover:brightness-100">
                            </a>

                            <div class="absolute inset-0 blog-image-overlay"></div>

                            <div class="absolute inset-x-0 top-0 flex items-start justify-between p-3 sm:p-5 z-[2]">
                                <span
                                    class="rounded-full border border-white/20 bg-white/15 px-3 py-1.5 text-[10px] sm:text-xs font-semibold uppercase tracking-wider text-white backdrop-blur-md">
                                    {{ $post['category'] }}
                                </span>

                                <div class="flex items-center gap-2">
                                    <button type="button"
                                        class="favorite-btn inline-flex h-9 w-9 sm:h-10 sm:w-10 items-center justify-center rounded-xl border border-white/20 bg-white/15 text-white backdrop-blur-md transition-all duration-300 hover:scale-110 hover:rotate-6 hover:bg-white/25"
                                        data-post="{{ $post['slug'] }}" aria-label="Agregar a favoritos">
                                        <svg class="favorite-icon h-6 w-6" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="1.9">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                                        </svg>
                                    </button>

                                    <button type="button"
                                        class="share-btn inline-flex h-9 w-9 sm:h-10 sm:w-10 items-center justify-center rounded-xl border border-white/20 bg-white/15 text-white backdrop-blur-md transition-all duration-300 hover:scale-110 hover:rotate-6 hover:bg-white/25"
                                        data-title="{{ $post['title'] }}"
                                        data-url="{{ route('web.blog-show', $post['slug']) }}"
                                        aria-label="Compartir artículo">
                                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="1.9">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                d="M7.926 10.898 15 7.727m-7.074 5.39L15 16.29M8 12a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm12 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm0-11a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />

                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="p-5 sm:p-7 relative z-[2]">
                            <div class="flex items-center justify-between gap-3 text-xs sm:text-sm">
                                <span class="text-slate-500">{{ $post['date'] }}</span>
                                <span
                                    class="rounded-full bg-slate-100 px-3 py-1 text-[11px] sm:text-xs font-semibold text-slate-600">
                                    {{ $post['read_time'] }}
                                </span>
                            </div>

                            <a href="{{ route('web.blog-show', $post['slug']) }}" class="block">
                                <h3
                                    class="mt-4 sm:mt-5 text-lg sm:text-2xl font-bold leading-snug text-slate-900 transition group-hover:text-[#0050b0]">
                                    {{ $post['title'] }}
                                </h3>
                            </a>

                            <p class="mt-3 sm:mt-4 text-[13px] sm:text-sm leading-6 sm:leading-7 text-slate-600">
                                {{ $post['excerpt'] }}
                            </p>

                            <div class="mt-5 sm:mt-6 flex items-center justify-between">
                                <a href="{{ route('web.blog-show', $post['slug']) }}"
                                    class="inline-flex items-center gap-2 font-semibold text-[#0050b0] transition-all duration-300 hover:gap-3">
                                    Leer más
                                    <svg class="h-4.5 w-4.5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="1.9">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.25 6.75 6.75 17.25m10.5-10.5H9.75m7.5 0v7.5" />
                                    </svg>
                                </a>

                                <span class="text-[10px] sm:text-xs uppercase tracking-[0.18em] text-slate-400">
                                    Blog
                                </span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div
                class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out overflow-hidden rounded-[2rem] border border-slate-200 bg-slate-950 text-white shadow-[0_24px_90px_rgba(2,6,23,0.30)]">
                <div class="grid lg:grid-cols-2 gap-0 items-stretch">
                    <div class="relative p-8 sm:p-10 lg:p-14 overflow-hidden">
                        <div class="absolute inset-0">
                            <div class="absolute inset-0 bg-gradient-to-br from-[#0050b0] via-[#003f8d] to-slate-950">
                            </div>
                            <div class="absolute inset-0 opacity-20"
                                style="background-image: radial-gradient(rgba(1,211,209,.9) 1px, transparent 1px); background-size: 28px 28px;">
                            </div>
                            <div class="absolute -top-16 -left-8 h-48 w-48 rounded-full bg-[#01d3d1]/20 blur-3xl"></div>
                            <div class="absolute bottom-[-4rem] right-[-2rem] h-56 w-56 rounded-full bg-white/10 blur-3xl">
                            </div>
                        </div>

                        <div class="relative">
                            <span class="text-sm font-semibold uppercase tracking-wider text-cyan-100">
                                Impulsa tu operación
                            </span>

                            <h2 class="mt-3 text-3xl md:text-4xl font-bold leading-tight">
                                ¿Buscas una solución tecnológica alineada a tu empresa?
                            </h2>

                            <p class="mt-4 leading-8 text-blue-50">
                                En ALTECBOL ayudamos a empresas a fortalecer su infraestructura, soporte, comunicaciones y
                                continuidad operativa.
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col justify-center gap-4 bg-white p-8 sm:p-10 lg:p-14">
                        <p class="text-sm font-semibold uppercase tracking-wider text-[#0050b0]">
                            Hablemos de tu proyecto
                        </p>

                        <div class="space-y-3">
                            <a href="{{ route('web.contacto') }}"
                                class="btn-premium-primary inline-flex w-full items-center justify-center gap-2.5 rounded-2xl border border-[#d8e6ff] bg-white px-6 py-3.5 font-semibold text-slate-900 premium-ring hover:border-[#bfd7ff]">
                                <svg class="h-5 w-5 text-[#0050b0]" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="1.9">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 8.25v7.5A2.25 2.25 0 0 1 19.5 18h-15a2.25 2.25 0 0 1-2.25-2.25v-7.5M3 6.75l8.47 5.293a1 1 0 0 0 1.06 0L21 6.75M4.5 5.25h15A2.25 2.25 0 0 1 21.75 7.5v.75l-9.22 5.763a1.75 1.75 0 0 1-1.86 0L1.5 8.25V7.5A2.25 2.25 0 0 1 3.75 5.25Z" />
                                </svg>
                                Contactar asesor
                            </a>

                            <a href="{{ route('web.servicios') }}"
                                class="btn-premium-secondary inline-flex w-full items-center justify-center gap-2.5 rounded-2xl border border-slate-200 bg-white px-6 py-3.5 font-semibold text-slate-900 transition hover:border-[#0050b0] hover:text-[#0050b0] hover:bg-slate-50">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="1.9">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                                Ver servicios
                            </a>
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
                threshold: 0.12
            });

            fadeItems.forEach((item) => observer.observe(item));

            const favoriteButtons = document.querySelectorAll('.favorite-btn');
            const favoritesKey = 'altecbol_blog_favorites';

            function getFavorites() {
                try {
                    return JSON.parse(localStorage.getItem(favoritesKey)) || [];
                } catch (e) {
                    return [];
                }
            }

            function saveFavorites(favorites) {
                localStorage.setItem(favoritesKey, JSON.stringify(favorites));
            }

            function isDarkButton(btn) {
                return btn.classList.contains('text-white');
            }

            function paintFavorites() {
                const favorites = getFavorites();

                favoriteButtons.forEach((btn) => {
                    const post = btn.dataset.post;
                    const icon = btn.querySelector('.favorite-icon');

                    if (favorites.includes(post)) {
                        btn.classList.add('text-rose-500');
                        btn.classList.remove('text-slate-500', 'text-white');
                        btn.style.borderColor = 'rgba(244,63,94,0.25)';
                        icon.setAttribute('fill', 'currentColor');
                    } else {
                        icon.setAttribute('fill', 'none');
                        btn.style.borderColor = '';

                        btn.classList.remove('text-rose-500');
                        if (isDarkButton(btn)) {
                            btn.classList.add('text-white');
                        } else {
                            btn.classList.add('text-slate-500');
                        }
                    }
                });
            }

            favoriteButtons.forEach((btn) => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const post = this.dataset.post;
                    let favorites = getFavorites();

                    if (favorites.includes(post)) {
                        favorites = favorites.filter(item => item !== post);
                    } else {
                        favorites.push(post);
                    }

                    saveFavorites(favorites);
                    paintFavorites();
                });
            });

            paintFavorites();

            const shareButtons = document.querySelectorAll('.share-btn');

            async function shareArticle(title, url) {
                if (navigator.share) {
                    try {
                        await navigator.share({
                            title: title,
                            text: title,
                            url: url
                        });
                        return;
                    } catch (error) {
                        if (error && error.name === 'AbortError') {
                            return;
                        }
                    }
                }

                try {
                    await navigator.clipboard.writeText(url);
                    alert('Enlace copiado correctamente.');
                } catch (error) {
                    const tempInput = document.createElement('input');
                    tempInput.value = url;
                    document.body.appendChild(tempInput);
                    tempInput.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempInput);
                    alert('Enlace copiado correctamente.');
                }
            }

            shareButtons.forEach((btn) => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const title = this.dataset.title;
                    const url = this.dataset.url;

                    shareArticle(title, url);
                });
            });
        });
    </script>

@endsection
