<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetalleMovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array(
                'id_detalle_movimiento' => 1,
                'id_movimiento' => 1,
                'id_concepto' => 1,
                'cantidad_anterior' => 0,
                'cantidad_actual' => 100,
                'cantidad_movimiento' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'id_detalle_movimiento' => 2,
                'id_movimiento' => 1,
                'id_concepto' => 2,
                'cantidad_anterior' => 0,
                'cantidad_actual' => 100,
                'cantidad_movimiento' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'id_detalle_movimiento' => 3,
                'id_movimiento' => 1,
                'id_concepto' => 3,
                'cantidad_anterior' => 0,
                'cantidad_actual' => 150,
                'cantidad_movimiento' => 150,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'id_detalle_movimiento' => 4,
                'id_movimiento' => 1,
                'id_concepto' => 4,
                'cantidad_anterior' => 0,
                'cantidad_actual' => 80,
                'cantidad_movimiento' => 80,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'id_detalle_movimiento' => 5,
                'id_movimiento' => 1,
                'id_concepto' => 6,
                'cantidad_anterior' => 0,
                'cantidad_actual' => 20,
                'cantidad_movimiento' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
        ];

        DB::table('sm_detalle_movimientos')->insert($data);
    }
}
