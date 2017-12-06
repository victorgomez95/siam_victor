<?php

namespace SIAM\Http\Controllers\Auth;

use Illuminate\Http\Request;
use SIAM\Http\Controllers\Controller;
use SIAM\User;
use SIAM\Http\Requests\registerClinicaRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use SIAM\Clinica;
use Session;
use Redirect;
use Mail;
use Carbon\Carbon;
use SIAM\Mail\ConfirmationEmail;

class ClinicaRegisterController extends Controller
{
    public function store (registerClinicaRequest $request){

        $Clinica = new Clinica;
        $Clinica->nombre                = $request->get('name');
        $Clinica->fundacion             = $request->get('anio_fundacion');
        $Clinica->rfc                   = $request->get('rfc');
        $Clinica->nombre_encargado      = $request->get('nombre_encargado');
        $Clinica->apellidos_encargado   = $request->get('apellidos_encargado');
        $Clinica->direccion             = $request->get('ubicacion');
        $Clinica->telefono              = $request->get('telefono');
        $Clinica->sexo_encargado        = $request->get('sexo');
        if(Input::hasFile('logotipo')){
			
			
            $file = Input::file('logotipo');
            //$file->move(public_path().'/assets/img_comp/',$file->getClientOriginalName().'_'.Carbon::now()->second);
			\Storage::disk('localClinic')->put($file->getClientOriginalName().'_'.Carbon::now()->second, \File::get($file));
            $Clinica->logotipo = $file->getClientOriginalName().'_'.Carbon::now()->second;
        }else{
            $Clinica->logotipo              = "N/A";
        }

        $Clinica->save();
        
        $user = new User;
        $user->id_persona   = $Clinica->id_clinica;
		$user->name         = $request->get('name');
        $user->email        = $request->get('email');
        $user->password     = bcrypt($request->get('password'));
        $user->tipo         = "clinica";
        $user->save();

        Mail::to($user->email)->send( new ConfirmationEmail($user));



        Session::flash("message","Registrado Correctamente... hemos enviado un email a tu correo de para verificación");
        return Redirect::to('/register');
        //return "Registrado Correctamente... hemos enviado un email a tu correo de para verificacion";
    }
}
