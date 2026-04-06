@props(['active'])

@php
    $base = 'relative inline-flex items-center px-1 pt-1 text-sm font-medium transition-all';

    $classes = ($active ?? false)
        ? $base.' text-[var(--text-main)]'
        : $base.' text-[var(--text-muted)] hover:text-[var(--text-main)]';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}

    @if($active ?? false)
        <span class="absolute left-0 right-0 -bottom-1 h-0.5"
              style="background-color: var(--accent);"></span>
    @endif
</a>
