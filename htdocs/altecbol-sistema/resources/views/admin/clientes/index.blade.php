<x-app-layout>



    <div class="py-8">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

            <div class=" shadow rounded-lg p-6 text-[var(--text-main)]"
                style="background-color: var(--bg-surface); border-color: var(--border-color);">

                {{-- Título --}}
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-[var(--text-main)]">
                        Lista de clientes
                    </h3>
                    <div class="flex items-right gap-3 pt-4">
                        <a href="{{ route('admin.clientes.create') }}" class="ui-btn-primary">
                            + Nuevo cliente
                        </a>
                        <a href="{{ route('admin.clientes.index') }}" class="ui-btn ">
                            Limpiar
                        </a>
                    </div>
                </div>
                <form method="GET" action="{{ route('admin.clientes.index') }}"
                    class="mb-6 grid w-full gap-3
         grid-cols-1
         md:grid-cols-2 md:items-center
         lg:grid-cols-[minmax(0,1fr)_11rem_11rem_11rem]
         lg:items-center">

                    <!-- Buscador -->
                    <div class="relative w-full md:col-span-2 lg:col-span-1">
                        <div class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 ui-muted">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                            </svg>
                        </div>

                        <input id="q-input" type="search" class="ui-input w-full pl-11 lg:h-11"
                            placeholder="Buscar por código, razón social, NIT, país, dirección, servicio..."
                            autocomplete="off">
                    </div>

                    <!-- FILTRO ESTADO -->
                    <div class="w-full md:col-span-1 lg:col-span-1">
                        <input type="hidden" name="estado" id="f_estado" value="{{ $estado ?? '' }}">

                        @php
                            $estadoLabel = ($estado ?? '') !== '' ? ucfirst($estado) : 'Estado';
                            $estadoActive = ($estado ?? '') !== '';
                        @endphp

                        <button type="button" id="f-estado-btn" data-dropdown-toggle="f-estado-dd"
                            class="ui-input w-full lg:h-11 flex items-center justify-between gap-2">

                            <!-- ICONO + TEXTO -->
                            <span
                                class="inline-flex items-center gap-2 min-w-0 transition
           {{ $estadoActive
               ? 'opacity-100 text-slate-800 dark:text-white'
               : 'opacity-60 text-slate-500 dark:text-white dark:opacity-50' }}">

                                <!-- Icono Flowbite -->
                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
                                </svg>

                                <span id="f-estado-label" class="truncate">
                                    {{ $estadoLabel }}
                                </span>
                            </span>

                            <!-- Flecha -->
                            <svg class="w-4 h-4 ui-muted shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>


                        <div id="f-estado-dd" class="hidden z-20 w-56 rounded-lg ui-shadow ui-border"
                            style="background-color: var(--bg-surface);">
                            <ul class="py-1 text-sm ui-text">
                                <li>
                                    <button type="button" class="w-full flex items-center gap-3 px-4 py-2 transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_estado','', 'Estado')">
                                        <span class="ui-muted">Mostrar todos</span>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="w-full flex items-center gap-3 px-4 py-2 transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_estado','prospecto', 'Prospecto')">
                                        Prospecto
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="w-full flex items-center gap-3 px-4 py-2 transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_estado','activo', 'Activo')">
                                        Activo
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="w-full flex items-center gap-3 px-4 py-2 transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_estado','inactivo', 'Inactivo')">
                                        Inactivo
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- FILTRO TIPO CLIENTE -->
                    <div class="w-full md:col-span-1 lg:col-span-1">
                        <input type="hidden" name="tipo_cliente" id="f_tipo_cliente" value="{{ $tipoCliente ?? '' }}">

                        @php
                            $tipoClienteLabel = ($tipoCliente ?? '') !== '' ? ucfirst($tipoCliente) : 'Tipo cliente';
                            $tipoClienteActive = ($tipoCliente ?? '') !== '';
                        @endphp

                        <button type="button" data-dropdown-toggle="f-tcliente-dd"
                            class="ui-input w-full lg:h-11 flex items-center justify-between gap-2">

                            <span
                                class="inline-flex items-center gap-2 min-w-0 transition
           {{ $tipoClienteActive
               ? 'opacity-100 text-slate-800 dark:text-white'
               : 'opacity-60 text-slate-500 dark:text-white dark:opacity-50' }}">

                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
                                </svg>

                                <span id="f-tcliente-label" class="truncate">
                                    {{ $tipoClienteLabel }}
                                </span>
                            </span>

                            <svg class="w-4 h-4 ui-muted shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>


                        <div id="f-tcliente-dd" class="hidden z-20 w-56 rounded-lg ui-shadow ui-border"
                            style="background-color: var(--bg-surface);">
                            <ul class="py-1 text-sm ui-text">
                                <li>
                                    <button type="button" class="w-full px-4 py-2 text-left transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_tipo_cliente','', 'Tipo cliente')">
                                        <span class="ui-muted">Mostrar todos</span>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="w-full px-4 py-2 text-left transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_tipo_cliente','empresa', 'Empresa', 'f-tcliente-label')">
                                        Empresa
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="w-full px-4 py-2 text-left transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_tipo_cliente','persona', 'Persona', 'f-tcliente-label')">
                                        Persona
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- FILTRO TIPO SERVICIO -->
                    <div class="w-full md:col-span-2 lg:col-span-1">
                        <input type="hidden" name="tipo_servicio" id="f_tipo_servicio"
                            value="{{ $tipoServicio ?? '' }}">

                        @php
                            $tipoServicioLabel =
                                ($tipoServicio ?? '') !== ''
                                    ? ($tipoServicio === 'ademanda'
                                        ? 'A demanda'
                                        : 'Mensualizado')
                                    : 'Tipo servicio';
                            $tipoServicioActive = ($tipoServicio ?? '') !== '';
                        @endphp

                        <button type="button" data-dropdown-toggle="f-tservicio-dd"
                            class="ui-input w-full lg:h-11 flex items-center justify-between gap-2">

                            <span
                                class="inline-flex items-center gap-2 min-w-0 transition
           {{ $tipoServicioActive
               ? 'opacity-100 text-slate-800 dark:text-white'
               : 'opacity-60 text-slate-500 dark:text-white dark:opacity-50' }}">

                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
                                </svg>

                                <span id="f-tservicio-label" class="truncate">
                                    {{ $tipoServicioLabel }}
                                </span>
                            </span>

                            <svg class="w-4 h-4 ui-muted shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>


                        <div id="f-tservicio-dd" class="hidden z-20 w-56 rounded-lg ui-shadow ui-border"
                            style="background-color: var(--bg-surface);">
                            <ul class="py-1 text-sm ui-text">
                                <li>
                                    <button type="button" class="w-full px-4 py-2 text-left transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_tipo_servicio','', 'Tipo servicio', 'f-tservicio-label')">
                                        <span class="ui-muted">Mostrar todos</span>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="w-full px-4 py-2 text-left transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_tipo_servicio','ademanda', 'A demanda', 'f-tservicio-label')">
                                        A demanda
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="w-full px-4 py-2 text-left transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_tipo_servicio','mensualizado', 'Mensualizado', 'f-tservicio-label')">
                                        Mensualizado
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                </form>



                {{-- Tabla --}}
                <div class="overflow-x-auto rounded-lg ui-border" style="background-color: var(--bg-surface);">
                    <table class="min-w-full text-sm" style="background-color: var(--bg-surface);">

                        <thead style="background-color: var(--bg-card); border-bottom: 1px solid var(--border-color);">

                            <tr style="border-bottom: 1px solid var(--border-color);">
                                <th class="px-4 py-3 text-left font-semibold ui-text">Código</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Razón social</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">NIT</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Tipo de Cliente
                                </th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">País</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Dirección</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Tipo de Servicio
                                </th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Estado</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse(($clientes ?? collect()) as $c)
                                <tr class="ui-table-row transition-colors"
                                    style="border-bottom: 1px solid var(--border-color);"data-search="{{ strtolower(
                                        ($c->codigo_cliente ?? '') .
                                            ' ' .
                                            ($c->razon_social ?? '') .
                                            ' ' .
                                            ($c->nit ?? '') .
                                            ' ' .
                                            ($c->pais ?? '') .
                                            ' ' .
                                            ($c->direccion ?? '') .
                                            ' ' .
                                            ($c->tipo_servicio ?? ''),
                                    ) }}">

                                    <td class="px-4 py-3 ui-text">

                                        {{ $c->codigo_cliente }}
                                    </td>

                                    <td class="px-4 py-3 ui-text">

                                        {{ $c->razon_social }}
                                    </td>

                                    <td class="px-4 py-3 ui-text">

                                        {{ $c->nit ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3 ui-text">
                                        @php
                                            $tipo = strtolower((string) ($c->tipo_cliente ?? ''));
                                            $isEmpresa = $tipo === 'empresa';
                                            $labelTipo = $isEmpresa
                                                ? 'Empresa'
                                                : ($tipo === 'persona'
                                                    ? 'Persona'
                                                    : '-');

                                            // Colores compatibles claro / oscuro
                                            $tagStyle = $isEmpresa
                                                ? 'background-color: color-mix(in srgb, var(--accent) 18%, transparent); color: var(--accent);'
                                                : 'background-color: color-mix(in srgb, #a855f7 18%, transparent); color: #a855f7;';
                                        @endphp

                                        @if ($labelTipo === '-')
                                            <span class="ui-muted">-</span>
                                        @else
                                            <span
                                                class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold"
                                                style="{{ $tagStyle }}">
                                                {{ $labelTipo }}
                                            </span>
                                        @endif
                                    </td>



                                    <td class="px-4 py-3 ui-text">

                                        {{ $c->pais ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3 max-w-xs ui-text">
                                        <span class="block truncate" title="{{ $c->direccion }}">
                                            {{ $c->direccion ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 ui-text">
                                        @php
                                            $serv = strtolower((string) ($c->tipo_servicio ?? ''));
                                            $isMensual = $serv === 'mensualizado';
                                            $labelServ = $isMensual
                                                ? 'Mensualizado'
                                                : ($serv === 'ademanda'
                                                    ? 'A demanda'
                                                    : '-');

                                            // Colores (claros y oscuros)
                                            $tagStyle = $isMensual
                                                ? 'background-color: color-mix(in srgb, var(--accent) 18%, transparent); color: var(--accent);'
                                                : 'background-color: color-mix(in srgb, #f59e0b 18%, transparent); color: #f59e0b;';
                                        @endphp

                                        @if ($labelServ === '-')
                                            <span class="ui-muted">-</span>
                                        @else
                                            <span
                                                class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold"
                                                style="{{ $tagStyle }}">
                                                {{ $labelServ }}
                                            </span>
                                        @endif
                                    </td>



                                    <td class="px-4 py-3 ui-text">
                                        @php
                                            $activo =
                                                (string) ($c->estado ?? '') === '1' ||
                                                strtolower((string) ($c->estado ?? '')) === 'activo';
                                        @endphp

                                        <label class="relative inline-flex items-center cursor-pointer">
                                            @php
                                                $estadoLower = strtolower((string) ($c->estado ?? 'prospecto'));
                                            @endphp

                                            <input type="checkbox" class="sr-only peer" @checked($estadoLower === 'activo')
                                                data-id="{{ $c->id }}" data-estado="{{ $estadoLower }}"
                                                onchange="onToggleEstado(this)">
                                            <div id="toggle-track-{{ $c->id }}"
                                                class="w-14 h-8 rounded-full transition-colors duration-200"
                                                style="
        background-color:
          {{ $estadoLower === 'activo' ? '#2563eb' : ($estadoLower === 'prospecto' ? '#f59e0b' : '#9ca3af') }};
     ">
                                            </div>

                                            <div id="toggle-dot-{{ $c->id }}"
                                                class="absolute left-1 top-1 w-6 h-6 bg-white rounded-full transition-transform duration-200"
                                                style="transform: translateX({{ $estadoLower === 'activo' ? '24px' : '0px' }});">
                                            </div>


                                        </label>

                                        {{-- Form oculto para ACTIVAR --}}
                                        <form id="activar-form-{{ $c->id }}" method="POST"
                                            action="{{ route('admin.clientes.activar', $c->id) }}" class="hidden">
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                    </td>



                                    <td class="px-4 py-3 ui-text">

                                        <a href="{{ route('admin.clientes.edit', $c->id) }}"
                                            class="inline-flex items-center mr-3 ui-btn-link mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.232 5.232l3.536 3.536M9 11l6.232-6.232a2.5 2.5 0 013.536 3.536L12.536 14.536a4 4 0 01-1.414.94L8 16l.524-3.122a4 4 0 01.94-1.414z" />
                                            </svg>

                                        </a>


                                        <!-- Botón 3 puntos -->
                                        <button id="cliente-actions-dropdown-button-{{ $c->id }}"
                                            data-dropdown-toggle="cliente-actions-dropdown-{{ $c->id }}"
                                            type="button"
                                            class="inline-flex items-center justify-center ui-muted
         hover:opacity-100 opacity-80
         focus:outline-none focus:ring-0 p-0 m-0 leading-none bg-transparent
         rounded-none shadow-none">

                                            <svg class="w-6 h-6 block" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0z
             M12 10a2 2 0 11-4 0 2 2 0 014 0z
             M16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>

                                        <!-- Dropdown (Flowbite) -->
                                        <div id="cliente-actions-dropdown-{{ $c->id }}"
                                            class="hidden z-20 w-60 rounded-lg ui-shadow ui-border"
                                            style="background-color: var(--bg-surface);">

                                            <ul class="py-1 text-sm" style="color: var(--text-main);">

                                                {{-- <li>
                                                    <a href="#"
                                                        class="flex items-center gap-3 px-4 py-2 transition"
                                                        style="border-radius:.5rem;"
                                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                                        onmouseout="this.style.backgroundColor='transparent'">

                                                        <!-- Documento + (Cotización) -->
                                                        <svg class="w-5 h-5 ui-muted"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M9 12h6m-3-3v6m-7 6h10a2 2 0 002-2V7.828a2 2 0 00-.586-1.414l-2.828-2.828A2 2 0 0012.172 3H5a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                        </svg>

                                                        <span>Añadir cotización</span>
                                                    </a>
                                                </li> --}}

                                                <li>
                                                    <a href="{{ route('admin.clientes.contactos.index', $c->id) }}"
                                                        class="flex items-center gap-3 px-4 py-2 transition"
                                                        style="border-radius:.5rem;"
                                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                                        onmouseout="this.style.backgroundColor='transparent'">

                                                        <!-- Icono Persona (Heroicons / Flowbite) -->
                                                        <svg class="w-5 h-5 ui-muted block shrink-0"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M4.5 20.25a7.5 7.5 0 0115 0" />
                                                        </svg>

                                                        <span>Contactos</span>
                                                    </a>
                                                </li>
                                                
                                                <li>
                                                    <a href="{{ route('admin.clientes.proveedores.index', $c->id) }}"
                                                        class="flex items-center gap-3 px-4 py-2 transition"
                                                        style="border-radius:.5rem;"
                                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                                        onmouseout="this.style.backgroundColor='transparent'">

                                                        <!-- Globo (Proveedores de internet) -->
                                                        <svg class="w-5 h-5 ui-muted"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M12 21a9 9 0 100-18 9 9 0 000 18z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M3.6 9h16.8M3.6 15h16.8M12 3a15 15 0 010 18M12 3a15 15 0 000 18" />
                                                        </svg>

                                                        <span>Proveedores de internet y otros</span>
                                                    </a>
                                                </li>
<li>
                                                    <a href="{{ route('admin.clientes.contactos.index', $c->id) }}"
                                                        class="flex items-center gap-3 px-4 py-2 transition"
                                                        style="border-radius:.5rem;"
                                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                                        onmouseout="this.style.backgroundColor='transparent'">

                                                        <!-- Icono Persona (Heroicons / Flowbite) -->
                                                        <svg class="w-5 h-5 ui-muted block shrink-0"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M4.5 20.25a7.5 7.5 0 0115 0" />
                                                        </svg>

                                                        <span>Historial</span>
                                                        <!-- Historial: cotizaciones, ventas, proyectos, tickets, facturas, pagos -->

                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#"
                                                        class="flex items-center gap-3 px-4 py-2 transition"
                                                        style="border-radius:.5rem;"
                                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                                        onmouseout="this.style.backgroundColor='transparent'">

                                                        <!-- Maletín (Otros proveedores) -->
                                                        <svg class="w-5 h-5 ui-muted"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M10 6a2 2 0 114 0v1h5a2 2 0 012 2v3H3V10a2 2 0 012-2h5V6z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M3 13v5a2 2 0 002 2h14a2 2 0 002-2v-5" />
                                                        </svg>

                                                        <span>Adjuntos</span>
                                                        <!-- Adjuntos: contratos, planos de red, docs -->
                                                    </a>
                                                </li>


                                            </ul>
                                        </div>

                                        <dialog id="modal-prospecto-activar-{{ $c->id }}"
                                            class="ui-modal ui-shadow p-0"
                                            onclick="if(event.target === this) this.close()">

                                            <div class="p-6">
                                                <h3 class="text-lg font-semibold" style="color: var(--text-main);">
                                                    Confirmar acción
                                                </h3>

                                                <p class="mt-2 text-sm" style="color: var(--text-muted);">
                                                    Este cliente está en estado <b>Prospecto</b>.
                                                    <br>
                                                    ¿Desea pasarlo a <span class="font-semibold"
                                                        style="color: var(--accent);">Activo</span>?
                                                    <br>
                                                    <span class="text-xs ui-muted">
                                                        Al activar, quedará habilitado como cliente activo.
                                                    </span>
                                                </p>

                                                <div class="mt-6 flex justify-end gap-3">
                                                    <button type="button" class="ui-btn"
                                                        onclick="document.getElementById('modal-prospecto-activar-{{ $c->id }}').close()">
                                                        Cancelar
                                                    </button>

                                                    <button type="button" class="ui-btn-primary"
                                                        onclick="confirmarActivar({{ $c->id }})">
                                                        Activar
                                                    </button>
                                                </div>
                                            </div>
                                        </dialog>


                                        <dialog id="modal-{{ $c->id }}" class="ui-modal ui-shadow p-0"
                                            onclick="if(event.target === this) this.close()">

                                            <div class="p-6">
                                                <h3 class="text-lg font-semibold" style="color: var(--text-main);">
                                                    Confirmar acción
                                                </h3>

                                                <p class="mt-2 text-sm" style="color: var(--text-muted);">
                                                    ¿Deseas marcar como
                                                    <span class="font-semibold" style="color:#ef4444;">Inactivo</span>
                                                    al cliente:
                                                    <br>
                                                    <span class="font-semibold" style="color: var(--text-main);">
                                                        {{ $c->razon_social }}
                                                    </span>?
                                                </p>

                                                <div class="mt-6 flex justify-end gap-3">
                                                    <button type="button" class="ui-btn"
                                                        onclick="document.getElementById('modal-{{ $c->id }}').close()">
                                                        Cancelar
                                                    </button>

                                                    <form method="POST"
                                                        action="{{ route('admin.clientes.inactivar', $c->id) }}">
                                                        @csrf
                                                        @method('PATCH')

                                                        <button type="submit" class="ui-btn-danger">
                                                            Inactivar
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </dialog>
                                        <dialog id="modal-activar-{{ $c->id }}" class="ui-modal ui-shadow p-0"
                                            onclick="if(event.target === this) this.close()">

                                            <div class="p-6">
                                                <h3 class="text-lg font-semibold" style="color: var(--text-main);">
                                                    Confirmar acción
                                                </h3>

                                                <p class="mt-2 text-sm" style="color: var(--text-muted);">
                                                    ¿Deseas marcar como
                                                    <span class="font-semibold"
                                                        style="color: var(--accent);">Activo</span>
                                                    al cliente:
                                                    <br>
                                                    <span class="font-semibold" style="color: var(--text-main);">
                                                        {{ $c->razon_social }}
                                                    </span>?
                                                    <br>
                                                    <span class="text-xs ui-muted">
                                                        Esto cambiará el estado de <b>Inactivo</b> a
                                                        <b>Activo</b>.
                                                    </span>
                                                </p>

                                                <div class="mt-6 flex justify-end gap-3">
                                                    <button type="button" class="ui-btn"
                                                        onclick="document.getElementById('modal-activar-{{ $c->id }}').close()">
                                                        Cancelar
                                                    </button>

                                                    <button type="button" class="ui-btn-primary"
                                                        onclick="confirmarActivar({{ $c->id }})">
                                                        Activar
                                                    </button>
                                                </div>

                                            </div>
                                        </dialog>



                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="ui-table-row transition-colors"
                                        style="border-bottom: 1px solid var(--border-color);">
                                        No hay clientes registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function onToggleEstado(toggle) {
        const id = toggle.getAttribute('data-id');
        const estado = (toggle.getAttribute('data-estado') || '').toLowerCase();

        // QUIERE PASAR A INACTIVO (solo si actualmente está ACTIVO)
        if (estado === 'activo') {
            // lo intenta apagar
            toggle.checked = true; // se queda ON hasta confirmar
            const modal = document.getElementById(`modal-${id}`); // Activo -> Inactivo
            if (modal && typeof modal.showModal === 'function') modal.showModal();
            return;
        }

        // QUIERE ACTIVAR (si está inactivo o prospecto)
        toggle.checked = false; // se queda OFF hasta confirmar

        if (estado === 'prospecto') {
            const mPros = document.getElementById(`modal-prospecto-activar-${id}`);
            if (mPros && typeof mPros.showModal === 'function') mPros.showModal();
            return;
        }

        // estado inactivo => modal activar normal
        const modalActivar = document.getElementById(`modal-activar-${id}`);
        if (modalActivar && typeof modalActivar.showModal === 'function') modalActivar.showModal();
    }

    function confirmarActivar(id) {
        // cerrar ambos modales (por si venía de prospecto o inactivo)
        const m1 = document.getElementById(`modal-activar-${id}`);
        if (m1) m1.close();

        const m2 = document.getElementById(`modal-prospecto-activar-${id}`);
        if (m2) m2.close();

        // toggle + estado
        const toggle = document.querySelector(`input[type="checkbox"][data-id="${id}"]`);
        if (toggle) {
            toggle.checked = true;
            toggle.setAttribute('data-estado', 'activo');
        }

        // mover la bolita a la derecha
        const dot = document.getElementById(`toggle-dot-${id}`);
        if (dot) dot.style.transform = 'translateX(24px)';

        // poner el track azul
        const track = document.getElementById(`toggle-track-${id}`);
        if (track) track.style.backgroundColor = '#2563eb';

        // enviar a BD
        const form = document.getElementById(`activar-form-${id}`);
        if (form) form.submit();
    }

    function setFilter(inputId, value, label, labelId = null) {
        const input = document.getElementById(inputId);
        if (input) input.value = value;

        const targetLabelId = labelId ?? (inputId === 'f_estado' ? 'f-estado-label' :
            inputId === 'f_tipo_cliente' ? 'f-tcliente-label' :
            'f-tservicio-label');

        const lbl = document.getElementById(targetLabelId);
        if (lbl) lbl.textContent = label;

        // enviar el GET inmediatamente
        const form = input.closest('form');
        if (form) form.submit();
    }
    document.addEventListener('DOMContentLoaded', () => {
        const input = document.getElementById('q-input');
        const tbody = document.querySelector('table tbody');
        input.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') e.preventDefault();
        });
        if (!input || !tbody) return;

        const rows = Array.from(tbody.querySelectorAll('tr[data-search]'));
        const emptyRow = tbody.querySelector('tr:not([data-search])'); // "No hay clientes..."

        const normalize = (s) => (s || '')
            .toString()
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '') // quita tildes
            .trim();

        const filterTable = () => {
            const q = normalize(input.value);
            let visible = 0;

            rows.forEach(tr => {
                const hay = normalize(tr.dataset.search);
                const show = (q === '') || hay.includes(q);
                tr.style.display = show ? '' : 'none';
                if (show) visible++;
            });

            if (emptyRow) emptyRow.style.display = (visible === 0) ? '' : 'none';
        };

        input.addEventListener('input', filterTable);

        // ESC limpia rápido
        input.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                input.value = '';
                filterTable();
            }
        });

        filterTable();

    });
</script>
