<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'descripcion',
    ];
}
