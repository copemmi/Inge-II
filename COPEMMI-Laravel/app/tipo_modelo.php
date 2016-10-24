<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $COD_TIPO_MODELO
 * @property string $NOMBRE
 * @property string $DESCRIPCION
 * @property modelo_maquina[] $modelo_maquina
 */
class tipo_modelo extends Model
{

    public $timestamps = false; 
    public $incrementing = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tipos_modelos';

    /**
     * @var array
     */
    protected $primaryKey= 'COD_TIPO_MODELO';

    protected $fillable = ['NOMBRE'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modelosMaquinas()
    {
        return $this->hasMany('App\modelo_maquina', 'COD_TIPO_MODELO', 'COD_TIPO_MODELO');
    }
}
