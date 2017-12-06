<div class="panel-body">
	{!! Form::open(array('url'=>'date/show','method'=>'GET','class'=>'navbar-form navbar-left pull-right',
	'autocomplete'=>'off','role'=>'search')) !!}
	<div class="form-group">
	      {!!Form::label('fecha_1','Buscar citas por fecha:')!!}
	      {!! Form::date('fecha1',null, ['class'=>'form-control'])!!}
				<button type="submit" class="btn btn-success">Buscar</button>
	</div>
{{Form::close()}}
</div>
<div class="panel-body">
{!! Form::open(array('url'=>'date/show/paciente_cita','method'=>'GET','class'=>'navbar-form navbar-left pull-right',
'autocomplete'=>'off','role'=>'search')) !!}
  <div class="form-group">
    {!!Form::label('nombre_1','Buscar citas por paciente:')!!}
    <select name="id_paciente" class="form-control">
      <option>Seleccione paciente</option>
    <?php
  		foreach ($pacients as $pacient) {
  	?>
  		<option value="<?php echo $pacient->id ?>"><?php echo $pacient->apaterno.' '.$pacient->amaterno.' '.$pacient->nombre ;?></option>
  	<?php
  		}
  	 ?>
  	</select>
		<button type="submit" class="btn btn-success">Buscar</button>
  </div>
{!! Form::close() !!}
</div>
