@extends('layouts.admin')
@section('barra')
	@include('dates.forms.barra')
@endsection
@include('alerts.request')
  @section('contenido')
   {!!Form::open(['route'=>'date.store', 'method'=>'POST','files' => true])!!}
        @include('dates.forms.date')
      {!!Form::submit('Registrar',['class'=>'btn btn-success'])!!}
    {!!Form::close()!!}
@stop
