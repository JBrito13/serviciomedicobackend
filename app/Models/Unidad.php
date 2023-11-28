<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table = 'sm_unidades';

    protected $primaryKey = 'id_unidad';

    public function concepto()
    {
        return $this->belongsTo(Concepto::class, 'id_concepto');
    }

    public function id_unidad()
    {
        return $this->hasOne(Concepto::class, 'id_unidad');
    }

    use HasFactory;
}
