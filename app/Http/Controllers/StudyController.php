<?php

namespace SIAM\Http\Controllers;

use Illuminate\Http\Request;
use SIAM\Http\Requests;
use Illuminate\Support\Collection;
use SIAM\Http\Controllers\Controller;
use SIAM\Study;
use SIAM\StudyMatch;
use SIAM\Diagnostic;
use DB;
use Carbon\Carbon;
use Session;
use Redirect;

class StudyController extends Controller
{
  /**
   * El método index redirecciona a la página principal de promotionProducts,
   * mostrando el menú de opciones
   *
   * @return Response
   */

  /**
   * El método create devuelve la vista que tiene el formulario que se
   *llenará para almacenar un nuevo registro
   *
   * @return Response
   */
  public function create()
  {
    $estudios = Study::all();
    $collection = Collection::make($estudios);
    $collection->toJson();

    $enfermedades = array();
    $data = Diagnostic::select("nombre","id")
			 					->orderBy('nombre', 'asc')
                ->get();
    foreach ($data as $enfermedad) {
      $enfermedades[] = array('id' => $enfermedad->id,'nombre'=> $enfermedad->nombre);
    }
    $collection2 = Collection::make($enfermedades);
    $collection2->toJson();

    //Se crea el archivo json, si existe, se sobreescribe
    $file = 'json/estudios.json';
    file_put_contents($file, $collection);
    $file = 'json/diagnosticos.json';
    file_put_contents($file, $collection2);
    return view('Estudios/studyMatchCreate');
  }
  public function createEstudio()
  {
    return view('Estudios/studyCreate');
  }
  public function storeEstudio(Request $request)
  {
    Study::create([
     'nombre' => $request->nombre,
     'folio' => $request->folio,
     'proposito' => $request->proposito,
     'metodologia' => $request->metodologia
   ]);
   return Redirect::to('studyDelete/');
  }
  public function AddItem(Request $request)
  {
    if($request->ajax()){
      for ($i=0; $i < count($request->matches) ; $i++) {
         StudyMatch::create([
          'id_estudio' => $request->matches[$i]["id_estudio"],
          'id_enfermedad' => $request->matches[$i]["id_diagnostico"]
        ]);
    }
    return response()->json(["mensaje"=>"Estudios asignados a diagnósticos correctamente"]);
   }
 }
 public function diagnosticos(Request $request, $letra_diagnostico){
   if ($request->ajax()) {
     $diag = "$letra_diagnostico"."%";
     $diagnosticos = DB::table('diagnosticos')
                 ->where('nombre', 'like', $diag)
                 ->get();
     return response()->json($diagnosticos);
   }
 }
 public function diagnosticosDos(Request $request, $nombre_estudio){
   if ($request->ajax()) {
     $est = "%".$nombre_estudio."%";
     $diagnosticos = DB::table('diagnosticos')
                 ->where('nombre', 'like', $est)
                 ->get();
     return response()->json($diagnosticos);
   }
 }
 public function estudios(Request $request, $letra_estudio){
   if ($request->ajax()) {
     $est = "$letra_estudio"."%";
     $diagnosticos = DB::table('studies')
                 ->where('nombre', 'like', $est)
                 ->get();
     return response()->json($diagnosticos);
   }
 }
 public function estudiosDos(Request $request, $nombre_estudio){
   if ($request->ajax()) {
     $est = "%".$nombre_estudio."%";
     $diagnosticos = DB::table('studies')
                 ->where('nombre', 'like', $est)
                 ->get();
     return response()->json($diagnosticos);
   }
 }
 public function eliminar(){
   $matches = StudyMatch::all();
   return view('Estudios/studyMatchDelete',['matches'=>$matches]);
 }
 public function eliminarEstudio(){
   $estudios = DB::table('studies')
               ->where('id', '>', 4194)
               ->where('deleted_at', '=', null)
               ->get();
   return view('Estudios/studyDelete',['studies'=>$estudios]);
 }
 public function actualizarEstudio(){
   $estudios = DB::table('studies')
               ->where('deleted_at', '=', null)
               ->paginate(50);
   return view('Estudios/studyUpdate',['studies'=>$estudios]);
 }
 public function destroy($id){
   $match = StudyMatch::find($id);
   $match->delete();
   //DB::table('studymatches')->where('id', '=', "$id")->update(['deleted_at' => Carbon::now()]);
   Session::flash('message','Se ha eliminado enlace correctamente');
   return Redirect::to('eliminarMatch/');
 }
 public function destroyEstudio($id){
   echo $id;
   $estudio = Study::find($id);
   $estudio->delete();
   Session::flash('message','Se ha eliminado enlace correctamente');
   return Redirect::to('studyDelete/');
 }
 public function show(Request $request)
  {
    $matches = StudyMatch::fecha($request->get('fecha1'))->orderBy('id','DESC');
    return view('Estudios/studyMatchDelete',['matches'=>$matches]);
  }
  public function showEstudio(Request $request)
   {
     $fecha1 = $request->fecha1;
     $estudios = DB::table('studies')
                 ->where('created_at', 'LIKE', "$fecha1%")
                 ->where('deleted_at', '=', null)
                 ->paginate(50);
     return view('Estudios/studyDelete',['studies'=>$estudios]);
   }
   public function showEstudioName(Request $request)
    {
      $nombre1 = $request->nombre1;
      $estudios = DB::table('studies')
                  ->where('nombre', 'LIKE', "%$nombre1%")
                  ->where('deleted_at', '=', null)
                  ->paginate(50);
      return view('Estudios/studyDelete',['studies'=>$estudios]);
    }
    public function showEstudioUpdate(Request $request)
     {
       $fecha1 = $request->fecha1;
       $estudios = DB::table('studies')
                   ->where('created_at', 'LIKE', "$fecha1%")
                   ->where('deleted_at', '=', null)
                   ->paginate(50);
       return view('Estudios/studyUpdate',['studies'=>$estudios]);
     }
     public function showEstudioNameUpdate(Request $request)
      {
        $nombre1 = $request->nombre1;
        $estudios = DB::table('studies')
                    ->where('nombre', 'LIKE', "%$nombre1%")
                    ->where('deleted_at', '=', null)
                    ->paginate(50);
        return view('Estudios/studyUpdate',['studies'=>$estudios]);
      }
  public function showUser(Request $request)
   {
     $matches = StudyMatch::user($request->get('id_user'))->orderBy('id','DESC')->paginate(6);
     return view('Estudios/studyMatchDelete',['matches'=>$matches]);
   }
   public function modifyEstudio(Request $request, $id)
    {
      $estudio = Study::find($id);
      return response()->json($estudio);
    }
    public function updateEstudio(Request $request,$id)
    {
      $study = Study::find($id);
      $study->fill($request->all());
      $study->save();
      return response()->json("Estudio actualizado correctamente");
    }
}
