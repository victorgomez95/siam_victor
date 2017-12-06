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
  @include('dates.search')
		<table class="table">
			<thead>
				<th>Paciente</th>
        <th>Fecha de consulta (AA-MM-DD)</th>
				<th>Hora acordada</th>
				<th>Área</th>
        <th>Doctor asignado</th>
        <th colspan="2">Acciones</th>
			</thead>
			@foreach($soaps as $soap)
        <?php
          $mysqli = new mysqli("localhost", "siam", "Yuo*q289", "expediente_siam");
          if ($mysqli->connect_errno) {
              echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
          }
          $acentos = $mysqli->query("SET NAMES 'utf8'");
					$id_cita1 = $soap->id_cita;
					$querycita = $mysqli->query("select * from dates where id='$id_cita1'");
        	$filacita = $querycita->fetch_assoc();

          //obtenemos el id de la cita
          $id_paciente = $filacita["id_paciente"];
          //se obtienen los datos de esa cita, interesa el nombre del paciente y el doctor que lo está atendiendo
          $query = $mysqli->query("select * from pacients where id='$id_paciente'");
          $fila = $query->fetch_assoc();
          $pac = $fila['nombre'].' '.$fila['apaterno'].' '.$fila['amaterno'];

          $id_doctor = $filacita["id_doctor"];
        	$query2 = $mysqli->query("select * from doctors where id='$id_doctor'");
        	$fila2 = $query2->fetch_assoc();
        	$ndoc = $fila2['nombre'].' '.$fila2['apaterno'].' '.$fila2['amaterno'];
        ?>
			<tbody>
				<td><?php echo $pac; ?></td>
        <td>{{$filacita["fecha"]}}</td>
				<td>{{$filacita["hora"]}}</td>
				<td>{{$filacita["area"]}}</td>
        <td><?php echo $ndoc; ?></td>
				<td>
					<button  type="button" value="<?php  echo $soap->id?>" Onclick="mostrarsoap(this.value);" class="btn btn-info btn-sm" data-toggle='modal' data-target='#myModal'>Mostrar SOAP</a>
				</td>
        <td>{!!Form::model($soap,['route'=>['soap.destroy',$soap->id],'method'=>'DELETE'])!!}
          <button type="submit" onclick="return confirm('¿Realmente desea eliminar SOAP?')" class="btn btn-danger btn-sm">Eliminar SOAP</button>
        </td>
		@endforeach
		</table>
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Detalle de análisis SOAP</h4>
					</div>
					<div class="modal-body">
						@include('soaps.forms.soapshow')
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
	@endsection
	@section('js')
		{!!Html::script('js/popup.js')!!}
	@stop
