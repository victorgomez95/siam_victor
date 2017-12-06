<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class App extends Model
{
  use SoftDeletes;
   /**
   * Tabla de la base de datos usada por el modelo
   *
   * @var string
   */
  protected $table = 'antecedentespp';
  /**
   * Atributos que son asignados a cada instancia del modelo
   *
   * @var array
   */
  protected $fillable = ['id_paciente','enactuales','quirurjicos','transfuncionales',
  'alergias','traumaticos','hosprevias','adicciones','otros'];
  protected $dates = ['deleted_at'];
}
