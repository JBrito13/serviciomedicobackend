<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use App\Http\Resources\UnidadCollection;
use App\Http\Resources\UnidadResource;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    public function index (Request $request) {

        $unidades = new UnidadCollection(Unidad::all());

        return response()->json($unidades);

    }

    public function show($id_unidad) {

        $unidad = new UnidadResource(Unidad::where('id_unidad', $id_unidad)->first());

        return response()->json($unidad);

    }
}
