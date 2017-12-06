@extends('layouts.admin')
@section('barra')
  @include('Estudios.forms.barra')
@endsection
@section('contenido')
<style>
.textarea_css {
  width: 100%;
  height: 100px;
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background: none repeat scroll 0 0 rgba(0, 0, 0, 0.07);
  border-color: -moz-use-text-color #FFFFFF #FFFFFF -moz-use-text-color;
  border-image: none;
  border-radius: 6px 6px 6px 6px;
  border-style: none solid solid none;
  border-width: medium 1px 1px medium;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.12) inset;
  color: #555555;
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
  font-size: 1em;
  line-height: 1.4em;
  padding: 5px 8px;
  transition: background-color 0.2s ease 0s;
}

.textarea_css:focus {
    background: none repeat scroll 0 0 #FFFFFF;
    outline-width: 0;
}
</style>
 <nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <div class="navbar-header">
              <a class="navbar-brand">Registro de estudios clínicos</a>
          </div>
      </div>
  </nav>
  <div class="row content">
   {!!Form::open(['route'=>'agregarEstudio', 'method'=>'POST','files' => false])!!}
        <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token"></input>
        @include('Estudios.forms.study')
    {!!Form::close()!!}
  </div>
@stop
