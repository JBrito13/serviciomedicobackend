<?php

namespace App\Exports;

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

        $results = DB::select("
            SELECT sd.descripcion_diagnostico, COUNT(st.id_diagnostico) AS cantidad
            FROM sm_consultas sc, sm_tratamientos st, sm_diagnosticos sd
            WHERE sc.id_consulta = st.id_consulta
            AND st.id_diagnostico = sd.id_diagnostico
            AND sc.fecha_consulta BETWEEN '$this->fecha_inicio' AND '$this->fecha_fin'
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
