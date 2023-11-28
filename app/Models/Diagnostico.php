<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $table = 'sm_diagnosticos';

    protected $primaryKey = 'id_diagnostico';

    protected $fillable = [
        'descripcion_diagnostico',
        'estado_diagnostico',
    ];

    public function tratamiento()
    {
        return $this->belongsTo(Tratamiento::class, 'id_diagnostico', 'id_diagnostico');
    }


    use HasFactory;
}
