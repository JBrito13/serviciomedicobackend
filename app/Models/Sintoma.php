<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{
    protected $table = 'sm_sintomas';

    protected $primaryKey = 'id_sintoma';

    protected $fillable = [
        'descripcion_sintoma',
        'estado_sintoma'
    ];

    public function consulta_sintoma()
    {
        return $this->belongsTo(ConsultaSintoma::class, 'id_sintoma');
    }

    use HasFactory;
}
