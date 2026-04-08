@php
    $isEdit = isset($marca) && $marca->exists;

    $imagenActual = null;
    if (!empty($marca?->imagen)) {
        $imagenActual = asset('storage/' . $marca->imagen);
    }

    $estadoPreview = old('estado', $marca->estado ?? 'activo');
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
                        Información de la marca
                    </h3>
                    <p class="text-sm mt-1 ui-muted leading-6">
                        Registra la información principal y el logo de la marca para mantener un catálogo más visual,
                        ordenado y fácil de administrar.
                    </p>
                </div>

                <div class="hidden md:flex items-center justify-center w-12 h-12 rounded-2xl shrink-0"
                    style="background-color: color-mix(in srgb, var(--accent) 14%, transparent); color: var(--accent);">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75A2.25 2.25 0 0 1 6 4.5h12a2.25 2.25 0 0 1 2.25 2.25v10.5A2.25 2.25 0 0 1 18 19.5H6a2.25 2.25 0 0 1-2.25-2.25V6.75Z" />
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m3.75 15 4.72-4.72a1.5 1.5 0 0 1 2.12 0l1.41 1.41a1.5 1.5 0 0 0 2.12 0l2.6-2.6a1.5 1.5 0 0 1 2.12 0L20.25 10.5" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 8.25h.008v.008H8.25V8.25Z" />
                    </svg>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-12 gap-5">
                {{-- Nombre --}}
                <div class="xl:col-span-8">
                    <label for="nombre" class="block text-sm font-medium mb-2 text-[var(--text-main)]">
                        Nombre de la marca <span style="color:#ef4444;">*</span>
                    </label>

                    <input
                        type="text"
                        name="nombre"
                        id="nombre"
                        value="{{ old('nombre', $marca->nombre ?? '') }}"
                        class="ui-input w-full @error('nombre') !border-red-500 @enderror"
                        placeholder="Ej: MikroTik, Hikvision, Dell..."
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
                    rows="6"
                    class="ui-input w-full resize-none @error('descripcion') !border-red-500 @enderror"
                    placeholder="Agrega una descripción breve de la marca, línea de productos o referencias internas..."
                >{{ old('descripcion', $marca->descripcion ?? '') }}</textarea>

                @error('descripcion')
                    <p class="mt-2 text-sm" style="color:#ef4444;">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- BLOQUE: IMAGEN / LOGO --}}
        <div class="rounded-2xl p-6 shadow-sm"
            style="background-color: var(--bg-surface); border: 1px solid var(--border-color);">

            <div class="mb-6">
                <h3 class="text-lg font-semibold text-[var(--text-main)]">
                    Logo o imagen de marca
                </h3>
                <p class="text-sm mt-1 ui-muted leading-6">
                    Sube una imagen representativa. Se recomienda una imagen limpia, centrada y en buen formato para que se vea bien en el panel y en la tienda.
                </p>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 items-start">

                {{-- Preview --}}
                <div class="xl:col-span-5">
                    <div class="rounded-2xl p-4 h-full"
                        style="background-color: var(--bg-card); border: 1px dashed var(--border-color);">

                        <div class="aspect-[4/3] rounded-2xl overflow-hidden flex items-center justify-center"
                            style="background-color: var(--bg-surface); border: 1px solid var(--border-color);">
                            <img
                                id="preview-marca"
                                src="{{ $imagenActual ?? asset('images/no-image.png') }}"
                                alt="Vista previa"
                                class="w-full h-full object-contain {{ $imagenActual ? '' : 'opacity-60' }}"
                            >
                        </div>

                        <p class="text-xs ui-muted mt-3 text-center">
                            Vista previa del logo
                        </p>
                    </div>
                </div>

                {{-- Campo y ayuda --}}
                <div class="xl:col-span-7 space-y-4">
                    <div>
                        <label for="imagen" class="block text-sm font-medium mb-2 text-[var(--text-main)]">
                            Seleccionar imagen
                        </label>

                        <input
                            type="file"
                            name="imagen"
                            id="imagen"
                            accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                            class="ui-input w-full file:mr-4 file:rounded-xl file:border-0 file:px-4 file:py-2 file:text-sm file:font-medium"
                        >

                        @error('imagen')
                            <p class="mt-2 text-sm" style="color:#ef4444;">{{ $message }}</p>
                        @enderror

                        @if ($isEdit && $imagenActual)
                            <p class="text-xs ui-muted mt-3">
                                Si subes una nueva imagen, reemplazará la actual.
                            </p>
                        @endif
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="rounded-xl p-4 min-h-[110px]"
                            style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                            <div class="text-xs uppercase tracking-wide ui-muted mb-2">
                                Formatos permitidos
                            </div>
                            <div class="text-sm text-[var(--text-main)] leading-6">
                                JPG, PNG y WEBP
                            </div>
                        </div>

                        <div class="rounded-xl p-4 min-h-[110px]"
                            style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                            <div class="text-xs uppercase tracking-wide ui-muted mb-2">
                                Tamaño sugerido
                            </div>
                            <div class="text-sm text-[var(--text-main)] leading-6">
                                Imagen cuadrada o con fondo limpio
                            </div>
                        </div>
                    </div>

                    <div class="rounded-xl p-4"
                        style="background-color: color-mix(in srgb, var(--accent) 8%, transparent); border: 1px dashed color-mix(in srgb, var(--accent) 25%, transparent);">
                        <p class="text-sm ui-muted leading-6">
                            Usa preferentemente un logo con buen contraste, márgenes equilibrados y sin mucho texto para que la vista previa se vea mejor.
                        </p>
                    </div>
                </div>
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
                        Marca de producto
                    </div>
                </div>

                <div class="rounded-xl p-4"
                    style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                    <div class="text-xs uppercase tracking-wide ui-muted mb-2">
                        Estado seleccionado
                    </div>

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

        {{-- BLOQUE: ACCIONES --}}
        <div class="rounded-2xl p-6 shadow-sm"
            style="background-color: var(--bg-surface); border: 1px solid var(--border-color);">

            <h3 class="text-base font-semibold text-[var(--text-main)] mb-4">
                Acciones
            </h3>

            <div class="flex flex-col gap-3">
                <button type="submit" class="ui-btn-primary w-full justify-center">
                    {{ $isEdit ? 'Actualizar marca' : 'Guardar marca' }}
                </button>

                <a href="{{ route('admin.productos.marcas.index') }}"
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
                        Usa logos nítidos y nombres uniformes para que las marcas se vean bien tanto en el panel como en la tienda.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('imagen');
        const preview = document.getElementById('preview-marca');
        const estado = document.getElementById('estado');
        const estadoBadge = document.getElementById('estado-badge');

        if (input && preview) {
            input.addEventListener('change', function (e) {
                const file = e.target.files && e.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = function (event) {
                    preview.src = event.target.result;
                    preview.classList.remove('opacity-60');
                };
                reader.readAsDataURL(file);
            });
        }

        if (estado && estadoBadge) {
            const renderEstado = () => {
                const value = estado.value;

                estadoBadge.textContent = value === 'inactivo' ? 'Inactivo' : 'Activo';

                if (value === 'inactivo') {
                    estadoBadge.style.backgroundColor = 'color-mix(in srgb, #ef4444 16%, transparent)';
                    estadoBadge.style.color = '#dc2626';
                } else {
                    estadoBadge.style.backgroundColor = 'color-mix(in srgb, var(--accent) 18%, transparent)';
                    estadoBadge.style.color = 'var(--accent)';
                }
            };

            estado.addEventListener('change', renderEstado);
            renderEstado();
        }
    });
</script>