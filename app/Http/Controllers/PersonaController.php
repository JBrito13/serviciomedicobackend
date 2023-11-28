<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Http\Resources\PersonaCollection;
use App\Http\Resources\PersonaResource;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {

        $personas = new PersonaCollection(Persona::all());
        
        return response()->json($personas, 200);

    }

    public function show ($identificacion) {

        $persona = new PersonaResource(Persona::where('identificacion', $identificacion)->first());

        if($persona->resource !== null) {
            return response()->json($persona, 200);
        } else {
            return response()->json('Esta persona no está registrada en el sistema.', 404);
        }

    }
}
