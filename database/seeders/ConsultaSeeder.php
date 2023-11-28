<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array(
                'id_consulta' => 1,
                'numero_consulta' => 1,
                'id_persona' => 1,
                'cedula_paciente' => '26907194',
                'nombre_paciente' => 'JUAN CARLOS BRITO PEROZO',
                'tipo_paciente' => 1,
                'observaciones' => 'PACIENTE CON DOLOR DE CABEZA FRECUENTE, SE LE INDICA TOMAR PARACETAMOL CADA 8 HORAS',
                'fecha_consulta' => Carbon::now(),
                'estado_consulta' => 'A',
                'id_usuario' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'id_consulta' => 2,
                'numero_consulta' => 2,
                'id_persona' => NULL,
                'cedula_paciente' => '26907195',
                'nombre_paciente' => 'MARIA JOSE PEREZ PEREZ',
                'tipo_paciente' => 4,
                'observaciones' => 'PACIENTE PRESENTA NAUSEAS Y VOMITOS, SE LE INDICA TOMAR METOCLOPRAMIDA CADA 8 HORAS',
                'fecha_consulta' => Carbon::now(),
                'estado_consulta' => 'A',
                'id_usuario' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'id_consulta' => 3,
                'numero_consulta' => 3,
                'id_persona' => NULL,
                'cedula_paciente' => '26907196',
                'nombre_paciente' => 'JOSE LUIS PEREZ PEREZ',
                'tipo_paciente' => 4,
                'observaciones' => 'PACIENTE PRESENTA TENSIÓN ALTA DIASTÓLICA EN 90 Y FRECUENCIA CARDIACA EN 120, SE LE INDICA TOMAR LOSARTAN CADA 12 HORAS',
                'fecha_consulta' => Carbon::now(),
                'estado_consulta' => 'P',
                'id_usuario' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
        ];

        DB::table('sm_consultas')->insert($data);
    }
}
