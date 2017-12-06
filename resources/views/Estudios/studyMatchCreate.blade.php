@extends('layouts.admin')
@section('barra')
  @include('Estudios.forms.barra')
@endsection
@section('contenido')

   <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">Registro de enlaces de diagnósticos con estudios clínicos</a>
            </div>
        </div>
    </nav>


  <div class="row content">
   {!!Form::open()!!}
        <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token"></input>
        @include('Estudios.forms.studyMatch')
    {!!Form::close()!!}
  </div>
  @section('js')
    {!!Html::script('js/matches.js')!!}
  @stop
@stop
