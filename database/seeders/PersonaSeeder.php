<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array(
                'id_persona' => 1,
                'identificacion' => '26907194',
                'nombre_completo' => 'JUAN CARLOS BRITO PEROZO',
                'tipo_persona' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'id_persona' => 2,
                'identificacion' => '12801806',
                'nombre_completo' => 'MARIA EUGENIA BRITO PEROZO',
                'tipo_persona' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'id_persona' => 3,
                'identificacion' => '23456789',
                'nombre_completo' => 'PEDRITO DE LOS PALOTES',
                'tipo_persona' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'id_persona' => 4,
                'identificacion' => 'AO645879',
                'nombre_completo' => 'JACINTO JIMENEZ',
                'tipo_persona' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
        ];

        DB::table('personas')->insert($data);
    }
}
