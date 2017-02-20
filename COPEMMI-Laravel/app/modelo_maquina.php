<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $COD_MODELO
 * @property string $COD_IMAGEN
 * @property string $COD_TIPO_MODELO
 * @property string $NOMBRE
 * @property string $DESCRIPCION
 * @property float $PRECIO
 * @property imagen_modelo $imagen_modelo
 * @property tipo_modelo $tipo_modelo
 * @property det_modelo_maquina[] $det_modelo_maquina
 * @property orden_fabricacion[] $orden_fabricacion
 */
class modelo_maquina extends Model
{

    public $timestamps = false; 
    public $incrementing = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'modelos_maquinas';

    /**
     * @var array
     */
    protected $primaryKey= 'COD_MODELO';

    protected $fillable = ['COD_IMAGEN', 'COD_TIPO_MODELO', 'NOMBRE', 'CARACTERISTICAS', 'PRECIO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function imagenesModelo()
    {
        return $this->belongsTo('App\imagen_modelo', 'COD_IMAGEN', 'COD_IMAGEN');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tiposModelo()
    {
        return $this->belongsTo('App\tipo_modelo', 'COD_TIPO_MODELO', 'COD_TIPO_MODELO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detModelosMaquinas()
    {
        return $this->hasMany('App\det_modelo_maquina', 'COD_MODELO', 'COD_MODELO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordenesFabricaciones()
    {
        return $this->hasMany('App\orden_fabricacion', 'COD_MODELO', 'COD_MODELO');
    }

     public function scopeBuscadorNombre($query,$dato)
    {

        return $query->where('NOMBRE','LIKE',$dato."%");


    }
    public function scopeBuscadorCodigo($query,$dato)
    {

        return $query->where('COD_MODELO','LIKE',$dato."%")
        ;


    }
    public function scopeBuscadorTipo($query,$dato)
    {

        return $query->where('COD_TIPO_MODELO','LIKE',$dato."%");


    }

    public function scopeBuscadorPrecio($query,$dato)
    {

        return $query->where('PRECIO','LIKE',"%".$dato."%");


    }
   
   

}
