<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    protected $table = 'sm_inventario';

    protected $primaryKey = 'id_inventario';

    protected $fillable = [
        'id_concepto',
        'cantidad',
        'fecha',
        'estado'
    ];

    public function concepto()
    {
        return $this->belongsTo(Concepto::class, 'id_concepto');
    }

    use HasFactory;
}
