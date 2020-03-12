<?php

namespace App\Http\Controllers\TI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicioController extends Controller
{
    public function index()
    {
        return view('ti.servicio.index');
    }
}
