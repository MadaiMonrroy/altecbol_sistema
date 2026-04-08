@php
    $toast = session('toast');

    $type = $toast['type'] ?? null;
    $message = $toast['message'] ?? null;

    $styles = [
    'success' => [
        'container' => 'text-green-900 bg-green-100/50 border border-green-200/60',
        'iconWrap' => 'bg-green-200/60',
        'icon' => 'text-green-700',
        'title' => 'Success Message',
    ],
    'error' => [
        'container' => 'text-red-900 bg-red-100/50 border border-red-200/60',
        'iconWrap' => 'bg-red-200/60',
        'icon' => 'text-red-700',
        'title' => 'Error',
    ],
    'warning' => [
        'container' => 'text-yellow-900 bg-yellow-100/50 border border-yellow-200/60',
        'iconWrap' => 'bg-yellow-200/60',
        'icon' => 'text-yellow-700',
        'title' => 'Warning',
    ],
    'info' => [
        'container' => 'text-blue-900 bg-blue-100/50 border border-blue-200/60',
        'iconWrap' => 'bg-blue-200/60',
        'icon' => 'text-blue-700',
        'title' => 'Info',
    ],
];

    $current = $styles[$type] ?? $styles['info'];
@endphp

@if($message)
    <div
        id="app-toast"
        class="fixed top-10 right-6 z-[9999] w-[90%] max-w-sm transition-all duration-300 ease-out"
        role="alert"
    >
        <div class="flex items-start rounded-xl shadow-xl px-4 py-3 backdrop-blur-md {{ $current['container'] }}">
            <div class="flex items-center justify-center w-8 h-8 rounded-full mr-3 shrink-0 {{ $current['iconWrap'] }}">
                @if($type === 'success')
                    <svg class="w-4 h-4 {{ $current['icon'] }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                @elseif($type === 'error')
                    <svg class="w-4 h-4 {{ $current['icon'] }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                @elseif($type === 'warning')
                    <svg class="w-4 h-4 {{ $current['icon'] }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v4m0 4h.01M10.29 3.86l-7.08 12.25A2 2 0 004.92 19h14.16a2 2 0 001.71-2.89L13.71 3.86a2 2 0 00-3.42 0z" />
                    </svg>
                @else
                    <svg class="w-4 h-4 {{ $current['icon'] }}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                    </svg>
                @endif
            </div>

            <div class="flex-1 pr-2">
                <p class="text-sm font-semibold mb-0.5">
                    {{ $current['title'] }}
                </p>
                <p class="text-sm leading-5">
                    {{ $message }}
                </p>
            </div>

            <button
                type="button"
                id="app-toast-close"
                class="ml-2 inline-flex items-center justify-center w-8 h-8 rounded-md hover:bg-white/60 transition shrink-0"
                aria-label="Cerrar"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toast = document.getElementById('app-toast');
            const closeBtn = document.getElementById('app-toast-close');

            if (!toast) return;

            let removed = false;

            const hideToast = () => {
                if (removed) return;
                removed = true;

                toast.classList.add('opacity-0', 'translate-x-4');

                setTimeout(() => {
                    toast.remove();
                }, 300);
            };

            if (closeBtn) {
                closeBtn.addEventListener('click', hideToast);
            }

            setTimeout(hideToast, 6000);
        });
    </script>
@endif