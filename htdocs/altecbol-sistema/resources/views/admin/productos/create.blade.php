<x-app-layout>
    <div class="py-8">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('admin.productos.store') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.productos.partials.form')
            </form>
        </div>
    </div>
</x-app-layout>