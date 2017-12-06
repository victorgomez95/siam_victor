<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apnp extends Model
{
  use SoftDeletes;
   /**
   * Tabla de la base de datos usada por el modelo
   *
   * @var string
   */
  protected $table = 'antecedentespnp';
  /**
   * Atributos que son asignados a cada instancia del modelo
   *
   * @var array
   */
  protected $fillable = ['id_paciente','banio','dientes','habitacion',
  'servicios','tabaquismo','alcoholismo','alimentacion','deportes'];
  protected $dates = ['deleted_at'];
}
