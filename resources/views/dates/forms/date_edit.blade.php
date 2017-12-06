<div>
<h4 align="center">Datos de la consulta</h4>
</div>
<div class="form-group">
	{!!Form::label('id_paciente_1','Paciente al que se le asignó la consulta:')!!}
	<?php

	$mysqli = new mysqli("localhost", "root", "", "siam");
	if ($mysqli->connect_errno) {
			echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	$acentos = $mysqli->query("SET NAMES 'utf8'");
	//se obtienen los datos de esa cita, interesa el nombre del paciente
	$id_date = $date->id;
	$query = $mysqli->query("select * from dates where id='$id_date'");
	$fila = $query->fetch_assoc();
	$pac = $fila['id_paciente'];
	$fecha = $fila['fecha'];
	$hora = $fila['hora'];
	$area = $fila['area'];

	$query = $mysqli->query("select * from pacients where id='$pac'");
	$fila = $query->fetch_assoc();

	$id_doctor = $date->id_doctor;
	$query2 = $mysqli->query("select * from doctors where id='$id_doctor'");
	$fila2 = $query2->fetch_assoc();
	$ndoc = $fila2['nombre'].' '.$fila2['apaterno'].' '.$fila2['amaterno'];

	$paciente = $fila['nombre'].' '. $fila['apaterno'].' '. $fila['amaterno'];
	?>
	<select name="id_paciente" class="form-control">
		<option value="<?php echo $pac ?>"><?php echo $paciente ;?></option>
	<?php
		foreach ($pacients as $pacient) {
	?>
		<option value="<?php echo $pacient->id ?>"><?php echo $pacient->nombre.' '.$pacient->apaterno.' '.$pacient->amaterno ;?></option>
	<?php
		}
	 ?>
 </select>
 </div>
<div class="form-group">
{!!Form::label('fecha_1','Fecha de la consulta (DD-MM-AA):')!!}
{!!Form::date('fecha',null,['class'=>'form-control','placeholder'=>'Ingrese fecha de la consulta'])!!}
</div>
<div class="form-group">
{!!Form::label('hora_1','Hora de la cita:')!!}
{!!Form::time('hora',null,['class'=>'form-control','placeholder'=>'Ingrese hora de la consulta'])!!}
</div>
<div class="form-group">
	{!!Form::label('division_1','Área a la que el paciente asiste:')!!}
	<select name="division" class="form-control">
		<option><?php echo $area ;?></option>
		<option>Área Bienestar</option>
		<option>Área Salud</option>
	</select>
 </div>
<div class="form-group">
	{!!Form::label('id_doctor_1','Doctor que atiende al paciente:')!!}
	<select name="id_doctor" class="form-control">
	<option value="<?php echo $date->id_doctor ?>"><?php echo $ndoc;?></option>
	<?php
		foreach ($doctors as $doctor) {
	?>
		<option value="<?php echo $doctor->id ?>"><?php echo $doctor->nombre.' '.$doctor->apaterno.' '.$doctor->amaterno ;?></option>
	<?php
		}
	 ?>
	</select>
</div>
