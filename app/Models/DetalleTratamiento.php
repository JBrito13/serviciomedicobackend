<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleTratamiento extends Model
{
    protected $table = 'sm_detalle_tratamientos';

    protected $primaryKey = 'id_det_tratamiento';

    protected $fillable = [
        'id_tratamiento',
        'id_concepto',
        'cantidad',
        'id_usuario'
    ];

    public function tratamiento()
    {
        return $this->belongsTo(Tratamiento::class, 'id_tratamiento');
    }

    public function concepto()
    {
        return $this->hasOne(Concepto::class, 'id_concepto');
    }

    public function usuario()
    {
        return $this->hasOne(Usuario::class, 'id_usuario');
    }

    use HasFactory;
}
