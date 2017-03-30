<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $COD_MATERIAL
 * @property string $COD_TIPO_MATERIAL
 * @property string $NOMBRE
 * @property string $DESCRIPCION
 * @property integer $CANTIDAD
 * @property string $FECHA_INGRESO
 * @property tipo_material $tipo_material
 * @property det_modelo_maquina[] $det_modelo_maquina
 * @property det_orden_pedido[] $det_orden_pedido
 */
class material extends Model
{
   
public $timestamps = false; 
public $incrementing = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'materiales';

    /**
     * @var array
     */
    protected $primaryKey= 'COD_MATERIAL';

    protected $fillable = ['COD_TIPO_MATERIAL', 'NOMBRE', 'CARACTERISTICAS', 'CANTIDAD', 'CANTIDADMINIMA', 'FECHA_INGRESO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiposMateriales()
    {
        return $this->belongsTo('App\tipo_material', 'COD_TIPO_MATERIAL', 'COD_TIPO_MATERIAL');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detModelosMaquinas()
    {
        return $this->hasMany('App\det_modelo_maquina', 'COD_MATERIAL', 'COD_MATERIAL');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detOrdenesPedidos()
    {
        return $this->hasMany('App\det_orden_pedido', 'COD_MATERIAL', 'COD_MATERIAL');
    }

    public function scopeBuscadorNombre($query,$dato)
    {

        return $query->where('NOMBRE','LIKE',$dato."%");


    }
    public function scopeBuscadorCodigo($query,$dato)
    {

        return $query->where('COD_MATERIAL','LIKE',$dato."%")
        ;


    }
    public function scopeBuscadorTipo($query,$dato)
    {

        return $query->where('COD_TIPO_MATERIAL','LIKE',$dato."%");


    }
}
