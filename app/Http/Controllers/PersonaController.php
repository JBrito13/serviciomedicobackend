<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Http\Resources\PersonaCollection;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index(Request $request)
    {

        $identificacion = $request->input('identificacion');

        if($identificacion) {
            $personas = new PersonaCollection(Persona::all()->where('identificacion', $identificacion));
            $arraykey = array_keys($personas->toArray($request));

            if($arraykey == null || $arraykey == '') {
                return response()->json([
                    'message' => 'Esta persona no está registrada en el sistema.'
                ], 404);
            } else {

                $personas = $personas[$arraykey[0]];
                return response()->json($personas, 200);
            }
        } else {
            $personas = new PersonaCollection(Persona::all());
            return response()->json($personas, 200);
        }

    }
}
