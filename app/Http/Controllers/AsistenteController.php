<?php

namespace SIAM\Http\Controllers;
use Illuminate\Http\Request;
use SIAM\Http\Requests;
use SIAM\Asistente;
use SIAM\Clinica;
use SIAM\DocParticular;
use SIAM\MatchAsistente;
use SIAM\Http\Requests\Asis_Enf_Request;
use SIAM\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon;
use Session;
use Redirect;
use Mail;
use SIAM\Mail\ConfirmationEmail;


class AsistenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request){
        $user = Auth::user();
        $count = 0;
        $query ="";
        $tipo_vista = $user->tipo;
        if($user->tipo == "clinica"){
            if ($request){
                $query=trim($request->get('searchText'));
                $asistente=DB::table('asistente')
                ->where('tabla','=','clinica')
                ->where('id_padre','=',$user->id_persona)
                ->where('estado','=','Activo')
                ->where('nombre','LIKE','%'.$query.'%')
                ->orderBy('id_asistente','desc')
                ->paginate(20);

                return view('personal.asistente.index',["asistente"=>$asistente,"searchText"=>$query, "tipo_vista"=>$tipo_vista, "count"=>$count]);
            }
        }else{
            $asistente=DB::table('asistente')
                ->where('tabla', '=','doc_particular')
                ->where('id_padre', '=',$user->id_persona)
                ->where('estado','=','Activo')
                ->orderBy('id_asistente','desc')
                ->paginate(10);
            $count = count($asistente);
            return view('personal.asistente.index',["asistente"=>$asistente,"searchText"=>$query, "tipo_vista"=>$tipo_vista, "count"=>$count]);
        }

