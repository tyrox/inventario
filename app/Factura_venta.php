<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Factura_venta extends Model
{
    //
    /**
	*Asociación con la tabla
    */
    protected $table = 'factura_ventas';

    protected $fillable = [
        'cliente_id', 'monto_factura', 'monto_descuento', 'monto_impuesto',
        'monto_total', 'facturacion', 'user_id',
    ];

    public function cliente()
    {
    	return $this->belongsTo('App\Cliente');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function detalle_ventas()
    {
    	return $this->hasMany('App\Detalle_venta');
    }
}
