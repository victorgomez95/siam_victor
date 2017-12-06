<?php

namespace SIAM\Http\Controllers;
use Illuminate\Http\Request;
use SIAM\Clinica;
use SIAM\User;
use SIAM\DocParticular;
use SIAM\MatchEspecialidades;
use SIAM\Enfermera;
use SIAM\Asistente;
use SIAM\DocClinica;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use DB;
use Carbon\Carbon;
use Session;
use Redirect;
use Mail;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        $especialidades = "";
        $usuario_perfil = "";
        $usuario_tipo   = "";
        $usuario_tipo   = $user->tipo;
        $doc_asignados  = "";

        if($user->tipo == "clinica"){
            $usuario_perfil = Clinica::findOrFail($user->id_persona);
        }

        if($user->tipo == "doc_particular"){
            $usuario_perfil = DocParticular::findOrFail($user->id_persona);
            $especialidades=DB::table('match_especialidad')
            ->join('especialidades','especialidades.id_especialidades','=','match_especialidad.id_especialidades')
            ->select('especialidades.tipo as tipo','especialidades.nombre as nombre')
            ->where('match_especialidad.tabla','=','doc_particular')
            ->where('match_especialidad.id_doctor','=',$usuario_perfil->id_doctor)
            ->where('match_especialidad.estado','=',"Activo");
        }

        if($user->tipo == "doc_clinica"){
            $usuario_perfil = DocClinica::findOrFail($user->id_persona);
            $especialidades=DB::table('match_especialidad')
            ->join('especialidades','especialidades.id_especialidades','=','match_especialidad.id_especialidades')
            ->select('especialidades.tipo as tipo','especialidades.nombre as nombre')
            ->where('match_especialidad.tabla','=','doc_clinica')
            ->where('match_especialidad.id_doctor','=',$usuario_perfil->id_doctor)
            ->where('match_especialidad.estado','=',"Activo");
        }

        if($user->tipo == "enfermera"){
            $usuario_perfil = Enfermera::findOrFail($user->id_persona);
            $doc_asignados  = DB::table('enfermera');
        }

        if($user->tipo == "asistente"){
            $usuario_perfil = Asistente::findOrFail($user->id_persona);
            $doc_asignados  = DB::table('asistente');
        }
		
		
		
        return view('profile.index',["usuario_perfil"=>$usuario_perfil,"especialidades"=>$especialidades,"usuario_tipo"=>$usuario_tipo]);
    }

    public function edit($id){
        $user = Auth::user();
        $especialidades = "";
        $usuario_perfil = "";
        $usuario_tipo   = $user->tipo;
        $especialidad=DB::table('especialidades')->where('estado','=','Activo')->get();

        if($user->tipo == "clinica"){
            $usuario_perfil = Clinica::findOrFail($user->id_persona);
        }else{
            if($user->tipo == "doc_particular"){
                $usuario_perfil = DocParticular::findOrFail($user->id_persona);
            }else{
                if($user->tipo == "enfermera"){
                    $usuario_perfil = Enfermera::findOrFail($user->id_persona);
                }else{
                    if($user->tipo == "asistente"){
                        $usuario_perfil = Asistente::findOrFail($user->id_persona);
                    }
                }
            }
        }
		
		var_dump($usuario_perfil);
		
        return view("profile.edit",["usuario_perfil"=>$usuario_perfil,"usuario_tipo"=>$usuario_tipo, "especialidad"=>$especialidad]);
    }

    public function update(Request $request,$id){
        $user = Auth::user();
        
        if($user->tipo == "clinica"){
            $clinica = Clinica::findOrFail($id);
            $clinica->nombre                = $request->get('nombre');
            $clinica->direccion             = $request->get('direccion');
            $clinica->rfc                   = $request->get('rfc');
            $clinica->telefono              = $request->get('telefono');
            $clinica->nombre_encargado      = $request->get('nombre_encargado');
            $clinica->apellidos_encargado   = $request->get('apellidos_encargado');
            $clinica->sexo_encargado        = $request->get('sexo_encargado');
            $clinica->fundacion             = $request->get('fundacion');
            if(Input::hasFile('logotipo')){
                $file = Input::file('logotipo');
                $file->move(public_path().'/assets/img_comp/',$file->getClientOriginalName());
                $clinica->logotipo = public_path().$file->getClientOriginalName();
            }
            $clinica->update();
        }
		
		if($user->tipo == "doc_clinica"){
            $Docclinica = DocClinica::findOrFail($id);
            $Docclinica->nombre                = $request->get('nombre');
            $Docclinica->apellidos             = $request->get('apellidos');
            $Docclinica->cedula                = $request->get('cedula');
            $Docclinica->telefono              = $request->get('telefono');
            $Docclinica->direccion      		= $request->get('direccion');
            $Docclinica->sexo        			= $request->get('sexo');
            $Docclinica->fecha_nac             = $request->get('fecha_nac');
            if(Input::hasFile('fotohash')){
                $file = Input::file('fotohash');
                $file->move(public_path().'/assets/img_comp/',$file->getClientOriginalName());
                $Docclinica->logotipo = public_path().$file->getClientOriginalName();
            }
            $clinica->update();
        }

        if($user->tipo == "doc_particular"){
            $docParticular = DocParticular::findOrFail($id);
            $docParticular->nombre         = $request->get('nombre');
            $docParticular->apellidos      = $request->get('apellidos');
            $docParticular->telefono       = $request->get('telefono');
            $docParticular->direccion      = $request->get('direccion');
            $docParticular->sexo           = $request->get('sexo');
            $docParticular->cedula         = $request->get('cedula');
            $docParticular->fecha_nac      = $request->get('fecha_nac');
            if(Input::hasFile('fotohash')){
                $file = Input::file('fotohash');
                $file->move(public_path().'/assets/img_users/',$file->getClientOriginalName());
                $docParticular->fotohash = $file->getClientOriginalName();
            }

            $cont = 0;
            $id_especialidad = $request->get('id_especialidad');
            while($cont < count($id_especialidad)){
                $match                     = new MatchEspecialidades();
                $match->id_doctor          = $docParticular->id_doctor; 
                $match->id_especialidades  = $id_especialidad[$cont]; 
                $match->tabla              = "doc_particular";
                $match->estado             = "Activo";
                $match->save();
                $cont=$cont+1;
            }

            $docParticular->update();
        }

        if($user->tipo == "enfermera"){
            $enfermera = Enfermera::findOrFail($id);
            $enfermera->nombre         = $request->get('nombre');
            $enfermera->apellidos      = $request->get('apellidos');
            $enfermera->telefono       = $request->get('telefono');
            $enfermera->direccion      = $request->get('direccion');
            $enfermera->sexo           = $request->get('sexo');
            $enfermera->escolaridad    = $request->get('escolaridad');
            $enfermera->fecha_nac      = $request->get('fecha_nac');
            $enfermera->hora_entrada   = $request->get('hora_entrada');
            $enfermera->hora_salida    = $request->get('hora_salida');
            if(Input::hasFile('fotohash')){
                $file = Input::file('fotohash');
                $file->move(public_path().'/assets/img_users/',$file->getClientOriginalName());
                $enfermera->fotohash = $file->getClientOriginalName();
            }
            $enfermera->update();
        }

        if($user->tipo == "asistente"){
            $asistente = Asistente::findOrFail($id);
            $asistente->nombre         = $request->get('nombre');
            $asistente->apellidos      = $request->get('apellidos');
            $asistente->telefono       = $request->get('telefono');
            $asistente->direccion      = $request->get('direccion');
            $asistente->sexo           = $request->get('sexo');
            $asistente->escolaridad    = $request->get('escolaridad');
            $asistente->fecha_nac      = $request->get('fecha_nac');
            $asistente->hora_entrada   = $request->get('hora_entrada');
            $asistente->hora_salida    = $request->get('hora_salida');
            if(Input::hasFile('fotohash')){
                $file = Input::file('fotohash');
                $file->move(public_path().'/assets/img_users/',$file->getClientOriginalName());
                $asistente->fotohash = $file->getClientOriginalName();
            }
            $asistente->update();
        }
        
        return Redirect::to('profile');
    }
}
