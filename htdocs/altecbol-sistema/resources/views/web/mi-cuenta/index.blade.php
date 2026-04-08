@extends('layouts.web')

@section('title', 'Mi cuenta | ALTECBOL')

@section('content')

    <section class="relative overflow-hidden bg-slate-950">
        <div
            class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(1,211,209,0.14),_transparent_26%),radial-gradient(circle_at_bottom_right,_rgba(0,80,176,0.28),_transparent_34%),linear-gradient(to_right,_rgba(2,6,23,0.96),_rgba(0,80,176,0.88),_rgba(2,6,23,0.96))]">
        </div>

        <div class="relative max-w-7xl mx-auto px-6 md:px-10 xl:px-16 2xl:px-20 pt-28 pb-14">
            <div class="max-w-3xl">
                <h1 class="mt-5 text-3xl md:text-4xl font-bold leading-tight text-white">
                    Gestiona tu
                    <span class="text-[#01d3d1]">cuenta</span>
                    y revisa tu actividad
                </h1>

                <p class="mt-4 max-w-2xl text-base md:text-lg leading-7 text-slate-200">
                    Administra tu información personal, actualiza tu contraseña y consulta el estado de tu carrito y tus
                    pedidos.
                </p>
            </div>
        </div>

        <div class="relative -mt-8">
            <svg viewBox="0 0 1440 120" class="h-14 w-full fill-[#f9fafb]" preserveAspectRatio="none">
                <path
                    d="M0,96L80,85.3C160,75,320,53,480,48C640,43,800,53,960,64C1120,75,1280,85,1360,90.7L1440,96L1440,120L0,120Z">
                </path>
            </svg>
        </div>
    </section>

    <section class="pb-20 px-6 md:px-10 xl:px-16 2xl:px-20 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- COLUMNA IZQUIERDA --}}
                <div class="lg:col-span-1 space-y-8">

                    <div class="bg-white rounded-2xl shadow-[0_12px_35px_rgba(15,23,42,0.06)] p-6 border border-slate-100">
                        <h2 class="text-lg font-semibold mb-4 text-slate-900">
                            Información personal
                        </h2>

                        <form method="POST" action="{{ route('web.mi-cuenta.update') }}">
                            @csrf
                            @method('PATCH')

                            <div class="space-y-4">

                                <div>
                                    <label for="name" class="text-sm font-medium text-slate-600 block">
                                        Nombre
                                    </label>
                                    <input id="name" type="text" name="name"
                                        value="{{ old('name', $user->name) }}"
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 mt-1 text-slate-700 outline-none transition focus:border-[#0050b0] focus:bg-white focus:ring-4 focus:ring-blue-100 @error('name') border-red-500 @enderror">
                                    @error('name')
                                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="text-sm font-medium text-slate-600 block">
                                        Email
                                    </label>
                                    <input id="email" type="email" name="email"
                                        value="{{ old('email', $user->email) }}"
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 mt-1 text-slate-700 outline-none transition focus:border-[#0050b0] focus:bg-white focus:ring-4 focus:ring-blue-100 @error('email') border-red-500 @enderror">
                                    @error('email')
                                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="telefono" class="text-sm font-medium text-slate-600 block">
                                        Teléfono
                                    </label>
                                    <input id="telefono" type="text" name="telefono"
                                        value="{{ old('telefono', $user->telefono) }}"
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 mt-1 text-slate-700 outline-none transition focus:border-[#0050b0] focus:bg-white focus:ring-4 focus:ring-blue-100 @error('telefono') border-red-500 @enderror">
                                    @error('telefono')
                                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit"
                                    class="w-full rounded-xl bg-[#0d377a] text-white py-3 font-medium transition hover:bg-[#0050b0]">
                                    Guardar cambios
                                </button>

                            </div>
                        </form>
                    </div>

                    <div class="bg-white rounded-2xl shadow-[0_12px_35px_rgba(15,23,42,0.06)] p-6 border border-slate-100">
                        <h2 class="text-lg font-semibold mb-4 text-slate-900">
                            Cambiar contraseña
                        </h2>

                        <form method="POST" action="{{ route('web.mi-cuenta.password.update') }}">
                            @csrf
                            @method('PATCH')

                            <div class="space-y-4">

                                <div>
                                    <label for="current_password" class="text-sm font-medium text-slate-600 block">
                                        Contraseña actual
                                    </label>
                                    <input id="current_password" type="password" name="current_password"
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 mt-1 text-slate-700 outline-none transition focus:border-[#0050b0] focus:bg-white focus:ring-4 focus:ring-blue-100 @if ($errors->passwordUpdate->has('current_password')) border-red-500 @endif">
                                    @if ($errors->passwordUpdate->has('current_password'))
                                        <p class="text-sm text-red-600 mt-1">
                                            {{ $errors->passwordUpdate->first('current_password') }}
                                        </p>
                                    @endif
                                </div>

                                <div>
                                    <label for="password" class="text-sm font-medium text-slate-600 block">
                                        Nueva contraseña
                                    </label>
                                    <input id="password" type="password" name="password"
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 mt-1 text-slate-700 outline-none transition focus:border-[#0050b0] focus:bg-white focus:ring-4 focus:ring-blue-100 @if ($errors->passwordUpdate->has('password')) border-red-500 @endif">
                                    @if ($errors->passwordUpdate->has('password'))
                                        <p class="text-sm text-red-600 mt-1">
                                            {{ $errors->passwordUpdate->first('password') }}
                                        </p>
                                    @endif
                                </div>

                                <div>
                                    <label for="password_confirmation" class="text-sm font-medium text-slate-600 block">
                                        Confirmar nueva contraseña
                                    </label>
                                    <input id="password_confirmation" type="password" name="password_confirmation"
                                        class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2.5 mt-1 text-slate-700 outline-none transition focus:border-[#0050b0] focus:bg-white focus:ring-4 focus:ring-blue-100">
                                </div>

                                <button type="submit"
                                    class="w-full rounded-xl bg-slate-900 text-white py-3 font-medium transition hover:bg-black">
                                    Actualizar contraseña
                                </button>

                            </div>
                        </form>
                    </div>

                </div>

                {{-- COLUMNA DERECHA --}}
                <div class="lg:col-span-2 space-y-8">

                    {{-- MI CARRITO --}}
                    <div class="bg-white rounded-2xl shadow-[0_12px_35px_rgba(15,23,42,0.06)] border border-slate-100">
                        <div class="p-6 border-b border-slate-100 flex items-center justify-between gap-4">
                            <div>
                                <h2 class="text-lg font-semibold text-slate-900">
                                    Mi carrito
                                </h2>
                                <p class="text-sm text-slate-500 mt-1">
                                    Revisa lo que tienes pendiente antes de generar tu pedido.
                                </p>
                            </div>

                            <a href="{{ route('web.tienda.carrito') }}"
                                class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                                Ver carrito
                            </a>
                        </div>

                        <div class="p-6">
                            @if ($carritoActivo && $carritoActivo->items->count())

                                <div class="space-y-4">
                                    @foreach ($carritoActivo->items as $item)
                                        <div class="flex items-center gap-4 border border-slate-200 rounded-xl p-4">

                                            <div
                                                class="w-20 h-20 bg-gray-100 rounded-xl overflow-hidden flex items-center justify-center shrink-0">
                                                @if ($item->producto && $item->producto->imagenPrincipal)
                                                    <img src="{{ asset('storage/' . $item->producto->imagenPrincipal->imagen) }}"
                                                        class="w-full h-full object-cover"
                                                        alt="{{ $item->producto->nombre ?? 'Producto' }}">
                                                @else
                                                    <span class="text-xs text-gray-400">Sin imagen</span>
                                                @endif
                                            </div>

                                            <div class="flex-1 min-w-0">
                                                <h3 class="font-semibold text-slate-900">
                                                    {{ $item->producto->nombre ?? 'Producto' }}
                                                </h3>

                                                <p class="text-sm text-slate-500 mt-1">
                                                    Cantidad: {{ $item->cantidad }}
                                                </p>

                                                <p class="text-sm text-slate-500">
                                                    Precio: Bs {{ number_format($item->precio_unitario, 2) }}
                                                </p>
                                            </div>

                                            <div class="font-semibold text-slate-900 text-right shrink-0">
                                                Bs {{ number_format($item->subtotal, 2) }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div
                                    class="mt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-t border-slate-100 pt-5">
                                    <div>
                                        <p class="text-sm text-slate-600">
                                            Total carrito
                                        </p>
                                        <p class="text-2xl font-bold text-slate-900">
                                            Bs {{ number_format($carritoActivo->total, 2) }}
                                        </p>
                                    </div>

                                    <div class="flex flex-wrap gap-3">
                                        <a href="{{ route('web.tienda.carrito') }}"
                                            class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                                            Ver carrito
                                        </a>

                                        <a href="{{ route('web.tienda.checkout') }}"
                                            class="inline-flex items-center justify-center rounded-xl bg-[#0d377a] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#0050b0]">
                                            Continuar compra
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                                    <div>
                                        <p class="text-slate-500">
                                            No tienes productos en tu carrito.
                                        </p>
                                    </div>

                                    <a href="{{ route('web.tienda.index') }}"
                                        class="inline-flex w-fit items-center justify-center rounded-xl bg-[#0d377a] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#0050b0]">
                                        Ir a la tienda
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{-- MIS PEDIDOS / COMPRAS --}}
                    <div class="bg-white rounded-2xl shadow-[0_12px_35px_rgba(15,23,42,0.06)] border border-slate-100">
                        <div class="p-6 border-b border-slate-100">
                            <h2 class="text-lg font-semibold text-slate-900">
                                Mis compras
                            </h2>
                            <p class="text-sm text-slate-500 mt-1">
                                Revisa el estado de tus pedidos y el proceso en el que se encuentran.
                            </p>
                        </div>

                        <div class="p-6 space-y-6">
                            @forelse($misCompras as $compra)
                                @php
                                    $estadoClase = match ($compra->estado) {
                                        'pendiente_pago' => 'bg-amber-100 text-amber-700',
                                        'pago_reportado' => 'bg-blue-100 text-blue-700',
                                        'pagado' => 'bg-lime-100 text-lime-700',
                                        'en_preparacion' => 'bg-cyan-100 text-cyan-700',
                                        'completado' => 'bg-emerald-100 text-emerald-700',
                                        'cancelado' => 'bg-red-100 text-red-700',
                                        default => 'bg-slate-100 text-slate-700',
                                    };
                                @endphp

                                <div class="border border-slate-200 rounded-2xl overflow-hidden">
                                    <div
                                        class="p-4 bg-slate-50 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                                        <div>
                                            <p class="text-sm text-slate-600">
                                                Orden: <span
                                                    class="font-semibold text-slate-900">{{ $compra->numero_orden ?? '#' . $compra->id }}</span>
                                            </p>

                                            <p class="text-sm text-slate-500 mt-1">
                                                {{ $compra->created_at->format('d/m/Y H:i') }}
                                            </p>

                                            <div class="mt-3 flex flex-wrap items-center gap-2">
                                                <span
                                                    class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $estadoClase }}">
                                                    {{ str_replace('_', ' ', ucfirst($compra->estado)) }}
                                                </span>

                                                <span
                                                    class="inline-flex rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-600">
                                                    {{ strtoupper($compra->metodo_pago ?? 'QR') }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="text-left md:text-right">
                                            <p class="text-sm text-slate-500">Total</p>
                                            <div class="font-bold text-xl text-slate-900">
                                                Bs {{ number_format($compra->total, 2) }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="p-4 space-y-3">
                                        @foreach ($compra->items as $item)
                                            <div class="flex justify-between gap-4 text-sm">
                                                <div class="min-w-0">
                                                    <span class="text-slate-900 font-medium">
                                                        {{ $item->nombre_producto ?? ($item->producto->nombre ?? 'Producto') }}
                                                    </span>
                                                    <span class="text-slate-500">
                                                        x{{ $item->cantidad }}
                                                    </span>
                                                </div>

                                                <div class="whitespace-nowrap text-slate-900 font-medium">
                                                    Bs {{ number_format($item->subtotal, 2) }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="px-4 pb-4">
                                        <div class="flex flex-wrap gap-3">
                                            @if ($compra->estado === 'pendiente_pago')
                                                <a href="{{ route('web.tienda.confirmacion', $compra->numero_orden) }}"
                                                    class="inline-flex items-center justify-center rounded-xl bg-[#0d377a] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#0050b0]">
                                                    Continuar pago
                                                </a>
                                            @elseif($compra->estado === 'pago_reportado')
                                                <a href="{{ route('web.tienda.confirmacion', $compra->numero_orden) }}"
                                                    class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                                                    Ver pedido
                                                </a>
                                            @else
                                                <a href="{{ route('web.tienda.confirmacion', $compra->numero_orden) }}"
                                                    class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-100">
                                                    Ver detalle
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $timeline = [
                                        'pendiente_pago' => 1,
                                        'pago_reportado' => 2,
                                        'pagado' => 3,
                                        'en_preparacion' => 4,
                                        'completado' => 5,
                                    ];

                                    $estadoActual = $timeline[$compra->estado] ?? 0;
                                @endphp

                                @if ($compra->estado === 'cancelado')
                                    <div class="px-4 pb-4">
                                        <div
                                            class="rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm font-semibold text-red-700">
                                            Este pedido fue cancelado.
                                        </div>
                                    </div>
                                @else
                                    <div class="px-4 pb-4">
                                        <div class="overflow-x-auto">
                                            <div class="min-w-[720px]">
                                                <div class="relative flex items-center justify-between">
                                                    <div class="absolute left-0 right-0 top-5 h-[3px] bg-slate-200"></div>

                                                    @foreach ([
            1 => 'Pendiente',
            2 => 'Reportado',
            3 => 'Pagado',
            4 => 'Preparación',
            5 => 'Completado',
        ] as $paso => $label)
                                                        <div
                                                            class="relative z-10 flex w-full flex-col items-center text-center">
                                                            <div
                                                                class="
                                flex h-10 w-10 items-center justify-center rounded-full border-4 bg-white text-sm font-bold
                                {{ $paso <= $estadoActual ? 'border-[#0050b0] text-[#0050b0]' : 'border-slate-200 text-slate-400' }}
                            ">
                                                                {{ $paso }}
                                                            </div>

                                                            <span
                                                                class="mt-2 text-xs font-semibold
                                {{ $paso <= $estadoActual ? 'text-slate-900' : 'text-slate-400' }}">
                                                                {{ $label }}
                                                            </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <div class="rounded-xl border border-dashed border-slate-200 p-6 text-center">
                                    <p class="text-slate-500">
                                        Aún no tienes compras registradas.
                                    </p>

                                    <a href="{{ route('web.tienda.index') }}"
                                        class="mt-4 inline-flex items-center justify-center rounded-xl bg-[#0d377a] px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-[#0050b0]">
                                        Ir a la tienda
                                    </a>
                                </div>
                            @endforelse

                            <div>
                                {{ $misCompras->links() }}
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

@endsection
