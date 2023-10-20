<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConceptoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            array(
                'codigo_concepto' => 'CA17000001',
                'descripcion_concepto' => 'ACETAMINOFEN',
                'estado_concepto' => 'A',
                'id_unidad' => 1,
                'stock_minimo' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'codigo_concepto' => 'CA17000002',
                'descripcion_concepto' => 'DICLOFENAC POTÁSICO',
                'estado_concepto' => 'A',
                'id_unidad' => 1,
                'stock_minimo' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'codigo_concepto' => 'CA17000003',
                'descripcion_concepto' => 'PARACETAMOL',
                'estado_concepto' => 'A',
                'id_unidad' => 1,
                'stock_minimo' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'codigo_concepto' => 'CA17000004',
                'descripcion_concepto' => 'AMOXICILINA',
                'estado_concepto' => 'A',
                'id_unidad' => 1,
                'stock_minimo' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'codigo_concepto' => 'CA17000005',
                'descripcion_concepto' => 'ALCOHOL',
                'estado_concepto' => 'A',
                'id_unidad' => 2,
                'stock_minimo' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'codigo_concepto' => 'CA17000006',
                'descripcion_concepto' => 'DEXAMETAZONA',
                'estado_concepto' => 'A',
                'id_unidad' => 3,
                'stock_minimo' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'codigo_concepto' => 'CA17000007',
                'descripcion_concepto' => 'SUERO FISIOLÓGICO',
                'estado_concepto' => 'A',
                'id_unidad' => 5,
                'stock_minimo' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
            array(
                'codigo_concepto' => 'CA17000008',
                'descripcion_concepto' => 'SUERO GLUCOSADO',
                'estado_concepto' => 'A',
                'id_unidad' => 5,
                'stock_minimo' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
        ];

        DB::table('sm_conceptos')->insert($data);
    }
}
