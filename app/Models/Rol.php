<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    protected $table = 'sm_roles';

    protected $primaryKey = 'id_rol';

    protected $fillable = [
        'rol',
        'estado_rol',
    ];

    public function usuarios()
    {
        return $this->hasOne(Usuario::class, 'id_rol', 'id_rol');
    }
}
