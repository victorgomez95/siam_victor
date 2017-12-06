<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StudyMatch extends Model
{
  use SoftDeletes;
  /**
   * Tabla de la base de datos usada por el modelo Cita
   *
   * @var string
   */
  protected $table = 'studymatches';
  protected $dates = ['deleted_at'];
  /**
   * Atributos que son llenados cuando se crea un nuevo registro de Cita
   *
   * @var array
   */

  protected $fillable = ['id_estudio','id_enfermedad','id_user'];

  public function scopeFecha($query,$fecha1){
    if ($fecha1 != null) {
      $fecha = $fecha1.'%';
      $query->where('created_at',"like","$fecha");
    }
  }
  public function scopeUser($query,$user){
    if ($user != null) {
      $query->where('id_usuario',"=","$user");
    }
  }
}
