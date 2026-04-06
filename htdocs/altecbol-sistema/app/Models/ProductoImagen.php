<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductoImagen extends Model
{
    protected $table = 'producto_imagenes';

   protected $fillable = [
    'producto_id',
    'imagen',
    'tipo',
    'orden',
];
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function getUrlAttribute(): ?string
    {
        return asset('storage/' . $this->imagen);
    }
}