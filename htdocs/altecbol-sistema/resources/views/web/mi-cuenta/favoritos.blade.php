@extends('layouts.web')

@section('title', 'Mis favoritos | ALTECBOL')

@section('content')
<section class="relative overflow-hidden bg-slate-950">
    <div class="absolute inset-0">
        <img
            src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1600&q=80"
            alt="Favoritos"
            class="h-full w-full object-cover opacity-20"
        >
    </div>

    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_rgba(1,211,209,0.16),_transparent_28%),radial-gradient(circle_at_bottom_right,_rgba(0,80,176,0.32),_transparent_35%),linear-gradient(to_right,_rgba(2,6,23,0.96),_rgba(0,80,176,0.88),_rgba(2,6,23,0.96))]"></div>

    <div class="relative max-w-7xl mx-auto px-6 py-12 md:py-14 pt-24 pb-5 md:pt-36 md:pb-12">
        <div class="flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.22em] text-cyan-200/90">
                    Mi cuenta
                </p>
                <h1 class="mt-2 text-[28px] md:text-[40px] font-extrabold tracking-tight text-white">
                    Mis productos favoritos
                </h1>
                <p class="mt-2 max-w-2xl text-sm md:text-base text-slate-200">
                    Aquí encontrarás los productos que marcaste como favoritos.
                </p>
            </div>

            <a href="{{ route('web.tienda.index') }}"
               class="inline-flex w-fit items-center gap-2 rounded-2xl border border-white/15 bg-white/10 px-4 py-2.5 text-sm font-semibold text-white/95 backdrop-blur-md transition hover:bg-white/15 hover:text-white">
                Ir a la tienda
            </a>
        </div>
    </div>

    <div class="relative -mt-8">
        <svg viewBox="0 0 1440 120" class="h-20 w-full fill-slate-50" preserveAspectRatio="none">
            <path d="M0,96L80,85.3C160,75,320,53,480,48C640,43,800,53,960,64C1120,75,1280,85,1360,90.7L1440,96L1440,120L0,120Z"></path>
        </svg>
    </div>
</section>

<section class="bg-slate-50 pb-14">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($favoritos->isEmpty())
            <div class="rounded-[1.8rem] border border-slate-200 bg-white p-8 md:p-12 text-center shadow-[0_10px_24px_rgba(15,23,42,0.04)]">
                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-red-50 text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-9 w-9" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21.435 6.582c-.694-2.16-2.773-3.582-5.06-3.582-1.808 0-3.372.88-4.375 2.218C10.997 3.88 9.433 3 7.625 3 5.338 3 3.259 4.422 2.565 6.582c-.57 1.773-.114 3.792 1.202 5.284L12 21l8.233-9.134c1.316-1.492 1.772-3.511 1.202-5.284Z" />
                    </svg>
                </div>

                <h2 class="mt-5 text-2xl font-bold text-slate-900">Aún no tienes favoritos</h2>
                <p class="mt-2 text-slate-500">
                    Explora la tienda y guarda los productos que más te interesen.
                </p>

                <a href="{{ route('web.tienda.index') }}"
                   class="mt-6 inline-flex items-center justify-center rounded-2xl bg-[#0d377a] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#0050b0]">
                    Explorar productos
                </a>
            </div>
        @else
            <div class="grid gap-5 sm:grid-cols-2 xl:grid-cols-4">
                @foreach($favoritos as $producto)
                    <article class="group overflow-hidden rounded-[1.7rem] border border-slate-200 bg-white shadow-[0_10px_24px_rgba(15,23,42,0.04)] transition hover:-translate-y-1 hover:shadow-[0_20px_45px_rgba(15,23,42,0.10)]"
                             data-producto-id="{{ $producto->id }}">
                        <div class="relative">
                            <a href="{{ route('web.tienda.producto', $producto->codigo) }}" class="block">
                                <div class="aspect-[4/3] overflow-hidden bg-slate-50">
                                    <img
                                        src="{{ $producto->imagen_principal_url }}"
                                        alt="{{ $producto->nombre }}"
                                        class="h-full w-full object-cover transition duration-500 group-hover:scale-[1.03]"
                                    >
                                </div>
                            </a>

                            <button type="button"
                                class="btn-favorito absolute right-3 top-3 z-20 inline-flex h-10 w-10 items-center justify-center rounded-full border border-red-200 bg-white/95 shadow-sm backdrop-blur-sm transition hover:border-red-400"
                                data-url="{{ route('web.tienda.favoritos.toggle', $producto->id) }}"
                                data-favorito="1"
                                title="Quitar de favoritos">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="icon-favorito h-5 w-5 text-red-500 fill-red-500"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                                </svg>
                            </button>
                        </div>

                        <div class="p-5">
                            @if($producto->marca?->nombre)
                                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-slate-400">
                                    {{ $producto->marca->nombre }}
                                </p>
                            @endif

                            <h2 class="mt-2 line-clamp-2 text-[18px] font-bold leading-tight text-slate-900">
                                <a href="{{ route('web.tienda.producto', $producto->codigo) }}" class="hover:text-[#0050b0] transition">
                                    {{ $producto->nombre }}
                                </a>
                            </h2>

                            <div class="mt-4 flex items-end justify-between gap-3">
                                <div>
                                    @if($producto->tiene_oferta)
                                        <p class="text-sm text-slate-400 line-through">
                                            Bs {{ number_format($producto->precio, 2, '.', ',') }}
                                        </p>
                                    @endif

                                    <p class="text-[22px] font-extrabold tracking-tight text-[#0b51b0]">
                                        Bs {{ number_format($producto->precio_final, 2, '.', ',') }}
                                    </p>
                                </div>

                                <a href="{{ route('web.tienda.producto', $producto->codigo) }}"
                                   class="inline-flex items-center justify-center rounded-xl bg-slate-100 px-4 py-2 text-sm font-semibold text-slate-700 transition hover:bg-slate-200">
                                    Ver
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</section>

@if($favoritos->isNotEmpty())
<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.btn-favorito').forEach((button) => {
        button.addEventListener('click', async function(event) {
            event.preventDefault();
            event.stopPropagation();

            const url = this.dataset.url;
            const card = this.closest('[data-producto-id]');

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

                if (!data.favorito && card) {
                    card.remove();
                }

                const restantes = document.querySelectorAll('[data-producto-id]');
                if (restantes.length === 0) {
                    window.location.reload();
                }
            } catch (error) {
                console.error(error);
                alert('No se pudo actualizar favoritos.');
            }
        });
    });
});
</script>
@endif
@endsection