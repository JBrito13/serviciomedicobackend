<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TratamientoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_tratamiento' => $this->id_tratamiento,
            'id_consulta' => $this->id_consulta,
            'id_diagnostico' => $this->id_diagnostico,
            'id_usuario' => $this->id_usuario,
        ];
    }
}
