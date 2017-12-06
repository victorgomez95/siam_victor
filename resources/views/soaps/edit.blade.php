@extends('layouts.admin')
@section('contenido')
@include('soaps.forms.barra')
@include('alerts.request')
  {!!Form::open()!!}
     <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token"></input>
     <input type="hidden" name="id_soap" value="<?php echo $soap->id ?>" id="id_soap"></input>
     @include('soaps.forms.soap_edit')
      <button  type="submit" data-bind="click: $root.modificarSoap"
      class="btn btn-success">Modificar</button>
   {!!Form::close()!!}
@endsection
@section('js')
	{!!Html::script('js/typeahead/bloodhound.js')!!}
	{!!Html::script('js/typeahead/typeahead.jquery.js')!!}
	{!!Html::script('js/typeahead/typeahead.bundle.js')!!}
	{!!Html::script('js/typeahead/typeahead.bundle.min.js')!!}
	{!!Html::script('js/buscar_diagnostico.js')!!}
	{!!Html::script('js/soap_edit.js')!!}
@endsection
