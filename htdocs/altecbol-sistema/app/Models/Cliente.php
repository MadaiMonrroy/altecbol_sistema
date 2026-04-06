<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'codigo_cliente',
        'razon_social',
        'nit',
        'tipo_cliente',
        'pais',
        'direccion',
        'tipo_servicio',
        'estado',
        'notas',
        'created_by',
        'updated_by',
    ];

    public function scopeBuscar(Builder $query, ?string $q): Builder
    {
        $q = trim((string) $q);

        if ($q === '') {
            return $query;
        }

        $like = '%' . $q . '%';

        return $query->where(function ($sub) use ($like) {
            $sub->where('codigo_cliente', 'like', $like)
                ->orWhere('razon_social', 'like', $like)
                ->orWhere('nit', 'like', $like)
                ->orWhere('tipo_cliente', 'like', $like)
                ->orWhere('pais', 'like', $like)
                ->orWhere('direccion', 'like', $like)
                ->orWhere('tipo_servicio', 'like', $like)
                ->orWhere('estado', 'like', $like)
                ->orWhere('notas', 'like', $like);
        });
    }

    public function scopeEstado(Builder $query, ?string $estado): Builder
    {
        $estado = strtolower(trim((string) $estado));

        if ($estado === '') {
            return $query;
        }

        return $query->whereRaw('LOWER(estado) = ?', [$estado]);
    }

    public function scopeTipoCliente(Builder $query, ?string $tipoCliente): Builder
    {
        $tipoCliente = strtolower(trim((string) $tipoCliente));

        if ($tipoCliente === '') {
            return $query;
        }

        return $query->whereRaw('LOWER(tipo_cliente) = ?', [$tipoCliente]);
    }

    public function scopeTipoServicio(Builder $query, ?string $tipoServicio): Builder
    {
        $tipoServicio = strtolower(trim((string) $tipoServicio));

        if ($tipoServicio === '') {
            return $query;
        }

        return $query->whereRaw('LOWER(tipo_servicio) = ?', [$tipoServicio]);
    }
}