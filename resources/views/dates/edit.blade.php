@extends('layouts.admin')
@section('barra')
	@include('dates.forms.barra')
@endsection
@section('contenido')
@include('alerts.request')
   {!!Form::model($date,['route'=>['date.update',$date->id],'method'=>'PUT'])!!}
      @include('dates.forms.date_edit')
       <button  type="submit" onclick="return confirm('¿Guardar cambios en el registro?')"
       class="btn btn-primary">Modificar</button>
    {!!Form::close()!!}
@stop
