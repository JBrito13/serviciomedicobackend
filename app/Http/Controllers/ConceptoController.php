<?php

namespace App\Http\Controllers;

use App\Models\Concepto;
use App\Http\Resources\ConceptoCollection;
use Illuminate\Http\Request;

class ConceptoController extends Controller
{
    public function index (Request $request) {

        $concepto = $request->input('id_concepto');

        if($concepto){
            $conceptos = new ConceptoCollection(Concepto::with('unidad')->where('id_concepto', $concepto)->get());

            [$conceptos] = $conceptos->toArray($request);

        } else {
            $conceptos = new ConceptoCollection(Concepto::all());

        }

        return response()->json($conceptos);
    }

    public function store(Request $request) {

        $concepto = new Concepto();

        $validateData = $request->validate([
            'codigo_concepto' => 'required|unique:sm_conceptos|min:10|max:10|string',
            'descripcion_concepto' => 'required|string',
            'estado_concepto' => 'required|string|min:1|max:1',
            'unidad' => 'required|array',
            'unidad.id_unidad' => 'required|integer',
            'stock_minimo' => 'required|min:1|integer'
        ]);

        $id_unidad = $validateData['unidad']['id_unidad'];

        $concepto->codigo_concepto = $validateData['codigo_concepto'];
        $concepto->descripcion_concepto = $validateData['descripcion_concepto'];
        $concepto->estado_concepto = $validateData['estado_concepto'];
        $concepto->id_unidad = $id_unidad;
        $concepto->stock_minimo = $validateData['stock_minimo'];

        $concepto->save();

        return response()->json($concepto, 200);
    }

    public function update(Request $request, $id_concepto) {

        $concepto = Concepto::all()->where('id_concepto', $id_concepto)->first();

        $concepto['codigo_concepto'] = $request->input('codigo_concepto');
        $concepto['descripcion_concepto'] = $request->input('descripcion_concepto');
        $concepto['estado_concepto'] = $request->input('estado_concepto');
        $concepto['id_unidad'] = $request->input('unidad')['id_unidad'];
        $concepto['stock_minimo'] = $request->input('stock_minimo');

        $concepto->save();

        return response()->json($concepto, 200);
    }
}
