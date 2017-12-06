<div class="form-group">
	{!!Form::label('id_doctor_1','Paciente al que se le asignará la consulta:')!!}
	<select name="id_paciente" class="form-control">
	<?php  if(isset($paciente)){ ?>
			<option value="<?php echo $paciente->id ?>"><?php echo $paciente->apaterno.' '.$paciente->amaterno.' '.$paciente->nombre ;?></option>
	<?php }
		foreach ($pacients as $pacient) {
	?>
		<option value="<?php echo $pacient->id ?>"><?php echo $pacient->apaterno.' '.$pacient->amaterno.' '.$pacient->nombre ;?></option>
	<?php
		}
	 ?>
	</select>
</div>
<div class="form-group">
{!!Form::label('fecha_1','Fecha de la consulta (DD-MM-AA):')!!}
{!!Form::date('fecha',null,['class'=>'form-control', 'placeholder'=>'Ingrese fecha de la consulta'])!!}
</div>
<div class="form-group">
{!!Form::label('hora_1','Hora de la consulta (opcional):')!!}
{!!Form::time('hora',null,['class'=>'form-control', 'placeholder'=>'Ingrese hora de la consulta'])!!}
</div>
<div class="form-group">
	{!!Form::label('id_doctor_1','Doctor asignado a la consulta:')!!}
	<select name="id_doctor" class="form-control">
	<?php
		foreach ($doctors as $doctor) {
	?>
		<option value="<?php echo $doctor->id ?>"><?php echo $doctor->apaterno.' '.$doctor->amaterno.' '.$doctor->nombre ;?></option>
	<?php
		}
	 ?>
	</select>
</div>
<div>
