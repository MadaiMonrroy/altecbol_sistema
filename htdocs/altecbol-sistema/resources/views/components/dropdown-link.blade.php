<a {{ $attributes->merge([
    'class' => 'block w-full px-4 py-2 text-start text-sm leading-5 transition ui-text
               hover:bg-[var(--nav-hover-bg)] focus:outline-none focus:bg-[var(--nav-hover-bg)]'
]) }}>
    {{ $slot }}
</a>

