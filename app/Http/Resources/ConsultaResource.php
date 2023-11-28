<?php

namespace App\Http\Resources;

use App\Models\ConsultaSintoma;
use App\Models\DetalleTratamiento;
use App\Models\Diagnostico;
use App\Models\Sintoma;
use App\Models\Tratamiento;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsultaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $paciente = [
            'id_persona' => $this->id_persona,
            'identificacion' => $this->cedula_paciente,
            'nombre_completo' => $this->nombre_paciente,
            'tipo_persona' => $this->tipo_paciente,
        ];

        if ($this->estado_consulta === 'A') {
            $sintomas = new ConsultaSintomaCollection(ConsultaSintoma::with('consulta')->where('id_consulta', $this->id_consulta)->get());

            for ($i = 0; $i < count($sintomas); $i++) {
                $id_sintomas = $sintomas[$i]->id_sintoma;
                $sintomas[$i] = new SintomaCollection(Sintoma::with('consulta_sintoma')->where('id_sintoma', $id_sintomas)->get());
            }

            [$sintomas] = $sintomas->toArray($request);

            $tratamiento = new TratamientoResource(Tratamiento::all()->where('id_consulta', $this->id_consulta)->first());

            $diagnostico = new DiagnosticoCollection(Diagnostico::with('tratamiento')->where('id_diagnostico', $tratamiento['id_diagnostico'])->get());

            [$diagnostico] = $diagnostico->toArray($request);

            $detalle_tratamiento = new DetalleTratamientoCollection(DetalleTratamiento::with('tratamiento')->where('id_tratamiento', $tratamiento['id_tratamiento'])->get());

            return [
                'id_consulta' => $this->id_consulta,
                'numero_consulta' => $this->numero_consulta,
                'estado_consulta' => $this->estado_consulta,
                'fecha_consulta' => $this->fecha_consulta,
                'paciente' => $paciente,
                'observaciones' => $this->observaciones,
                'sintomas' => $sintomas,
                'diagnostico' => $diagnostico,
                'tratamiento' => $detalle_tratamiento,
                'id_usuario' => $this->id_usuario,
            ];

        } else {

            return [
                'id_consulta' => $this->id_consulta,
                'numero_consulta' => $this->numero_consulta,
                'estado_consulta' => $this->estado_consulta,
                'fecha_consulta' => $this->fecha_consulta,
                'paciente' => $paciente,
                'observaciones' => $this->observaciones,
                'id_usuario' => $this->id_usuario,
            ];

        }

    }
}
