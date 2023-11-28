<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Consulta;
use App\Http\Resources\ConsultaCollection;
use App\Http\Resources\TratamientoResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
    public function index(Request $request)
    {
        $identificacion = $request->input('identificacion');
        $pendientes = $request->input('pendientes');
        $max = $request->input('max');

        if ($pendientes === 'true') {

            $consultas = new ConsultaCollection(Consulta::where('estado_consulta', 'P')->get());

        } elseif ($identificacion) {

            $consultas = new ConsultaCollection(Consulta::where('cedula_paciente', $identificacion)->where('estado_consulta', 'A')->get());

            if ($consultas->count() === 0) {
                return response()->json([
                    'message' => 'No se encontraron consultas para el paciente indicado',
                ], 404);
            }

        } else {

            $consultas = new ConsultaCollection(Consulta::all()->where('estado_consulta', 'A'));

        }

        if ($max === 'true') {
            $maxconsulta = DB::table('sm_consultas')->max('numero_consulta');

            return response()->json($maxconsulta, 200);
        }

        return response()->json($consultas, 200);
    }

    public function show($id_consulta) {

        $consulta = new ConsultaCollection(Consulta::where('id_consulta', $id_consulta)->get());

        if ($consulta->count() === 0) {
            return response()->json([
                'message' => 'Ocurrió un error al obtener la consulta.',
            ], 404);
        } else {
            [$consulta] = $consulta->toArray(request());

            return response()->json($consulta, 200);
        }
    }

    public function store(Request $request)
    {
        $consulta = new Consulta();

        $validatedData = $request->validate([
            'paciente' => 'required',
            'paciente.id_persona' => 'integer|nullable',
            'paciente.identificacion' => 'required|string|min:5|max:10',
            'paciente.nombre_completo' => 'required|string',
            'paciente.tipo_persona' => 'required|integer',
            'numero_consulta' => 'required|integer',
            'observaciones' => 'required|string',
            'fecha_consulta' => 'required|date',
            'estado_consulta' => 'required|string',
            'id_usuario' => 'required|integer',
        ]);

        $consulta->id_persona = $validatedData['paciente']['id_persona'];
        $consulta->cedula_paciente = $validatedData['paciente']['identificacion'];
        $consulta->nombre_paciente = $validatedData['paciente']['nombre_completo'];
        $consulta->tipo_paciente = $validatedData['paciente']['tipo_persona'];
        $consulta->numero_consulta = $validatedData['numero_consulta'];
        $consulta->observaciones = $validatedData['observaciones'];
        $fecha = $validatedData['fecha_consulta'];
        $consulta->fecha_consulta = Carbon::parse($fecha)->format('Y-m-d H:i:s');
        $consulta->estado_consulta = $validatedData['estado_consulta'];
        $consulta->id_usuario = $validatedData['id_usuario'];
        
        $consulta->save();

        return response()->json($consulta, 200);
    }

    public function update(Request $request, $id)
    {
        //Actualizar la consulta
        $consulta = Consulta::find($id);
        $consulta->estado_consulta = $request->input('estado_consulta');
        $consulta->save();

        //Crear los registros en consulta_sintomas
        $sintomas = $request->input('sintomas');
        foreach ($sintomas as $sintoma) {
            DB::table('sm_consulta_sintomas')->insert([
                'id_consulta' => $id,
                'id_sintoma' => $sintoma['id_sintoma'],
                'id_usuario' => $request->input('id_usuario'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        //Crear los registros en tratamiento
        $diagnostico = $request->input('diagnostico');

        DB::table('sm_tratamientos')->insert([
            'id_consulta' => $id,
            'id_diagnostico' => $diagnostico['id_diagnostico'],
            'id_usuario' => $request->input('id_usuario'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        //Obtener el tratamiento creado
        $tratamiento = DB::query()->select('id_tratamiento')->from('sm_tratamientos')->where('id_consulta', $id)->get();
        [$tratamiento] = $tratamiento->toArray(request());

        //Crear los registros en detalle_tratamiento
        $medicamentos = $request->input('tratamiento');

        if($medicamentos) {
            foreach ($medicamentos as $detalle) {
                DB::table('sm_detalle_tratamientos')->insert([
                    'id_tratamiento' => $tratamiento->id_tratamiento,
                    'id_concepto' => $detalle['concepto']['id_concepto'],
                    'cantidad' => $detalle['cantidad'],
                    'id_usuario' => $request->input('id_usuario'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);

                //Actualizar el inventario
                $concepto = DB::query()->select()->from('sm_inventario')->where('id_concepto', $detalle['concepto']['id_concepto'])->get();
                [$concepto] = $concepto->toArray(request());

                $cantidad = $detalle['cantidad'];

                DB::table('sm_inventario')->where('id_concepto', $concepto->id_concepto)->update([
                    'cantidad' => $concepto->cantidad - $cantidad,
                    'id_usuario' => $request->input('id_usuario'),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }

        return response()->json($consulta, 200);
    }
}
