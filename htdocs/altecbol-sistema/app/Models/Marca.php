<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table = 'marcas';

   protected $fillable = [
    'nombre',
    'descripcion',
    'imagen',
    'estado',
];
public function getImagenUrlAttribute()
{
    if (!$this->imagen) {
        return asset('images/no-brand.png');
    }

    return asset('storage/' . $this->imagen);
}
    public function productos()
    {
        return $this->hasMany(Producto::class, 'marca_id');
    }
}