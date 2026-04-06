<x-app-layout>
    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="ui-form-card">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold ui-text">Editar usuario</h3>

                    <a href="{{ route('admin.usuarios.index') }}" class="ui-btn">
                        Volver
                    </a>
                </div>

                @if(session('success'))
                    <div class="mb-4 rounded-lg px-4 py-3 text-sm"
                        style="background-color: color-mix(in srgb, #22c55e 15%, transparent); color: #22c55e;">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.usuarios.update', ['id' => $usuario->id]) }}" class="ui-form">
                    @csrf
                    @method('PUT')

                    @include('admin.usuarios.partials.form', ['usuario' => $usuario])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>