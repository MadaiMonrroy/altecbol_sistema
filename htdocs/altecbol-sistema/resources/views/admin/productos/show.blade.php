<x-app-layout>
    @php
        $imgPrincipal1 = $producto->imagenesPrincipales->get(0) ?? $producto->imagenPrincipal;
        $imgPrincipal2 = $producto->imagenesPrincipales->get(1) ?? $imgPrincipal1;
        $secundarias = $producto->imagenesSecundarias ?? collect();
        $productoStock = $producto->stock ?? 0;
        $marcaActualNombre = $producto->marca->nombre ?? 'Sin marca';
        $marcaActualLogo = !empty($producto->marca?->imagen)
            ? asset('storage/' . $producto->marca->imagen)
            : asset('images/no-brand.png');

        $categoriaActualNombre = $producto->categoria->nombre ?? 'Sin categoría';

        $productoNombre = $producto->nombre ?? '';
        $productoCodigo = $producto->codigo ?? '';
        $productoSku = $producto->sku ?? '';
        $productoDescripcion = $producto->descripcion ?? '';
        $productoCaracteristicas = $producto->caracteristicas ?? '';
        $productoGarantia = $producto->garantia ?? '';
        $productoPrecio = (float) ($producto->precio ?? 0);
        $productoPrecioOferta = $producto->precio_oferta !== null ? (float) $producto->precio_oferta : null;

        $tieneOferta =
            !is_null($productoPrecioOferta) && $productoPrecioOferta > 0 && $productoPrecioOferta < $productoPrecio;
        $descuentoMonto = $tieneOferta ? $productoPrecio - $productoPrecioOferta : 0;
        $descuentoPorcentaje =
            $tieneOferta && $productoPrecio > 0
                ? round((($productoPrecio - $productoPrecioOferta) / $productoPrecio) * 100)
                : 0;

        $stockLabel = match ($producto->estado_stock) {
            'disponible' => 'Producto con stock',
            'agotado' => 'Producto agotado',
            'consultar_stock' => 'Consultar stock',
            default => 'Estado de stock',
        };

        $stockPillLabel = match ($producto->estado_stock) {
            'disponible' => 'Disponible',
            'agotado' => 'Agotado',
            'consultar_stock' => 'Consultar stock',
            default => 'Stock',
        };

        $stockBadgeStyle = match ($producto->estado_stock) {
            'disponible' => 'background-color: rgba(132, 204, 22, .18); color: #65a30d;',
            'agotado' => 'background-color: rgba(239, 68, 68, .18); color: #dc2626;',
            'consultar_stock' => 'background-color: rgba(245, 158, 11, .18); color: #d97706;',
            default => 'background-color: rgba(148, 163, 184, .18); color: #64748b;',
        };

        $publicacionLabel = match ($producto->estado_publicacion) {
            'activo' => 'Activo',
            'inactivo' => 'Inactivo',
            'borrador' => 'Borrador',
            default => 'Sin definir',
        };
    @endphp

    <div class="py-8">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

            <div class="rounded-2xl p-6 shadow"
                style="background-color: var(--bg-surface); border: 1px solid var(--border-color);">

                {{-- Header --}}
                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between mb-6">
                    <div>
                        <h2 class="text-xl font-semibold tracking-tight text-[var(--text-main)]">
                            Vista del producto
                        </h2>
                        <p class="text-sm mt-1 ui-muted">
                            Visualización del producto registrado en el catálogo.
                        </p>
                    </div>

                    <div class="flex flex-wrap items-center gap-3">
                        <a href="{{ route('admin.productos.edit', $producto->id) }}" class="ui-btn-primary">
                            Editar producto
                        </a>

                        <a href="{{ route('admin.productos.index') }}" class="ui-btn">
                            Volver
                        </a>
                    </div>

                </div>
                {{-- TÍTULO ARRIBA --}}
                <div>
                    <h1 class="text-2xl md:text-3xl font-semibold leading-tight text-[var(--text-main)]">
                        {{ $productoNombre ?: 'Nombre del producto' }}
                    </h1>
                </div>
                <div class="grid grid-cols-1 xl:grid-cols-[minmax(0,1.08fr)_460px] gap-6 items-start">

                    {{-- IZQUIERDA --}}
                    <div class="space-y-4">



                        {{-- IMAGEN PRINCIPAL --}}
                        <div class="rounded-2xl overflow-hidden"
                            style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                            <div
                                class="relative bg-[#f3f4f6] overflow-hidden group h-[420px] md:h-[480px] flex items-center justify-center">
                                <img id="main-product-image-1"
                                    src="{{ $imgPrincipal1?->url ?? asset('images/no-image.png') }}"
                                    alt="{{ $productoNombre }}"
                                    class="absolute inset-0 w-full h-full object-contain transition duration-500 ease-out opacity-100 group-hover:opacity-0">

                                <img id="main-product-image-2"
                                    src="{{ $imgPrincipal2?->url ?? ($imgPrincipal1?->url ?? asset('images/no-image.png')) }}"
                                    alt="{{ $productoNombre }}"
                                    class="absolute inset-0 w-full h-full object-contain transition duration-500 ease-out opacity-0 group-hover:opacity-100">
                            </div>
                        </div>

                        {{-- MINI GALERÍA --}}
                        <div class="rounded-2xl p-4"
                            style="background-color: var(--bg-card); border: 1px solid var(--border-color);">
                            <div class="flex gap-3 overflow-x-auto pb-1">
                                @php
                                    $galeria = collect()
                                        ->when($imgPrincipal1, fn($c) => $c->push($imgPrincipal1))
                                        ->when(
                                            $imgPrincipal2 &&
                                                (!$imgPrincipal1 || $imgPrincipal2->id !== $imgPrincipal1->id),
                                            fn($c) => $c->push($imgPrincipal2),
                                        )
                                        ->merge($secundarias);
                                @endphp

                                @forelse ($galeria as $index => $img)
                                    <button type="button"
                                        class="thumb-main shrink-0 rounded-xl overflow-hidden transition"
                                        style="width:88px;height:88px;border:1px solid {{ $index === 0 ? 'var(--accent)' : 'var(--border-color)' }}; background-color:#f3f4f6;"
                                        data-src="{{ $img->url }}">
                                        <img src="{{ $img->url }}" class="w-full h-full object-contain"
                                            alt="thumb">
                                    </button>
                                @empty
                                    <div class="text-sm ui-muted">
                                        No hay imágenes adicionales.
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>


                    {{-- DERECHA --}}
                    <div class="xl:sticky xl:top-6 h-fit">
                        <div class="rounded-2xl overflow-hidden shadow"
                            style="background-color: var(--bg-card); border: 1px solid var(--border-color);">

                            <div class="p-5 space-y-5">

                                {{-- PRECIO --}}
                                <div class="flex items-start justify-between gap-4">
                                    <div class="space-y-1">
                                        @if ($tieneOferta)
                                            <div class="flex items-center gap-2">
                                                <span class="text-base line-through" style="color:#94a3b8;">
                                                    {{ number_format($productoPrecio, 2, '.', ',') }} Bs
                                                </span>
                                                <span
                                                    class="inline-flex items-center rounded-md px-2 py-1 text-xs font-bold text-white"
                                                    style="background-color:#f59e8b;">
                                                    -{{ $descuentoPorcentaje }}%
                                                </span>
                                            </div>

                                            <div class="text-sm" style="color:#94a3b8;">
                                                -{{ number_format($descuentoMonto, 2, '.', ',') }} Bs
                                            </div>

                                            <div class="text-[42px] leading-none font-semibold" style="color:#ef4444;">
                                                {{ number_format($productoPrecioOferta, 2, '.', ',') }} Bs
                                            </div>
                                        @else
                                            <div class="text-[42px] leading-none font-semibold" style="color:#004DAD;">
                                                {{ number_format($productoPrecio, 2, '.', ',') }} Bs
                                            </div>
                                        @endif
                                    </div>

                                    <div class="flex flex-col gap-2">
                                        <button type="button"
                                            class="w-10 h-10 rounded-full flex items-center justify-center shadow-sm
                                            bg-white/85 text-slate-700 dark:bg-slate-800/85 dark:text-slate-200"
                                            disabled>
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="1.8">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m21 8.25c0-2.485-2.015-4.5-4.5-4.5-1.74 0-3.25.99-4 2.436-.75-1.446-2.26-2.436-4-2.436-2.485 0-4.5 2.015-4.5 4.5 0 7.22 8.5 12 8.5 12s8.5-4.78 8.5-12Z" />
                                            </svg>
                                        </button>

                                        <button type="button"
                                            class="w-10 h-10 rounded-full flex items-center justify-center shadow-sm
                                            bg-white/85 text-slate-700 dark:bg-slate-800/85 dark:text-slate-200"
                                            disabled>
                                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="1.8">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                                    d="M7.926 10.898 15 7.727m-7.074 5.39L15 16.29M8 12a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm12 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm0-11a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                {{-- DATOS --}}
                                <div class="space-y-2 text-sm">
                                    <div>
                                        <span class="font-semibold text-[var(--text-main)]">Código:</span>
                                        <span class="ui-muted">{{ $productoCodigo ?: '—' }}</span>
                                    </div>

                                    <div>
                                        <span class="font-semibold text-[var(--text-main)]">SKU:</span>
                                        <span class="ui-muted">{{ $productoSku ?: '—' }}</span>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <span class="font-semibold text-[var(--text-main)]">Marca:</span>
                                        <img src="{{ $marcaActualLogo }}"
                                            class="h-7 w-auto max-w-[100px] object-contain" alt="Marca">
                                    </div>
                                </div>

                                {{-- BADGE STOCK --}}
                                <div class="flex justify-end">
                                    <span class="inline-flex items-center rounded-md px-4 py-2 text-sm font-semibold"
                                        style="{{ $stockBadgeStyle }}">
                                        {{ $stockLabel }}
                                    </span>
                                </div>

                                {{-- DESCRIPCIÓN --}}
                                <div class="pt-1">
                                    <div class="flex items-center gap-2 mb-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ui-muted" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.5 8.25h9m-9 3h9m-9 3h5.25M6 3.75h12A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75Z" />
                                        </svg>
                                        <h3 class="text-xl font-semibold text-[var(--text-main)]">
                                            Descripción del Producto
                                        </h3>
                                    </div>

                                    <div class="pt-4 border-t ui-muted leading-8 text-[15px]"
                                        style="border-color: var(--border-color);">
                                        {{ $productoDescripcion ?: 'Este producto no tiene descripción registrada.' }}
                                    </div>
                                </div>

                                {{-- FILAS --}}
                                <div class="space-y-0 pt-1">
                                    <div class="flex items-center justify-between gap-4 py-3 border-t"
                                        style="border-color: var(--border-color);">
                                        <div class="flex items-center gap-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ui-muted"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="1.8">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                            <span class="font-semibold text-[var(--text-main)]">Garantía</span>
                                        </div>
                                        <span class="ui-muted">{{ $productoGarantia ?: 'No especificada' }}</span>
                                    </div>

                                    <div class="flex items-center justify-between gap-4 py-3 border-t"
                                        style="border-color: var(--border-color);">
                                        <div class="flex items-center gap-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ui-muted"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="1.8">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h12a2.25 2.25 0 0 0 2.25-2.25V3M3.75 6h16.5" />
                                            </svg>
                                            <span class="font-semibold text-[var(--text-main)]">Categoría</span>
                                        </div>
                                        <span class="ui-muted">{{ $categoriaActualNombre }}</span>
                                    </div>

                                    <div class="flex items-center justify-between gap-4 py-3 border-t"
                                        style="border-color: var(--border-color);">
                                        <div class="flex items-center gap-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ui-muted"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="1.8">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M3 7.5 12 3l9 4.5M4.5 9.75V16.5L12 21l7.5-4.5V9.75M12 21V12" />
                                            </svg>
                                            <span class="font-semibold text-[var(--text-main)]">Stock</span>
                                        </div>
                                        <span class="ui-muted">{{ $stockLabel }} </span>
                                    </div>

                                    {{-- <div class="flex items-center justify-between gap-4 py-3 border-t"
                                        style="border-color: var(--border-color);">
                                        <div class="flex items-center gap-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ui-muted"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0 1 18 14.158V11a6.002 6.002 0 0 0-4-5.659V4a2 2 0 1 0-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 1 1-6 0v-1m6 0H9" />
                                            </svg>
                                            <span class="font-semibold text-[var(--text-main)]">Publicación</span>
                                        </div>
                                        <span class="ui-muted">{{ $publicacionLabel }}</span>
                                    </div> --}}
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- CARACTERÍSTICAS --}}
            @if (!empty($productoCaracteristicas))
                <div class="pt-3">
                    <div class="rounded-xl p-4"
                        style="background-color: var(--bg-surface); border: 1px solid var(--border-color);">
                        <div class="font-semibold mb-2 text-[var(--text-main)]">
                            Características
                        </div>
                        <div class="ui-muted leading-7 text-sm whitespace-pre-line">
                            {{ $productoCaracteristicas }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const thumbs = document.querySelectorAll('.thumb-main');
        const main1 = document.getElementById('main-product-image-1');
        const main2 = document.getElementById('main-product-image-2');

        thumbs.forEach((btn, index) => {
            btn.addEventListener('click', () => {
                const src = btn.getAttribute('data-src');
                if (!src || !main1 || !main2) return;

                if (index === 0) {
                    main1.src = src;
                } else if (index === 1) {
                    main2.src = src;
                } else {
                    main1.src = src;
                }

                thumbs.forEach(item => {
                    item.style.borderColor = 'var(--border-color)';
                });

                btn.style.borderColor = 'var(--accent)';
            });
        });
    });
</script>
