<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $COD_ORDEN_PEDIDO
 * @property string $FECHA_PEDIDO
 * @property det_orden_pedido[] $det_orden_pedido
 */
class orden_pedido extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ordenes_pedidos';

    /**
     * @var array
     */
    protected $fillable = ['FECHA_PEDIDO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detOrdenesPedidos()
    {
        return $this->hasMany('App\det_orden_pedido', 'COD_ORDEN_PEDIDO', 'COD_ORDEN_PEDIDO');
    }
}
