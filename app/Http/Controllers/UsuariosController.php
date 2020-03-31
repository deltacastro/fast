<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->mUser = new User;
    }

    public function departamentos(User $user, Request $request)
    {
        $departamentos = $user->departamentosGrouped()->makeHidden(['pivot','deleted_at','updated_at','created_at']);
        return response()->json([
            'status' => 200,
            'data' => $departamentos
        ]);
        if ($request->ajax()) {
            return response()->json([
                    'status' => 200,
                    'data' => $departamentos
                ]);
        }
    }
}
