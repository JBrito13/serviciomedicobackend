<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array(
                'id_inventario' => 1,
                'id_concepto' => 1,
                'cantidad' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'id_inventario' => 2,
                'id_concepto' => 2,
                'cantidad' => 100,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'id_inventario' => 3,
                'id_concepto' => 3,
                'cantidad' => 150,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'id_inventario' => 4,
                'id_concepto' => 4,
                'cantidad' => 80,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
            array(
                'id_inventario' => 5,
                'id_concepto' => 6,
                'cantidad' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'id_usuario' => '1',
            ),
        ];

        DB::table('sm_inventario')->insert($data);
    }
}
