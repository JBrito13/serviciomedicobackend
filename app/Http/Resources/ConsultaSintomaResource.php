<?php

namespace App\Http\Resources;

use App\Http\Resources\SintomaResource;
use App\Models\Sintoma;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsultaSintomaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $sintoma = new SintomaResource(Sintoma::find($this->id_sintoma));

        return [
            'id_consulta' => $this->id_consulta,
            'sintoma' => $sintoma,
            'id_usuario' => $this->id_usuario,
        ];
    }
}
