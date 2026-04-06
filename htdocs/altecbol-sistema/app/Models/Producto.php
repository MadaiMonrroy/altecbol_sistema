<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'categoria_id',
        'marca_id',
        'nombre',
        'codigo',
        'sku',
        'descripcion',
        'caracteristicas',
        'garantia',
        'precio',
        'precio_oferta',
        'stock',
        'estado_publicacion',
        'estado_stock',
        'es_oferta',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'precio_oferta' => 'decimal:2',
        'stock' => 'integer',
        'es_oferta' => 'boolean',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }
    public function imagenes()
{
    return $this->hasMany(ProductoImagen::class, 'producto_id')->orderBy('orden');
}

public function imagenesPrincipales()
{
    return $this->hasMany(ProductoImagen::class, 'producto_id')
        ->where('tipo', 'principal')
        ->orderBy('orden');
}

public function imagenesSecundarias()
{
    return $this->hasMany(ProductoImagen::class, 'producto_id')
        ->where('tipo', 'secundaria')
        ->orderBy('orden');
}

public function imagenPrincipal()
{
    return $this->hasOne(ProductoImagen::class, 'producto_id')
        ->where('tipo', 'principal')
        ->orderBy('orden');
}
public function getPrecioFinalAttribute()
{
    if (
        !is_null($this->precio_oferta) &&
        (float) $this->precio_oferta > 0 &&
        (float) $this->precio_oferta < (float) $this->precio
    ) {
        return (float) $this->precio_oferta;
    }

    return (float) $this->precio;
}

public function getTieneOfertaAttribute()
{
    return !is_null($this->precio_oferta)
        && (float) $this->precio_oferta > 0
        && (float) $this->precio_oferta < (float) $this->precio;
}

public function getImagenPrincipalUrlAttribute()
{
    if ($this->imagenPrincipal && $this->imagenPrincipal->imagen) {
        return asset('storage/' . $this->imagenPrincipal->imagen);
    }

    return asset('websitio/ing/default.webp');
}

public function getPorcentajeDescuentoAttribute()
{
    if (
        !is_null($this->precio_oferta) &&
        (float) $this->precio_oferta > 0 &&
        (float) $this->precio_oferta < (float) $this->precio &&
        (float) $this->precio > 0
    ) {
        $descuento = 100 - (((float) $this->precio_oferta * 100) / (float) $this->precio);
        return (int) round($descuento);
    }

    return 0;
}

public function getSegundaImagenPrincipalUrlAttribute()
{
    $segunda = $this->imagenesPrincipales()->skip(1)->first();

    if ($segunda && $segunda->imagen) {
        return asset('storage/' . $segunda->imagen);
    }

    return $this->imagen_principal_url;
}
public function favoritos()
{
    return $this->hasMany(ProductoFavorito::class, 'producto_id');
}
public function getEsFavoritoAttribute()
{
    if (!Auth::check()) {
        return false;
    }

    return $this->favoritos()
        ->where('user_id', Auth::id())
        ->exists();
}
}