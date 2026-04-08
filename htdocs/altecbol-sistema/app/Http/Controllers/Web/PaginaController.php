<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaginaController extends Controller
{
    public function nosotros()
    {
        return view('web.nosotros');
    }

    public function servicios()
    {
        return view('web.servicios');
    }

    public function planes()
    {
        return view('web.planes');
    }
}