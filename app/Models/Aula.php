<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Aula
 *
 * @property $id
 * @property $nombre
 * @property $capacidad
 * @property $centro_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Centro $centro
 * @property Componente[] $componentes
 * @property Ordenadore[] $ordenadores
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Aula extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'capacidad' => 'required|regex:/^[0-9]+$/',
		'centro_id' => 'required',
    ];
    static $messages = [
        'capacidad.regex' => 'Solo puedes insertar números en el campo de capacidad',
        'capacidad.required' => 'El campo de capacidad es obligatorio',
        'centro_id.required' => 'El campo de Centro es obligatorio',
        'nombre.required' => 'El campo Nombre del centro es obligatorio',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','capacidad','centro_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function centro()
    {
        return $this->hasOne('App\Models\Centro', 'id', 'centro_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function componentes()
    {
        return $this->hasMany('App\Models\Componente', 'aula_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordenadores()
    {
        return $this->hasMany('App\Models\Ordenadore', 'aula_id', 'id');
    }
    

}
