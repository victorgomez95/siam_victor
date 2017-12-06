<?php

namespace SIAM;

use SIAM\Pacient;
use SIAM\Date;
use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SoapDiagnostic extends Model
{
  use SoftDeletes;
  /**
   * Tabla de la base de datos usada por el modelo Cita
   *
   * @var string
   */
  protected $table = 'soapdiagnostics';
  protected $dates = ['deleted_at'];
  /**
   * Atributos que son llenados cuando se crea un nuevo registro de Cita
   *
   * @var array
   */

  protected $fillable = ['id_soap','id_diagnostico','tipo'];
/*
  public function pacient(){
      return $this->belongsTo('SIAM\Date','id_cita');
  }

/*
  public function date_actions(){
    return $this->hasMany('COEM\Date_action');
  }
*/
/*
  public function scopeFecha($query,$fecha1){
    if ($fecha1 != null) {
      $query->where('fecha',"=","$fecha1");
    }
  }
  public function scopeName($query,$id_paciente){
    if ($id_paciente != null) {
      $fila_citas = DB::select("select * from dates where id_paciente='$id_paciente'");
      $array = array();
      foreach ($fila_citas as $cita) {
        $array[] = array('valor'=> $cita->id);
      }
      $query->whereIn('id_cita',$array);
    }
  }*/
}
