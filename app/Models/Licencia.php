<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Licencia
 *
 * @property $id
 * @property $Usuario
 * @property $clave
 * @property $fecha_compra
 * @property $fecha_expiracion
 * @property $programa_id
 * @property $ordenador_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Ordenadore $ordenadore
 * @property Programa $programa
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Licencia extends Model
{
    
    static $rules = [
		'Usuario' => 'required',
		'clave' => 'required',
		'fecha_compra' => 'required',
		'fecha_expiracion' => 'required',
		'programa_id' => 'required',
		'ordenador_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Usuario','clave','fecha_compra','fecha_expiracion','programa_id','ordenador_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ordenadore()
    {
        // return $this->hasOne('App\Models\Ordenadore', 'id', 'ordenador_id');
        
        return $this->belongsTo('App\Models\Ordenadore', 'ordenador_id', 'id');
        
        
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function programa()
    {
        return $this->hasOne('App\Models\Programa', 'id', 'programa_id');
    }
    

}
