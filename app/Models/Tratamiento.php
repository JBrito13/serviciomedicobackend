<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    protected $table = 'sm_tratamientos';

    protected $primaryKey = 'id_tratamiento';

    protected $fillable = [
        'id_tratamiento',
        'id_consulta',
        'id_diagnostico',
        'id_usuario'
    ];

    public function consulta()
    {
        return $this->belongsTo(Consulta::class, 'id_consulta');
    }

    public function diagnostico()
    {
        return $this->hasOne(Diagnostico::class, 'id_diagnostico');
    }

    use HasFactory;
}
