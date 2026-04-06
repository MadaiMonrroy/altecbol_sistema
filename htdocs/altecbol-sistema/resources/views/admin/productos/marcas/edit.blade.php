<x-app-layout>
    <div class="py-8">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="rounded-2xl p-6 shadow text-[var(--text-main)]"
                style="background-color: var(--bg-surface); border: 1px solid var(--border-color);">

                <div class="mb-6">
                    <h2 class="text-xl font-semibold tracking-tight text-[var(--text-main)]">
                        Editar marca
                    </h2>
                    <p class="text-sm mt-1 ui-muted">
                        Actualiza la información de la marca.
                    </p>
                </div>

                <form method="POST" action="{{ route('admin.productos.marcas.update', $marca->id) }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    @include('admin.productos.marcas.partials.form')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>