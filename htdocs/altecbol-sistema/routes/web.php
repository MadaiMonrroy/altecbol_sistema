<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\PaginaController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\ContactoController;
use App\Http\Controllers\Web\TiendaController;
use App\Http\Controllers\Web\CarritoController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\CasoExitoController;
use App\Http\Controllers\Web\MiCuentaController;
use App\Http\Controllers\Web\ProductoFavoritoController;

Route::domain(env('APP_MAIN_DOMAIN'))->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('web.home');

    Route::get('/nosotros', [PaginaController::class, 'nosotros'])->name('web.nosotros');
    Route::get('/servicios', [PaginaController::class, 'servicios'])->name('web.servicios');
    Route::get('/planes', [PaginaController::class, 'planes'])->name('web.planes');

    Route::get('/contacto', [ContactoController::class, 'index'])->name('web.contacto');
    Route::post('/contacto', [ContactoController::class, 'enviar'])->name('web.contacto.enviar');

    Route::get('/blog', [BlogController::class, 'index'])->name('web.blog');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('web.blog-show');

    Route::prefix('tienda')->group(function () {
        Route::get('/', [TiendaController::class, 'index'])->name('web.tienda.index');
        Route::get('/producto/{codigo}', [TiendaController::class, 'show'])->name('web.tienda.producto');
    });

    Route::middleware(['web.customer'])->prefix('tienda')->group(function () {
        Route::get('/carrito', [CarritoController::class, 'index'])->name('web.tienda.carrito');
        Route::post('/carrito/agregar/{id}', [CarritoController::class, 'agregar'])->name('web.tienda.carrito.agregar');
        Route::post('/carrito/actualizar/{id}', [CarritoController::class, 'actualizar'])->name('web.tienda.carrito.actualizar');
        Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])->name('web.tienda.carrito.eliminar');

        Route::get('/checkout', [CheckoutController::class, 'index'])->name('web.tienda.checkout');
        Route::post('/checkout', [CheckoutController::class, 'procesar'])->name('web.tienda.checkout.procesar');

        Route::get('/confirmacion/{codigo}', [CheckoutController::class, 'confirmacion'])->name('web.tienda.confirmacion');
        Route::post('/confirmacion/{codigo}/reportar-pago', [CheckoutController::class, 'reportarPago'])
            ->name('web.tienda.confirmacion.reportar-pago');

        Route::post('/favoritos/{producto}', [ProductoFavoritoController::class, 'toggle'])
            ->name('web.tienda.favoritos.toggle');
    });

    Route::prefix('casos-de-exito')->group(function () {
        Route::get('/', [CasoExitoController::class, 'index'])->name('web.casos.index');
        Route::get('/{slug}', [CasoExitoController::class, 'show'])->name('web.casos.show');
    });

    Route::middleware(['auth', 'web.customer', 'auth.session'])->group(function () {
    Route::get('/mi-cuenta', [MiCuentaController::class, 'index'])->name('web.mi-cuenta.index');
    Route::patch('/mi-cuenta', [MiCuentaController::class, 'update'])->name('web.mi-cuenta.update');
    Route::patch('/mi-cuenta/password', [MiCuentaController::class, 'updatePassword'])->name('web.mi-cuenta.password.update');
    Route::get('/pedidos', [MiCuentaController::class, 'pedidos'])->name('web.mi-cuenta.pedidos');
    Route::get('/pedidos/{codigo}', [MiCuentaController::class, 'pedidoShow'])->name('web.mi-cuenta.pedidos.show');
    Route::get('/mis-favoritos', [MiCuentaController::class, 'favoritos'])->name('web.mi-cuenta.favoritos');
});

    require __DIR__ . '/auth.php';
});