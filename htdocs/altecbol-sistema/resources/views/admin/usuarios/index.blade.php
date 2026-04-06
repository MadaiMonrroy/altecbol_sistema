<x-app-layout>
    <div class="py-8">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

            <div class="shadow rounded-lg p-6 text-[var(--text-main)]"
                style="background-color: var(--bg-surface); border-color: var(--border-color);">

                {{-- Título --}}
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-[var(--text-main)]">
                        Gestión de usuarios
                    </h3>

                    <div class="flex items-right gap-3 pt-4">
                        <a href="{{ route('admin.usuarios.create') }}" class="ui-btn-primary">
                            + Nuevo usuario
                        </a>

                        <a href="{{ route('admin.usuarios.index') }}" class="ui-btn">
                            Limpiar
                        </a>
                    </div>
                </div>

                {{-- =========================
                    USUARIOS INTERNOS
                ========================== --}}
                <div class="ui-card p-5 mb-10">
    <div class="flex items-center justify-between mb-4">
        <div>
            <h4 class="text-base font-semibold ui-text">Usuarios internos</h4>
            <p class="text-sm ui-muted">Personal administrativo y operativo del sistema.</p>
        </div>

        <span class="text-sm ui-muted">{{ $usuariosInternos->count() }} registros</span>
    </div>

    <form method="GET" action="{{ route('admin.usuarios.index') }}"
        class="mb-6 grid w-full gap-3
        grid-cols-1
        md:grid-cols-2 md:items-center
        lg:grid-cols-[minmax(0,1fr)_10rem_10rem]
        lg:items-center">

        {{-- Buscador interno frontend --}}
        <div class="relative w-full md:col-span-2 lg:col-span-1">
            <div class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 ui-muted">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                </svg>
            </div>

            <input id="q-interno-input" type="search" value="{{ $qInterno ?? '' }}"
                class="ui-input w-full pl-11 lg:h-11"
                placeholder="Buscar interno por nombre, correo o teléfono..." autocomplete="off">
        </div>

        {{-- FILTRO ROL INTERNO --}}
        <div class="w-full">
            <input type="hidden" name="role_interno" id="f_role_interno" value="{{ $roleInterno ?? '' }}">

            @php
                $roleInternoMap = [
                    'admin' => 'Admin',
                    'comercial' => 'Comercial',
                    'soporte_1' => 'Soporte 1',
                    'soporte_2' => 'Soporte 2',
                    'soporte_3' => 'Soporte 3',
                    'finanzas' => 'Finanzas',
                ];
                $roleInternoLabel = ($roleInterno ?? '') !== '' ? ($roleInternoMap[$roleInterno] ?? ucfirst($roleInterno)) : 'Rol';
                $roleInternoActive = ($roleInterno ?? '') !== '';
            @endphp

            <button type="button" data-dropdown-toggle="f-role-interno-dd"
                class="ui-input w-full lg:h-11 flex items-center justify-between gap-2">

                <span class="inline-flex items-center gap-2 min-w-0 transition
                    {{ $roleInternoActive ? 'opacity-100 text-slate-800 dark:text-white' : 'opacity-60 text-slate-500 dark:text-white dark:opacity-50' }}">

                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
                    </svg>

                    <span id="f-role-interno-label" class="truncate">
                        {{ $roleInternoLabel }}
                    </span>
                </span>

                <svg class="w-4 h-4 ui-muted shrink-0" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div id="f-role-interno-dd" class="hidden z-20 w-56 rounded-lg ui-shadow ui-border"
                style="background-color: var(--bg-surface);">
                <ul class="py-1 text-sm ui-text">
                    <li>
                        <button type="button" class="w-full px-4 py-2 text-left transition"
                            style="border-radius:.5rem;"
                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                            onmouseout="this.style.backgroundColor='transparent'"
                            onclick="setUserFilter('f_role_interno','', 'Rol', 'f-role-interno-label')">
                            <span class="ui-muted">Mostrar todos</span>
                        </button>
                    </li>

                    @foreach (['admin' => 'Admin', 'comercial' => 'Comercial', 'soporte_1' => 'Soporte 1', 'soporte_2' => 'Soporte 2', 'soporte_3' => 'Soporte 3', 'finanzas' => 'Finanzas'] as $value => $label)
                        <li>
                            <button type="button" class="w-full px-4 py-2 text-left transition"
                                style="border-radius:.5rem;"
                                onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                onmouseout="this.style.backgroundColor='transparent'"
                                onclick="setUserFilter('f_role_interno','{{ $value }}', '{{ $label }}', 'f-role-interno-label')">
                                {{ $label }}
                            </button>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- FILTRO ESTADO INTERNO --}}
        <div class="w-full">
            <input type="hidden" name="estado_interno" id="f_estado_interno" value="{{ $estadoInterno ?? '' }}">

            @php
                $estadoInternoLabel = ($estadoInterno ?? '') !== '' ? ucfirst($estadoInterno) : 'Estado';
                $estadoInternoActive = ($estadoInterno ?? '') !== '';
            @endphp

            <button type="button" data-dropdown-toggle="f-estado-interno-dd"
                class="ui-input w-full lg:h-11 flex items-center justify-between gap-2">

                <span class="inline-flex items-center gap-2 min-w-0 transition
                    {{ $estadoInternoActive ? 'opacity-100 text-slate-800 dark:text-white' : 'opacity-60 text-slate-500 dark:text-white dark:opacity-50' }}">

                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
                    </svg>

                    <span id="f-estado-interno-label" class="truncate">
                        {{ $estadoInternoLabel }}
                    </span>
                </span>

                <svg class="w-4 h-4 ui-muted shrink-0" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div id="f-estado-interno-dd" class="hidden z-20 w-56 rounded-lg ui-shadow ui-border"
                style="background-color: var(--bg-surface);">
                <ul class="py-1 text-sm ui-text">
                    <li>
                        <button type="button" class="w-full px-4 py-2 text-left transition"
                            style="border-radius:.5rem;"
                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                            onmouseout="this.style.backgroundColor='transparent'"
                            onclick="setUserFilter('f_estado_interno','', 'Estado', 'f-estado-interno-label')">
                            <span class="ui-muted">Mostrar todos</span>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="w-full px-4 py-2 text-left transition"
                            style="border-radius:.5rem;"
                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                            onmouseout="this.style.backgroundColor='transparent'"
                            onclick="setUserFilter('f_estado_interno','activo', 'Activo', 'f-estado-interno-label')">
                            Activo
                        </button>
                    </li>
                    <li>
                        <button type="button" class="w-full px-4 py-2 text-left transition"
                            style="border-radius:.5rem;"
                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                            onmouseout="this.style.backgroundColor='transparent'"
                            onclick="setUserFilter('f_estado_interno','inactivo', 'Inactivo', 'f-estado-interno-label')">
                            Inactivo
                        </button>
                    </li>
                    <li>
                        <button type="button" class="w-full px-4 py-2 text-left transition"
                            style="border-radius:.5rem;"
                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                            onmouseout="this.style.backgroundColor='transparent'"
                            onclick="setUserFilter('f_estado_interno','bloqueado', 'Bloqueado', 'f-estado-interno-label')">
                            Bloqueado
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </form>

    <div class="overflow-x-auto rounded-lg ui-border" style="background-color: var(--bg-surface);">
        <table class="min-w-full text-sm" style="background-color: var(--bg-surface);">
            <thead style="background-color: var(--bg-card); border-bottom: 1px solid var(--border-color);">
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <th class="px-4 py-3 text-left font-semibold ui-text">Nombre</th>
                    <th class="px-4 py-3 text-left font-semibold ui-text">Correo</th>
                    <th class="px-4 py-3 text-left font-semibold ui-text">Teléfono</th>
                    <th class="px-4 py-3 text-left font-semibold ui-text">Rol</th>
                    <th class="px-4 py-3 text-left font-semibold ui-text">Estado</th>
                    <th class="px-4 py-3 text-left font-semibold ui-text">Último acceso</th>
                    <th class="px-4 py-3 text-left font-semibold ui-text">Acciones</th>
                </tr>
            </thead>
            <tbody id="tbody-usuarios-internos">
                @forelse($usuariosInternos as $u)
                    <tr class="ui-table-row transition-colors"
                        style="border-bottom: 1px solid var(--border-color);"
                        data-search="{{ strtolower(($u->name ?? '') . ' ' . ($u->email ?? '') . ' ' . ($u->telefono ?? '') . ' ' . ($u->role ?? '') . ' ' . ($u->estado ?? '')) }}">

                        <td class="px-4 py-3 ui-text font-medium">{{ $u->name }}</td>
                        <td class="px-4 py-3 ui-text">{{ $u->email }}</td>
                        <td class="px-4 py-3 ui-text">{{ $u->telefono ?: '-' }}</td>

                        <td class="px-4 py-3 ui-text">
                            @php
                                $roleMap = [
                                    'admin' => ['Admin', 'background-color: color-mix(in srgb, #ef4444 18%, transparent); color: #ef4444;'],
                                    'comercial' => ['Comercial', 'background-color: color-mix(in srgb, #3b82f6 18%, transparent); color: #3b82f6;'],
                                    'soporte_1' => ['Soporte 1', 'background-color: color-mix(in srgb, #10b981 18%, transparent); color: #10b981;'],
                                    'soporte_2' => ['Soporte 2', 'background-color: color-mix(in srgb, #14b8a6 18%, transparent); color: #14b8a6;'],
                                    'soporte_3' => ['Soporte 3', 'background-color: color-mix(in srgb, #22c55e 18%, transparent); color: #22c55e;'],
                                    'finanzas' => ['Finanzas', 'background-color: color-mix(in srgb, #a855f7 18%, transparent); color: #a855f7;'],
                                ];
                                [$roleLabel, $roleStyle] = $roleMap[$u->role] ?? ['Sin rol', 'background-color: color-mix(in srgb, #94a3b8 18%, transparent); color: #94a3b8;'];
                            @endphp

                            <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold"
                                style="{{ $roleStyle }}">
                                {{ $roleLabel }}
                            </span>
                        </td>

                        <td class="px-4 py-3 ui-text">
                            @php
                                $estadoMap = [
                                    'activo' => ['Activo', 'background-color: color-mix(in srgb, #22c55e 18%, transparent); color: #22c55e;'],
                                    'inactivo' => ['Inactivo', 'background-color: color-mix(in srgb, #f59e0b 18%, transparent); color: #f59e0b;'],
                                    'bloqueado' => ['Bloqueado', 'background-color: color-mix(in srgb, #ef4444 18%, transparent); color: #ef4444;'],
                                ];
                                [$estadoLabel, $estadoStyle] = $estadoMap[$u->estado] ?? ['-', 'background-color: color-mix(in srgb, #94a3b8 18%, transparent); color: #94a3b8;'];
                            @endphp

                            <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold"
                                style="{{ $estadoStyle }}">
                                {{ $estadoLabel }}
                            </span>
                        </td>

                        <td class="px-4 py-3 ui-text">
                            {{ $u->last_login_at ? $u->last_login_at->format('d/m/Y H:i') : '-' }}
                        </td>

                        <td class="px-4 py-3 ui-text">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.usuarios.show', $u->id) }}"
                                    class="inline-flex items-center ui-btn-link" title="Ver">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                    </svg>
                                </a>

                                <a href="{{ route('admin.usuarios.edit', $u->id) }}"
                                    class="inline-flex items-center ui-btn-link" title="Editar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.232 5.232l3.536 3.536M9 11l6.232-6.232a2.5 2.5 0 013.536 3.536L12.536 14.536a4 4 0 01-1.414.94L8 16l.524-3.122a4 4 0 01.94-1.414z" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr id="internos-server-empty-row">
                        <td colspan="7" class="px-4 py-6 text-center ui-muted">
                            No hay usuarios internos registrados.
                        </td>
                    </tr>
                @endforelse

                <tr id="internos-filter-empty-row" style="display: none;">
                    <td colspan="7" class="px-4 py-6 text-center ui-muted">
                        No hay usuarios registrados con esos parámetros.
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

                {{-- =========================
                    USUARIOS WEB
                ========================== --}}
               <div class="ui-card p-5 mt-10 ">
    <div class="flex items-center justify-between mb-4">
        <div>
            <h4 class="text-base font-semibold ui-text">Usuarios web</h4>
            <p class="text-sm ui-muted">Usuarios registrados desde la tienda o página web.</p>
        </div>

        <span class="text-sm ui-muted">{{ $usuariosWeb->total() }} registros</span>
    </div>

    <form method="GET" action="{{ route('admin.usuarios.index') }}"
        class="mb-6 grid w-full gap-3
        grid-cols-1
        md:grid-cols-2 md:items-center
        lg:grid-cols-[minmax(0,1fr)_10rem]
        lg:items-center">

        <input type="hidden" name="role_interno" value="{{ $roleInterno ?? '' }}">
        <input type="hidden" name="estado_interno" value="{{ $estadoInterno ?? '' }}">

        <div class="relative w-full">
            <div class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 ui-muted">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                </svg>
            </div>

            <input type="search" name="q_web" value="{{ $qWeb ?? '' }}" class="ui-input w-full pl-11 lg:h-11"
                placeholder="Buscar comprador web..." autocomplete="off">
        </div>

        <div class="w-full">
            <input type="hidden" name="estado_web" id="f_estado_web" value="{{ $estadoWeb ?? '' }}">

            @php
                $estadoWebLabel = ($estadoWeb ?? '') !== '' ? ucfirst($estadoWeb) : 'Estado';
                $estadoWebActive = ($estadoWeb ?? '') !== '';
            @endphp

            <button type="button" data-dropdown-toggle="f-estado-web-dd"
                class="ui-input w-full lg:h-11 flex items-center justify-between gap-2">

                <span class="inline-flex items-center gap-2 min-w-0 transition
                    {{ $estadoWebActive ? 'opacity-100 text-slate-800 dark:text-white' : 'opacity-60 text-slate-500 dark:text-white dark:opacity-50' }}">
                    <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
                    </svg>

                    <span id="f-estado-web-label" class="truncate">
                        {{ $estadoWebLabel }}
                    </span>
                </span>

                <svg class="w-4 h-4 ui-muted shrink-0" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div id="f-estado-web-dd" class="hidden z-20 w-56 rounded-lg ui-shadow ui-border"
                style="background-color: var(--bg-surface);">
                <ul class="py-1 text-sm ui-text">
                    <li><button type="button" class="w-full px-4 py-2 text-left transition"
                            style="border-radius:.5rem;"
                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                            onmouseout="this.style.backgroundColor='transparent'"
                            onclick="setUserFilter('f_estado_web','', 'Estado', 'f-estado-web-label')"><span class="ui-muted">Mostrar todos</span></button></li>
                    <li><button type="button" class="w-full px-4 py-2 text-left transition"
                            style="border-radius:.5rem;"
                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                            onmouseout="this.style.backgroundColor='transparent'"
                            onclick="setUserFilter('f_estado_web','activo', 'Activo', 'f-estado-web-label')">Activo</button></li>
                    <li><button type="button" class="w-full px-4 py-2 text-left transition"
                            style="border-radius:.5rem;"
                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                            onmouseout="this.style.backgroundColor='transparent'"
                            onclick="setUserFilter('f_estado_web','inactivo', 'Inactivo', 'f-estado-web-label')">Inactivo</button></li>
                    <li><button type="button" class="w-full px-4 py-2 text-left transition"
                            style="border-radius:.5rem;"
                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                            onmouseout="this.style.backgroundColor='transparent'"
                            onclick="setUserFilter('f_estado_web','bloqueado', 'Bloqueado', 'f-estado-web-label')">Bloqueado</button></li>
                </ul>
            </div>
        </div>
    </form>

    <div class="overflow-x-auto rounded-lg ui-border" style="background-color: var(--bg-surface);">
        <table class="min-w-full text-sm" style="background-color: var(--bg-surface);">
            <thead style="background-color: var(--bg-card); border-bottom: 1px solid var(--border-color);">
                <tr style="border-bottom: 1px solid var(--border-color);">
                    <th class="px-4 py-3 text-left font-semibold ui-text">Nombre</th>
                    <th class="px-4 py-3 text-left font-semibold ui-text">Correo</th>
                    <th class="px-4 py-3 text-left font-semibold ui-text">Teléfono</th>
                    <th class="px-4 py-3 text-left font-semibold ui-text">Estado</th>
                    <th class="px-4 py-3 text-left font-semibold ui-text">Último acceso</th>
                    <th class="px-4 py-3 text-left font-semibold ui-text">Registro</th>
                    <th class="px-4 py-3 text-left font-semibold ui-text">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($usuariosWeb as $u)
                    <tr class="ui-table-row transition-colors"
                        style="border-bottom: 1px solid var(--border-color);">

                        <td class="px-4 py-3 ui-text font-medium">{{ $u->name }}</td>
                        <td class="px-4 py-3 ui-text">{{ $u->email }}</td>
                        <td class="px-4 py-3 ui-text">{{ $u->telefono ?: '-' }}</td>

                        <td class="px-4 py-3 ui-text">
                            @php
                                $estadoMap = [
                                    'activo' => ['Activo', 'background-color: color-mix(in srgb, #22c55e 18%, transparent); color: #22c55e;'],
                                    'inactivo' => ['Inactivo', 'background-color: color-mix(in srgb, #f59e0b 18%, transparent); color: #f59e0b;'],
                                    'bloqueado' => ['Bloqueado', 'background-color: color-mix(in srgb, #ef4444 18%, transparent); color: #ef4444;'],
                                ];
                                [$estadoLabel, $estadoStyle] = $estadoMap[$u->estado] ?? ['-', 'background-color: color-mix(in srgb, #94a3b8 18%, transparent); color: #94a3b8;'];
                            @endphp

                            <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold"
                                style="{{ $estadoStyle }}">
                                {{ $estadoLabel }}
                            </span>
                        </td>

                        <td class="px-4 py-3 ui-text">{{ $u->last_login_at ? $u->last_login_at->format('d/m/Y H:i') : '-' }}</td>
                        <td class="px-4 py-3 ui-text">{{ $u->created_at ? $u->created_at->format('d/m/Y') : '-' }}</td>

                        <td class="px-4 py-3 ui-text">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('admin.usuarios.show', $u->id) }}"
                                    class="inline-flex items-center ui-btn-link" title="Ver">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                    </svg>
                                </a>

                                <a href="{{ route('admin.usuarios.edit', $u->id) }}"
                                    class="inline-flex items-center ui-btn-link" title="Editar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.232 5.232l3.536 3.536M9 11l6.232-6.232a2.5 2.5 0 013.536 3.536L12.536 14.536a4 4 0 01-1.414.94L8 16l.524-3.122a4 4 0 01.94-1.414z" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center ui-muted">
                            No hay usuarios web registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $usuariosWeb->links() }}
    </div>
</div>

            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function setUserFilter(inputId, value, label, labelId) {
        const input = document.getElementById(inputId);
        if (input) input.value = value;

        const lbl = document.getElementById(labelId);
        if (lbl) lbl.textContent = label;

        const form = input.closest('form');
        if (form) form.submit();
    }

    document.addEventListener('DOMContentLoaded', () => {
        const input = document.getElementById('q-interno-input');
        const tbody = document.getElementById('tbody-usuarios-internos');
        if (!input || !tbody) return;

        const rows = Array.from(tbody.querySelectorAll('tr[data-search]'));
        const serverEmptyRow = document.getElementById('internos-server-empty-row');
        const filterEmptyRow = document.getElementById('internos-filter-empty-row');

        const normalize = (s) => (s || '')
            .toString()
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
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

            if (serverEmptyRow) {
                serverEmptyRow.style.display = 'none';
            }

            if (filterEmptyRow) {
                filterEmptyRow.style.display = visible === 0 && rows.length > 0 ? '' : 'none';
            }
        };

        input.addEventListener('input', filterTable);

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                input.value = '';
                filterTable();
            }
        });

        filterTable();
    });
</script>