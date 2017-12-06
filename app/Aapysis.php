<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;

class Aapysis extends Model
{
       /**
   * Tabla de la base de datos usada por el modelo
   *
   * @var string
   */
  protected $table = 'antecedentesapysis';
  /**
   * Atributos que son asignados a cada instancia del modelo
   *
   * @var array
   */
  protected $fillable = [
      'id_paciente',
      'ap_digestivo',
      'ap_cardivascular',
      'ap_respiratorio',
      'ap_urinario',
      'ap_genital',
      'ap_hematologico',
      'ap_endocrino',
      'ap_osteomuscular',
      'si_nervioso',
      'si_sensorial',
      'sicosomatico'
  ];
      
  protected $dates = ['deleted_at'];
}
