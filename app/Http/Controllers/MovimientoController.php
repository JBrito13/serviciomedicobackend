<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovimientoCollection;
use App\Models\Movimiento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovimientoController extends Controller
{
    public function index(Request $request) {

        $max_ctrl = $request->input('maxCtrl');

        if ($max_ctrl) {
            $nro_control = DB::table('sm_movimientos')->where('id_tipo_movimiento', 2)->max('nro_control');

            if(!$nro_control) {
                $nro_control = 0;
            }

            return response()->json($nro_control, 200);
        }

        $movimientos = new MovimientoCollection(Movimiento::all());

        return response()->json($movimientos, 200);
    }

    public function show($id) {

        $movimiento = new MovimientoCollection(Movimiento::where('id_movimiento', $id)->get());

        if ($movimiento->count() === 0) {
            return response()->json([
                'message' => 'Ocurrió un error al obtener el movimiento.',
            ], 404);
        } else {
            [$movimiento] = $movimiento->toArray(request());

            return response()->json($movimiento, 200);
        }

    }

    public function store(Request $request) {

        $movimiento = new Movimiento();

        $validateData = $request->validate([
            'id_tipo_movimiento' => 'required|integer',
            'nro_control' => 'required',
            'fecha_movimiento' => 'required',
            'observaciones' => 'string|nullable',
            'detalles' => 'required',
            'id_usuario' => 'required|integer',
        ]);

        $movimiento->id_tipo_movimiento = $validateData['id_tipo_movimiento'];
        $movimiento->nro_control = $validateData['nro_control'];
        $fecha = $validateData['fecha_movimiento'];
        $movimiento->fecha_movimiento = Carbon::parse($fecha)->format('Y-m-d H:i:s');
        $movimiento->observaciones = $validateData['observaciones'];
        $movimiento->id_usuario = $validateData['id_usuario'];

        $movimiento->save();

        // Obtener el movimiento creado
        $movimiento = DB::table('sm_movimientos')->where('nro_control', $movimiento->nro_control)->where('id_tipo_movimiento', $movimiento->id_tipo_movimiento)->first();

        $detalles = $validateData['detalles'];

        if ($movimiento->id_tipo_movimiento === 1) {
            foreach ($detalles as $detalle) {
                $inventario = DB::table('sm_inventario')->where('id_concepto', $detalle['concepto']['id_concepto'])->first();

                if ($inventario) {

                    DB::table('sm_detalle_movimientos')->insert([
                        'id_movimiento' => $movimiento->id_movimiento,
                        'id_concepto' => $detalle['concepto']['id_concepto'],
                        'cantidad_anterior' => $inventario->cantidad,
                        'cantidad_actual' => $inventario->cantidad + $detalle['cantidad'],
                        'cantidad_movimiento' => $detalle['cantidad'],
                        'id_usuario' => $request->input('id_usuario'),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);

                    $inventario->cantidad += $detalle['cantidad'];

                    DB::table('sm_inventario')->where('id_concepto', $detalle['concepto']['id_concepto'])->update([
                        'cantidad' => $inventario->cantidad,
                        'updated_at' => Carbon::now(),
                    ]);

                } else {

                    DB::table('sm_detalle_movimientos')->insert([
                        'id_movimiento' => $movimiento->id_movimiento,
                        'id_concepto' => $detalle['concepto']['id_concepto'],
                        'cantidad_anterior' => 0,
                        'cantidad_actual' => $detalle['cantidad'],
                        'cantidad_movimiento' => $detalle['cantidad'],
                        'id_usuario' => $request->input('id_usuario'),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);

                    DB::table('sm_inventario')->insert([
                        'id_concepto' => $detalle['concepto']['id_concepto'],
                        'cantidad' => $detalle['cantidad'],
                        'id_usuario' => $request->input('id_usuario'),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }
            }
        } else {
            foreach ($detalles as $detalle) {
                $inventario = DB::table('sm_inventario')->where('id_concepto', $detalle['concepto']['id_concepto'])->first();

                if ($inventario) {

                    DB::table('sm_detalle_movimientos')->insert([
                        'id_movimiento' => $movimiento->id_movimiento,
                        'id_concepto' => $detalle['concepto']['id_concepto'],
                        'cantidad_anterior' => $inventario->cantidad,
                        'cantidad_actual' => $inventario->cantidad - $detalle['cantidad'],
                        'cantidad_movimiento' => $detalle['cantidad'],
                        'id_usuario' => $request->input('id_usuario'),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);

                    $inventario->cantidad -= $detalle['cantidad'];

                    DB::table('sm_inventario')->where('id_concepto', $detalle['concepto']['id_concepto'])->update([
                        'cantidad' => $inventario->cantidad,
                        'updated_at' => Carbon::now(),
                    ]);

                } else {

                    return response()->json([
                        'message' => 'Ocurrió un error al obtener el inventario.',
                    ], 404);

                }
            }
        }

        return response()->json($movimiento, 200);

    }
}
