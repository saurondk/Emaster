<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ordenadore
 *
 * @property $id
 * @property $Identificador
 * @property $marca
 * @property $modelo
 * @property $descripcion
 * @property $ip
 * @property $fecha_compra
 * @property $aula_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Aula $aula
 * @property Licencia[] $licencias
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ordenadore extends Model
{
    
    static $rules = [
		'Identificador' => 'required',
		'marca' => 'required',
		'modelo' => 'required',
		'descripcion' => 'required',
		'aula_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Identificador','marca','modelo','descripcion','ip','fecha_compra','aula_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function aula()
    {
        // return $this->hasOne('App\Models\Aula', 'id', 'aula_id');
        return $this->belongsTo('App\Models\Aula');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licencias()
    {
        // return $this->hasMany('App\Models\Licencia', 'ordenador_id', 'id');
        return $this->hasMany('App\Models\Licencia');
    }
    // OrdenadorController.php


    

}
