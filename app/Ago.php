<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ago extends Model
{
  use SoftDeletes;
   /**
   * Tabla de la base de datos usada por el modelo
   *
   * @var string
   */
  protected $table = 'antecedentesgo';
  /**
   * Atributos que son asignados a cada instancia del modelo
   *
   * @var array
   */
  protected $fillable = ['id_paciente','menarca','rmenstrual','dismenorrea','ivsa',
  'parejas','gestas','abortos','partos','cesareas','fpp','menopausia','climaterio','mpp',
  'citologia','mastografia'];
  protected $dates = ['deleted_at'];

}
