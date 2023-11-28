<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiagnosticoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_diagnostico' => $this->id_diagnostico,
            'descripcion_diagnostico' => $this->descripcion_diagnostico,
            'estado_diagnostico' => $this->estado_diagnostico,
        ];
    }
}
