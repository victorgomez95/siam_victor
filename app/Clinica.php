<?php

namespace SIAM;

use Illuminate\Database\Eloquent\Model;

class Clinica extends Model
{
    protected $table        = "clinica";
    protected $primaryKey   = "id_clinica";
    public    $timestamps   = false;


    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'direccion',
        'rfc',
        'telefono',
        'nombre_encargado',
        'apellidos_encargado',
        'sexo_encargado',
        'logitipo',
        'fundacion',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [ ];
	
	//Método para guardar la imagen con segundos adjuntados en el nombre del archivo subido
    //para evitar sobreescritura debido a archivos con nombres iguales
    public function setImagenAttribute($logotipo){
      //Si la imagen existe
      if(! empty($logotipo)){
            //Se concatenan los segundos actuales al nombre de la imagen
            $name = Carbon::now()->second.$logotipo->getClientOriginalName();
            //Se la asigna al nombre de la imagen
            $this->attributes['logotipo'] = $name;
            //Se almacena la imagen
            \Storage::disk('localClinic')->put($name, \File::get($logotipo));
        }
	}
}
