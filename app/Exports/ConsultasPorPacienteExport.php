<?php

namespace App\Exports;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConsultasPorPacienteExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $fecha_inicio;
    public $fecha_fin;
    public $identificacion;

    public function __construct(string $identificacion, $fecha_inicio, $fecha_fin) {
        $this->identificacion = $identificacion;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
    }

    public function collection()
    {

        $fechaInicio = Carbon::parse($this->fecha_inicio)->format('Y-m-d H:i:s');
        $fechaFin = Carbon::parse($this->fecha_fin)->format('Y-m-d H:i:s');

        $results = DB::select("
            SELECT
            sc.numero_consulta AS numero_consulta,
            sc.fecha_consulta AS fecha,
            sc.cedula_paciente AS identificacion,
            sc.nombre_paciente AS paciente,
            SUBSTRING(sc.observaciones, 1, 50) AS observaciones,
            sd.descripcion_diagnostico AS diagnostico
            FROM sm_consultas sc, sm_tratamientos st, sm_diagnosticos sd
            WHERE sc.id_consulta = st.id_consulta
            AND st.id_diagnostico = sd.id_diagnostico
            AND sc.fecha_consulta BETWEEN '$fechaInicio' AND '$fechaFin'
            AND sc.cedula_paciente = '$this->identificacion'
            ORDER BY sc.fecha_consulta DESC
        ");

        return collect($results);

    }

    public function headings(): array
    {
        return [
            'Nro.',
            'Fecha',
            'Identificación',
            'Paciente',
            'Observaciones',
            'Diagnóstico'
        ];
    }
}
