<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SintomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array(
                'descripcion_sintoma' => 'CEFALEA',
                'estado_sintoma' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_sintoma' => 'FIEBRE',
                'estado_sintoma' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
           array(
                'descripcion_sintoma' => 'TOS SECA',
                'estado_sintoma' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
           ),
            array(
                'descripcion_sintoma' => 'DIFICULTAD RESPIRATORIA',
                'estado_sintoma' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_sintoma' => 'DOLOR DE GARGANTA',
                'estado_sintoma' => 'I',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_sintoma' => 'DOLOR DE ESTOMAGO',
                'estado_sintoma' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_sintoma' => 'MAREOS',
                'estado_sintoma' => 'I',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_sintoma' => 'REACCION ALERGICA',
                'estado_sintoma' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
        ];

        DB::table('sm_sintomas')->insert($data);
    }
}