                /*$asistente=DB::table('asistente')
                ->join('match_asistente','match_asistente.id_asistente','=','asistente.id_asistente')
                ->join('doc_clinica'    ,'match_asistente.id_doctor'   ,'=','doc_clinica.id_doctor')
                ->select(DB::raw('DISTINCT(asistente.id_asistente)'),
                    'asistente.nombre',
                    'asistente.apellidos',
                    'asistente.telefono',
                    'asistente.direccion',
                    'asistente.hora_entrada',
                    'asistente.hora_salida',
                    'asistente.fotohash',
                    'asistente.sexo')
                ->where('asistente.estado','=','Activo')
                ->where('asistente.nombre','LIKE','%'.$query.'%')
                ->where('doc_clinica.id_clinica','=',"17")
                ->orderBy('asistente.id_asistente','desc')
                ->paginate(20);*/
        
    }
    
    //create new catagoria -> page
    public function create(){
        $user = Auth::user();
        $tipo = "false";
        $doctor_clinica = "";
        $doctor_particular = "";
        if($user->tipo=="clinica"){
            $doctor_clinica=DB::table('doc_clinica')
            ->where('estado','=','Activo')
            ->where('id_clinica','=',$user->id_persona)
            ->get();
            $tipo = "true";
        }else{
            if($user->tipo=="doc_particular"){
                $doctor_particular = DocParticular::findOrFail($user->id_persona);
                $tipo = "false";
            }
        }
        
        if($tipo == "true" && (count($doctor_clinica) > 0) ){
            return view("personal.asistente.create",["doctor_clinica"=>$doctor_clinica,"doctor_particular"=>$doctor_particular,"tipo"=>$tipo]);
        }
        if($tipo == "false"){
            return view("personal.asistente.create",["doctor_clinica"=>$doctor_clinica,"doctor_particular"=>$doctor_particular,"tipo"=>$tipo]);
        }
        if($tipo == "true" && (count($doctor_clinica) <= 0) ){
            return view("otros.no_doc");
        }

    }

    //method -> POST
    public function store (Asis_Enf_Request $request){
        $user = Auth::user();

        $asistente = new Asistente;
        $asistente->nombre       = $request->get('nombre');
        $asistente->apellidos    = $request->get('apellidos');
        $asistente->telefono     = $request->get('telefono');
        $asistente->sexo         = $request->get('sexo');
        $asistente->direccion    = $request->get('direccion');
        $asistente->escolaridad  = $request->get('escolaridad');
        $asistente->hora_entrada = $request->get('hora_entrada');
        $asistente->hora_salida  = $request->get('hora_salida');
        $asistente->estado       = 'Activo';
        $asistente->fecha_nac       = $request->get('fecha_nac');
        
        if(Input::hasFile('fotohash')){
            $file = Input::file('fotohash');
            $file->move(public_path().'/assets/img_users/',$file->getClientOriginalName());
            $asistente->fotohash = $file->getClientOriginalName();
        }else{
            $asistente->fotohash = "N/A";
        }

        if($user->tipo=="clinica"){
            $asistente->tabla ="clinica";
            $asistente->id_padre = $user->id_persona;
        }else{
            $asistente->tabla ="doc_particular";
            $asistente->id_padre = $user->id_persona;
        }

        $asistente->save();

        $cont = 0;
        $id_doctor = $request->get('id_doctor');
        while($cont < count($id_doctor)){
             $match                     = new MatchAsistente();
             $match->id_asistente       = $asistente->id_asistente; 
             $match->id_doctor          = $id_doctor[$cont]; 
             $match->tabla              = $user->tipo;
             $match->estado             = "Activo";
             $match->save();
             $cont=$cont+1;
         }
		
		$user = new User;
        $user->id_persona   = $asistente->id_asistente;
        $user->email        = $request->get('email');
        $user->password     = bcrypt($request->get('password'));
        $user->tipo         = "asistente";
        $user->save();
        Mail::to($user->email)->send( new ConfirmationEmail($user));
		
        return Redirect::to('menu/asistente');
    }
    
    public function show($id){
        return view("personal.asistente.show",["usuario_perfil"=>Asistente::findOrFail($id)]);
    }

    public function edit($id){
        return view("personal.asistente.edit",["asistente"=>Asistente::findOrFail($id)]);
    }

    //method -> PATCH
    public function update(Request $request,$id){
        $asistente = Asistente::findOrFail($id);
        $asistente->nombre       = $request->get('nombre');
        $asistente->apellidos    = $request->get('apellidos');
        $asistente->telefono     = $request->get('telefono');
        $asistente->sexo         = $request->get('sexo');
        $asistente->direccion    = $request->get('direccion');
        $asistente->escolaridad  = $request->get('escolaridad');
        $asistente->hora_entrada = $request->get('hora_entrada');
        $asistente->hora_salida  = $request->get('hora_salida');
        $asistente->fecha_nac    = $request->get('fecha_nac');

        if(Input::hasFile('fotohash')){
            $file = Input::file('fotohash');
            $file->move(public_path().'/assets/img_users/',$file->getClientOriginalName());
            $asistente->fotohash = $file->getClientOriginalName();
        }
        $asistente->update();
        return Redirect::to('menu/asistente');
    }

    public function update_pass(Request $request){
        if($request->get('new_pass') == $request->get('new_pass1')){
            $doctor           = User::where('tipo', "doc_clinica")->
                                        where('id_persona', $request->get('id_user'))->firstOrFail();
            $doctor->password = bcrypt($request->get('new_pass'));
            $doctor->save();
            return "Actualización correcta";
            //return Redirect::to('users/menu');
        }else{
            return "Las contraseñas no coinciden";
            //Session::flash('message-error','La contraseña es incorrecta. Verifique sus datos e inténtalo de nuevo...');
        }
        //return Redirect::to('users/menu');
    }

    public function destroy($id){
        $asistente=Asistente::findOrFail($id);
        $asistente->estado='Inactivo';
        $asistente->update();

        $match_asistente=DB::table('match_asistente')->where('id_asistente','=',$asistente->id_asistente)->get();
        $cont = 0;
        while($cont < count($match_asistente)){
            $update_asistente=MatchAsistente::findOrFail($match_asistente[$cont]->id_match_asistente);
            $update_asistente->estado = "Inactivo";
            $update_asistente->update();
            $cont=$cont+1;
         }

        return Redirect::to('menu/asistente');
    }

}
