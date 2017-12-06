<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;

class Apact extends Model
{
         /**
   * Tabla de la base de datos usada por el modelo
   *
   * @var string
   */
  protected $table = 'antecedentespact';
  /**
   * Atributos que son asignados a cada instancia del modelo
   *
   * @var array
   */
  protected $fillable = [
      'id_paciente',
      '	descripcion_pacient'
  ];
      
  protected $dates = ['deleted_at'];
}
