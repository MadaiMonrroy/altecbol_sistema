<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoFavorito extends Model
{
    protected $table = 'producto_favoritos';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'producto_id',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}