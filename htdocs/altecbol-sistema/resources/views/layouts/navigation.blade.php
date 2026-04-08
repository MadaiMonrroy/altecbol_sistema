<nav x-data="{ open: false }" class="fixed top-0 left-0 right-0 z-50 border-b"
    style="background-color: var(--bg-surface); border-color: var(--border-color);">


    <!-- Primary Navigation Menu -->
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}">
                        <x-application-logo class="block h-6 w-auto fill-current text-[var(--text-main)]" />
                    </a>
                </div>


                <!-- Navigation Links -->
                {{-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.clientes.index')" :active="request()->routeIs('admin.clientes.*')">
                        {{ __('Clientes') }}
                    </x-nav-link>
                </div> --}}
            </div>


            <div class="flex items-center gap-2">
                <!-- Theme toggle -->
                <button id="theme-toggle" type="button"
                    class="rounded-lg p-2.5 text-[var(--text-muted)] hover:opacity-80"
                    style="background-color: transparent;">
                    <!-- LUNA -->
                    <svg id="theme-toggle-dark-icon" class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 0 1-.5-17.986V3
       c-.354.966-.5 1.911-.5 3
       a9 9 0 0 0 9 9
       c.239 0 .254.018.488 0
       A9.004 9.004 0 0 1 12 21Z" />
                    </svg>

                    <!-- SOL -->
                    <svg id="theme-toggle-light-icon" class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5V3m0 18v-2M7.05 7.05 5.636 5.636
       m12.728 12.728L16.95 16.95M5 12H3
       m18 0h-2M7.05 16.95l-1.414 1.414
       M18.364 5.636 16.95 7.05
       M16 12a4 4 0 1 1-8 0
       4 4 0 0 1 8 0Z" />
                    </svg>

                </button>

                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ms-2">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md
                                       text-[var(--text-main)] hover:opacity-90
                                       border"
                                style="background-color: var(--bg-surface); border-color: var(--border-color);">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                       <x-slot name="content">
    <x-dropdown-link
        :href="route('admin.profile.edit')"
        class="ui-text hover:bg-[var(--nav-hover-bg)] transition">
        {{ __('Profile') }}
    </x-dropdown-link>

    <div class="ui-divider my-1"></div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link
            :href="route('logout')"
            onclick="event.preventDefault(); this.closest('form').submit();"
            class="ui-text hover:bg-[var(--nav-hover-bg)] transition">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>
</x-slot>

                    </x-dropdown>
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md hover:opacity-80
                                   text-[var(--text-muted)]">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>


   <div :class="{ 'block': open, 'hidden': !open }"
     class="hidden sm:hidden border-t"
     style="border-color: var(--border-color); background-color: var(--bg-surface);">

    <div class="pt-2 pb-3 space-y-1 px-2">

    {{-- Dashboard --}}
    <a href="{{ route('admin.dashboard') }}"
       class="{{ request()->routeIs('dashboard')
           ? 'ui-nav-link ui-nav-link-active'
           : 'ui-nav-link' }}">

        <svg class="ui-nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M3 9.75L12 4l9 5.75V20a1 1 0 0 1-1 1h-5.25a.75.75 0 0 1-.75-.75V15a3 3 0 0 0-6 0v5.25a.75.75 0 0 1-.75.75H4a1 1 0 0 1-1-1V9.75Z"/>
        </svg>

        <span>Dashboard</span>
    </a>

    {{-- Clientes --}}
    <a href="{{ route('admin.clientes.index') }}"
       class="{{ request()->routeIs('admin.clientes.*')
           ? 'ui-nav-link ui-nav-link-active'
           : 'ui-nav-link' }}">

        <svg class="ui-nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15 19.128a9.38 9.38 0 0 0 2.625.372
                     9.337 9.337 0 0 0 4.121-.952
                     4.125 4.125 0 0 0-7.533-2.493M15 19.128
                     v-.003c0-1.113-.285-2.16-.786-3.07
                     M15 19.128v.106A12.318 12.318 0 0 1 8.624 21
                     c-2.331 0-4.512-.645-6.374-1.766
                     v-.109a6.375 6.375 0 0 1 11.964-3.07
                     M12 6.375a3.375 3.375 0 1 1-6.75 0
                     3.375 3.375 0 0 1 6.75 0Zm8.25 2.25
                     a2.625 2.625 0 1 1-5.25 0
                     2.625 2.625 0 0 1 5.25 0Z"/>
        </svg>

        <span>Clientes</span>
    </a>
    {{-- Clientes --}}
    <a href="{{ route('admin.clientes.index') }}"
       class="{{ request()->routeIs('admin.clientes.*')
           ? 'ui-nav-link ui-nav-link-active'
           : 'ui-nav-link' }}">

        <svg class="ui-nav-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M15 19.128a9.38 9.38 0 0 0 2.625.372
                     9.337 9.337 0 0 0 4.121-.952
                     4.125 4.125 0 0 0-7.533-2.493M15 19.128
                     v-.003c0-1.113-.285-2.16-.786-3.07
                     M15 19.128v.106A12.318 12.318 0 0 1 8.624 21
                     c-2.331 0-4.512-.645-6.374-1.766
                     v-.109a6.375 6.375 0 0 1 11.964-3.07
                     M12 6.375a3.375 3.375 0 1 1-6.75 0
                     3.375 3.375 0 0 1 6.75 0Zm8.25 2.25
                     a2.625 2.625 0 1 1-5.25 0
                     2.625 2.625 0 0 1 5.25 0Z"/>
        </svg>

        <span>Clientes</span>
    </a>

</div>


    <div class="pt-4 pb-1 ui-divider">
        <div class="px-4">
            <div class="font-medium text-base text-[var(--text-main)]">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-[var(--text-muted)]">{{ Auth::user()->email }}</div>
        </div>

        <div class="mt-3 space-y-1">
            <x-responsive-nav-link :href="route('admin.profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</div>

</nav>
