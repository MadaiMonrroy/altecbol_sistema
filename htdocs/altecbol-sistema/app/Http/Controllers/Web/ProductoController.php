<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Laravel\Facades\Image;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $categoriaId = $request->query('categoria_id');
        $marcaId = $request->query('marca_id');
        $estadoPublicacion = $request->query('estado_publicacion');
        $estadoStock = $request->query('estado_stock');
        $esOferta = $request->query('es_oferta');

        $query = Producto::query()
            ->with([
                'categoria:id,nombre',
                'marca:id,nombre',
                'imagenPrincipal',
            ]);

        if (!empty($categoriaId)) {
            $query->where('categoria_id', $categoriaId);
        }

        if (!empty($marcaId)) {
            $query->where('marca_id', $marcaId);
        }

        if ($estadoPublicacion !== null && $estadoPublicacion !== '') {
            $query->where('estado_publicacion', $estadoPublicacion);
        }

        if ($estadoStock !== null && $estadoStock !== '') {
            $query->where('estado_stock', $estadoStock);
        }

        if ($esOferta !== null && $esOferta !== '') {
            $query->where('es_oferta', $esOferta);
        }

        $productos = $query
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        $categorias = Categoria::query()
            ->where('estado', 'activo')
            ->orderBy('nombre')
            ->get(['id', 'nombre']);

        $marcas = Marca::query()
            ->where('estado', 'activo')
            ->orderBy('nombre')
            ->get(['id', 'nombre', 'imagen']);

        return view('admin.productos.index', compact(
            'productos',
            'categorias',
            'marcas',
            'categoriaId',
            'marcaId',
            'estadoPublicacion',
            'estadoStock',
            'esOferta'
        ));
    }

    public function create()
    {
        $categorias = Categoria::query()
            ->where('estado', 'activo')
            ->orderBy('nombre')
            ->get(['id', 'nombre']);

        $marcas = Marca::query()
            ->where('estado', 'activo')
            ->orderBy('nombre')
            ->get(['id', 'nombre', 'imagen']);

        return view('admin.productos.create', compact('categorias', 'marcas'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'categoria_id' => ['required', 'exists:categorias,id'],
            'marca_id' => ['nullable', 'exists:marcas,id'],
            'nombre' => ['required', 'string', 'max:180'],
            'codigo' => ['required', 'string', 'max:100', 'unique:productos,codigo'],
            'sku' => ['nullable', 'string', 'max:100', 'unique:productos,sku'],
            'descripcion' => ['nullable', 'string'],
            'caracteristicas' => ['nullable', 'string'],
            'garantia' => ['nullable', 'string', 'max:100'],
            'precio' => ['required', 'numeric', 'min:0'],
            'precio_oferta' => ['nullable', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'estado_publicacion' => ['required', Rule::in(['activo', 'inactivo', 'borrador'])],
            'estado_stock' => ['required', Rule::in(['disponible', 'agotado', 'consultar_stock'])],
            'es_oferta' => ['nullable', 'boolean'],

            'imagenes_principales' => ['nullable', 'array', 'max:2'],
            'imagenes_principales.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],

            'imagenes_secundarias' => ['nullable', 'array', 'max:12'],
            'imagenes_secundarias.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
        ]);

        $data['es_oferta'] = $request->boolean('es_oferta');

        unset(
            $data['imagenes_principales'],
            $data['imagenes_secundarias']
        );

        $producto = Producto::create($data);
        $producto->load('marca');

        if ($request->hasFile('imagenes_principales')) {
            $this->guardarImagenesProducto($producto, $request->file('imagenes_principales'), 'principal');
        }

        if ($request->hasFile('imagenes_secundarias')) {
            $this->guardarImagenesProducto($producto, $request->file('imagenes_secundarias'), 'secundaria');
        }

        return redirect()
            ->route('admin.productos.index')
            ->with('success', 'Producto registrado correctamente.');
    }

    public function show($id)
    {
        $producto = Producto::with([
            'categoria:id,nombre',
            'marca:id,nombre,imagen',
            'imagenes',
            'imagenPrincipal',
            'imagenesPrincipales',
            'imagenesSecundarias',
        ])->findOrFail($id);

        return view('admin.productos.show', compact('producto'));
    }

    public function edit($id)
    {
        $producto = Producto::with([
            'imagenes',
            'imagenesPrincipales',
            'imagenesSecundarias',
            'imagenPrincipal',
            'marca',
            'categoria',
        ])->findOrFail($id);

        $categorias = Categoria::query()
            ->where('estado', 'activo')
            ->orderBy('nombre')
            ->get(['id', 'nombre']);

        $marcas = Marca::query()
            ->where('estado', 'activo')
            ->orderBy('nombre')
            ->get(['id', 'nombre', 'imagen']);

        return view('admin.productos.edit', compact('producto', 'categorias', 'marcas'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::with(['imagenes', 'marca'])->findOrFail($id);

        $nombreAnterior = $producto->nombre;
        $codigoAnterior = $producto->codigo;
        $marcaAnterior = $producto->marca?->nombre ?? 'sin-marca';

        $data = $request->validate([
            'categoria_id' => ['required', 'exists:categorias,id'],
            'marca_id' => ['nullable', 'exists:marcas,id'],
            'nombre' => ['required', 'string', 'max:180'],
            'codigo' => ['required', 'string', 'max:100', Rule::unique('productos', 'codigo')->ignore($producto->id)],
            'sku' => ['nullable', 'string', 'max:100', Rule::unique('productos', 'sku')->ignore($producto->id)],
            'descripcion' => ['nullable', 'string'],
            'caracteristicas' => ['nullable', 'string'],
            'garantia' => ['nullable', 'string', 'max:100'],
            'precio' => ['required', 'numeric', 'min:0'],
            'precio_oferta' => ['nullable', 'numeric', 'min:0'],
            'stock' => ['required', 'integer', 'min:0'],
            'estado_publicacion' => ['required', Rule::in(['activo', 'inactivo', 'borrador'])],
            'estado_stock' => ['required', Rule::in(['disponible', 'agotado', 'consultar_stock'])],
            'es_oferta' => ['nullable', 'boolean'],

            'imagenes_principales' => ['nullable', 'array', 'max:2'],
            'imagenes_principales.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],

            'imagenes_secundarias' => ['nullable', 'array', 'max:12'],
            'imagenes_secundarias.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],

            'eliminar_imagenes' => ['nullable', 'array'],
            'eliminar_imagenes.*' => ['integer', 'exists:producto_imagenes,id'],
        ]);

        $data['es_oferta'] = $request->boolean('es_oferta');

        unset(
            $data['imagenes_principales'],
            $data['imagenes_secundarias'],
            $data['eliminar_imagenes']
        );

        $producto->update($data);
        $producto->refresh()->load(['marca', 'imagenes']);

        if ($request->filled('eliminar_imagenes')) {
            $imagenesEliminar = $producto->imagenes()
                ->whereIn('id', $request->input('eliminar_imagenes', []))
                ->get();

            foreach ($imagenesEliminar as $img) {
                if ($img->imagen && Storage::disk('public')->exists($img->imagen)) {
                    Storage::disk('public')->delete($img->imagen);
                }
                $img->delete();
            }
        }

        if ($request->hasFile('imagenes_principales')) {
            $this->guardarImagenesProducto($producto, $request->file('imagenes_principales'), 'principal');
        }

        if ($request->hasFile('imagenes_secundarias')) {
            $this->guardarImagenesProducto($producto, $request->file('imagenes_secundarias'), 'secundaria');
        }

        $marcaNueva = $producto->marca?->nombre ?? 'sin-marca';
        $nombreNuevo = $producto->nombre;
        $codigoNuevo = $producto->codigo;

        $cambioIdentidad =
            $marcaAnterior !== $marcaNueva ||
            $nombreAnterior !== $nombreNuevo ||
            $codigoAnterior !== $codigoNuevo;

        if ($cambioIdentidad) {
            $this->renombrarImagenesProductoExistentes($producto, $nombreAnterior);
        }

        return redirect()
            ->route('admin.productos.edit', $producto->id)
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::with('imagenes')->findOrFail($id);

        foreach ($producto->imagenes as $img) {
            if ($img->imagen && Storage::disk('public')->exists($img->imagen)) {
                Storage::disk('public')->delete($img->imagen);
            }
        }

        $slugProducto = Str::slug($producto->nombre ?: 'producto');
        $carpetaProducto = 'productos/' . $slugProducto;

        $producto->imagenes()->delete();
        $producto->delete();

        if (Storage::disk('public')->exists($carpetaProducto)) {
            $archivosRestantes = Storage::disk('public')->files($carpetaProducto);

            if (empty($archivosRestantes)) {
                Storage::disk('public')->deleteDirectory($carpetaProducto);
            }
        }

        return redirect()
            ->route('admin.productos.index')
            ->with('success', 'Producto eliminado correctamente.');
    }

    private function guardarImagenesProducto(Producto $producto, array $archivos, string $tipo): void
    {
        $nombreProducto = $producto->nombre ?? 'producto';
        $codigo = $producto->codigo ?? 'sin-codigo';

        $slugProducto = Str::slug($nombreProducto);
        $baseNombre = Str::slug($nombreProducto . ' ' . $codigo);

        $carpeta = 'productos/' . $slugProducto;

        $ultimoOrden = (int) $producto->imagenes()->max('orden');

        foreach ($archivos as $index => $archivo) {
            $orden = $ultimoOrden + $index + 1;

            $nombreArchivo = $baseNombre
    . '-'
    . Str::lower(Str::random(8))
    . '.webp';

            $rutaRelativa = $carpeta . '/' . $nombreArchivo;

            $imagen = Image::read($archivo)->scaleDown(width: 1400);

            Storage::disk('public')->put(
                $rutaRelativa,
                (string) $imagen->toWebp(75)
            );

            $producto->imagenes()->create([
                'imagen' => $rutaRelativa,
                'tipo' => $tipo,
                'orden' => $orden,
            ]);
        }
    }

    private function renombrarImagenesProductoExistentes(Producto $producto, string $nombreAnterior): void
    {
        $producto->loadMissing(['imagenes']);

        $slugAnterior = Str::slug($nombreAnterior ?: 'producto');
        $slugNuevo = Str::slug($producto->nombre ?: 'producto');
        $codigo = $producto->codigo ?? 'sin-codigo';

        $carpetaAnterior = 'productos/' . $slugAnterior;
        $carpetaNueva = 'productos/' . $slugNuevo;

        foreach ($producto->imagenes as $img) {
            if (!$img->imagen || !Storage::disk('public')->exists($img->imagen)) {
                continue;
            }

            $nombreNuevo = Str::slug(($producto->nombre ?? 'producto') . ' ' . $codigo)
    . '-'
    . Str::lower(Str::random(8))
    . '.webp';

            $rutaNueva = $carpetaNueva . '/' . $nombreNuevo;

            if ($img->imagen !== $rutaNueva) {
                Storage::disk('public')->move($img->imagen, $rutaNueva);

                $img->update([
                    'imagen' => $rutaNueva,
                ]);
            }
        }

        if ($carpetaAnterior !== $carpetaNueva && Storage::disk('public')->exists($carpetaAnterior)) {
            $archivosRestantes = Storage::disk('public')->files($carpetaAnterior);

            if (empty($archivosRestantes)) {
                Storage::disk('public')->deleteDirectory($carpetaAnterior);
            }
        }
    }
    
}