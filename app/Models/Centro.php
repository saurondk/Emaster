<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Centro
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $nombre
 * @property $direccion
 * @property $telefono
 *
 * @property Aula[] $aulas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Centro extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'direccion' => 'required',
		'telefono' => 'required|regex:/^[0-9]+$/',
    ];
    static $messages = [
      'telefono.regex' => 'Solo puedes insertar números en el campo de teléfono',
      'telefono.required' => 'El campo de teléfono es obligatorio',
      'direccion.required' => 'El campo de direccion es obligatorio',
      'nombre.required' => 'El campo Nombre del centro es obligatorio',
  ];
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','direccion','telefono'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function aulas()
    {
        return $this->hasMany('App\Models\Aula', 'centro_id', 'id');
    }
    

}
