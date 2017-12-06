<?php

namespace SIAM\Http\Controllers;

use Illuminate\Http\Request;
use SIAM\Http\Requests\DoctorCreateRequest;
use SIAM\Http\Requests;
use SIAM\Http\Controllers\Controller;
use SIAM\Doctor;
use DB;
use Session;
use Redirect;

class DoctorController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    if ($request){
      $query=trim($request->get('searchText'));
      $doctors = Doctor::name($request->get('name'))->orderBy('id','DESC')->paginate(5);
      return view('doctors.index',["doctors"=>$doctors,"searchText"=>$query]);
    }
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
        return view('Doctors/create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(DoctorCreateRequest $request)
  {
    //el método create() crea un nuevo registro, se deben asociar los datos del request
    //con las columnas de la tabla
     Doctor::create($request->all());
     return redirect('/doctor/show')->with('message','Se ha agregado un nuevo doctor correctamente');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request)
  {
    if ($request){
      $query=trim($request->get('searchText'));
        $doctors = Doctor::name($request->get('name'))->orderBy('id','DESC')->paginate(5);
      return view('doctors.index',["doctors"=>$doctors,"searchText"=>$query]);
    }
  }
  /**
   * Muestra el registro que se va actualizar
   *
   * @param  int  $id_usuario
   * @return Response
   */
   //muestra a todos los Doctores para elegir uno y actualizarlo
   public function actualizar(Request $request)
  {
    $doctors = Doctor::name($request->get('name'))->orderBy('apaterno','ASC')->paginate(6);
    return view('Doctores.doctor_update',compact('doctors'));
  }
  //ya que se ha eligido uno, se aparta para editarlo
  public function edit($id)
  {
    //se encuentra el registro con el id que se busca, y se almacena en una variable
    $doctor = Doctor::find($id);
    //se returna la vista del formulario que contendrá los datos del elemento
    //a editar
    return view('doctors.edit',['doctor'=>$doctor]);
  }
  /**
   * Actualiza el registro en la base de datos
   * Recibe como parámetro un Request, que es el formulario que contiene
   * los datos que se van a actualizar y el id del registro a modificar
   * @param  int  $id
   * @return Response
   */

  public function update(Request $request,$id)
  {
    //se encuentra el registro con el id que se busca, y se almacena en una variable
    $doctor = Doctor::find($id);
    //se llama a la función que llena el registro con los datos almacenados en
    //el request
    $doctor->fill($request->all());
    //Se guardan los cambios hechos
    $doctor->save();
    //se manda mensaje mensaje de confirmación
    Session::flash('message','doctor Actualizado Correctamente');
    //Se redirecciona a la vista que muestra los registros
    return Redirect::to('doctor/');

  }
   //Muestra todos los Doctores de la base de datos para elegir al que se quiere eliminar
   public function deleter(Request $request)
   {
     $doctors = Doctor::name($request->get('name'))->orderBy('apaterno','ASC')->paginate(6);
     return view('Doctores.doctor_delete',compact('doctors'));
   }
   /**
    * Remueve el elemento de la base de datos, recibe como parámetro
    *el id del usuario que se va a eliminar
    * @param  int  $id
    * @return Response
    */
   public function destroy($id)
   {
     $doctor = Doctor::find($id);
		 $doctor->delete();
     //se manda mensaje mensaje de confirmación
     Session::flash('message','doctor eliminado correctamente');
     //Se redirecciona a la vista que muestra los registros
     return Redirect::to('doctor/');

   }
}
