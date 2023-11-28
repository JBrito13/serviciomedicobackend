<?php

namespace App\Exports;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MorbilidadExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $fecha_inicio;
    public $fecha_fin;

    public function __construct($fecha_inicio, $fecha_fin)
    {
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
    }

    public function collection()
    {

        $fechaInicio = Carbon::parse($this->fecha_inicio)->format('Y-m-d H:i:s');
        $fechaFin = Carbon::parse($this->fecha_fin)->format('Y-m-d H:i:s');

        $results = DB::select("
            SELECT sd.descripcion_diagnostico, COUNT(st.id_diagnostico) AS cantidad
            FROM sm_consultas sc, sm_tratamientos st, sm_diagnosticos sd
            WHERE sc.id_consulta = st.id_consulta
            AND st.id_diagnostico = sd.id_diagnostico
            AND sc.fecha_consulta BETWEEN '$fechaInicio' AND '$fechaFin'
            GROUP BY sd.id_diagnostico
            ORDER BY cantidad DESC
        ");

        return collect($results);

    }

    public function headings(): array
    {
        return [
            'Diagnóstico',
            'Cantidad'
        ];
    }
}
