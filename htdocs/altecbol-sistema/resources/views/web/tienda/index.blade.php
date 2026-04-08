@extends('layouts.web')

@section('title', 'Tienda | ALTECBOL')

@section('content')
    <section class="relative overflow-hidden bg-slate-950 ">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1600&q=80"
                alt="Tienda ALTECBOL" class="h-full w-full object-cover opacity-20">
        </div>

        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(1,211,209,0.16),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(0,80,176,0.32),_transparent_35%),linear-gradient(to_right,_rgba(2,6,23,0.96),_rgba(0,80,176,0.88),_rgba(2,6,23,0.96))]">
        </div>

        <div class="relative max-w-7xl mx-auto px-6 py-14  lg:py-20">
            <div class="max-w-4xl  pt-14 js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
                <span
                    class="inline-flex items-center rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm text-white/90 backdrop-blur">
                    Tienda ALTECBOL
                </span>

                <h1 class="mt-6 text-4xl md:text-5xl font-bold leading-tight text-white">
                    Equipos y soluciones
                    <span class="text-[#01d3d1]">para tu empresa</span>
                </h1>

                <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-200">
                    Tecnología empresarial, conectividad, seguridad, energía y soluciones profesionales para empresas que
                    exigen rendimiento, diseño y respaldo.
                </p>
            </div>
        </div>

        <div class="relative -mt-10">
            <svg viewBox="0 0 1440 120" class="h-20 w-full fill-slate-50" preserveAspectRatio="none">
                <path
                    d="M0,96L80,85.3C160,75,320,53,480,48C640,43,800,53,960,64C1120,75,1280,85,1360,90.7L1440,96L1440,120L0,120Z">
                </path>
            </svg>
        </div>
    </section>

    @if ($marcas->whereNotNull('imagen')->count())
        <section class="bg-slate-50 pb-4">
            <div class="max-w-7xl mx-auto px-6">
                <div
                    class="overflow-hidden rounded-[1.8rem] border border-slate-200 bg-white shadow-[0_10px_30px_rgba(15,23,42,0.05)]">
                    <div class="flex items-center justify-between gap-4 border-b border-slate-100 px-5 py-4">
                        <div>
                            <h2 class="text-base font-bold text-slate-900">Marcas con las que trabajamos</h2>
                            <p class="text-sm text-slate-500">Fabricantes y aliados tecnológicos para soluciones
                                empresariales.</p>
                        </div>
                    </div>

                    <div class="brand-marquee">
                        <div class="brand-marquee__inner">
                            <div class="brand-marquee__group">
                                @foreach ($marcas->whereNotNull('imagen') as $marca)
                                    <button type="button" class="brand-filter brand-logo-item"
                                        data-brand="{{ $marca->id }}" title="{{ $marca->nombre }}">
                                        <img src="{{ asset('storage/' . $marca->imagen) }}" alt="{{ $marca->nombre }}"
                                            class="h-11 w-auto object-contain opacity-90 transition duration-300 hover:opacity-100">
                                    </button>
                                @endforeach
                            </div>

                            <div class="brand-marquee__group" aria-hidden="true">
                                @foreach ($marcas->whereNotNull('imagen') as $marca)
                                    <button type="button" class="brand-filter brand-logo-item"
                                        data-brand="{{ $marca->id }}" title="{{ $marca->nombre }}">
                                        <img src="{{ asset('storage/' . $marca->imagen) }}" alt="{{ $marca->nombre }}"
                                            class="h-11 w-auto object-contain opacity-90 transition duration-300 hover:opacity-100">
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="bg-slate-50 py-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid xl:grid-cols-[300px_minmax(0,1fr)] gap-8">

                <aside class="js-fade opacity-0 translate-y-8 transition-all duration-700 ease-out">
                    <div class="xl:sticky xl:top-24 space-y-6">

                        <div
                            class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-[0_10px_30px_rgba(15,23,42,0.05)]">
                            <div class="flex items-center justify-between gap-3">
                                <h3 class="text-lg font-bold text-slate-900">Categorías</h3>

                                <button type="button" id="resetFilters"
                                    class="rounded-xl border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-600 transition hover:border-[#0050b0]/30 hover:text-[#0050b0]">
                                    Limpiar
                                </button>
                            </div>

                            <div class="mt-5 space-y-2">
                                <button type="button"
                                    class="category-filter block w-full rounded-xl px-3 py-2 text-left text-[15px] leading-6 font-semibold text-[#0050b0] bg-blue-50"
                                    data-category="">
                                    Todos los productos
                                </button>

                                @foreach ($categorias as $categoria)
                                    <button type="button"
                                        class="category-filter block w-full rounded-xl px-3 py-2 text-left text-[15px] leading-6 text-slate-700 transition hover:bg-slate-50 hover:text-[#0050b0]"
                                        data-category="{{ $categoria->id }}">
                                        {{ $categoria->nombre }}
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <div
                            class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-[0_10px_30px_rgba(15,23,42,0.05)]">
                            <h3 class="text-lg font-bold text-slate-900">Etiquetas</h3>

                            <div class="mt-5 grid gap-3">
                                <label
                                    class="flex items-center gap-3 rounded-xl border border-slate-200 px-4 py-3 transition hover:border-[#0050b0]/25 hover:bg-slate-50 cursor-pointer">
                                    <input type="checkbox" id="filter-disponible"
                                        class="rounded border-slate-300 text-[#0050b0] focus:ring-[#0050b0]">
                                    <span class="inline-flex h-2.5 w-2.5 rounded-full bg-lime-500"></span>
                                    <span class="text-[15px] font-medium text-slate-700">Disponible</span>
                                </label>

                                <label
                                    class="flex items-center gap-3 rounded-xl border border-slate-200 px-4 py-3 transition hover:border-[#0050b0]/25 hover:bg-slate-50 cursor-pointer">
                                    <input type="checkbox" id="filter-agotado"
                                        class="rounded border-slate-300 text-[#0050b0] focus:ring-[#0050b0]">
                                    <span class="inline-flex h-2.5 w-2.5 rounded-full bg-red-500"></span>
                                    <span class="text-[15px] font-medium text-slate-700">Agotado</span>
                                </label>

                                <label
                                    class="flex items-center gap-3 rounded-xl border border-slate-200 px-4 py-3 transition hover:border-[#0050b0]/25 hover:bg-slate-50 cursor-pointer">
                                    <input type="checkbox" id="filter-consultar"
                                        class="rounded border-slate-300 text-[#0050b0] focus:ring-[#0050b0]">
                                    <span class="inline-flex h-2.5 w-2.5 rounded-full bg-amber-500"></span>
                                    <span class="text-[15px] font-medium text-slate-700">Consultar stock</span>
                                </label>

                                <label
                                    class="flex items-center gap-3 rounded-xl border border-slate-200 px-4 py-3 transition hover:border-[#0050b0]/25 hover:bg-slate-50 cursor-pointer">
                                    <input type="checkbox" id="filter-oferta"
                                        class="rounded border-slate-300 text-[#0050b0] focus:ring-[#0050b0]">
                                    <span class="inline-flex h-2.5 w-2.5 rounded-full bg-cyan-500"></span>
                                    <span class="text-[15px] font-medium text-slate-700">En oferta</span>
                                </label>
                            </div>
                        </div>

                        <div
                            class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-[0_10px_30px_rgba(15,23,42,0.05)]">
                            <h3 class="text-lg font-bold text-slate-900">Filtrar por marca</h3>

                            <div class="mt-5 flex flex-wrap gap-2">
                                <button type="button"
                                    class="brand-filter-sidebar rounded-full border border-blue-200 bg-blue-50 px-4 py-2 text-sm font-semibold text-[#0050b0]"
                                    data-brand="">
                                    Todas
                                </button>

                                @foreach ($marcas as $marca)
                                    <button type="button"
                                        class="brand-filter-sidebar rounded-full border border-slate-200 px-4 py-2 text-sm font-medium text-slate-700 transition hover:border-[#0050b0]/30 hover:text-[#0050b0]"
                                        data-brand="{{ $marca->id }}">
                                        {{ $marca->nombre }}
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        <div
                            class="rounded-[2rem] border border-slate-200 bg-white p-6 shadow-[0_10px_30px_rgba(15,23,42,0.05)]">
                            <h3 class="text-lg font-bold text-slate-900">Vista rápida</h3>

                            <div class="mt-4 space-y-3 text-sm text-slate-600">
                                <div class="flex items-center justify-between">
                                    <span>Productos cargados</span>
                                    <span class="font-semibold text-slate-900">{{ $productos->count() }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span>Categorías</span>
                                    <span class="font-semibold text-slate-900">{{ $categorias->count() }}</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span>Marcas</span>
                                    <span class="font-semibold text-slate-900">{{ $marcas->count() }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </aside>

                <div class="min-w-0">
                    <div
                        class="js-fade relative z-40 opacity-0 translate-y-8 transition-all duration-700 ease-out rounded-[2rem] border border-slate-200 bg-white p-5 md:p-6 shadow-[0_10px_30px_rgba(15,23,42,0.05)]">
                        <div class="flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between">
                            <div class="flex-1">
                                <div class="flex flex-wrap items-center gap-3">
                                    <h2 class="text-2xl md:text-3xl font-bold tracking-tight text-slate-900">Todos los
                                        productos</h2>
                                    <span id="productsCounter"
                                        class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-sm font-semibold text-slate-600">
                                        {{ $productos->count() }} resultados
                                    </span>
                                </div>

                                <div class="mt-4 relative max-w-2xl">
                                    <input id="productSearch" type="text"
                                        placeholder="Buscar por nombre del producto..."
                                        class="w-full rounded-[1.4rem] border border-slate-200 bg-slate-100 px-5 py-4 pr-12 text-slate-700 outline-none transition focus:border-[#0050b0] focus:bg-white focus:ring-4 focus:ring-blue-100">
                                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 text-lg">⌕</span>
                                </div>
                            </div>

                            <div class="flex flex-col gap-2 sm:min-w-[280px]">
                                <label class="text-sm font-semibold text-slate-500">Ordenar por</label>

                                <div class="relative z-50" id="sortDropdown">
                                    <button type="button" id="sortDropdownButton"
                                        class="flex w-full items-center justify-between rounded-[1.3rem] border border-slate-200 bg-white px-5 py-4 text-left text-sm font-semibold text-slate-700 shadow-[0_8px_24px_rgba(15,23,42,0.05)] transition hover:border-[#0050b0]/30 hover:shadow-[0_12px_30px_rgba(15,23,42,0.08)]">
                                        <span id="sortDropdownLabel">Llegadas más recientes</span>

                                        <span class="text-slate-400 transition" id="sortDropdownIcon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </span>
                                    </button>

                                    <div id="sortDropdownMenu"
                                        class="absolute right-0 top-full z-[999] mt-3 hidden w-full overflow-hidden rounded-[1.2rem] border border-slate-200 bg-white p-2 shadow-[0_18px_45px_rgba(15,23,42,0.16)]">
                                        <button type="button"
                                            class="sort-option flex w-full rounded-xl px-4 py-3 text-left text-sm font-medium text-slate-700 transition hover:bg-slate-50"
                                            data-value="recentes">
                                            Llegadas más recientes
                                        </button>
                                        <button type="button"
                                            class="sort-option flex w-full rounded-xl px-4 py-3 text-left text-sm font-medium text-slate-700 transition hover:bg-slate-50"
                                            data-value="precio_asc">
                                            Precio: menor a mayor
                                        </button>
                                        <button type="button"
                                            class="sort-option flex w-full rounded-xl px-4 py-3 text-left text-sm font-medium text-slate-700 transition hover:bg-slate-50"
                                            data-value="precio_desc">
                                            Precio: mayor a menor
                                        </button>
                                        <button type="button"
                                            class="sort-option flex w-full rounded-xl px-4 py-3 text-left text-sm font-medium text-slate-700 transition hover:bg-slate-50"
                                            data-value="nombre_asc">
                                            Nombre: A-Z
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="productsGrid" class="relative z-0 mt-8 pb-16 grid sm:grid-cols-2 2xl:grid-cols-3 gap-7">
                        @foreach ($productos as $index => $producto)
                            @php
                                $precioFinal = $producto->precio_final;
                                $precioNormal = (float) $producto->precio;
                                $descuento = $producto->porcentaje_descuento;
                                $marcaLogo =
                                    $producto->marca && $producto->marca->imagen
                                        ? asset('storage/' . $producto->marca->imagen)
                                        : null;

                                $tieneOferta =
                                    !is_null($producto->precio_oferta) &&
                                    (float) $producto->precio_oferta > 0 &&
                                    (float) $producto->precio_oferta < (float) $producto->precio;

                                $etiquetaTexto = match ($producto->estado_stock) {
                                    'disponible' => 'Disponible',
                                    'agotado' => 'Agotado',
                                    'consultar_stock' => 'Consultar stock',
                                    default => 'Disponible',
                                };

                                $etiquetaClase = match ($producto->estado_stock) {
                                    'disponible' => 'bg-lime-100 text-lime-700 ring-1 ring-lime-200',
                                    'agotado' => 'bg-red-100 text-red-600 ring-1 ring-red-200',
                                    'consultar_stock' => 'bg-amber-100 text-amber-700 ring-1 ring-amber-200',
                                    default => 'bg-lime-100 text-lime-700 ring-1 ring-lime-200',
                                };

                                $segundaImagen = $producto->segunda_imagen_principal_url;
                            @endphp

                            <article
                                class="product-card group flex h-full flex-col rounded-[2rem] border border-slate-200/90 bg-white p-3 shadow-[0_14px_32px_rgba(15,23,42,0.05)] transition duration-300 hover:-translate-y-1.5 hover:border-[#0050b0]/15 hover:shadow-[0_22px_55px_rgba(15,23,42,0.10)]""""
                                data-name="{{ strtolower($producto->nombre) }}"
                                data-category="{{ $producto->categoria_id }}" data-brand="{{ $producto->marca_id }}"
                                data-stock="{{ $producto->estado_stock }}" data-offer="{{ $tieneOferta ? '1' : '0' }}"
                                data-price="{{ $precioFinal }}" data-order="{{ $index }}">
                                <a href="{{ route('web.tienda.producto', $producto->codigo) }}" class="block">
                                    <div
                                        class="relative overflow-hidden rounded-[1.8rem] border border-slate-200 bg-gradient-to-b from-slate-50 to-white">

                                        <div class="absolute left-3 top-3 z-20 flex flex-col gap-2">
                                            <span
                                                class="inline-flex rounded-xl px-3 py-1 text-[11px] font-bold {{ $etiquetaClase }}">
                                                {{ $etiquetaTexto }}
                                            </span>

                                            @if ($tieneOferta)
                                                <span
                                                    class="inline-flex rounded-xl bg-cyan-100 px-3 py-1 text-[11px] font-bold text-cyan-700 ring-1 ring-cyan-200">
                                                    En oferta
                                                </span>
                                            @endif
                                        </div>

                                        @if ($tieneOferta && $descuento > 0)
                                            <div class="absolute right-3 top-3 z-20">
                                                <span
                                                    class="inline-flex rounded-xl bg-red-400 px-3 py-1 text-sm font-extrabold text-white shadow-sm">
                                                    -{{ $descuento }}%
                                                </span>
                                            </div>
                                        @endif

                                        <div class="absolute bottom-3 right-3 z-30 flex flex-col gap-3">
                                           <button type="button"
    class="btn-favorito inline-flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 bg-white shadow-sm transition hover:border-red-400"
    data-url="{{ route('web.tienda.favoritos.toggle', $producto->id) }}"
    data-favorito="{{ $producto->es_favorito ? '1' : '0' }}"
    onclick="event.preventDefault(); event.stopPropagation();"
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
                                                class="btn-share-product inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/70 bg-white/95 text-slate-700 shadow-lg backdrop-blur transition hover:scale-105 hover:border-[#0050b0] hover:text-[#0050b0]"
                                                data-title="{{ $producto->nombre }}"
                                                data-url="{{ route('web.tienda.producto', $producto->codigo) }}"
                                                onclick="event.preventDefault(); event.stopPropagation();"
                                                title="Compartir">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                                      <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M7.926 10.898 15 7.727m-7.074 5.39L15 16.29M8 12a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm12 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm0-11a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>

                                                </svg>
                                                

                                            </button>
                                        </div>

                                        <div class="aspect-[4/4.35] overflow-hidden">
                                            <img src="{{ $producto->imagen_principal_url }}"
                                                data-main="{{ $producto->imagen_principal_url }}"
                                                data-hover="{{ $segundaImagen }}" alt="{{ $producto->nombre }}"
                                                class="product-image h-full w-full object-cover transition duration-500 ease-out">
                                        </div>

                                        <div
                                            class="pointer-events-none absolute inset-x-0 bottom-0 z-10 bg-gradient-to-t from-slate-950/55 via-slate-950/12 to-transparent px-5 py-4">
                                            <div
                                                class="text-left text-[11px] font-bold uppercase tracking-[0.22em] text-white/95">
                                                Ver detalles
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <div class="flex flex-1 flex-col px-3 pt-5">
                                    @if ($marcaLogo)
                                        <div class="mb-4 flex items-center">
                                            <img src="{{ $marcaLogo }}" alt="{{ $producto->marca?->nombre }}"
                                                class="max-h-7 w-auto object-contain opacity-95">
                                        </div>
                                    @elseif($producto->marca?->nombre)
                                        <div
                                            class="mb-4 text-[12px] font-semibold uppercase tracking-[0.18em] text-slate-500">
                                            {{ $producto->marca->nombre }}
                                        </div>
                                    @endif

                                    <div class="text-[12px] font-semibold uppercase tracking-[0.18em] text-slate-500">
                                        {{ $producto->codigo }}
                                    </div>

                                    <a href="{{ route('web.tienda.producto', $producto->codigo) }}">
                                        <h3
                                            class="mt-2 min-h-[60px] text-[17px] font-semibold leading-6 text-slate-900 transition group-hover:text-[#0050b0]">
                                            {{ $producto->nombre }}
                                        </h3>
                                    </a>

                                    <div class="mt-4 flex items-end justify-between gap-4">
                                        <div>
                                            @if ($tieneOferta)
                                                <div class="text-[14px] font-medium text-slate-400 line-through">
                                                    {{ number_format($precioNormal, 2, '.', ',') }} Bs
                                                </div>

                                                <div class="mt-1 text-[22px] font-extrabold tracking-tight text-[#0b51b0]">
                                                    {{ number_format($precioFinal, 2, '.', ',') }} Bs
                                                </div>
                                            @else
                                                <div class="text-[22px] font-extrabold tracking-tight text-[#01c8c7]">
                                                    {{ number_format($precioFinal, 2, '.', ',') }} Bs
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="mt-auto pt-5">
                                        <form action="{{ route('web.tienda.carrito.agregar', $producto->id) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="flex w-full items-center justify-center gap-2 rounded-2xl bg-[#0d377a] px-5 py-3.5 text-[15px] font-semibold text-white transition hover:bg-[#0050b0]"
                                                onclick="event.stopPropagation();">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M3 3h2l.4 2m0 0L7 13h10l1.6-8H5.4zM7 13l-1 5h13M9 20a1 1 0 100 2 1 1 0 000-2zm9 0a1 1 0 100 2 1 1 0 000-2z" />
                                                </svg>
                                                Añadir al carrito
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div id="noResults"
                        class="hidden mt-8 rounded-[2rem] border border-slate-200 bg-white p-10 text-center shadow-[0_10px_30px_rgba(15,23,42,0.05)]">
                        <h3 class="text-xl font-bold text-slate-900">No encontramos productos</h3>
                        <p class="mt-2 text-slate-500">
                            Intenta con otra búsqueda o ajusta los filtros.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .brand-marquee {
            overflow: hidden;
            width: 100%;
            position: relative;
        }

        .brand-marquee__inner {
            display: flex;
            width: fit-content;
            animation: marqueeLoop 22s linear infinite;
            will-change: transform;
        }

        .brand-marquee:hover .brand-marquee__inner {
            animation-play-state: paused;
        }

        .brand-marquee__group {
            display: flex;
            align-items: center;
            gap: 4rem;
            padding: 1.3rem 2rem;
            flex-shrink: 0;
        }

        .brand-logo-item {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: transform 0.25s ease, opacity 0.25s ease;
        }

        .brand-logo-item:hover {
            transform: translateY(-2px) scale(1.04);
        }

        @keyframes marqueeLoop {
            0% {
                transform: translate3d(0, 0, 0);
            }

            100% {
                transform: translate3d(-50%, 0, 0);
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fadeItems = document.querySelectorAll('.js-fade');
            const productsGrid = document.getElementById('productsGrid');
            const cards = Array.from(document.querySelectorAll('.product-card'));
            const searchInput = document.getElementById('productSearch');
            const sortSelect = document.getElementById('sortProducts');
            const noResults = document.getElementById('noResults');
            const productsCounter = document.getElementById('productsCounter');

            const filterDisponible = document.getElementById('filter-disponible');
            const filterAgotado = document.getElementById('filter-agotado');
            const filterConsultar = document.getElementById('filter-consultar');
            const filterOferta = document.getElementById('filter-oferta');
            const categoryButtons = document.querySelectorAll('.category-filter');
            const brandButtons = document.querySelectorAll('.brand-filter');
            const brandSidebarButtons = document.querySelectorAll('.brand-filter-sidebar');
            const resetFiltersBtn = document.getElementById('resetFilters');

            let selectedCategory = '';
            let selectedBrand = '';

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-y-8');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.12
            });

            fadeItems.forEach((item) => observer.observe(item));

            categoryButtons.forEach((button) => {
                button.addEventListener('click', function() {
                    selectedCategory = this.dataset.category || '';

                    categoryButtons.forEach(btn => {
                        btn.classList.remove('font-semibold', 'text-[#0050b0]',
                            'bg-blue-50');
                        btn.classList.add('text-slate-700');
                    });

                    this.classList.remove('text-slate-700');
                    this.classList.add('font-semibold', 'text-[#0050b0]', 'bg-blue-50');

                    applyFilters();
                });
            });
document.querySelectorAll('.btn-favorito').forEach((button) => {
    button.addEventListener('click', async function(event) {
        event.preventDefault();
        event.stopPropagation();

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
            function syncBrandButtons() {
                brandButtons.forEach(btn => {
                    btn.classList.remove('scale-105', 'opacity-100');
                    btn.classList.add('opacity-90');

                    if ((btn.dataset.brand || '') === selectedBrand && selectedBrand !== '') {
                        btn.classList.add('scale-105', 'opacity-100');
                    }
                });

                brandSidebarButtons.forEach(btn => {
                    btn.classList.remove('border-blue-200', 'bg-blue-50', 'text-[#0050b0]');
                    btn.classList.add('border-slate-200', 'text-slate-700');

                    if ((btn.dataset.brand || '') === selectedBrand) {
                        btn.classList.remove('border-slate-200', 'text-slate-700');
                        btn.classList.add('border-blue-200', 'bg-blue-50', 'text-[#0050b0]');
                    }

                    if (selectedBrand === '' && (btn.dataset.brand || '') === '') {
                        btn.classList.remove('border-slate-200', 'text-slate-700');
                        btn.classList.add('border-blue-200', 'bg-blue-50', 'text-[#0050b0]');
                    }
                });
            }

            brandButtons.forEach((button) => {
                button.addEventListener('click', function() {
                    selectedBrand = this.dataset.brand || '';
                    syncBrandButtons();
                    applyFilters();
                });
            });

            brandSidebarButtons.forEach((button) => {
                button.addEventListener('click', function() {
                    selectedBrand = this.dataset.brand || '';
                    syncBrandButtons();
                    applyFilters();
                });
            });

            [filterDisponible, filterAgotado, filterConsultar, filterOferta].forEach((input) => {
                input.addEventListener('change', applyFilters);
            });

            if (searchInput) {
                searchInput.addEventListener('input', applyFilters);
            }

            if (resetFiltersBtn) {
                resetFiltersBtn.addEventListener('click', function() {
                    selectedCategory = '';
                    selectedBrand = '';
                    searchInput.value = '';
                    selectedSort = 'recentes';
                    if (sortDropdownLabel) {
                        sortDropdownLabel.textContent = 'Llegadas más recientes';
                    }
                    closeSortDropdown();
                    filterDisponible.checked = false;
                    filterAgotado.checked = false;
                    filterConsultar.checked = false;
                    filterOferta.checked = false;

                    categoryButtons.forEach(btn => {
                        btn.classList.remove('font-semibold', 'text-[#0050b0]', 'bg-blue-50');
                        btn.classList.add('text-slate-700');
                    });

                    const allCategoryBtn = document.querySelector('.category-filter[data-category=""]');
                    if (allCategoryBtn) {
                        allCategoryBtn.classList.remove('text-slate-700');
                        allCategoryBtn.classList.add('font-semibold', 'text-[#0050b0]', 'bg-blue-50');
                    }

                    syncBrandButtons();
                    applyFilters();
                });
            }
            let selectedSort = 'recentes';

            const sortDropdown = document.getElementById('sortDropdown');
            const sortDropdownButton = document.getElementById('sortDropdownButton');
            const sortDropdownMenu = document.getElementById('sortDropdownMenu');
            const sortDropdownLabel = document.getElementById('sortDropdownLabel');
            const sortDropdownIcon = document.getElementById('sortDropdownIcon');
            const sortOptions = document.querySelectorAll('.sort-option');

            function closeSortDropdown() {
                if (sortDropdownMenu) {
                    sortDropdownMenu.classList.add('hidden');
                }
                if (sortDropdownIcon) {
                    sortDropdownIcon.classList.remove('rotate-180');
                }
            }

            if (sortDropdownButton) {
                sortDropdownButton.addEventListener('click', function() {
                    sortDropdownMenu.classList.toggle('hidden');
                    sortDropdownIcon.classList.toggle('rotate-180');
                });
            }

            sortOptions.forEach((option) => {
                option.addEventListener('click', function() {
                    selectedSort = this.dataset.value || 'recentes';
                    sortDropdownLabel.textContent = this.textContent.trim();
                    closeSortDropdown();
                    applyFilters();
                });
            });

            document.addEventListener('click', function(event) {
                if (sortDropdown && !sortDropdown.contains(event.target)) {
                    closeSortDropdown();
                }
            });

            function applyFilters() {
                const term = (searchInput.value || '').trim().toLowerCase();
                const disponible = filterDisponible.checked;
                const agotado = filterAgotado.checked;
                const consultar = filterConsultar.checked;
                const oferta = filterOferta.checked;
                const sort = selectedSort;

                let visibleCards = cards.filter(card => {
                    const name = (card.dataset.name || '').toLowerCase();
                    const category = card.dataset.category || '';
                    const brand = card.dataset.brand || '';
                    const stock = card.dataset.stock || '';
                    const hasOffer = card.dataset.offer === '1';

                    const matchesSearch = !term || name.includes(term);
                    const matchesCategory = !selectedCategory || category === selectedCategory;
                    const matchesBrand = !selectedBrand || brand === selectedBrand;

                    let matchesStock = true;
                    const anyStockFilter = disponible || agotado || consultar;

                    if (anyStockFilter) {
                        matchesStock =
                            (disponible && stock === 'disponible') ||
                            (agotado && stock === 'agotado') ||
                            (consultar && stock === 'consultar_stock');
                    }

                    const matchesOffer = !oferta || hasOffer;

                    return matchesSearch && matchesCategory && matchesBrand && matchesStock && matchesOffer;
                });

                visibleCards.sort((a, b) => {
                    const priceA = parseFloat(a.dataset.price || '0');
                    const priceB = parseFloat(b.dataset.price || '0');
                    const nameA = (a.dataset.name || '').toLowerCase();
                    const nameB = (b.dataset.name || '').toLowerCase();
                    const orderA = parseInt(a.dataset.order || '0', 10);
                    const orderB = parseInt(b.dataset.order || '0', 10);

                    switch (sort) {
                        case 'precio_asc':
                            return priceA - priceB;
                        case 'precio_desc':
                            return priceB - priceA;
                        case 'nombre_asc':
                            return nameA.localeCompare(nameB, 'es');
                        default:
                            return orderA - orderB;
                    }
                });

                cards.forEach(card => card.classList.add('hidden'));

                visibleCards.forEach(card => {
                    card.classList.remove('hidden');
                    productsGrid.appendChild(card);
                });

                if (noResults) {
                    noResults.classList.toggle('hidden', visibleCards.length > 0);
                }

                if (productsCounter) {
                    productsCounter.textContent = `${visibleCards.length} resultados`;
                }
            }

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

            document.querySelectorAll('.product-image').forEach((img) => {
                const main = img.dataset.main;
                const hover = img.dataset.hover;
                const card = img.closest('.group');

                if (hover && hover !== main && card) {
                    card.addEventListener('mouseenter', () => {
                        img.src = hover;
                    });

                    card.addEventListener('mouseleave', () => {
                        img.src = main;
                    });
                }
            });

            syncBrandButtons();
            applyFilters();
        });
    </script>
@endsection
