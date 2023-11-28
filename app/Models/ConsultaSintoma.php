<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultaSintoma extends Model
{

    protected $table = 'sm_consulta_sintomas';

    protected $primaryKey = 'id_consulta_sintoma';

    protected $fillable = [
        'id_consulta',
        'id_sintoma',
        'id_usuario'
    ];

    public function consulta()
    {
        return $this->belongsTo(Consulta::class, 'id_consulta');
    }

    public function sintoma()
    {
        return $this->hasOne(Sintoma::class, 'id_sintoma');
    }

    use HasFactory;
}
