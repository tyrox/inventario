<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Cliente extends Model
{
    
    /**
	*Asociación con la tabla
    */
    protected $table = 'clientes';

    protected $fillable = ['nombre', 'cedula', 'direccion', 'telefono1',
    						'telefono2', 'facturacion',
    ];

    public function factura_ventas() 
    {
        return $this->hasMany('App\Factura_venta');
    }
}
