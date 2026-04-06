@extends('layouts.web')

@section('title', $producto->nombre . ' | ALTECBOL')

@section('content')
    @php
        $imagenActiva = $galeria->first();

        $precio = (float) $producto->precio;
        $precioOferta = !is_null($producto->precio_oferta) ? (float) $producto->precio_oferta : null;

        $tieneOferta = $precioOferta && $precioOferta > 0 && $precioOferta < $precio;
        $precioFinal = $tieneOferta ? $precioOferta : $precio;

        $porcentajeDescuento = $tieneOferta && $precio > 0 ? round(100 - ($precioOferta * 100) / $precio) : 0;

        $ahorro = $tieneOferta ? $precio - $precioOferta : 0;

        $estadoTexto = match ($producto->estado_stock) {
            'disponible' => 'Producto con stock',
            'agotado' => 'Producto agotado',
            'consultar_stock' => 'Consultar stock',
            default => 'Producto disponible',
        };

        $estadoClase = match ($producto->estado_stock) {
            'disponible' => 'bg-lime-100 text-lime-700',
            'agotado' => 'bg-red-100 text-red-600',
            'consultar_stock' => 'bg-amber-100 text-amber-700',
            default => 'bg-slate-100 text-slate-700',
        };

        $marcaLogo = $producto->marca && $producto->marca->imagen ? asset('storage/' . $producto->marca->imagen) : null;
    @endphp

    <section class="relative overflow-hidden bg-slate-950">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1600&q=80"
                alt="Detalle del producto" class="h-full w-full object-cover opacity-20">
        </div>

        <div
            class="absolute  inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(1,211,209,0.16),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(0,80,176,0.32),_transparent_35%),linear-gradient(to_right,_rgba(2,6,23,0.96),_rgba(0,80,176,0.88),_rgba(2,6,23,0.96))]">
        </div>

        <div class="relative z-10 max-w-7xl mx-auto  px-6 pt-24 pb-5 md:pt-36 md:pb-12">
            <div class="max-w-4xl">
                <a href="{{ route('web.tienda.index') }}"
    class="mb-5 inline-flex items-center gap-2 text-sm font-medium text-white/80 transition hover:text-white -ml-4 md:-ml-32">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                    <span>Volver</span>
                </a>

                <h1 class="text-[22px] md:text-[30px] font-bold leading-tight tracking-tight text-white">
                    {{ $producto->nombre }}
                </h1>
            </div>
        </div>
    </section>

    <section class="bg-slate-50 pb-10">
        <div class="max-w-[1500px] mx-auto px-3 sm:px-5 lg:px-8">
            <div
                class="rounded-[1.7rem] border border-slate-200 bg-white p-4 md:p-5 shadow-[0_10px_26px_rgba(15,23,42,0.05)]">
                <div class="grid gap-5 xl:grid-cols-[minmax(0,2fr)_minmax(360px,1fr)]">
                    {{-- IZQUIERDA --}}
                    <div class="min-w-0">
                        <div class="rounded-[1.5rem] border border-slate-200 bg-slate-50 p-3">
                            <div class="overflow-hidden rounded-[1.3rem] bg-white">
                                <div class="aspect-[16/9] ">
                                    <img id="imagen-principal-producto"
                                        src="{{ $imagenActiva ? asset('storage/' . $imagenActiva->imagen) : asset('websitio/ing/default.webp') }}"
                                        alt="{{ $producto->nombre }}" class="h-full w-full object-contain">
                                </div>
                            </div>

                            @if ($galeria->count() > 1)
                                <div class="mt-3 flex flex-wrap gap-2">
                                    @foreach ($galeria as $index => $imagen)
                                        <button type="button"
                                            onclick="cambiarImagenProducto('{{ asset('storage/' . $imagen->imagen) }}', this)"
                                            class="miniatura-producto overflow-hidden rounded-xl border {{ $index === 0 ? 'border-[#0050b0] ring-2 ring-blue-100' : 'border-slate-200' }} bg-white p-1 transition hover:border-[#0050b0]/50">
                                            <div class="h-[70px] w-[70px] overflow-hidden rounded-[0.8rem] bg-slate-50">
                                                <img src="{{ asset('storage/' . $imagen->imagen) }}"
                                                    alt="{{ $producto->nombre }}" class="h-full w-full object-cover">
                                            </div>
                                        </button>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- DERECHA --}}
                    <aside
                        class="relative flex h-full flex-col rounded-[1.5rem] border border-slate-200 bg-white p-4 shadow-[0_8px_20px_rgba(15,23,42,0.04)]">
                        <div class="flex items-start justify-between gap-4">
                            <div class="min-w-0">
                                @if ($tieneOferta)
                                    <div class="flex flex-wrap items-center gap-2">
                                        <span class="text-[13px] font-semibold text-slate-400 line-through">
                                            {{ number_format($precio, 2, '.', ',') }} Bs
                                        </span>

                                        @if ($porcentajeDescuento > 0)
                                            <span
                                                class="inline-flex rounded-lg bg-red-300 px-2.5 py-1 text-xs font-bold text-white">
                                                -{{ $porcentajeDescuento }}%
                                            </span>
                                        @endif
                                    </div>

                                    <div class="mt-1 text-[12px] font-medium text-slate-400">
                                        -{{ number_format($ahorro, 2, '.', ',') }} Bs
                                    </div>

                                    <div
                                        class="mt-1 text-[24px] md:text-[30px] font-extrabold leading-none tracking-tight text-red-500">
                                        {{ number_format($precioFinal, 2, '.', ',') }} Bs
                                    </div>
                                @else
                                    <div
                                        class="text-[24px] md:text-[30px] font-extrabold leading-none tracking-tight text-[#01c8c7]">
                                        {{ number_format($precioFinal, 2, '.', ',') }} Bs
                                    </div>
                                @endif
                            </div>

                            <div class="flex flex-col gap-2">
                               <button type="button"
    class="btn-favorito inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 bg-white shadow-sm transition hover:border-red-400"
    data-url="{{ route('web.tienda.favoritos.toggle', $producto->id) }}"
    data-favorito="{{ $producto->es_favorito ? '1' : '0' }}"
    title="Favorito">
    <svg xmlns="http://www.w3.org/2000/svg"
        class="icon-favorito h-5 w-5 {{ $producto->es_favorito ? 'text-red-500 fill-red-500' : 'text-slate-600 fill-none' }}"
        viewBox="0 0 24 24"
        stroke="currentColor"
        stroke-width="1.8">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
    </svg>
