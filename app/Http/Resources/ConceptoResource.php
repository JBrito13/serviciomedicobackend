<?php

namespace App\Http\Resources;

use App\Http\Resources\UnidadResource;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConceptoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $unidad = new UnidadResource(Unidad::find($this->id_unidad));

        return [
            'id_concepto' => $this->id_concepto,
            'codigo_concepto' => $this->codigo_concepto,
            'descripcion_concepto' => $this->descripcion_concepto,
            'estado_concepto' => $this->estado_concepto,
            'unidad' => $unidad,
            'stock_minimo' => $this->stock_minimo,
        ];
    }
}
