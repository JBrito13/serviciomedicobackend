<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Sintoma;
use App\Http\Resources\SintomaCollection;
use Illuminate\Http\Request;

class SintomaController extends Controller
{
    public function index(Request $request)
    {
        $sintomas = new SintomaCollection(Sintoma::all()->where('estado_sintoma', 'A'));

        return response()->json($sintomas, 200);
    }
}
