<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array(
                'id_movimiento' => 1,
                'nro_control' => 1,
                'id_tipo_movimiento' => 1,
                'fecha_movimiento' => Carbon::now(),
                'observaciones' => 'CARGA DE INVENTARIO INICIAL',
                'id_usuario' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
        ];

        DB::table('sm_movimientos')->insert($data);
    }
}
