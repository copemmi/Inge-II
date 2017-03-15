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

 class cliente extends Model {

 	public $timestamps = false; 
	public $incrementing = false;

	/**
     * The table associated with the model.
     * 
     * @var string
     */

	protected $table = 'clientes';

	/**
     * @var array
     */

	protected $primaryKey = 'ID';

	protected $fillable = ['NOMBRE','PRIMER_APELLIDO','SEGUNDO_APELLIDO','DIRECCION','TELEFONO','CORREO','NOMBRE_EMPRESA','CEDULA_JURIDICA'];

/**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientesOrden()
    {
        return $this->hasMany('App\orden_fabricacion', 'ID', 'ID');
    }


     public function scopeBuscadorNombre($query,$dato)
    {

        return $query->where('NOMBRE','LIKE',$dato."%");


    }
    public function scopeBuscadorIdentificacion($query,$dato)
    {

        return $query->where('ID','LIKE',$dato."%")
        ;


    }
  
 }