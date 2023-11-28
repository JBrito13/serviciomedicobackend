<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetalleTratamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array(
                'id_tratamiento' => 1,
                'id_concepto' => 1,
                'cantidad' => 1,
                'id_usuario' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'id_tratamiento' => 1,
                'id_concepto' => 2,
                'cantidad' => 1,
                'id_usuario' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'id_tratamiento' => 1,
                'id_concepto' => 3,
                'cantidad' => 1,
                'id_usuario' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'id_tratamiento' => 2,
                'id_concepto' => 7,
                'cantidad' => 1,
                'id_usuario' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
        ];

        DB::table('sm_detalle_tratamientos')->insert($data);
    }
}
