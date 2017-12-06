@extends('layouts.admin')
@section('barra')
	@include('soaps.forms.barra')
@endsection
@section('contenido')
  @include('alerts.errors')
  @include('alerts.request')
  <?php $message=Session::get('message')?>
  @if(Session::has('message'))
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
  </div>
  @endif
		<table class="table">
			<thead>
				<th>Paciente</th>
        <th>Fecha de consulta (AA-MM-DD)</th>
				<th>Hora acordada (Formato de 24 hrs)</th>
				<th>Área a la que asiste</th>
        <th>Doctor que atiende</th>
			</thead>
        <?php
          $mysqli = new mysqli("localhost", "siam", "Yuo*q289", "expediente_siam");
          if ($mysqli->connect_errno) {
              echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
          }
          $acentos = $mysqli->query("SET NAMES 'utf8'");
          //obtenemos el id de la cita
          $id_paciente=$date->id_paciente;
          //se obtienen los datos de esa cita, interesa el nombre del paciente y el doctor que lo está atendiendo
          $query = $mysqli->query("select * from pacients where id='$id_paciente'");
          $fila = $query->fetch_assoc();
          $pac = $fila['nombre'].' '.$fila['apaterno'].' '.$fila['amaterno'];

          $id_doctor = $date->id_doctor;
        	$query2 = $mysqli->query("select * from doctors where id='$id_doctor'");
        	$fila2 = $query2->fetch_assoc();
        	$ndoc = $fila2['nombre'].' '.$fila2['apaterno'].' '.$fila2['amaterno'];
        ?>
			<tbody>
				<td><?php echo $pac; ?></td>
        <td>{{$date->fecha}}</td>
				<td>{{$date->hora}}</td>
				<td>{{$date->area}}</td>
        <td><?php echo $ndoc; ?></td>
		</table>
    <table class="table">
			<thead>
				<th>Subjetivo</th>
      </thead>
      <tbody>
				<td>{{$soap->subjetivo}}</td>
     </tbody>
      <thead>
        <th>Objetivo</th>
      </thead>
      <tbody>
        <td>{{$soap->objetivo}}</td>
      </tbody>
      <thead>
				<th>Análisis</th>
      </thead>
      <tbody>
        <td>{{$soap->analisis}}</td>
      </tbody>
      <thead>
				<th>Plan</th>
      </thead>
      <tbody>
				<td>{{$soap->plan}}</td>
      </tbody>
      <tbody>
        <td>{!!link_to_route('mostrar_analisis_soap', $title = 'Descargar SOAP', $parameters = $date->id,
$attributes = ['class'=>'btn btn-primary','style'=>"color:#FFFFFF"])!!}</td>
      </tbody>
    </table>
@stop
