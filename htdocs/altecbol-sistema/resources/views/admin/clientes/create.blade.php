<x-app-layout>
    {{-- HEADER --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <a href="{{ route('admin.clientes.index') }}"
                class=" ui-btn inline-flex items-center gap-2 ui-text opacity-80 hover:opacity-100 transition-opacity"
                aria-label="Volver">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m15 19-7-7 7-7" />
                </svg>
                Volver
            </a>

            <h2 class="font-semibold text-xl leading-tight ui-text">
                {{ isset($cliente) ? 'Editar cliente' : 'Nuevo cliente' }}
            </h2>
        </div>
    </x-slot>

    {{-- CONTENT --}}
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="ui-form-card">

                <form method="POST"
                    action="{{ isset($cliente) ? route('admin.clientes.update', $cliente->id) : route('admin.clientes.store') }}"
                    class="ui-form">
                    @csrf
                    @if (isset($cliente))
                        @method('PUT')
                    @endif

                    {{-- Código --}}
                    <div class="ui-field">
                        <label class="ui-label">Código *</label>
                        <input name="codigo_cliente" value="{{ old('codigo_cliente', $cliente->codigo_cliente ?? '') }}"
                            class="ui-input @error('codigo_cliente') ui-invalid @enderror" required>
                        @error('codigo_cliente')
                            <p class="ui-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Razón social --}}
                    <div class="ui-field">
                        <label class="ui-label">Razón social *</label>
                        <input name="razon_social" value="{{ old('razon_social', $cliente->razon_social ?? '') }}"
                            class="ui-input @error('razon_social') ui-invalid @enderror" required>
                        @error('razon_social')
                            <p class="ui-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- NIT / Tipo Cliente --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="ui-field">
                            <label class="ui-label">NIT</label>
                            <input name="nit" value="{{ old('nit', $cliente->nit ?? '') }}"
                                class="ui-input @error('nit') ui-invalid @enderror">
                            @error('nit')
                                <p class="ui-error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="ui-field relative">
                            <label class="ui-label">Tipo de Cliente *</label>

                            <!-- Input oculto que se envía a la BD -->
                            <input type="hidden" name="tipo_cliente" id="tipo_cliente"
                                value="{{ old('tipo_cliente', strtolower($cliente->tipo_cliente ?? '')) }}">

                            <!-- Botón select -->
                            <button type="button" id="tipo-cliente-button" data-dropdown-toggle="tipo-cliente-dropdown"
                                class="ui-input flex items-center justify-between gap-2">

                                <span id="tipo-cliente-label">
                                    {{ ucfirst(old('tipo_cliente', $cliente->tipo_cliente ?? 'Seleccione una opción')) }}
                                </span>

                                <!-- Chevron -->
                                <svg class="w-4 h-4 ui-muted" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Dropdown -->
                            <div id="tipo-cliente-dropdown"
                                class="hidden z-20 mt-1 w-full rounded-lg ui-shadow ui-border"
                                style="background-color: var(--bg-surface);">

                                <ul class="py-1 text-sm ui-text">

                                    <li>
                                        <button type="button" onclick="selectTipoCliente('persona', 'Persona')"
                                            class="w-full text-left px-4 py-2 transition" style="border-radius:.5rem;"
                                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                            onmouseout="this.style.backgroundColor='transparent'">
                                            Persona
                                        </button>
                                    </li>

                                    <li>
                                        <button type="button" onclick="selectTipoCliente('empresa', 'Empresa')"
                                            class="w-full text-left px-4 py-2 transition" style="border-radius:.5rem;"
                                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                                            onmouseout="this.style.backgroundColor='transparent'">
                                            Empresa
                                        </button>
                                    </li>

                                </ul>
                            </div>

                            @error('tipo_cliente')
                                <p class="ui-error">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    {{-- País / Estado --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="ui-field">
                            <label class="ui-label">País</label>
                            <input name="pais" value="{{ old('pais', $cliente->pais ?? '') }}"
                                class="ui-input @error('pais') ui-invalid @enderror">
                            @error('pais')
                                <p class="ui-error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="ui-field relative">
                            <label class="ui-label">Estado *</label>

                            @php
                                // Valor REAL que se envía a la BD (siempre en minúsculas)
                                $estadoValor = strtolower(old('estado', $cliente->estado ?? 'prospecto'));

                                // Valor solo para mostrar (Primera letra en mayúscula)
                                $estadoLabel = ucfirst($estadoValor);
                            @endphp

                            <!-- Input oculto (se envía al backend) -->
                            <input type="hidden" name="estado" value="{{ $estadoValor }}">

                            <!-- Botón tipo select (BLOQUEADO) -->
                            <button type="button" disabled
                                class="ui-input flex items-center justify-between gap-2 w-full
               opacity-70 cursor-not-allowed">

                                <span>{{ $estadoLabel }}</span>

                                <!-- Candado (estado bloqueado) -->
                                <svg class="w-4 h-4 ui-muted block shrink-0" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 11V7a4 4 0 10-8 0v4m-1 0h10a2 2 0 012 2v6a2 2 0 01-2 2H3a2 2 0 01-2-2v-6a2 2 0 012-2z" />
                                </svg>
                            </button>

                            @error('estado')
                                <p class="ui-error">{{ $message }}</p>
                            @enderror
                        </div>


                    </div>

                    {{-- Tipo Servicio / Dirección --}}
                    {{-- Tipo Servicio / Dirección --}}
@php
    $estadoValor = strtolower(old('estado', $cliente->estado ?? 'prospecto'));
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    {{-- SOLO mostrar si NO es prospecto --}}
    @if ($estadoValor !== 'prospecto')
        <div class="ui-field relative">
            <label class="ui-label">Tipo de Servicio </label>

            @php
                $valorServicio = old('tipo_servicio', strtolower($cliente->tipo_servicio ?? ''));
                $labelServicio =
                    $valorServicio === 'mensualizado'
                        ? 'Mensualizado'
                        : ($valorServicio === 'ademanda'
                            ? 'A demanda'
                            : 'Seleccione una opción');
            @endphp

            <!-- Input oculto (este es el que va a la BD) -->
            <input type="hidden" name="tipo_servicio" id="tipo_servicio"
                value="{{ $valorServicio }}">

            <!-- Botón tipo select -->
            <button type="button" id="tipo-servicio-button"
                data-dropdown-toggle="tipo-servicio-dropdown"
                class="ui-input flex items-center justify-between gap-2 w-full"
                {{ $valorServicio ? '' : 'required' }}>

                <span id="tipo-servicio-label">
                    {{ $labelServicio }}
                </span>

                <!-- Chevron -->
                <svg class="w-4 h-4 ui-muted block shrink-0" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown -->
            <div id="tipo-servicio-dropdown"
                class="hidden z-20 mt-1 w-full rounded-lg ui-shadow ui-border"
                style="background-color: var(--bg-surface);">

                <ul class="py-1 text-sm ui-text">

                    <li>
                        <button type="button" onclick="selectTipoServicio('ademanda', 'A demanda')"
                            class="w-full text-left px-4 py-2 transition" style="border-radius:.5rem;"
                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                            onmouseout="this.style.backgroundColor='transparent'">
                            A demanda
                        </button>
                    </li>

                    <li>
                        <button type="button"
                            onclick="selectTipoServicio('mensualizado', 'Mensualizado')"
                            class="w-full text-left px-4 py-2 transition" style="border-radius:.5rem;"
                            onmouseover="this.style.backgroundColor='var(--nav-hover-bg)'"
                            onmouseout="this.style.backgroundColor='transparent'">
                            Mensualizado
                        </button>
                    </li>

                </ul>
            </div>

            @error('tipo_servicio')
                <p class="ui-error">{{ $message }}</p>
            @enderror
        </div>
    @endif

    <div class="ui-field">
        <label class="ui-label">Dirección</label>
        <input name="direccion" value="{{ old('direccion', $cliente->direccion ?? '') }}"
            class="ui-input @error('direccion') ui-invalid @enderror">
        @error('direccion')
            <p class="ui-error">{{ $message }}</p>
        @enderror
    </div>
</div>


                    {{-- Notas --}}
                    <div class="ui-field">
                        <label class="ui-label">Notas</label>
                        <textarea name="notas" rows="3" class="ui-textarea @error('notas') ui-invalid @enderror"
                            placeholder="Información adicional del cliente...">{{ old('notas', $cliente->notas ?? '') }}</textarea>
                        @error('notas')
                            <p class="ui-error">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center gap-3 pt-4">
                        <button type="submit" class="ui-btn-primary">
                            {{ isset($cliente) ? 'Actualizar' : 'Guardar' }}
                        </button>

                        <a href="{{ route('admin.clientes.index') }}" class="ui-btn">
                            Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function selectTipoCliente(value, label) {
        document.getElementById('tipo_cliente').value = value;
        document.getElementById('tipo-cliente-label').innerText = label;

        // cerrar dropdown (Flowbite)
        const dropdown = document.getElementById('tipo-cliente-dropdown');
        if (dropdown) dropdown.classList.add('hidden');
    }

    function selectTipoServicio(value, label) {
        document.getElementById('tipo_servicio').value = value;
        document.getElementById('tipo-servicio-label').innerText = label;

        const dropdown = document.getElementById('tipo-servicio-dropdown');
        if (dropdown) dropdown.classList.add('hidden');
    }
</script>
