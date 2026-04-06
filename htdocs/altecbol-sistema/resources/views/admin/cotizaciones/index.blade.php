<x-app-layout>
    <div class="py-8">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

            <div class="shadow rounded-lg p-6 text-[var(--text-main)]"
                style="background-color: var(--bg-surface); border-color: var(--border-color);">


                {{-- Título --}}
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-[var(--text-main)]">
                        Lista de cotizaciones
                    </h3>

                    <div class="flex items-right gap-3 pt-4">
                        <a href="{{ route('admin.cotizaciones.create') }}" class="ui-btn-primary">
                            + Nueva cotización
                        </a>
                        <a href="{{ route('admin.cotizaciones.index') }}" class="ui-btn">
                            Limpiar
                        </a>
                    </div>
                </div>

                {{-- Filtros --}}
                <form method="GET" action="{{ route('admin.cotizaciones.index') }}"
                    class="mb-6 grid w-full gap-3
       grid-cols-1
       md:grid-cols-2 md:items-center
       lg:grid-cols-[minmax(0,1fr)_11rem_11rem_11rem_11rem]
       lg:items-center">

                    <!-- Buscador -->
                    <div class="relative w-full md:col-span-4 lg:col-span-1">
                        <div class="pointer-events-none absolute left-3 top-1/2 -translate-y-1/2 ui-muted">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                            </svg>
                        </div>

                        <input id="q-input" type="search" class="ui-input w-full pl-11 lg:h-11"
                            placeholder="Buscar por N° cotización, cliente o código..." autocomplete="off">
                    </div>

                    <!-- FILTRO TIPO -->
                    <div class="w-full md:col-span-1 lg:col-span-1">
                        <input type="hidden" name="tipo" id="f_tipo" value="{{ $tipo ?? '' }}">

                        @php
                            $tipoVal = strtolower((string) ($tipo ?? ''));
                            $tipoLabel = $tipoVal !== '' ? ucfirst($tipoVal) : 'Tipo';
                            $tipoActive = $tipoVal !== '';
                        @endphp

                        <button type="button" data-dropdown-toggle="f-tipo-dd"
                            class="ui-input w-full lg:h-11 flex items-center justify-between gap-2">
                            <span
                                class="inline-flex items-center gap-2 min-w-0 transition
                                {{ $tipoActive ? 'opacity-100 text-slate-800 dark:text-white' : 'opacity-60 text-slate-500 dark:text-white dark:opacity-50' }}">
                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
                                </svg>
                                <span id="f-tipo-label" class="truncate">{{ $tipoLabel }}</span>
                            </span>

                            <svg class="w-4 h-4 ui-muted shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="f-tipo-dd" class="hidden z-20 w-56 rounded-lg ui-shadow ui-border"
                            style="background-color: var(--bg-surface);">
                            <ul class="py-1 text-sm ui-text">
                                <li>
                                    <button type="button" class="w-full flex items-center gap-3 px-4 py-2 transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_tipo','', 'Tipo', 'f-tipo-label')">
                                        <span class="ui-muted">Mostrar todos</span>
                                    </button>
                                </li>
                                @foreach (['prospecto' => 'Prospecto', 'proyecto' => 'Proyecto', 'mensual' => 'Mensual', 'anual' => 'Anual', 'otro' => 'Otro'] as $val => $lbl)
                                    <li>
                                        <button type="button"
                                            class="w-full flex items-center gap-3 px-4 py-2 transition"
                                            style="border-radius:.5rem;"
                                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                            onmouseout="this.style.backgroundColor='transparent'"
                                            onclick="setFilter('f_tipo','{{ $val }}', '{{ $lbl }}', 'f-tipo-label')">
                                            {{ $lbl }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- FILTRO ESTADO -->
                    <div class="w-full md:col-span-1 lg:col-span-1">
                        <input type="hidden" name="estado" id="f_estado" value="{{ $estado ?? '' }}">

                        @php
                            $estadoVal = strtolower((string) ($estado ?? ''));
                            $estadoLabel = $estadoVal !== '' ? ucfirst($estadoVal) : 'Estado';
                            $estadoActive = $estadoVal !== '';
                        @endphp

                        <button type="button" data-dropdown-toggle="f-estado-dd"
                            class="ui-input w-full lg:h-11 flex items-center justify-between gap-2">
                            <span
                                class="inline-flex items-center gap-2 min-w-0 transition
                                {{ $estadoActive ? 'opacity-100 text-slate-800 dark:text-white' : 'opacity-60 text-slate-500 dark:text-white dark:opacity-50' }}">
                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
                                </svg>
                                <span id="f-estado-label" class="truncate">{{ $estadoLabel }}</span>
                            </span>

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
                                        onclick="setFilter('f_estado','', 'Estado', 'f-estado-label')">
                                        <span class="ui-muted">Mostrar todos</span>
                                    </button>
                                </li>
                                @foreach (['borrador' => 'Borrador', 'enviada' => 'Enviada', 'aprobada' => 'Aprobada', 'rechazada' => 'Rechazada'] as $val => $lbl)
                                    <li>
                                        <button type="button"
                                            class="w-full flex items-center gap-3 px-4 py-2 transition"
                                            style="border-radius:.5rem;"
                                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                            onmouseout="this.style.backgroundColor='transparent'"
                                            onclick="setFilter('f_estado','{{ $val }}', '{{ $lbl }}', 'f-estado-label')">
                                            {{ $lbl }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- FILTRO MONEDA -->
                    <div class="w-full md:col-span-1 lg:col-span-1">
                        <input type="hidden" name="moneda" id="f_moneda" value="{{ $moneda ?? '' }}">

                        @php
                            $monedaVal = strtoupper((string) ($moneda ?? ''));
                            $monedaLabel = $monedaVal !== '' ? $monedaVal : 'Moneda';
                            $monedaActive = $monedaVal !== '';
                        @endphp

                        <button type="button" data-dropdown-toggle="f-moneda-dd"
                            class="ui-input w-full lg:h-11 flex items-center justify-between gap-2">
                            <span
                                class="inline-flex items-center gap-2 min-w-0 transition
                                {{ $monedaActive ? 'opacity-100 text-slate-800 dark:text-white' : 'opacity-60 text-slate-500 dark:text-white dark:opacity-50' }}">
                                <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
                                </svg>
                                <span id="f-moneda-label" class="truncate">{{ $monedaLabel }}</span>
                            </span>

                            <svg class="w-4 h-4 ui-muted shrink-0" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div id="f-moneda-dd" class="hidden z-20 w-56 rounded-lg ui-shadow ui-border"
                            style="background-color: var(--bg-surface);">
                            <ul class="py-1 text-sm ui-text">
                                <li>
                                    <button type="button" class="w-full flex items-center gap-3 px-4 py-2 transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_moneda','', 'Moneda', 'f-moneda-label')">
                                        <span class="ui-muted">Mostrar todos</span>
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="w-full flex items-center gap-3 px-4 py-2 transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_moneda','BOB', 'BOB', 'f-moneda-label')">
                                        BOB
                                    </button>
                                </li>
                                <li>
                                    <button type="button" class="w-full flex items-center gap-3 px-4 py-2 transition"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setFilter('f_moneda','USD', 'USD', 'f-moneda-label')">
                                        USD
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- RANGO FECHAS (Flowbite) - fila 2 en LG -->
                    <div class="w-full md:col-span-2 lg:col-span-3">
                        <div id="date-range-picker" date-rangepicker datepicker-format="yyyy-mm-dd"
                            class="flex items-center w-full">

                            <div class="relative w-full">
                                <div
                                    class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none ui-muted">
                                    <!-- icon -->
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                                    </svg>
                                </div>

                                <input id="datepicker-range-start" name="desde" type="text"
                                    value="{{ request('desde') }}" class="ui-input w-full ps-11 lg:h-11"
                                    placeholder="Desde">
                            </div>

                            <span class="mx-3 ui-muted whitespace-nowrap">a</span>

                            <div class="relative w-full">
                                <div
                                    class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none ui-muted">
                                    <!-- icon -->
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
                                    </svg>
                                </div>

                                <input id="datepicker-range-end" name="hasta" type="text"
                                    value="{{ request('hasta') }}" class="ui-input w-full ps-11 lg:h-11"
                                    placeholder="Hasta">
                            </div>

                        </div>
                    </div>


                    <!-- BOTONES - misma fila (derecha) -->
                    <div class="w-full md:col-span-2 lg:col-span-2 flex justify-end gap-3">
                        <button type="submit" class="ui-btn-primary">
                            Filtrar
                        </button>

                        <button type="button" class="ui-btn" onclick="clearDates()">
                            Limpiar fechas
                        </button>
                    </div>



                </form>

                {{-- Tabla --}}
                <div class="overflow-x-auto rounded-lg ui-border" style="background-color: var(--bg-surface);">
                    <table class="min-w-full text-sm" style="background-color: var(--bg-surface);">

                        <thead style="background-color: var(--bg-card); border-bottom: 1px solid var(--border-color);">
                            <tr style="border-bottom: 1px solid var(--border-color);">
                                <th class="px-4 py-3 text-left font-semibold ui-text">N°</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Cliente</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Tipo</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Estado</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Moneda</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Emisión</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Total</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse(($cotizaciones ?? collect()) as $c)
                                <tr class="ui-table-row transition-colors"
                                    style="border-bottom: 1px solid var(--border-color);"
                                    data-search="{{ strtolower($c->numero . ' ' . $c->razon_social . ' ' . $c->codigo_cliente . ' ' . $c->moneda . ' ' . $c->estado . ' ' . $c->tipo) }}">

                                    <td class="px-4 py-3 ui-text">
                                        {{ $c->numero }}
                                    </td>

                                    <td class="px-4 py-3 ui-text max-w-xs">
                                        <span class="block truncate" title="{{ $c->razon_social }}">
                                            {{ $c->razon_social }}
                                        </span>
                                        @if (!empty($c->codigo_cliente))
                                            <div class="text-xs ui-muted">{{ $c->codigo_cliente }}</div>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 ui-text">
                                        @php
                                            $tipo = strtolower((string) ($c->tipo ?? ''));
                                            $mapTipo = [
                                                'prospecto' => ['Prospecto', '#f59e0b'],
                                                'proyecto' => ['Proyecto', 'var(--accent)'],
                                                'mensual' => ['Mensual', '#10b981'],
                                                'anual' => ['Anual', '#06b6d4'],
                                                'otro' => ['Otro', '#a855f7'],
                                            ];
                                            [$lblTipo, $colTipo] = $mapTipo[$tipo] ?? ['-', 'var(--text-muted)'];
                                            $tagStyleTipo = "background-color: color-mix(in srgb, {$colTipo} 18%, transparent); color: {$colTipo};";
                                        @endphp

                                        <span
                                            class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold"
                                            style="{{ $tagStyleTipo }}">
                                            {{ $lblTipo }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3 ui-text">
                                        @php
                                            $estado = strtolower((string) ($c->estado ?? ''));
                                            $mapEstado = [
                                                'borrador' => ['Borrador', '#9ca3af'],
                                                'enviada' => ['Enviada', '#f59e0b'],
                                                'aprobada' => ['Aprobada', '#10b981'],
                                                'rechazada' => ['Rechazada', '#ef4444'],
                                            ];
                                            [$lblEstado, $colEstado] = $mapEstado[$estado] ?? [
                                                '-',
                                                'var(--text-muted)',
                                            ];
                                            $tagStyleEstado = "background-color: color-mix(in srgb, {$colEstado} 18%, transparent); color: {$colEstado};";
                                        @endphp

                                        <span
                                            class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold"
                                            style="{{ $tagStyleEstado }}">
                                            {{ $lblEstado }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3 ui-text">
                                        <span
                                            class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold"
                                            style="background-color: color-mix(in srgb, var(--accent) 10%, transparent); color: var(--text-main);">
                                            {{ $c->moneda }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3 ui-text">
                                        {{ \Illuminate\Support\Carbon::parse($c->fecha_emision)->format('d/m/Y') }}
                                    </td>

                                    <td class="px-4 py-3 ui-text font-semibold">
                                        {{ number_format((float) $c->total, 2) }}
                                    </td>

                                    <td class="px-4 py-3 ui-text">
                                        <a href="{{ route('admin.cotizaciones.pdf', $c->id) }}" target="_blank"
                                            title="Ver PDF" class="inline-flex items-center ui-btn-link mr-3"
                                            title="Ver">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </a>

                                        <a href="{{ route('admin.cotizaciones.edit', $c->id) }}"
                                            class="inline-flex items-center ui-btn-link mr-3" title="Editar">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.232 5.232l3.536 3.536M9 11l6.232-6.232a2.5 2.5 0 013.536 3.536L12.536 14.536a4 4 0 01-1.414.94L8 16l.524-3.122a4 4 0 01.94-1.414z" />
                                            </svg>
                                        </a>

                                        <!-- 3 puntos (acciones extra) -->
                                        <button id="cot-actions-dropdown-button-{{ $c->id }}"
                                            data-dropdown-toggle="cot-actions-dropdown-{{ $c->id }}"
                                            type="button"
                                            class="inline-flex items-center justify-center ui-muted
                                                   hover:opacity-100 opacity-80
                                                   focus:outline-none focus:ring-0 p-0 m-0 leading-none bg-transparent
                                                   rounded-none shadow-none"
                                            title="Más acciones">
                                            <svg class="w-6 h-6 block" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0z
                                                     M12 10a2 2 0 11-4 0 2 2 0 014 0z
                                                     M16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>

                                        <div id="cot-actions-dropdown-{{ $c->id }}"
                                            class="hidden z-20 w-60 rounded-lg ui-shadow ui-border"
                                            style="background-color: var(--bg-surface);">
                                            <ul class="py-1 text-sm" style="color: var(--text-main);">
                                                <li>
                                                    <a href="{{ route('admin.cotizaciones.pdf', $c->id) }}"
                                                        class="flex items-center gap-3 px-4 py-2 transition"
                                                        style="border-radius:.5rem;"
                                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                                        onmouseout="this.style.backgroundColor='transparent'">

                                                        <svg class="w-5 h-5 ui-muted"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke="currentColor"
                                                            stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                        <span>Ver detalle</span>
                                                    </a>
                                                </li>

                                                {{-- Deja esto listo para futuro (PDF / Enviar / etc.) --}}
                                                {{-- <li> ... </li> --}}
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="ui-table-row transition-colors"
                                        style="border-bottom: 1px solid var(--border-color);">
                                        No hay cotizaciones registradas.
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
    function setFilter(inputId, value, label, labelId = null) {
        const input = document.getElementById(inputId);
        if (input) input.value = value;

        const targetLabelId = labelId ?? (
            inputId === 'f_tipo' ? 'f-tipo-label' :
            inputId === 'f_estado' ? 'f-estado-label' :
            'f-moneda-label'
        );

        const lbl = document.getElementById(targetLabelId);
        if (lbl) lbl.textContent = label;

        // enviar el GET inmediatamente (tu estilo)
        const form = input.closest('form');
        if (form) form.submit();
    }

    function clearDates() {
        const s = document.getElementById('datepicker-range-start');
        const e = document.getElementById('datepicker-range-end');
        if (s) s.value = '';
        if (e) e.value = '';

        const form = s?.closest('form') || e?.closest('form');
        if (form) form.submit(); // aplica inmediatamente
    }


    document.addEventListener('DOMContentLoaded', () => {
        const input = document.getElementById('q-input');
        if (!input) return;

        const tbody = document.querySelector('table tbody');
        if (!tbody) return;

        const rows = Array.from(tbody.querySelectorAll('tr[data-search]'));
        const emptyRow = tbody.querySelector(
        'tr:not([data-search])'); // tu fila "No hay cotizaciones..." si existe

        function normalize(s) {
            return (s || '')
                .toString()
                .toLowerCase()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '') // quita tildes
                .trim();
        }

        function filterTable() {
            const q = normalize(input.value);

            let visibleCount = 0;
            rows.forEach(tr => {
                const hay = normalize(tr.getAttribute('data-search'));
                const show = q === '' || hay.includes(q);
                tr.style.display = show ? '' : 'none';
                if (show) visibleCount++;
            });

            // Si tienes fila "No hay cotizaciones", la ocultamos cuando haya filas
            if (emptyRow) {
                emptyRow.style.display = (visibleCount === 0) ? '' : 'none';
            }
        }

        // Filtra mientras escribe, pero 100% local
        input.addEventListener('input', filterTable);

        // Arranca filtrado si el input viene con algo (opcional)
        filterTable();
    });
</script>
