<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;

class Asg extends Model
{
    /**
   * Tabla de la base de datos usada por el modelo
   *
   * @var string
   */
  protected $table = 'antecedentesg';
  /**
   * Atributos que son asignados a cada instancia del modelo
   *
   * @var array
   */
  protected $fillable = [
      'id_paciente',
      'astenia_pacient',
      'adinamia_pacient',
      'anorexia_pacient',
      'fiebre_pacient',
      'pPeso_pacient',
      'otrosSI_pacient'
  ];
      
  protected $dates = ['deleted_at'];
}
