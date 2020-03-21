<?php

namespace App\Http\Controllers\TI;

use App\Equipo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EquiposController extends Controller
{
    public function __construct()
    {
        $this->mEquipo = new Equipo;
    }

    public function index()
    {
        $equipos = $this->mEquipo->get();
        return view('ti.equipo.index', compact('equipos'));
    }

    public function list(Request $request)
    {
        $equipos = $this->mEquipo->withTrashed();
        $qr = $request->input('query', null);
        $equipos = $equipos->buscar($qr)->orderBy('created_at', 'desc')->paginate(10);
        return view('ti.equipo._list', compact('equipos'));
    }
}
