<?php

namespace App\Http\Resources;

use App\Http\Resources\RolResource;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $rol = new RolResource(Rol::where('id_rol', $this->id_rol)->first());

        return [
            'id_usuario' => $this->id_usuario,
            'nombre' => $this->nombre,
            'username' => $this->username,
            'estado_usuario' => $this->estado_usuario,
            'rol' => $rol,
        ];
    }
}
