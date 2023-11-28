<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMovimiento extends Model
{
    use HasFactory;

    protected $table = 'sm_tipo_movimientos';

    protected $primaryKey = 'id_tipo_movimiento';

    public function movimientos()
    {
        return $this->belongsTo(Movimiento::class, 'id_tipo_movimiento');
    }
}
