<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Programa
 *
 * @property $id
 * @property $nombre
 * @property $version
 * @property $tipo_licencia
 * @property $created_at
 * @property $updated_at
 *
 * @property Licencia[] $licencias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Programa extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'version' => 'required',
		'tipo_licencia' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','version','tipo_licencia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licencias()
    {
        return $this->hasMany('App\Models\Licencia', 'programa_id', 'id');
    }
    

}
