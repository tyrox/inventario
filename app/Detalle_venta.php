<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Detalle_venta extends Model
{
    //
    /**
	*Asociación con la tabla
    */
    protected $table = 'detalle_ventas';

    protected $fillable = ['factura_venta_id', 'producto_id', 'precio_costo', 'precio_venta',
                            'cantidad_venta', 'impuesto_venta',
    ];

    public function factura_venta()
    {
    	return $this->belongsTo('App\Factura_venta');
    }

    public function producto()
    {
    	return $this->belongsTo('App\Producto');
    }
}
