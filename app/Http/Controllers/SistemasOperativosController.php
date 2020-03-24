<?php

namespace App\Http\Controllers;

use App\Sistema_Operativo;
use Illuminate\Http\Request;

class SistemasOperativosController extends Controller
{
    public function versiones(Sistema_Operativo $so, Request $request)
    {
        $sistemasOperativos = $so->versionesGrouped()->makeHidden(['pivot','deleted_at','updated_at','created_at']);
        return response()->json([
            'status' => 200,
            'data' => $sistemasOperativos
        ]);
        if ($request->ajax()) {
            return response()->json([
                    'status' => 200,
                    'data' => $sistemasOperativos
                ]);
        }
    }
}
