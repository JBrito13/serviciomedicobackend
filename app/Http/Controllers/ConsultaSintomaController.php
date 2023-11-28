<?php

namespace App\Http\Controllers;

use App\Models\ConsultaSintoma;
use App\Http\Resources\ConsultaSintomaCollection;
use Illuminate\Http\Request;

class ConsultaSintomaController extends Controller
{
    public function index(Request $request) {

        $id_consulta = $request->input('id_consulta');

        if($id_consulta) {
            
            $consultasintomas = new ConsultaSintomaCollection(ConsultaSintoma::all()->where('id_consulta', $id_consulta));

            [$consultasintomas] = $consultasintomas->toArray($request);

            return response()->json([$consultasintomas], 200);

        } else {

            return response()->json([
                'message' => 'La consulta indicada no posee sintomas asociados',
            ], 404);

        }

    }


}
