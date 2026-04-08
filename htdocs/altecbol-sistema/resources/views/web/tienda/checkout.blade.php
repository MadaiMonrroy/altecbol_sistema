@extends('layouts.web')

@section('title', 'Checkout | ALTECBOL')

@section('content')
<section class="relative overflow-hidden bg-slate-950">
    <div class="absolute inset-0">
        <img
            src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1600&q=80"
            alt="Checkout ALTECBOL"
            class="h-full w-full object-cover opacity-20"
        >
    </div>

    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(1,211,209,0.16),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(0,80,176,0.32),_transparent_35%),linear-gradient(to_right,_rgba(2,6,23,0.96),_rgba(0,80,176,0.88),_rgba(2,6,23,0.96))]"></div>

    <div class="relative max-w-7xl mx-auto px-6 py-10 md:py-12 pt-24 pb-5 md:pt-36 md:pb-12">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <a href="{{ route('web.tienda.carrito') }}"
               class="inline-flex w-fit items-center gap-2 rounded-2xl border border-white/15 bg-white/10 px-4 py-2.5 text-sm font-semibold text-white/95 backdrop-blur-md transition hover:bg-white/15 hover:text-white -ml-4 md:-ml-20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>
                Volver al carrito
            </a>

            <div class="text-left md:text-right">
                <h1 class="text-[24px] md:text-[32px] font-bold leading-tight tracking-tight text-white">
                    Finalizar compra
                </h1>
                <p class="mt-1 text-sm text-slate-200">
                    Confirma tus datos antes de generar tu pedido.
                </p>
            </div>
        </div>
    </div>

    <div class="relative -mt-8">
        <svg viewBox="0 0 1440 120" class="h-20 w-full fill-slate-50" preserveAspectRatio="none">
            <path d="M0,96L80,85.3C160,75,320,53,480,48C640,43,800,53,960,64C1120,75,1280,85,1360,90.7L1440,96L1440,120L0,120Z"></path>
        </svg>
    </div>
</section>

