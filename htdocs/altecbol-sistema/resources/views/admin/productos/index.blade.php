<x-app-layout>
    <div class="py-8">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

            <div class="rounded-2xl p-6 shadow text-[var(--text-main)]"
                style="background-color: var(--bg-surface); border: 1px solid var(--border-color);">

                {{-- Header --}}
                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between mb-6">
                    <div>
                        <h2 class="text-xl font-semibold tracking-tight text-[var(--text-main)]">
                            Gestión de productos
                        </h2>
                        <p class="text-sm mt-1 ui-muted">
                            Administra tu catálogo, imágenes, stock y publicación.
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center gap-3">
                        <a href="{{ route('admin.productos.create') }}" class="ui-btn-primary">
                            + Nuevo producto
                        </a>

                        <a href="{{ route('admin.productos.index') }}" class="ui-btn">
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
                    $categoriaLabel =
                        !empty($categoriaId) && isset($categorias)
                            ? optional($categorias->firstWhere('id', (int) $categoriaId))->nombre ?? 'Categoría'
                            : 'Categoría';

                    $marcaLabel =
                        !empty($marcaId) && isset($marcas)
                            ? optional($marcas->firstWhere('id', (int) $marcaId))->nombre ?? 'Marca'
                            : 'Marca';

                    $estadoPublicacionLabel =
                        ($estadoPublicacion ?? '') !== ''
                            ? match ($estadoPublicacion) {
                                'activo' => 'Activo',
                                'inactivo' => 'Inactivo',
                                'borrador' => 'Borrador',
                                default => 'Publicación',
                            }
                            : 'Publicación';

                    $estadoStockLabel =
                        ($estadoStock ?? '') !== ''
                            ? match ($estadoStock) {
                                'disponible' => 'Disponible',
                                'agotado' => 'Agotado',
                                'consultar_stock' => 'Consultar stock',
                                default => 'Stock',
                            }
                            : 'Stock';

                    $categoriaActive = !empty($categoriaId);
                    $marcaActive = !empty($marcaId);
                    $estadoPublicacionActive = ($estadoPublicacion ?? '') !== '';
                    $estadoStockActive = ($estadoStock ?? '') !== '';
                @endphp

                {{-- Filtros --}}
                <form method="GET" action="{{ route('admin.productos.index') }}"
                    class="mb-6 grid w-full gap-3
                        grid-cols-1
                        md:grid-cols-2 md:items-center
                        xl:grid-cols-[minmax(0,1.35fr)_11rem_11rem_11rem_11rem]
                        xl:items-center">

                    {{-- Buscador local --}}
                    <div class="relative w-full md:col-span-2 xl:col-span-1">
                        <div class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 ui-muted">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                            </svg>
                        </div>

                        <input id="q-input" type="search" class="ui-input w-full pl-11 lg:h-11"
                            placeholder="Buscar por producto, código, SKU, categoría o marca..." autocomplete="off">
                    </div>

                    {{-- CATEGORÍA --}}
                    <div class="w-full relative">
                        <input type="hidden" name="categoria_id" id="f_categoria_id" value="{{ $categoriaId ?? '' }}">
                        <input type="hidden" name="marca_id" value="{{ $marcaId ?? '' }}">
                        <input type="hidden" name="estado_publicacion" value="{{ $estadoPublicacion ?? '' }}">
                        <input type="hidden" name="estado_stock" value="{{ $estadoStock ?? '' }}">
                        <input type="hidden" name="es_oferta" value="{{ $esOferta ?? '' }}">

                        <button type="button" data-dropdown-toggle="f-categoria-dd"
                            class="ui-input w-full lg:h-11 flex items-center justify-between gap-2">

                            <span
                                class="inline-flex items-center gap-2 min-w-0 transition
                                {{ $categoriaActive ? 'opacity-100 text-slate-800 dark:text-white' : 'opacity-60 text-slate-500 dark:text-white dark:opacity-50' }}">

                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
                                </svg>

                                <span id="f-categoria-label" class="truncate">
                                    {{ $categoriaLabel }}
                                </span>
                            </span>

                            <svg class="w-4 h-4 ui-muted shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="f-categoria-dd"
                            class="hidden absolute left-0 top-full mt-2 z-20 min-w-full w-max rounded-lg ui-shadow ui-border"
                            style="background-color: var(--bg-surface);">
                            <ul class="py-1 text-sm ui-text max-h-72 overflow-auto">
                                <li>
                                    <button type="button" class="w-full flex items-center gap-3 px-4 py-2 transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_categoria_id','', 'Categoría', 'f-categoria-label')">
                                        <span class="ui-muted">Mostrar todas</span>
                                    </button>
                                </li>

                                @foreach ($categorias as $cat)
                                    <li>
                                        <button type="button"
                                            class="w-full flex items-center gap-3 px-4 py-2 transition text-left"
                                            style="border-radius:.5rem;"
                                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                            onmouseout="this.style.backgroundColor='transparent'"
                                            onclick="setFilter('f_categoria_id','{{ $cat->id }}', '{{ e($cat->nombre) }}', 'f-categoria-label')">
                                            {{ $cat->nombre }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- MARCA --}}
                    <div class="w-full relative">
                        <input type="hidden" name="marca_id" id="f_marca_id" value="{{ $marcaId ?? '' }}">

                        <button type="button" data-dropdown-toggle="f-marca-dd"
                            class="ui-input w-full lg:h-11 flex items-center justify-between gap-2">

                            <span
                                class="inline-flex items-center gap-2 min-w-0 transition
                                {{ $marcaActive ? 'opacity-100 text-slate-800 dark:text-white' : 'opacity-60 text-slate-500 dark:text-white dark:opacity-50' }}">

                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
                                </svg>

                                <span id="f-marca-label" class="truncate">
                                    {{ $marcaLabel }}
                                </span>
                            </span>

                            <svg class="w-4 h-4 ui-muted shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="f-marca-dd"
                            class="hidden absolute left-0 top-full mt-2 z-20 min-w-full w-max rounded-lg ui-shadow ui-border"
                            style="background-color: var(--bg-surface);">
                            <ul class="py-1 text-sm ui-text max-h-72 overflow-auto">
                                <li>
                                    <button type="button" class="w-full flex items-center gap-3 px-4 py-2 transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_marca_id','', 'Marca', 'f-marca-label')">
                                        <span class="ui-muted">Mostrar todas</span>
                                    </button>
                                </li>

                                @foreach ($marcas as $marca)
                                    <li>
                                        <button type="button"
                                            class="w-full flex items-center gap-3 px-4 py-2 transition text-left"
                                            style="border-radius:.5rem;"
                                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                            onmouseout="this.style.backgroundColor='transparent'"
                                            onclick="setFilter('f_marca_id','{{ $marca->id }}', '{{ e($marca->nombre) }}', 'f-marca-label')">
                                            {{ $marca->nombre }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- ESTADO PUBLICACIÓN --}}
                    <div class="w-full relative">
                        <input type="hidden" name="estado_publicacion" id="f_estado_publicacion"
                            value="{{ $estadoPublicacion ?? '' }}">

                        <button type="button" data-dropdown-toggle="f-estado-publicacion-dd"
                            class="ui-input w-full lg:h-11 flex items-center justify-between gap-2">

                            <span
                                class="inline-flex items-center gap-2 min-w-0 transition
                                {{ $estadoPublicacionActive ? 'opacity-100 text-slate-800 dark:text-white' : 'opacity-60 text-slate-500 dark:text-white dark:opacity-50' }}">

                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
                                </svg>

                                <span id="f-estado-publicacion-label" class="truncate">
                                    {{ $estadoPublicacionLabel }}
                                </span>
                            </span>

                            <svg class="w-4 h-4 ui-muted shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="f-estado-publicacion-dd"
                            class="hidden absolute left-0 top-full mt-2 z-20 min-w-full w-max rounded-lg ui-shadow ui-border"
                            style="background-color: var(--bg-surface);">
                            <ul class="py-1 text-sm ui-text">
                                <li>
                                    <button type="button" class="w-full px-4 py-2 text-left transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_estado_publicacion','', 'Publicación', 'f-estado-publicacion-label')">
                                        <span class="ui-muted">Mostrar todos</span>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="w-full px-4 py-2 text-left transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_estado_publicacion','activo', 'Activo', 'f-estado-publicacion-label')">
                                        Activo
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="w-full px-4 py-2 text-left transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_estado_publicacion','inactivo', 'Inactivo', 'f-estado-publicacion-label')">
                                        Inactivo
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="w-full px-4 py-2 text-left transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_estado_publicacion','borrador', 'Borrador', 'f-estado-publicacion-label')">
                                        Borrador
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    {{-- ESTADO STOCK --}}
                    <div class="w-full relative">
                        <input type="hidden" name="estado_stock" id="f_estado_stock"
                            value="{{ $estadoStock ?? '' }}">

                        <button type="button" data-dropdown-toggle="f-estado-stock-dd"
                            class="ui-input w-full lg:h-11 flex items-center justify-between gap-2">

                            <span
                                class="inline-flex items-center gap-2 min-w-0 transition
                                {{ $estadoStockActive ? 'opacity-100 text-slate-800 dark:text-white' : 'opacity-60 text-slate-500 dark:text-white dark:opacity-50' }}">

                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
                                </svg>

                                <span id="f-estado-stock-label" class="truncate">
                                    {{ $estadoStockLabel }}
                                </span>
                            </span>

                            <svg class="w-4 h-4 ui-muted shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="f-estado-stock-dd"
                            class="hidden absolute left-0 top-full mt-2 z-20 min-w-full w-max rounded-lg ui-shadow ui-border"
                            style="background-color: var(--bg-surface);">
                            <ul class="py-1 text-sm ui-text">
                                <li>
                                    <button type="button" class="w-full px-4 py-2 text-left transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_estado_stock','', 'Stock', 'f-estado-stock-label')">
                                        <span class="ui-muted">Mostrar todos</span>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="w-full px-4 py-2 text-left transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_estado_stock','disponible', 'Disponible', 'f-estado-stock-label')">
                                        Disponible
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="w-full px-4 py-2 text-left transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_estado_stock','agotado', 'Agotado', 'f-estado-stock-label')">
                                        Agotado
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="w-full px-4 py-2 text-left transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_estado_stock','consultar_stock', 'Consultar stock', 'f-estado-stock-label')">
                                        Consultar stock
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>

                {{-- Oferta --}}
                <form method="GET" action="{{ route('admin.productos.index') }}" class="mb-6">
                    <input type="hidden" name="categoria_id" value="{{ $categoriaId ?? '' }}">
                    <input type="hidden" name="marca_id" value="{{ $marcaId ?? '' }}">
                    <input type="hidden" name="estado_publicacion" value="{{ $estadoPublicacion ?? '' }}">
                    <input type="hidden" name="estado_stock" value="{{ $estadoStock ?? '' }}">

                    <div class="flex flex-wrap gap-2">
                        <button type="submit" name="es_oferta" value=""
                            class="px-3 py-2 rounded-xl text-sm border transition"
                            style="border-color: var(--border-color); background: {{ ($esOferta ?? null) === null || ($esOferta ?? '') === '' ? 'var(--bg-card)' : 'transparent' }};">
                            Todos
                        </button>

                        <button type="submit" name="es_oferta" value="1"
                            class="px-3 py-2 rounded-xl text-sm border transition"
                            style="border-color: var(--border-color); background: {{ (string) ($esOferta ?? '') === '1' ? 'var(--bg-card)' : 'transparent' }};">
                            En oferta
                        </button>

                        <button type="submit" name="es_oferta" value="0"
                            class="px-3 py-2 rounded-xl text-sm border transition"
                            style="border-color: var(--border-color); background: {{ (string) ($esOferta ?? '') === '0' ? 'var(--bg-card)' : 'transparent' }};">
                            Sin oferta
                        </button>
                    </div>
                </form>

                {{-- Tabla --}}
                <div class="overflow-x-auto rounded-2xl ui-border"
                    style="background-color: var(--bg-surface); border: 1px solid var(--border-color);">
                    <table class="min-w-full text-sm">
                        <thead style="background-color: var(--bg-card); border-bottom: 1px solid var(--border-color);">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold ui-text">#</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Imagen</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Producto</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Categoría</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Marca</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Precio</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Stock</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Publicación</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($productos as $p)
                                @php
                                    $imgPrincipal = $p->imagenPrincipal;
                                    $imgUrl = $imgPrincipal?->url ?? asset('images/no-image.png');

                                    $stockLabel = match ($p->estado_stock) {
                                        'disponible' => 'Disponible',
                                        'agotado' => 'Agotado',
                                        'consultar_stock' => 'Consultar stock',
                                        default => '-',
                                    };

                                    $stockStyle = match ($p->estado_stock) {
                                        'disponible'
                                            => 'background-color: color-mix(in srgb, #22c55e 18%, transparent); color: #16a34a;',
                                        'agotado'
                                            => 'background-color: color-mix(in srgb, #ef4444 18%, transparent); color: #dc2626;',
                                        'consultar_stock'
                                            => 'background-color: color-mix(in srgb, #f59e0b 18%, transparent); color: #d97706;',
                                        default
                                            => 'background-color: color-mix(in srgb, #94a3b8 18%, transparent); color: #64748b;',
                                    };

                                    $pubLabel = match ($p->estado_publicacion) {
                                        'activo' => 'Activo',
                                        'inactivo' => 'Inactivo',
                                        'borrador' => 'Borrador',
                                        default => '-',
                                    };

                                    $pubStyle = match ($p->estado_publicacion) {
                                        'activo'
                                            => 'background-color: color-mix(in srgb, var(--accent) 18%, transparent); color: var(--accent);',
                                        'inactivo'
                                            => 'background-color: color-mix(in srgb, #ef4444 18%, transparent); color: #dc2626;',
                                        'borrador'
                                            => 'background-color: color-mix(in srgb, #94a3b8 18%, transparent); color: #64748b;',
                                        default
                                            => 'background-color: color-mix(in srgb, #94a3b8 18%, transparent); color: #64748b;',
                                    };
                                @endphp

                                <tr class="ui-table-row transition-colors"
                                    style="border-bottom: 1px solid var(--border-color);"
                                    data-search="{{ strtolower(
                                        ($p->nombre ?? '') .
                                            ' ' .
                                            ($p->codigo ?? '') .
                                            ' ' .
                                            ($p->sku ?? '') .
                                            ' ' .
                                            ($p->categoria->nombre ?? '') .
                                            ' ' .
                                            ($p->marca->nombre ?? ''),
                                    ) }}">
                                    <td class="px-4 py-3 ui-text">
                                        {{ ($productos->currentPage() - 1) * $productos->perPage() + $loop->iteration }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <a href="{{ route('admin.productos.show', $p->id) }}"
                                            class="block w-16 h-16 rounded-xl overflow-hidden border"
                                            style="border-color: var(--border-color); background-color: var(--bg-card);">
                                            <img src="{{ $imgUrl }}" alt="{{ $p->nombre }}"
                                                class="w-full h-full object-cover">
                                        </a>
                                    </td>

                                    <td class="px-4 py-3 min-w-[250px]">
                                        <div class="font-semibold ui-text">
                                            {{ $p->nombre }}
                                        </div>

                                        <div class="text-xs ui-muted mt-1">
                                            Código: {{ $p->codigo }}
                                        </div>

                                        <div class="text-xs ui-muted">
                                            SKU: {{ $p->sku ?: 'Sin SKU' }}
                                        </div>

                                        @if ($p->garantia)
                                            <div class="text-xs mt-1" style="color: var(--accent);">
                                                Garantía: {{ $p->garantia }}
                                            </div>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 ui-text">
                                        {{ $p->categoria->nombre ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3 ui-text">
                                        {{ $p->marca->nombre ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="font-semibold ui-text">
                                            Bs {{ number_format((float) $p->precio, 2, '.', ',') }}
                                        </div>

                                        @if (!is_null($p->precio_oferta))
                                            <div class="text-xs mt-1" style="color: #f59e0b;">
                                                Oferta: Bs {{ number_format((float) $p->precio_oferta, 2, '.', ',') }}
                                            </div>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="font-semibold ui-text">
                                            {{ $p->stock }}
                                        </div>

                                        <span
                                            class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold mt-1"
                                            style="{{ $stockStyle }}">
                                            {{ $stockLabel }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="flex flex-col gap-2">
                                            <span
                                                class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold w-fit"
                                                style="{{ $pubStyle }}">
                                                {{ $pubLabel }}
                                            </span>

                                            @if ($p->es_oferta)
                                                <span
                                                    class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold w-fit"
                                                    style="background-color: color-mix(in srgb, #f59e0b 18%, transparent); color: #d97706;">
                                                    Oferta
                                                </span>
                                            @endif
                                        </div>
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-2">

                                            <a href="{{ route('admin.productos.show', $p->id) }}"
                                                class="inline-flex items-center justify-center w-9 h-9 rounded-xl transition"
                                                style="border: 1px solid var(--border-color);" title="Ver producto">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7S3.732 16.057 2.458 12z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </a>

                                            <a href="{{ route('admin.productos.edit', $p->id) }}"
                                                class="inline-flex items-center justify-center w-9 h-9 rounded-xl transition"
                                                style="border: 1px solid var(--border-color);"
                                                title="Editar producto">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                    stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15.232 5.232l3.536 3.536M9 11l6.232-6.232a2.5 2.5 0 013.536 3.536L12.536 14.536a4 4 0 01-1.414.94L8 16l.524-3.122a4 4 0 01.94-1.414z" />
                                                </svg>
                                            </a>

                                            <form method="POST"
                                                action="{{ route('admin.productos.destroy', $p->id) }}"
                                                onsubmit="return confirm('¿Deseas eliminar este producto?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="inline-flex items-center justify-center w-9 h-9 rounded-xl transition"
                                                    style="border: 1px solid var(--border-color); color: #ef4444;"
                                                    title="Eliminar producto">
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
                                    <td colspan="9" class="px-4 py-8 text-center ui-muted">
                                        No hay productos registrados con esos filtros.
                                    </td>
                                </tr>
                            @endforelse

                            <tr id="empty-search-row" style="display:none;">
                                <td colspan="9" class="px-4 py-8 text-center ui-muted">
                                    No hay productos en esta tabla con esa búsqueda.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-5">
                    {{ $productos->links() }}
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
