<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Factura_compra extends Model
{
    //
    /**
	*Asociación con la tabla
    */
    protected $table = 'factura_compras';

    protected $fillable = [
        'proveedor_id', 'monto_factura', 'monto_descuento', 'monto_impuesto',
        'monto_total', 'facturacion', 'user_id',
    ];

    public function proveedor()
    {
    	return $this->belongsTo('App\Proveedor');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function detalle_compras()
    {
    	return $this->hasMany('App\Detalle_compra');
    }

}