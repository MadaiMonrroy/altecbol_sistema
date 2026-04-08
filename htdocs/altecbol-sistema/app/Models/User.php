<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public const ROLES = [
        'comprador_web',
        'admin',
        'comercial',
        'soporte_1',
        'soporte_2',
        'soporte_3',
        'finanzas',
    ];

    public const ESTADOS = [
        'activo',
        'inactivo',
        'bloqueado',
    ];

    /**
     * Campos asignables
     */
    protected $fillable = [
        'name',
        'email',
        'telefono',
        'password',
        'role',
        'estado',
        'last_login_at',
    ];

    /**
     * Campos ocultos
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'last_login_at'     => 'datetime',
            'password'          => 'hashed',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    public function scopeFiltro(Builder $query, ?string $q = null, ?string $role = null, ?string $estado = null): Builder
    {
        return $query
            ->when($q, function ($query) use ($q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('name', 'like', "%{$q}%")
                        ->orWhere('email', 'like', "%{$q}%")
                        ->orWhere('telefono', 'like', "%{$q}%");
                });
            })
            ->when($role, fn ($query) => $query->where('role', $role))
            ->when($estado, fn ($query) => $query->where('estado', $estado));
    }

    public function scopeInternos(Builder $query): Builder
    {
        return $query->whereIn('role', [
            'admin',
            'comercial',
            'soporte_1',
            'soporte_2',
            'soporte_3',
            'finanzas',
        ]);
    }

    public function scopeWeb(Builder $query): Builder
    {
        return $query->where('role', 'comprador_web');
    }

    /**
     * Listado reutilizable
     */
    public static function listar(?string $q = null, ?string $role = null, ?string $estado = null, int $perPage = 15)
    {
        return self::select([
                'id',
                'name',
                'email',
                'telefono',
                'role',
                'estado',
                'last_login_at',
                'created_at',
            ])
            ->filtro($q, $role, $estado)
            ->orderByDesc('id')
            ->paginate($perPage);
    }

    public function carritos()
    {
        return $this->hasMany(\App\Models\Carrito::class);
    }
    public function productosFavoritos()
{
    return $this->hasMany(ProductoFavorito::class, 'user_id');
}
}