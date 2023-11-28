<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoMovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id_tipo_movimiento' => 1,
                'descripcion_movimiento' => 'ENTRADA',
                'operador' => '+',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id_tipo_movimiento' => 2,
                'descripcion_movimiento' => 'AJUSTE',
                'operador' => '-',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('sm_tipo_movimientos')->insert($data);
    }
}
