<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'carrito_id',
        'user_id',
        'numero_orden',
        'tracking_token',
        'nombre_cliente',
        'telefono_cliente',
        'email_cliente',
        'direccion_cliente',
        'subtotal',
        'descuento',
        'total',
        'metodo_pago',
        'estado',
        'qr_imagen',
        'qr_texto',
        'soporte_whatsapp',
        'observaciones',
        'reported_payment_at',
        'paid_at',
    ];

    protected $casts = [
        'subtotal' => 'decimal:2',
        'descuento' => 'decimal:2',
        'total' => 'decimal:2',
        'reported_payment_at' => 'datetime',
        'paid_at' => 'datetime',
    ];

    public function items()
    {
        return $this->hasMany(PedidoItem::class, 'pedido_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function carrito()
    {
        return $this->belongsTo(Carrito::class, 'carrito_id');
    }
}