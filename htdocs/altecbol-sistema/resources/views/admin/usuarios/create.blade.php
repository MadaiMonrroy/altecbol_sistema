<x-app-layout>
    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="ui-form-card">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold ui-text">Nuevo usuario</h3>

                    <a href="{{ route('admin.usuarios.index') }}" class="ui-btn">
                        Volver
                    </a>
                </div>

                <form method="POST" action="{{ route('admin.usuarios.store') }}" class="ui-form">
                    @csrf

                    @include('admin.usuarios.partials.form', ['usuario' => $usuario])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>