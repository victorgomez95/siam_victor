<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ahf extends Model
{
  use SoftDeletes;
   /**
   * Tabla de la base de datos usada por el modelo
   *
   * @var string
   */
  protected $table = 'antecedenteshf';
  /**
   * Atributos que son asignados a cada instancia del modelo
   *
   * @var array
   */
  protected $fillable = [ 'id_paciente', 'diabetes','hipertension','cardiopatia','hepatopatia',
  'nefropatia','enmentales','asma','cancer','enalergicas','endocrinas','otros','intneg'];
  protected $dates = ['deleted_at'];
  
}
