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
}
