<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $COD_DETALLE_MODELO
 * @property string $COD_MODELO
 * @property string $COD_MATERIAL
 * @property integer $CANTIDAD
 * @property materiale $material
 * @property modelo_maquina $modelo_maquina
 */
class det_modelo_maquina extends Model
{

    public $timestamps = false; 
    public $incrementing = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'det_modelos_maquinas';

    /**
     * @var array
     */

    protected $primaryKey= 'COD_DETALLE_MODELO';

    protected $fillable = ['COD_MODELO', 'COD_MATERIAL', 'CANTIDAD'];

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
    public function modelosMaquinas()
    {
        return $this->belongsTo('App\modelo_maquina', 'COD_MODELO', 'COD_MODELO');
    }
}
