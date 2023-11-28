<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiagnosticoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array(
                'descripcion_diagnostico' => 'COVID-19',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'GRIPE',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'RESFRIADO',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'DENGUE',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'MALARIA',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'TUBERCULOSIS',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'HEPATITIS',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'SARAMPION',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'VARICELA',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'RABIA',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'TETANOS',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'TOS FERINA',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'PAPERAS',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'RUBEOLA',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'TIFOIDEA',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'LEPRA',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'CEFALEA',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'MIGRAÑA',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'HIPERTENSION',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'DIABETES',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'ASMA',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'ANEMIA',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'OBESIDAD',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'ANOREXIA',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'descripcion_diagnostico' => 'BULIMIA',
                'estado_diagnostico' => 'A',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
        ];

        DB::table('sm_diagnosticos')->insert($data);
    }
}
