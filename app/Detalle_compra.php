<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Detalle_compra extends Model
{
    //
    /**
	*Asociación con la tabla
    */
    protected $table = 'detalle_compras';

    protected $fillable = ['factura_compra_id', 'producto_id', 'precio_costo', 'precio_venta',
                            'cantidad_compra', 'impuesto',
    ];

    public function factura_compra()
    {
    	return $this->belongsTo('App\Factura_compra');
    }

    public function producto()
    {
    	return $this->belongsTo('App\Producto');
    }
}
