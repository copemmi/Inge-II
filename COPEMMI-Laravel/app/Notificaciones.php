<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificaciones extends Model
{
    protected $table = "notificaciones";

    protected $primaryKey= 'id';

    protected $fillable = ['tipo', 'mensaje'];
}
