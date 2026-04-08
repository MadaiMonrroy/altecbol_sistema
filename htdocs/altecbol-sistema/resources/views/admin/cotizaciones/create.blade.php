<x-app-layout>

    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.cotizaciones.index') }}"
                class="ui-btn inline-flex items-center gap-2 ui-text opacity-80 hover:opacity-100 transition-opacity"
                aria-label="Volver">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m15 19-7-7 7-7" />
                </svg>
                Volver
            </a>

            <h2 class="font-semibold text-xl leading-tight ui-text">
                {{ isset($cotizacion) ? 'Editar cotización' : 'Nueva cotización' }}
            </h2>
        </div>
    </x-slot>

    {{-- CONTENT --}}
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="ui-form-card">

                <form method="POST"
                    action="{{ isset($cotizacion) ? route('admin.cotizaciones.update', $cotizacion->id) : route('admin.cotizaciones.store') }}"
                    class="ui-form">
                    @csrf
                    @if (isset($cotizacion))
                        @method('PUT')
                    @endif

                    {{-- Número / Cliente --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="ui-field">
                            <label class="ui-label">N° Cotización *</label>
                            <input name="numero" value="{{ old('numero', $cotizacion->numero ?? '') }}"
                                class="ui-input @error('numero') ui-invalid @enderror" placeholder="COT-0001" required>
                            @error('numero')
                                <p class="ui-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="ui-field relative">
                            <label class="ui-label">Cliente *</label>

                            @php
                                $clienteId = old('cliente_id', $cotizacion->cliente_id ?? '');
                                $clienteLabel = 'Seleccione un cliente';
                                if (!empty($clientes ?? [])) {
                                    $found = collect($clientes)->firstWhere('id', (int) $clienteId);
                                    if ($found) {
                                        $clienteLabel = trim(
                                            ($found->razon_social ?? '') .
                                                ' ' .
                                                (!empty($found->codigo_cliente) ? "({$found->codigo_cliente})" : ''),
                                        );
                                    }
                                }
                            @endphp

                            <input type="hidden" name="cliente_id" id="cliente_id" value="{{ $clienteId }}">

                            <button type="button" data-dropdown-toggle="cliente-dd"
                                class="ui-input flex items-center justify-between gap-2 w-full">
                                <span id="cliente-label" class="{{ $clienteId ? '' : 'ui-muted' }} truncate">
                                    {{ $clienteLabel }}
                                </span>
                                <svg class="w-4 h-4 ui-muted block shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div id="cliente-dd"
                                class="hidden z-20 mt-1 w-full rounded-lg ui-shadow ui-border max-h-72 overflow-auto"
                                style="background-color: var(--bg-surface);">

                                <div class="p-2">
                                    <input type="text" id="cliente-search" class="ui-input w-full"
                                        placeholder="Buscar cliente..." oninput="filterClientes()">
                                </div>

                                <ul id="cliente-list" class="py-1 text-sm ui-text">
                                    @foreach ($clientes ?? [] as $cl)
                                        <li class="cliente-item"
                                            data-text="{{ strtolower(($cl->razon_social ?? '') . ' ' . ($cl->codigo_cliente ?? '')) }}">
                                            <button type="button"
                                                onclick="selectCliente('{{ $cl->id }}', `{{ addslashes($cl->razon_social) }}{{ !empty($cl->codigo_cliente) ? ' (' . addslashes($cl->codigo_cliente) . ')' : '' }}`)"
                                                class="w-full text-left px-4 py-2 transition"
                                                style="border-radius:.5rem;"
                                                onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                                onmouseout="this.style.backgroundColor='transparent'">
                                                <div class="font-medium">{{ $cl->razon_social }}</div>
                                                <div class="text-xs ui-muted">
                                                    {{ $cl->codigo_cliente ?? '' }}
                                                    @if (!empty($cl->estado))
                                                        • {{ ucfirst(strtolower($cl->estado)) }}
                                                    @endif
                                                </div>
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            @error('cliente_id')
                                <p class="ui-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Tipo / Contexto --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="ui-field relative">
                            <label class="ui-label">Tipo *</label>

                            @php
                                $tipoVal = old('tipo', strtolower($cotizacion->tipo ?? 'proyecto'));
                                $mapTipo = [
                                    'prospecto' => 'Prospecto',
                                    'proyecto' => 'Proyecto',
                                    'mensual' => 'Mensual',
                                    'anual' => 'Anual',
                                    'otro' => 'Otro',
                                ];
                                $tipoLabel = $mapTipo[$tipoVal] ?? 'Seleccione una opción';
                            @endphp

                            <input type="hidden" name="tipo" id="tipo" value="{{ $tipoVal }}">

                            <button type="button" data-dropdown-toggle="tipo-dd"
                                class="ui-input flex items-center justify-between gap-2 w-full">
                                <span id="tipo-label">{{ $tipoLabel }}</span>
                                <svg class="w-4 h-4 ui-muted block shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div id="tipo-dd" class="hidden z-20 mt-1 w-full rounded-lg ui-shadow ui-border"
                                style="background-color: var(--bg-surface);">
                                <ul class="py-1 text-sm ui-text">
                                    @foreach ($mapTipo as $val => $lbl)
                                        <li>
                                            <button type="button"
                                                onclick="selectTipo('{{ $val }}','{{ $lbl }}')"
                                                class="w-full text-left px-4 py-2 transition"
                                                style="border-radius:.5rem;"
                                                onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                                onmouseout="this.style.backgroundColor='transparent'">
                                                {{ $lbl }}
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            @error('tipo')
                                <p class="ui-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="ui-field relative">
                            <label class="ui-label">Contexto *</label>

                            @php
                                $ctxVal = old('contexto', strtolower($cotizacion->contexto ?? 'empresa'));
                                $mapCtx = ['empresa' => 'Empresa', 'personal_dueno' => 'Personal (Dueño)'];
                                $ctxLabel = $mapCtx[$ctxVal] ?? 'Seleccione una opción';
                            @endphp

                            <input type="hidden" name="contexto" id="contexto" value="{{ $ctxVal }}">

                            <button type="button" data-dropdown-toggle="ctx-dd"
                                class="ui-input flex items-center justify-between gap-2 w-full">
                                <span id="ctx-label">{{ $ctxLabel }}</span>
                                <svg class="w-4 h-4 ui-muted block shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div id="ctx-dd" class="hidden z-20 mt-1 w-full rounded-lg ui-shadow ui-border"
                                style="background-color: var(--bg-surface);">
                                <ul class="py-1 text-sm ui-text">
                                    @foreach ($mapCtx as $val => $lbl)
                                        <li>
                                            <button type="button"
                                                onclick="selectContexto('{{ $val }}','{{ $lbl }}')"
                                                class="w-full text-left px-4 py-2 transition"
                                                style="border-radius:.5rem;"
                                                onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                                onmouseout="this.style.backgroundColor='transparent'">
                                                {{ $lbl }}
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            @error('contexto')
                                <p class="ui-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Estado / Fechas --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="ui-field relative">
                            <label class="ui-label">Estado *</label>

                            @php
                                $estadoVal = old('estado', strtolower($cotizacion->estado ?? 'borrador'));
                                $mapEstado = [
                                    'borrador' => 'Borrador',
                                    'enviada' => 'Enviada',
                                    'aprobada' => 'Aprobada',
                                    'rechazada' => 'Rechazada',
                                ];
                                $estadoLabel = $mapEstado[$estadoVal] ?? 'Borrador';
                            @endphp

                            <input type="hidden" name="estado" id="estado" value="{{ $estadoVal }}">

                            <button type="button" data-dropdown-toggle="estado-dd"
                                class="ui-input flex items-center justify-between gap-2 w-full">
                                <span id="estado-label">{{ $estadoLabel }}</span>
                                <svg class="w-4 h-4 ui-muted block shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div id="estado-dd" class="hidden z-20 mt-1 w-full rounded-lg ui-shadow ui-border"
                                style="background-color: var(--bg-surface);">
                                <ul class="py-1 text-sm ui-text">
                                    @foreach ($mapEstado as $val => $lbl)
                                        <li>
                                            <button type="button"
                                                onclick="selectEstado('{{ $val }}','{{ $lbl }}')"
                                                class="w-full text-left px-4 py-2 transition"
                                                style="border-radius:.5rem;"
                                                onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                                onmouseout="this.style.backgroundColor='transparent'">
                                                {{ $lbl }}
                                            </button>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            @error('estado')
                                <p class="ui-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="ui-field">
                            <label class="ui-label">Fecha emisión *</label>
                            <input type="date" name="fecha_emision"
                                value="{{ old('fecha_emision', $cotizacion->fecha_emision ?? date('Y-m-d')) }}"
                                readonly class="ui-input @error('fecha_emision') ui-invalid @enderror" required>
                            @error('fecha_emision')
                                <p class="ui-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="ui-field">
                            <label class="ui-label">Fecha vencimiento</label>
                            <input type="date" name="fecha_vencimiento"
                                value="{{ old('fecha_vencimiento', $cotizacion->fecha_vencimiento ?? '') }}" readonly
                                class="ui-input @error('fecha_vencimiento') ui-invalid @enderror">
                            @error('fecha_vencimiento')
                                <p class="ui-error">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- SF / CF + Margen general + Descuento % --}}
                    {{-- Factura + Margen + Descuento + Moneda + Tipo de cambio (dinámico 4/5 cols) --}}
                    <div id="row-finanzas" class="grid grid-cols-1 md:grid-cols-4 gap-4">

                        {{-- SF/CF --}}
                        <div class="ui-field relative">
                            <label class="ui-label">Factura *</label>

                            @php
                                $sfCfVal = old('sf_cf', strtolower($cotizacion->sf_cf ?? 'sf'));

                                $sfCfLabels = [
                                    'sf' => 'SF (Sin factura)',
                                    'cf' => 'CF (Con factura)',
                                    'sf_def' => 'SF definido (Sin factura)',
                                    'cf_def' => 'CF definido (Con factura)',
                                ];

                                $sfCfLabel = $sfCfLabels[$sfCfVal] ?? 'SF (Sin factura)';

                            @endphp

                            <input type="hidden" name="sf_cf" id="sf_cf" value="{{ $sfCfVal }}">

                            <button type="button" data-dropdown-toggle="sf-cf-dd"
                                class="ui-input flex items-center justify-between gap-2 w-full">
                                <span id="sf-cf-label">{{ $sfCfLabel }}</span>
                                <svg class="w-4 h-4 ui-muted block shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div id="sf-cf-dd" class="hidden z-20 mt-1 w-full rounded-lg ui-shadow ui-border"
                                style="background-color: var(--bg-surface);">
                                <ul class="py-1 text-sm ui-text">
                                    <li>
                                        <button type="button" onclick="selectSfCf('sf','SF (Sin factura)')"
                                            class="w-full text-left px-4 py-2 transition" style="border-radius:.5rem;"
                                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                            onmouseout="this.style.backgroundColor='transparent'">
                                            SF (Sin factura)
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" onclick="selectSfCf('cf','CF (Con factura)')"
                                            class="w-full text-left px-4 py-2 transition" style="border-radius:.5rem;"
                                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                            onmouseout="this.style.backgroundColor='transparent'">
                                            CF (Con factura)
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button"
                                            onclick="selectSfCf('sf_def','SF definido (Sin factura)')"
                                            class="w-full text-left px-4 py-2 transition" style="border-radius:.5rem;"
                                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                            onmouseout="this.style.backgroundColor='transparent'">
                                            SF definido (Sin factura)
                                        </button>
                                    </li>

                                    <li>
                                        <button type="button"
                                            onclick="selectSfCf('cf_def','CF definido (Con factura)')"
                                            class="w-full text-left px-4 py-2 transition" style="border-radius:.5rem;"
                                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                            onmouseout="this.style.backgroundColor='transparent'">
                                            CF definido (Con factura)
                                        </button>
                                    </li>

                                </ul>
                            </div>

                            @error('sf_cf')
                                <p class="ui-error">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Margen general --}}
                        <div class="ui-field">
                            <label class="ui-label">Margen general (%)</label>
                            <input type="number" step="0.01" min="0" id="margen_general"
                                value="{{ old('margen_general', 20) }}" class="ui-input" placeholder="20">
                            <p class="text-xs ui-muted mt-1">Cambiarlo estandariza el margen de todos los ítems.</p>
                        </div>

                        {{-- Descuento % --}}
                        <div class="ui-field">
  <label class="ui-label">Descuento (%)</label>

  <input type="number" step="0.01" min="0" max="100"
      name="descuento_total"
      id="descuento_pct"
      value="{{ old('descuento_total', $cotizacion->descuento_total ?? 0) }}"
      class="ui-input @error('descuento_total') ui-invalid @enderror"
      placeholder="0">

  @error('descuento_total')
    <p class="ui-error">{{ $message }}</p>
  @enderror

  <p class="text-xs ui-muted mt-1">Afecta solo el total final (no modifica ítems).</p>
