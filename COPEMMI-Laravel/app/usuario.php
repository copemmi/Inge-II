<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $COD_USUARIO
 * @property string $COD_ROL
 * @property string $NOMBRE
 * @property string $APELLIDO
 * @property string $NICKNAME
 * @property string $CLAVE
 * @property string $CLAVEX
 * @property rol $rol
 * @property orden_fabricacion[] $orden_fabricacion
 */
class usuario extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['COD_ROL', 'NOMBRE', 'APELLIDO', 'NICKNAME', 'CLAVE', 'CLAVEX'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roles()
    {
        return $this->belongsTo('App\rol', 'COD_ROL', 'COD_ROL');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordenesFabricaciones()
    {
        return $this->hasMany('App\orden_fabricacion', 'COD_USUARIO', 'COD_USUARIO');
    }
}
