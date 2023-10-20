<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UnidadResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_unidad' => $this->id_unidad,
            'descripcion_unidad' => $this->descripcion_unidad,
            'estado_unidad' => $this->estado_unidad,
        ];
    }
}
