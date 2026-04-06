<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\CatalogoController;

Route::domain(env('APP_MINI_DOMAIN'))->group(function () {

    Route::get('/', function () {
        return view('websitio.index');
    })->name('mini.home');

    Route::get('/catalogo-productos', [CatalogoController::class, 'index'])->name('mini.catalogo.index');

    Route::get('/portafolio-soluciones', function () {
        return view('websitio.portafolio-soluciones');
    })->name('mini.portafolio.soluciones');

    Route::get('/proyectos-destacados', function () {
        return view('websitio.proyectos-destacados');
    })->name('mini.proyectos.destacados');
});