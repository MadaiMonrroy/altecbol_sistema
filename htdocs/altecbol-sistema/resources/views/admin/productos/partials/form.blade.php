@php
    $isEdit = isset($producto);

    $productoNombre = old('nombre', $producto->nombre ?? '');
    $productoCodigo = old('codigo', $producto->codigo ?? '');
    $productoSku = old('sku', $producto->sku ?? '');
    $productoDescripcion = old('descripcion', $producto->descripcion ?? '');
    $productoCaracteristicas = old('caracteristicas', $producto->caracteristicas ?? '');
    $productoGarantia = old('garantia', $producto->garantia ?? '');
    $productoPrecio = old('precio', $producto->precio ?? '');
    $productoPrecioOferta = old('precio_oferta', $producto->precio_oferta ?? '');
    $productoStock = old('stock', $producto->stock ?? 0);
    $productoCategoria = old('categoria_id', $producto->categoria_id ?? '');
    $productoMarca = old('marca_id', $producto->marca_id ?? '');
    $productoEstadoPublicacion = old('estado_publicacion', $producto->estado_publicacion ?? 'activo');
    $productoEstadoStock = old('estado_stock', $producto->estado_stock ?? 'disponible');
    $productoEsOferta = old('es_oferta', $producto->es_oferta ?? false);

    $marcaActual = collect($marcas ?? [])->firstWhere('id', (int) $productoMarca);
    $marcaActualNombre = $marcaActual->nombre ?? 'Marca';
    $marcaActualLogo = $marcaActual->imagen_url ?? asset('images/no-brand.png');

    $categoriaActual = collect($categorias ?? [])->firstWhere('id', (int) $productoCategoria);
    $categoriaActualNombre = $categoriaActual->nombre ?? 'Categoría';

    $imgPrincipal1 = $isEdit && isset($producto->imagenesPrincipales) ? $producto->imagenesPrincipales->get(0) : null;
    $imgPrincipal2 = $isEdit && isset($producto->imagenesPrincipales) ? $producto->imagenesPrincipales->get(1) : null;
    $secundarias = $isEdit && isset($producto->imagenesSecundarias) ? $producto->imagenesSecundarias : collect();

    $publicacionLabel = match ($productoEstadoPublicacion) {
        'activo' => 'Activo',
        'inactivo' => 'Inactivo',
        'borrador' => 'Borrador',
        default => 'Publicación',
    };

    $stockLabel = match ($productoEstadoStock) {
        'disponible' => 'Disponible',
        'agotado' => 'Agotado',
        'consultar_stock' => 'Consultar stock',
        default => 'Stock',
    };
@endphp

