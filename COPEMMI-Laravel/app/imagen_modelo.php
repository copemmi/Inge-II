<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $COD_IMAGEN
 * @property string $IMAGEN
 * @property string $FORMATO
 * @property modelos_maquina[] $modelo_maquina
 */
class imagen_modelo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'imagenes_modelos';

    /**
     * @var array
     */
    protected $fillable = ['IMAGEN', 'FORMATO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modelosMaquinas()
    {
        return $this->hasMany('App\modelo_maquina', 'COD_IMAGEN', 'COD_IMAGEN');
    }
}
