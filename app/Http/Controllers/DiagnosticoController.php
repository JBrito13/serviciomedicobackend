<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use App\Http\Resources\DiagnosticoCollection;
use App\Http\Resources\DiagnosticoResource;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    public function index(Request $request) {

        $activo = $request->input('activo');

        if($activo){

            $diagnosticos = new DiagnosticoCollection(Diagnostico::where('estado_diagnostico', 'A')->get()->sortBy('descripcion_diagnostico'));

        } else {

            $diagnosticos = new DiagnosticoCollection(Diagnostico::all()->sortBy('descripcion_diagnostico'));

        }

        return response()->json($diagnosticos);

    }

    public function show($id_diagnostico) {

        $diagnostico = new DiagnosticoResource(Diagnostico::where('id_diagnostico', $id_diagnostico)->first());

        if ($diagnostico->resource !== null) {

            return response()->json($diagnostico, 200);

        } else {
            return response()->json('No se encontró el diagnostico', 404);
        }

    }

    public function store(Request $request) {

        $diagnostico = new Diagnostico();

        $validateData = $request->validate([
            'descripcion_diagnostico' => 'required|string',
            'estado_diagnostico' => 'required|string|min:1|max:1'
        ]);

        $diagnostico->descripcion_diagnostico = $validateData['descripcion_diagnostico'];
        $diagnostico->estado_diagnostico = $validateData['estado_diagnostico'];

        $diagnostico->save();

        return response()->json($diagnostico, 200);

    }

    public function update(Request $request, $id_diagnostico) {

        $diagnostico = Diagnostico::all()->where('id_diagnostico', $id_diagnostico)->first();

        $diagnostico['descripcion_diagnostico'] = $request->input('descripcion_diagnostico');
        $diagnostico['estado_diagnostico'] = $request->input('estado_diagnostico');

        $diagnostico->save();

        return response()->json($diagnostico, 200);

    }
}
