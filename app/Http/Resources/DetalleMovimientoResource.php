<?php

namespace App\Http\Resources;

use App\Http\Resources\ConceptoResource;
use App\Models\Concepto;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetalleMovimientoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $id_concepto = $this->id_concepto;

        $concepto = new ConceptoResource(Concepto::find($id_concepto));

        return [
            'id_detalle_movimiento' => $this->id_detalle_movimiento,
            'id_movimiento' => $this->id_movimiento,
            'concepto' => $concepto,
            'cantidad_anterior' => $this->cantidad_anterior,
            'cantidad_actual' => $this->cantidad_actual,
            'cantidad_movimiento' => $this->cantidad_movimiento,
            'id_usuario' => $this->id_usuario,
        ];
    }
}
