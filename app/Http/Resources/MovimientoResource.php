<?php

namespace App\Http\Resources;

use App\Http\Resources\TipoMovimientoResource;
use App\Http\Resources\DetalleMovimientoCollection;
use App\Models\DetalleMovimiento;
use App\Models\TipoMovimiento;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovimientoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $id_tipo_movimiento = $this->id_tipo_movimiento;

        $tipoMovimiento = new TipoMovimientoResource(TipoMovimiento::find($id_tipo_movimiento));

        $detallesMovimiento = new DetalleMovimientoCollection(DetalleMovimiento::query()->where('id_movimiento', $this->id_movimiento)->get());

        return [
            'id_movimiento' => $this->id_movimiento,
            'nro_control' => $this->nro_control,
            'tipo_movimiento' => $tipoMovimiento,
            'fecha_movimiento' => $this->fecha_movimiento,
            'detalles_movimiento' => $detallesMovimiento,
            'id_usuario' => $this->id_usuario,
        ];
    }
}
