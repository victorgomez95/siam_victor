<?php

namespace SIAM\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
Use Auth;
Use Session;
Use Redirect;
Use SIAM\State;
use SIAM\Http\Requests\LoginRequest;
use SIAM\Http\Controllers\Controller;

class LogController extends Controller
{

    /**
     * Funcion que valida que los datos del login sean correctos
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        if(Auth::attempt(['correo' => $request['email'],'password' => $request['password']])){
        //Se redirecciona a la página principal del sistema donde se mostrará el mensaje de confirmación
        return Redirect::to('index');
        }
        else{
          Session::flash('message-error','Verifique sus datos');
          return Redirect::to('/');
        }
    }
    public function logout()
    {
        Auth::logout();
        Return Redirect::to('/');
    }

    public function notFound(){
        if(Auth::guest()==1){
            return view('otros.404_out');
        }else{
            return view('otros.404_in');
        }
    }


}