<section class="bg-slate-50 pb-12">
    <div class="max-w-[1450px] mx-auto px-4 sm:px-6 lg:px-8">
        <form action="{{ route('web.tienda.checkout.procesar') }}" method="POST">
            @csrf

            <div class="grid gap-6 xl:grid-cols-[minmax(0,1fr)_420px] 2xl:grid-cols-[minmax(0,1fr)_460px]">

                {{-- DATOS DEL CLIENTE --}}
                <div class="space-y-5">
                    <div class="rounded-[1.6rem] border border-slate-200 bg-white p-5 md:p-6 shadow-[0_10px_24px_rgba(15,23,42,0.04)]">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </span>
                            <div>
                                <h2 class="text-[20px] font-bold text-slate-900">Datos de contacto</h2>
                                <p class="text-sm text-slate-500">Confirma la información del pedido.</p>
                            </div>
                        </div>

                        <div class="mt-6 grid gap-5 md:grid-cols-2">
                            <div class="md:col-span-2">
                                <label for="nombre_cliente" class="mb-2 block text-sm font-semibold text-slate-600">
                                    Nombre completo
                                </label>
                                <input
                                    type="text"
                                    id="nombre_cliente"
                                    name="nombre_cliente"
                                    value="{{ old('nombre_cliente', $user->name ?? '') }}"
                                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-800 outline-none transition focus:border-[#0050b0] focus:ring-4 focus:ring-blue-100"
                                    required
                                >
                                @error('nombre_cliente')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="telefono_cliente" class="mb-2 block text-sm font-semibold text-slate-600">
                                    Teléfono
                                </label>
                                <input
                                    type="text"
                                    id="telefono_cliente"
                                    name="telefono_cliente"
                                    value="{{ old('telefono_cliente', $user->telefono ?? '') }}"
                                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-800 outline-none transition focus:border-[#0050b0] focus:ring-4 focus:ring-blue-100"
                                    required
                                >
                                @error('telefono_cliente')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email_cliente" class="mb-2 block text-sm font-semibold text-slate-600">
                                    Correo electrónico
                                </label>
                                <input
                                    type="email"
                                    id="email_cliente"
                                    name="email_cliente"
                                    value="{{ old('email_cliente', $user->email ?? '') }}"
                                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-800 outline-none transition focus:border-[#0050b0] focus:ring-4 focus:ring-blue-100"
                                >
                                @error('email_cliente')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="direccion_cliente" class="mb-2 block text-sm font-semibold text-slate-600">
                                    Dirección / referencia
                                </label>
                                <textarea
                                    id="direccion_cliente"
                                    name="direccion_cliente"
                                    rows="4"
                                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-800 outline-none transition focus:border-[#0050b0] focus:ring-4 focus:ring-blue-100"
                                >{{ old('direccion_cliente') }}</textarea>
                                @error('direccion_cliente')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="observaciones" class="mb-2 block text-sm font-semibold text-slate-600">
                                    Observaciones
                                </label>
                                <textarea
                                    id="observaciones"
                                    name="observaciones"
                                    rows="4"
                                    placeholder="Escribe una nota adicional para tu pedido..."
                                    class="w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-800 outline-none transition focus:border-[#0050b0] focus:ring-4 focus:ring-blue-100"
                                >{{ old('observaciones', $carrito->observaciones) }}</textarea>
                                @error('observaciones')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[1.6rem] border border-slate-200 bg-white p-5 md:p-6 shadow-[0_10px_24px_rgba(15,23,42,0.04)]">
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18" />
                                </svg>
                            </span>
                            <div>
                                <h2 class="text-[20px] font-bold text-slate-900">Productos del pedido</h2>
                                <p class="text-sm text-slate-500">Resumen de los productos que estás comprando.</p>
                            </div>
                        </div>

                        <div class="mt-6 space-y-4">
                            @foreach($carrito->items as $item)
                                <article class="rounded-[1.3rem] border border-slate-200 bg-slate-50 p-4">
                                    <div class="grid gap-4 md:grid-cols-[90px_1fr_auto] md:items-center">
                                        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white">
                                            <img
                                                src="{{ $item->producto->imagen_principal_url ?? asset('websitio/ing/default.webp') }}"
                                                alt="{{ $item->producto->nombre }}"
                                                class="h-[90px] w-full object-cover"
                                            >
                                        </div>

                                        <div>
                                            <h3 class="text-[16px] font-semibold text-slate-900">
                                                {{ $item->producto->nombre }}
                                            </h3>

                                            <div class="mt-1 space-y-1 text-sm text-slate-500">
                                                <p>Código: {{ $item->producto->codigo }}</p>
                                                <p>Cantidad: {{ $item->cantidad }}</p>
                                                <p>Precio unitario: <span class="font-semibold text-slate-700">Bs {{ number_format($item->precio_unitario, 2, '.', ',') }}</span></p>
                                            </div>
                                        </div>

                                        <div class="text-right">
                                            <p class="text-sm text-slate-500">Subtotal</p>
                                            <p class="mt-1 text-[20px] font-extrabold text-[#0b51b0]">
                                                Bs {{ number_format($item->subtotal, 2, '.', ',') }}
                                            </p>
                                        </div>
                                    </div>
                                </article>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- RESUMEN --}}
                <aside class="h-fit rounded-[1.6rem] border border-slate-200 bg-white p-5 md:p-6 shadow-[0_10px_24px_rgba(15,23,42,0.04)] xl:sticky xl:top-24">
                    <div class="flex items-center gap-3">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-slate-100 text-slate-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2m0 0L7 13h10l1.6-8H5.4zM7 13l-1 5h13M9 20a1 1 0 100 2 1 1 0 000-2zm9 0a1 1 0 100 2 1 1 0 000-2z" />
                            </svg>
                        </span>
                        <div>
                            <h2 class="text-[20px] font-bold text-slate-900">Resumen del pedido</h2>
                            <p class="text-sm text-slate-500">Total de tu compra.</p>
                        </div>
                    </div>

                    <div class="mt-6 space-y-4 border-t border-slate-200 pt-5 text-[15px]">
                        <div class="flex items-center justify-between">
                            <span class="text-slate-500">Subtotal</span>
                            <span class="font-semibold text-slate-900">
                                Bs {{ number_format($carrito->subtotal, 2, '.', ',') }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-slate-500">Descuento</span>
                            <span class="font-semibold text-slate-900">
                                Bs {{ number_format($carrito->descuento, 2, '.', ',') }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between border-t border-slate-200 pt-4">
                            <span class="text-[16px] font-bold text-slate-900">Total</span>
                            <span class="text-[26px] font-extrabold text-[#01c8c7]">
                                Bs {{ number_format($carrito->total, 2, '.', ',') }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 rounded-[1.3rem] border border-blue-100 bg-blue-50 p-4 text-sm text-slate-600">
                        Al confirmar, generaremos tu pedido y te mostraremos el QR para el pago.
                    </div>

                    <div class="mt-6 space-y-3">
                        <button type="submit"
                            class="flex w-full items-center justify-center rounded-2xl bg-[#0d377a] px-5 py-4 text-[15px] font-semibold text-white transition hover:bg-[#0050b0]">
                            Confirmar pedido
                        </button>

                        <a href="{{ route('web.tienda.carrito') }}"
                           class="flex w-full items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-[15px] font-semibold text-slate-700 transition hover:bg-slate-100">
                            Volver al carrito
                        </a>
                    </div>
                </aside>
            </div>
        </form>
    </div>
</section>
@endsection