<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Sintoma;
use App\Http\Resources\SintomaCollection;
use App\Http\Resources\SintomaResource;
use Illuminate\Http\Request;

class SintomaController extends Controller
{
    public function index(Request $request)
    {

        $sintoma = $request->input('id_sintoma');
        $activo = $request->input('activo');

        if ($sintoma) {
            $sintomas = new SintomaCollection(Sintoma::where('id_sintoma', $sintoma)->get());

            [$sintomas] = $sintomas->toArray($request);

        } else {

            if ($activo) {

                $sintomas = new SintomaCollection(Sintoma::where('estado_sintoma', 'A')->get()->sortBy('descripcion_sintoma'));
            } else {

                $sintomas = new SintomaCollection(Sintoma::all()->sortBy('descripcion_sintoma'));
            }
        }


        return response()->json($sintomas, 200);
    }

    public function show($id_sintoma) {

        $sintoma = new SintomaResource(Sintoma::where('id_sintoma', $id_sintoma)->first());

        if ($sintoma->resource !== null) {
            return response()->json($sintoma, 200);
        } else {
            return response()->json([
                'message' => 'Ocurrió un error al obtener el sintoma.',
            ], 404);
        }

    }

    public function store(Request $request) {

        $sintoma = new Sintoma();

        $validateData = $request->validate([
            'descripcion_sintoma' => 'required|string',
            'estado_sintoma' => 'required|string|min:1|max:1'
        ]);

        $sintoma->descripcion_sintoma = $validateData['descripcion_sintoma'];
        $sintoma->estado_sintoma = $validateData['estado_sintoma'];

        $sintoma->save();

        return response()->json($sintoma, 200);

    }

    public function update(Request $request, $id_sintoma) {

        $sintoma = Sintoma::all()->where('id_sintoma', $id_sintoma)->first();

        $sintoma['descripcion_sintoma'] = $request->input('descripcion_sintoma');
        $sintoma['estado_sintoma'] = $request->input('estado_sintoma');

        $sintoma->save();

        return response()->json($sintoma, 200);

    }
}
