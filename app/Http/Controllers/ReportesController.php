<?php

namespace App\Http\Controllers;

use App\Exports\ConsultasPorPacienteExport;
use App\Exports\MorbilidadExport;
use App\Exports\MovimientosInventarioExport;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportesController extends Controller
{
    public function morbilidad(Request $request)
    {

        $formato = $request->input('formato');
        $tipo_paciente = $request->input('tipo_paciente');

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

        if($tipo_paciente != null) {

            $results = DB::select("
                SELECT sd.descripcion_diagnostico as diagnostico, COUNT(st.id_diagnostico) AS cantidad
                FROM sm_consultas sc, sm_tratamientos st, sm_diagnosticos sd
                WHERE sc.id_consulta = st.id_consulta
                AND st.id_diagnostico = sd.id_diagnostico
                AND sc.fecha_consulta BETWEEN '$fecha_inicio' AND '$fecha_fin'
                AND sc.tipo_paciente = '$tipo_paciente'
                GROUP BY sd.id_diagnostico
                ORDER BY cantidad DESC
            ");

            if($formato == 'excel') {
                return Excel::download(new MorbilidadExport($fecha_inicio, $fecha_fin, $tipo_paciente), 'morbilidad.xlsx');
            }

            return response()->json($results, 200);

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
            return Excel::download(new MorbilidadExport($fecha_inicio, $fecha_fin, $tipo_paciente), 'morbilidad.xlsx');
        }

        return response()->json($results, 200);
    }

    public function consultasPorPaciente(Request $request)
    {

        $formato = $request->input('formato');

        $validateData = $request->validate([
            'fechaInicio' => 'required',
            'fechaFin' => 'required',
            'identificacion' => 'required'
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

        $identificacion = $validateData['identificacion'];

        $results = DB::select("
            SELECT
            sc.numero_consulta AS numero_consulta,
            sc.fecha_consulta AS fecha,
            sc.cedula_paciente AS identificacion,
            sc.nombre_paciente AS paciente,
            SUBSTRING(sc.observaciones, 1, 50) AS observaciones,
            sd.descripcion_diagnostico AS diagnostico
            FROM sm_consultas sc, sm_tratamientos st, sm_diagnosticos sd
            WHERE sc.id_consulta = st.id_consulta
            AND st.id_diagnostico = sd.id_diagnostico
            AND sc.estado_consulta = 'A'
            AND sc.fecha_consulta BETWEEN '$fecha_inicio' AND '$fecha_fin'
            AND sc.cedula_paciente = '$identificacion'
            ORDER BY sc.fecha_consulta DESC
        ");

        if($formato == 'excel') {
            return Excel::download(new ConsultasPorPacienteExport($identificacion, $fecha_inicio, $fecha_fin), 'consultas_por_paciente.xlsx');
        }

        return response()->json($results, 200);
    }

    public function movimientos (Request $request) {

        $formato = $request->input('formato');

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
            SELECT
            movs.nro_control AS numero_movimiento,
            tmovs.descripcion_movimiento AS tipo_movimiento,
            movs.fecha_movimiento AS fecha,
            movs.observaciones,
            users.nombre AS usuario
            FROM sm_movimientos movs, sm_tipo_movimientos AS tmovs, sm_usuarios AS users
            WHERE movs.id_tipo_movimiento = tmovs.id_tipo_movimiento
            AND movs.id_usuario = users.id_usuario
            AND movs.fecha_movimiento BETWEEN '$fecha_inicio' AND '$fecha_fin'
            ORDER BY movs.fecha_movimiento DESC;
        ");

        if($formato == 'excel') {
            return Excel::download(new MovimientosInventarioExport($fecha_inicio, $fecha_fin), 'movimientos.xlsx');
        }

        return response()->json($results, 200);
    }
}
