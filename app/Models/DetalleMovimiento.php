<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleMovimiento extends Model
{
    use HasFactory;

    protected $table = 'sm_detalle_movimientos';

    protected $primaryKey = 'id_detalle_movimiento';

    protected $fillable = [
        'id_movimiento',
        'id_concepto',
        'cantidad_anterior',
        'cantidad_actual',
        'cantidad_movimiento',
        'id_usuario',
    ];

    public function movimiento()
    {
        return $this->belongsTo(Movimiento::class, 'id_movimiento', 'id_movimiento');
    }

    public function concepto()
    {
        return $this->hasOne(Concepto::class, 'id_concepto', 'id_concepto');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }
}
