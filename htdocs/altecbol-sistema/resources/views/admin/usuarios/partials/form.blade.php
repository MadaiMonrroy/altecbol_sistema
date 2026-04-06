@php
    $isEdit = isset($usuario) && $usuario->exists;
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    {{-- Nombre --}}
    <div class="ui-field md:col-span-2">
        <label for="name" class="ui-label">Nombre completo</label>
        <input
            type="text"
            name="name"
            id="name"
            class="ui-input @error('name') ui-invalid @enderror"
            value="{{ old('name', $usuario->name ?? '') }}"
            required
        >
        @error('name')
            <p class="ui-error">{{ $message }}</p>
        @enderror
    </div>

    {{-- Email --}}
    <div class="ui-field">
        <label for="email" class="ui-label">Correo electrónico</label>
        <input
            type="email"
            name="email"
            id="email"
            class="ui-input @error('email') ui-invalid @enderror"
            value="{{ old('email', $usuario->email ?? '') }}"
            required
        >
        @error('email')
            <p class="ui-error">{{ $message }}</p>
        @enderror
    </div>

    {{-- Teléfono --}}
    <div class="ui-field">
        <label for="telefono" class="ui-label">Teléfono</label>
        <input
            type="text"
            name="telefono"
            id="telefono"
            class="ui-input @error('telefono') ui-invalid @enderror"
            value="{{ old('telefono', $usuario->telefono ?? '') }}"
        >
        @error('telefono')
            <p class="ui-error">{{ $message }}</p>
        @enderror
    </div>

    {{-- Password --}}
    <div class="ui-field">
        <label for="password" class="ui-label">
            {{ $isEdit ? 'Nueva contraseña (opcional)' : 'Contraseña' }}
        </label>
        <input
            type="password"
            name="password"
            id="password"
            class="ui-input @error('password') ui-invalid @enderror"
            {{ $isEdit ? '' : 'required' }}
        >
        @error('password')
            <p class="ui-error">{{ $message }}</p>
        @enderror
    </div>

    {{-- Confirmar password --}}
    <div class="ui-field">
        <label for="password_confirmation" class="ui-label">Confirmar contraseña</label>
        <input
            type="password"
            name="password_confirmation"
            id="password_confirmation"
            class="ui-input"
            {{ $isEdit ? '' : 'required' }}
        >
    </div>

    {{-- Rol --}}
    <div class="ui-field">
        <label for="role" class="ui-label">Rol</label>
        <select name="role" id="role" class="ui-select @error('role') ui-invalid @enderror" required>
            <option value="comprador_web" @selected(old('role', $usuario->role ?? 'comprador_web') === 'comprador_web')>Comprador web</option>
            <option value="admin" @selected(old('role', $usuario->role ?? '') === 'admin')>Admin</option>
            <option value="comercial" @selected(old('role', $usuario->role ?? '') === 'comercial')>Comercial</option>
            <option value="soporte_1" @selected(old('role', $usuario->role ?? '') === 'soporte_1')>Soporte 1</option>
            <option value="soporte_2" @selected(old('role', $usuario->role ?? '') === 'soporte_2')>Soporte 2</option>
            <option value="soporte_3" @selected(old('role', $usuario->role ?? '') === 'soporte_3')>Soporte 3</option>
            <option value="finanzas" @selected(old('role', $usuario->role ?? '') === 'finanzas')>Finanzas</option>
        </select>
        @error('role')
            <p class="ui-error">{{ $message }}</p>
        @enderror
    </div>

    {{-- Estado --}}
    <div class="ui-field">
        <label for="estado" class="ui-label">Estado</label>
        <select name="estado" id="estado" class="ui-select @error('estado') ui-invalid @enderror" required>
            <option value="activo" @selected(old('estado', $usuario->estado ?? 'activo') === 'activo')>Activo</option>
            <option value="inactivo" @selected(old('estado', $usuario->estado ?? '') === 'inactivo')>Inactivo</option>
            <option value="bloqueado" @selected(old('estado', $usuario->estado ?? '') === 'bloqueado')>Bloqueado</option>
        </select>
        @error('estado')
            <p class="ui-error">{{ $message }}</p>
        @enderror
    </div>

</div>

<div class="flex justify-end gap-3 pt-6">
    <a href="{{ route('admin.usuarios.index') }}" class="ui-btn">
        Cancelar
    </a>

    <button type="submit" class="ui-btn-primary">
        {{ $isEdit ? 'Actualizar usuario' : 'Guardar usuario' }}
    </button>
</div>