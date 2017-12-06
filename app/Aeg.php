<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;

class Aeg extends Model
{
     /**
   * Tabla de la base de datos usada por el modelo
   *
   * @var string
   */
  protected $table = 'antecedenteseg';
  /**
   * Atributos que son asignados a cada instancia del modelo
   *
   * @var array
   */
  protected $fillable = [
      'id_paciente',
      'ori_desori',
      'hidra_deshidra',
      'coloracion',
      'marcha_normal',
      'altMarcha_otrasAlt',
      'otro_iter'];
      
  protected $dates = ['deleted_at'];

}
