<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Diagnostic extends Model
{
  use SoftDeletes;
  use SearchableTrait;
     /**
     * Tabla de la base de datos usada por el modelo
     *
     * @var string
     */
    protected $table = 'diagnosticos';
    /**
     * Atributos que son asignados a cada instancia del modelo
     *
     * @var array
     */
    protected $searchable = ['nombre'];
    protected $fillable = ['nombre'];

    protected $dates = ['deleted_at'];

    public function scopeName($query,$name){
      if (trim($name) != "") {
        $query->where('nombre',"LIKE","%$name%");
      }
    }
}
