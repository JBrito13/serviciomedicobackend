<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    protected $table = 'sm_conceptos';

    protected $primaryKey = 'id_concepto';

    protected $fillable = [
        'codigo_concepto',
        'descripcion_concepto',
        'estado_concepto',
        'id_unidad',
        'stock_minimo',
    ];

    public function inventario()
    {
        return $this->hasOne(Inventario::class, 'id_concepto');
    }

    public function unidad() {
        return $this->hasOne(Unidad::class, 'id_unidad');
    }

    public function detalle_tratamiento() {
        return $this->belongsTo(DetalleTratamiento::class, 'id_concepto');
    }

    use HasFactory;
}
