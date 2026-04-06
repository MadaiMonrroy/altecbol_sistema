@php
    $isEdit = isset($categoria) && $categoria->exists;
    $estadoPreview = old('estado', $categoria->estado ?? 'activo');
@endphp

<div class="grid grid-cols-1 2xl:grid-cols-12 gap-6">

    {{-- COLUMNA PRINCIPAL --}}
    <div class="2xl:col-span-8 space-y-6">

        {{-- BLOQUE: INFORMACIÓN GENERAL --}}
        <div class="rounded-2xl p-6 shadow-sm"
            style="background-color: var(--bg-surface); border: 1px solid var(--border-color);">

            <div class="flex items-start justify-between gap-4 mb-6">
                <div class="max-w-2xl">
                    <h3 class="text-lg font-semibold text-[var(--text-main)]">
                        Información general
                    </h3>
                    <p class="text-sm mt-1 ui-muted leading-6">
                        Define el nombre y la descripción de la categoría para organizar mejor tu catálogo y mantener una estructura clara dentro del sistema.
                    </p>
                </div>

                <div class="hidden md:flex items-center justify-center w-12 h-12 rounded-2xl shrink-0"
                    style="background-color: color-mix(in srgb, var(--accent) 14%, transparent); color: var(--accent);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6.75A2.25 2.25 0 0 1 6.25 4.5h11.5A2.25 2.25 0 0 1 20 6.75v10.5A2.25 2.25 0 0 1 17.75 19.5H6.25A2.25 2.25 0 0 1 4 17.25V6.75Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 9h8M8 12h5M8 15h7" />
                    </svg>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-12 gap-5">
                {{-- Nombre --}}
                <div class="xl:col-span-8">
                    <label for="nombre" class="block text-sm font-medium mb-2 text-[var(--text-main)]">
                        Nombre de la categoría <span style="color:#ef4444;">*</span>
                    </label>

                    <input
                        type="text"
                        name="nombre"
                        id="nombre"
                        value="{{ old('nombre', $categoria->nombre ?? '') }}"
                        class="ui-input w-full @error('nombre') !border-red-500 @enderror"
                        placeholder="Ej: Redes, Cámaras, Accesorios..."
                        maxlength="150"
                        required
                    >

                    @error('nombre')
                        <p class="mt-2 text-sm" style="color:#ef4444;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Estado --}}
                <div class="xl:col-span-4">
                    <label for="estado" class="block text-sm font-medium mb-2 text-[var(--text-main)]">
                        Estado <span style="color:#ef4444;">*</span>
                    </label>

                    <select
                        name="estado"
                        id="estado"
                        class="ui-input w-full @error('estado') !border-red-500 @enderror"
                        required
                    >
                        <option value="activo" {{ $estadoPreview === 'activo' ? 'selected' : '' }}>
                            Activo
                        </option>
                        <option value="inactivo" {{ $estadoPreview === 'inactivo' ? 'selected' : '' }}>
                            Inactivo
                        </option>
                    </select>

                    @error('estado')
                        <p class="mt-2 text-sm" style="color:#ef4444;">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Descripción --}}
            <div class="mt-5">
                <label for="descripcion" class="block text-sm font-medium mb-2 text-[var(--text-main)]">
                    Descripción
                </label>

                <textarea
                    name="descripcion"
                    id="descripcion"
                    rows="8"
                    class="ui-input w-full resize-none @error('descripcion') !border-red-500 @enderror"
                    placeholder="Agrega una breve descripción para identificar mejor esta categoría dentro del sistema..."
                >{{ old('descripcion', $categoria->descripcion ?? '') }}</textarea>

                @error('descripcion')
                    <p class="mt-2 text-sm" style="color:#ef4444;">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- COLUMNA LATERAL --}}
    <div class="2xl:col-span-4 space-y-6">

        {{-- BLOQUE: RESUMEN --}}
        <div class="rounded-2xl p-6 shadow-sm"
            style="background-color: var(--bg-surface); border: 1px solid var(--border-color);">

            <h3 class="text-base font-semibold text-[var(--text-main)] mb-4">
                Resumen
            </h3>

            <div class="space-y-4">
                <div class="rounded-xl p-4"
                    style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                    <div class="text-xs uppercase tracking-wide ui-muted mb-2">
                        Tipo de registro
                    </div>
                    <div class="font-semibold text-[var(--text-main)]">
                        Categoría de producto
                    </div>
                </div>

                <div class="rounded-xl p-4"
                    style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                    <div class="text-xs uppercase tracking-wide ui-muted mb-2">
                        Estado seleccionado
                    </div>

                    <div class="flex items-center gap-2">
                        <span id="estado-badge"
                            class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold"
                            style="{{ $estadoPreview === 'activo'
                                ? 'background-color: color-mix(in srgb, var(--accent) 18%, transparent); color: var(--accent);'
                                : 'background-color: color-mix(in srgb, #ef4444 16%, transparent); color: #dc2626;' }}">
                            {{ ucfirst($estadoPreview) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- BLOQUE: ACCIONES --}}
        <div class="rounded-2xl p-6 shadow-sm"
            style="background-color: var(--bg-surface); border: 1px solid var(--border-color);">

            <h3 class="text-base font-semibold text-[var(--text-main)] mb-4">
                Acciones
            </h3>

            <div class="flex flex-col gap-3">
                <button type="submit" class="ui-btn-primary w-full justify-center">
                    {{ $isEdit ? 'Actualizar categoría' : 'Guardar categoría' }}
                </button>

                <a href="{{ route('admin.productos.categorias.index') }}"
                    class="ui-btn w-full text-center justify-center">
                    Cancelar
                </a>
            </div>
        </div>

        {{-- BLOQUE: AYUDA --}}
        <div class="rounded-2xl p-5"
            style="background-color: color-mix(in srgb, var(--accent) 8%, transparent); border: 1px dashed color-mix(in srgb, var(--accent) 25%, transparent);">

            <div class="flex items-start gap-3">
                <div class="mt-0.5 shrink-0" style="color: var(--accent);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M11.25 9.75h1.5v5.25h-1.5V9.75Zm0-3h1.5v1.5h-1.5v-1.5Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>

                <div>
                    <p class="text-sm font-medium text-[var(--text-main)] mb-1">
                        Recomendación
                    </p>
                    <p class="text-sm ui-muted leading-6">
                        Usa nombres claros y cortos para que la clasificación de productos sea más fácil de entender en el panel y en la tienda.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const estado = document.getElementById('estado');
        const estadoBadge = document.getElementById('estado-badge');

        if (estado && estadoBadge) {
            const renderEstado = () => {
                const value = estado.value;

                estadoBadge.textContent = value === 'inactivo' ? 'Inactivo' : 'Activo';

                if (value === 'inactivo') {
                    estadoBadge.style.backgroundColor = 'rgba(239, 68, 68, 0.16)';
                    estadoBadge.style.color = '#dc2626';
                } else {
                    estadoBadge.style.backgroundColor = 'rgba(59, 130, 246, 0.16)';
                    estadoBadge.style.color = 'var(--accent)';
                }
            };

            estado.addEventListener('change', renderEstado);
            renderEstado();
        }
    });
</script>