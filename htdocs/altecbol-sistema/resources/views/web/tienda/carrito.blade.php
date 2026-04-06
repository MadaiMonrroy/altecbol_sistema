@extends('layouts.web')

@section('title', 'Carrito | ALTECBOL')

@section('content')
    <section class="relative overflow-hidden bg-slate-950">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1556740749-887f6717d7e4?auto=format&fit=crop&w=1600&q=80"
                alt="Carrito de compras" class="h-full w-full object-cover opacity-20">
        </div>

        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(1,211,209,0.16),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(0,80,176,0.32),_transparent_35%),linear-gradient(to_right,_rgba(2,6,23,0.96),_rgba(0,80,176,0.88),_rgba(2,6,23,0.96))]">
        </div>

        <div class="relative max-w-7xl mx-auto px-6 py-10 md:py-12 pt-24 pb-5 md:pt-36 md:pb-12">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-cyan-200/90">
                        Tu compra
                    </p>
                    <h1 class="mt-2 text-[28px] md:text-[38px] font-extrabold tracking-tight text-white">
                        Carrito de compras
                    </h1>
                    <p class="mt-2 max-w-2xl text-sm md:text-base text-slate-200">
                        Ajusta cantidades en tiempo real. El subtotal y total se recalculan automáticamente.
                    </p>
                </div>

                <a href="{{ route('web.tienda.index') }}"
                    class="inline-flex w-fit items-center gap-2 rounded-2xl border border-white/15 bg-white/10 px-4 py-2.5 text-sm font-semibold text-white/95 backdrop-blur-md transition hover:bg-white/15 hover:text-white">
                    Seguir comprando
                </a>
            </div>
        </div>

        <div class="relative -mt-8">
            <svg viewBox="0 0 1440 120" class="h-20 w-full fill-slate-50" preserveAspectRatio="none">
                <path
                    d="M0,96L80,85.3C160,75,320,53,480,48C640,43,800,53,960,64C1120,75,1280,85,1360,90.7L1440,96L1440,120L0,120Z">
                </path>
            </svg>
        </div>
    </section>

    <section class="bg-slate-50 pb-12">
        <div class="max-w-[1450px] mx-auto px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div
                    class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('warning'))
                <div
                    class="mb-6 rounded-2xl border border-amber-200 bg-amber-50 px-4 py-3 text-sm font-medium text-amber-700">
                    {{ session('warning') }}
                </div>
            @endif

            @if (!$carrito || $carrito->items->isEmpty())
                <div
                    class="rounded-[1.8rem] border border-slate-200 bg-white p-8 md:p-10 text-center shadow-[0_10px_24px_rgba(15,23,42,0.04)]">
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-slate-100">
                        <svg class="h-9 w-9 text-slate-400" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1 5h12m-9-1a1 1 0 100 2 1 1 0 000-2zm8 0a1 1 0 100 2 1 1 0 000-2z" />
                        </svg>
                    </div>

                    <h2 class="mt-5 text-2xl font-bold text-slate-900">Tu carrito está vacío</h2>
                    <p class="mt-2 text-slate-500">
                        Agrega productos para continuar con tu compra.
                    </p>

                    <a href="{{ route('web.tienda.index') }}"
                        class="mt-6 inline-flex items-center justify-center rounded-2xl bg-[#0d377a] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#0050b0]">
                        Ir a la tienda
                    </a>
                </div>
            @else
                <div class="grid gap-6 xl:grid-cols-[1fr_390px]">
                    <div class="space-y-4">
                        @foreach ($carrito->items as $item)
                            @php
                                $producto = $item->producto;
                                $imagen = $producto->imagen_principal_url ?? asset('websitio/ing/default.webp');
                            @endphp

                            <div class="carrito-item rounded-[1.6rem] border border-slate-200 bg-white p-4 md:p-5 shadow-[0_10px_24px_rgba(15,23,42,0.04)]"
                                data-item-id="{{ $item->id }}">
                                <div class="flex flex-col gap-4 sm:flex-row">
                                    <a href="{{ $producto ? route('web.tienda.producto', $producto->codigo) : '#' }}"
                                        class="mx-auto flex h-[130px] w-[130px] shrink-0 items-center justify-center overflow-hidden rounded-[1.3rem] border border-slate-200 bg-slate-50 sm:mx-0 md:h-[150px] md:w-[150px]">
                                        <img src="{{ $imagen }}" alt="{{ $item->nombre_producto }}"
                                            class="h-full w-full object-contain p-3">
                                    </a>

                                    <div class="min-w-0 flex-1">
                                        <div class="flex flex-col gap-3 md:flex-row md:items-start md:justify-between">
                                            <div class="min-w-0">
                                                <h2
                                                    class="text-[18px] md:text-[20px] font-bold leading-tight text-slate-900">
                                                    {{ $item->nombre_producto }}
                                                </h2>

                                                @if ($producto?->marca?->nombre)
                                                    <p class="mt-1 text-sm text-slate-500">
                                                        Marca: {{ $producto->marca->nombre }}
                                                    </p>
                                                @endif

                                                <p class="mt-2 text-sm text-slate-500">
                                                    Precio unitario:
                                                    <span class="font-semibold text-slate-800">
                                                        Bs {{ number_format($item->precio_unitario, 2, '.', ',') }}
                                                    </span>
                                                </p>
                                            </div>

                                            <button type="button"
                                                class="btn-eliminar inline-flex h-11 w-11 items-center justify-center self-end rounded-xl border border-red-100 bg-red-50 text-red-600 transition hover:bg-red-100 hover:text-red-700 md:self-start"
                                                data-url="{{ route('web.tienda.carrito.eliminar', $item->id) }}"
                                                aria-label="Eliminar producto">
                                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 6h18" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 6V4h8v2" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19 6l-1 14H6L5 6" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 11v6" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 11v6" />
                                                </svg>
                                            </button>
                                        </div>

                                        <div class="mt-5 flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
                                            <div>
                                                <label class="mb-2 block text-sm font-medium text-slate-600">
                                                    Cantidad
                                                </label>

                                                <div
                                                    class="inline-flex items-center overflow-hidden rounded-2xl border border-slate-200 bg-slate-50">
                                                    <button type="button"
                                                        class="btn-cantidad px-4 py-3 text-lg font-bold text-slate-700 transition hover:bg-slate-100"
                                                        data-action="restar" data-item-id="{{ $item->id }}">
                                                        -
                                                    </button>

                                                    <input type="number" min="1" value="{{ $item->cantidad }}"
                                                        class="input-cantidad h-[48px] w-[72px] border-x border-slate-200 bg-white text-center text-[15px] font-semibold text-slate-900 outline-none"
                                                        data-item-id="{{ $item->id }}"
                                                        data-url="{{ route('web.tienda.carrito.actualizar', $item->id) }}">

                                                    <button type="button"
                                                        class="btn-cantidad px-4 py-3 text-lg font-bold text-slate-700 transition hover:bg-slate-100"
                                                        data-action="sumar" data-item-id="{{ $item->id }}">
                                                        +
                                                    </button>
                                                </div>

                                                <p class="mt-2 text-xs text-slate-400">
                                                    Se actualiza automáticamente
                                                </p>
                                            </div>

                                            <div class="text-left lg:text-right">
                                                <p class="text-sm text-slate-500">Subtotal</p>
                                                <p
                                                    class="item-subtotal text-[24px] font-extrabold tracking-tight text-[#0b51b0]">
                                                    Bs {{ number_format($item->subtotal, 2, '.', ',') }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="loading-indicator mt-3 hidden text-xs font-medium text-slate-400">
                                            Actualizando...
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <aside
                        class="h-fit rounded-[1.6rem] border border-slate-200 bg-white p-5 md:p-6 shadow-[0_10px_24px_rgba(15,23,42,0.04)] xl:sticky xl:top-24">
                        <h2 class="text-[20px] font-bold text-slate-900">Resumen del pedido</h2>

                        <div class="mt-5 space-y-4 border-t border-slate-200 pt-5 text-[15px]">
                            <div class="flex items-center justify-between">
                                <span class="text-slate-500">Subtotal</span>
                                <span id="carrito-subtotal" class="font-semibold text-slate-900">
                                    Bs {{ number_format($carrito->subtotal, 2, '.', ',') }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span class="text-slate-500">Descuento</span>
                                <span id="carrito-descuento" class="font-semibold text-slate-900">
                                    Bs {{ number_format($carrito->descuento, 2, '.', ',') }}
                                </span>
                            </div>

                            <div class="flex items-center justify-between border-t border-slate-200 pt-4">
                                <span class="text-[16px] font-bold text-slate-900">Total</span>
                                <span id="carrito-total" class="text-[28px] font-extrabold text-[#01c8c7]">
                                    Bs {{ number_format($carrito->total, 2, '.', ',') }}
                                </span>
                            </div>
                        </div>

                        <div class="mt-6 rounded-[1.3rem] border border-blue-100 bg-blue-50 p-4 text-sm text-slate-600">
                            Cambia las cantidades y el carrito se guarda automáticamente.
                        </div>

                        <div class="mt-6 space-y-3">
                            <a href="{{ route('web.tienda.checkout') }}"
                                class="flex w-full items-center justify-center rounded-2xl bg-[#0d377a] px-5 py-4 text-[15px] font-semibold text-white transition hover:bg-[#0050b0]">
                                Continuar compra
                            </a>

                            <a href="{{ route('web.tienda.index') }}"
                                class="flex w-full items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-[15px] font-semibold text-slate-700 transition hover:bg-slate-100">
                                Seguir comprando
                            </a>
                        </div>
                    </aside>
                </div>
            @endif
        </div>
    </section>

    @if ($carrito && $carrito->items->isNotEmpty())
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const csrfToken = '{{ csrf_token() }}';
                let requestTimers = {};

                function actualizarResumen(data) {
                    document.getElementById('carrito-subtotal').textContent = 'Bs ' + data.carrito_subtotal;
                    document.getElementById('carrito-descuento').textContent = 'Bs ' + data.carrito_descuento;
                    document.getElementById('carrito-total').textContent = 'Bs ' + data.carrito_total;
                }

                function mostrarLoading(itemId, mostrar = true) {
                    const card = document.querySelector(`.carrito-item[data-item-id="${itemId}"]`);
                    if (!card) return;

                    const loading = card.querySelector('.loading-indicator');
                    if (!loading) return;

                    loading.classList.toggle('hidden', !mostrar);
                }

                function actualizarCantidad(itemId, cantidad, url) {
                    cantidad = parseInt(cantidad, 10);

                    if (isNaN(cantidad) || cantidad < 1) {
                        cantidad = 1;
                    }

                    const card = document.querySelector(`.carrito-item[data-item-id="${itemId}"]`);
                    const input = card?.querySelector('.input-cantidad');
                    if (input) {
                        input.value = cantidad;
                    }

                    mostrarLoading(itemId, true);

                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: JSON.stringify({
                                cantidad
                            })
                        })
                        .then(async response => {
                            const data = await response.json();

                            if (!response.ok) {
                                throw data;
                            }

                            return data;
                        })
                        .then(data => {
                            const currentCard = document.querySelector(
                                `.carrito-item[data-item-id="${data.item_id}"]`);
                            if (!currentCard) return;

                            const subtotalEl = currentCard.querySelector('.item-subtotal');
                            const cantidadEl = currentCard.querySelector('.input-cantidad');

                            if (subtotalEl) {
                                subtotalEl.textContent = 'Bs ' + data.item_subtotal;
                            }

                            if (cantidadEl) {
                                cantidadEl.value = data.cantidad;
                            }

                            actualizarResumen(data);
                        })
                        .catch(error => {
                            console.error(error);
                            alert('No se pudo actualizar la cantidad.');
                        })
                        .finally(() => {
                            mostrarLoading(itemId, false);
                        });
                }

                function eliminarItem(itemId, url) {
                    const card = document.querySelector(`.carrito-item[data-item-id="${itemId}"]`);
                    if (!card) return;

                    fetch(url, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken,
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(async response => {
                            const data = await response.json();

                            if (!response.ok) {
                                throw data;
                            }

                            return data;
                        })
                        .then(data => {
                            const currentCard = document.querySelector(
                                `.carrito-item[data-item-id="${data.item_id}"]`);
                            if (currentCard) {
                                currentCard.remove();
                            }

                            if (data.carrito_vacio) {
                                window.location.reload();
                                return;
                            }

                            actualizarResumen(data);
                        })
                        .catch(error => {
                            console.error(error);
                            alert('No se pudo eliminar el producto.');
                        });
                }

                document.querySelectorAll('.btn-cantidad').forEach(button => {
                    button.addEventListener('click', () => {
                        const itemId = button.dataset.itemId;
                        const card = document.querySelector(`.carrito-item[data-item-id="${itemId}"]`);
                        const input = card?.querySelector('.input-cantidad');

                        if (!input) return;

                        let cantidad = parseInt(input.value, 10) || 1;

                        if (button.dataset.action === 'sumar') {
                            cantidad++;
                        } else {
                            cantidad = Math.max(1, cantidad - 1);
                        }

                        input.value = cantidad;

                        clearTimeout(requestTimers[itemId]);
                        requestTimers[itemId] = setTimeout(() => {
                            actualizarCantidad(itemId, cantidad, input.dataset.url);
                        }, 250);
                    });
                });

                document.querySelectorAll('.input-cantidad').forEach(input => {
                    input.addEventListener('input', () => {
                        const itemId = input.dataset.itemId;
                        let cantidad = parseInt(input.value, 10);

                        if (isNaN(cantidad) || cantidad < 1) {
                            cantidad = 1;
                        }

                        clearTimeout(requestTimers[itemId]);
                        requestTimers[itemId] = setTimeout(() => {
                            actualizarCantidad(itemId, cantidad, input.dataset.url);
                        }, 500);
                    });

                    input.addEventListener('blur', () => {
                        const itemId = input.dataset.itemId;
                        let cantidad = parseInt(input.value, 10);

                        if (isNaN(cantidad) || cantidad < 1) {
                            cantidad = 1;
                        }

                        input.value = cantidad;
                        actualizarCantidad(itemId, cantidad, input.dataset.url);
                    });
                });

                document.querySelectorAll('.btn-eliminar').forEach(button => {
                    button.addEventListener('click', () => {
                        const itemId = button.closest('.carrito-item')?.dataset.itemId;
                        if (!itemId) return;

                        eliminarItem(itemId, button.dataset.url);
                    });
                });
            });
        </script>
    @endif
@endsection
