<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class CasoExitoController extends Controller
{
    public function index()
    {
        return view('web.casos.index');
    }

    public function show($slug)
    {
        return view('web.casos.show', compact('slug'));
    }
}