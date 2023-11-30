<?php

namespace App\Exports;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MovimientosInventarioExport implements FromCollection, WithHeadings
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
            SELECT
            movs.nro_control AS numero_movimiento,
            tmovs.descripcion_movimiento AS tipo_movimiento,
            movs.fecha_movimiento AS fecha,
            movs.observaciones,
            users.nombre AS usuario
            FROM sm_movimientos movs, sm_tipo_movimientos AS tmovs, sm_usuarios AS users
            WHERE movs.id_tipo_movimiento = tmovs.id_tipo_movimiento
            AND movs.id_usuario = users.id_usuario
            AND movs.fecha_movimiento BETWEEN '$this->fecha_inicio' AND '$this->fecha_fin'
            ORDER BY movs.fecha_movimiento DESC;
        ");

        return collect($results);
    }

    public function headings(): array
    {
        return [
            'Nro. de Movimiento',
            'Tipo de Movimiento',
            'Fecha',
            'Observaciones',
            'Usuario'
        ];
    }
}
