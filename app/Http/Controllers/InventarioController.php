<?php

namespace App\Http\Controllers;

use App\Http\Resources\InventarioCollection;
use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index() {

        $inventario = new InventarioCollection(Inventario::all());

        return response()->json($inventario);
    }

}