</button>

                                <button type="button"
                                    class="btn-share-product inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-600 shadow-sm transition hover:border-[#0050b0] hover:text-[#0050b0]"
                                    data-title="{{ $producto->nombre }}"
                                    data-url="{{ route('web.tienda.producto', $producto->codigo) }}" title="Compartir">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                                                                              <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M7.926 10.898 15 7.727m-7.074 5.39L15 16.29M8 12a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm12 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm0-11a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>

                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="mt-4 space-y-1.5 text-[13px] text-slate-700">
                            <div>
                                <span class="font-semibold text-slate-900">Código:</span>
                                <span class="text-slate-500">{{ $producto->codigo }}</span>
                            </div>

                            @if ($producto->sku)
                                <div>
                                    <span class="font-semibold text-slate-900">SKU:</span>
                                    <span class="text-slate-500">{{ $producto->sku }}</span>
                                </div>
                            @endif

                            <div class="flex items-center gap-3">
                                <span class="font-semibold text-slate-900">Marca:</span>

                                @if ($marcaLogo)
                                    <img src="{{ $marcaLogo }}" alt="{{ $producto->marca?->nombre }}"
                                        class="h-11 w-auto object-contain">
                                @else
                                    <span class="text-slate-500">{{ $producto->marca?->nombre ?? 'Sin marca' }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="absolute right-[-10px] top-28 md:right-[-15px] md:top-28 z-10">
                            <span
                                class="inline-flex rounded-full px-4 py-2 text-[12px] font-bold shadow-md ring-4 ring-white {{ $estadoClase }}">
                                {{ $estadoTexto }}
                            </span>
                        </div>

                        <div class="mt-5 border-t border-slate-200 pt-5">
                            <div class="flex items-center gap-3 text-slate-900">
                                <span
                                    class="inline-flex h-7 w-7 items-center justify-center rounded-lg bg-slate-100 text-slate-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                    </svg>
                                </span>
                                <h2 class="text-[15px] font-bold">Descripción del Producto</h2>
                            </div>

                            <div class="mt-3 border-t border-slate-200 pt-4 text-[13px] leading-5.5 text-slate-600">
                                {!! $producto->descripcion ? nl2br(e($producto->descripcion)) : 'Sin descripción disponible.' !!}
                            </div>
                        </div>

                        <div class="mt-4 border-t border-slate-200 pt-2">
                            <div class="grid gap-2 text-[13px]">
                                @if ($producto->garantia)
                                    <div class="flex items-center justify-between gap-4 border-b border-slate-200 pb-2">
                                        <div class="flex items-center gap-3 text-slate-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="1.8">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 12l2 2 4-4m5-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="font-semibold">Garantía</span>
                                        </div>
                                        <span class="text-slate-500">{{ $producto->garantia }}</span>
                                    </div>
                                @endif

                                @if ($producto->categoria)
                                    <div class="flex items-center justify-between gap-4 border-b border-slate-200 pb-2">
                                        <div class="flex items-center gap-3 text-slate-900">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="1.8">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4 6h16M4 12h16M4 18h16" />
                                            </svg>
                                            <span class="font-semibold">Categoría</span>
                                        </div>
                                        <span class="text-slate-500">{{ $producto->categoria->nombre }}</span>
                                    </div>
                                @endif

                                <div class="flex items-center justify-between gap-4">
                                    <div class="flex items-center gap-2 text-slate-900 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M20 7l-8 4-8-4m16 0l-8-4-8 4m16 0v10l-8 4m-8-14v10l8 4" />
                                        </svg>
                                        <span class="font-semibold">Stock</span>
                                    </div>
                                    <span class="text-slate-500">{{ $estadoTexto }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 border-t border-slate-200 pt-4">
                            <form action="{{ route('web.tienda.carrito.agregar', $producto->id) }}" method="POST"
                                class="space-y-3">
                                @csrf

                                <div>
                                    <label class="mb-2 block text-sm font-semibold text-slate-600">Cantidad</label>

                                    <div class="flex items-center gap-3">
                                        <div
                                            class="inline-flex items-center rounded-2xl border border-slate-200 bg-white shadow-sm">
                                            <button type="button" id="btn-minus"
                                                class="flex h-11 w-11 items-center justify-center rounded-l-2xl text-slate-600 transition hover:bg-slate-50 hover:text-[#0050b0]">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" />
                                                </svg>
                                            </button>

                                            <input type="number" id="cantidad" name="cantidad" min="1"
                                                max="{{ max(1, $producto->stock) }}" value="1"
                                                class="h-11 w-16 border-x border-slate-200 bg-white text-center text-[15px] font-semibold text-slate-800 outline-none [appearance:textfield] [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none">

                                            <button type="button" id="btn-plus"
                                                class="flex h-11 w-11 items-center justify-center rounded-r-2xl text-slate-600 transition hover:bg-slate-50 hover:text-[#0050b0]">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M12 4v16m8-8H4" />
                                                </svg>
                                            </button>
                                        </div>

                                        <button type="submit"
                                            class="flex-1 rounded-2xl bg-[#0d377a] px-6 py-3.5 text-[15px] font-semibold text-white transition hover:bg-[#0050b0]">
                                            Añadir al carrito
                                        </button>
                                    </div>

                                    <p id="total-estimado" class="mt-3 text-sm text-slate-400">
                                        Total estimado: Bs {{ number_format($precioFinal, 2, '.', ',') }}
                                    </p>
                                </div>
                            </form>
                        </div>
                    </aside>
                </div>
            </div>

            @if ($producto->caracteristicas)
                <div
                    class="mt-4 rounded-[1.5rem] border border-slate-200 bg-white p-4 md:p-5 shadow-[0_8px_20px_rgba(15,23,42,0.04)]">
                    <h2 class="text-[18px] font-bold text-slate-900">Características</h2>
                    <div class="mt-3 text-[14px] leading-8 text-slate-600">
                        {!! nl2br(e($producto->caracteristicas)) !!}
                    </div>
                </div>
            @endif

            @if ($relacionados->count())
                <div class="mt-10">
                    <div class="mb-5 flex items-center justify-between gap-4">
                        <h2 class="text-[24px] font-bold tracking-tight text-slate-900">Productos relacionados</h2>

                        <div class="hidden md:flex items-center gap-2">
                            <button type="button" id="relatedPrev"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-600 shadow-sm transition hover:border-[#0050b0] hover:text-[#0050b0]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 19.5L8.25 12l7.5-7.5" />
                                </svg>
                            </button>

                            <button type="button" id="relatedNext"
                                class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 bg-white text-slate-600 shadow-sm transition hover:border-[#0050b0] hover:text-[#0050b0]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="relative">
                        <div id="relatedCarousel"
                            class="flex gap-5 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-2 [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                            @foreach ($relacionados as $item)
                                @php
                                    $precioItem = (float) $item->precio;
                                    $precioOfertaItem = !is_null($item->precio_oferta)
                                        ? (float) $item->precio_oferta
                                        : null;
                                    $tieneOfertaItem =
                                        $precioOfertaItem && $precioOfertaItem > 0 && $precioOfertaItem < $precioItem;
                                    $precioFinalItem = $tieneOfertaItem ? $precioOfertaItem : $precioItem;
                                @endphp

                                <article
                                    class="group snap-start shrink-0 w-[260px] flex h-full flex-col rounded-[1.8rem] border border-slate-200 bg-white p-3 shadow-[0_10px_24px_rgba(15,23,42,0.05)] transition hover:-translate-y-1 hover:shadow-[0_18px_36px_rgba(15,23,42,0.08)]">
                                    <a href="{{ route('web.tienda.producto', $item->codigo) }}" class="block">
                                        <div class="overflow-hidden rounded-[1.3rem] border border-slate-200 bg-slate-50">
                                            <div class="aspect-[4/3]">
                                                <img src="{{ $item->imagen_principal_url }}" alt="{{ $item->nombre }}"
                                                    class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                                            </div>
                                        </div>
                                    </a>

                                    <div class="flex flex-1 flex-col p-4">
                                        <h3 class="min-h-[3rem] text-[16px] font-semibold leading-6 text-slate-900">
                                            <a href="{{ route('web.tienda.producto', $item->codigo) }}">
                                                {{ $item->nombre }}
                                            </a>
                                        </h3>

                                        <div class="mt-auto pt-4">
                                            @if ($tieneOfertaItem)
                                                <div class="text-sm text-slate-400 line-through">
                                                    {{ number_format($precioItem, 2, '.', ',') }} Bs
                                                </div>
                                                <div class="mt-1 text-[20px] font-extrabold text-[#0b51b0]">
                                                    {{ number_format($precioFinalItem, 2, '.', ',') }} Bs
                                                </div>
                                            @else
                                                <div class="text-[20px] font-extrabold text-[#01c8c7]">
                                                    {{ number_format($precioFinalItem, 2, '.', ',') }} Bs
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <script>
        const precioUnitario = {{ json_encode((float) $precioFinal) }};
        const cantidadInput = document.getElementById('cantidad');
        const totalEstimado = document.getElementById('total-estimado');
        const btnMinus = document.getElementById('btn-minus');
        const btnPlus = document.getElementById('btn-plus');
        const maxCantidad = {{ max(1, (int) $producto->stock) }};

        function cambiarImagenProducto(src, boton = null) {
            const imagen = document.getElementById('imagen-principal-producto');
            if (imagen) {
                imagen.src = src;
            }

            document.querySelectorAll('.miniatura-producto').forEach((item) => {
                item.classList.remove('border-[#0050b0]', 'ring-2', 'ring-blue-100');
                item.classList.add('border-slate-200');
            });

            if (boton) {
                boton.classList.remove('border-slate-200');
                boton.classList.add('border-[#0050b0]', 'ring-2', 'ring-blue-100');
            }
        }

        function actualizarTotalEstimado() {
            if (!cantidadInput || !totalEstimado) return;

            let cantidad = parseInt(cantidadInput.value || '1', 10);

            if (isNaN(cantidad) || cantidad < 1) cantidad = 1;
            if (cantidad > maxCantidad) cantidad = maxCantidad;

            cantidadInput.value = cantidad;

            const total = cantidad * precioUnitario;

            totalEstimado.textContent = 'Total estimado: Bs ' + total.toLocaleString('en-US', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });
        }

        if (btnMinus) {
            btnMinus.addEventListener('click', function() {
                let cantidad = parseInt(cantidadInput.value || '1', 10);
                if (isNaN(cantidad) || cantidad <= 1) cantidad = 1;
                else cantidad -= 1;
                cantidadInput.value = cantidad;
                actualizarTotalEstimado();
            });
        }

        if (btnPlus) {
            btnPlus.addEventListener('click', function() {
                let cantidad = parseInt(cantidadInput.value || '1', 10);
                if (isNaN(cantidad) || cantidad < 1) cantidad = 1;
                else if (cantidad < maxCantidad) cantidad += 1;
                cantidadInput.value = cantidad;
                actualizarTotalEstimado();
            });
        }

        if (cantidadInput) {
            cantidadInput.addEventListener('input', actualizarTotalEstimado);
            cantidadInput.addEventListener('change', actualizarTotalEstimado);
        }

        actualizarTotalEstimado();

        document.querySelectorAll('.btn-share-product').forEach((button) => {
            button.addEventListener('click', async function() {
                const url = this.dataset.url;
                const title = this.dataset.title;

                if (navigator.share) {
                    try {
                        await navigator.share({
                            title,
                            url
                        });
                    } catch (error) {}
                } else {
                    try {
                        await navigator.clipboard.writeText(url);
                        alert('Enlace copiado al portapapeles');
                    } catch (error) {
                        window.prompt('Copia este enlace:', url);
                    }
                }
            });
        });

        const relatedCarousel = document.getElementById('relatedCarousel');
        const relatedPrev = document.getElementById('relatedPrev');
        const relatedNext = document.getElementById('relatedNext');

        function getScrollAmount() {
            if (!relatedCarousel) return 0;
            const firstCard = relatedCarousel.querySelector('article');
            if (!firstCard) return 320;
            const style = window.getComputedStyle(relatedCarousel);
            const gap = parseInt(style.columnGap || style.gap || 20, 10);
            return firstCard.offsetWidth + gap;
        }

        if (relatedPrev && relatedCarousel) {
            relatedPrev.addEventListener('click', () => {
                relatedCarousel.scrollBy({
                    left: -getScrollAmount(),
                    behavior: 'smooth'
                });
            });
        }

        if (relatedNext && relatedCarousel) {
            relatedNext.addEventListener('click', () => {
                relatedCarousel.scrollBy({
                    left: getScrollAmount(),
                    behavior: 'smooth'
                });
            });
        }
        document.querySelectorAll('.btn-favorito').forEach((button) => {
        button.addEventListener('click', async function() {
            const url = this.dataset.url;
            const icon = this.querySelector('.icon-favorito');

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });

                const data = await response.json();

                if (!response.ok) {
                    throw data;
                }

                this.dataset.favorito = data.favorito ? '1' : '0';

                if (data.favorito) {
                    icon.classList.remove('text-slate-600', 'fill-none');
                    icon.classList.add('text-red-500', 'fill-red-500');
                } else {
                    icon.classList.remove('text-red-500', 'fill-red-500');
                    icon.classList.add('text-slate-600', 'fill-none');
                }
            } catch (error) {
                console.error(error);
                alert('No se pudo actualizar favoritos.');
            }
        });
    });
    </script>
@endsection
