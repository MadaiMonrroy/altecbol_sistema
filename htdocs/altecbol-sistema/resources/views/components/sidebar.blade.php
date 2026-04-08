<aside class="hidden sm:block fixed top-16 left-0 z-40 w-64 h-[calc(100vh-4rem)] border-r"
    style="background-color: var(--bg-surface); border-color: var(--border-color);" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto ui-sidebar-scroll">
        <ul class="space-y-1">

            {{-- Dashboard --}}
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="{{ request()->routeIs('dashboard') ? 'ui-nav-link ui-nav-link-active' : 'ui-nav-link' }}">
                    <svg class="ui-nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 9.75L12 4l9 5.75V20a1 1 0 0 1-1 1h-5.25a.75.75 0 0 1-.75-.75V15a3 3 0 0 0-6 0v5.25a.75.75 0 0 1-.75.75H4a1 1 0 0 1-1-1V9.75Z" />
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- Usuarios --}}
            <li>
                <a href="{{ route('admin.usuarios.index') }}"
                    class="{{ request()->routeIs('admin.usuarios.*') ? 'ui-nav-link ui-nav-link-active' : 'ui-nav-link' }}">
                    <svg class="ui-nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766v-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                    <span>Usuarios</span>
                </a>
            </li>

            {{-- Clientes --}}
            <li>
                <a href="{{ route('admin.clientes.index') }}"
                    class="{{ request()->routeIs('admin.clientes.*') ? 'ui-nav-link ui-nav-link-active' : 'ui-nav-link' }}">
                    <svg class="ui-nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 7H5a2 2 0 0 0-2 2v4m5-6h8M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m0 0h3a2 2 0 0 1 2 2v4m0 0v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6m18 0s-4 2-9 2-9-2-9-2m9-2h.01" />
                    </svg>
                    <span>Clientes</span>
                </a>
            </li>

            {{-- Comercial --}}
            <li class="pt-3">
                <div class="ui-sidebar-section-title">Comercial</div>
            </li>

            {{-- Cotizaciones --}}
            <li>
                <a href="{{ route('admin.cotizaciones.index') }}"
                    class="{{ request()->routeIs('admin.cotizaciones.*') ? 'ui-nav-link ui-nav-link-active' : 'ui-nav-link' }}">
                    <svg class="ui-nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12h6m-3-3v6m-7 6h10a2 2 0 0 0 2-2V7.828a2 2 0 0 0-.586-1.414l-2.828-2.828A2 2 0 0 0 12.172 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2z" />
                    </svg>
                    <span>Cotizaciones</span>
                </a>
            </li>

            {{-- Ventas de productos --}}
            @php
                $productosOpen = request()->routeIs('admin.productos.index')
                    || request()->routeIs('admin.productos.categorias.index')
                    || request()->routeIs('admin.productos.marcas.index')
                    || request()->routeIs('admin.productos.carritos.*')
                    || request()->routeIs('admin.productos.favoritos.*')
                    || request()->routeIs('admin.productos.ventas.*');
            @endphp

            <li>
                <details class="group" {{ $productosOpen ? 'open' : '' }}>
                    <summary class="ui-nav-link ui-sidebar-summary cursor-pointer flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <svg class="ui-nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1 5h12m-9 2a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" />
                            </svg>
                            <span>Ventas de productos</span>
                        </div>

                        <svg class="ui-sidebar-chevron" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                        </svg>
                    </summary>

                    <ul class="ui-subnav space-y-1">
                        <li>
                            <a href="{{ route('admin.productos.index') }}"
                                class="{{ request()->routeIs('admin.productos.index') ? 'ui-subnav-link ui-subnav-link-active' : 'ui-subnav-link' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20 7 12 3 4 7m16 0-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                                <span class="ui-subnav-label">Productos</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.productos.categorias.index') }}"
                                class="{{ request()->routeIs('admin.productos.categorias.index') ? 'ui-subnav-link ui-subnav-link-active' : 'ui-subnav-link' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7 8h10M7 12h6m-6 4h8M5 4h14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Z" />
                                </svg>
                                <span class="ui-subnav-label">Categorías</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.productos.marcas.index') }}"
                                class="{{ request()->routeIs('admin.productos.marcas.index') ? 'ui-subnav-link ui-subnav-link-active' : 'ui-subnav-link' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 7h6m-7 4h8m-9 4h10M5 4h14l-1 16H6L5 4Z" />
                                </svg>
                                <span class="ui-subnav-label">Marcas</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.productos.carritos.index') }}"
                                class="{{ request()->routeIs('admin.productos.carritos.*') ? 'ui-subnav-link ui-subnav-link-active' : 'ui-subnav-link' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M6 17h12M9 20a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm9 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" />
                                </svg>
                                <span class="ui-subnav-label">Carrito</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.productos.favoritos.index') }}"
                                class="{{ request()->routeIs('admin.productos.favoritos.*') ? 'ui-subnav-link ui-subnav-link-active' : 'ui-subnav-link' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m12 20-1.8-1.65C5.2 13.8 2 10.95 2 7.5 2 4.92 3.92 3 6.5 3c1.54 0 3.04.72 4 1.84A5.26 5.26 0 0 1 14.5 3C17.08 3 19 4.92 19 7.5c0 3.45-3.2 6.3-8.2 10.85L12 20Z" />
                                </svg>
                                <span class="ui-subnav-label">Favoritos</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.productos.ventas.index') }}"
                                class="{{ request()->routeIs('admin.productos.ventas.*') ? 'ui-subnav-link ui-subnav-link-active' : 'ui-subnav-link' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 7h18M6 4h12a2 2 0 0 1 2 2v11a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V6a2 2 0 0 1 2-2Zm0 9h12" />
                                </svg>
                                <span class="ui-subnav-label">Órdenes o Ventas</span>
                            </a>
                        </li>
                    </ul>
                </details>
            </li>

            {{-- Servicios mensualizados --}}
            @php
                $mensualizadosOpen = request()->routeIs('admin.servicios-mensualizados.soporte-tecnico.*')
                    || request()->routeIs('admin.servicios-mensualizados.alquiler-servidores.*');
            @endphp

            <li>
                <details class="group" {{ $mensualizadosOpen ? 'open' : '' }}>
                    <summary class="ui-nav-link ui-sidebar-summary cursor-pointer flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <svg class="ui-nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4" />
                            </svg>
                            <span>Servicios Mensualizados</span>
                        </div>

                        <svg class="ui-sidebar-chevron" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                        </svg>
                    </summary>

                    <ul class="ui-subnav space-y-1">
                        <li>
                            <a href="{{ route('admin.servicios-mensualizados.soporte-tecnico.index') }}"
                                class="{{ request()->routeIs('admin.servicios-mensualizados.soporte-tecnico.*') ? 'ui-subnav-link ui-subnav-link-active' : 'ui-subnav-link' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M18.364 5.636a9 9 0 1 1-12.728 0M12 9v4m0 4h.01" />
                                </svg>
                                <span class="ui-subnav-label">Soporte técnico</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.servicios-mensualizados.alquiler-servidores.index') }}"
                                class="{{ request()->routeIs('admin.servicios-mensualizados.alquiler-servidores.*') ? 'ui-subnav-link ui-subnav-link-active' : 'ui-subnav-link' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6Zm0 9a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-3Z" />
                                </svg>
                                <span class="ui-subnav-label">Alquiler de servidores</span>
                            </a>
                        </li>
                    </ul>
                </details>
            </li>

            {{-- Proyectos --}}
            <li>
                <a href="{{ route('admin.proyectos.index') }}"
                    class="{{ request()->routeIs('admin.proyectos.*') ? 'ui-nav-link ui-nav-link-active' : 'ui-nav-link' }}">
                    <svg class="ui-nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m10.051 8.102-3.778.322-1.994 1.994a.94.94 0 0 0 .533 1.6l2.698.316m8.39 1.617-.322 3.78-1.994 1.994a.94.94 0 0 1-1.595-.533l-.4-2.652m8.166-11.174a1.366 1.366 0 0 0-1.12-1.12c-1.616-.279-4.906-.623-6.38.853-1.671 1.672-5.211 8.015-6.31 10.023a.932.932 0 0 0 .162 1.111l.828.835.833.832a.932.932 0 0 0 1.111.163c2.008-1.102 8.35-4.642 10.021-6.312 1.475-1.478 1.133-4.77.855-6.385Zm-2.961 3.722a1.88 1.88 0 1 1-3.76 0 1.88 1.88 0 0 1 3.76 0Z" />
                    </svg>
                    <span>Proyectos</span>
                </a>
            </li>

            {{-- Operaciones --}}
            <li class="pt-3">
                <div class="ui-sidebar-section-title">Operaciones</div>
            </li>

            <li>
                <a href="{{ route('admin.operaciones.incidencias.index') }}"
                    class="{{ request()->routeIs('admin.operaciones.incidencias.*') ? 'ui-nav-link ui-nav-link-active' : 'ui-nav-link' }}">
                    <svg class="ui-nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0-12a3 3 0 1 0 0 6 3 3 0 0 0 0-6Z" />
                    </svg>
                    <span>Soporte e Incidencias</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.operaciones.diseno-red.index') }}"
                    class="{{ request()->routeIs('admin.operaciones.diseno-red.*') ? 'ui-nav-link ui-nav-link-active' : 'ui-nav-link' }}">
                    <svg class="ui-nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M5 8c4.5-4 9.5-4 14 0M8 11c3-2.5 5-2.5 8 0M11 14c1-.8 1-.8 2 0" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01" />
                    </svg>
                    <span>Diseño de Red</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.operaciones.credenciales.index') }}"
                    class="{{ request()->routeIs('admin.operaciones.credenciales.*') ? 'ui-nav-link ui-nav-link-active' : 'ui-nav-link' }}">
                    <svg class="ui-nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z" />
                    </svg>
                    <span>Credenciales y Accesos</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.operaciones.servidores.index') }}"
                    class="{{ request()->routeIs('admin.operaciones.servidores.*') ? 'ui-nav-link ui-nav-link-active' : 'ui-nav-link' }}">
                    <svg class="ui-nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6Zm0 9a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-3Zm4-7h.01M8 17h.01" />
                    </svg>
                    <span>Servidores</span>
                </a>
            </li>

            {{-- Administración --}}
            <li class="pt-3">
                <div class="ui-sidebar-section-title">Administración</div>
            </li>

            <li>
                <a href="{{ route('admin.administracion.compras.index') }}"
                    class="{{ request()->routeIs('admin.administracion.compras.*') ? 'ui-nav-link ui-nav-link-active' : 'ui-nav-link' }}">
                    <svg class="ui-nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 7h11v10H3V7Zm11 3h4l3 3v4h-7V10Zm-8 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm13 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" />
                    </svg>
                    <span>Compras y Proveedores</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.administracion.cobros.index') }}"
                    class="{{ request()->routeIs('admin.administracion.cobros.*') ? 'ui-nav-link ui-nav-link-active' : 'ui-nav-link' }}">
                    <svg class="ui-nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7Zm0 3h18M7 15h4" />
                    </svg>
                    <span>Cobros, Facturación y Pagos</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.administracion.calendario.index') }}"
                    class="{{ request()->routeIs('admin.administracion.calendario.*') ? 'ui-nav-link ui-nav-link-active' : 'ui-nav-link' }}">
                    <svg class="ui-nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M7 3v2M17 3v2M4 7h16M5 5h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Z" />
                    </svg>
                    <span>Calendario y Vencimientos</span>
                </a>
            </li>

            {{-- Reportes --}}
            <li class="pt-3">
                <div class="ui-sidebar-section-title">Reportes</div>
            </li>

            <li>
                <a href="{{ route('admin.reportes.index') }}"
                    class="{{ request()->routeIs('admin.reportes.*') ? 'ui-nav-link ui-nav-link-active' : 'ui-nav-link' }}">
                    <svg class="ui-nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 19V5M4 19h16M8 17v-6m4 6V7m4 10v-3" />
                    </svg>
                    <span>Reportes</span>
                </a>
            </li>

        </ul>
    </div>
</aside>