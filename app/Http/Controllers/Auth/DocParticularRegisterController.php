<?php

namespace SIAM\Http\Controllers\Auth;

use Illuminate\Http\Request;
use SIAM\Http\Controllers\Controller;
use SIAM\User;
use SIAM\Http\Requests\registerDocParticularRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use SIAM\DocParticular;
use Session;
use Redirect;
use Mail;
use SIAM\Mail\ConfirmationEmail;

class DocParticularRegisterController extends Controller
{


    public function store (registerDocParticularRequest $request){

        $doc_particular = new DocParticular;
        $doc_particular->nombre          = $request->get('name');
        $doc_particular->apellidos       = $request->get('apellidos');
        $doc_particular->telefono        = $request->get('telefono');
        $doc_particular->direccion       = $request->get('ubicacion');
        $doc_particular->sexo            = $request->get('sexo');//$data['sexo'];
        $doc_particular->cedula          = $request->get('cedula');
        $doc_particular->save();

	
		$user = new User;
        $user->id_persona   = $doc_particular->id_doctor;
		$user->name         = $request->get('name');
        $user->email        = $request->get('email');
        $user->password     = bcrypt($request->get('password'));
        $user->tipo         = "doc_particular";
        $user->save();

        Mail::to($user->email)->send( new ConfirmationEmail($user));

        Session::flash("message","Registrado Correctamente... hemos enviado un email a tu correo de para verificación");
        return Redirect::to('/register/particular');
    }
}