@if ($errors->any())
    <div class="mb-5 rounded-xl px-4 py-3 text-sm"
        style="background-color: color-mix(in srgb, #ef4444 10%, transparent); border: 1px solid color-mix(in srgb, #ef4444 30%, transparent); color: var(--text-main);">
        <div class="font-semibold mb-2">Se encontraron errores:</div>
        <ul class="list-disc pl-5 space-y-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 xl:grid-cols-[minmax(0,1.08fr)_460px] gap-6 items-start">

    {{-- FORMULARIO --}}
    <div class="space-y-5">

        {{-- INFORMACIÓN PRINCIPAL --}}
        <div class="rounded-2xl p-5" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
            <div class="mb-5">
                <h3 class="text-base font-semibold text-[var(--text-main)]">Información principal</h3>
                <p class="text-sm ui-muted mt-1">Completa los datos base del producto.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">

                {{-- CATEGORÍA CUSTOM --}}
                <div class="w-full relative">
                    <label class="block text-sm font-medium mb-2 text-[var(--text-main)]">
                        Categoría <span class="text-red-500">*</span>
                    </label>

                    <input type="hidden" name="categoria_id" id="categoria_id" value="{{ $productoCategoria }}">

                    <button type="button" data-dropdown-toggle="categoria-dd"
                        class="ui-input w-full lg:h-11 flex items-center justify-between gap-2">
                        <span
                            class="inline-flex items-center gap-2 min-w-0 transition {{ $productoCategoria ? 'opacity-100 text-slate-800 dark:text-white' : 'opacity-60 text-slate-500 dark:text-white dark:opacity-50' }}">
                            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
                            </svg>
                            <span id="categoria-label" class="truncate">{{ $categoriaActualNombre }}</span>
                        </span>
                        <svg class="w-4 h-4 ui-muted shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="categoria-dd"
                        class="hidden absolute left-0 top-full mt-2 z-20 min-w-full w-max rounded-lg ui-shadow ui-border"
                        style="background-color: var(--bg-surface);">
                        <ul class="py-1 text-sm ui-text max-h-72 overflow-auto">
                            @foreach ($categorias as $cat)
                                <li>
                                    <button type="button"
                                        class="w-full flex items-center gap-3 px-4 py-2 transition text-left"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setCustomSelect('categoria_id', '{{ $cat->id }}', '{{ e($cat->nombre) }}', 'categoria-label')">
                                        {{ $cat->nombre }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- MARCA CUSTOM --}}
                <div class="w-full relative">
                    <label class="block text-sm font-medium mb-2 text-[var(--text-main)]">
                        Marca
                    </label>

                    <input type="hidden" name="marca_id" id="marca_id" value="{{ $productoMarca }}">

                    <button type="button" data-dropdown-toggle="marca-dd"
                        class="ui-input w-full lg:h-11 flex items-center justify-between gap-2">
                        <span
                            class="inline-flex items-center gap-2 min-w-0 transition {{ $productoMarca ? 'opacity-100 text-slate-800 dark:text-white' : 'opacity-60 text-slate-500 dark:text-white dark:opacity-50' }}">
                            <img id="marca-btn-logo" src="{{ $marcaActualLogo }}" alt="logo"
                                class="w-5 h-5 rounded object-contain bg-white/80 p-[1px]">
                            <span id="marca-label" class="truncate">{{ $marcaActualNombre }}</span>
                        </span>
                        <svg class="w-4 h-4 ui-muted shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="marca-dd"
                        class="hidden absolute left-0 top-full mt-2 z-20 min-w-full w-max rounded-lg ui-shadow ui-border"
                        style="background-color: var(--bg-surface);">
                        <ul class="py-1 text-sm ui-text max-h-72 overflow-auto">
                            @foreach ($marcas as $marca)
                                <li>
                                    <button type="button"
                                        class="w-full flex items-center gap-3 px-4 py-2 transition text-left"
                                        style="border-radius:.5rem;"
                                        onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                        onmouseout="this.style.backgroundColor='transparent'"
                                        onclick="setMarcaSelect('{{ $marca->id }}', '{{ e($marca->nombre) }}', '{{ $marca->imagen_url ?? asset('images/no-brand.png') }}')">
                                        <img src="{{ $marca->imagen_url ?? asset('images/no-brand.png') }}"
                                            class="w-6 h-6 rounded object-contain bg-white/80 p-[2px]" alt="logo">
                                        <span>{{ $marca->nombre }}</span>
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2 text-[var(--text-main)]">
                        Garantía
                    </label>
                    <input type="text" name="garantia" id="garantia" class="ui-input w-full"
                        value="{{ $productoGarantia }}" maxlength="100" placeholder="Ej. 12 meses">
                </div>

                <div class="md:col-span-2 xl:col-span-3">
                    <label class="block text-sm font-medium mb-2 text-[var(--text-main)]">
                        Nombre del producto <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nombre" id="nombre" class="ui-input w-full"
                        value="{{ $productoNombre }}" required maxlength="180"
                        placeholder="Ej. Brazo de barrera para IPMECD-0161-R">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2 text-[var(--text-main)]">
                        Código <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="codigo" id="codigo" class="ui-input w-full"
                        value="{{ $productoCodigo }}" required maxlength="100" placeholder="Ej. IPMECD-0161-M2020">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2 text-[var(--text-main)]">
                        SKU
                    </label>
                    <input type="text" name="sku" id="sku" class="ui-input w-full"
                        value="{{ $productoSku }}" maxlength="100" placeholder="Opcional">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2 text-[var(--text-main)]">
                        Stock <span class="text-red-500">*</span>
                    </label>
                    <input type="number" name="stock" id="stock" class="ui-input w-full"
                        value="{{ $productoStock }}" min="0" required>
                </div>
            </div>
        </div>

        {{-- PRECIO Y ESTADO --}}
        <div class="rounded-2xl p-5" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
            <div class="mb-5">
                <h3 class="text-base font-semibold text-[var(--text-main)]">Precio y estado</h3>
                <p class="text-sm ui-muted mt-1">Configura visibilidad comercial del producto.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                <div>
                    <label class="block text-sm font-medium mb-2 text-[var(--text-main)]">
                        Precio <span class="text-red-500">*</span>
                    </label>
                    <input type="number" step="0.01" min="0" name="precio" id="precio"
                        class="ui-input w-full" value="{{ $productoPrecio }}" required>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2 text-[var(--text-main)]">
                        Precio oferta
                    </label>
                    <input type="number" step="0.01" min="0" name="precio_oferta" id="precio_oferta"
                        class="ui-input w-full" value="{{ $productoPrecioOferta }}" placeholder="Opcional">
                </div>

                {{-- PUBLICACIÓN CUSTOM --}}
                <div class="w-full relative">
                    <label class="block text-sm font-medium mb-2 text-[var(--text-main)]">
                        Estado publicación <span class="text-red-500">*</span>
                    </label>

                    <input type="hidden" name="estado_publicacion" id="estado_publicacion"
                        value="{{ $productoEstadoPublicacion }}">

                    <button type="button" data-dropdown-toggle="estado-publicacion-dd"
                        class="ui-input w-full lg:h-11 flex items-center justify-between gap-2">
                        <span class="inline-flex items-center gap-2 min-w-0 transition">
                            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
                            </svg>
                            <span id="estado-publicacion-label" class="truncate">{{ $publicacionLabel }}</span>
                        </span>
                        <svg class="w-4 h-4 ui-muted shrink-0" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="estado-publicacion-dd"
                        class="hidden absolute left-0 top-full mt-2 z-20 min-w-full w-max rounded-lg ui-shadow ui-border"
                        style="background-color: var(--bg-surface);">
                        <ul class="py-1 text-sm ui-text">
                            <li><button type="button" class="w-full px-4 py-2 text-left transition"
                                    style="border-radius:.5rem;"
                                    onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                    onmouseout="this.style.backgroundColor='transparent'"
                                    onclick="setCustomSelect('estado_publicacion','activo','Activo','estado-publicacion-label');updatePreview()">Activo</button>
                            </li>
                            <li><button type="button" class="w-full px-4 py-2 text-left transition"
                                    style="border-radius:.5rem;"
                                    onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                    onmouseout="this.style.backgroundColor='transparent'"
                                    onclick="setCustomSelect('estado_publicacion','inactivo','Inactivo','estado-publicacion-label');updatePreview()">Inactivo</button>
                            </li>
                            <li><button type="button" class="w-full px-4 py-2 text-left transition"
                                    style="border-radius:.5rem;"
                                    onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                    onmouseout="this.style.backgroundColor='transparent'"
                                    onclick="setCustomSelect('estado_publicacion','borrador','Borrador','estado-publicacion-label');updatePreview()">Borrador</button>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- STOCK CUSTOM --}}
                <div class="w-full relative">
                    <label class="block text-sm font-medium mb-2 text-[var(--text-main)]">
                        Estado stock <span class="text-red-500">*</span>
                    </label>

                    <input type="hidden" name="estado_stock" id="estado_stock" value="{{ $productoEstadoStock }}">

                    <button type="button" data-dropdown-toggle="estado-stock-dd"
                        class="ui-input w-full lg:h-11 flex items-center justify-between gap-2">
                        <span class="inline-flex items-center gap-2 min-w-0 transition">
                            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 4h18l-7 8v6l-4 2v-8L3 4z" />
                            </svg>
                            <span id="estado-stock-label" class="truncate">{{ $stockLabel }}</span>
                        </span>
                        <svg class="w-4 h-4 ui-muted shrink-0" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div id="estado-stock-dd"
                        class="hidden absolute left-0 top-full mt-2 z-20 min-w-full w-max rounded-lg ui-shadow ui-border"
                        style="background-color: var(--bg-surface);">
                        <ul class="py-1 text-sm ui-text">
                            <li><button type="button" class="w-full px-4 py-2 text-left transition"
                                    style="border-radius:.5rem;"
                                    onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                    onmouseout="this.style.backgroundColor='transparent'"
                                    onclick="setCustomSelect('estado_stock','disponible','Disponible','estado-stock-label');updatePreview()">Disponible</button>
                            </li>
                            <li><button type="button" class="w-full px-4 py-2 text-left transition"
                                    style="border-radius:.5rem;"
                                    onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                    onmouseout="this.style.backgroundColor='transparent'"
                                    onclick="setCustomSelect('estado_stock','agotado','Agotado','estado-stock-label');updatePreview()">Agotado</button>
                            </li>
                            <li><button type="button" class="w-full px-4 py-2 text-left transition"
                                    style="border-radius:.5rem;"
                                    onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                    onmouseout="this.style.backgroundColor='transparent'"
                                    onclick="setCustomSelect('estado_stock','consultar_stock','Consultar stock','estado-stock-label');updatePreview()">Consultar
                                    stock</button></li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>

        {{-- CONTENIDO --}}
        <div class="rounded-2xl p-5" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
            <div class="mb-5">
                <h3 class="text-base font-semibold text-[var(--text-main)]">Contenido del producto</h3>
                <p class="text-sm ui-muted mt-1">Información descriptiva y técnica.</p>
            </div>

            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-2 text-[var(--text-main)]">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="4" class="ui-input w-full"
                        placeholder="Descripción general del producto...">{{ $productoDescripcion }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-2 text-[var(--text-main)]">Características</label>
                    <textarea name="caracteristicas" id="caracteristicas" rows="5" class="ui-input w-full"
                        placeholder="Características, compatibilidad, medidas, materiales, etc...">{{ $productoCaracteristicas }}</textarea>
                </div>
            </div>
        </div>

        {{-- IMÁGENES --}}
        <div class="rounded-2xl p-5" style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
            <div class="mb-5">
                <h3 class="text-base font-semibold text-[var(--text-main)]">Imágenes del producto</h3>
                <p class="text-sm ui-muted mt-1">
                    Puedes acumular hasta 2 imágenes principales y varias secundarias.
                </p>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">

                {{-- PRINCIPALES --}}
                <div class="space-y-4">
                    <div class="text-sm font-semibold text-[var(--text-main)]">Imágenes principales</div>

                    <label for="imagenes_principales"
                        class="block rounded-2xl border border-dashed p-5 cursor-pointer transition"
                        style="border-color: var(--border-color); background-color: color-mix(in srgb, var(--bg-surface) 70%, transparent);">
                        <div class="text-center">
                            <div class="text-sm font-medium text-[var(--text-main)]">Añadir principales</div>
                            <div class="text-xs ui-muted mt-1">Puedes seleccionar varias veces hasta 2</div>
                        </div>
                        <input type="file" name="imagenes_principales[]" id="imagenes_principales" class="hidden"
                            accept=".jpg,.jpeg,.png,.webp" multiple>
                    </label>

                    <div id="preview-principales-wrapper"
                        class="{{ $isEdit && isset($producto->imagenesPrincipales) && $producto->imagenesPrincipales->count() ? '' : 'hidden' }}">
                        <div id="preview-principales" class="grid grid-cols-2 gap-3"></div>
                    </div>

                    @if ($isEdit && isset($producto->imagenesPrincipales) && $producto->imagenesPrincipales->count())
                        <div class="space-y-3">
                            <div class="text-sm font-medium text-[var(--text-main)]">Principales actuales</div>
                            <div class="grid grid-cols-2 gap-3">
                                @foreach ($producto->imagenesPrincipales as $img)
                                    <div class="rounded-2xl overflow-hidden"
                                        style="border: 1px solid var(--border-color); background-color: var(--bg-surface);">
                                        <div class="aspect-square">
                                            <img src="{{ $img->url }}" alt="Principal"
                                                class="w-full h-full object-cover">
                                        </div>
                                        <div class="p-3">
                                            <label class="inline-flex items-center gap-2 text-sm">
                                                <input type="checkbox" name="eliminar_imagenes[]"
                                                    value="{{ $img->id }}">
                                                <span>Eliminar</span>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                {{-- SECUNDARIAS --}}
                <div class="space-y-4">
                    <div class="text-sm font-semibold text-[var(--text-main)]">Imágenes secundarias</div>

                    <label for="imagenes_secundarias"
                        class="block rounded-2xl border border-dashed p-5 cursor-pointer transition"
                        style="border-color: var(--border-color); background-color: color-mix(in srgb, var(--bg-surface) 70%, transparent);">
                        <div class="text-center">
                            <div class="text-sm font-medium text-[var(--text-main)]">Añadir secundarias</div>
                            <div class="text-xs ui-muted mt-1">Puedes seguir agregando a la galería</div>
                        </div>
                        <input type="file" name="imagenes_secundarias[]" id="imagenes_secundarias" class="hidden"
                            accept=".jpg,.jpeg,.png,.webp" multiple>
                    </label>

                    <div id="preview-secundarias-wrapper"
                        class="{{ $isEdit && isset($producto->imagenesSecundarias) && $producto->imagenesSecundarias->count() ? '' : 'hidden' }}">
                        <div id="preview-secundarias" class="grid grid-cols-3 gap-3"></div>
                    </div>

                    @if ($isEdit && isset($producto->imagenesSecundarias) && $producto->imagenesSecundarias->count())
                        <div class="space-y-3">
                            <div class="text-sm font-medium text-[var(--text-main)]">Secundarias actuales</div>
                            <div class="grid grid-cols-3 gap-3">
                                @foreach ($producto->imagenesSecundarias as $img)
                                    <div class="rounded-2xl overflow-hidden"
                                        style="border: 1px solid var(--border-color); background-color: var(--bg-surface);">
                                        <div class="aspect-square">
                                            <img src="{{ $img->url }}" alt="Secundaria"
                                                class="w-full h-full object-cover">
                                        </div>
                                        <div class="p-3">
                                            <label class="inline-flex items-center gap-2 text-sm">
                                                <input type="checkbox" name="eliminar_imagenes[]"
                                                    value="{{ $img->id }}">
                                                <span>Eliminar</span>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- BOTONES --}}
        <div class="flex flex-wrap justify-end gap-3">
            <a href="{{ route('admin.productos.index') }}" class="ui-btn">Cancelar</a>
            <button type="submit" class="ui-btn-primary">
                {{ $isEdit ? 'Guardar cambios' : 'Registrar producto' }}
            </button>
        </div>
    </div>

    {{-- PREVIEW --}}
    <div class="xl:sticky xl:top-6 h-fit space-y-4">

        {{-- CARD ECOMMERCE --}}
        <div class="rounded-2xl overflow-hidden shadow"
            style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
            <div class="px-5 pt-5 pb-3 border-b" style="border-color: var(--border-color);">
                <h3 class="text-base font-semibold text-[var(--text-main)]">Vista previa card</h3>
                <p class="text-sm ui-muted mt-1">Siempre visible mientras completas el producto.</p>
            </div>

            <div class="p-4">
                <div class="rounded-[18px] overflow-hidden relative"
                    style="background-color: var(--bg-surface); border: 1px solid var(--border-color);">

                    <div class="absolute top-3 left-3 z-10 flex flex-col gap-2">
                        <span id="card-stock-pill"
                            class="inline-flex items-center rounded-md px-2.5 py-1 text-xs font-semibold"
                            style="background-color: rgba(163, 230, 53, .18); color:#84cc16;">
                            Disponible
                        </span>

                        <span id="card-offer-pill"
                            class="hidden inline-flex items-center rounded-md px-2.5 py-1 text-xs font-semibold"
                            style="background-color: rgba(245, 158, 11, .18); color:#f59e0b;">
                            En oferta
                        </span>
                    </div>



                    <div class="relative aspect-[4/4.15] overflow-hidden bg-[#f3f4f6] group">
                        <img id="card-preview-image-1"
                            src="{{ $imgPrincipal1?->url ?? asset('images/no-image.png') }}"
                            class="absolute inset-0 w-full h-full object-cover scale-105 transition duration-500 ease-out opacity-100 group-hover:opacity-0"
                            alt="Imagen principal">

                        <img id="card-preview-image-2"
                            src="{{ $imgPrincipal2?->url ?? ($imgPrincipal1?->url ?? asset('images/no-image.png')) }}"
                            class="absolute inset-0 w-full h-full object-cover scale-105 transition duration-500 ease-out opacity-0 group-hover:opacity-100"
                            alt="Imagen hover">

                        <div id="card-preview-discount"
                            class="hidden absolute top-3 right-3 rounded-md px-2 py-1 text-xs font-bold text-white"
                            style="background-color:#f59e8b;">
                            -0%
                        </div>
                    </div>

                    <div class="p-4">
                        <div class="flex items-center gap-3 mb-2">
                            <img id="card-preview-brand-logo" src="{{ $marcaActualLogo }}"
                                class="h-8 w-auto max-w-[100px] object-contain" alt="Marca">
                        </div>

                        <div id="card-preview-code" class="text-sm ui-muted mb-1">
                            {{ $productoCodigo ?: 'Código' }}
                        </div>

                        <div id="card-preview-name"
                            class="text-[22px] font-bold leading-tight mb-3 text-[var(--text-main)]">
                            {{ $productoNombre ?: 'Nombre del producto' }}
                        </div>

                        <div class="flex items-start justify-between gap-3">
                            <div class="space-y-1">
                                <div id="card-preview-old-price" class="hidden text-sm line-through"
                                    style="color: #94a3b8;">
                                </div>

                                <div id="card-preview-discount-amount" class="hidden text-sm"
                                    style="color: #94a3b8;">
                                </div>

                                <div id="card-preview-price" class="text-3xl font-semibold" style="color: #004DAD;">
                                    {{ $productoPrecio !== '' ? number_format((float) $productoPrecio, 2, '.', ',') : '0.00' }}
                                    Bs
                                </div>
                            </div>

                            <div class="flex flex-col gap-2 shrink-0">

                                <!-- Favorito -->
                                <button type="button"
                                    class="w-10 h-10 rounded-full flex items-center justify-center
               bg-white/90 text-slate-700 shadow-sm
               hover:bg-white hover:scale-105
               dark:bg-slate-800/80 dark:text-slate-200 dark:hover:bg-slate-700
               transition-all duration-200">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m21 8.25c0-2.485-2.015-4.5-4.5-4.5-1.74 0-3.25.99-4 2.436-.75-1.446-2.26-2.436-4-2.436-2.485 0-4.5 2.015-4.5 4.5 0 7.22 8.5 12 8.5 12s8.5-4.78 8.5-12Z" />
                                    </svg>
                                </button>

                                <!-- Compartir -->
                                <button type="button"
                                    class="w-10 h-10 rounded-full flex items-center justify-center
               bg-white/90 text-slate-700 shadow-sm
               hover:bg-white hover:scale-105
               dark:bg-slate-800/80 dark:text-slate-200 dark:hover:bg-slate-700
               transition-all duration-200">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                        stroke-width="1.8">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="M7.926 10.898 15 7.727m-7.074 5.39L15 16.29M8 12a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm12 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm0-11a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                    </svg>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- PREVIEW DETALLE --}}
        <div class="rounded-2xl overflow-hidden shadow"
            style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
            <div class="px-5 pt-5 pb-3 border-b" style="border-color: var(--border-color);">
                <h3 class="text-base font-semibold text-[var(--text-main)]">Vista previa detalle</h3>
                <p class="text-sm ui-muted mt-1">Inspirada en la ficha del producto.</p>
            </div>

            <div class="p-4 space-y-4">
                <div class="rounded-2xl overflow-hidden"
                    style="background-color:#f3f4f6; border: 1px solid var(--border-color);">
                    <div class="aspect-[4/3] relative overflow-hidden group">
                        <img id="detail-preview-image-1"
                            src="{{ $imgPrincipal1?->url ?? asset('images/no-image.png') }}"
                            class="absolute inset-0 w-full h-full object-cover scale-105 transition duration-500 ease-out opacity-100 group-hover:opacity-0"
                            alt="">
                        <img id="detail-preview-image-2"
                            src="{{ $imgPrincipal2?->url ?? ($imgPrincipal1?->url ?? asset('images/no-image.png')) }}"
                            class="absolute inset-0 w-full h-full object-cover scale-105 transition duration-500 ease-out opacity-0 group-hover:opacity-100"
                            alt="">
                    </div>
                </div>

                <div id="detail-secondary-thumbs" class="flex gap-3 overflow-x-auto pb-1">
                    @foreach ($secundarias as $img)
                        <button type="button" class="detail-thumb shrink-0 rounded-xl overflow-hidden"
                            style="width:72px;height:72px;border:1px solid var(--border-color); background-color:#f3f4f6;"
                            data-src="{{ $img->url }}">
                            <img src="{{ $img->url }}" class="w-full h-full object-contain" alt="">
                        </button>
                    @endforeach
                </div>

                <div class="space-y-3">
                    <div class="flex items-start justify-between gap-3">
                        <div class="space-y-3 flex-1">
                            <div class="space-y-1">
                                <div id="detail-preview-old-price" class="hidden text-sm line-through"
                                    style="color:#94a3b8;"></div>
                                <div id="detail-preview-discount-amount" class="hidden text-sm"
                                    style="color:#94a3b8;"></div>
                                <div id="detail-preview-price" class="text-3xl font-semibold" style="color:#004DAD;">
                                    {{ $productoPrecio !== '' ? number_format((float) $productoPrecio, 2, '.', ',') : '0.00' }}
                                    Bs
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col gap-2">
                            <button type="button"
                                class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-200 shadow-sm
               bg-white/85 text-slate-700 hover:bg-white
               dark:bg-slate-800/85 dark:text-slate-200 dark:hover:bg-slate-700">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 8.25c0-2.485-2.015-4.5-4.5-4.5-1.74 0-3.25.99-4 2.436-.75-1.446-2.26-2.436-4-2.436-2.485 0-4.5 2.015-4.5 4.5 0 7.22 8.5 12 8.5 12s8.5-4.78 8.5-12Z" />
                                </svg>
                            </button>

                            <button type="button"
                                class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-200 shadow-sm
               bg-white/85 text-slate-700 hover:bg-white
               dark:bg-slate-800/85 dark:text-slate-200 dark:hover:bg-slate-700">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="1.8">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                d="M7.926 10.898 15 7.727m-7.074 5.39L15 16.29M8 12a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm12 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm0-11a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="space-y-1 text-sm">
                        <div><span class="font-semibold">Código:</span> <span
                                id="detail-preview-code">{{ $productoCodigo ?: '—' }}</span></div>
                        <div><span class="font-semibold">SKU:</span> <span
                                id="detail-preview-sku">{{ $productoSku ?: '—' }}</span></div>
                        <div class="flex items-center gap-2">
                            <span class="font-semibold">Marca:</span>
                            <img id="detail-preview-brand-logo" src="{{ $marcaActualLogo }}"
                                class="h-7 w-auto max-w-[90px] object-contain" alt="Marca">
                        </div>
                    </div>

                    <div class="rounded-xl p-3 text-sm"
                        style="background-color: var(--bg-surface); border: 1px solid var(--border-color);">
                        <div class="font-semibold mb-2 text-[var(--text-main)]">Descripción del Producto</div>
                        <div id="detail-preview-desc" class="ui-muted leading-relaxed">
                            {{ $productoDescripcion ?: 'Aquí se reflejará la descripción del producto mientras completas el formulario.' }}
                        </div>
                    </div>

                    <div class="grid grid-cols-1 gap-2 text-sm">
                        <div class="flex items-center justify-between py-2 border-b"
                            style="border-color: var(--border-color);">
                            <span class="font-semibold">Garantía</span>
                            <span id="detail-preview-garantia">{{ $productoGarantia ?: 'No especificada' }}</span>
                        </div>
                        <div class="flex items-center justify-between py-2">
                            <span class="font-semibold">Stock</span>
                            <span id="detail-preview-stock">{{ $stockLabel }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function setCustomSelect(inputId, value, label, labelId) {
        const input = document.getElementById(inputId);
        if (input) {
            input.value = value;
            input.dispatchEvent(new Event('change', {
                bubbles: true
            }));
            input.dispatchEvent(new Event('input', {
                bubbles: true
            }));
        }

        const labelEl = document.getElementById(labelId);
        if (labelEl) labelEl.textContent = label;
    }

    function setMarcaSelect(value, label, imageUrl) {
        const input = document.getElementById('marca_id');
        if (input) {
            input.value = value;
            input.dispatchEvent(new Event('change', {
                bubbles: true
            }));
            input.dispatchEvent(new Event('input', {
                bubbles: true
            }));
        }

        const labelEl = document.getElementById('marca-label');
        if (labelEl) labelEl.textContent = label;

        const btnLogo = document.getElementById('marca-btn-logo');
        if (btnLogo) btnLogo.src = imageUrl;

        const cardLogo = document.getElementById('card-preview-brand-logo');
        if (cardLogo) cardLogo.src = imageUrl;

        const detailLogo = document.getElementById('detail-preview-brand-logo');
        if (detailLogo) detailLogo.src = imageUrl;
    }

    document.addEventListener('DOMContentLoaded', () => {
        const nombre = document.getElementById('nombre');
        const codigo = document.getElementById('codigo');
        const sku = document.getElementById('sku');
        const descripcion = document.getElementById('descripcion');
        const precio = document.getElementById('precio');
        const precioOferta = document.getElementById('precio_oferta');
        const estadoPublicacion = document.getElementById('estado_publicacion');
        const estadoStock = document.getElementById('estado_stock');

        const marca = document.getElementById('marca_id');
        const garantia = document.getElementById('garantia');

        const inputPrincipales = document.getElementById('imagenes_principales');
        const inputSecundarias = document.getElementById('imagenes_secundarias');

        const previewPrincipalesWrapper = document.getElementById('preview-principales-wrapper');
        const previewPrincipales = document.getElementById('preview-principales');
        const previewSecundariasWrapper = document.getElementById('preview-secundarias-wrapper');
        const previewSecundarias = document.getElementById('preview-secundarias');

        const detailThumbs = document.getElementById('detail-secondary-thumbs');

        let principalFiles = [];
        let secondaryFiles = [];

        const priceColorLight = '#004DAD';
        const priceColorDark = '#00D1CE';

        const getPriceColor = () =>
            document.documentElement.classList.contains('dark') ? priceColorDark : priceColorLight;

        const money = (value) => {
            const num = parseFloat(value || 0);
            if (isNaN(num)) return '0.00 Bs';
            return num.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }) + ' Bs';
        };

        const updateFileInput = (input, files) => {
            const dt = new DataTransfer();
            files.forEach(file => dt.items.add(file));
            input.files = dt.files;
        };

        const renderSelectedFiles = (files, wrapper, container, cols = '2') => {
            container.innerHTML = '';

            if (!files.length) {
                wrapper.classList.add('hidden');
                return;
            }

            wrapper.classList.remove('hidden');

            files.forEach((file, index) => {
                const reader = new FileReader();

                reader.onload = (event) => {
                    const item = document.createElement('div');
                    item.className = 'rounded-2xl overflow-hidden';
                    item.style.border = '1px solid var(--border-color)';
                    item.style.backgroundColor = 'var(--bg-surface)';

                    item.innerHTML = `
                    <div class="aspect-square overflow-hidden">
                        <img src="${event.target.result}" class="w-full h-full object-cover" alt="preview">
                    </div>
                    <div class="p-2 flex items-center justify-between gap-2">
                        <div class="text-xs ui-muted truncate flex-1">${file.name}</div>
                        <button type="button" class="text-xs font-semibold" data-remove-index="${index}" style="color:#ef4444;">Quitar</button>
                    </div>
                `;

                    container.appendChild(item);

                    item.querySelector('[data-remove-index]').addEventListener('click', () => {
                        if (container === previewPrincipales) {
                            principalFiles.splice(index, 1);
                            updateFileInput(inputPrincipales, principalFiles);
                            renderSelectedFiles(principalFiles,
                                previewPrincipalesWrapper, previewPrincipales);
                            syncPrimaryImages();
                        } else {
                            secondaryFiles.splice(index, 1);
                            updateFileInput(inputSecundarias, secondaryFiles);
                            renderSelectedFiles(secondaryFiles,
                                previewSecundariasWrapper, previewSecundarias, '3');
                            syncSecondaryThumbs();
                        }
                    });
                };

                reader.readAsDataURL(file);
            });
        };

        const syncPrimaryImages = () => {
            const img1 = document.getElementById('card-preview-image-1');
            const img2 = document.getElementById('card-preview-image-2');
            const d1 = document.getElementById('detail-preview-image-1');
            const d2 = document.getElementById('detail-preview-image-2');

            const readTo = (file, cb) => {
                const reader = new FileReader();
                reader.onload = e => cb(e.target.result);
                reader.readAsDataURL(file);
            };

            if (principalFiles[0]) {
                readTo(principalFiles[0], src => {
                    if (img1) img1.src = src;
                    if (d1) d1.src = src;
                });
            }

            if (principalFiles[1]) {
                readTo(principalFiles[1], src => {
                    if (img2) img2.src = src;
                    if (d2) d2.src = src;
                });
            } else if (principalFiles[0]) {
                readTo(principalFiles[0], src => {
                    if (img2) img2.src = src;
                    if (d2) d2.src = src;
                });
            }
        };

        const syncSecondaryThumbs = () => {
            if (!detailThumbs) return;

            const existingDynamic = detailThumbs.querySelectorAll('.dynamic-thumb');
            existingDynamic.forEach(el => el.remove());

            secondaryFiles.forEach(file => {
                const reader = new FileReader();
                reader.onload = (e) => {
                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className = 'dynamic-thumb shrink-0 rounded-xl overflow-hidden';
                    btn.style.width = '72px';
                    btn.style.height = '72px';
                    btn.style.border = '1px solid var(--border-color)';
                    btn.style.backgroundColor = '#f3f4f6';
                    btn.innerHTML =
                        `<img src="${e.target.result}" class="w-full h-full object-contain" alt="">`;

                    btn.addEventListener('click', () => {
                        const d1 = document.getElementById('detail-preview-image-1');
                        if (d1) d1.src = e.target.result;
                    });

                    detailThumbs.appendChild(btn);
                };
                reader.readAsDataURL(file);
            });

            detailThumbs.querySelectorAll('.detail-thumb').forEach(btn => {
                btn.addEventListener('click', () => {
                    const src = btn.getAttribute('data-src');
                    const d1 = document.getElementById('detail-preview-image-1');
                    if (d1 && src) d1.src = src;
                });
            });
        };

        if (inputPrincipales) {
            inputPrincipales.addEventListener('change', (e) => {
                const newFiles = Array.from(e.target.files || []);
                const merged = [...principalFiles, ...newFiles].slice(0, 2);
                principalFiles = merged;
                updateFileInput(inputPrincipales, principalFiles);
                renderSelectedFiles(principalFiles, previewPrincipalesWrapper, previewPrincipales);
                syncPrimaryImages();
            });
        }

        if (inputSecundarias) {
            inputSecundarias.addEventListener('change', (e) => {
                const newFiles = Array.from(e.target.files || []);
                secondaryFiles = [...secondaryFiles, ...newFiles];
                updateFileInput(inputSecundarias, secondaryFiles);
                renderSelectedFiles(secondaryFiles, previewSecundariasWrapper, previewSecundarias, '3');
                syncSecondaryThumbs();
            });
        }

        const oldPriceEl = document.getElementById('card-preview-old-price');
        const discountAmountEl = document.getElementById('card-preview-discount-amount');
        const discountBadgeEl = document.getElementById('card-preview-discount');
        const mainPriceEl = document.getElementById('card-preview-price');
        const offerPill = document.getElementById('card-offer-pill');
        const stockPill = document.getElementById('card-stock-pill');
        const detailOldPrice = document.getElementById('detail-preview-old-price');
        const detailDiscount = document.getElementById('detail-preview-discount-amount');

        const syncText = (id, value, fallback = '—') => {
            const el = document.getElementById(id);
            if (el) el.textContent = value?.trim() || fallback;
        };

        const updatePreview = () => {
            syncText('card-preview-code', codigo?.value, 'Código');
            syncText('card-preview-name', nombre?.value, 'Nombre del producto');

            syncText('detail-preview-name', nombre?.value, 'Nombre del producto');
            syncText('detail-preview-code', codigo?.value, '—');
            syncText('detail-preview-sku', sku?.value, '—');
            syncText(
                'detail-preview-desc',
                descripcion?.value,
                'Aquí se reflejará la descripción del producto mientras completas el formulario.'
            );
            syncText('detail-preview-garantia', garantia?.value, 'No especificada');

            const regular = parseFloat(precio?.value || 0);
            const offer = parseFloat(precioOferta?.value || 0);
            const hasOffer = (precioOferta?.value !== '' && offer > 0 && regular > offer);

            const baseColor = getPriceColor();

            if (hasOffer) {
                oldPriceEl?.classList.remove('hidden');
                discountAmountEl?.classList.remove('hidden');
                discountBadgeEl?.classList.remove('hidden');
                offerPill?.classList.remove('hidden');

                detailOldPrice?.classList.remove('hidden');
                detailDiscount?.classList.remove('hidden');

                oldPriceEl.textContent = money(regular);
                discountAmountEl.textContent = '-' + money(regular - offer);

                detailOldPrice.textContent = money(regular);
                detailDiscount.textContent = '-' + money(regular - offer);

                const percent = Math.round(((regular - offer) / regular) * 100);
                discountBadgeEl.textContent = '-' + percent + '%';

                if (mainPriceEl) {
                    mainPriceEl.textContent = money(offer);
                    mainPriceEl.style.color = baseColor;
                }

                const detailPrice = document.getElementById('detail-preview-price');
                if (detailPrice) {
                    detailPrice.textContent = money(offer);
                    detailPrice.style.color = baseColor;
                }
            } else {
                oldPriceEl?.classList.add('hidden');
                discountAmountEl?.classList.add('hidden');
                discountBadgeEl?.classList.add('hidden');
                offerPill?.classList.add('hidden');

                detailOldPrice?.classList.add('hidden');
                detailDiscount?.classList.add('hidden');

                if (mainPriceEl) {
                    mainPriceEl.textContent = money(precio?.value);
                    mainPriceEl.style.color = baseColor;
                }

                const detailPrice = document.getElementById('detail-preview-price');
                if (detailPrice) {
                    detailPrice.textContent = money(precio?.value);
                    detailPrice.style.color = baseColor;
                }
            }

            const stockValue = estadoStock?.value || 'disponible';
            const stockText =
                stockValue === 'consultar_stock' ?
                'Consultar stock' :
                stockValue === 'agotado' ?
                'Agotado' :
                'Disponible';

            if (stockPill) {
                stockPill.textContent = stockText;

                if (stockValue === 'agotado') {
                    stockPill.style.backgroundColor = 'rgba(239,68,68,.18)';
                    stockPill.style.color = '#ef4444';
                } else if (stockValue === 'consultar_stock') {
                    stockPill.style.backgroundColor = 'rgba(245,158,11,.18)';
                    stockPill.style.color = '#f59e0b';
                } else {
                    stockPill.style.backgroundColor = 'rgba(163,230,53,.18)';
                    stockPill.style.color = '#84cc16';
                }
            }

            const detailStock = document.getElementById('detail-preview-stock');
            if (detailStock) {
                detailStock.textContent = stockText;
            }

            const publicacionValue = estadoPublicacion?.value || 'activo';
            const publicacionText =
                publicacionValue === 'borrador' ?
                'Borrador' :
                publicacionValue === 'inactivo' ?
                'Inactivo' :
                'Activo';

            const detailPublicacion = document.getElementById('detail-preview-publicacion');
            if (detailPublicacion) {
                detailPublicacion.textContent = publicacionText;
            }
        };

        [nombre, codigo, sku, descripcion, precio, precioOferta, garantia].forEach(el => {
            if (!el) return;
            el.addEventListener('input', updatePreview);
        });

        [estadoPublicacion, estadoStock].forEach(el => {
            if (!el) return;
            el.addEventListener('change', updatePreview);
        });

        syncSecondaryThumbs();
        updatePreview();
    });
</script>
