<x-app-layout>
    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="ui-form-card">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-2xl font-bold ui-text">Detalle del usuario</h1>

                    <div class="flex gap-2">
                        <a href="{{ route('admin.usuarios.edit', ['id' => $usuario->id]) }}" class="ui-btn-primary">
                            Editar
                        </a>
                        <a href="{{ route('admin.usuarios.index') }}" class="ui-btn">
                            Volver
                        </a>
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <p class="text-sm ui-muted">Nombre</p>
                        <p class="font-medium ui-text">{{ $usuario->name }}</p>
                    </div>

                    <div>
                        <p class="text-sm ui-muted">Correo</p>
                        <p class="font-medium ui-text">{{ $usuario->email }}</p>
                    </div>

                    <div>
                        <p class="text-sm ui-muted">Teléfono</p>
                        <p class="font-medium ui-text">{{ $usuario->telefono ?: '—' }}</p>
                    </div>

                    <div>
                        <p class="text-sm ui-muted">Rol</p>
                        <p class="font-medium ui-text">{{ $usuario->role }}</p>
                    </div>

                    <div>
                        <p class="text-sm ui-muted">Estado</p>
                        <p class="font-medium ui-text">{{ ucfirst($usuario->estado) }}</p>
                    </div>

                    <div>
                        <p class="text-sm ui-muted">Último acceso</p>
                        <p class="font-medium ui-text">
                            {{ $usuario->last_login_at ? $usuario->last_login_at->format('d/m/Y H:i') : 'Nunca' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-sm ui-muted">Fecha de registro</p>
                        <p class="font-medium ui-text">
                            {{ $usuario->created_at?->format('d/m/Y H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>