<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Proveedor extends Model
{
    //
    /**
	*Asociación con la tabla
    */
    protected $table = 'proveedors';
    protected $fillable = ['nombre', 'telefono1', 'telefono2', 'correo',
    						'direccion', 'contacto',
    ];
}
