<?php

namespace App\Http\Controllers;

use App\Exports\MorbilidadExport;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportesController extends Controller
{
    public function morbilidad(Request $request)
    {

        $formato = $request->input('formato');

        // if ($formato == 'excel') {
        //     return Excel::download(new MorbilidadExport(), 'morbilidad.xlsx');
        // }

        $validateData = $request->validate([
            'fechaInicio' => 'required',
            'fechaFin' => 'required'
        ]);

        $fechaIni = $validateData['fechaInicio'];
        $fechaIni = preg_replace('/\sGMT.*$/', '', $fechaIni);
        $fecha_inicio = Carbon::parse($fechaIni)->format('Y-m-d H:i:s');
        $fechaFin = $validateData['fechaFin'];
        $fechaFin = preg_replace('/\sGMT.*$/', '', $fechaFin);
        $fecha_fin = Carbon::parse($fechaFin)->format('Y-m-d H:i:s');

        if($fecha_inicio > $fecha_fin) {
            return response()->json('La fecha de inicio no puede ser mayor a la fecha de fin.', 404);
        }

        $results = DB::select("
            SELECT sd.descripcion_diagnostico as diagnostico, COUNT(st.id_diagnostico) AS cantidad
            FROM sm_consultas sc, sm_tratamientos st, sm_diagnosticos sd
            WHERE sc.id_consulta = st.id_consulta
            AND st.id_diagnostico = sd.id_diagnostico
            AND sc.fecha_consulta BETWEEN '$fecha_inicio' AND '$fecha_fin'
            GROUP BY sd.id_diagnostico
            ORDER BY cantidad DESC
        ");

        if($formato == 'excel') {
            return Excel::download(new MorbilidadExport($fecha_inicio, $fecha_fin), 'morbilidad.xlsx');
        }

        return response()->json($results, 200);
    }
}
