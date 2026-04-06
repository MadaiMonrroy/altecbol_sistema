@extends('layouts.web')

@section('title', ($caso['cliente'] ?? 'Caso de Éxito') . ' | ALTECBOL')

@section('content')

@php
    $casos = [
        'vencorp-call-center-tigo' => [
            'slug' => 'vencorp-call-center-tigo',
            'cliente' => 'Vencorp',
            'titulo' => 'Call Center Tigo',
            'subtitulo' => 'Infraestructura de comunicaciones para una operación de atención de alto volumen',
            'categoria' => 'Enterprise Communications',
            'impacto' => 'Escalabilidad y automatización',
            'resumen' => 'Diseño e implementación de una base tecnológica robusta para soportar una operación de call center con mayor orden, estabilidad y capacidad de crecimiento, integrando infraestructura, comunicaciones y conectividad empresarial.',
            'hero' => 'https://images.unsplash.com/photo-1556740749-887f6717d7e4?auto=format&fit=crop&w=1600&q=80',
            'problema' => 'Vencorp necesitaba fortalecer su plataforma tecnológica para acompañar una operación de atención al cliente con alta demanda. El reto no era únicamente habilitar llamadas, sino construir una estructura de comunicaciones confiable, bien organizada y preparada para sostener crecimiento, continuidad operativa y mejor control del flujo de atención.',
            'solucion' => 'ALTECBOL implementó una solución integral orientada a comunicaciones empresariales, incluyendo infraestructura de Data Center, conectividad de soporte para la operación, configuración de Troncal SIP y una base de red preparada para dar estabilidad al servicio. El proyecto fue concebido para ofrecer una plataforma más ordenada, profesional y escalable para el entorno de call center.',
            'resultados' => [
                'Mayor capacidad para escalar la operación sin comprometer estabilidad',
                'Mejor continuidad en la atención y menor dependencia de entornos improvisados',
                'Estructura tecnológica más ordenada para supervisión y crecimiento',
                'Plataforma preparada para integrar nuevas necesidades operativas',
            ],
            'tecnologias' => [
                'Troncal SIP',
                'Telefonía IP',
                'Infraestructura de Data Center',
                'Red empresarial',
            ],
            'metricas' => [
                ['label' => 'Enfoque', 'value' => 'Continuidad operativa'],
                ['label' => 'Prioridad', 'value' => 'Escalabilidad'],
                ['label' => 'Tipo de proyecto', 'value' => 'Comunicaciones'],
            ],
            'imagenes' => [
                'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1200&q=80',
            ],
        ],

        'imex-certificacion-oea' => [
            'slug' => 'imex-certificacion-oea',
            'cliente' => 'IMEX',
            'titulo' => 'Certificación OEA',
            'subtitulo' => 'Trazabilidad, respaldo y continuidad para procesos de auditoría',
            'categoria' => 'Cybersecurity',
            'impacto' => 'Trazabilidad y continuidad',
            'resumen' => 'Fortalecimiento de controles tecnológicos, respaldo de información y orden operativo para acompañar procesos de auditoría y apoyar una certificación que exige consistencia, trazabilidad y confiabilidad.',
            'hero' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1600&q=80',
            'problema' => 'IMEX requería una estructura tecnológica más sólida para responder con mayor solvencia a exigencias de auditoría y certificación. El desafío estaba en asegurar trazabilidad, respaldos confiables y una mejor capacidad para demostrar control sobre la información y continuidad en procesos críticos.',
            'solucion' => 'ALTECBOL acompañó el fortalecimiento del entorno tecnológico mediante una organización más clara de controles, mejores prácticas de respaldo y una estructura orientada a soportar auditorías con mayor seguridad. La intervención buscó reducir puntos débiles operativos y dar al cliente una base más confiable para cumplir requerimientos de certificación.',
            'resultados' => [
                'Mayor trazabilidad de la información para procesos de control',
                'Mejor soporte tecnológico para auditorías y revisiones internas',
                'Entorno más ordenado para respaldos y continuidad',
                'Reducción de vulnerabilidades asociadas a manejo disperso de información',
            ],
            'tecnologias' => [
                'Respaldos',
                'Control documental',
                'Seguridad operativa',
                'Gestión tecnológica',
            ],
            'metricas' => [
                ['label' => 'Enfoque', 'value' => 'Cumplimiento'],
                ['label' => 'Prioridad', 'value' => 'Trazabilidad'],
                ['label' => 'Tipo de proyecto', 'value' => 'Seguridad operativa'],
            ],
            'imagenes' => [
                'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1554224154-26032ffc0d07?auto=format&fit=crop&w=1200&q=80',
            ],
        ],

        'mercomex-data-center' => [
            'slug' => 'mercomex-data-center',
            'cliente' => 'Mercomex',
            'titulo' => 'Data Center',
            'subtitulo' => 'Infraestructura estable y preparada para crecimiento empresarial',
            'categoria' => 'Cloud & Data Center',
            'impacto' => 'Confiabilidad y escalabilidad',
            'resumen' => 'Implementación de una base de infraestructura orientada a disponibilidad, orden operativo y capacidad de evolución, acompañando procesos críticos y fortaleciendo la continuidad del negocio.',
            'hero' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1600&q=80',
            'problema' => 'Mercomex necesitaba consolidar una infraestructura tecnológica capaz de centralizar servicios y soportar su crecimiento con mayor confiabilidad. El objetivo era contar con una base más estable, menos expuesta a improvisación y mejor preparada para respaldar operaciones internas críticas.',
            'solucion' => 'ALTECBOL diseñó e implementó una solución de Data Center enfocada en estabilidad, organización y escalabilidad. El proyecto permitió estructurar mejor los recursos tecnológicos, habilitar una plataforma más sólida para servicios empresariales y acompañar el crecimiento con una visión de continuidad operativa.',
            'resultados' => [
                'Mayor estabilidad en la prestación de servicios internos',
                'Mejor organización de la infraestructura tecnológica',
                'Base más preparada para virtualización y expansión futura',
                'Soporte confiable para procesos empresariales sensibles',
            ],
            'tecnologias' => [
                'Servidores',
                'Virtualización',
                'Infraestructura IT',
                'Continuidad operativa',
            ],
            'metricas' => [
                ['label' => 'Enfoque', 'value' => 'Disponibilidad'],
                ['label' => 'Prioridad', 'value' => 'Crecimiento ordenado'],
                ['label' => 'Tipo de proyecto', 'value' => 'Data Center'],
            ],
            'imagenes' => [
                'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1581092919535-7146ff1a5904?auto=format&fit=crop&w=1200&q=80',
            ],
        ],

        'grupo-lucky-red-corporativa' => [
            'slug' => 'grupo-lucky-red-corporativa',
            'cliente' => 'Grupo Lucky',
            'titulo' => 'Red Corporativa Segura',
            'subtitulo' => 'Conectividad empresarial protegida, segmentada y preparada para multisede',
            'categoria' => 'Cybersecurity',
            'impacto' => 'Multisede y control total',
            'resumen' => 'Diseño de una arquitectura de red con mayor segmentación, seguridad y capacidad de integración entre áreas y sedes, elevando el nivel de control y estabilidad de la operación.',
            'hero' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=1600&q=80',
            'problema' => 'Grupo Lucky necesitaba una red corporativa más robusta para soportar una operación distribuida, con mejor seguridad, mayor control del tráfico y una base tecnológica capaz de conectar diferentes entornos de forma estable. El reto incluía reducir exposición a riesgos y mejorar la administración de la conectividad.',
            'solucion' => 'ALTECBOL desplegó una arquitectura enfocada en seguridad y conectividad empresarial, incorporando segmentación de red, virtualización de servicios, red mesh corporativa y firewalls de nueva generación. La solución buscó no solo proteger, sino también ordenar y hacer más administrable toda la infraestructura de comunicaciones.',
            'resultados' => [
                'Mejor segmentación del tráfico y mayor control de la red',
                'Mayor estabilidad para conectar áreas y sedes',
                'Reducción de riesgos asociados a entornos planos o poco protegidos',
                'Base tecnológica preparada para crecimiento y administración centralizada',
            ],
            'tecnologias' => [
                'Firewall',
                'VPN',
                'Segmentación de red',
                'Red corporativa',
            ],
            'metricas' => [
                ['label' => 'Enfoque', 'value' => 'Seguridad multisede'],
                ['label' => 'Prioridad', 'value' => 'Control total'],
                ['label' => 'Tipo de proyecto', 'value' => 'Red empresarial'],
            ],
            'imagenes' => [
                'https://images.unsplash.com/photo-1517048676732-d65bc937f952?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1597733336794-12d05021d510?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1563770660941-10a63607692e?auto=format&fit=crop&w=1200&q=80',
            ],
        ],

        'colegio-medico-scz-red-segura' => [
            'slug' => 'colegio-medico-scz-red-segura',
            'cliente' => 'Colegio Médico SCZ',
            'titulo' => 'Red Segura y Protegida',
            'subtitulo' => 'Protección de tráfico, navegación controlada y continuidad operativa',
            'categoria' => 'Cybersecurity',
            'impacto' => 'Protección y estabilidad',
            'resumen' => 'Fortalecimiento de la seguridad perimetral y del control de tráfico para brindar un entorno más estable, protegido y administrable para la operación institucional.',
            'hero' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1600&q=80',
            'problema' => 'La institución requería un entorno de conectividad más protegido frente a riesgos operativos y de navegación, manteniendo al mismo tiempo estabilidad para sus actividades diarias. Era necesario mejorar visibilidad sobre el tráfico y establecer políticas más claras para resguardar la operación.',
            'solucion' => 'ALTECBOL implementó una arquitectura de seguridad basada en firewall inteligente, políticas de filtrado y control de tráfico. La solución permitió elevar el nivel de protección del perímetro, ordenar el uso de la conectividad y ofrecer una plataforma más confiable para el funcionamiento institucional.',
            'resultados' => [
                'Mayor protección frente a riesgos de red y navegación',
                'Mejor administración del tráfico y del acceso a internet',
                'Entorno más estable para la operación diaria',
                'Menor exposición a incidentes asociados a conectividad descontrolada',
            ],
            'tecnologias' => [
                'Firewall inteligente',
                'Filtrado web',
                'Control de tráfico',
                'Seguridad perimetral',
            ],
            'metricas' => [
                ['label' => 'Enfoque', 'value' => 'Protección institucional'],
                ['label' => 'Prioridad', 'value' => 'Estabilidad'],
                ['label' => 'Tipo de proyecto', 'value' => 'Ciberseguridad'],
            ],
            'imagenes' => [
                'https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1581092921461-eab10380e5df?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1516321497487-e288fb19713f?auto=format&fit=crop&w=1200&q=80',
            ],
        ],

        'clinica-sirani-help-desk' => [
            'slug' => 'clinica-sirani-help-desk',
            'cliente' => 'Clínica Sirani',
            'titulo' => 'Help Desk y Soporte TI',
            'subtitulo' => 'Soporte preventivo y continuidad para una operación asistencial más estable',
            'categoria' => 'Managed IT Services',
            'impacto' => 'Continuidad y soporte preventivo',
            'resumen' => 'Implementación de un esquema de soporte técnico preventivo para equipos y servidores, orientado a reducir interrupciones, mejorar tiempos de respuesta y sostener la continuidad operativa.',
            'hero' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=1600&q=80',
            'problema' => 'Clínica Sirani necesitaba reducir incidencias que afectaban el funcionamiento cotidiano de sus equipos y servicios tecnológicos. En entornos donde la continuidad es clave, las fallas no solo generan retrasos, sino también impacto directo en la operación y en la capacidad de respuesta del personal.',
            'solucion' => 'ALTECBOL implementó un modelo de Help Desk y soporte TI orientado a prevención, atención oportuna y estabilidad. El trabajo incluyó acompañamiento técnico sobre computadoras y servidores, priorizando la detección temprana de fallas, la reducción de tiempos muertos y una gestión más ordenada del soporte.',
            'resultados' => [
                'Menor exposición a fallas recurrentes por mantenimiento insuficiente',
                'Mejores tiempos de atención frente a incidentes técnicos',
                'Mayor estabilidad en equipos críticos para la operación',
                'Soporte más estructurado y preventivo para continuidad diaria',
            ],
            'tecnologias' => [
                'Help Desk',
                'Soporte TI',
                'Servidores',
                'Mantenimiento preventivo',
            ],
            'metricas' => [
                ['label' => 'Enfoque', 'value' => 'Continuidad clínica'],
                ['label' => 'Prioridad', 'value' => 'Prevención'],
                ['label' => 'Tipo de proyecto', 'value' => 'Servicios gestionados'],
            ],
            'imagenes' => [
                'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1580281657527-47b3c2d0f47f?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1516549655169-df83a0774514?auto=format&fit=crop&w=1200&q=80',
            ],
        ],

        'clifabol-atencion-automatica' => [
            'slug' => 'clifabol-atencion-automatica',
            'cliente' => 'Clifabol',
            'titulo' => 'Atención Automática con IVR',
            'subtitulo' => 'Canalización inteligente de llamadas y mejor orden en la atención',
            'categoria' => 'Enterprise Communications',
            'impacto' => 'Atención ordenada y trazable',
            'resumen' => 'Implementación de IVR y lógica de derivación para profesionalizar la atención telefónica, reducir fricción en el contacto y mejorar el control sobre el flujo de llamadas.',
            'hero' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=1600&q=80',
            'problema' => 'Clifabol necesitaba ordenar su atención telefónica y brindar una experiencia más clara a quienes se comunicaban con la empresa. El reto consistía en evitar desvíos poco eficientes, mejorar la canalización de consultas y contar con un flujo de atención más estructurado.',
            'solucion' => 'ALTECBOL implementó una solución basada en IVR y derivación inteligente, diseñada para distribuir mejor las llamadas según el tipo de requerimiento. El proyecto permitió profesionalizar la recepción telefónica, mejorar la trazabilidad del flujo de atención y sostener una operación más organizada.',
            'resultados' => [
                'Mejor distribución de llamadas hacia las áreas correspondientes',
                'Atención telefónica más ordenada y profesional',
                'Mayor trazabilidad del flujo de contacto',
                'Reducción de fricción en la experiencia de quien llama',
            ],
            'tecnologias' => [
                'IVR',
                'Telefonía IP',
                'Enrutamiento de llamadas',
                'Trazabilidad',
            ],
            'metricas' => [
                ['label' => 'Enfoque', 'value' => 'Experiencia de atención'],
                ['label' => 'Prioridad', 'value' => 'Orden operativo'],
                ['label' => 'Tipo de proyecto', 'value' => 'Comunicaciones'],
            ],
            'imagenes' => [
                'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1516321497487-e288fb19713f?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&w=1200&q=80',
            ],
        ],

        'zyra-bpo-call-center' => [
            'slug' => 'zyra-bpo-call-center',
            'cliente' => 'Zyra BPO',
            'titulo' => 'Call Center y Data Center',
            'subtitulo' => 'Infraestructura escalable para una operación BPO de alto volumen',
            'categoria' => 'Cloud & Data Center',
            'impacto' => 'Capacidad y escalabilidad',
            'resumen' => 'Implementación de una plataforma tecnológica capaz de soportar crecimiento operativo, volumen de atención y necesidades de continuidad en un entorno BPO.',
            'hero' => 'https://images.unsplash.com/photo-1520607162513-77705c0f0d4a?auto=format&fit=crop&w=1600&q=80',
            'problema' => 'Zyra BPO requería una infraestructura más sólida para acompañar una operación intensiva en atención al cliente. El desafío era disponer de una plataforma con mejor capacidad de respuesta, escalabilidad y orden técnico para sostener un entorno de alto volumen sin comprometer estabilidad.',
            'solucion' => 'ALTECBOL desarrolló una solución que combinó infraestructura de Data Center con servicios de comunicaciones basados en Troncal SIP, ofreciendo una base tecnológica más confiable para crecimiento, mejor organización operativa y continuidad en la atención.',
            'resultados' => [
                'Mayor capacidad para acompañar crecimiento de la operación BPO',
                'Base tecnológica más estable para atención de alto volumen',
                'Mejor preparación para expansión y nuevas exigencias operativas',
                'Mayor orden en la infraestructura de comunicaciones',
            ],
            'tecnologias' => [
                'BPO',
                'Troncal SIP',
                'Data Center',
                'Comunicaciones empresariales',
            ],
            'metricas' => [
                ['label' => 'Enfoque', 'value' => 'Crecimiento operativo'],
                ['label' => 'Prioridad', 'value' => 'Capacidad'],
                ['label' => 'Tipo de proyecto', 'value' => 'Infraestructura y comunicaciones'],
            ],
            'imagenes' => [
                'https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1516321310764-7f65cb26eaf6?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=1200&q=80',
            ],
        ],

        'iga-comunicaciones-seguridad' => [
            'slug' => 'iga-comunicaciones-seguridad',
            'cliente' => 'Instituto IGA',
            'titulo' => 'Comunicaciones y Seguridad',
            'subtitulo' => 'Modernización de atención telefónica y videovigilancia institucional',
            'categoria' => 'Enterprise Communications',
            'impacto' => 'Atención y videovigilancia',
            'resumen' => 'Actualización de capacidades de comunicación y supervisión visual para ofrecer una operación más moderna, organizada y alineada con necesidades institucionales.',
            'hero' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1600&q=80',
            'problema' => 'El Instituto IGA necesitaba fortalecer dos frentes clave de su operación: la atención telefónica y la supervisión de espacios internos. La necesidad apuntaba a modernizar herramientas existentes y elevar la capacidad de control y respuesta institucional.',
            'solucion' => 'ALTECBOL implementó una solución que integró IVR para mejorar la atención y actualización del sistema de videovigilancia para reforzar visibilidad y control. El proyecto fue orientado a dotar a la institución de una plataforma más moderna, funcional y acorde a sus necesidades operativas.',
            'resultados' => [
                'Atención telefónica más estructurada y profesional',
                'Mejora en la supervisión visual de espacios internos',
                'Mayor orden en la gestión de comunicaciones y seguridad',
                'Infraestructura tecnológica más actualizada y alineada a la operación',
            ],
            'tecnologias' => [
                'IVR',
                'CCTV',
                'Actualización tecnológica',
                'Comunicaciones empresariales',
            ],
            'metricas' => [
                ['label' => 'Enfoque', 'value' => 'Modernización institucional'],
                ['label' => 'Prioridad', 'value' => 'Control y atención'],
                ['label' => 'Tipo de proyecto', 'value' => 'Comunicaciones y seguridad'],
            ],
            'imagenes' => [
                'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80',
                'https://images.unsplash.com/photo-1497366412874-3415097a27e7?auto=format&fit=crop&w=1200&q=80',
            ],
        ],
    ];

    $caso = $casos[$slug] ?? null;

    $otrosCasos = collect($casos)
        ->reject(fn ($item) => $item['slug'] === $slug)
        ->take(3)
        ->values()
        ->all();
