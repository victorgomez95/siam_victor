<div class="panel-body">
	{!! Form::open(array('url'=>'study/show','method'=>'GET','class'=>'navbar-form navbar-left pull-right',
	'autocomplete'=>'off','role'=>'search')) !!}
	<div class="form-group">
	      {!!Form::label('fecha_1','Buscar enlaces por fecha de creación:')!!}
	      {!! Form::date('fecha1',null, ['class'=>'form-control'])!!}
				<button type="submit" class="btn btn-success">Buscar</button>
	</div>
{{Form::close()}}
</div>
<div class="panel-body">
{!! Form::open(array('url'=>'study/show/usuario','method'=>'GET','class'=>'navbar-form navbar-left pull-right',
'autocomplete'=>'off','role'=>'search')) !!}
  <div class="form-group">
    {!!Form::label('nombre_1','Búsqueda de enlaces por usuario autor:')!!}
    <select name="id_usuario" class="form-control">
      <option>Seleccione usuario</option>
  		<option value="5">Helga</option>
		<option value="6">Jean Paul</option>
		<option value="3">Issac</option>
  	</select>
		<button type="submit" class="btn btn-success">Buscar</button>
  </div>
{!! Form::close() !!}
</div>
