@extends('layouts.admin')
@section('barra')
	@include('soaps.forms.barra')
@endsection
@include('alerts.request')
  @section('contenido')
   <table class="table">
     <thead>
       <th>Paciente</th>
       <th>Fecha y hora de consulta (AA-MM-DD)</th>
       <th>Área a la que asiste</th>
       <th>Doctor asignado</th>
     </thead>
     <tbody>
       <td><input id="pacient"
				 value="{{$cita->pacient->nombre.' '.$cita->pacient->apaterno.' '.$cita->pacient->amaterno}}" class="form-control" disabled /></td>
       <td><input id="date" value="{{$cita->fecha.', '.$cita->hora}}" class="form-control" disabled /></td>
       <td><input id="area" value="{{$cita->area}}" class="form-control" disabled /></td>
       <td><input id="doctor" value="{{$cita->doctor->nombre.' '.$cita->doctor->apaterno.' '.$cita->doctor->amaterno}}" class="form-control" disabled /></td>
		</tbody>
   </table>

	 {!!Form::open()!!}
	 <input type="hidden" name="_token" value="{{ csrf_token()}}" id="token"></input>
	 <input type="hidden" name="id_cita" value="<?php echo $id_cita?>" id="id_cita"></input>
	 <input type="hidden" value="{{$cita->doctor->correo.', '}}" id="mail"></input>
	 <input type="hidden" value="{{'Casa: '.$cita->doctor->telefono_casa.'. Cel:'.
		 $cita->doctor->telefono_celular.'. Oficina: '.$cita->doctor->telefono_oficina}}" id="phones"></input>

        @include('soaps.forms.soap')
				<br></br><br></br><br></br><br></br>
				<button class="btn btn-success" data-bind="click: $root.agregarSoap">Guardar SOAP</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
				<table class="table table-hover" data-bind="visible: aux_matchesi().length > 0 || aux_matchesf().length > 0">
				   <thead  class="thead-inverse" >
				      <tr>
				         <th colspan="5">
				            <h4 align="center"><strong style="color:#0174DF">Lista de pruebas sugeridas para cada uno de los diagnósticos</strong></h4>
				         </th>
				      </tr>
				      <tr style="background:#06092E;color:white">
				         <th>Nombre del diagnóstico</th>
				         <th>Tipo de diagnóstico</th>
				         <th>Nombre de prueba sugerida</th>
								 <th>Acción</th>
				      </tr>
				   </thead>
				   <tbody data-bind="foreach: { data: aux_matchesi, as: 'match' }">
				      <tr>
						 		 <td data-bind="text: match.enfermedad()"   ></input></td>
				         <td data-bind="text: match.tipo_diagnostico()"       ></input></td>
				         <td data-bind="text: match.estudio()"            ></input></td>
								 <td><button type="button" id="btnModal" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"
									 data-bind="value: match.estudio()">Encargar prueba a JM Research</button></td>
				      </tr>
				   </tbody>
					 <tbody data-bind="foreach: { data: aux_matchesf, as: 'match' }">
				      <tr>
						 		 <td data-bind="text: match.enfermedad()"   ></input></td>
				         <td data-bind="text: match.tipo_diagnostico()"       ></input></td>
				         <td data-bind="text: match.estudio()"            ></input></td>
								 <td><button type="button" id="btnModal" class="btn btn-info" data-toggle="modal"
									 data-target="#exampleModal" data-bind="value: match.estudio()">Encargar prueba a JM Research</button></td>
				      </tr>
				   </tbody>
				</table>
				<br></br>

			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel"></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
						<form>
							<div class="form-group">
								<label for="recipient-name" class="form-control-label">Solicitante de prueba:</label>
								<input type="text" class="form-control" id="recipient-name" disabled>
							</div>
							<div class="form-group">
								<label for="recipient-name" class="form-control-label">Paciente a quien se realizará prueba:</label>
								<input type="text" class="form-control" id="pacient-name" disabled>
							</div>
							<div class="form-group">
								<label for="message-text" class="form-control-label">Fecha y hora solicitada (La disponibilidad dependerá enteramente de JM Research):</label>
								<br></br>
								<label for="date">Fecha</label>
								<input type="date" id="date-study" name="date">
								<label for="time">Hora</label>
								<input type="time" id="time">
							</div>
							<div class="form-group">
								<label for="message-text" class="form-control-label">Cuerpo del mensaje:</label>
								<textarea class="form-control" id="message-text"></textarea>
							</div>
						</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
		        <button type="button" class="btn btn-primary" id="send_request">Enviar solicitud</button>
		      </div>
		    </div>
		  </div>
		</div>
    {!!Form::close()!!}
@stop
@section('js')
	{!!Html::script('js/typeahead/bloodhound.js')!!}
	{!!Html::script('js/typeahead/typeahead.jquery.js')!!}
	{!!Html::script('js/typeahead/typeahead.bundle.js')!!}
	{!!Html::script('js/typeahead/typeahead.bundle.min.js')!!}
	{!!Html::script('js/buscar_diagnostico.js')!!}
	{!!Html::script('js/soap_create.js')!!}
@stop
