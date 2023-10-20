<?php

namespace App\Http\Resources;

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

        $unidad = new UnidadCollection(Unidad::with('concepto')->where('id_unidad', $this->id_unidad)->get());

        [$unidad] = $unidad->toArray($request);

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
