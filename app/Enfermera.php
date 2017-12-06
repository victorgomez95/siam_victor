<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;

class Enfermera extends Model
{
    protected $table        = "enfermera";
    protected $primaryKey   = "id_enfermera";
    public    $timestamps   = false;


    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellidos',
        'sexo',
        'telefono',
        'direccion',
        'escolaridad',
        'hora_entrada',
        'hora_salida',
        'estado',
        'fotohash',
        'fecha_nac',
        'tabla',
        'id_padre',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [ ];
}
