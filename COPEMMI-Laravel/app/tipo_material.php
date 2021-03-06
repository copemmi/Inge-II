<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $COD_TIPO_MATERIAL
 * @property string $NOMBRE
 * @property string $DESCRIPCION
 * @property material[] $material
 */
class tipo_material extends Model
{

    public $timestamps = false; 
    public $incrementing = false;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'tipos_materiales';

    /**
     * @var array
     */
    protected $primaryKey= 'COD_TIPO_MATERIAL';
    protected $fillable = ['NOMBRE'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materiales()
    {
        return $this->hasMany('App\material', 'COD_TIPO_MATERIAL', 'COD_TIPO_MATERIAL');
    }
}
