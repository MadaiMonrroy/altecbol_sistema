<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\ClienteContactoController;
use App\Http\Controllers\ClienteInternetProveedorController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Web\ProductoController;
use App\Http\Controllers\Web\CategoriaController;
use App\Http\Controllers\Web\MarcaController;
use App\Http\Controllers\Auth\AdminAuthenticatedSessionController;

Route::domain(env('APP_ADMIN_DOMAIN'))->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/', [AdminAuthenticatedSessionController::class, 'create'])
            ->name('admin.login');

        Route::get('/login', [AdminAuthenticatedSessionController::class, 'create']);

        Route::post('/login', [AdminAuthenticatedSessionController::class, 'store'])
            ->name('admin.login.store');
    });

    Route::middleware(['auth', 'auth.session', 'verified', 'admin.access'])
        ->name('admin.')
        ->group(function () {

            Route::post('/logout', [AdminAuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

            Route::get('/pdf-test', function () {
                $binary = env('WKHTMLTOPDF_BINARY', 'C:/PROGRA~1/wkhtmltopdf/bin/wkhtmltopdf.exe');

                $html = '
                    <html>
                        <head><meta charset="utf-8"></head>
                        <body style="font-family: Arial;">
                            <h1>PDF OK</h1>
                            <p>wkhtmltopdf funcionando en XAMPP</p>
                        </body>
                    </html>
                ';

                /** @var \Knp\Snappy\Pdf $snappy */
                $snappy = app('snappy.pdf');
                $snappy->setBinary($binary);

                $content = $snappy->getOutputFromHtml($html, [
                    'enable-local-file-access' => true,
                ]);

                return response($content, 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="test.pdf"',
                ]);
            })->name('pdf.test');

            Route::view('/dashboard', 'dashboard')->name('dashboard');

            Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
            Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
            Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
            Route::get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
            Route::get('/usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
            Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');

            Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
            Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
            Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
            Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
            Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');
            Route::patch('/clientes/{id}/inactivar', [ClienteController::class, 'inactivar'])->name('clientes.inactivar');
            Route::patch('/clientes/{id}/activar', [ClienteController::class, 'activar'])->name('clientes.activar');

            Route::get('/clientes/{cliente}/contactos', [ClienteContactoController::class, 'index'])
                ->name('clientes.contactos.index');
            Route::post('/clientes/{cliente}/contactos', [ClienteContactoController::class, 'store'])
                ->name('clientes.contactos.store');
            Route::get('/clientes/{cliente}/contactos/{contacto}/edit', [ClienteContactoController::class, 'edit'])
                ->name('clientes.contactos.edit');
            Route::put('/clientes/{cliente}/contactos/{contacto}', [ClienteContactoController::class, 'update'])
                ->name('clientes.contactos.update');
            Route::delete('/clientes/{cliente}/contactos/{contacto}', [ClienteContactoController::class, 'destroy'])
                ->name('clientes.contactos.destroy');

            Route::get('/clientes/{cliente}/internet-proveedores', [ClienteInternetProveedorController::class, 'index'])
                ->name('clientes.proveedores.index');
            Route::post('/internet-proveedores', [ClienteInternetProveedorController::class, 'store'])
                ->name('clientes.proveedores.store');
            Route::get('/internet-proveedores/{id}/edit', [ClienteInternetProveedorController::class, 'edit'])
                ->name('clientes.proveedores.edit');
            Route::put('/internet-proveedores/{id}', [ClienteInternetProveedorController::class, 'update'])
                ->name('clientes.proveedores.update');
            Route::delete('/internet-proveedores/{id}', [ClienteInternetProveedorController::class, 'destroy'])
                ->name('clientes.proveedores.destroy');

            Route::get('/cotizaciones', [CotizacionController::class, 'index'])->name('cotizaciones.index');
            Route::get('/cotizaciones/create', [CotizacionController::class, 'create'])->name('cotizaciones.create');
            Route::post('/cotizaciones', [CotizacionController::class, 'store'])->name('cotizaciones.store');
            Route::get('/cotizaciones/{id}/edit', [CotizacionController::class, 'edit'])->name('cotizaciones.edit');
            Route::put('/cotizaciones/{id}', [CotizacionController::class, 'update'])->name('cotizaciones.update');
            Route::get('/cotizaciones/{id}/pdf', [CotizacionController::class, 'pdf'])->name('cotizaciones.pdf');

            Route::prefix('productos')->name('productos.')->group(function () {
                Route::prefix('categorias')->name('categorias.')->group(function () {
                    Route::get('/', [CategoriaController::class, 'index'])->name('index');
                    Route::get('/create', [CategoriaController::class, 'create'])->name('create');
                    Route::post('/', [CategoriaController::class, 'store'])->name('store');
                    Route::get('/{id}/edit', [CategoriaController::class, 'edit'])->name('edit');
                    Route::put('/{id}', [CategoriaController::class, 'update'])->name('update');
                    Route::delete('/{id}', [CategoriaController::class, 'destroy'])->name('destroy');
                });

                Route::prefix('marcas')->name('marcas.')->group(function () {
                    Route::get('/', [MarcaController::class, 'index'])->name('index');
                    Route::get('/create', [MarcaController::class, 'create'])->name('create');
                    Route::post('/', [MarcaController::class, 'store'])->name('store');
                    Route::get('/{id}/edit', [MarcaController::class, 'edit'])->name('edit');
                    Route::put('/{id}', [MarcaController::class, 'update'])->name('update');
                    Route::delete('/{id}', [MarcaController::class, 'destroy'])->name('destroy');
                });

                Route::get('/', [ProductoController::class, 'index'])->name('index');
                Route::get('/create', [ProductoController::class, 'create'])->name('create');
                Route::post('/', [ProductoController::class, 'store'])->name('store');
                Route::get('/{id}', [ProductoController::class, 'show'])->name('show');
                Route::get('/{id}/edit', [ProductoController::class, 'edit'])->name('edit');
                Route::put('/{id}', [ProductoController::class, 'update'])->name('update');
                Route::delete('/{id}', [ProductoController::class, 'destroy'])->name('destroy');

                Route::view('/carritos', 'admin.productos.carritos.index')->name('carritos.index');
                Route::view('/favoritos', 'admin.productos.favoritos.index')->name('favoritos.index');
            });

            Route::view('/productos/ventas', 'admin.productos.ventas.index')->name('productos.ventas.index');

            Route::view('/servicios-mensualizados/soporte-tecnico', 'admin.servicios-mensualizados.soporte-tecnico.index')
                ->name('servicios-mensualizados.soporte-tecnico.index');

            Route::view('/servicios-mensualizados/alquiler-servidores', 'admin.servicios-mensualizados.alquiler-servidores.index')
                ->name('servicios-mensualizados.alquiler-servidores.index');

            Route::view('/proyectos', 'admin.proyectos.index')->name('proyectos.index');

            Route::view('/operaciones/incidencias', 'admin.operaciones.incidencias.index')
                ->name('operaciones.incidencias.index');

            Route::view('/operaciones/diseno-red', 'admin.operaciones.diseno-red.index')
                ->name('operaciones.diseno-red.index');

            Route::view('/operaciones/credenciales', 'admin.operaciones.credenciales.index')
                ->name('operaciones.credenciales.index');

            Route::view('/operaciones/servidores', 'admin.operaciones.servidores.index')
                ->name('operaciones.servidores.index');

            Route::view('/administracion/compras', 'admin.administracion.compras.index')
                ->name('administracion.compras.index');

            Route::view('/administracion/cobros', 'admin.administracion.cobros.index')
                ->name('administracion.cobros.index');

            Route::view('/administracion/calendario', 'admin.administracion.calendario.index')
                ->name('administracion.calendario.index');

            Route::view('/reportes', 'admin.reportes.index')->name('reportes.index');

            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });
        Route::get('/test-gd', function () {
    dd(
        extension_loaded('gd'),
        function_exists('imagecreatefromwebp'),
        gd_info()
    );
});
});