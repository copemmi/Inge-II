<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $COD_HISTORIAL
 * @property integer $COD_ORDEN_FABRICACION
 * @property orden_fabricacion $orden_fabricacion
 */
class historial_orden_fabricion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'historiales_ordenes_fabriciones';

    /**
     * @var array
     */
    protected $fillable = ['COD_ORDEN_FABRICACION'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ordenesFabricaciones()
    {
        return $this->belongsTo('App\orden_fabricacion', 'COD_ORDEN_FABRICACION', 'COD_ORDEN_FABRICACION');
    }
}
