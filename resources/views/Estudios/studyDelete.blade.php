@extends('layouts.admin')
@section('barra')
  @include('Estudios.forms.barra')
@endsection
@section('contenido')
    <div class="row">
   {!!Form::open()!!}
        <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token"></input>
          @include('Estudios.forms.studyDelete')
    {!!Form::close()!!}
  </div>
@stop
