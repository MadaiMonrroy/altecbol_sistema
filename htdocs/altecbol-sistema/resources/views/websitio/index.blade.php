<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Altecbol | Site Central</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- CSS propio -->
    <link rel="stylesheet" href="/websitio/css/styles.css?v={{ filemtime(public_path('websitio/css/styles.css')) }}">
    <!-- Fuentes: Inter para lectura, JetBrains Mono para toques tecnológicos -->

</head>

<body class="min-h-screen flex justify-center py-10 px-4 relative">

    <!-- Fondo Grid -->
    <div class="tech-grid"></div>

    <!-- Contenedor Principal -->
    <div class="w-full max-w-md relative z-10">

        <!-- ==========================================
             VISTA 1: INICIO (TERMINAL PRINCIPAL)
             ========================================== -->
        <div id="view-home" class="view-section fade-in">

            <!-- Indicador de Sistema Arriba -->
            <div
                class="w-full flex justify-between items-center mb-6 font-sys text-[10px] text-[#01d3d1] tracking-widest opacity-80 border-b border-[#01d3d1]/30 pb-2">
                <span>[SYS_READY]</span>
                <span class="flex items-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-[#01d3d1] animate-pulse"></div> STATUS: SECURE
                </span>
            </div>

            <!-- Cabecera Corporativa -->
            <div class="flex flex-col items-center text-center">
                <!-- Logo Tecnológico -->
                <div class="p-1 rounded-full bg-gradient-to-br from-[#01d3d1] to-[#0050b0] neon-pulse mb-4">
                    <div class="bg-[#050b14] pl-5 rounded-full h-full w-full flex items-center justify-center">
                        <img src="{{ asset('websitio/img/logo.png') }}" alt="Logo Altecbol"
                            class="w-full h-24 object-cover">
                    </div>
                </div>

                <p class="text-[#01d3d1] font-sys text-xs tracking-wider mt-1 mb-3">&lt; IT Solutions & Security /&gt;
                </p>

                <p class="text-gray-400 mt-2 text-sm px-4 font-medium leading-relaxed">
                    Infraestructura TI, Ciberseguridad Avanzada, Data Center y Videovigilancia Corporativa.
                </p>

                <!-- Tags de Servicios (Estilo Código) -->
                <div class="flex flex-wrap justify-center gap-3 mt-6">
                    <span
                        class="font-sys text-[10px] px-2 py-1 bg-[#0050b0]/20 text-[#01d3d1] border border-[#0050b0] rounded backdrop-blur-sm"><i
                            class="fas fa-terminal mr-1"></i>SEC</span>
                    <span
                        class="font-sys text-[10px] px-2 py-1 bg-[#0050b0]/20 text-[#01d3d1] border border-[#0050b0] rounded backdrop-blur-sm"><i
                            class="fas fa-network-wired mr-1"></i>NET</span>
                    <span
                        class="font-sys text-[10px] px-2 py-1 bg-[#0050b0]/20 text-[#01d3d1] border border-[#0050b0] rounded backdrop-blur-sm"><i
                            class="fas fa-server mr-1"></i>DATA</span>
                    <span
                        class="font-sys text-[10px] px-2 py-1 bg-[#0050b0]/20 text-[#01d3d1] border border-[#0050b0] rounded backdrop-blur-sm"><i
                            class="fas fa-video mr-1"></i>CCTV</span>
                </div>

                <!-- Redes Sociales Corporativas -->
                <div
                    class="flex justify-center gap-8 mt-8 mb-10 w-full border-y border-[#0050b0]/30 py-4 bg-gradient-to-r from-transparent via-[#0050b0]/10 to-transparent">
                    <a href="https://ventas.altecbol.com.bo:8888/" target="_blank"
                        class="text-[#eaeaea] hover:text-[#01d3d1] text-2xl transition-all duration-300 hover:scale-110 hover:drop-shadow-[0_0_8px_#01d3d1]"
                        title="Web Oficial">
                        <i class="fas fa-globe"></i>
                    </a>
                    <a href="https://www.facebook.com/profile.php?id=61581125392128" target="_blank"
                        class="text-[#eaeaea] hover:text-[#01d3d1] text-2xl transition-all duration-300 hover:scale-110 hover:drop-shadow-[0_0_8px_#01d3d1]"
                        title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>

                    <a href="https://www.linkedin.com/company/altecbol/" target="_blank"
                        class="text-[#eaeaea] hover:text-[#01d3d1] text-2xl transition-all duration-300 hover:scale-110 hover:drop-shadow-[0_0_8px_#01d3d1]"
                        title="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://www.tiktok.com/@altecbol" target="_blank"
                        class="text-[#eaeaea] hover:text-[#01d3d1] text-2xl transition-all duration-300 hover:scale-110 hover:drop-shadow-[0_0_8px_#01d3d1]"
                        title="TikTok">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="https://www.instagram.com/altecbol.oficial/" target="_blank"
                        class="text-[#eaeaea] hover:text-[#01d3d1] text-2xl transition-all duration-300 hover:scale-110 hover:drop-shadow-[0_0_8px_#01d3d1]"
                        title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- Módulos de Acceso (Botones) -->
            <div class="flex flex-col gap-4 w-full">



                <!-- 2. Catálogo PDF -->
                <a href="{{ route('mini.portafolio.soluciones') }}"
                    class="hud-btn w-full py-4 px-5 rounded-lg flex items-center justify-between group cursor-pointer backdrop-blur-md text-left">
                    <div class="flex items-center gap-4">
                        <div
                            class="bg-[#0050b0]/30 p-2 rounded text-[#01d3d1] group-hover:bg-[#01d3d1] group-hover:text-[#050b14] transition-colors">
                            <i class="fas fa-file-lines text-lg w-5 text-center"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-[#eaeaea] tracking-wide text-sm">Portafolio de Soluciones</span>
                            <span class="font-sys text-[10px] text-[#01d3d1] opacity-70">Ver todas nuestras
                                soluciones</span>
                        </div>
                    </div>
                    <i
                        class="fas fa-arrow-right text-[#01d3d1] opacity-50 group-hover:opacity-100 group-hover:translate-x-1 transition-all"></i>
                </a>
                <!-- 2. Catálogo productos -->
                <a href="{{ route('mini.catalogo.index') }}"
                    class="hud-btn w-full py-4 px-5 rounded-lg flex items-center justify-between group cursor-pointer backdrop-blur-md text-left">
                    <div class="flex items-center gap-4">
                        <div
                            class="bg-[#0050b0]/30 p-2 rounded text-[#01d3d1] group-hover:bg-[#01d3d1] group-hover:text-[#050b14] transition-colors">
                            <i class="fas fa-cart-shopping text-lg w-5 text-center"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-[#eaeaea] tracking-wide text-sm">Catálogo de Productos</span>
                            <span class="font-sys text-[10px] text-[#01d3d1] opacity-70">Filtro por categoría, marca y
                                búsqueda</span>
                        </div>
                    </div>
                    <i
                        class="fas fa-arrow-right text-[#01d3d1] opacity-50 group-hover:opacity-100 group-hover:translate-x-1 transition-all"></i>
                </a>
                <!-- 3. Proyectos -->
                <a href="{{ route('mini.proyectos.destacados') }}"
                    class="hud-btn w-full py-4 px-5 rounded-lg flex items-center justify-between group cursor-pointer backdrop-blur-md text-left">
                    <div class="flex items-center gap-4">
                        <div
                            class="bg-[#0050b0]/30 p-2 rounded text-[#01d3d1] group-hover:bg-[#01d3d1] group-hover:text-[#050b14] transition-colors">
                            <i class="fas fa-project-diagram text-lg w-5 text-center"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-[#eaeaea] tracking-wide text-sm">Proyectos Destacados</span>
                            <span class="font-sys text-[10px] text-[#01d3d1] opacity-70">Ver casos de éxito
                                implementados</span>
                        </div>
                    </div>
                    <i
                        class="fas fa-arrow-right text-[#01d3d1] opacity-50 group-hover:opacity-100 group-hover:translate-x-1 transition-all"></i>
                </a>

                <!-- 4. Contactos -->
                <button onclick="switchView('view-contacts')"
                    class="hud-btn w-full py-4 px-5 rounded-lg flex items-center justify-between group cursor-pointer backdrop-blur-md text-left">
                    <div class="flex items-center gap-4">
                        <div
                            class="bg-[#0050b0]/30 p-2 rounded text-[#01d3d1] group-hover:bg-[#01d3d1] group-hover:text-[#050b14] transition-colors">
                            <i class="fas fa-headset text-lg w-5 text-center"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-[#eaeaea] tracking-wide text-sm">Centro de Soporte y
                                Contacto</span>
                            <span class="font-sys text-[10px] text-[#01d3d1] opacity-70">Conectar con ejecutivos</span>
                        </div>
                    </div>
                    <i
                        class="fas fa-satellite-dish text-[#01d3d1] opacity-50 group-hover:opacity-100 animate-pulse transition-all"></i>
                </button>

                <!-- 4. Publicaciones -->
                <button onclick="switchView('view-social')"
                    class="hud-btn w-full py-4 px-5 rounded-lg flex items-center justify-between group cursor-pointer backdrop-blur-md text-left">
                    <div class="flex items-center gap-4">
                        <div
                            class="bg-[#0050b0]/30 p-2 rounded text-[#01d3d1] group-hover:bg-[#01d3d1] group-hover:text-[#050b14] transition-colors">
                            <i class="fas fa-bullhorn text-lg w-5 text-center"></i>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-[#eaeaea] tracking-wide text-sm">Publicaciones y
                                Novedades</span>
                            <span class="font-sys text-[10px] text-[#01d3d1] opacity-70">Contenido reciente de nuestras
                                redes</span>
                        </div>
                    </div>
                    <i class="fas fa-rss text-[#01d3d1] opacity-50 group-hover:opacity-100 transition-all"></i>
                </button>
            </div>

            <!-- Footer Tecnológico -->
            <div class="mt-12 text-center">
                <p class="font-sys text-[#01d3d1]/50 text-[10px] uppercase">Altecbol © 2026 // Sistema Encriptado</p>
                <div class="w-full h-[1px] bg-gradient-to-r from-transparent via-[#01d3d1]/30 to-transparent mt-2">
                </div>
            </div>
        </div>

        <!-- ==========================================
     VISTA 4: PUBLICACIONES / REDES
     ========================================== -->
        <div id="view-social" class="view-section fade-in hidden">

            <div class="flex items-center justify-between mb-8 border-b border-[#01d3d1]/30 pb-4">
                <div class="flex items-center">
                    <button onclick="switchView('view-home')"
                        class="text-[#01d3d1] hover:text-white transition-colors p-2 -ml-2 bg-[#0050b0]/20 rounded-lg border border-[#0050b0]">
                        <i class="fas fa-chevron-left text-sm"></i>
                    </button>
                    <h2 class="text-lg font-bold ml-3 text-[#eaeaea] tracking-wider uppercase">Publicaciones</h2>
                </div>
                <span class="font-sys text-[10px] text-[#01d3d1]">DIR:/SOCIAL_FEED</span>
            </div>

            <p
                class="font-sys text-[10px] text-[#01d3d1] mb-6 tracking-widest border-l-2 border-[#01d3d1] pl-2 bg-[#0050b0]/10 py-1">
                NOVEDADES, CONTENIDO CORPORATIVO Y ACTIVIDAD DIGITAL DE ALTECBOL.
            </p>

            <div class="space-y-5">

                <!-- Tarjeta informativa -->
                <div class="social-card tech-corner">
                    <div class="social-badge">
                        <i class="fab fa-facebook-f"></i>
                        Facebook Feed
                    </div>

                    <h3 class="social-title">Conoce nuestras publicaciones recientes sin salir del sitio</h3>

                    <p class="social-text">
                        En esta sección puedes ver novedades, proyectos, contenido corporativo y publicaciones
                        destacadas

                    </p>

                    <div class="social-actions">
                        <a href="https://www.facebook.com/profile.php?id=61581125392128" target="_blank"
                            class="social-btn">
                            <i class="fab fa-facebook-f"></i> Ver página
                        </a>
                        <a href="https://www.instagram.com/altecbol.oficial/" target="_blank" class="social-btn">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                    </div>
                </div>

                <!-- Opción 1: Página de Facebook embebida -->
                <div class="social-card tech-corner">
                    <div class="social-badge">
                        <i class="fas fa-display"></i>
                        Vista embebida
                    </div>

                    <h3 class="social-title">Feed corporativo integrado</h3>

                    <p class="social-text">
                        MikroTik, El Router mas usado para empresas.
                    </p>

                    <div class="social-embed mt-4  flex justify-center items-center">
                        <iframe
                            src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2Freel%2F32921765427467457%2F&show_text=false&width=267&t=0"
                            width="267" height="476" style="border:none;overflow:hidden" scrolling="no"
                            frameborder="0" allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                            allowFullScreen="true"></iframe>

                    </div>
                    <p class="social-text">
                        Infraestructura, Redes, Internet, videovigilancia, soporte TI.
                    </p>

                    <div class="social-embed mt-4  flex justify-center items-center">
                        <iframe
                            src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2Freel%2F951352600662915%2F&show_text=false&width=267&t=0"
                            width="267" height="476" style="border:none;overflow:hidden" scrolling="no"
                            frameborder="0" allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                            allowFullScreen="true"></iframe>
                    </div>
                    <p class="social-text">
                        Cableado Estructurado, Cumpliendo estandares internacionales para garantizar rendimiento en tu
                        infraestructura de red.
                    </p>

                    <div class="social-embed mt-4  flex justify-center items-center">
                        <iframe
                            src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2Freel%2F1277662134413372%2F&show_text=false&width=267&t=0"
                            width="267" height="476" style="border:none;overflow:hidden" scrolling="no"
                            frameborder="0" allowfullscreen="true"
                            allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                            allowFullScreen="true"></iframe>
                    </div>
                    

                </div>

                <!-- Opción 2: Publicaciones manuales tipo tarjeta -->
                <div class="social-card tech-corner">
                    <div class="social-badge">
                        <i class="fas fa-thumbtack"></i>
                        Destacadas
                    </div>

                    <h3 class="social-title">Publicaciones seleccionadas</h3>

                    <p class="social-text">
                        También puedes ver nuestras publicaciones directamente.
                    </p>

                    <div class="grid grid-cols-1 gap-4 mt-4">
                        <div class="bg-[#050b14] border border-[#01d3d1]/15 rounded-xl p-4">
                            <div class="font-sys text-[10px] text-[#01d3d1] uppercase tracking-widest">TikTok Post
                            </div>
                            <h4 class="text-[#eaeaea] font-bold text-sm mt-2">Sistema de tickets para grandes empresas.
                            </h4>
                            <p class="text-gray-400 text-xs mt-2 leading-relaxed">
                                Implementación, soporte y optimización de soluciones tecnológicas empresariales.
                            </p>
                            <a href="https://www.tiktok.com/@altecbol/video/7609101063433555220?is_from_webapp=1&sender_device=pc&web_id=7586092818465801784"
                                target="_blank"
                                class="inline-flex items-center gap-2 mt-4 text-[#01d3d1] text-xs font-bold hover:text-white transition-colors">
                                Ver publicación <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>

                        <div class="bg-[#050b14] border border-[#01d3d1]/15 rounded-xl p-4">
                            <div class="font-sys text-[10px] text-[#01d3d1] uppercase tracking-widest">Instagram Post
                            </div>
                            <h4 class="text-[#eaeaea] font-bold text-sm mt-2">Seguridad, redes y soporte corporativo
                            </h4>
                            <p class="text-gray-400 text-xs mt-2 leading-relaxed">
                                Analiza tu infraestructura de red y mejora tus redes para que tus clientes tengan
                                acceso a tus servicios sin interrupciones.
                            </p>
                            <a href="https://www.instagram.com/p/DTNwWQqkZk5/?utm_source=ig_web_copy_link&igsh=MzRlODBiNWFlZA=="
                                target="_blank"
                                class="inline-flex items-center gap-2 mt-4 text-[#01d3d1] text-xs font-bold hover:text-white transition-colors">
                                Ver publicación <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- ==========================================
             VISTA 2: PROYECTOS (PORTAFOLIO)
             ========================================== -->
        <div id="view-portfolio" class="view-section fade-in hidden">

            <div class="flex items-center justify-between mb-8 border-b border-[#01d3d1]/30 pb-4">
                <div class="flex items-center">
                    <button onclick="switchView('view-home')"
                        class="text-[#01d3d1] hover:text-white transition-colors p-2 -ml-2 bg-[#0050b0]/20 rounded-lg border border-[#0050b0]">
                        <i class="fas fa-chevron-left text-sm"></i>
                    </button>
                    <h2 class="text-lg font-bold ml-3 text-[#eaeaea] tracking-wider uppercase">Proyectos Destacados
                    </h2>
                </div>
                <span class="font-sys text-[10px] text-[#01d3d1]">DIR:/SUCCESS_CASES</span>
            </div>

            <p
                class="font-sys text-[10px] text-[#01d3d1] mb-6 tracking-widest border-l-2 border-[#01d3d1] pl-2 bg-[#0050b0]/10 py-1">
                IMPLEMENTACIONES REALES EN INFRAESTRUCTURA, SEGURIDAD, COMUNICACIONES Y SOPORTE.
            </p>

            <div class="grid grid-cols-1 gap-5">

                <!-- VENCORP -->
                <div class="project-card tech-corner">
                    <div class="project-image-wrap">
                        <img src="{{ asset('websitio/img/project/vencorp.png') }}"
                            alt="Call center corporativo y telefonía IP">
                        <div class="project-overlay"></div>

                        <div class="project-logo-slot">


                            <img src="{{ asset('websitio/img/vencorp.png') }}" alt="Logo Vencorp">

                        </div>

                        <div class="project-id-badge">CASE-001</div>
                    </div>

                    <div class="p-5">
                        <div class="project-client">Vencorp — Call Center Tigo</div>
                        <div class="project-title">Telefonía IP y troncal SIP para operación de atención</div>

                        <div class="project-tags">
                            <span class="project-tag">CALL CENTER</span>
                            <span class="project-tag">TRONCAL SIP</span>
                            <span class="project-tag">DATA CENTER</span>
                        </div>

                        <p class="project-summary">
                            Implementación orientada a operación de call center, con infraestructura de data center y
                            configuración de troncal SIP para mejorar escalabilidad y automatización.
                        </p>
                    </div>
                </div>

                <!-- IMEX -->
                <div class="project-card tech-corner">
                    <div class="project-image-wrap">
                        <img src="{{ asset('websitio/img/project/imexp.png') }}"
                            alt="Seguridad, auditoría y trazabilidad empresarial">
                        <div class="project-overlay"></div>

                        <div class="project-logo-slot">
                            <img src="{{ asset('websitio/img/imex.png') }}" alt="Logo IMEX">
                        </div>

                        <div class="project-id-badge">CASE-002</div>
                    </div>

                    <div class="p-5">
                        <div class="project-client">IMEX — Certificación OEA</div>
                        <div class="project-title">Controles, respaldos y continuidad para auditoría</div>

                        <div class="project-tags">
                            <span class="project-tag">OEA</span>
                            <span class="project-tag">RESPALDOS</span>
                            <span class="project-tag">TRAZABILIDAD</span>
                        </div>

                        <p class="project-summary">
                            Implementación de controles y respaldos para reforzar trazabilidad, auditorías y continuidad
                            operativa durante su proceso de certificación.
                        </p>
                    </div>
                </div>

                <!-- MERCOMEX -->
                <div class="project-card tech-corner">
                    <div class="project-image-wrap">
                        <img src="{{ asset('websitio/img/project/mercomexp.png') }}"
                            alt="Infraestructura de servidores y data center">
                        <div class="project-overlay"></div>

                        <div class="project-logo-slot">
                            <img src="{{ asset('websitio/img/mercomex.png') }}" alt="Logo Mercomex">
                        </div>

                        <div class="project-id-badge">CASE-003</div>
                    </div>

                    <div class="p-5">
                        <div class="project-client">Mercomex — Data Center</div>
                        <div class="project-title">Infraestructura estable, virtualizada y escalable</div>

                        <div class="project-tags">
                            <span class="project-tag">DATA CENTER</span>
                            <span class="project-tag">VIRTUALIZACIÓN</span>
                            <span class="project-tag">CONFIABILIDAD</span>
                        </div>

                        <p class="project-summary">
                            Implementación de un data center estable y escalable para soportar crecimiento,
                            disponibilidad y procesos internos de certificación.
                        </p>
                    </div>
                </div>

                <!-- GRUPO LUCKY -->
                <div class="project-card tech-corner">
                    <div class="project-image-wrap">
                        <img src="{{ asset('websitio/img/project/luckyp.png') }}"
                            alt="Conectividad multisede y red segura empresarial">
                        <div class="project-overlay"></div>

                        <div class="project-logo-slot">
                            <img src="{{ asset('websitio/img/lucky.png') }}" alt="Logo Lucky">
                        </div>

                        <div class="project-id-badge">CASE-004</div>
                    </div>

                    <div class="p-5">
                        <div class="project-client">Grupo Lucky — Multisede</div>
                        <div class="project-title">Interconexión segura entre sedes y servicios virtualizados</div>

                        <div class="project-tags">
                            <span class="project-tag">VPN</span>
                            <span class="project-tag">MULTISEDE</span>

                        </div>

                        <p class="project-summary">
                            Integración de sedes en distintas ciudades con acceso seguro, más virtualización de
                            servicios contables y telefonía para una operación unificada.
                        </p>
                    </div>
                </div>

                <!-- COLEGIO MEDICO -->
                <div class="project-card tech-corner">
                    <div class="project-image-wrap">
                        <img src="{{ asset('websitio/img/project/medicop.png') }}"
                            alt="Red protegida y conectividad segura">
                        <div class="project-overlay"></div>

                        <div class="project-logo-slot">
                            <img src="{{ asset('websitio/img/medico.png') }}" alt="Logo Colegio Médico">
                        </div>

                        <div class="project-id-badge">CASE-005</div>
                    </div>

                    <div class="p-5">
                        <div class="project-client">Colegio Médico — Red Segura</div>
                        <div class="project-title">Internet protegido y conectividad más confiable</div>

                        <div class="project-tags">
                            <span class="project-tag">FIREWALL</span>
                            <span class="project-tag">PROTECCIÓN</span>
                            <span class="project-tag">CONFIABILIDAD</span>
                        </div>

                        <p class="project-summary">
                            Fortalecimiento de la conectividad con protección frente a ataques externos y una
                            experiencia de red más confiable para el personal.
                        </p>
                    </div>
                </div>

                <!-- CLINICA SIRANI -->
                <div class="project-card tech-corner">
                    <div class="project-image-wrap">
                        <img src="img/project/siranip.png"
                            alt="Soporte técnico empresarial y mantenimiento de servidores">
                        <div class="project-overlay"></div>

                        <div class="project-logo-slot">
                            <img src="img/sirani.png" alt="Logo Vencorp">
                        </div>

                        <div class="project-id-badge">CASE-006</div>
                    </div>

                    <div class="p-5">
                        <div class="project-client">Clínica Sirani — Help Desk</div>
                        <div class="project-title">Soporte preventivo y reducción de inactividad</div>

                        <div class="project-tags">
                            <span class="project-tag">HELP DESK</span>
                            <span class="project-tag">SOPORTE TI</span>
                            <span class="project-tag">SERVIDORES</span>
                        </div>

                        <p class="project-summary">
                            Soporte técnico preventivo en computadoras y servidores para mejorar disponibilidad y
                            reducir tiempos de inactividad.
                        </p>
                    </div>
                </div>

                <!-- CLIFABOL -->
                <div class="project-card tech-corner">
                    <div class="project-image-wrap">
                        <img src="img/project/clifabolp.png" alt="Atención automática, IVR y llamadas empresariales">
                        <div class="project-overlay"></div>

                        <div class="project-logo-slot">
                            <img src="img/clifabol.png" alt="Logo Vencorp">
                        </div>

                        <div class="project-id-badge">CASE-007</div>
                    </div>

                    <div class="p-5">
                        <div class="project-client">Clínica Clifabol — Atención Automática</div>
                        <div class="project-title">Call center con IVR y derivación inteligente</div>

                        <div class="project-tags">
                            <span class="project-tag">IVR</span>
                            <span class="project-tag">ATENCIÓN</span>
                            <span class="project-tag">TRAZABILIDAD</span>
                        </div>

                        <p class="project-summary">
                            Implementación de un call center moderno con IVR, derivación inteligente y mejor control de
                            llamadas para una atención más eficiente.
                        </p>
                    </div>
                </div>

                <!-- ZYRA -->
                <div class="project-card tech-corner">
                    <div class="project-image-wrap">
                        <img src="img/project/zyrap.png" alt="BPO, data center y telefonía IP empresarial">
                        <div class="project-overlay"></div>

                        <div class="project-logo-slot">
                            <img src="img/zyra.png" alt="Logo Vencorp">
                        </div>

                        <div class="project-id-badge">CASE-008</div>
                    </div>

                    <div class="p-5">
                        <div class="project-client">Zyra BPO — Call Center</div>
                        <div class="project-title">Data center escalable y troncal SIP para BPO</div>

                        <div class="project-tags">
                            <span class="project-tag">BPO</span>
                            <span class="project-tag">TRONCAL SIP</span>
                            <span class="project-tag">ESCALABILIDAD</span>
                        </div>

                        <p class="project-summary">
                            Implementación de infraestructura escalable con data center y configuración de troncal SIP
                            para soportar operación de atención al cliente.
                        </p>
                    </div>
                </div>

                <!-- IGA -->
                <div class="project-card tech-corner">
                    <div class="project-image-wrap">
                        <img src="img/project/igap.png" alt="Sistema de cámaras CCTV">
                        <div class="project-overlay"></div>

                        <div class="project-logo-slot">
                            <img src="img/iga.png" alt="Logo Vencorp">
                        </div>

                        <div class="project-id-badge">CASE-009</div>
                    </div>

                    <div class="p-5">
                        <div class="project-client">Instituto IGA — Comunicaciones y Seguridad</div>
                        <div class="project-title">Implementación de IVR y actualización del sistema de cámaras</div>

                        <div class="project-tags">
                            <span class="project-tag">IVR</span>
                            <span class="project-tag">CCTV</span>
                            <span class="project-tag">ACTUALIZACIÓN</span>
                        </div>

                        <p class="project-summary">
                            Caso personalizado para mostrar implementación de IVR y modernización del sistema interno de
                            videovigilancia.
                        </p>
                    </div>
                </div>

            </div>

            <div class="mt-8">
                <button onclick="soloDescargarPDF('{{ asset('websitio/docs/portafolio.servicios.pdf') }}')"
                    class="hud-btn w-full py-4 px-5 rounded-lg flex items-center justify-center gap-3 font-bold text-sm tracking-widest uppercase backdrop-blur-md">

                    <i class="fas fa-file-pdf"></i>
                    Descargar Portafolio de Servicios

                </button>
            </div>
        </div>

        <!-- ==========================================
             VISTA 3: CONTACTOS / ÁREAS DE ATENCIÓN
             ========================================== -->
        <div id="view-contacts" class="view-section fade-in hidden">

            <!-- Cabecera -->
            <div class="flex items-center justify-between mb-8 border-b border-[#01d3d1]/30 pb-4">
                <div class="flex items-center">
                    <button onclick="switchView('view-home')"
                        class="text-[#01d3d1] hover:text-white transition-colors p-2 -ml-2 bg-[#0050b0]/20 rounded-lg border border-[#0050b0]">
                        <i class="fas fa-chevron-left text-sm"></i>
                    </button>
                    <h2 class="text-lg font-bold ml-3 text-[#eaeaea] tracking-wider uppercase">Enlace de Comunicación
                    </h2>
                </div>
                <span class="font-sys text-[10px] text-[#01d3d1] animate-pulse">LIVE</span>
            </div>

            <p
                class="font-sys text-[10px] text-[#01d3d1] mb-6 tracking-widest border-l-2 border-[#01d3d1] pl-2 bg-[#0050b0]/10 py-1">
                SELECCIONE EL NODO DE COMUNICACIÓN VÍA WHATSAPP.</p>

            <!-- Lista de Contactos -->
            <div class="space-y-4">

                <!-- Contacto 1: Comercial -->
                <div
                    class="tech-corner bg-[#050b14] p-5 backdrop-blur-sm border border-[#0050b0]/50 relative group hover:border-[#01d3d1] transition-colors">

                    <div class="absolute top-0 right-0 p-2 opacity-20 group-hover:opacity-100 transition-opacity">
                        <i class="fas fa-signal text-[#01d3d1]"></i>
                    </div>

                    <h3 class="font-bold text-md text-[#eaeaea] flex items-center gap-2 uppercase tracking-wide">
                        <i class="fas fa-handshake text-[#01d3d1]"></i> Asesoría Comercial
                    </h3>

                    <div class="mt-3 space-y-1 font-sys text-xs">

                        <p class="text-gray-400 flex items-center gap-2">
                            <i class="fas fa-envelope text-[#01d3d1]"></i>
                            mmonrroy@altecbol.com.bo
                        </p>

                        <p class="text-gray-400 flex items-center gap-2">
                            <i class="fas fa-phone text-[#01d3d1]"></i>
                            +591 64347465
                        </p>

                    </div>

                    <div class="grid grid-cols-3 gap-2 mt-5 text-xs">

                        <a href="tel:+59164347465"
                            class="flex items-center justify-center gap-2 bg-[#0050b0]/30 hover:bg-[#01d3d1] hover:text-[#050b14] text-[#01d3d1] border border-[#0050b0] py-2 rounded font-bold transition-all">

                            <i class="fas fa-phone"></i> Llamar
                        </a>

                        <a href="https://wa.me/59164347465" target="_blank"
                            class="flex items-center justify-center gap-2 bg-[#0050b0]/30 hover:bg-[#25D366] hover:text-[#050b14] text-[#01d3d1] border border-[#0050b0] py-2 rounded font-bold transition-all">

                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>

                        <a href="mailto:mmonrroy@altecbol.com.bo"
                            class="flex items-center justify-center gap-2 bg-[#0050b0]/30 hover:bg-[#01d3d1] hover:text-[#050b14] text-[#01d3d1] border border-[#0050b0] py-2 rounded font-bold transition-all">

                            <i class="fas fa-envelope"></i> Correo
                        </a>

                    </div>

                </div>

                <!-- Contacto 2: Soporte -->
                <div
                    class="tech-corner bg-[#050b14] p-5 backdrop-blur-sm border border-[#0050b0]/50 relative group hover:border-[#01d3d1] transition-colors">

                    <div class="absolute top-0 right-0 p-2 opacity-20 group-hover:opacity-100 transition-opacity">
                        <i class="fas fa-signal text-[#01d3d1]"></i>
                    </div>

                    <h3 class="font-bold text-md text-[#eaeaea] flex items-center gap-2 uppercase tracking-wide">
                        <i class="fas fa-tools text-[#01d3d1]"></i> Soporte Técnico IT
                    </h3>

                    <div class="mt-3 space-y-1 font-sys text-xs">

                        <p class="text-gray-400 flex items-center gap-2">
                            <i class="fas fa-envelope text-[#01d3d1]"></i>
                            jcanchari@altecbol.com.bo
                        </p>

                        <p class="text-gray-400 flex items-center gap-2">
                            <i class="fas fa-phone text-[#01d3d1]"></i>
                            +591 69913298
                        </p>

                    </div>

                    <div class="grid grid-cols-3 gap-2 mt-5 text-xs">

                        <a href="tel:+59169913298"
                            class="flex items-center justify-center gap-2 bg-[#0050b0]/30 hover:bg-[#01d3d1] hover:text-[#050b14] text-[#01d3d1] border border-[#0050b0] py-2 rounded font-bold transition-all">

                            <i class="fas fa-phone"></i> Llamar
                        </a>

                        <a href="https://wa.me/59169913298" target="_blank"
                            class="flex items-center justify-center gap-2 bg-[#0050b0]/30 hover:bg-[#25D366] hover:text-[#050b14] text-[#01d3d1] border border-[#0050b0] py-2 rounded font-bold transition-all">

                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>

                        <a href="mailto:jcanchari@altecbol.com.bo"
                            class="flex items-center justify-center gap-2 bg-[#0050b0]/30 hover:bg-[#01d3d1] hover:text-[#050b14] text-[#01d3d1] border border-[#0050b0] py-2 rounded font-bold transition-all">

                            <i class="fas fa-envelope"></i> Correo
                        </a>

                    </div>

                </div>

                <!-- Contacto 3: Información -->
                <div
                    class="tech-corner bg-[#050b14] p-5 backdrop-blur-sm border border-[#0050b0]/50 relative group hover:border-[#01d3d1] transition-colors">

                    <div class="absolute top-0 right-0 p-2 opacity-20 group-hover:opacity-100 transition-opacity">
                        <i class="fas fa-map-marker-alt text-[#01d3d1]"></i>
                    </div>

                    <h3 class="font-bold text-md text-[#eaeaea] flex items-center gap-2 uppercase tracking-wide">
                        <i class="fas fa-building text-[#01d3d1]"></i> Oficina Central
                    </h3>

                    <div class="mt-3 space-y-1 font-sys text-xs">

                        <p class="text-gray-400 flex items-center gap-2">
                            <i class="fas fa-envelope text-[#01d3d1]"></i>
                            mmartinez@altecbol.com.bo
                        </p>
                        <p class="text-gray-400 flex items-center gap-2">
                            <i class="fas fa-phone text-[#01d3d1]"></i>
                            +591 67880004
                        </p>
                        <p class="text-gray-400 flex items-center gap-2">
                            <i class="fas fa-map-marker-alt text-[#01d3d1]"></i>
                            C.C. Ciudad Comercio Of. #146
                        </p>

                    </div>

                    <div class="grid grid-cols-2 gap-2 mt-5 text-xs">

                        <a href="tel:+59167880004"
                            class="flex items-center justify-center gap-2 bg-[#0050b0]/30 hover:bg-[#01d3d1] hover:text-[#050b14] text-[#01d3d1] border border-[#0050b0] py-2 rounded font-bold transition-all">

                            <i class="fas fa-phone"></i> Llamar
                        </a>

                        <a href="https://wa.me/59167880004"
                            class="flex items-center justify-center gap-2 bg-[#0050b0]/30 hover:bg-[#25D366] hover:text-[#050b14] text-[#01d3d1] border border-[#0050b0] py-2 rounded font-bold transition-all">

                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>

                        <a href="mailto:mmartinez@altecbol.com.bo"
                            class="flex items-center justify-center gap-2 bg-[#0050b0]/30 hover:bg-[#01d3d1] hover:text-[#050b14] text-[#01d3d1] border border-[#0050b0] py-2 rounded font-bold transition-all">

                            <i class="fas fa-envelope"></i> Correo
                        </a>

                        <a href="https://maps.google.com/?q=Ciudad+Comercio+Santa+Cruz" target="_blank"
                            class="flex items-center justify-center gap-2 bg-[#0050b0]/30 hover:bg-red-500 hover:text-white text-[#01d3d1] border border-[#0050b0] py-2 rounded font-bold transition-all">

                            <i class="fas fa-map-marker-alt"></i> Ubicación
                        </a>

                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- Script para controlar el cambio de vistas -->
    <script>
        function switchView(viewId) {
            const views = document.querySelectorAll('.view-section');

            views.forEach(view => {
                view.classList.add('hidden');
            });

            const activeView = document.getElementById(viewId);
            if (activeView) {
                activeView.classList.remove('hidden');
                activeView.classList.remove('fade-in');
                void activeView.offsetWidth;
                activeView.classList.add('fade-in');
            }

            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            const descargarBtn = document.getElementById("descargarPortafolioBtn");

            if (descargarBtn) {
                descargarBtn.addEventListener("click", function() {
                    abrirYDescargarPDF("{{ asset('websitio/docs/portafolio.servicios.pdf') }}");
                });
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

                        // 1. descargar
                        const link = document.createElement("a");
                        link.href = blobURL;
                        link.download = "Portafolio-Servicios-Altecbol.pdf";
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);

                        // 2. abrir luego en la misma pestaña
                        setTimeout(() => {
                            window.location.href = ruta;
                        }, 700);

                        // liberar memoria después
                        setTimeout(() => {
                            URL.revokeObjectURL(blobURL);
                        }, 4000);
                    })
                    .catch((error) => {
                        console.error("Error al descargar el archivo:", error);
                        alert("No se pudo descargar el PDF.");
                    });
            }
        });

        function soloDescargarPDF(ruta) {

            const link = document.createElement("a");

            link.href = ruta;
            link.download = "Portafolio-Servicios-Altecbol.pdf";

            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);

        }
    </script>
</body>

</html>