@endphp

@if(!$caso)
    <section class="bg-white py-24">
        <div class="mx-auto max-w-4xl px-6 text-center">
            <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-[1.75rem] bg-slate-100 text-3xl text-slate-700 shadow-sm">
                !
            </div>

            <h1 class="mt-6 text-3xl font-bold text-slate-900">Caso no encontrado</h1>

            <p class="mt-4 text-lg leading-8 text-slate-600">
                El caso que buscas no está disponible o el enlace no es correcto.
            </p>

            <a href="{{ route('web.casos.index') }}"
               class="mt-8 inline-flex items-center justify-center rounded-2xl bg-slate-900 px-6 py-3.5 font-semibold text-white transition duration-300 hover:-translate-y-0.5 hover:bg-[#0050b0]">
                Volver a casos de éxito
            </a>
        </div>
    </section>
@else

     <section class="relative overflow-hidden bg-slate-950 text-white ">
        <div class="absolute inset-0">
            <img src="{{ $caso['hero'] }}" alt="{{ $caso['cliente'] }}" class="h-full w-full object-cover opacity-30">
        </div>
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-[#0050b0]/80 to-slate-950/95"></div>

        <div class="relative mx-auto max-w-7xl px-6 py-5 lg:py-9 pt-28 lg:pt-28">
            

            <div class="mt-8 max-w-4xl">
                <span class="inline-flex rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm backdrop-blur">
                    {{ $caso['categoria'] }}
                </span>

                <h1 class="mt-6 text-4xl font-bold leading-tight md:text-5xl">
                    {{ $caso['cliente'] }}
                </h1>

                <p class="mt-3 text-xl text-cyan-200">
                    {{ $caso['titulo'] }}
                </p>

                <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-200">
                    {{ $caso['resumen'] }}
                </p>

                <div class="mt-8 flex flex-wrap gap-3">
                    <span class="rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm">
                        Impacto: {{ $caso['impacto'] }}
                    </span>

                    @foreach($caso['tecnologias'] as $tecnologia)
                        <span class="rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm">
                            {{ $tecnologia }}
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <section class="relative overflow-hidden bg-white py-10">
        <div class="absolute top-8 right-[8%] h-40 w-40 rounded-full bg-[#01d3d1]/10 blur-3xl"></div>
        <div class="absolute bottom-0 left-[6%] h-52 w-52 rounded-full bg-[#0050b0]/10 blur-3xl"></div>

        <div class="relative mx-auto max-w-7xl px-6">
            <div class="grid gap-8 lg:grid-cols-2">
                <div class="rounded-[2rem] border border-slate-200 bg-[linear-gradient(180deg,#ffffff_0%,#f8fafc_100%)] p-8 shadow-[0_16px_40px_rgba(15,23,42,0.05)]">
                    <span class="inline-flex items-center rounded-full border border-red-100 bg-red-50 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.18em] text-red-600">
                        El desafío
                    </span>

                    <h2 class="mt-4 text-3xl font-bold text-slate-900">
                        Necesidad del cliente
                    </h2>

                    <p class="mt-5 leading-8 text-slate-600">
                        {{ $caso['problema'] }}
                    </p>
                </div>

                <div class="rounded-[2rem] border border-slate-200 bg-[linear-gradient(180deg,#ffffff_0%,#f8fafc_100%)] p-8 shadow-[0_16px_40px_rgba(15,23,42,0.05)]">
                    <span class="inline-flex items-center rounded-full border border-emerald-100 bg-emerald-50 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.18em] text-emerald-700">
                        La solución
                    </span>

                    <h2 class="mt-4 text-3xl font-bold text-slate-900">
                        Qué implementó ALTECBOL
                    </h2>

                    <p class="mt-5 leading-8 text-slate-600">
                        {{ $caso['solucion'] }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="relative overflow-hidden bg-slate-50 py-7">
        <div class="absolute inset-0 opacity-[0.04]"
            style="background-image:
                linear-gradient(rgba(15,23,42,0.08) 1px, transparent 1px),
                linear-gradient(90deg, rgba(15,23,42,0.08) 1px, transparent 1px);
                background-size: 38px 38px;">
        </div>

        <div class="relative mx-auto max-w-7xl px-6">
            <div class="max-w-3xl">
                <span class="inline-flex items-center rounded-full border border-[#0050b0]/10 bg-white px-4 py-1.5 text-sm font-semibold uppercase tracking-[0.18em] text-[#0050b0] shadow-sm">
                    Resultados
                </span>

                <h2 class="mt-4 text-3xl font-bold text-slate-900 md:text-4xl">
                    Impacto logrado en la operación
                </h2>

                <p class="mt-5 text-slate-600 leading-8">
                    Cada implementación fue pensada para resolver una necesidad real del cliente y construir una base más confiable para su operación.
                </p>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                @foreach($caso['resultados'] as $resultado)
                    <div class="group rounded-[1.75rem] border border-slate-200 bg-white p-6 shadow-[0_12px_30px_rgba(15,23,42,0.05)] transition-all duration-300 hover:-translate-y-1 hover:border-[#01d3d1]/20 hover:shadow-[0_18px_40px_rgba(15,23,42,0.08)]">
                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-slate-900 text-lg font-bold text-white transition duration-300 group-hover:bg-[#0050b0]">
                            ✓
                        </div>

                        <p class="mt-4 leading-7 text-slate-700">
                            {{ $resultado }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white py-20">
        <div class="mx-auto max-w-7xl px-6">
            <div class="grid gap-8 lg:grid-cols-[.95fr_1.05fr] lg:items-start">
                <div class="rounded-[2rem] border border-slate-200 bg-[linear-gradient(180deg,#ffffff_0%,#f8fafc_100%)] p-8 shadow-[0_16px_40px_rgba(15,23,42,0.05)]">
                    <span class="inline-flex items-center rounded-full border border-slate-200 bg-white px-4 py-1.5 text-sm font-semibold uppercase tracking-[0.18em] text-slate-700">
                        Tecnologías involucradas
                    </span>

                    <h2 class="mt-4 text-3xl font-bold text-slate-900">
                        Componentes clave del proyecto
                    </h2>

                    <p class="mt-5 leading-8 text-slate-600">
                        Estas tecnologías y líneas de trabajo permitieron estructurar una solución sólida, alineada a los objetivos operativos del cliente.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-3">
                        @foreach($caso['tecnologias'] as $tecnologia)
                            <span class="inline-flex items-center rounded-full border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-medium text-slate-700">
                                {{ $tecnologia }}
                            </span>
                        @endforeach
                    </div>
                </div>

                <div class="rounded-[2rem] border border-slate-200 bg-slate-900 p-8 text-white shadow-[0_18px_50px_rgba(15,23,42,0.18)]">
                    <span class="inline-flex items-center rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-sm font-semibold uppercase tracking-[0.18em] text-cyan-200">
                        Lectura estratégica
                    </span>

                    <h2 class="mt-4 text-3xl font-bold">
                        Más que tecnología: una base para operar mejor
                    </h2>

                    <p class="mt-5 leading-8 text-slate-300">
                        En este caso, la tecnología no se planteó como un fin aislado, sino como una herramienta para mejorar continuidad, control, seguridad y capacidad de respuesta. Ese enfoque es el que permite que una implementación genere valor real en la empresa y no se quede solo en la parte técnica.
                    </p>

                    <div class="mt-6 rounded-[1.5rem] border border-white/10 bg-white/[0.04] p-5">
                        <div class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-400">
                            Resultado de negocio
                        </div>
                        <p class="mt-3 text-sm leading-7 text-slate-200">
                            Una operación más sólida, mejor preparada para crecer y con una infraestructura alineada a necesidades reales del cliente.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-5">
        <div class="mx-auto max-w-7xl px-6">
            <div class="max-w-3xl">
                <span class="inline-flex items-center rounded-full border border-[#0050b0]/10 bg-slate-50 px-4 py-1.5 text-sm font-semibold uppercase tracking-[0.18em] text-[#0050b0]">
                    Galería del proyecto
                </span>

                <h2 class="mt-4 text-3xl font-bold text-slate-900 md:text-4xl">
                    Vista general del caso
                </h2>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-3">
                @foreach($caso['imagenes'] as $imagen)
                    <div class="group overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-[0_14px_34px_rgba(15,23,42,0.06)]">
                        <img src="{{ $imagen }}"
                             alt="{{ $caso['cliente'] }}"
                             class="h-72 w-full object-cover transition duration-700 group-hover:scale-105">
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @if(count($otrosCasos))
        <section class="relative overflow-hidden bg-[linear-gradient(180deg,#f8fafc_0%,#ffffff_100%)] py-9">
            <div class="absolute top-0 right-0 h-72 w-72 rounded-full bg-[#01d3d1]/10 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 h-72 w-72 rounded-full bg-[#0050b0]/10 blur-3xl"></div>

            <div class="relative mx-auto max-w-7xl px-6">
                <div class="max-w-3xl">
                    <span class="inline-flex items-center rounded-full border border-slate-200 bg-white px-4 py-1.5 text-sm font-semibold uppercase tracking-[0.18em] text-slate-700 shadow-sm">
                        Más casos de éxito
                    </span>

                    <h2 class="mt-4 text-3xl font-bold text-slate-900 md:text-4xl">
                        Otros proyectos que también resolvieron retos empresariales reales
                    </h2>
                </div>

                <div class="mt-12 grid gap-8 md:grid-cols-2 xl:grid-cols-3">
                    @foreach($otrosCasos as $item)
                        <a href="{{ route('web.casos.show', $item['slug']) }}"
                           class="group block overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-[0_16px_40px_rgba(15,23,42,0.06)] transition-all duration-300 hover:-translate-y-1.5 hover:shadow-[0_24px_50px_rgba(15,23,42,0.1)]">
                            <div class="relative overflow-hidden">
                                <img src="{{ $item['hero'] }}"
                                     alt="{{ $item['cliente'] }}"
                                     class="h-56 w-full object-cover transition duration-700 group-hover:scale-105">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-slate-950/10 to-transparent"></div>

                                <div class="absolute right-5 top-5">
                                    <span class="inline-flex rounded-full border border-white/60 bg-white/90 px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.16em] text-[#0050b0]">
                                        {{ $item['categoria'] }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-7">
                                <div class="text-sm font-semibold uppercase tracking-[0.16em] text-[#0050b0]">
                                    {{ $item['cliente'] }}
                                </div>

                                <h3 class="mt-3 text-2xl font-bold leading-tight text-slate-900 transition duration-300 group-hover:text-[#0050b0]">
                                    {{ $item['titulo'] }}
                                </h3>

                                <p class="mt-4 text-sm leading-8 text-slate-600">
                                    {{ $item['resumen'] }}
                                </p>

                                <div class="mt-5 inline-flex items-center gap-2 font-semibold text-[#0050b0]">
                                    Ver caso
                                    <span class="transition duration-300 group-hover:translate-x-1">→</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="relative overflow-hidden bg-white pb-20 pt-6">
        <div class="mx-auto max-w-7xl px-6">
            <div class="overflow-hidden rounded-[2.25rem] border border-slate-200 bg-[#0b1120] text-white shadow-[0_24px_70px_rgba(15,23,42,0.22)]">
                <div class="relative">
                    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(1,211,209,0.14),transparent_24%),radial-gradient(circle_at_bottom_right,rgba(0,80,176,0.18),transparent_28%)]"></div>
                    <div class="absolute inset-0 opacity-[0.08]"
                        style="background-image:
                            linear-gradient(rgba(255,255,255,0.08) 1px, transparent 1px),
                            linear-gradient(90deg, rgba(255,255,255,0.08) 1px, transparent 1px);
                            background-size: 36px 36px;">
                    </div>

                    <div class="relative grid items-center gap-8 p-8 md:p-10 lg:grid-cols-[1.15fr_.85fr] lg:p-14">
                        <div class="max-w-2xl">
                            <span class="inline-flex items-center rounded-full border border-white/10 bg-white/5 px-4 py-1.5 text-sm font-semibold uppercase tracking-[0.18em] text-cyan-200">
                                ¿Necesitas una solución similar?
                            </span>

                            <h2 class="mt-4 text-3xl font-bold tracking-tight md:text-4xl">
                                Convirtamos tu necesidad operativa en una solución tecnológica sólida
                            </h2>

                            <p class="mt-5 leading-8 text-slate-300">
                                En ALTECBOL diseñamos soluciones empresariales enfocadas en continuidad, seguridad, comunicaciones e infraestructura. Analizamos el contexto real de tu empresa para proponer una implementación clara, profesional y preparada para crecer contigo.
                            </p>
                        </div>

                        <div class="lg:pl-8">
                            <div class="rounded-[1.75rem] border border-white/10 bg-white/[0.04] p-6 backdrop-blur-sm">
                                <div class="text-xs font-semibold uppercase tracking-[0.16em] text-slate-400">
                                    Podemos ayudarte con
                                </div>

                                <div class="mt-4 flex flex-wrap gap-2">
                                    <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-sm text-slate-200">Infraestructura TI</span>
                                    <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-sm text-slate-200">Redes empresariales</span>
                                    <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-sm text-slate-200">Telefonía IP</span>
                                    <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-sm text-slate-200">Ciberseguridad</span>
                                    <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-sm text-slate-200">Soporte técnico</span>
                                    <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1.5 text-sm text-slate-200">Data Center</span>
                                </div>

                                <div class="mt-6 flex flex-col gap-4 sm:flex-row">
                                    <a href="{{ route('web.contacto') }}"
                                       class="inline-flex items-center justify-center rounded-2xl bg-white px-6 py-3.5 font-semibold text-slate-900 transition-all duration-300 hover:-translate-y-0.5 hover:bg-cyan-50">
                                        Solicitar asesoría
                                    </a>

                                    <a href="{{ route('web.servicios') }}"
                                       class="inline-flex items-center justify-center rounded-2xl border border-white/15 bg-white/5 px-6 py-3.5 font-semibold text-white transition-all duration-300 hover:-translate-y-0.5 hover:bg-white/10">
                                        Ver servicios
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endif

@endsection