<?php

namespace App\Http\Controllers\TI;

use App\Equipo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\People;
use App\Tipo_Equipo;

class EquiposController extends Controller
{
    public function __construct()
    {
        $this->mEquipo = new Equipo;
        $this->mPeople = new People;
        $this->mTipoEquipo = new Tipo_Equipo;
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

    public function create()
    {
        $personas = $this->mPeople->get();
        $tiposEquipos = $this->mTipoEquipo->get();
        return view('ti.equipo._form', compact('personas', 'tiposEquipos'));
    }

    public function store()
    {

    }
}
