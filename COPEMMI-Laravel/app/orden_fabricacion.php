<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $COD_ORDEN_FABRICACION
 * @property string $COD_ESTADO
 * @property string $COD_MODELO
 * @property string $COD_USUARIO
 * @property string $NOMBRE_CLIENTE
 * @property string $CEDULA_CLIENTE
 * @property string $FECHA_LLEGADA
 * @property string $FECHA_ENTREGA
 * @property estado_orden $estado_orden
 * @property modelo_maquina $modelo_maquina
 * @property usuario $usuario
 * @property historial_orden_fabricion[] $historial_orden_fabricion
 */
class orden_fabricacion extends Model
{
	public $timestamps = false; 
public $incrementing = false;

    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'ordenes_fabricaciones';

    /**
     * @var array
     */
	protected $primaryKey= 'COD_ORDEN_FABRICACION';
     
    protected $fillable = ['COD_ESTADO','COD_MODELO', 'COD_USUARIO', 'ID', 'FECHA_LLEGADA', 'FECHA_ENTREGA'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estadosOrdene()
    {
        return $this->belongsTo('App\estado_orden', 'COD_ESTADO', 'COD_ESTADO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modelosMaquina()
    {
        return $this->belongsTo('App\modelo_maquina', 'COD_MODELO', 'COD_MODELO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo('App\usuario', 'COD_USUARIO', 'COD_USUARIO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clientes()
    {
        return $this->belongsTo('App\cliente', 'ID', 'ID','NOMBRE_CLIENTE','NOMBRE_CLIENTE');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historialesOrdenesFabriciones()
    {
        return $this->hasMany('App\historial_orden_fabricion', 'COD_ORDEN_FABRICACION', 'COD_ORDEN_FABRICACION');
    }
    /*Metodos de busqueda para los estados de producción e inactiva por
    Código de órden,código de modelo y cédula del cliente */
    public function scopeBuscadorCliente($query,$dato)
    {
        return $query->where([['ID','LIKE',$dato."%"],['COD_ESTADO','!=',"TER"]]);
    }
    public function scopeBuscadorModMaquina($query,$dato)
    {
        return $query->where([['COD_MODELO','LIKE',$dato."%"],['COD_ESTADO','!=',"TER"]]);
    }
    public function scopeBuscadorEstadosDeOrdenes($query,$dato)
    {
        return $query->where([['COD_ESTADO','LIKE',$dato."%"],['COD_ESTADO','!=',"TER"]]);
    
    }
    public function scopeBuscadorOrdenFab($query,$dato)
    {
        return $query->where([['COD_ORDEN_FABRICACION','LIKE',$dato."%"],['COD_ESTADO','!=',"TER"]]);
    }



    //Métodos para el buscador de ordenes de fabricacion en estado terminadas por 
    //Código de órden,código de modelo y cédula del cliente
    public function scopeBuscadorCodigo($query, $dato)
    {
        return $query->where([
            ['COD_ORDEN_FABRICACION', 'LIKE', $dato."%"],
            ['COD_ESTADO', '=', 'TER'],
            ]);
    }

    public function scopeBuscadorModelo($query, $dato)
    {
        return $query->where([
            ['COD_MODELO', 'LIKE', $dato."%"],
            ['COD_ESTADO', '=', 'TER'],
            ]);
    }

    public function scopeBuscadorCedulaCliente($query, $dato)
    {
        return $query->where([
            ['ID', 'LIKE', $dato."%"],
            ['COD_ESTADO', '=', 'TER'],
            ]);
    }
}
