<footer class="bg-altecbol-dark text-white pt-16 pb-8 ">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10">

            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-11 h-11 rounded-xl bg-altecbol-primary flex items-center justify-center font-bold text-lg">
                        A
                    </div>
                    <div>
                        <div class="text-lg font-bold">ALTECBOL</div>
                        <div class="text-xs text-gray-400">Soluciones Tecnológicas</div>
                    </div>
                </div>

                <p class="text-sm text-gray-300 leading-7">
                    Impulsamos empresas con infraestructura tecnológica, redes, servidores,
                    seguridad, soporte técnico y soluciones digitales pensadas para crecer.
                </p>
            </div>

            <div>
                <h4 class="text-base font-semibold mb-4 text-altecbol-secondary">Empresa</h4>
                <ul class="space-y-3 text-sm text-gray-300">
                    <li><a href="{{ route('web.home') }}" class="hover:text-white transition">Inicio</a></li>
                    <li><a href="{{ route('web.nosotros') }}" class="hover:text-white transition">Nosotros</a></li>
                    <li><a href="{{ route('web.servicios') }}" class="hover:text-white transition">Servicios</a></li>
                    <li><a href="{{ route('web.planes') }}" class="hover:text-white transition">Planes</a></li>
                    <li><a href="{{ route('web.casos.index') }}" class="hover:text-white transition">Casos de éxito</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-base font-semibold mb-4 text-altecbol-secondary">Soluciones</h4>
                <ul class="space-y-3 text-sm text-gray-300">
                    <li><a href="{{ route('web.tienda.index') }}" class="hover:text-white transition">Tienda</a></li>
                    <li><a href="{{ route('web.blog') }}" class="hover:text-white transition">Blog</a></li>
                    <li><a href="{{ route('web.contacto') }}" class="hover:text-white transition">Contacto</a></li>
                    <li><a href="{{ route('web.contacto') }}" class="hover:text-white transition">Soporte empresarial</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-base font-semibold mb-4 text-altecbol-secondary">Contacto</h4>
                <div class="space-y-3 text-sm text-gray-300 leading-6">
                    <p>Santa Cruz, Bolivia</p>
                    <p>Soluciones B2B en tecnología</p>
                    <p>Atención comercial y soporte técnico</p>
                    <a href="{{ route('web.contacto') }}"
                       class="inline-block mt-2 px-5 py-3 rounded-lg bg-altecbol-secondary text-slate-900 font-semibold hover:opacity-90 transition">
                        Hablar con un asesor
                    </a>
                </div>
            </div>

        </div>

        <div class="border-t border-white/10 mt-12 pt-6 flex flex-col md:flex-row items-center justify-between gap-3 text-sm text-gray-400">
            <p>© {{ date('Y') }} ALTECBOL. Todos los derechos reservados.</p>
            <p>Infraestructura IT · Redes · Servidores · Soporte · Telefonía IP</p>
        </div>
    </div>
</footer>