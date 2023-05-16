<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 *
 * @property $id
 * @property $nombre_curso
 * @property $usuario
 * @property $contraseña
 * @property $codigo_curso
 * @property $fecha_inicio
 * @property $fecha_fin
 * @property $aula_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Aula $aula
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuario extends Model
{
    
    static $rules = [
        'nombre_curso' => 'required',
        'usuario' => 'required',
        'contraseña' => 'required',
        'codigo_curso' => 'required|unique:usuarios,codigo_curso',
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date',
        'aula_id' => 'required',
    ];

    static $messages = [
        'nombre_curso.required' => 'El campo nombre del curso es obligatorio',
        'usuario.required' => 'El campo usuario es obligatorio',
        'contraseña.required' => 'El campo contraseña es obligatorio',
        'codigo_curso.required' => 'El campo código del curso es obligatorio',
        'codigo_curso.unique' => 'El código del curso ya existe',
        'fecha_inicio.required' => 'El campo fecha de inicio es obligatorio',
        'fecha_inicio.date' => 'El campo fecha de inicio debe ser una fecha válida',
        'fecha_fin.required' => 'El campo fecha de fin es obligatorio',
        'fecha_fin.date' => 'El campo fecha de fin debe ser una fecha válida',
        'aula_id.required' => 'El campo aula es obligatorio',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_curso', 'usuario', 'contraseña', 'codigo_curso', 'fecha_inicio', 'fecha_fin', 'aula_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function aula()
    {
        return $this->belongsTo('App\Models\Aula', 'aula_id', 'id');
    }
}
