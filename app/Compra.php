<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{

    //

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_producto', 'fecha', 'precio' 'cantidad', 'id_usuario',
    ];
}
