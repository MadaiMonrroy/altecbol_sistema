@extends('layouts.web')

@section('title', 'Confirmación | ALTECBOL')

@section('content')
    <section class="relative overflow-hidden bg-slate-950">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1600&q=80"
                alt="Confirmación de pedido" class="h-full w-full object-cover opacity-20">
        </div>

        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(1,211,209,0.16),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(0,80,176,0.32),_transparent_35%),linear-gradient(to_right,_rgba(2,6,23,0.96),_rgba(0,80,176,0.88),_rgba(2,6,23,0.96))]">
        </div>

        <div class="relative max-w-7xl mx-auto px-6 py-10 md:py-12 pt-24 pb-5 md:pt-36 md:pb-12">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <a href="{{ route('web.tienda.index') }}"
                    class="inline-flex w-fit items-center gap-2 rounded-2xl border border-white/15 bg-white/10 px-4 py-2.5 text-sm font-semibold text-white/95 backdrop-blur-md transition hover:bg-white/15 hover:text-white -ml-4 md:-ml-20">
                    Volver a la tienda
                </a>

                <div class="text-left md:text-right">
                    <h1 class="text-[24px] md:text-[32px] font-bold leading-tight tracking-tight text-white">
                        Pedido generado correctamente
                    </h1>
                    <p class="mt-1 text-sm text-slate-200">
                        Completa tu pago y luego repórtalo por WhatsApp.
                    </p>
                </div>
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
            <div class="grid gap-6 xl:grid-cols-[1fr_400px]">

                <div class="space-y-5">
                    <div
                        class="rounded-[1.6rem] border border-slate-200 bg-white p-5 md:p-6 shadow-[0_10px_24px_rgba(15,23,42,0.04)]">
                        <div class="flex flex-wrap items-center justify-between gap-4">
                            <div>
                                <p class="text-sm font-medium text-slate-500">Número de orden</p>
                                <h2 class="mt-1 text-[24px] font-extrabold tracking-tight text-slate-900">
                                    {{ $pedido->numero_orden }}
                                </h2>
                            </div>

                            <span
                                class="inline-flex rounded-xl px-4 py-2 text-xs font-bold
                            @if ($pedido->estado === 'pendiente_pago') bg-amber-100 text-amber-700
                            @elseif($pedido->estado === 'pago_reportado') bg-blue-100 text-blue-700
                            @elseif($pedido->estado === 'pagado') bg-lime-100 text-lime-700
                            @else bg-slate-100 text-slate-700 @endif">
                                {{ str_replace('_', ' ', ucfirst($pedido->estado)) }}
                            </span>
                        </div>

                        <div class="mt-6 grid gap-4 md:grid-cols-2 text-[15px]">
                            <div>
                                <p class="text-slate-500">Cliente</p>
                                <p class="font-semibold text-slate-900">{{ $pedido->nombre_cliente }}</p>
                            </div>

                            <div>
                                <p class="text-slate-500">Teléfono</p>
                                <p class="font-semibold text-slate-900">{{ $pedido->telefono_cliente }}</p>
                            </div>

                            @if ($pedido->email_cliente)
                                <div>
                                    <p class="text-slate-500">Correo</p>
                                    <p class="font-semibold text-slate-900">{{ $pedido->email_cliente }}</p>
                                </div>
                            @endif

                            <div>
                                <p class="text-slate-500">Método de pago</p>
                                <p class="font-semibold text-slate-900">QR</p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="rounded-[1.6rem] border border-slate-200 bg-white p-5 md:p-6 shadow-[0_10px_24px_rgba(15,23,42,0.04)]">
                        <h2 class="text-[20px] font-bold text-slate-900">Productos del pedido</h2>

                        <div class="mt-5 space-y-3">
                            @foreach ($pedido->items as $item)
                                <div
                                    class="flex items-center justify-between gap-4 rounded-[1.2rem] border border-slate-200 bg-slate-50 px-4 py-3">
                                    <div>
                                        <p class="font-semibold text-slate-900">{{ $item->nombre_producto }}</p>
                                        <p class="text-sm text-slate-500">Cantidad: {{ $item->cantidad }}</p>
                                    </div>

                                    <div class="text-right">
                                        <p class="text-sm text-slate-500">Subtotal</p>
                                        <p class="font-extrabold text-[#0b51b0]">
                                            Bs {{ number_format($item->subtotal, 2, '.', ',') }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <aside
                    class="h-fit rounded-[1.6rem] border border-slate-200 bg-white p-5 md:p-6 shadow-[0_10px_24px_rgba(15,23,42,0.04)] xl:sticky xl:top-24">
                    <h2 class="text-[20px] font-bold text-slate-900">Pago por QR</h2>

                    <div class="mt-5 rounded-[1.5rem] border border-slate-200 bg-slate-50 p-4 text-center">
                        <img src="{{ asset('images/qr.png') }}" alt="QR de pago"
                            class="mx-auto h-auto w-full max-w-[260px] rounded-2xl border border-slate-200 bg-white p-3">
                    </div>

                    <div class="mt-5 space-y-3 border-t border-slate-200 pt-5 text-[15px]">
                        <div class="flex items-center justify-between">
                            <span class="text-slate-500">Subtotal</span>
                            <span class="font-semibold text-slate-900">Bs
                                {{ number_format($pedido->subtotal, 2, '.', ',') }}</span>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="text-slate-500">Descuento</span>
                            <span class="font-semibold text-slate-900">Bs
                                {{ number_format($pedido->descuento, 2, '.', ',') }}</span>
                        </div>

                        <div class="flex items-center justify-between border-t border-slate-200 pt-4">
                            <span class="text-[16px] font-bold text-slate-900">Total</span>
                            <span class="text-[26px] font-extrabold text-[#01c8c7]">
                                Bs {{ number_format($pedido->total, 2, '.', ',') }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 rounded-[1.3rem] border border-blue-100 bg-blue-50 p-4 text-sm text-slate-600">
                        Realiza el pago escaneando el QR. Luego presiona <strong>Ya pagué</strong> para notificarnos por
                        WhatsApp.
                    </div>

                    <div class="mt-6 space-y-3">
                        @if ($pedido->estado === 'pendiente_pago')
                            <form id="form-reportar-pago"
                                action="{{ route('web.tienda.confirmacion.reportar-pago', $pedido->numero_orden) }}"
                                method="POST">
                                @csrf

                                <button type="button" onclick="reportarPagoYWhatsapp()"
                                    class="flex w-full items-center justify-center rounded-2xl bg-[#0d377a] px-5 py-4 text-[15px] font-semibold text-white transition hover:bg-[#0050b0]">
                                    Ya pagué
                                </button>
                            </form>
                        @else
                            <div
                                class="flex w-full items-center justify-center rounded-2xl bg-emerald-50 px-5 py-4 text-[15px] font-semibold text-emerald-700 border border-emerald-200">
                                ✔ Pago ya reportado
                            </div>
                        @endif

                        @php
                            $telefonoWhatsapp = preg_replace('/\D+/', '', $pedido->soporte_whatsapp ?: '59164347465');
                            $mensajeWhatsapp =
                                "Hola, ya realicé el pago de mi pedido.\n\n" .
                                "Número de orden: {$pedido->numero_orden}\n" .
                                "Cliente: {$pedido->nombre_cliente}\n" .
                                'Monto: Bs ' .
                                number_format((float) $pedido->total, 2, '.', ',') .
                                "\n" .
                                "Teléfono: {$pedido->telefono_cliente}\n\n" .
                                'Quedo atento a la verificación. Gracias.';
                        @endphp

                        <script>
                            function reportarPagoYWhatsapp() {
                                const telefono = @json($telefonoWhatsapp);
                                const mensaje = @json($mensajeWhatsapp);
                                const urlWhatsapp = `https://wa.me/${telefono}?text=${encodeURIComponent(mensaje)}`;

                                window.open(urlWhatsapp, '_blank');
                                document.getElementById('form-reportar-pago').submit();
                            }
                        </script>

                        <a href="{{ route('web.tienda.index') }}"
                            class="flex w-full items-center justify-center rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4 text-[15px] font-semibold text-slate-700 transition hover:bg-slate-100">
                            Seguir comprando
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
