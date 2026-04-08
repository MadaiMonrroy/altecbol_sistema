@if ($errors->any())
    <div class="mb-4 p-3 rounded ui-border" style="background: color-mix(in srgb, #ef4444 10%, transparent);">
        <ul class="text-sm">
            @foreach ($errors->all() as $e)
                <li>• {{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif
<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="shadow rounded-lg p-6 text-[var(--text-main)]"
                style="background-color: var(--bg-surface); border-color: var(--border-color);">

                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-semibold">Contactos</h3>
                        <p class="text-sm ui-muted">
                            Cliente: <span class="font-semibold ui-text">{{ $cliente->razon_social }}</span>
                            <span class="ui-muted">({{ $cliente->codigo_cliente }})</span>
                        </p>
                    </div>
                    <a href="{{ route('admin.clientes.index') }}" class="ui-btn">Volver</a>
                </div>

                @php
                    $isEdit = isset($contactoEdit);
                    $action = $isEdit
                        ? route('admin.clientes.contactos.update', [$cliente->id, $contactoEdit->id])
                        : route('admin.clientes.contactos.store', $cliente->id);
                @endphp

                <form id="form-contacto" method="POST" action="{{ $action }}"
                    class="grid grid-cols-1 lg:grid-cols-12 gap-3 mb-6">
                    @csrf
                    @if ($isEdit)
                        @method('PUT')
                    @endif

                    {{-- 1) Nombre + Apellido (misma fila en lg) --}}
                    <div class="lg:col-span-6">
                        <input name="nombre" class="ui-input w-full" placeholder="Nombre *"
                            value="{{ old('nombre', $contactoEdit->nombre ?? '') }}">
                    </div>

                    <div class="lg:col-span-6">
                        <input name="apellido" class="ui-input w-full" placeholder="Apellido"
                            value="{{ old('apellido', $contactoEdit->apellido ?? '') }}">
                    </div>

                    {{-- 2) Cargo + Área --}}
                    <div class="lg:col-span-6">
                        <input name="cargo" class="ui-input w-full" placeholder="Cargo"
                            value="{{ old('cargo', $contactoEdit->cargo ?? '') }}">
                    </div>

                    <div class="lg:col-span-6">
                        <input name="area" class="ui-input w-full" placeholder="Área"
                            value="{{ old('area', $contactoEdit->area ?? '') }}">
                    </div>

                    {{-- 3) Teléfono + Celular + WhatsApp --}}
                    <div class="lg:col-span-4">
                        <input name="telefono" class="ui-input w-full" placeholder="Teléfono"
                            value="{{ old('telefono', $contactoEdit->telefono ?? '') }}">
                    </div>

                    <div class="lg:col-span-4">
                        <input name="celular" class="ui-input w-full" placeholder="Celular"
                            value="{{ old('celular', $contactoEdit->celular ?? '') }}">
                    </div>

                    <div class="lg:col-span-4">
                        <input name="whatsapp" class="ui-input w-full" placeholder="WhatsApp"
                            value="{{ old('whatsapp', $contactoEdit->whatsapp ?? '') }}">
                    </div>

                    {{-- 4) Email + Estado + Principal (misma fila en lg) --}}
                    <div class="lg:col-span-7">
                        <input name="email" class="ui-input w-full" placeholder="Email"
                            value="{{ old('email', $contactoEdit->email ?? '') }}">
                    </div>

                    <div class="lg:col-span-3">
                        <select name="estado" class="ui-input w-full" required>
                            @php $est = old('estado', $contactoEdit->estado ?? 'activo'); @endphp
                            <option value="activo" @selected($est === 'activo')>Activo</option>
                            <option value="inactivo" @selected($est === 'inactivo')>Inactivo</option>
                        </select>
                    </div>

                    <div class="lg:col-span-2 flex items-center gap-2 pl-1">
                        <input type="checkbox" name="es_principal" value="1" @checked(old('es_principal', (int) ($contactoEdit->es_principal ?? 0)) === 1)>
                        <span class="text-sm ui-muted">Principal</span>
                    </div>

                    {{-- 5) Notas textarea full --}}
                    <div class="lg:col-span-12">
                        <textarea name="notas" rows="3" class="ui-input w-full" placeholder="Notas">{{ old('notas', $contactoEdit->notas ?? '') }}</textarea>
                    </div>

                    {{-- 6) Botones abajo derecha (debajo de notas) --}}
                    <div class="lg:col-span-12 flex justify-end gap-2">
                        @if ($isEdit)
                            <a href="{{ route('admin.clientes.contactos.index', $cliente->id) }}" class="ui-btn">Cancelar</a>
                            <button class="ui-btn-primary" type="submit">Guardar cambios</button>
                        @else
                            <button class="ui-btn-primary" type="submit">+ Añadir contacto</button>
                        @endif
                    </div>
                </form>

                <div class="overflow-x-auto rounded-lg ui-border" style="background-color: var(--bg-surface);">
                    <table class="min-w-full text-sm">
                        <thead style="background-color: var(--bg-card); border-bottom: 1px solid var(--border-color);">
                            <tr>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Nombre</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Cargo</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Área</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Cel/WhatsApp</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Email</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Principal</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Estado</th>
                                <th class="px-4 py-3 text-left font-semibold ui-text">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contactos as $ct)
                                <tr class="ui-table-row" style="border-bottom: 1px solid var(--border-color);">
                                    <td class="px-4 py-3 ui-text">
                                        {{ $ct->nombre }} {{ $ct->apellido ?? '' }}
                                    </td>
                                    <td class="px-4 py-3 ui-text">{{ $ct->cargo ?? '-' }}</td>
                                    <td class="px-4 py-3 ui-text">{{ $ct->area ?? '-' }}</td>
                                    <td class="px-4 py-3 ui-text">
                                        <div class="flex items-center gap-3">
                                            <span>{{ $ct->celular ?? '-' }}</span>

                                            @php
                                                // Usamos whatsapp si existe, sino usamos celular.
                                                $raw = $ct->whatsapp ?: $ct->celular ?? '';

                                                // Dejamos solo números
                                                $num = preg_replace('/\D+/', '', (string) $raw);

                                                // Si tu DB a veces guarda con 591 adelante, no lo dupliques
                                                $numLocal = str_starts_with($num, '591') ? substr($num, 3) : $num;

                                                $waLink = $numLocal ? 'https://wa.me/591' . $numLocal : null;
                                            @endphp

                                            @if ($waLink)
                                                <a href="{{ $waLink }}" target="_blank" rel="noopener"
                                                    title="Enviar WhatsApp"
                                                    class="inline-flex items-center justify-center
               w-9 h-9 rounded-full
               transition hover:scale-110"
                                                    style="">

                                                    {{-- WhatsApp Flowbite (path EXACTO que enviaste) --}}
                                                    <svg class="w-5 h-5 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 24 24">

                                                        <path fill="currentColor" fill-rule="evenodd"
                                                            d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z"
                                                            clip-rule="evenodd" />

                                                        <path fill="currentColor"
                                                            d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z" />
                                                    </svg>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 ui-text">{{ $ct->email ?? '-' }}</td>
                                    <td class="px-4 py-3 ui-text">
                                        @if ((int) $ct->es_principal === 1)
                                            <span
                                                class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold"
                                                style="background-color: color-mix(in srgb, var(--accent) 18%, transparent); color: var(--accent);">
                                                Sí
                                            </span>
                                        @else
                                            <span class="ui-muted">No</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 ui-text">{{ $ct->estado }}</td>
                                    <td class="px-4 py-3 ui-text whitespace-nowrap">
                                        {{-- VER (icono ojo) --}}
                                        <button type="button" class="inline-flex items-center mr-3 ui-btn-link"
                                            title="Ver contacto"
                                            onclick="document.getElementById('modal-ver-contacto-{{ $ct->id }}').showModal()">

                                            {{-- Flowbite: eye --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0Z" />
                                            </svg>
                                        </button>

                                        {{-- MODAL VER CONTACTO --}}
                                        <dialog id="modal-ver-contacto-{{ $ct->id }}"
                                            class="ui-modal ui-shadow p-0"
                                            style="
        width: min(900px, 95vw);
        max-width: 95vw;
        max-height: 90vh;
        overflow: hidden;
        border: 1px solid var(--border-color);
        background: var(--bg-surface);
        border-radius: 14px;
    "
                                            onclick="if(event.target === this) this.close()">

                                            {{-- HEADER fijo --}}
                                            <div class="p-5 flex items-start justify-between gap-4"
                                                style="border-bottom:1px solid var(--border-color); background: var(--bg-surface);">
                                                <div>
                                                    <h3 class="text-lg font-semibold"
                                                        style="color: var(--text-main);">
                                                        Detalle de contacto
                                                    </h3>
                                                    <p class="mt-1 text-sm ui-muted">
                                                        {{ $ct->nombre }} {{ $ct->apellido ?? '' }}
                                                    </p>
                                                </div>

                                                <button type="button" class="ui-btn"
                                                    onclick="document.getElementById('modal-ver-contacto-{{ $ct->id }}').close()">
                                                    Cerrar
                                                </button>
                                            </div>

                                            {{-- BODY scrolleable --}}
<div class="p-5" style="max-height: calc(90vh - 72px); overflow: auto;">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                                                <div class="ui-border rounded-lg p-3"
                                                    style="background-color: var(--bg-surface);">
                                                    <p class="text-xs ui-muted">Nombre</p>
                                                    <p class="mt-1 ui-text font-semibold">{{ $ct->nombre ?? '-' }}</p>
                                                </div>

                                                <div class="ui-border rounded-lg p-3"
                                                    style="background-color: var(--bg-surface);">
                                                    <p class="text-xs ui-muted">Apellido</p>
                                                    <p class="mt-1 ui-text font-semibold">{{ $ct->apellido ?? '-' }}
                                                    </p>
                                                </div>

                                                <div class="ui-border rounded-lg p-3"
                                                    style="background-color: var(--bg-surface);">
                                                    <p class="text-xs ui-muted">Cargo</p>
                                                    <p class="mt-1 ui-text">{{ $ct->cargo ?? '-' }}</p>
                                                </div>

                                                <div class="ui-border rounded-lg p-3"
                                                    style="background-color: var(--bg-surface);">
                                                    <p class="text-xs ui-muted">Área</p>
                                                    <p class="mt-1 ui-text">{{ $ct->area ?? '-' }}</p>
                                                </div>

                                                <div class="ui-border rounded-lg p-3"
                                                    style="background-color: var(--bg-surface);">
                                                    <p class="text-xs ui-muted">Teléfono</p>
                                                    <p class="mt-1 ui-text">{{ $ct->telefono ?? '-' }}</p>
                                                </div>

                                                <div class="ui-border rounded-lg p-3"
                                                    style="background-color: var(--bg-surface);">
                                                    <p class="text-xs ui-muted">Celular</p>
                                                    <p class="mt-1 ui-text">{{ $ct->celular ?? '-' }}</p>
                                                </div>

                                                <div class="ui-border rounded-lg p-3"
                                                    style="background-color: var(--bg-surface);">
                                                    <p class="text-xs ui-muted">WhatsApp</p>
                                                    <p class="mt-1 ui-text">{{ $ct->whatsapp ?? '-' }}</p>
                                                </div>

                                                <div class="ui-border rounded-lg p-3"
                                                    style="background-color: var(--bg-surface);">
                                                    <p class="text-xs ui-muted">Email</p>
                                                    <p class="mt-1 ui-text">{{ $ct->email ?? '-' }}</p>
                                                </div>

                                                <div class="ui-border rounded-lg p-3"
                                                    style="background-color: var(--bg-surface);">
                                                    <p class="text-xs ui-muted">Estado</p>
                                                    <p class="mt-1 ui-text font-semibold">{{ $ct->estado ?? '-' }}</p>
                                                </div>

                                                <div class="ui-border rounded-lg p-3"
                                                    style="background-color: var(--bg-surface);">
                                                    <p class="text-xs ui-muted">Principal</p>
                                                    <p class="mt-1 ui-text font-semibold">
                                                        {{ (int) $ct->es_principal === 1 ? 'Sí' : 'No' }}</p>
                                                </div>

                                                 {{-- NOTAS FULL WIDTH --}}
        <div class="ui-border rounded-lg p-3 sm:col-span-2 lg:col-span-3"
            style="background-color: var(--bg-surface);">
            <p class="text-xs ui-muted">Notas</p>
            <div class="mt-2 ui-text whitespace-pre-wrap break-words">
                {{ $ct->notas ?: '-' }}
            </div>
        </div>

    </div>

                                            </div>
                                        </dialog>

                                        {{-- EDITAR (icono lápiz) --}}
                                        <a href="{{ route('admin.clientes.contactos.edit', [$cliente->id, $ct->id]) }}#form-contacto"
                                            class="inline-flex items-center mr-3 ui-btn-link">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.232 5.232l3.536 3.536M9 11l6.232-6.232a2.5 2.5 0 013.536 3.536L12.536 14.536a4 4 0 01-1.414.94L8 16l.524-3.122a4 4 0 01.94-1.414z" />
                                            </svg>
                                        </a>

                                        {{-- ELIMINAR (icono usuario con - en rojo) --}}
                                        <button type="button"
                                            class="inline-flex items-center opacity-90 hover:opacity-100 transition"
                                            style="color:#ef4444;"
                                            onclick="document.getElementById('modal-del-contacto-{{ $ct->id }}').showModal()">

                                            {{-- Heroicons/Flowbite: user-minus --}}
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19h6" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M2 19a7 7 0 0114 0" />
                                            </svg>
                                        </button>

                                        {{-- MODAL CONFIRMAR ELIMINAR --}}
                                        <dialog id="modal-del-contacto-{{ $ct->id }}"
                                            class="ui-modal ui-shadow p-0"
                                            onclick="if(event.target === this) this.close()">

                                            <div class="p-6">
                                                <h3 class="text-lg font-semibold" style="color: var(--text-main);">
                                                    Confirmar acción
                                                </h3>

                                                <p class="mt-2 text-sm" style="color: var(--text-muted);">
                                                    ¿Deseas eliminar el contacto:
                                                    <br>
                                                    <span class="font-semibold" style="color: var(--text-main);">
                                                        {{ $ct->nombre }} {{ $ct->apellido ?? '' }}
                                                    </span>?
                                                    <br>
                                                    <span class="text-xs ui-muted">
                                                        Esta acción no se puede deshacer.
                                                    </span>
                                                </p>

                                                <div class="mt-6 flex justify-end gap-3">
                                                    <button type="button" class="ui-btn"
                                                        onclick="document.getElementById('modal-del-contacto-{{ $ct->id }}').close()">
                                                        Cancelar
                                                    </button>

                                                    <form method="POST"
                                                        action="{{ route('admin.clientes.contactos.destroy', [$cliente->id, $ct->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="ui-btn-danger">
                                                            Eliminar
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </dialog>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="px-4 py-6 ui-muted">
                                        No hay contactos registrados para este cliente.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
