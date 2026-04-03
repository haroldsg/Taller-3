<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $fillable = [
        'cedula',
        'nombre',
        'apellido',
        'edad',
        'genero',
        'telefono',
        'telefono2',
        'email',
        'email2',
        'estado_civil',
        'direccion',
        'departamento',
        'cargo',
    ];

    protected $casts = [
        'edad' => 'integer',
    ];
}
