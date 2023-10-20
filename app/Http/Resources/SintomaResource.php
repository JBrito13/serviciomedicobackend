<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SintomaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_sintoma' => $this->id_sintoma,
            'descripcion_sintoma' => $this->descripcion_sintoma,
            'estado_sintoma' => $this->estado_sintoma,
        ];
    }
}
