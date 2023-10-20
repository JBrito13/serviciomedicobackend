<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array(
                'descripcion_unidad' => 'TABLETA',
                'estado_unidad' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'descripcion_unidad' => 'FRASCO',
                'estado_unidad' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'descripcion_unidad' => 'AMPOLLA',
                'estado_unidad' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'descripcion_unidad' => 'ROLLO',
                'estado_unidad' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'descripcion_unidad' => 'UNIDAD',
                'estado_unidad' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
        ];

        DB::table('sm_unidades')->insert($data);
    }
}
