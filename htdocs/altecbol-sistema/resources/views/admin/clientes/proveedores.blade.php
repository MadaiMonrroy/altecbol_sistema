<x-app-layout>
    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.clientes.index') }}"
                class="ui-btn inline-flex items-center gap-2 ui-text opacity-80 hover:opacity-100">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m15 19-7-7 7-7" />
                </svg>
                Volver
            </a>

            <h2 class="font-semibold text-xl ui-text">
                Proveedores de Internet
            </h2>
        </div>
    </x-slot>

    {{-- CONTENT --}}
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                {{-- FORMULARIO (IZQUIERDA) --}}
                <div class="ui-form-card">
                    <h3 class="text-lg font-semibold mb-4 ui-text">
                        {{ isset($proveedorEdit) ? 'Editar proveedor' : 'Nuevo proveedor' }}
                    </h3>

                    <form method="POST"
                        action="{{ isset($proveedorEdit)
                            ? route('admin.clientes.proveedores.update', $proveedorEdit->id)
                            : route('admin.clientes.proveedores.store') }}"
                        class="ui-form">
                        @csrf
                        @if (isset($proveedorEdit))
                            @method('PUT')
                        @endif

                        <input type="hidden" name="cliente_id" value="{{ $clienteId }}">

                        <div class="ui-field">
                            <label class="ui-label">Código servicio *</label>
                            <input name="codigo_servicio"
                                value="{{ old('codigo_servicio', $proveedorEdit->codigo_servicio ?? '') }}"
                                class="ui-input" required>
                        </div>

                        <div class="ui-field">
                            <label class="ui-label">Alias servicio</label>
                            <input name="alias_servicio"
                                value="{{ old('alias_servicio', $proveedorEdit->alias_servicio ?? '') }}"
                                class="ui-input">
                        </div>

                        <div class="ui-field">
                            <label class="ui-label">Tipo servicio *</label>
                            <select name="tipo_servicio" class="ui-input" required>
                                @foreach (['business', 'hogar', 'otro'] as $t)
                                    <option value="{{ $t }}" @selected(old('tipo_servicio', $proveedorEdit->tipo_servicio ?? 'business') === $t)>
                                        {{ ucfirst($t) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="ui-field">
                            <label class="ui-label">Dirección instalación</label>
                            <input name="direccion_instalacion"
                                value="{{ old('direccion_instalacion', $proveedorEdit->direccion_instalacion ?? '') }}"
                                class="ui-input">
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div class="ui-field">
                                <label class="ui-label">Ciudad</label>
                                <input name="ciudad" value="{{ old('ciudad', $proveedorEdit->ciudad ?? '') }}"
                                    class="ui-input">
                            </div>
                            <div class="ui-field">
                                <label class="ui-label">Departamento</label>
                                <input name="departamento"
                                    value="{{ old('departamento', $proveedorEdit->departamento ?? '') }}"
                                    class="ui-input">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div class="ui-field">
                                <label class="ui-label">Down (Mbps)</label>
                                <input type="number" name="ancho_banda_down_mbps"
                                    value="{{ old('ancho_banda_down_mbps', $proveedorEdit->ancho_banda_down_mbps ?? '') }}"
                                    class="ui-input">
                            </div>
                            <div class="ui-field">
                                <label class="ui-label">Up (Mbps)</label>
                                <input type="number" name="ancho_banda_up_mbps"
                                    value="{{ old('ancho_banda_up_mbps', $proveedorEdit->ancho_banda_up_mbps ?? '') }}"
                                    class="ui-input">
                            </div>
                        </div>

                        <div class="ui-field">
                            <label class="ui-label">Medio</label>
                            <select name="medio" class="ui-input">
                                @foreach (['fibra', 'coaxial', 'hfc', 'otro'] as $m)
                                    <option value="{{ $m }}" @selected(old('medio', $proveedorEdit->medio ?? '') === $m)>
                                        {{ strtoupper($m) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="ui-field">
                            <label class="ui-label">IP pública</label>
                            <input name="ip_publica" value="{{ old('ip_publica', $proveedorEdit->ip_publica ?? '') }}"
                                class="ui-input">
                        </div>

                        <div class="ui-field">
                            <label class="ui-label">Notas</label>
                            <textarea name="notas" rows="3" class="ui-textarea">{{ old('notas', $proveedorEdit->notas ?? '') }}</textarea>
                        </div>

                        <div class="flex gap-3 pt-4">
                            <button type="submit" class="ui-btn-primary">
                                {{ isset($proveedorEdit) ? 'Actualizar' : 'Guardar' }}
                            </button>

                            @if (isset($proveedorEdit))
                                <a href="{{ route('admin.clientes.proveedores.index', $clienteId) }}" class="ui-btn">
                                    Cancelar
                                </a>
                            @endif
                        </div>
                    </form>
                </div>

                {{-- CARDS (DERECHA) --}}
                <div class="lg:col-span-2">

                    @if ($proveedores->isEmpty())
                        <div class="ui-form-card text-center ui-muted py-16">
                            No hay proveedores de internet registrados.
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach ($proveedores as $p)
                                <div class="ui-form-card">
    {{-- HEADER --}}
    <div class="flex justify-between items-start gap-3">
        <div class="min-w-0">
            <h4 class="font-semibold ui-text truncate">
                {{ $p->alias_servicio ?: $p->codigo_servicio }}
            </h4>

            <div class="mt-1 flex flex-wrap gap-2">
                {{-- TAG: TIPO --}}
                <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold"
                    style="background-color: color-mix(in srgb, var(--accent) 18%, transparent); color: var(--accent);">
                    {{ ucfirst($p->tipo_servicio ?? '-') }}
                </span>

                {{-- TAG: MEDIO --}}
                @php
                    $medio = strtolower((string) ($p->medio ?? ''));
                    $medioLabel = $medio ? strtoupper($medio) : '-';
                    $medioStyle =
                        $medio === 'fibra'
                            ? 'background-color: color-mix(in srgb, #22c55e 18%, transparent); color:#22c55e;'
                            : ($medio === 'hfc' || $medio === 'coaxial'
                                ? 'background-color: color-mix(in srgb, #f59e0b 18%, transparent); color:#f59e0b;'
                                : 'background-color: color-mix(in srgb, #a855f7 18%, transparent); color:#a855f7;');
                @endphp

                <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold"
                    style="{{ $medioStyle }}">
                    {{ $medioLabel }}
                </span>

                {{-- TAG: IP (si existe) --}}
                @if(!empty($p->ip_publica))
                    <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold"
                        style="background-color: color-mix(in srgb, #0ea5e9 18%, transparent); color:#0ea5e9;">
                        IP: {{ $p->ip_publica }}
                    </span>
                @endif
            </div>
        </div>

        {{-- ACCIONES (ICONOS) --}}
        <div class="flex items-center gap-2 shrink-0">
            {{-- EDITAR --}}
            <a href="{{ route('admin.clientes.proveedores.edit', $p->id) }}"
                title="Editar proveedor"
                class="inline-flex items-center justify-center text-blue-600 hover:text-blue-800 transition-colors">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.232 5.232l3.536 3.536M9 11l6.232-6.232a2.5 2.5 0 013.536 3.536L12.536 14.536a4 4 0 01-1.414.94L8 16l.524-3.122a4 4 0 01.94-1.414z" />
                </svg>
            </a>

            {{-- ELIMINAR (ABRE MODAL) --}}
            <button type="button"
                title="Eliminar proveedor"
                onclick="openDeleteModal({{ $p->id }})"
                class="inline-flex items-center justify-center text-red-600 hover:text-red-800 transition-colors">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"
                    aria-hidden="true" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                </svg>
            </button>
        </div>
    </div>

    {{-- BODY --}}
    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm ui-text">

        {{-- VELOCIDAD --}}
        <div class="rounded-lg ui-border p-3"
            style="background-color: color-mix(in srgb, var(--bg-surface) 80%, transparent);">
            <div class="text-xs ui-muted mb-1">Velocidad</div>
            <div class="font-semibold">
                {{ $p->ancho_banda_down_mbps ?? '-' }} ↓
                <span class="ui-muted font-normal">/</span>
                {{ $p->ancho_banda_up_mbps ?? '-' }} ↑ Mbps
            </div>
        </div>

        {{-- CÓDIGO --}}
        <div class="rounded-lg ui-border p-3"
            style="background-color: color-mix(in srgb, var(--bg-surface) 80%, transparent);">
            <div class="text-xs ui-muted mb-1">Código servicio</div>
            <div class="font-semibold break-words">
                {{ $p->codigo_servicio ?? '-' }}
            </div>
        </div>

        {{-- UBICACIÓN --}}
        <div class="sm:col-span-2 rounded-lg ui-border p-3"
            style="background-color: color-mix(in srgb, var(--bg-surface) 80%, transparent);">
            <div class="text-xs ui-muted mb-1">Ubicación</div>
            <div class="font-semibold">
                {{ $p->ciudad ?? '-' }}{{ $p->departamento ? ' / ' . $p->departamento : '' }}
            </div>
        </div>

        {{-- DIRECCIÓN --}}
        <div class="sm:col-span-2 rounded-lg ui-border p-3"
            style="background-color: color-mix(in srgb, var(--bg-surface) 80%, transparent);">
            <div class="text-xs ui-muted mb-1">Dirección instalación</div>
            <div class="font-semibold">
                {{ $p->direccion_instalacion ?? '-' }}
            </div>
        </div>

        {{-- NOTAS --}}
        <div class="sm:col-span-2 rounded-lg ui-border p-3"
            style="background-color: color-mix(in srgb, var(--bg-surface) 80%, transparent);">
            <div class="text-xs ui-muted mb-1">Notas</div>
            @if(!empty($p->notas))
                <div class="ui-text">
                    {{ $p->notas }}
                </div>
            @else
                <div class="ui-muted">-</div>
            @endif
        </div>
    </div>

    {{-- FORM OCULTO PARA ELIMINAR --}}
    <form id="delete-form-{{ $p->id }}" method="POST"
        action="{{ route('admin.clientes.proveedores.destroy', $p->id) }}" class="hidden">
        @csrf
        @method('DELETE')
    </form>

    {{-- MODAL CONFIRMAR ELIMINAR --}}
    <dialog id="delete-modal-{{ $p->id }}" class="ui-modal ui-shadow p-0"
        onclick="if(event.target === this) this.close()">
        <div class="p-6">
            <h3 class="text-lg font-semibold" style="color: var(--text-main);">
                Confirmar eliminación
            </h3>

            <p class="mt-2 text-sm" style="color: var(--text-muted);">
                ¿Deseas eliminar el proveedor:
                <br>
                <span class="font-semibold" style="color: var(--text-main);">
                    {{ $p->alias_servicio ?: $p->codigo_servicio }}
                </span>?
                <br>
                <span class="text-xs ui-muted">Esta acción no se puede deshacer.</span>
            </p>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" class="ui-btn"
                    onclick="document.getElementById('delete-modal-{{ $p->id }}').close()">
                    Cancelar
                </button>

                <button type="button" class="ui-btn-danger"
                    onclick="submitDelete({{ $p->id }})">
                    Eliminar
                </button>
            </div>
        </div>
    </dialog>
</div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>

    <script>
        function openDeleteModal(id) {
            const modal = document.getElementById(`delete-modal-${id}`);
            if (modal && typeof modal.showModal === 'function') modal.showModal();
        }

        function submitDelete(id) {
            const modal = document.getElementById(`delete-modal-${id}`);
            if (modal) modal.close();

            const form = document.getElementById(`delete-form-${id}`);
            if (form) form.submit();
        }
    </script>
</x-app-layout>
