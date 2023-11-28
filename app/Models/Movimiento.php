<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $table = 'sm_movimientos';

    protected $primaryKey = 'id_movimiento';

    protected $fillable = [
        'id_tipo_movimiento',
        'nro_control',
        'fecha_movimiento',
        'observaciones',
        'id_usuario',
    ];

    public function tipoMovimiento()
    {
        return $this->hasOne(TipoMovimiento::class, 'id_tipo_movimiento', 'id_tipo_movimiento');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    public function detalleMovimiento()
    {
        return $this->hasMany(DetalleMovimiento::class, 'id_movimiento', 'id_movimiento');
    }
}
