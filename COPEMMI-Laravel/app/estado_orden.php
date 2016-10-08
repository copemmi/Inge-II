<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $COD_ESTADO
 * @property string $NOMBRE
 * @property orden_fabricacion[] $orden_fabricacion
 */
class estado_orden extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'estados_ordenes';

    /**
     * @var array
     */
    protected $fillable = ['NOMBRE'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordenesFabricaciones()
    {
        return $this->hasMany('App\orden_fabricacion', 'COD_ESTADO', 'COD_ESTADO');
    }
}
