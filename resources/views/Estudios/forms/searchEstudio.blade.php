<div class="panel-body">
	{!! Form::open(array('url'=>'showStudy','method'=>'GET','class'=>'navbar-form navbar-left pull-right',
	'autocomplete'=>'off','role'=>'search')) !!}
	<div class="form-group">
	      {!!Form::label('fecha_1','Buscar estudios por fecha de creación:')!!}
	      {!! Form::date('fecha1',null, ['class'=>'form-control'])!!}
				<button type="submit" class="btn btn-success">Buscar</button>
	</div>
 {{Form::close()}}
</div>
<div class="panel-body">
{!! Form::open(array('url'=>'showStudyName','method'=>'GET','class'=>'navbar-form navbar-left pull-right',
'autocomplete'=>'off','role'=>'search')) !!}
  <div class="form-group">
    {!!Form::label('nombre_1','Búsqueda de estudios por nombre:')!!}
    <input name="nombre1" class="form-control"></input>
		<button type="submit" class="btn btn-success">Buscar</button>
  </div>
{!! Form::close() !!}
</div>
