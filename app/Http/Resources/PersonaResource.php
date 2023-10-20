<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_persona' => $this->id_persona,
            'identificacion' => $this->identificacion,
            'nombre_completo' => $this->nombre_completo,
            'tipo_persona' => $this->tipo_persona,
        ];
    }
}
