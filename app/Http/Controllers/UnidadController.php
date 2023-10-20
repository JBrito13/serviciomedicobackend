<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use App\Http\Resources\UnidadCollection;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    public function index (Request $request) {

        $id_unidad = $request->input('id_unidad');

        if($id_unidad) {
            $unidades = new UnidadCollection(Unidad::with('concepto')->where('id_unidad', $id_unidad)->get());

            [$unidades] = $unidades->toArray($request);

            return response()->json($unidades);
        } else {
            $unidades = new UnidadCollection(Unidad::all());
            return response()->json($unidades);
        }

    }
}
