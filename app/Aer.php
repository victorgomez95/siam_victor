<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;

class Aer extends Model
{
         /**
   * Tabla de la base de datos usada por el modelo
   *
   * @var string
   */
  protected $table = 'antecedenteser';
  /**
   * Atributos que son asignados a cada instancia del modelo
   *
   * @var array
   */
  protected $fillable = [
      'id_paciente',
      'cabeza_sujeto',
      'cuello_sujeto',
      'torax_sujeto',
      'abdomen_sujeto',
      'miembros_sujeto',
      'genitales_sujeto'
  ];
      
  protected $dates = ['deleted_at'];
}
