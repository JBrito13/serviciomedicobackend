<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{

    protected $table = 'personas';

    use HasFactory;

    public function identificacion() {
        return $this->belongsTo(Persona::class, 'identificacion');
    }
}