</div>


                        {{-- Moneda --}}
                        <div class="ui-field relative">
                            <label class="ui-label">Moneda *</label>

                            @php
                                $monedaVal = old('moneda', strtoupper($cotizacion->moneda ?? 'BOB'));
                            @endphp

                            <input type="hidden" name="moneda" id="moneda" value="{{ $monedaVal }}">

                            <button type="button" data-dropdown-toggle="moneda-dd"
                                class="ui-input flex items-center justify-between gap-2 w-full">
                                <span id="moneda-label">{{ $monedaVal }}</span>
                                <svg class="w-4 h-4 ui-muted block shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div id="moneda-dd" class="hidden z-20 mt-1 w-full rounded-lg ui-shadow ui-border"
                                style="background-color: var(--bg-surface);">
                                <ul class="py-1 text-sm ui-text">
                                    <li>
                                        <button type="button" onclick="selectMoneda('BOB')"
                                            class="w-full text-left px-4 py-2 transition" style="border-radius:.5rem;"
                                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                            onmouseout="this.style.backgroundColor='transparent'">
                                            BOB
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" onclick="selectMoneda('USD')"
                                            class="w-full text-left px-4 py-2 transition" style="border-radius:.5rem;"
                                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                            onmouseout="this.style.backgroundColor='transparent'">
                                            USD
                                        </button>
                                    </li>
                                </ul>
                            </div>

                            @error('moneda')
                                <p class="ui-error">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tipo de cambio (solo USD) --}}
                        <div class="ui-field hidden" id="tc-field">
                            <label class="ui-label">Tipo de cambio (USD → BOB) *</label>
                            <input type="number" step="0.0001" min="0" name="tipo_cambio_bob_por_usd"
                                value="{{ old('tipo_cambio_bob_por_usd', $cotizacion->tipo_cambio_bob_por_usd ?? '') }}"
                                class="ui-input @error('tipo_cambio_bob_por_usd') ui-invalid @enderror"
                                placeholder="Ej: 6.96">
                            @error('tipo_cambio_bob_por_usd')
                                <p class="ui-error">{{ $message }}</p>
                            @enderror

                        </div>

                    </div>



                    {{-- Tags (simple) --}}
                    {{-- Tags (chips) --}}
                    <div class="ui-field">
                        <label class="ui-label">Tags</label>

                        @php
                            $tagsText = old(
                                'tags_text',
                                isset($cotizacion) && !empty($cotizacion->tags_json)
                                    ? implode(', ', (array) json_decode($cotizacion->tags_json, true))
                                    : '',
                            );
                        @endphp

                        {{-- Este hidden es el que se enviará (MISMO name que ya usas) --}}
                        <input type="hidden" name="tags_text" id="tags_text" value="{{ $tagsText }}">

                        <div class="ui-input flex flex-wrap items-center gap-2 min-h-[44px] py-2" id="tags-box">
                            <div id="tags-hidden"></div>
                            {{-- Chips se renderizan aquí --}}
                            <div id="tags-chips" class="flex flex-wrap gap-2 "></div>

                            {{-- Input real para escribir --}}
                            <input type="text" id="tags_input"
                                class=" border-0 p-2 m-0 flex-1 min-w-[160px] ui-text ui-textarea "
                                placeholder="Ej: router, licencias, servidor, soporte, cableado…" autocomplete="off">
                        </div>

                        @error('tags_text')
                            <p class="ui-error">{{ $message }}</p>
                        @enderror

                        <p class="text-xs ui-muted mt-1">Enter para agregar • Backspace para borrar el último • Click
                            en ✕ para quitar</p>
                    </div>


                    {{-- Términos y condiciones (lista simple) --}}
                    {{-- Términos y condiciones (textarea + builder a la derecha) --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        {{-- IZQUIERDA: textarea (se mantiene como envío a backend) --}}
                        <div class="md:col-span-2 ui-field">
                            <div class="flex items-center justify-between">
                                <label class="ui-label">Términos y condiciones (1 por línea)</label>

                                <button type="button" class="ui-btn inline-flex items-center gap-2"
                                    onclick="tcTogglePanel()">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 20h9M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4 11.5-11.5Z" />
                                    </svg>
                                    Editar T&amp;C
                                </button>
                            </div>

                            @php
                                $tcText = old(
                                    'terminos_text',
                                    isset($cotizacion) && !empty($cotizacion->terminos_condiciones_json)
                                        ? implode(
                                            "\n",
                                            (array) json_decode($cotizacion->terminos_condiciones_json, true),
                                        )
                                        : '',
                                );
                            @endphp

                            <textarea name="terminos_text" id="terminos_text" rows="6"
                                class="ui-textarea @error('terminos_text') ui-invalid @enderror" readonly
                                placeholder="Validez: 10 días hábiles&#10;Forma de pago: 80% adelantado...">{{ $tcText }}</textarea>

                            @error('terminos_text')
                                <p class="ui-error">{{ $message }}</p>
                            @enderror
                            {{-- Hidden para enviar T&C como array --}}
                            <div id="tc-hidden"></div>
                            <p class="text-xs ui-muted mt-1">
                                El builder de la derecha actualiza este texto automáticamente.
                            </p>
                        </div>

                        {{-- DERECHA: panel builder (angosto, visible solo cuando editas) --}}
                        <div class="md:col-span-1">
                            <div id="tc-panel" class="hidden ui-border ui-shadow rounded-lg p-4"
                                style="background-color: var(--bg-surface);">

                                <div class="flex items-center justify-between mb-3">
                                    <div class="font-semibold ui-text">Constructor T&amp;C</div>
                                    <button type="button" class="ui-btn" onclick="tcTogglePanel()">Cerrar</button>
                                </div>

                                {{-- Forma de pago --}}
                                <div class="ui-field">
                                    <label class="ui-label">Forma de pago</label>
                                    <select id="tc_pago_modo" class="ui-input" onchange="tcSyncToTextarea()">
                                        <option value="pct">Porcentaje (anticipado/restante)</option>
                                        <option value="entrega">Contra entrega</option>
                                    </select>

                                    <div id="tc_pago_pct_box" class="mt-2 grid grid-cols-2 gap-2">
                                        <div>
                                            <label class="ui-label text-xs">Anticipado (%)</label>
                                            <input type="number" min="0" max="100" step="1"
                                                id="tc_pago_adelanto" class="ui-input" value="80"
                                                oninput="tcOnPctChange()">
                                        </div>
                                        <div>
                                            <label class="ui-label text-xs">Restante (%)</label>
                                            <input type="number" id="tc_pago_restante" class="ui-input"
                                                value="20" readonly>
                                        </div>
                                    </div>
                                </div>

                                {{-- Validez --}}
                                <div class="ui-field">
                                    <label class="ui-label">Tiempo de validez</label>
                                    <div class="grid grid-cols-2 gap-2">
                                        <input type="number" min="1" step="1" id="tc_validez_dias"
                                            class="ui-input" value="10" oninput="tcOnValidezChange()">
                                        <div class="ui-input flex items-center ui-muted" style="opacity:.8;">días
                                            hábiles</div>
                                    </div>

                                    <label class="ui-label text-xs mt-2">Feriados (opcional)</label>
                                    <input type="text" id="tc_feriados" class="ui-input"
                                        placeholder="YYYY-MM-DD, YYYY-MM-DD..." oninput="tcOnValidezChange()">
                                    <p class="text-xs ui-muted mt-1">Se excluyen sábados/domingos y estas fechas.</p>
                                </div>

                                {{-- Garantía --}}
                                {{-- Garantía (opcional) --}}
                                <div class="ui-field">
                                    <div class="flex items-center justify-between">
                                        <label class="ui-label">Garantía</label>

                                        <label class="inline-flex items-center gap-2 ui-text">
                                            <input type="checkbox" id="tc_garantia_on" class="ui-check"
                                                onchange="tcToggleGarantia()">
                                            <span class="text-sm ui-muted">Incluir</span>
                                        </label>
                                    </div>

                                    <div id="tc_garantia_box" class="mt-2 grid grid-cols-2 gap-2 hidden">
                                        <input type="number" min="1" step="1" id="tc_garantia_cant"
                                            class="ui-input" value="1" oninput="tcSyncToTextarea()">

                                        <select id="tc_garantia_unidad" class="ui-input"
                                            onchange="tcSyncToTextarea()">
                                            <option value="anio">Año(s)</option>
                                            <option value="mes">Mes(es)</option>
                                        </select>
                                    </div>

                                    <p class="text-xs ui-muted mt-1">Contra defectos de fábrica.</p>
                                </div>


                                {{-- Incluye instalación --}}
                                <div class="ui-field">
                                    <label class="ui-label">Incluye instalación</label>
                                    <label class="inline-flex items-center gap-2 ui-text">
                                        <input type="checkbox" id="tc_incluye_inst"class="ui-check"
                                            onchange="tcSyncToTextarea()">
                                        <span class="text-sm ui-muted">Agregar el texto “incluye instalación”</span>
                                    </label>
                                </div>

                                {{-- Soporte post venta --}}
                                <div class="ui-field">
                                    <label class="ui-label">Soporte técnico post venta</label>
                                    <div class="grid grid-cols-2 gap-2">
                                        <input type="number" min="0" step="1" id="tc_soporte_cant"
                                            class="ui-input" value="1" oninput="tcSyncToTextarea()">
                                        <select id="tc_soporte_unidad" class="ui-input"
                                            onchange="tcSyncToTextarea()">
                                            <option value="mes">Mes</option>
                                            <option value="meses">Meses</option>
                                            <option value="semanas">Semanas</option>
                                            <option value="días">Días</option>
                                        </select>
                                    </div>
                                </div>

                                {{-- Contrato mínimo (solo mensual) --}}
                                <div class="ui-field hidden" id="tc_contrato_box">
                                    <label class="ui-label">Mensual</label>
                                    <label class="inline-flex items-center gap-2 ui-text">
                                        <input type="checkbox" id="tc_contrato_min" class="ui-check" checked
                                            onchange="tcSyncToTextarea()">
                                        <span class="text-sm ui-muted">Contrato mínimo de 12 meses</span>
                                    </label>
                                </div>

                                <hr class="my-4 ui-border" style="border-color: var(--border-color);" />

                                {{-- Términos adicionales --}}
                                <div class="ui-field">
                                    <div class="flex items-center justify-between">
                                        <label class="ui-label">Términos adicionales</label>
                                        <button type="button" class="ui-btn" onclick="tcAddExtra()">+
                                            Añadir</button>
                                    </div>

                                    <div id="tc_extras" class="mt-2 space-y-2"></div>

                                    <p class="text-xs ui-muted mt-2">
                                        Aquí agregas cualquier condición extra (1 por ítem).
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>


                    {{-- Items --}}
                    <div class="ui-field">
                        <div class="flex items-center justify-between">
                            <label class="ui-label">Ítems *</label>
                            <button type="button" class="ui-btn" onclick="addItemRow()">
                                + Agregar ítem
                            </button>
                        </div>

                        <div class="mt-3 overflow-x-auto rounded-lg ui-border"
                            style="background-color: var(--bg-surface);">
                            <table class="min-w-full text-sm">
                                <thead
                                    style="background-color: var(--bg-card); border-bottom: 1px solid var(--border-color);">
                                    <tr>
                                        <th class="px-3 py-2 text-left font-semibold ui-text">Descripción</th>
                                        <th class="px-3 py-2 text-left font-semibold ui-text">Unidad</th>
                                        <th class="px-3 py-2 text-left font-semibold ui-text">Cant.</th>
                                        <th class="px-3 py-2 text-left font-semibold ui-text">Costo base</th>
                                        <th class="px-3 py-2 text-left font-semibold ui-text">Margen %</th>
                                        <th class="px-3 py-2 text-left font-semibold ui-text">Precio unitario final
                                        </th>
                                        <th class="px-3 py-2 text-left font-semibold ui-text">Subtotal</th>
                                        <th class="px-3 py-2 text-left font-semibold ui-text">Acción</th>
                                    </tr>
                                </thead>

                                <tbody id="items-body">
                                    @php
                                        $oldItems = old('items');
                                        $itemsData = $oldItems ?? ($items ?? []);
                                    @endphp

                                    @forelse($itemsData as $idx => $it)
                                        @php
                                            $desc = is_array($it) ? $it['descripcion'] ?? '' : $it->descripcion ?? '';
                                            $unidad = is_array($it) ? $it['unidad'] ?? '' : $it->unidad ?? '';
                                            $cantidad = is_array($it) ? $it['cantidad'] ?? 1 : $it->cantidad ?? 1;
                                            $costo = is_array($it)
                                                ? $it['costo_unitario_base'] ?? 0
                                                : $it->costo_unitario_base ?? 0;
                                            $margen = is_array($it)
                                                ? $it['margen_ganancia_pct'] ?? 20
                                                : $it->margen_ganancia_pct ?? 20;
                                        @endphp

                                        <tr class="item-row" style="border-bottom: 1px solid var(--border-color);">
                                            <td class="px-3 py-2">
                                                <input name="items[{{ $idx }}][descripcion]"
                                                    value="{{ $desc }}" class="ui-input w-72" required>
                                            </td>

                                            <td class="px-3 py-2">
                                                <input name="items[{{ $idx }}][unidad]"
                                                    value="{{ $unidad }}" class="ui-input w-20">
                                            </td>

                                            <td class="px-3 py-2">
                                                <input type="number" step="0.01" min="0.01"
                                                    name="items[{{ $idx }}][cantidad]"
                                                    value="{{ $cantidad }}" class="ui-input w-20 js-cantidad"
                                                    required oninput="recalcRow(this)">
                                            </td>

                                            <td class="px-3 py-2">
                                                <input type="number" step="0.0001" min="0"
                                                    name="items[{{ $idx }}][costo_unitario_base]"
                                                    value="{{ $costo }}" class="ui-input w-32 js-costo"
                                                    required oninput="recalcRow(this)">
                                            </td>

                                            <td class="px-3 py-2">
                                                <input type="number" step="0.01" min="0"
                                                    name="items[{{ $idx }}][margen_ganancia_pct]"
                                                    value="{{ $margen }}" class="ui-input w-20 js-margen"
                                                    oninput="markManualAndRecalc(this)">
                                            </td>

                                            <td class="px-3 py-2">
                                                {{-- solo visual (NO confiar en esto en backend) --}}
                                                <input type="text" class="ui-input w-32 js-precio-final" readonly
                                                    value="0.00">


                                            </td>

                                            <td class="px-3 py-2">
                                                <input type="text" class="ui-input w-32 js-subtotal" readonly
                                                    value="0.00">
                                            </td>

                                            <td class="px-3 py-2">
                                                <button type="button" class="ui-btn-danger"
                                                    onclick="removeRow(this)">
                                                    Quitar
                                                </button>
                                            </td>
                                            {{-- hidden que SI se envían al backend --}}
                                            <input type="hidden"
                                                name="items[{{ $idx }}][precio_unitario_calculado]"
                                                class="js-precio-hidden" value="0">
                                            <input type="hidden" name="items[{{ $idx }}][subtotal_linea]"
                                                class="js-subtotal-hidden" value="0">

                                        </tr>
                                    @empty
                                        <tr class="item-row" style="border-bottom: 1px solid var(--border-color);">
                                            <td class="px-3 py-2">
                                                <input name="items[0][descripcion]" class="ui-input w-72" required>
                                            </td>
                                            <td class="px-3 py-2">
                                                <input name="items[0][unidad]" class="ui-input w-20">
                                            </td>
                                            <td class="px-3 py-2">
                                                <input type="number" step="0.01" min="0.01"
                                                    name="items[0][cantidad]" value="1"
                                                    class="ui-input w-20 js-cantidad" required
                                                    oninput="recalcRow(this)">
                                            </td>
                                            <td class="px-3 py-2">
                                                <input type="number" step="0.0001" min="0"
                                                    name="items[0][costo_unitario_base]" value="0"
                                                    class="ui-input w-32 js-costo" required oninput="recalcRow(this)">
                                            </td>
                                            <td class="px-3 py-2">
                                                <input type="number" step="0.01" min="0"
                                                    name="items[0][margen_ganancia_pct]" value="20"
                                                    class="ui-input w-20 js-margen"
                                                    oninput="markManualAndRecalc(this)">
                                            </td>
                                            <td class="px-3 py-2">
                                                <input type="text" class="ui-input w-32 js-precio-final" readonly
                                                    value="0.00">
                                            </td>
                                            <td class="px-3 py-2">
                                                <input type="text" class="ui-input w-32 js-subtotal" readonly
                                                    value="0.00">
                                            </td>
                                            <td class="px-3 py-2">
                                                <button type="button" class="ui-btn-danger"
                                                    onclick="removeRow(this)">
                                                    Quitar
                                                </button>
                                            </td>
                                            <input type="hidden" name="items[0][precio_unitario_calculado]"
                                                class="js-precio-hidden" value="0">
                                            <input type="hidden" name="items[0][subtotal_linea]"
                                                class="js-subtotal-hidden" value="0">

                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{-- Totales visuales (opcional pero útil) --}}
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="ui-field">
                                <label class="ui-label">Subtotal</label>
                                <input type="text" id="ui_subtotal" class="ui-input" readonly value="0.00">
                                <input type="hidden" name="subtotal" id="subtotal">
                            </div>
                            <div class="ui-field">
                                <label class="ui-label">Descuento</label>
                                <input type="text" id="ui_descuento" class="ui-input" readonly value="0.00">
                                <input type="hidden" name="descuento_monto" id="descuento_total_monto" value="0">

                            </div>
                            <div class="ui-field">
                                <label class="ui-label">Total</label>
                                <input type="text" id="ui_total" class="ui-input font-semibold" readonly
                                    value="0.00">
                                <input type="hidden" name="total" id="total">
                            </div>
                        </div>

                        @error('items')
                            <p class="ui-error mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    {{-- Notas --}}
                    <div class="ui-field">
                        <label class="ui-label">Notas</label>
                        <textarea name="notas" rows="3" class="ui-textarea @error('notas') ui-invalid @enderror"
                            placeholder="Información adicional de la cotización...">{{ old('notas', $cotizacion->notas ?? '') }}</textarea>
                        @error('notas')
                            <p class="ui-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center gap-3 pt-4">
                        <button type="submit" class="ui-btn-primary">
                            {{ isset($cotizacion) ? 'Actualizar' : 'Guardar' }}
                        </button>

                        <a href="{{ route('admin.cotizaciones.index') }}" class="ui-btn">
                            Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    // =========================
    // TU CÓDIGO (NO SE TOCA)
    // =========================
    function selectCliente(id, label) {
        document.getElementById('cliente_id').value = id;
        const lbl = document.getElementById('cliente-label');
        lbl.innerText = label;
        lbl.classList.remove('ui-muted');
        const dd = document.getElementById('cliente-dd');
        if (dd) dd.classList.add('hidden');
    }

    function filterClientes() {
        const q = (document.getElementById('cliente-search')?.value || '').toLowerCase().trim();
        document.querySelectorAll('#cliente-list .cliente-item').forEach(li => {
            const t = (li.getAttribute('data-text') || '');
            li.style.display = t.includes(q) ? '' : 'none';
        });
    }

    function selectTipo(value, label) {
        document.getElementById('tipo').value = value;
        document.getElementById('tipo-label').innerText = label;

        const dd = document.getElementById('tipo-dd');
        if (dd) dd.classList.add('hidden');

        const v = String(value).toLowerCase();

        if (v === 'mensual') {
            // mensual => CF definido
            selectSfCf('cf_def', 'CF definido (Con factura)');
        } else {
            //  todo lo demás => CF por defecto
            selectSfCf('cf', 'CF (Con factura)');
        }
        if (typeof tcOnTipoChange === 'function') tcOnTipoChange(v);
    }



    function selectContexto(value, label) {
        document.getElementById('contexto').value = value;
        document.getElementById('ctx-label').innerText = label;
        const dd = document.getElementById('ctx-dd');
        if (dd) dd.classList.add('hidden');
    }

    function selectEstado(value, label) {
        document.getElementById('estado').value = value;
        document.getElementById('estado-label').innerText = label;
        const dd = document.getElementById('estado-dd');
        if (dd) dd.classList.add('hidden');
    }

    function updateRowFinanzasByMoneda(moneda) {
        const row = document.getElementById('row-finanzas');
        const tc = document.getElementById('tc-field');

        if (!row || !tc) return;

        if (moneda === 'USD') {
            // 5 columnas + mostrar TC
            row.classList.remove('md:grid-cols-4');
            row.classList.add('md:grid-cols-5');
            tc.classList.remove('hidden');
        } else {
            // 4 columnas + ocultar TC
            row.classList.remove('md:grid-cols-5');
            row.classList.add('md:grid-cols-4');
            tc.classList.add('hidden');
        }
    }

    function selectMoneda(value) {
        document.getElementById('moneda').value = value;
        document.getElementById('moneda-label').innerText = value;
        const dd = document.getElementById('moneda-dd');
        if (dd) dd.classList.add('hidden');

        // Mostrar/ocultar tipo de cambio
        const tc = document.getElementById('tc-field');
        if (tc) tc.style.display = (value === 'USD') ? '' : 'none';
        updateRowFinanzasByMoneda(value);
    }

    function normalizeItemIndexes() {
        const rows = document.querySelectorAll('#items-body tr');
        rows.forEach((tr, idx) => {
            tr.querySelectorAll('input[name]').forEach(inp => {
                inp.name = inp.name.replace(/items\[\d+\]/, `items[${idx}]`);
            });
        });
    }

    // =========================
    // NUEVO: helpers
    // =========================
    function toNum(v) {
        const n = parseFloat(String(v ?? '').replace(',', '.'));
        return isNaN(n) ? 0 : n;
    }

    function money(n) {
        return (Math.round(n * 100) / 100).toFixed(2);
    }

    function round0(n) {
        return Math.round(toNum(n)); // entero (0 decimales)
    }

    function getSfCfMode() {
        return (document.getElementById('sf_cf')?.value || 'sf').toLowerCase();
    }

    function tcToggleGarantia() {
        const on = !!document.getElementById('tc_garantia_on')?.checked;
        const box = document.getElementById('tc_garantia_box');
        if (box) box.classList.toggle('hidden', !on);
        tcSyncToTextarea();
    }

    function tcUnitLabel(unitBase, n) {
        // unitBase: 'anio' | 'mes'
        if (unitBase === 'anio') return (n === 1) ? 'año' : 'años';
        if (unitBase === 'mes') return (n === 1) ? 'mes' : 'meses';
        return '';
    }

    // =========================
    // NUEVO: selector SF/CF
    // =========================
    function selectSfCf(value, label) {
        const inp = document.getElementById('sf_cf');
        if (inp) inp.value = value;

        const lbl = document.getElementById('sf-cf-label');
        if (lbl) lbl.innerText = label;

        const dd = document.getElementById('sf-cf-dd');
        if (dd) dd.classList.add('hidden');

        recalcAll();
    }


    // =========================
    // NUEVO: fórmulas
    // CF: ((Costo base*0.115)*(1+margen%))/0.87
    // SF: Costo base*(1+margen%)
    // =========================
    function calcPrecioUnitarioFinal(costoBase, margenPct) {
        const mode = getSfCfValue(); // sf | cf | sf_def | cf_def

        // "definido": NO calcula, SOLO copia costoBase → precio final
        if (mode === 'sf_def' || mode === 'cf_def') {
            return costoBase;
        }

        // calculado
        if (mode === 'cf') {
            return ((costoBase - (costoBase * 0.115)) * (1 + (margenPct / 100)) / 0.87);
        }

        // sf
        return costoBase * (1 + (margenPct / 100));
    }



    // =========================
    // NUEVO: recalcular fila
    // =========================
    function setRowManualState(tr, manual) {
        const precio = tr.querySelector('.js-precio-final');
        const costo = tr.querySelector('.js-costo');
        const margen = tr.querySelector('.js-margen');

        if (!precio) return;

        if (manual) {
            // manual: precio editable, costo/margen opcionalmente deshabilitados
            precio.readOnly = false;

            if (costo) costo.readOnly = true;
            if (margen) margen.readOnly = true;

        } else {
            // calculado: precio bloqueado, costo/margen activos
            precio.readOnly = true;

            if (costo) costo.readOnly = false;
            if (margen) margen.readOnly = false;
        }
    }

    function recalcRowByTr(tr) {
        if (!tr) return;

        const costo = toNum(tr.querySelector('.js-costo')?.value);
        const margen = toNum(tr.querySelector('.js-margen')?.value);
        const cant = toNum(tr.querySelector('.js-cantidad')?.value);

        //  aquí se decide:
        // - sf_def/cf_def => precioFinal = costo
        // - sf/cf        => precioFinal = fórmula
        const precioFinal = calcPrecioUnitarioFinal(costo, margen);

        const subtotal = precioFinal * (cant <= 0 ? 0 : cant);

        const outPrecio = tr.querySelector('.js-precio-final');
        const outSubtotal = tr.querySelector('.js-subtotal');

        if (outPrecio) outPrecio.value = money(precioFinal); // lo dejo con 2 decimales
        if (outSubtotal) outSubtotal.value = round0(subtotal); // subtotal fila entero
        const hPrecio = tr.querySelector('.js-precio-hidden');
        const hSub = tr.querySelector('.js-subtotal-hidden');

        if (hPrecio) hPrecio.value = precioFinal; // sin formato
        if (hSub) hSub.value = subtotal; // sin redondear o si quieres round0(subtotal)


    }




    function recalcRow(fromEl) {
        const tr = fromEl?.closest('tr');
        recalcRowByTr(tr);
        recalcTotals();
    }

    // =========================
    // NUEVO: totales + descuento %
    // descuento_total en BD = porcentaje
    // =========================
    function recalcTotals() {
  let subtotal = 0;

  // usa el hidden real (sin formato) para sumar exacto
  document.querySelectorAll('#items-body tr').forEach(tr => {
    subtotal += toNum(tr.querySelector('.js-subtotal-hidden')?.value);
  });

  const descuentoPct = toNum(document.getElementById('descuento_pct')?.value);
  const descuentoMonto = subtotal * (descuentoPct / 100);
  const total = Math.max(0, subtotal - descuentoMonto);

  // redondeos
  const subtotalR = round0(subtotal);
  const descuentoR = round0(descuentoMonto);
  const totalR = round0(total);

  // UI
  const uiSub = document.getElementById('ui_subtotal');
  const uiDesc = document.getElementById('ui_descuento');
  const uiTot = document.getElementById('ui_total');

  if (uiSub) uiSub.value = subtotalR;
  if (uiDesc) uiDesc.value = descuentoR;
  if (uiTot) uiTot.value = totalR;

  // hidden a backend
  const hSub = document.getElementById('subtotal');
  const hTot = document.getElementById('total');
  const hDescMonto = document.getElementById('descuento_total_monto');

  if (hSub) hSub.value = subtotalR;
  if (hTot) hTot.value = totalR;

  // monto (NO %)
  if (hDescMonto) hDescMonto.value = descuentoR;
}


    function recalcAll() {
        document.querySelectorAll('#items-body tr').forEach(tr => recalcRowByTr(tr));
        recalcTotals();
    }

    // =========================
    // NUEVO: margen general (default 20)
    // - Si editas un item, se respeta.
    // - Si cambias el general, estandariza TODOS (sobrescribe) como pediste.
    // =========================
    function markManualMargin(input) {
        input.dataset.manual = "1";
        recalcRow(input);
    }

    function applyMargenGeneralToAll() {
        const g = toNum(document.getElementById('margen_general')?.value ?? 20);

        document.querySelectorAll('#items-body tr').forEach(tr => {
            const m = tr.querySelector('.js-margen');
            if (!m) return;

            // Estándar: sobrescribe todos (como pediste)
            m.value = g;
            m.dataset.manual = "0";
            recalcRowByTr(tr);
        });

        recalcTotals();
    }

    // =========================
    // CAMBIO: addItemRow (sin recargo fijo)
    // agrega precio unitario final + subtotal (readonly)
    // =========================
    function addItemRow() {
        const body = document.getElementById('items-body');
        const idx = body.querySelectorAll('tr').length;
        const margenGeneral = toNum(document.getElementById('margen_general')?.value ?? 20);

        const tr = document.createElement('tr');
        tr.style.borderBottom = '1px solid var(--border-color)';
        tr.innerHTML = `
            <td class="px-3 py-2"><input name="items[${idx}][descripcion]" class="ui-input w-72" required></td>
            <td class="px-3 py-2"><input name="items[${idx}][unidad]" class="ui-input w-20"></td>

            <td class="px-3 py-2">
                <input type="number" step="0.01" min="0.01"
                       name="items[${idx}][cantidad]" value="1"
                       class="ui-input w-20 js-cantidad"
                       required oninput="recalcRow(this)">
            </td>

            <td class="px-3 py-2">
                <input type="number" step="0.0001" min="0"
                       name="items[${idx}][costo_unitario_base]" value="0"
                       class="ui-input w-32 js-costo"
                       required oninput="recalcRow(this)">
            </td>

            <td class="px-3 py-2">
                <input type="number" step="0.01" min="0"
                       name="items[${idx}][margen_ganancia_pct]" value="${margenGeneral}"
                       class="ui-input w-20 js-margen"
                       data-manual="0" oninput="markManualMargin(this)">
            </td>

            <td class="px-3 py-2">
                <input type="text" class="ui-input w-32 js-precio-final" readonly value="0.00">
            </td>

            <td class="px-3 py-2">
                <input type="text" class="ui-input w-32 js-subtotal" readonly value="0.00">
            </td>

            <td class="px-3 py-2">
                <button type="button" class="ui-btn-danger" onclick="removeRow(this)">Quitar</button>
            </td>
            <input type="hidden" name="items[${idx}][precio_unitario_calculado]" class="js-precio-hidden" value="0">
<input type="hidden" name="items[${idx}][subtotal_linea]" class="js-subtotal-hidden" value="0">

        `;
        body.appendChild(tr);

        recalcRowByTr(tr);
        recalcTotals();
    }

    // =========================
    // TU removeRow (se mantiene) + recalcular
    // =========================
    function removeRow(btn) {
        const tr = btn.closest('tr');
        if (tr) tr.remove();
        normalizeItemIndexes();
        recalcTotals();
    }

    // =========================
    // initMoneda (se mantiene)
    // + init cálculos
    // =========================
    (function initMoneda() {
        const moneda = document.getElementById('moneda')?.value || 'BOB';
        const tc = document.getElementById('tc-field');
        if (tc) tc.style.display = (moneda === 'USD') ? '' : 'none';
    })();

    // =========================
    // NUEVO: listeners globales al cargar
    // =========================
    document.addEventListener('DOMContentLoaded', () => {
        // margen general: estandariza
        const mg = document.getElementById('margen_general');
        if (mg) mg.addEventListener('input', applyMargenGeneralToAll);

        // descuento %: recalcula totales
        const desc = document.getElementById('descuento_pct');
        if (desc) desc.addEventListener('input', recalcTotals);
        const tipo = (document.getElementById('tipo')?.value || '').toLowerCase();
        if (tipo === 'mensual') {
            selectSfCf('cf_def', 'CF definido (Con factura)');
        } else {
            //  default CF
            selectSfCf('cf', 'CF (Con factura)');
        }


        // si ya hay filas precargadas (edit/old), les ponemos listeners y recalculamos
        document.querySelectorAll('#items-body tr').forEach(tr => {
            const costo = tr.querySelector('.js-costo');
            const cant = tr.querySelector('.js-cantidad');
            const marg = tr.querySelector('.js-margen');

            if (costo) costo.addEventListener('input', () => recalcRowByTr(tr));
            if (cant) cant.addEventListener('input', () => recalcRowByTr(tr));
            if (marg) marg.addEventListener('input', () => {
                marg.dataset.manual = "1";
                recalcRowByTr(tr);
            });

            // asegurar salida visual
            recalcRowByTr(tr);
        });
        const moneda = (document.getElementById('moneda')?.value || 'BOB').toUpperCase();
        updateRowFinanzasByMoneda(moneda);
        recalcTotals();
    });

    function getSfCfValue() {
        return (document.getElementById('sf_cf')?.value || 'sf').toLowerCase();
    }

    function isManualPricing() {
        const v = getSfCfValue();
        return v === 'sf_def' || v === 'cf_def';
    }

    function markManualAndRecalc(input) {
        markManualMargin(input);
    }
    // =========================
    // TAGS CHIPS (Enter -> chip)
    // Guarda en #tags_text como "tag1, tag2, tag3"
    // =========================
    function normalizeTag(t) {
        return String(t || '')
            .trim()
            .replace(/\s+/g, ' ')
            .replace(/,+/g, ''); // evita comas dentro
    }

    function parseTagsFromHidden() {
        const hidden = document.getElementById('tags_text');
        const raw = (hidden?.value || '').trim();
        if (!raw) return [];
        return raw
            .split(',')
            .map(s => normalizeTag(s))
            .filter(Boolean);
    }

    function uniqueTags(arr) {
        const seen = new Set();
        const out = [];
        arr.forEach(t => {
            const k = t.toLowerCase();
            if (!seen.has(k)) {
                seen.add(k);
                out.push(t);
            }
        });
        return out;
    }

    function pickChipStyle(tag) {
        // color "aleatorio" pero estable por tag (hash simple)
        let h = 0;
        for (let i = 0; i < tag.length; i++) h = (h * 31 + tag.charCodeAt(i)) >>> 0;

        // 8 estilos (puedes agregar más)
        const styles = [{
                bg: 'rgba(1, 211, 209, .18)',
                bd: 'rgba(1, 211, 209, .35)'
            }, // turquesa
            {
                bg: 'rgba(0, 80, 176, .14)',
                bd: 'rgba(0, 80, 176, .30)'
            }, // azul
            {
                bg: 'rgba(16, 185, 129, .14)',
                bd: 'rgba(16, 185, 129, .28)'
            }, // verde
            {
                bg: 'rgba(245, 158, 11, .14)',
                bd: 'rgba(245, 158, 11, .28)'
            }, // ámbar
            {
                bg: 'rgba(239, 68, 68, .12)',
                bd: 'rgba(239, 68, 68, .26)'
            }, // rojo
            {
                bg: 'rgba(168, 85, 247, .12)',
                bd: 'rgba(168, 85, 247, .26)'
            }, // violeta
            {
                bg: 'rgba(59, 130, 246, .12)',
                bd: 'rgba(59, 130, 246, .26)'
            }, // azul claro
            {
                bg: 'rgba(100, 116, 139, .12)',
                bd: 'rgba(100, 116, 139, .26)'
            }, // slate
        ];
        return styles[h % styles.length];
    }

    function updateHiddenTags(tags) {
        const hidden = document.getElementById('tags_text');
        if (hidden) hidden.value = tags.join(', ');
        syncTagsToHiddenInputs(tags);
    }

    function syncTagsToHiddenInputs(tags) {
        const wrap = document.getElementById('tags-hidden');
        if (!wrap) return;

        wrap.innerHTML = '';
        tags.forEach(t => {
            const inp = document.createElement('input');
            inp.type = 'hidden';
            inp.name = 'tags_json[]';
            inp.value = t;
            wrap.appendChild(inp);
        });
    }

    function renderTagChips(tags) {
        const wrap = document.getElementById('tags-chips');
        if (!wrap) return;

        wrap.innerHTML = '';
        tags.forEach((tag, idx) => {
            const st = pickChipStyle(tag);

            const chip = document.createElement('span');
            chip.className = 'inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs ui-text ui-border';
            chip.style.backgroundColor = st.bg;
            chip.style.borderColor = st.bd;

            const text = document.createElement('span');
            text.textContent = tag;

            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'ui-muted hover:opacity-100 opacity-80 transition-opacity';
            btn.innerHTML = '✕';
            btn.setAttribute('aria-label', 'Quitar tag');
            btn.addEventListener('click', () => {
                const next = tags.filter((_, i) => i !== idx);
                updateHiddenTags(next);
                renderTagChips(next);
            });

            chip.appendChild(text);
            chip.appendChild(btn);
            wrap.appendChild(chip);
        });
    }

    function addTagFromInput() {
        const input = document.getElementById('tags_input');
        if (!input) return;

        const t = normalizeTag(input.value);
        if (!t) {
            input.value = '';
            return;
        }

        const current = parseTagsFromHidden();
        const next = uniqueTags([...current, t]);

        updateHiddenTags(next);
        renderTagChips(next);

        input.value = '';
    }

    function removeLastTag() {
        const current = parseTagsFromHidden();
        if (current.length === 0) return;
        current.pop();
        updateHiddenTags(current);
        renderTagChips(current);
    }

    // init al cargar
    document.addEventListener('DOMContentLoaded', () => {
        // render inicial con lo que venga de BD/old()
        renderTagChips(parseTagsFromHidden());
        const initial = parseTagsFromHidden();
        renderTagChips(initial);
        syncTagsToHiddenInputs(initial);
        const input = document.getElementById('tags_input');
        const box = document.getElementById('tags-box');

        if (box && input) {
            // click en el contenedor => focus al input
            box.addEventListener('click', () => input.focus());

            // Enter / Coma => crear tag
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ',') {
                    e.preventDefault();
                    addTagFromInput();
                    return;
                }

                // Backspace con input vacío => borra último
                if (e.key === 'Backspace' && (input.value || '').length === 0) {
                    e.preventDefault();
                    removeLastTag();
                }
            });

            // opcional: al salir del input, si quedó texto, lo convierte en tag
            input.addEventListener('blur', () => {
                if ((input.value || '').trim().length > 0) addTagFromInput();
            });
        }
    });
    // =========================
    // T&C BUILDER (panel derecho)
    // Mantiene envío al backend con name="terminos_text"
    // =========================
    function tcTogglePanel() {
        const p = document.getElementById('tc-panel');
        if (!p) return;
        p.classList.toggle('hidden');
    }

    // Helpers
    function tcGetTipo() {
        return String(document.getElementById('tipo')?.value || 'proyecto').toLowerCase();
    }

    function tcGetFechaEmision() {
        return document.querySelector('input[name="fecha_emision"]')?.value || '';
    }

    function tcSetFechaVencimiento(val) {
        const inp = document.querySelector('input[name="fecha_vencimiento"]');
        if (inp) inp.value = val;
    }

    function tcParseFeriados() {
        const raw = (document.getElementById('tc_feriados')?.value || '').trim();
        if (!raw) return new Set();
        const set = new Set();
        raw.split(',').map(s => s.trim()).filter(Boolean).forEach(d => set.add(d));
        return set;
    }

    function tcIsWeekend(dateObj) {
        const d = dateObj.getDay(); // 0 domingo, 6 sábado
        return d === 0 || d === 6;
    }

    function tcFormatDate(dateObj) {
        const y = dateObj.getFullYear();
        const m = String(dateObj.getMonth() + 1).padStart(2, '0');
        const d = String(dateObj.getDate()).padStart(2, '0');
        return `${y}-${m}-${d}`;
    }

    // Sumar días hábiles (excluye sáb/dom + feriados manuales)
    function tcAddBusinessDays(startYYYYMMDD, days) {
        if (!startYYYYMMDD || !days || days < 0) return '';
        const feriados = tcParseFeriados();

        const parts = startYYYYMMDD.split('-');
        if (parts.length !== 3) return '';
        const start = new Date(Number(parts[0]), Number(parts[1]) - 1, Number(parts[2]));
        if (isNaN(start.getTime())) return '';

        let d = new Date(start.getTime());
        let added = 0;

        while (added < days) {
            d.setDate(d.getDate() + 1);
            const ymd = tcFormatDate(d);

            if (tcIsWeekend(d)) continue;
            if (feriados.has(ymd)) continue;

            added++;
        }
        return tcFormatDate(d);
    }

    // UI: porcentaje
    function tcOnPctChange() {
        const adel = document.getElementById('tc_pago_adelanto');
        const res = document.getElementById('tc_pago_restante');
        const box = document.getElementById('tc_pago_pct_box');
        const modo = document.getElementById('tc_pago_modo')?.value || 'pct';

        if (box) box.style.display = (modo === 'pct') ? '' : 'none';

        let a = parseInt(adel?.value || '0', 10);
        if (isNaN(a)) a = 0;
        if (a < 0) a = 0;
        if (a > 100) a = 100;

        if (adel) adel.value = a;
        if (res) res.value = String(100 - a);

        tcSyncToTextarea();
    }

    // UI: validez -> recalcular vencimiento
    function tcOnValidezChange() {
        const dias = parseInt(document.getElementById('tc_validez_dias')?.value || '0', 10);
        const fe = tcGetFechaEmision();

        if (fe && dias > 0) {
            const fv = tcAddBusinessDays(fe, dias);
            if (fv) tcSetFechaVencimiento(fv);
        }
        tcSyncToTextarea();
    }

    // Extras (repeater)
    function tcAddExtra(value = '') {
        const wrap = document.getElementById('tc_extras');
        if (!wrap) return;

        const row = document.createElement('div');
        row.className = 'flex items-start gap-2';

        row.innerHTML = `
        <input type="text" class="ui-input flex-1 tc-extra"
               placeholder="Ej: Entrega: 7 días hábiles..."
               value="${String(value).replaceAll('"','&quot;')}" />
        <button type="button" class="ui-btn-danger" aria-label="Quitar">✕</button>
    `;

        row.querySelector('.tc-extra')?.addEventListener('input', tcSyncToTextarea);
        row.querySelector('button')?.addEventListener('click', () => {
            row.remove();
            tcSyncToTextarea();
        });

        wrap.appendChild(row);
        tcSyncToTextarea();
    }

    // Mostrar/ocultar contrato mínimo (según tipo)
    function tcUpdateMensualVisibility() {
        const tipo = tcGetTipo();
        const box = document.getElementById('tc_contrato_box');
        if (!box) return;

        if (tipo === 'mensual') {
            box.classList.remove('hidden');
            const chk = document.getElementById('tc_contrato_min');
            if (chk) chk.checked = true; // siempre ON por tu regla
        } else {
            box.classList.add('hidden');
        }
    }

    // Defaults según tipo (lo que pediste)
    function tcApplyDefaultsByTipo(tipo) {
        tipo = String(tipo || '').toLowerCase();

        // --- defaults comunes ---
        const validez = document.getElementById('tc_validez_dias');
        if (validez) validez.value = 10;

        // limpiar switches opcionales (para que NO se incluyan por defecto)
        const inst = document.getElementById('tc_incluye_inst');
        if (inst) inst.checked = false;

        // garantía (NO por defecto)
        // Garantía (opcional): valores listos en 1 año, pero OFF por defecto
        const gOn = document.getElementById('tc_garantia_on');
        const gBox = document.getElementById('tc_garantia_box');
        const gc = document.getElementById('tc_garantia_cant');
        const gu = document.getElementById('tc_garantia_unidad');

        if (gOn) gOn.checked = false;
        if (gBox) gBox.classList.add('hidden');
        if (gc) gc.value = 1;
        if (gu) gu.value = 'anio';


        // soporte (solo proyecto/prospecto por defecto)
        const sc = document.getElementById('tc_soporte_cant');
        const su = document.getElementById('tc_soporte_unidad');
        if (sc) sc.value = 1;
        if (su) su.value = 'mes';

        // forma de pago (solo proyecto/prospecto por defecto)
        const modo = document.getElementById('tc_pago_modo');
        const adel = document.getElementById('tc_pago_adelanto');
        if (modo) modo.value = 'pct';
        if (adel) adel.value = 80;

        // visibilidad mensual
        tcUpdateMensualVisibility();

        //  NUEVO: qué términos se incluyen por defecto
        if (tipo === 'mensual') {
            // mensual => SOLO contrato + validez
            // desactiva pago y soporte en builder para que no se incluyan
            const pm = document.getElementById('tc_pago_modo');
            if (pm) pm.value = 'pct'; // da igual, no se incluirá
            const contrato = document.getElementById('tc_contrato_min');
            if (contrato) contrato.checked = true;

            // (opcional) soporte se mantiene en 1 mes pero NO se incluirá
        } else if (tipo === 'proyecto' || tipo === 'prospecto') {
            // proyecto/prospecto => pago + validez + soporte
            // contrato mensual oculto
            const contrato = document.getElementById('tc_contrato_min');
            if (contrato) contrato.checked = false;
        } else {
            // anual/otro => decide tu regla: yo lo dejo igual a proyecto por defecto
            const contrato = document.getElementById('tc_contrato_min');
            if (contrato) contrato.checked = false;
        }

        // recalcular vencimiento y refrescar textarea
        tcOnPctChange();
        tcOnValidezChange();
        tcSyncToTextarea();
    }


    // Generar líneas en textarea principal (lo que se envía al backend)
    function tcSyncToTextarea() {
        const out = document.getElementById('terminos_text');
        if (!out) return;

        const tipo = tcGetTipo();
        const lines = [];

        // 1) Validez (siempre)
        const vd = parseInt(document.getElementById('tc_validez_dias')?.value || '10', 10) || 10;
        lines.push(`Tiempo de validez de la oferta: ${vd} días hábiles.`);

        // 2) Mensual => SOLO contrato + validez
        if (tipo === 'mensual') {
            const cmin = !!document.getElementById('tc_contrato_min')?.checked;
            if (cmin) lines.unshift('Contrato mínimo de 12 meses.'); // arriba
        }

        // 3) Proyecto / Prospecto => pago + validez + soporte
        if (tipo === 'proyecto' || tipo === 'prospecto') {
            // Forma de pago
            const modo = document.getElementById('tc_pago_modo')?.value || 'pct';
            if (modo === 'entrega') {
                lines.unshift('Forma de pago: Contra entrega del producto/servicio.');
            } else {
                const a = parseInt(document.getElementById('tc_pago_adelanto')?.value || '80', 10) || 80;
                const r = 100 - a;
                lines.unshift(`Forma de pago: ${a}% por adelantado y ${r}% restante al finalizar el proyecto.`);
            }

            // Soporte post venta (por defecto 1 mes, pero editable)
            const sc = parseInt(document.getElementById('tc_soporte_cant')?.value || '1', 10) || 1;
            const su = document.getElementById('tc_soporte_unidad')?.value || 'mes';
            lines.push(`Soporte técnico post venta: ${sc} ${su} después de la entrega del proyecto.`);
        }

        // 4) Opcionales: solo si el usuario los activa (aunque sea mensual)
        const inst = !!document.getElementById('tc_incluye_inst')?.checked;
        if (inst) lines.push('El precio total de la cotización incluye el costo total de la instalación.');

        // Garantía (solo si está activada)
        const gOn = !!document.getElementById('tc_garantia_on')?.checked;
        if (gOn) {
            const gc = parseInt(document.getElementById('tc_garantia_cant')?.value || '1', 10) || 1;
            const gu = document.getElementById('tc_garantia_unidad')?.value || 'anio';
            const unidadTxt = tcUnitLabel(gu, gc);

            lines.push(`Garantía: ${gc} ${unidadTxt} contra defectos de fábrica.`);
        }


        // 5) Extras (siempre)
        document.querySelectorAll('#tc_extras .tc-extra').forEach(inp => {
            const v = String(inp.value || '').trim();
            if (v) lines.push(v);
        });

        out.value = lines.join('\n');
    }


    // Parse básico desde textarea (para editar cotización ya guardada)
    function tcLoadFromTextarea() {
        const out = document.getElementById('terminos_text');
        if (!out) return;

        const text = String(out.value || '').trim();
        if (!text) return;

        const lines = text.split('\n').map(s => s.trim()).filter(Boolean);

        // limpiar extras actuales
        const wrap = document.getElementById('tc_extras');
        if (wrap) wrap.innerHTML = '';

        // defaults base primero (según tipo actual)
        tcApplyDefaultsByTipo(tcGetTipo());

        // parse forma de pago %
        const pagoPct = lines.find(l => /Forma de pago:\s*\d+%/i.test(l));
        if (pagoPct) {
            const m = pagoPct.match(/Forma de pago:\s*(\d+)%/i);
            if (m) {
                const modo = document.getElementById('tc_pago_modo');
                const adel = document.getElementById('tc_pago_adelanto');
                if (modo) modo.value = 'pct';
                if (adel) adel.value = m[1];
            }
        }
        const pagoEntrega = lines.find(l => /Forma de pago:\s*Contra entrega/i.test(l));
        if (pagoEntrega) {
            const modo = document.getElementById('tc_pago_modo');
            if (modo) modo.value = 'entrega';
        }

        // parse validez
        const val = lines.find(l => /Tiempo de validez/i.test(l));
        if (val) {
            const m = val.match(/(\d+)/);
            if (m) {
                const vd = document.getElementById('tc_validez_dias');
                if (vd) vd.value = m[1];
            }
        }

        // parse garantía
        const gar = lines.find(l => /^Garantía:/i.test(l));
        if (gar) {
            const m = gar.match(/Garantía:\s*(\d+)\s*(año|años|mes|meses)/i);
            if (m) {
                const gOn = document.getElementById('tc_garantia_on');
                const gBox = document.getElementById('tc_garantia_box');
                const gc = document.getElementById('tc_garantia_cant');
                const gu = document.getElementById('tc_garantia_unidad');

                if (gOn) gOn.checked = true;
                if (gBox) gBox.classList.remove('hidden');
                if (gc) gc.value = m[1];

                const word = m[2].toLowerCase();
                if (gu) gu.value = (word.startsWith('mes')) ? 'mes' : 'anio';
            }
        }

        // incluye instalación
        const inst = lines.some(l => /incluye.*instalación/i.test(l));
        const chkInst = document.getElementById('tc_incluye_inst');
        if (chkInst) chkInst.checked = inst;

        // soporte
        const sop = lines.find(l => /^Soporte técnico post venta:/i.test(l));
        if (sop) {
            const m = sop.match(/:\s*(\d+)\s*(mes|meses|semanas|días)/i);
            if (m) {
                const sc = document.getElementById('tc_soporte_cant');
                const su = document.getElementById('tc_soporte_unidad');
                if (sc) sc.value = m[1];
                if (su) su.value = m[2].toLowerCase();
            }
        }

        // contrato mínimo (mensual)
        const cmin = lines.some(l => /Contrato mínimo de 12 meses/i.test(l));
        const chkC = document.getElementById('tc_contrato_min');
        if (chkC) chkC.checked = cmin;

        // extras = todo lo que no sea de las reglas conocidas
        const known = [
            /^Forma de pago:/i,
            /^Tiempo de validez/i,
            /^Garantía:/i,
            /^El precio total/i,
            /^Soporte técnico post venta:/i,
            /^Contrato mínimo de 12 meses/i,
        ];

        lines.forEach(l => {
            const isKnown = known.some(r => r.test(l));
            if (!isKnown) tcAddExtra(l);
        });

        // aplicar porcentaje + vencimiento + sync
        tcOnPctChange();
        tcOnValidezChange();
        tcSyncToTextarea();
    }

    // Hook para cuando cambias el tipo (desde tu selectTipo)
    function tcOnTipoChange(tipo) {
        tcApplyDefaultsByTipo(tipo);
    }

    // Init
    document.addEventListener('DOMContentLoaded', () => {
        // 1) Cargar builder desde textarea si ya hay datos (edit)
        tcLoadFromTextarea();

        // 2) Si no hay nada, aplicar defaults según tipo actual
        const out = document.getElementById('terminos_text');
        if (out && String(out.value || '').trim().length === 0) {
            tcApplyDefaultsByTipo(tcGetTipo());
        }

        // 3) Si cambia fecha_emision manualmente, recalcula vencimiento
        const fe = document.querySelector('input[name="fecha_emision"]');
        if (fe) fe.addEventListener('input', tcOnValidezChange);

        // 4) Si cambia modo pago, refresca UI
        const pm = document.getElementById('tc_pago_modo');
        if (pm) pm.addEventListener('change', tcOnPctChange);

        // visibilidad mensual al inicio
        tcUpdateMensualVisibility();
    });
    // =========================
    // PASO 3: enviar T&C como array (terminos_condiciones_json[])
    // =========================
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('form.ui-form');
        if (!form) return;

        form.addEventListener('submit', () => {
            const wrap = document.getElementById('tc-hidden');
            const txt = document.getElementById('terminos_text')?.value || '';

            if (!wrap) return;

            wrap.innerHTML = '';

            txt.split('\n')
                .map(l => l.trim())
                .filter(Boolean)
                .forEach(line => {
                    const inp = document.createElement('input');
                    inp.type = 'hidden';
                    inp.name = 'terminos_condiciones_json[]';
                    inp.value = line;
                    wrap.appendChild(inp);
                });
        });
    });
</script>
