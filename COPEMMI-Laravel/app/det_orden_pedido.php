<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $COD_DETALLE__PEDIDO
 * @property integer $COD_ORDEN_PEDIDO
 * @property string $COD_MATERIAL
 * @property integer $CANTIDAD
 * @property material $material
 * @property orden_pedido $orden_pedido
 */
class det_orden_pedido extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'det_ordenes_pedidos';

    /**
     * @var array
     */
    protected $fillable = ['COD_ORDEN_PEDIDO', 'COD_MATERIAL', 'CANTIDAD'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function materiales()
    {
        return $this->belongsTo('App\material', 'COD_MATERIAL', 'COD_MATERIAL');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ordenesPedidos()
    {
        return $this->belongsTo('App\orden_pedido', 'COD_ORDEN_PEDIDO', 'COD_ORDEN_PEDIDO');
    }
}
