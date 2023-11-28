<?php

namespace App\Http\Controllers;

use App\Http\Resources\RolCollection;
use App\Http\Resources\RolResource;
use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index (Request $request) {

        $rol = new RolCollection(Rol::all());

        return response()->json($rol, 200);

    }

    public function show($id_rol) {

        $rol = new RolResource(Rol::where('id_rol', $id_rol)->first());

        if ($rol->resource !== null) {
            return response()->json($rol, 200);
        } else {
            return response()->json([
                'message' => 'Ocurrió un error al obtener el rol.',
            ], 404);
        }

    }
}
