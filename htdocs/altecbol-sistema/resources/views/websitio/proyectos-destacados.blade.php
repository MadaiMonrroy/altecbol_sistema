<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#050b14" />
    <title>Altecbol | Proyectos Destacados</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/websitio/css/styles.css?v={{ filemtime(public_path('websitio/css/styles.css')) }}">

    <style>
        html,
        body {
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
    </style>
</head>

<body class="min-h-screen relative px-4 py-6 md:py-10 bg-[#050b14] text-[#eaeaea]">
    <div class="tech-grid"></div>

    <div class="w-full max-w-md md:max-w-3xl xl:max-w-7xl mx-auto relative z-10 ">
        <div class="fade-in">
            <!-- Header -->
            <section class="glass rounded-3xl p-5 sm:p-6 md:p-8 mb-8 ">
                <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-6">
                    <div class="min-w-0">
                        <div class="flex items-center gap-3 mb-4 flex-wrap">
                            <a href="{{ route('mini.home') }}"
                                class="text-[#01d3d1] hover:text-white transition-colors p-2 bg-[#0050b0]/20 rounded-lg border border-[#0050b0] shrink-0">
                                <i class="fas fa-chevron-left text-sm"></i>
                            </a>

                            <span
                                class="font-sys text-[10px] px-2 py-1 bg-[#0050b0]/20 text-[#01d3d1] border border-[#0050b0] rounded backdrop-blur-sm">
                                SUCCESS_CASES
                            </span>
                        </div>

                        <h1 class="text-xl sm:text-2xl md:text-3xl xl:text-4xl font-bold text-white tracking-wide uppercase leading-tight">
                            Proyectos Destacados
                        </h1>

                        <p class="text-gray-300 mt-4 max-w-4xl leading-relaxed text-sm sm:text-base">
                            Casos de éxito e implementaciones reales en infraestructura, seguridad, conectividad,
                            videovigilancia, telefonía IP, soporte y continuidad operativa.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-3 xl:justify-end">
                        <a href="{{ route('mini.portafolio.soluciones') }}"
                            class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl border border-[#01d3d1]/20 bg-[#0050b0]/20 text-[#01d3d1] font-bold hover:bg-[#01d3d1] hover:text-[#050b14] transition text-sm">
                            <i class="fas fa-file-lines"></i>
                            Ver portafolio
                        </a>

                        <a href="https://wa.me/59164347465?text=Hola,%20quiero%20informaci%C3%B3n%20sobre%20sus%20proyectos%20destacados"
                            target="_blank"
                            class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-[#01d3d1] text-[#050b14] font-bold hover:opacity-90 transition text-sm">
                            <i class="fab fa-whatsapp"></i>
                            Solicitar información
                        </a>
                    </div>
                </div>
            </section>

            <!-- Intro -->
            <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 mb-8">
                <div class="glass rounded-2xl p-5">
                    <div class="text-[#01d3d1] text-2xl mb-3">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3 class="font-bold text-white text-lg mb-2">Casos reales</h3>
                    <p class="text-sm text-gray-300 leading-relaxed">
                        Proyectos implementados para empresas de distintos rubros, con necesidades reales y resultados aplicados.
                    </p>
                </div>

                <div class="glass rounded-2xl p-5">
                    <div class="text-[#01d3d1] text-2xl mb-3">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <h3 class="font-bold text-white text-lg mb-2">Tecnología aplicada</h3>
                    <p class="text-sm text-gray-300 leading-relaxed">
                        Infraestructura, redes, telefonía IP, data center, seguridad y soporte técnico empresarial.
                    </p>
                </div>

                <div class="glass rounded-2xl p-5 md:col-span-2 xl:col-span-1">
                    <div class="text-[#01d3d1] text-2xl mb-3">
                        <i class="fas fa-shield-halved"></i>
                    </div>
                    <h3 class="font-bold text-white text-lg mb-2">Continuidad operativa</h3>
                    <p class="text-sm text-gray-300 leading-relaxed">
                        Soluciones pensadas para mejorar disponibilidad, control, seguridad y crecimiento empresarial.
                    </p>
                </div>
            </section>
        </div>

        <!-- Proyectos -->
        <section class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            <!-- VENCORP -->
            <div class="project-card tech-corner h-full flex flex-col">
                <div class="project-image-wrap">
                    <img src="{{ asset('websitio/img/project/vencorp.png') }}" alt="Call center corporativo y telefonía IP">
                    <div class="project-overlay"></div>
                    <div class="project-logo-slot">
                        <img src="{{ asset('websitio/img/vencorp.png') }}" alt="Logo Vencorp">
                    </div>
                    <div class="project-id-badge">CASE-001</div>
                </div>
                <div class="p-5 flex-1">
                    <div class="project-client">Vencorp — Call Center Tigo</div>
                    <div class="project-title">Telefonía IP y troncal SIP para operación de atención</div>
                    <div class="project-tags">
                        <span class="project-tag">CALL CENTER</span>
                        <span class="project-tag">TRONCAL SIP</span>
                        <span class="project-tag">DATA CENTER</span>
                    </div>
                    <p class="project-summary">
                        Implementación orientada a operación de call center, con infraestructura de data center y configuración de troncal SIP para mejorar escalabilidad y automatización.
                    </p>
                </div>
            </div>

            <!-- IMEX -->
            <div class="project-card tech-corner h-full flex flex-col">
                <div class="project-image-wrap">
                    <img src="{{ asset('websitio/img/project/imexp.png') }}" alt="Seguridad, auditoría y trazabilidad empresarial">
                    <div class="project-overlay"></div>
                    <div class="project-logo-slot">
                        <img src="{{ asset('websitio/img/imex.png') }}" alt="Logo IMEX">
                    </div>
                    <div class="project-id-badge">CASE-002</div>
                </div>
                <div class="p-5 flex-1">
                    <div class="project-client">IMEX — Certificación OEA</div>
                    <div class="project-title">Controles, respaldos y continuidad para auditoría</div>
                    <div class="project-tags">
                        <span class="project-tag">OEA</span>
                        <span class="project-tag">RESPALDOS</span>
                        <span class="project-tag">TRAZABILIDAD</span>
                    </div>
                    <p class="project-summary">
                        Implementación de controles y respaldos para reforzar trazabilidad, auditorías y continuidad operativa durante su proceso de certificación.
                    </p>
                </div>
            </div>

            <!-- MERCOMEX -->
            <div class="project-card tech-corner h-full flex flex-col">
                <div class="project-image-wrap">
                    <img src="{{ asset('websitio/img/project/mercomexp.png') }}" alt="Infraestructura de servidores y data center">
                    <div class="project-overlay"></div>
                    <div class="project-logo-slot">
                        <img src="{{ asset('websitio/img/mercomex.png') }}" alt="Logo Mercomex">
                    </div>
                    <div class="project-id-badge">CASE-003</div>
                </div>
                <div class="p-5 flex-1">
                    <div class="project-client">Mercomex — Data Center</div>
                    <div class="project-title">Infraestructura estable, virtualizada y escalable</div>
                    <div class="project-tags">
                        <span class="project-tag">DATA CENTER</span>
                        <span class="project-tag">VIRTUALIZACIÓN</span>
                        <span class="project-tag">CONFIABILIDAD</span>
                    </div>
                    <p class="project-summary">
                        Implementación de un data center estable y escalable para soportar crecimiento, disponibilidad y procesos internos de certificación.
                    </p>
                </div>
            </div>

            <!-- LUCKY -->
            <div class="project-card tech-corner h-full flex flex-col">
                <div class="project-image-wrap">
                    <img src="{{ asset('websitio/img/project/luckyp.png') }}" alt="Conectividad multisede y red segura empresarial">
                    <div class="project-overlay"></div>
                    <div class="project-logo-slot">
                        <img src="{{ asset('websitio/img/lucky.png') }}" alt="Logo Lucky">
                    </div>
                    <div class="project-id-badge">CASE-004</div>
                </div>
                <div class="p-5 flex-1">
                    <div class="project-client">Grupo Lucky — Multisede</div>
                    <div class="project-title">Interconexión segura entre sedes y servicios virtualizados</div>
                    <div class="project-tags">
                        <span class="project-tag">VPN</span>
                        <span class="project-tag">MULTISEDE</span>
                    </div>
                    <p class="project-summary">
                        Integración de sedes en distintas ciudades con acceso seguro, más virtualización de servicios contables y telefonía para una operación unificada.
                    </p>
                </div>
            </div>

            <!-- COLEGIO MEDICO -->
            <div class="project-card tech-corner h-full flex flex-col">
                <div class="project-image-wrap">
                    <img src="{{ asset('websitio/img/project/medicop.png') }}" alt="Red protegida y conectividad segura">
                    <div class="project-overlay"></div>
                    <div class="project-logo-slot">
                        <img src="{{ asset('websitio/img/medico.png') }}" alt="Logo Colegio Médico">
                    </div>
                    <div class="project-id-badge">CASE-005</div>
                </div>
                <div class="p-5 flex-1">
                    <div class="project-client">Colegio Médico — Red Segura</div>
                    <div class="project-title">Internet protegido y conectividad más confiable</div>
                    <div class="project-tags">
                        <span class="project-tag">FIREWALL</span>
                        <span class="project-tag">PROTECCIÓN</span>
                        <span class="project-tag">CONFIABILIDAD</span>
                    </div>
                    <p class="project-summary">
                        Fortalecimiento de la conectividad con protección frente a ataques externos y una experiencia de red más confiable para el personal.
                    </p>
                </div>
            </div>

            <!-- SIRANI -->
            <div class="project-card tech-corner h-full flex flex-col">
                <div class="project-image-wrap">
                    <img src="{{ asset('websitio/img/project/siranip.png') }}" alt="Soporte técnico empresarial y mantenimiento de servidores">
                    <div class="project-overlay"></div>
                    <div class="project-logo-slot">
                        <img src="{{ asset('websitio/img/sirani.png') }}" alt="Logo Sirani">
                    </div>
                    <div class="project-id-badge">CASE-006</div>
                </div>
                <div class="p-5 flex-1">
                    <div class="project-client">Clínica Sirani — Help Desk</div>
                    <div class="project-title">Soporte preventivo y reducción de inactividad</div>
                    <div class="project-tags">
                        <span class="project-tag">HELP DESK</span>
                        <span class="project-tag">SOPORTE TI</span>
                        <span class="project-tag">SERVIDORES</span>
                    </div>
                    <p class="project-summary">
                        Soporte técnico preventivo en computadoras y servidores para mejorar disponibilidad y reducir tiempos de inactividad.
                    </p>
                </div>
            </div>

            <!-- CLIFABOL -->
            <div class="project-card tech-corner h-full flex flex-col">
                <div class="project-image-wrap">
                    <img src="{{ asset('websitio/img/project/clifabolp.png') }}" alt="Atención automática, IVR y llamadas empresariales">
                    <div class="project-overlay"></div>
                    <div class="project-logo-slot">
                        <img src="{{ asset('websitio/img/clifabol.png') }}" alt="Logo Clifabol">
                    </div>
                    <div class="project-id-badge">CASE-007</div>
                </div>
                <div class="p-5 flex-1">
                    <div class="project-client">Clínica Clifabol — Atención Automática</div>
                    <div class="project-title">Call center con IVR y derivación inteligente</div>
                    <div class="project-tags">
                        <span class="project-tag">IVR</span>
                        <span class="project-tag">ATENCIÓN</span>
                        <span class="project-tag">TRAZABILIDAD</span>
                    </div>
                    <p class="project-summary">
                        Implementación de un call center moderno con IVR, derivación inteligente y mejor control de llamadas para una atención más eficiente.
                    </p>
                </div>
            </div>

            <!-- ZYRA -->
            <div class="project-card tech-corner h-full flex flex-col">
                <div class="project-image-wrap">
                    <img src="{{ asset('websitio/img/project/zyrap.png') }}" alt="BPO, data center y telefonía IP empresarial">
                    <div class="project-overlay"></div>
                    <div class="project-logo-slot">
                        <img src="{{ asset('websitio/img/zyra.png') }}" alt="Logo Zyra">
                    </div>
                    <div class="project-id-badge">CASE-008</div>
                </div>
                <div class="p-5 flex-1">
                    <div class="project-client">Zyra BPO — Call Center</div>
                    <div class="project-title">Data center escalable y troncal SIP para BPO</div>
                    <div class="project-tags">
                        <span class="project-tag">BPO</span>
                        <span class="project-tag">TRONCAL SIP</span>
                        <span class="project-tag">ESCALABILIDAD</span>
                    </div>
                    <p class="project-summary">
                        Implementación de infraestructura escalable con data center y configuración de troncal SIP para soportar operación de atención al cliente.
                    </p>
                </div>
            </div>

            <!-- IGA -->
            <div class="project-card tech-corner h-full flex flex-col">
                <div class="project-image-wrap">
                    <img src="{{ asset('websitio/img/project/igap.png') }}" alt="Sistema de cámaras CCTV">
                    <div class="project-overlay"></div>
                    <div class="project-logo-slot">
                        <img src="{{ asset('websitio/img/iga.png') }}" alt="Logo IGA">
                    </div>
                    <div class="project-id-badge">CASE-009</div>
                </div>
                <div class="p-5 flex-1">
                    <div class="project-client">Instituto IGA — Comunicaciones y Seguridad</div>
                    <div class="project-title">Implementación de IVR y actualización del sistema de cámaras</div>
                    <div class="project-tags">
                        <span class="project-tag">IVR</span>
                        <span class="project-tag">CCTV</span>
                        <span class="project-tag">ACTUALIZACIÓN</span>
                    </div>
                    <p class="project-summary">
                        Caso personalizado para mostrar implementación de IVR y modernización del sistema interno de videovigilancia.
                    </p>
                </div>
            </div>

        </section>

        <div class="mt-10">
            <button onclick="soloDescargarPDF('{{ asset('websitio/docs/portafolio.servicios.pdf') }}')"
                class="hud-btn w-full py-4 px-5 rounded-lg flex items-center justify-center gap-3 font-bold text-sm tracking-widest uppercase backdrop-blur-md">
                <i class="fas fa-file-pdf"></i>
                Descargar Portafolio de Servicios
            </button>
        </div>

        <div class="text-center mt-10">
            <p class="font-sys text-[#01d3d1]/50 text-[10px] uppercase">Altecbol © 2026 // Success Cases</p>
            <div class="w-full h-[1px] bg-gradient-to-r from-transparent via-[#01d3d1]/30 to-transparent mt-2"></div>
        </div>
    </div>

    <script>
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