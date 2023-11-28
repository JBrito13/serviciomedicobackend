<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'sm_consultas';

    protected $primaryKey = 'id_consulta';

    protected $fillable = [
        'numero_consulta',
        'id_persona',
        'cedula_paciente',
        'nombre_paciente',
        'observaciones',
        'fecha_consulta',
        'estado_consulta',
        'tipo_paciente',
        'id_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function diagnostico()
    {
        return $this->hasOne(Diagnostico::class, 'id_diagnostico');
    }

    public function tratamiento()
    {
        return $this->hasOne(Tratamiento::class, 'id_tratamiento');
    }

    public function sintomas()
    {
        return $this->hasMany(ConsultaSintoma::class, 'id_consulta');
    }

    use HasFactory;
}
