<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $COD_ROL
 * @property string $NOMBRE
 * @property usuario[] $usuario
 */
class rol extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'roles';

    /**
     * @var array
     */
    protected $fillable = ['NOMBRE'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()
    {
        return $this->hasMany('App\usuario', 'COD_ROL', 'COD_ROL');
    }
}
