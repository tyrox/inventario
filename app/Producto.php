<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Producto extends Model
{
    //
    use Notifiable;

    /**
    *Asociación con la tabla
    */
    protected $table = 'productos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
         'nombre', 'descripcion', 'departamento', 'iv', 'proveedor1', 'proveedor2',
         'precio_costo', 'precio_publico', 'existencia',
     ];
}
