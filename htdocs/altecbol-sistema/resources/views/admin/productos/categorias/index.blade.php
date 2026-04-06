<x-app-layout>
    <div class="py-8">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

            <div class="rounded-2xl p-6 shadow text-[var(--text-main)]"
                style="background-color: var(--bg-surface); border: 1px solid var(--border-color);">

                {{-- Header --}}
                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between mb-6">
                    <div>
                        <h2 class="text-xl font-semibold tracking-tight text-[var(--text-main)]">
                            Gestión de categorías
                        </h2>
                        <p class="text-sm mt-1 ui-muted">
                            Administra las categorías de tu catálogo.
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center gap-3">
                        <a href="{{ route('admin.productos.categorias.create') }}" class="ui-btn-primary">
                            + Nueva categoría
                        </a>

                        <a href="{{ route('admin.productos.categorias.index') }}" class="ui-btn">
                            Limpiar
                        </a>
                    </div>
                </div>

                {{-- Success --}}
                @if (session('success'))
                    <div class="mb-5 rounded-xl px-4 py-3 text-sm"
                        style="background-color: color-mix(in srgb, var(--accent) 12%, transparent); border: 1px solid color-mix(in srgb, var(--accent) 28%, transparent); color: var(--text-main);">
                        {{ session('success') }}
                    </div>
                @endif

                @php
                    $estadoLabel =
                        ($estado ?? '') !== ''
                            ? match ($estado) {
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                                default => 'Estado',
                            }
                            : 'Estado';

                    $estadoActive = ($estado ?? '') !== '';
                @endphp

                {{-- Filtros --}}
                <form method="GET" action="{{ route('admin.productos.categorias.index') }}"
                    class="mb-6 grid w-full gap-3 grid-cols-1 md:grid-cols-2 xl:grid-cols-[minmax(0,1.4fr)_12rem] xl:items-center">

                    {{-- Buscador local --}}
                    <div class="relative w-full">
                        <div class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 ui-muted">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                            </svg>
                        </div>

                        <input id="q-input" type="search" class="ui-input w-full pl-11 lg:h-11"
                            placeholder="Buscar por nombre o descripción..." autocomplete="off">
                    </div>

                    {{-- Estado --}}
                    <div class="w-full relative">
                        <input type="hidden" name="estado" id="f_estado" value="{{ $estado ?? '' }}">

                        <button type="button" data-dropdown-toggle="f-estado-dd"
                            class="ui-input w-full lg:h-11 flex items-center justify-between gap-2">

                            <span
                                class="inline-flex items-center gap-2 min-w-0 transition
                                {{ $estadoActive ? 'opacity-100 text-slate-800 dark:text-white' : 'opacity-60 text-slate-500 dark:text-white dark:opacity-50' }}">

                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
                                </svg>

                                <span id="f-estado-label" class="truncate">
                                    {{ $estadoLabel }}
                                </span>
                            </span>

                            <svg class="w-4 h-4 ui-muted shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="f-estado-dd"
                            class="hidden absolute left-0 top-full mt-2 z-20 min-w-full w-max rounded-lg ui-shadow ui-border"
                            style="background-color: var(--bg-surface);">
                            <ul class="py-1 text-sm ui-text">
                                <li>
                                    <button type="button" class="w-full px-4 py-2 text-left transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_estado','', 'Estado', 'f-estado-label')">
                                        <span class="ui-muted">Mostrar todos</span>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="w-full px-4 py-2 text-left transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_estado','activo', 'Activo', 'f-estado-label')">
                                        Activo
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="w-full px-4 py-2 text-left transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_estado','inactivo', 'Inactivo', 'f-estado-label')">
                                        Inactivo
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>

                {{-- Tabla --}}
                <div class="overflow-x-auto rounded-2xl ui-border"
                    style="background-color: var(--bg-surface); border: 1px solid var(--border-color);">
                    <table class="min-w-full text-sm">
                        <thead style="background-color: var(--bg-card); border-bottom: 1px solid var(--border-color);">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold ui-text">#</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Nombre</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Descripción</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Estado</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Registro</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($categorias as $categoria)
                                @php
                                    $estadoStyle = match ($categoria->estado) {
                                        'activo'
                                            => 'background-color: color-mix(in srgb, var(--accent) 18%, transparent); color: var(--accent);',
                                        'inactivo'
                                            => 'background-color: color-mix(in srgb, #ef4444 18%, transparent); color: #dc2626;',
                                        default
                                            => 'background-color: color-mix(in srgb, #94a3b8 18%, transparent); color: #64748b;',
                                    };
                                @endphp

                                <tr class="ui-table-row transition-colors"
                                    style="border-bottom: 1px solid var(--border-color);"
                                    data-search="{{ strtolower(($categoria->nombre ?? '') . ' ' . ($categoria->descripcion ?? '') . ' ' . ($categoria->estado ?? '')) }}">
                                    <td class="px-4 py-3 ui-text">
                                        {{ ($categorias->currentPage() - 1) * $categorias->perPage() + $loop->iteration }}
                                    </td>

                                    <td class="px-4 py-3 min-w-[220px]">
                                        <div class="font-semibold ui-text">
                                            {{ $categoria->nombre }}
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 min-w-[280px] ui-text">
                                        <div class="text-sm ui-text">
                                            {{ $categoria->descripcion ?: 'Sin descripción' }}
                                        </div>
                                    </td>

                                    <td class="px-4 py-3">
                                        <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold"
                                            style="{{ $estadoStyle }}">
                                            {{ ucfirst($categoria->estado) }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3 ui-text">
                                        <div class="text-sm">
                                            {{ optional($categoria->created_at)->format('d/m/Y') ?: '-' }}
                                        </div>
                                        <div class="text-xs ui-muted mt-1">
                                            {{ optional($categoria->created_at)->format('H:i') ?: '' }}
                                        </div>
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('admin.productos.categorias.edit', $categoria->id) }}"
                                                class="inline-flex items-center justify-center w-9 h-9 rounded-xl transition"
                                                style="border: 1px solid var(--border-color);"
                                                title="Editar categoría">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.232 5.232l3.536 3.536M9 11l6.232-6.232a2.5 2.5 0 013.536 3.536L12.536 14.536a4 4 0 01-1.414.94L8 16l.524-3.122a4 4 0 01.94-1.414z" />
                                                </svg>
                                            </a>

                                            <form method="POST"
                                                action="{{ route('admin.productos.categorias.destroy', $categoria->id) }}"
                                                onsubmit="return confirm('¿Deseas eliminar esta categoría?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="inline-flex items-center justify-center w-9 h-9 rounded-xl transition"
                                                    style="border: 1px solid var(--border-color); color: #ef4444;"
                                                    title="Eliminar categoría">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                        stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 7h12M9 7V5h6v2m-7 4v6m4-6v6m4-6v6M5 7l1 12a2 2 0 002 2h8a2 2 0 002-2l1-12" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr id="empty-db-row">
                                    <td colspan="6" class="px-4 py-8 text-center ui-muted">
                                        No hay categorías registradas con esos filtros.
                                    </td>
                                </tr>
                            @endforelse

                            <tr id="empty-search-row" style="display:none;">
                                <td colspan="6" class="px-4 py-8 text-center ui-muted">
                                    No hay categorías en esta tabla con esa búsqueda.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-5">
                    {{ $categorias->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function setFilter(inputId, value, label, labelId = null) {
        const input = document.getElementById(inputId);
        if (input) input.value = value;

        if (labelId) {
            const lbl = document.getElementById(labelId);
            if (lbl) lbl.textContent = label;
        }

        const form = input.closest('form');
        if (form) form.submit();
    }

    document.addEventListener('DOMContentLoaded', () => {
        const input = document.getElementById('q-input');
        const tbody = document.querySelector('table tbody');

        if (!input || !tbody) return;

        const rows = Array.from(tbody.querySelectorAll('tr[data-search]'));
        const emptySearchRow = document.getElementById('empty-search-row');
        const emptyDbRow = document.getElementById('empty-db-row');

        const normalize = (text) => {
            return (text || '')
                .toString()
                .toLowerCase()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .trim();
        };

        const filterTable = () => {
            const q = normalize(input.value);
            let visible = 0;

            rows.forEach(row => {
                const haystack = normalize(row.dataset.search);
                const show = q === '' || haystack.includes(q);

                row.style.display = show ? '' : 'none';

                if (show) visible++;
            });

            if (emptyDbRow) {
                emptyDbRow.style.display = rows.length === 0 ? '' : 'none';
            }

            if (emptySearchRow) {
                emptySearchRow.style.display = (rows.length > 0 && visible === 0) ? '' : 'none';
            }
        };

        input.addEventListener('input', filterTable);

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Enter') e.preventDefault();

            if (e.key === 'Escape') {
                input.value = '';
                filterTable();
            }
        });

        filterTable();
    });
</script>