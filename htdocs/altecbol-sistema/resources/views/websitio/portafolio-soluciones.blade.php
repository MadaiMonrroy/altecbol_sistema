<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Altecbol | Portafolio de Soluciones</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/websitio/css/styles.css?v={{ filemtime(public_path('websitio/css/styles.css')) }}">
    <style>
        html, body {
        margin: 0;
        padding: 0;
        background-color: #050b14;
        color: #eaeaea;
        min-height: 100%;
    }

    body {
        background:
            radial-gradient(circle at top, rgba(1, 211, 209, 0.08), transparent 28%),
            linear-gradient(180deg, #050b14 0%, #07111f 100%);
        font-family: Arial, sans-serif;
    }

        .tech-grid {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(1, 211, 209, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(1, 211, 209, 0.05) 1px, transparent 1px);
            background-size: 26px 26px;
            mask-image: radial-gradient(circle at center, black 45%, transparent 100%);
            pointer-events: none;
            z-index: 0;
        }

        .glass {
            background: rgba(7, 14, 25, 0.88);
            border: 1px solid rgba(1, 211, 209, 0.16);
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
        }

        .service-card {
            background: linear-gradient(180deg, rgba(0, 80, 176, 0.16), rgba(1, 211, 209, 0.04));
            border: 1px solid rgba(1, 211, 209, 0.15);
            transition: 0.25s ease;
            overflow: hidden;
        }

        .service-card:hover {
            transform: translateY(-5px);
            border-color: rgba(1, 211, 209, 0.45);
            box-shadow: 0 12px 28px rgba(1, 211, 209, 0.08);
        }

        .service-card.selected {
            border-color: #01d3d1;
            box-shadow: 0 0 0 1px #01d3d1, 0 10px 28px rgba(1, 211, 209, 0.16);
        }

        .tag {
            font-size: 11px;
            letter-spacing: .08em;
            text-transform: uppercase;
            padding: 6px 10px;
            border-radius: 999px;
            border: 1px solid rgba(1, 211, 209, 0.18);
            background: rgba(0, 80, 176, 0.12);
            color: #01d3d1;
        }

        .primary-btn {
            background: linear-gradient(90deg, #0050b0, #01d3d1);
            color: #041019;
            font-weight: 700;
            transition: .25s ease;
        }

        .primary-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(1, 211, 209, 0.18);
        }

        .secondary-btn {
            border: 1px solid rgba(1, 211, 209, 0.18);
            color: #01d3d1;
            background: rgba(0, 80, 176, 0.10);
            transition: .25s ease;
        }

        .secondary-btn:hover {
            background: rgba(1, 211, 209, 0.10);
            color: #fff;
        }

        .service-image {
            height: 210px;
            width: 100%;
            object-fit: cover;
            display: block;
        }

        .check-badge {
            position: absolute;
            top: 14px;
            right: 14px;
            width: 36px;
            height: 36px;
            border-radius: 999px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(5, 11, 20, 0.85);
            border: 1px solid rgba(1, 211, 209, 0.25);
            color: #01d3d1;
        }

        .floating-cart {
            position: sticky;
            bottom: 20px;
            z-index: 30;
        }

        .mini-note {
            color: #9ca3af;
            font-size: 13px;
            line-height: 1.6;
        }
        /* CARD DESTACADA */
.featured-card {
    border: 1px solid rgba(1, 211, 209, 0.45);
    background:
        radial-gradient(circle at top right, rgba(1,211,209,0.15), transparent 35%),
        linear-gradient(180deg, rgba(0,80,176,0.25), rgba(1,211,209,0.06));

    box-shadow:
        0 0 0 1px rgba(1,211,209,0.15),
        0 20px 40px rgba(0,0,0,0.35);

    transition: all .35s ease;
    overflow: hidden;
}

/* HOVER */
.featured-card:hover {
    transform: translateY(-8px) scale(1.02);

    box-shadow:
        0 0 18px rgba(1,211,209,0.25),
        0 25px 45px rgba(0,0,0,0.4);

    border-color: #01d3d1;
}


/* GLOW SUAVE */
.feature-glow {
    position: absolute;
    inset: 0;
    pointer-events: none;

    background: radial-gradient(
        circle at top right,
        rgba(1,211,209,0.25),
        transparent 40%
    );

    animation: glowPulse 3s ease-in-out infinite;

    z-index: 1;
}

@keyframes glowPulse {

    0%,100%{
        opacity:0.6;
    }

    50%{
        opacity:1;
    }

}


/* BADGE DESTACADO */
.featured-label {

    display: inline-flex;
    align-items: center;
    gap:8px;

    background: linear-gradient(90deg,#01d3d1,#0050b0);

    color:#041019;

    font-size:11px;
    font-weight:800;

    padding:7px 12px;

    border-radius:999px;

    letter-spacing:.08em;

    box-shadow:0 8px 18px rgba(1,211,209,0.2);
}


/* BENEFICIOS */
.mini-benefit-card {

    display:flex;
    align-items:flex-start;
    gap:10px;

    padding:12px;

    border-radius:12px;

    background:rgba(255,255,255,0.03);

    border:1px solid rgba(1,211,209,0.12);

    font-size:13px;

    color:#d1d5db;

    transition:.25s ease;
}

/* Hover beneficio */
.mini-benefit-card:hover{

    transform:translateY(-2px);

    border-color:rgba(1,211,209,0.35);

    background:rgba(1,211,209,0.05);
}

.mini-benefit-card i{

    color:#01d3d1;

    font-size:14px;

    margin-top:3px;
}


/* CHECK DE SELECCIÓN */
.check-badge{

    position:absolute;

    top:14px;
    right:14px;

    width:36px;
    height:36px;

    border-radius:50%;

    display:flex;
    align-items:center;
    justify-content:center;

    background:rgba(5,11,20,0.9);

    border:1px solid rgba(1,211,209,0.3);

    color:#01d3d1;

    font-size:14px;
}


/* TAGS */
.tag{

    font-size:11px;

    letter-spacing:.08em;

    padding:5px 10px;

    border-radius:999px;

    border:1px solid rgba(1,211,209,0.18);

    background:rgba(0,80,176,0.12);

    color:#01d3d1;
}


/* BOTON PRINCIPAL */
.primary-btn{

    background:linear-gradient(90deg,#0050b0,#01d3d1);

    color:#041019;

    font-weight:700;

    transition:.25s ease;
}

.primary-btn:hover{

    transform:translateY(-2px);

    box-shadow:0 10px 20px rgba(1,211,209,0.18);
}


/* BOTON SECUNDARIO */
.secondary-btn{

    border:1px solid rgba(1,211,209,0.2);

    color:#01d3d1;

    background:rgba(0,80,176,0.08);

    transition:.25s ease;
}

.secondary-btn:hover{

    background:rgba(1,211,209,0.12);

    color:white;
}


/* IMAGEN SERVICIO */
.service-image{

    width:100%;
    height:200px;

    object-fit:cover;

    display:block;
}
    </style>
</head>

<body class="min-h-screen relative px-4 py-8">
    <div class="tech-grid"></div>

    <div class="max-w-7xl mx-auto relative z-10 ">
        <div class="fade-in">
        <!-- Header -->
        <section class="glass rounded-3xl p-6 md:p-8 mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <a href="{{ route('mini.home') }}"
                            class="secondary-btn inline-flex items-center justify-center w-11 h-11 rounded-xl">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <span class="tag">ALTECBOL</span>
       
                        <span class="tag">SOLUCIONES EMPRESARIALES</span>
                    </div>

                    <h1 class="text-3xl md:text-5xl font-extrabold text-white leading-tight">
                        Soluciones tecnológicas pensadas para empresas
                    </h1>

                    <p class="text-gray-300 mt-4 max-w-4xl leading-relaxed text-base md:text-lg">
                        Aquí puedes ver de forma clara qué hacemos, para qué sirve cada solución y cuál puede ayudarte
                        según la necesidad de tu empresa. Selecciona uno o varios servicios y te ayudamos a evaluar la
                        mejor opción.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-3">
                    <button onclick="abrirYDescargarPDF('{{ asset('websitio/docs/portafolio.servicios.pdf') }}')"
                        class="primary-btn px-5 py-3 rounded-xl inline-flex items-center justify-center gap-2">
                        <i class="fas fa-file-pdf"></i>
                        Descargar y abrir PDF
                    </button>

                    <a href="https://wa.me/59164347465?text=Hola,%20quiero%20informaci%C3%B3n%20sobre%20sus%20soluciones%20TI"
                        target="_blank"
                        class="secondary-btn px-5 py-3 rounded-xl inline-flex items-center justify-center gap-2">
                        <i class="fab fa-whatsapp"></i>
                        Solicitar información
                    </a>
                </div>
            </div>
        </section>

        <!-- Intro rápida -->
        <section class="grid md:grid-cols-3 gap-5 mb-8">
            <div class="glass rounded-2xl p-5">
                <div class="text-[#01d3d1] text-2xl mb-3"><i class="fas fa-building"></i></div>
                <h3 class="font-bold text-white text-lg mb-2">Para dueños y gerencia</h3>
                <p class="mini-note">
                    Explicamos cada servicio en palabras simples: qué problema resuelve, por qué lo necesitarías y qué
                    beneficio trae a tu empresa.
                </p>
            </div>

            <div class="glass rounded-2xl p-5">
                <div class="text-[#01d3d1] text-2xl mb-3"><i class="fas fa-layer-group"></i></div>
                <h3 class="font-bold text-white text-lg mb-2">Puedes elegir varios</h3>
                <p class="mini-note">
                    Selecciona los servicios que te interesan. Por ejemplo: red + soporte técnico + servidores +
                    monitoreo.
                </p>
            </div>

            <div class="glass rounded-2xl p-5">
                <div class="text-[#01d3d1] text-2xl mb-3"><i class="fas fa-cloud"></i></div>
                <h3 class="font-bold text-white text-lg mb-2">Promoción principal</h3>
                <p class="mini-note">
                    Destacamos especialmente el alquiler de servidores en la nube para empresas que necesitan publicar
                    su sistema sin invertir en infraestructura propia.
                </p>
            </div>
        </section>
</div>
        <!-- Servicios -->
        <section class="grid md:grid-cols-2 xl:grid-cols-3 gap-6" id="servicesGrid">

            <!-- 1 NUBE -->
            <article class="service-card featured-card rounded-2xl relative" data-service="Tu sistema en la nube">

    <!-- Glow efecto -->
    <div class="feature-glow"></div>

    <!-- Etiqueta destacada -->
    <div class="absolute top-4 left-4 z-20">
        <span class="featured-label">
            <i class="fas fa-star"></i> SOLUCIÓN DESTACADA
        </span>
    </div>

    <!-- Check selección -->
    <div class="check-badge">
        <i class="fas fa-check"></i>
    </div>

    <!-- Imagen -->
    <img src="{{ asset('websitio/img/soluciones/tu_sistema_nube.png') }}" alt="Tu sistema en la nube" class="service-image">

    <!-- Contenido -->
    <div class="p-6 relative z-10">

        <div class="flex items-center gap-2 mb-3 flex-wrap">
            <span class="tag">NUBE</span>
            <span class="tag">INFRAESTRUCTURA</span>
            <span class="tag">EMPRESAS</span>
        </div>

        <h3 class="text-2xl md:text-3xl font-bold text-white mb-3">
            Tu sistema en la nube
        </h3>

        <p class="text-gray-200 text-sm leading-relaxed mb-5">
            Aloja tu sistema en una infraestructura lista para operar sin tener que comprar un servidor propio ni invertir en hardware costoso.
        </p>

        <div class="space-y-3 text-sm text-gray-300 mb-5">

            <p>
                <strong class="text-white">¿Para qué lo necesitarías?</strong><br>
                 Para alojar tu sistema, base de datos o aplicación empresarial en un entorno profesional, estable y preparado para operar.
            </p>

            <p>
                <strong class="text-white">¿Qué beneficio te da?</strong><br>
                Evitas una inversión alta en hardware propio, reduces complicaciones técnicas y puedes poner tu sistema en funcionamiento sobre una infraestructura lista.
            </p>

            <p>
                <strong class="text-white">Ideal si:</strong><br>
                Tu empresa tiene un ERP, CRM, sistema administrativo, software contable, call center o plataforma interna y no quiere comprar un servidor físico para operarlo.
            </p>

        </div>

        <!-- Beneficios rápidos -->
        <div class="grid grid-cols-2 gap-3 mb-5">

            <div class="mini-benefit-card">
                <i class="fas fa-memory"></i>
                <span>Evita comprar RAM o Discos de Servidor</span>
            </div>

            <div class="mini-benefit-card">
                <i class="fas fa-bolt"></i>
                <span>Sin montar UPS o respaldo eléctrico</span>
            </div>

        </div>

        <!-- Botones -->
        <div class="flex gap-3 flex-wrap">

            <button onclick="toggleService(this)"
                class="primary-btn px-4 py-2 rounded-lg text-sm">
                Seleccionar
            </button>

            <a href="https://wa.me/59164347465?text=Hola,%20quiero%20informaci%C3%B3n%20sobre%20tener%20mi%20sistema%20en%20la%20nube"
                target="_blank"
                class="secondary-btn px-4 py-2 rounded-lg text-sm">
                Más información
            </a>

        </div>

    </div>

</article>

            <!-- 2 REDES -->
            <article class="service-card rounded-2xl relative" data-service="Redes e infraestructura">
                <div class="check-badge"><i class="fas fa-check"></i></div>
                <img src="{{ asset('websitio/img/soluciones/redes_infraestructura.png') }}" alt="Redes e infraestructura empresarial" class="service-image">

                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="tag">INTERNET</span>
                        <span class="tag">REDES</span>
                    </div>

                    <h3 class="text-2xl font-bold text-white mb-3">Redes e infraestructura</h3>

                    <p class="text-gray-300 text-sm leading-relaxed mb-4">
                        Sí, aquí entra todo lo relacionado con internet, Wi-Fi, cableado, equipos de red y el orden de
                        la infraestructura tecnológica de tu empresa.
                    </p>

                    <div class="space-y-3 text-sm text-gray-300 mb-5">
                        <p><strong class="text-white">¿Para qué lo necesitarías?</strong><br>
                            Para que el internet funcione bien, el Wi-Fi tenga cobertura adecuada y tus equipos estén
                            conectados de forma ordenada y segura.</p>

                        <p><strong class="text-white">¿Qué beneficio te da?</strong><br>
                            Menos caídas, mejor velocidad, mejor cobertura y una red preparada para oficinas, call
                            centers o áreas críticas.</p>

                        <p><strong class="text-white">Ideal si:</strong><br>
                            Tienes internet lento, mala señal Wi-Fi, cableado desordenado o problemas constantes de
                            conexión.</p>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-5">
                        <span class="tag">Wi-Fi corporativo</span>
                        <span class="tag">Cableado</span>
                        <span class="tag">Routers y switches</span>
                        <span class="tag">Firewall</span>
                    </div>

                    <div class="flex gap-3">
                        <button onclick="toggleService(this)" class="primary-btn px-4 py-2 rounded-lg text-sm">
                            Seleccionar
                        </button>
                        <a href="https://wa.me/59164347465?text=Hola,%20quiero%20m%C3%A1s%20informaci%C3%B3n%20sobre%20redes%20e%20infraestructura"
                            target="_blank" class="secondary-btn px-4 py-2 rounded-lg text-sm">
                            Más información
                        </a>
                    </div>
                </div>
            </article>

            <!-- 3 SOPORTE -->
            <article class="service-card rounded-2xl relative" data-service="Soporte técnico">
                <div class="check-badge"><i class="fas fa-check"></i></div>
                <img src="{{ asset('websitio/img/soluciones/soporte_tecnico.png') }}" alt="Soporte técnico empresarial" class="service-image">

                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="tag">SOPORTE</span>
                        <span class="tag">USUARIOS</span>
                    </div>

                    <h3 class="text-2xl font-bold text-white mb-3">Soporte técnico</h3>

                    <p class="text-gray-300 text-sm leading-relaxed mb-4">
                        Servicio pensado para empresas que necesitan ayuda constante con computadoras, software,
                        impresoras, accesos, problemas del día a día y atención a usuarios.
                    </p>

                    <div class="space-y-3 text-sm text-gray-300 mb-5">
                        <p><strong class="text-white">¿Para qué lo necesitarías?</strong><br>
                            Para resolver fallas en equipos, ayudar a tu personal y mantener la operación sin
                            interrupciones innecesarias.</p>

                        <p><strong class="text-white">¿Qué beneficio te da?</strong><br>
                            Menos tiempo perdido, respuesta más rápida ante incidentes y equipos más estables para tu
                            personal.</p>

                        <p><strong class="text-white">Ideal si:</strong><br>
                            Tus colaboradores reportan problemas frecuentes con laptops, impresoras, programas o acceso
                            a sistemas.</p>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-5">
                        <span class="tag">Remoto y en sitio</span>
                        <span class="tag">Impresoras</span>
                        <span class="tag">Software</span>
                        <span class="tag">Usuarios</span>
                    </div>

                    <div class="flex gap-3">
                        <button onclick="toggleService(this)" class="primary-btn px-4 py-2 rounded-lg text-sm">
                            Seleccionar
                        </button>
                        <a href="https://wa.me/59169913298?text=Hola,%20quiero%20m%C3%A1s%20informaci%C3%B3n%20sobre%20soporte%20t%C3%A9cnico"
                            target="_blank" class="secondary-btn px-4 py-2 rounded-lg text-sm">
                            Más información
                        </a>
                    </div>
                </div>
            </article>

            <!-- 4 SERVIDORES -->
            <article class="service-card rounded-2xl relative" data-service="Servidores y virtualización">
                <div class="check-badge"><i class="fas fa-check"></i></div>
                <img src="{{ asset('websitio/img/soluciones/servidores_virtualizacion.png') }}" alt="Servidores y virtualización" class="service-image">

                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="tag">SERVIDORES</span>
                        <span class="tag">VIRTUALIZACIÓN</span>
                    </div>

                    <h3 class="text-2xl font-bold text-white mb-3">Servidores y virtualización</h3>

                    <p class="text-gray-300 text-sm leading-relaxed mb-4">
                        Un servidor permite centralizar sistemas, usuarios, archivos, bases de datos y servicios clave
                        de la empresa en un entorno más ordenado y controlado.
                    </p>

                    <div class="space-y-3 text-sm text-gray-300 mb-5">
                        <p><strong class="text-white">¿Para qué lo necesitarías?</strong><br>
                            Para alojar sistemas, bases de datos, usuarios, respaldos, dominio, archivos compartidos o
                            aplicaciones internas.</p>

                        <p><strong class="text-white">¿Qué beneficio te da?</strong><br>
                            Más control, más seguridad, mejor administración y la posibilidad de que varios servicios
                            trabajen en una sola infraestructura.</p>

                        <p><strong class="text-white">Ideal si:</strong><br>
                            Tu empresa ya tiene varios usuarios, sistemas o necesita centralizar procesos importantes.
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-5">
                        <span class="tag">Linux / Windows</span>
                        <span class="tag">AD</span>
                        <span class="tag">Backups</span>
                        <span class="tag">Proxmox / VMware</span>
                    </div>

                    <div class="flex gap-3">
                        <button onclick="toggleService(this)" class="primary-btn px-4 py-2 rounded-lg text-sm">
                            Seleccionar
                        </button>
                        <a href="https://wa.me/59164347465?text=Hola,%20quiero%20m%C3%A1s%20informaci%C3%B3n%20sobre%20servidores%20y%20virtualizaci%C3%B3n"
                            target="_blank" class="secondary-btn px-4 py-2 rounded-lg text-sm">
                            Más información
                        </a>
                    </div>
                </div>
            </article>

            <!-- 5 MONITOREO -->
            <article class="service-card rounded-2xl relative" data-service="Monitoreo y continuidad operativa">
                <div class="check-badge"><i class="fas fa-check"></i></div>
                <img src="{{ asset('websitio/img/soluciones/monitoreo.png') }}" alt="Monitoreo y continuidad operativa" class="service-image">

                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="tag">MONITOREO</span>
                        <span class="tag">CONTINUIDAD</span>
                    </div>

                    <h3 class="text-2xl font-bold text-white mb-3">Monitoreo y continuidad operativa</h3>

                    <p class="text-gray-300 text-sm leading-relaxed mb-4">
                        Supervisamos servicios, red y servidores para detectar incidentes a tiempo y reducir el impacto
                        de las caídas en la operación.
                    </p>

                    <div class="space-y-3 text-sm text-gray-300 mb-5">
                        <p><strong class="text-white">¿Para qué lo necesitarías?</strong><br>
                            Para saber cuándo algo falla, cuándo un servicio se cae o cuándo tu infraestructura empieza
                            a tener problemas.</p>

                        <p><strong class="text-white">¿Qué beneficio te da?</strong><br>
                            Reacción más rápida, mejor control y menos sorpresas que afecten la productividad.</p>

                        <p><strong class="text-white">Ideal si:</strong><br>
                            Dependes de sistemas, internet, servidores o servicios que deben estar siempre disponibles.
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-5">
                        <span class="tag">Alertas</span>
                        <span class="tag">Disponibilidad</span>
                        <span class="tag">Eventos</span>
                        <span class="tag">Supervisión</span>
                    </div>

                    <div class="flex gap-3">
                        <button onclick="toggleService(this)" class="primary-btn px-4 py-2 rounded-lg text-sm">
                            Seleccionar
                        </button>
                        <a href="https://wa.me/59169913298?text=Hola,%20quiero%20m%C3%A1s%20informaci%C3%B3n%20sobre%20monitoreo%20y%20continuidad%20operativa"
                            target="_blank" class="secondary-btn px-4 py-2 rounded-lg text-sm">
                            Más información
                        </a>
                    </div>
                </div>
            </article>

            <!-- 6 TELEFONIA -->
            <article class="service-card rounded-2xl relative" data-service="Telefonía IP y call center">
                <div class="check-badge"><i class="fas fa-check"></i></div>
                <img src="{{ asset('websitio/img/soluciones/telefonia_ip.png') }}" alt="Telefonía IP y call center" class="service-image">

                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="tag">LLAMADAS</span>
                        <span class="tag">CALL CENTER</span>
                    </div>

                    <h3 class="text-2xl font-bold text-white mb-3">Telefonía IP y call center</h3>

                    <p class="text-gray-300 text-sm leading-relaxed mb-4">
                        Solución para empresas que quieren mejorar su atención telefónica, ordenar llamadas y tener una
                        operación más profesional.
                    </p>

                    <div class="space-y-3 text-sm text-gray-300 mb-5">
                        <p><strong class="text-white">¿Para qué lo necesitarías?</strong><br>
                            Para tener extensiones, IVR, grabaciones, colas de llamadas y una mejor distribución de la
                            atención.</p>

                        <p><strong class="text-white">¿Qué beneficio te da?</strong><br>
                            Mejor experiencia para el cliente, más control sobre la operación y mejor trazabilidad.</p>

                        <p><strong class="text-white">Ideal si:</strong><br>
                            Recibes muchas llamadas o tu empresa necesita una central telefónica moderna.</p>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-5">
                        <span class="tag">PBX IP</span>
                        <span class="tag">IVR</span>
                        <span class="tag">SIP</span>
                        <span class="tag">Grabaciones</span>
                    </div>

                    <div class="flex gap-3">
                        <button onclick="toggleService(this)" class="primary-btn px-4 py-2 rounded-lg text-sm">
                            Seleccionar
                        </button>
                        <a href="https://wa.me/59164347465?text=Hola,%20quiero%20m%C3%A1s%20informaci%C3%B3n%20sobre%20telefon%C3%ADa%20IP%20y%20call%20center"
                            target="_blank" class="secondary-btn px-4 py-2 rounded-lg text-sm">
                            Más información
                        </a>
                    </div>
                </div>
            </article>

            <!-- 7 CCTV -->
            <article class="service-card rounded-2xl relative" data-service="Videovigilancia y control de acceso">
                <div class="check-badge"><i class="fas fa-check"></i></div>
                <img src="{{ asset('websitio/img/soluciones/videovigilancia_acceso.png') }}" alt="Videovigilancia y control de acceso" class="service-image">

                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="tag">SEGURIDAD</span>
                        <span class="tag">CCTV</span>
                    </div>

                    <h3 class="text-2xl font-bold text-white mb-3">Videovigilancia y control de acceso</h3>

                    <p class="text-gray-300 text-sm leading-relaxed mb-4">
                        Protege instalaciones, controla accesos y mejora la supervisión de lo que ocurre en oficinas,
                        plantas o puntos de atención.
                    </p>

                    <div class="space-y-3 text-sm text-gray-300 mb-5">
                        <p><strong class="text-white">¿Para qué lo necesitarías?</strong><br>
                            Para ver lo que sucede en tus instalaciones, tener evidencia y controlar entradas y
                            salidas.</p>

                        <p><strong class="text-white">¿Qué beneficio te da?</strong><br>
                            Mayor seguridad, supervisión y trazabilidad ante incidentes.</p>

                        <p><strong class="text-white">Ideal si:</strong><br>
                            Quieres reforzar seguridad, controlar personal o vigilar puntos críticos de la empresa.</p>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-5">
                        <span class="tag">Cámaras IP</span>
                        <span class="tag">NVR</span>
                        <span class="tag">Biométrico</span>
                        <span class="tag">RFID</span>
                    </div>

                    <div class="flex gap-3">
                        <button onclick="toggleService(this)" class="primary-btn px-4 py-2 rounded-lg text-sm">
                            Seleccionar
                        </button>
                        <a href="https://wa.me/59164347465?text=Hola,%20quiero%20m%C3%A1s%20informaci%C3%B3n%20sobre%20videovigilancia%20y%20control%20de%20acceso"
                            target="_blank" class="secondary-btn px-4 py-2 rounded-lg text-sm">
                            Más información
                        </a>
                    </div>
                </div>
            </article>

            <!-- 8 CORREO -->
            <article class="service-card rounded-2xl relative" data-service="Correo corporativo y productividad">
                <div class="check-badge"><i class="fas fa-check"></i></div>
                <img src="{{ asset('websitio/img/soluciones/correo_productividad.png') }}" alt="Correo corporativo y productividad" class="service-image">

                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="tag">PRODUCTIVIDAD</span>
                        <span class="tag">CORREO</span>
                    </div>

                    <h3 class="text-2xl font-bold text-white mb-3">Correo corporativo y productividad</h3>

                    <p class="text-gray-300 text-sm leading-relaxed mb-4">
                        Una empresa se ve más formal y ordenada cuando usa correo corporativo, licencias y
                        herramientas adecuadas para trabajo colaborativo.
                    </p>

                    <div class="space-y-3 text-sm text-gray-300 mb-5">
                        <p><strong class="text-white">¿Para qué lo necesitarías?</strong><br>
                            Para que tu equipo trabaje con correos empresariales, dominios propios y herramientas de
                            oficina más organizadas.</p>

                        <p><strong class="text-white">¿Qué beneficio te da?</strong><br>
                            Mejor imagen, más orden y más confianza frente a clientes y proveedores.</p>

                        <p><strong class="text-white">Ideal si:</strong><br>
                            Quieres formalizar tu empresa o mejorar cómo trabaja tu equipo.</p>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-5">
                        <span class="tag">Microsoft 365</span>
                        <span class="tag">Dominio</span>
                        <span class="tag">Hosting</span>
                        <span class="tag">Correo</span>
                    </div>

                    <div class="flex gap-3">
                        <button onclick="toggleService(this)" class="primary-btn px-4 py-2 rounded-lg text-sm">
                            Seleccionar
                        </button>
                        <a href="https://wa.me/59164347465?text=Hola,%20quiero%20m%C3%A1s%20informaci%C3%B3n%20sobre%20correo%20corporativo%20y%20productividad"
                            target="_blank" class="secondary-btn px-4 py-2 rounded-lg text-sm">
                            Más información
                        </a>
                    </div>
                </div>
            </article>

            <!-- 9 WEB Y LICENCIAS -->
            <article class="service-card rounded-2xl relative" data-service="Licencias, hosting y página web">
                <div class="check-badge"><i class="fas fa-check"></i></div>
                <img src="{{ asset('websitio/img/soluciones/licencia_hosting.png') }}" alt="Licencias hosting y desarrollo web" class="service-image">

                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="tag">WEB</span>
                        <span class="tag">LICENCIAS</span>
                    </div>

                    <h3 class="text-2xl font-bold text-white mb-3">Licencias, hosting y página web</h3>

                    <p class="text-gray-300 text-sm leading-relaxed mb-4">
                        También apoyamos a empresas con licencias, antivirus, dominio, hosting y desarrollo de páginas
                        web para fortalecer su operación digital.
                    </p>

                    <div class="space-y-3 text-sm text-gray-300 mb-5">
                        <p><strong class="text-white">¿Para qué lo necesitarías?</strong><br>
                            Para tener presencia digital, mantener licencias vigentes y operar con herramientas
                            formales.</p>

                        <p><strong class="text-white">¿Qué beneficio te da?</strong><br>
                            Más formalidad, mejor presencia comercial y herramientas legales y funcionales.</p>

                        <p><strong class="text-white">Ideal si:</strong><br>
                            Tu empresa está creciendo y quiere ordenar su parte tecnológica y comercial.</p>
                    </div>

                    <div class="flex flex-wrap gap-2 mb-5">
                        <span class="tag">Antivirus</span>
                        <span class="tag">Licencias</span>
                        <span class="tag">Web</span>
                        <span class="tag">Dominio / Hosting</span>
                    </div>

                    <div class="flex gap-3">
                        <button onclick="toggleService(this)" class="primary-btn px-4 py-2 rounded-lg text-sm">
                            Seleccionar
                        </button>
                        <a href="https://wa.me/59164347465?text=Hola,%20quiero%20m%C3%A1s%20informaci%C3%B3n%20sobre%20licencias%20hosting%20y%20p%C3%A1gina%20web"
                            target="_blank" class="secondary-btn px-4 py-2 rounded-lg text-sm">
                            Más información
                        </a>
                    </div>
                </div>
            </article>

        </section>

        <!-- Carrito / selección -->
        <section class="floating-cart mt-10">
            <div class="glass rounded-2xl p-5 md:p-6">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">
                    <div>
                        <h2 class="text-2xl font-bold text-white">Servicios seleccionados</h2>
                        <p class="text-gray-300 mt-1 text-sm">
                            Elige varios servicios y envía tu consulta con todo lo que te interesa.
                        </p>

                        <div id="selectedServicesList" class="flex flex-wrap gap-2 mt-4">
                            <span class="text-sm text-gray-400">Aún no seleccionaste servicios.</span>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <button onclick="enviarSeleccionWhatsApp()"
                            class="primary-btn px-5 py-3 rounded-xl inline-flex items-center justify-center gap-2">
                            <i class="fab fa-whatsapp"></i>
                            Solicitar cotización
                        </button>

                        <button onclick="limpiarSeleccion()"
                            class="secondary-btn px-5 py-3 rounded-xl inline-flex items-center justify-center gap-2">
                            <i class="fas fa-rotate-left"></i>
                            Limpiar selección
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA final -->
        <section class="glass rounded-3xl p-6 md:p-8 mt-8">
            <div class="grid lg:grid-cols-2 gap-6 items-center">
                <div>
                    <h2 class="text-2xl md:text-3xl font-bold text-white mb-3">
                        ¿No sabes exactamente qué necesitas?
                    </h2>
                    <p class="text-gray-300 leading-relaxed">
                        Cuéntanos qué problema tienes: internet lento, fallas en equipos, sistema que quieres subir a
                        la nube, cámaras, servidores o una operación que necesita más control. Te ayudamos a identificar
                        la mejor solución.
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 justify-start lg:justify-end">
                    <a href="https://wa.me/59164347465?text=Hola,%20quiero%20asesoramiento%20para%20mi%20empresa"
                        target="_blank"
                        class="primary-btn px-5 py-3 rounded-xl inline-flex items-center justify-center gap-2">
                        <i class="fab fa-whatsapp"></i>
                        Quiero asesoramiento
                    </a>

                    <button onclick="abrirYDescargarPDF('{{ asset('websitio/docs/portafolio.servicios.pdf') }}')"
                        class="secondary-btn px-5 py-3 rounded-xl inline-flex items-center justify-center gap-2">
                        <i class="fas fa-file-arrow-down"></i>
                        Ver PDF completo
                    </button>
                </div>
            </div>
        </section>

        <div class="text-center mt-8 text-xs text-[#01d3d1]/60">
            Altecbol © 2026 | Soluciones empresariales en infraestructura, continuidad, soporte y nube
        </div>
    </div>

    <script>
        let selectedServices = [];

        function toggleService(button) {
            const card = button.closest('.service-card');
            const serviceName = card.getAttribute('data-service');

            if (selectedServices.includes(serviceName)) {
                selectedServices = selectedServices.filter(item => item !== serviceName);
                card.classList.remove('selected');
                button.textContent = 'Seleccionar';
            } else {
                selectedServices.push(serviceName);
                card.classList.add('selected');
                button.textContent = 'Seleccionado';
            }

            renderSelectedServices();
        }

        function renderSelectedServices() {
            const container = document.getElementById('selectedServicesList');
            container.innerHTML = '';

            if (selectedServices.length === 0) {
                container.innerHTML = '<span class="text-sm text-gray-400">Aún no seleccionaste servicios.</span>';
                return;
            }

            selectedServices.forEach(service => {
                const tag = document.createElement('span');
                tag.className = 'tag';
                tag.textContent = service;
                container.appendChild(tag);
            });
        }

        function limpiarSeleccion() {
            selectedServices = [];
            document.querySelectorAll('.service-card').forEach(card => {
                card.classList.remove('selected');
            });

            document.querySelectorAll('.service-card button.primary-btn').forEach(btn => {
                btn.textContent = 'Seleccionar';
            });

            renderSelectedServices();
        }

        function enviarSeleccionWhatsApp() {
            let mensaje = 'Hola, me interesa recibir información sobre los siguientes servicios:%0A';

            if (selectedServices.length === 0) {
                mensaje = 'Hola, quiero información sobre sus soluciones tecnológicas para mi empresa.';
            } else {
                selectedServices.forEach((service, index) => {
                    mensaje += `%0A${index + 1}. ${service}`;
                });
                mensaje += '%0A%0AQuisiera una recomendación según la necesidad de mi empresa.';
            }

            window.open(`https://wa.me/59164347465?text=${mensaje}`, '_blank');
        }

        function abrirYDescargarPDF(ruta) {
            fetch(ruta)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("No se pudo obtener el PDF");
                    }
                    return response.blob();
                })
                .then((blob) => {
                    const blobURL = URL.createObjectURL(blob);

                    const link = document.createElement("a");
                    link.href = blobURL;
                    link.download = "Portafolio-Servicios-Altecbol.pdf";
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);

                    setTimeout(() => {
                        window.open(ruta, "_blank");
                    }, 700);

                    setTimeout(() => {
                        URL.revokeObjectURL(blobURL);
                    }, 4000);
                })
                .catch((error) => {
                    console.error("Error al descargar el archivo:", error);
                    alert("No se pudo descargar el PDF.");
                });
        }
    </script>
</body>

</html>