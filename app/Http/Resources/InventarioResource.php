<?php

namespace App\Http\Resources;

use App\Models\Concepto;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InventarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $concepto = new ConceptoCollection(Concepto::with('inventario')->where('id_concepto', $this->id_concepto)->get());

        [$concepto] = $concepto->toArray($request);

        return [
            'id_inventario' => $this->id_inventario,
            'concepto' => $concepto,
            'cantidad' => $this->cantidad,
        ];
    }
}
