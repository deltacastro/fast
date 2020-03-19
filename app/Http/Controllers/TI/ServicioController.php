<?php

namespace App\Http\Controllers\TI;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ServicioController extends Controller
{
    public function __construct()
    {
        $this->mUser = new User;
    }

    public function index()
    {
        $users = $this->mUser->get();
        return view('ti.servicio.index', compact('users'));
    }
}
