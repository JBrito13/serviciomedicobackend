<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{

    protected $table = 'personas';

    protected $primaryKey = 'id_persona';

    // public function __construct($id_persona, $identificacion, $nombre_completo, $tipo_persona)
    // {
    //     $this->id_persona = $id_persona;
    //     $this->identificacion = $identificacion;
    //     $this->nombre_completo = $nombre_completo;
    //     $this->tipo_persona = $tipo_persona;

    // }

    use HasFactory;

    public function consulta() {
        return $this->hasMany(Consulta::class, 'cedula_paciente');
    }

    public function identificacion() {
        return $this->belongsTo(Persona::class, 'identificacion');
    }
}
