@extends ('layouts.admin')
@section('barra')
	@include('nurseSheets.forms.barra')
@endsection
@section ('contenido')
<div>
	<h3 align="center">Nueva hoja de enfermería para 
		<strong>
			<?php echo $pacient->nombre.' '.$pacient->apaterno.' '.$pacient->amaterno; ?>
		</strong>
	</h3>
</div>
<table align="center">
	<tr>
		<td>
			<button id="btnAgregar" 
					data-bind="click: $root.grafica, visible: visible_btnGrafica() == 0"
					class="btn btn-primary">
					Mostrar gráficas comparativas
			</button>
			<button id="btnAgregar" 
					data-bind="click: $root.graficas_ocultar, visible: visible_btnGrafica() == 1"
					class="btn btn-danger">
					Ocultar gráficas comparativas
			</button>
		</td>
		<td>
			<button id="btnAgregar" 
					data-bind="click: $root.tabla, visible: visible_btnTabla() == 0"
					class="btn btn-primary">
					Mostrar tabla comparativa
			</button>
			<button id="btnAgregar" 
					data-bind="click: $root.tabla_ocultar, visible: visible_btnTabla() == 1"
					class="btn btn-danger">
					Ocultar tabla comparativa
			</button>
		</td>
	</tr>
</table>

<div id="contenedor"  data-bind="visible: visible_btnGrafica() == 1"></div>
<div id="contenedor2" data-bind="visible: visible_btnGrafica() == 1"></div>
<div id="contenedor3" data-bind="visible: visible_btnGrafica() == 1"></div>
<div id="contenedor4" data-bind="visible: visible_btnGrafica() == 1"></div>

<br>

<h4 align="center" data-bind="visible: visible_btnTabla() == 1">Registros previos de somatomería</h4>
<table data-bind="visible: visible_btnTabla() == 1" class="table table-striped table-hover">
	<thead style="background:#292B2C;color:white">
		<tr>
			<th>Fecha (AA-MM-DD) 		</th>
			<th>Peso 					</th>
			<th>Presión sistólica 		</th>
			<th>Presión diastólica 		</th>
			<th>frecuencia respiratoria </th>
			<th>Oximetría 				</th>
			<th>Glucometría 			</th>
		</tr>
	</thead>
		<tbody data-bind="foreach: somatometrias_previas">
		<tr>
			<td data-bind="text: fecha"> 		 </td>
			<td data-bind="text: peso"> 		 </td>
			<td data-bind="text: psistolica"> 	 </td>
			<td data-bind="text: pdiastolica"> 	 </td>
			<td data-bind="text: frespiratoria"> </td>
			<td data-bind="text: oximetria"> 	 </td>
			<td data-bind="text: glucometria"> 	 </td>
		</tr>
		</tbody>
</table>
<div class="row">
	@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
			@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
			</ul>
		</div>
	@endif
	{!!Form::open()!!}
	<input type="hidden" name="_token" value="{{ csrf_token()}}" id="token"></input>
		<div class="form-group">
		<h3 align="center">Somatometría</h3>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div  class="form-group ">
				{!!Form::label('peso_1','Peso:')!!}
				<input 	data-bind="value: peso"  
						type="number" 
						class="form-control"
						placeholder='Ingrese peso en kgr ej. 62.5'>
				</input>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div  class="form-group ">
				{!!Form::label('altura_1','Altura:')!!}
				<input 	data-bind="value: altura"  
						type="number" 
						class="form-control"
						placeholder='Ingrese altura en cm ej 172'>
				</input>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div  class="form-group ">
				{!!Form::label('parterial_1','Presión arterial sistólica:')!!}
				<input 	data-bind="value: psistolica"  
						type="number" 
						class="form-control"
						placeholder='Ingrese presión arterial en mm/Hg ej. 120'>
				</input>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div  class="form-group ">
				{!!Form::label('parterial_1','Presión arterial diastólica:')!!}
				<input 	data-bind="value: pdiastolica"  
						type="number" 
						class="form-control"
						placeholder='Ingrese presión arterial en mm/Hg ej. 80'>
				</input>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div  class="form-group ">
				{!!Form::label('frespiratoria_1','Frecuencia respiratoria:')!!}
				<input 	data-bind="value: frespiratoria"  
						type="number" 
						class="form-control"
						placeholder='Ingrese respiraciones por minuto ej. 17'>
				</input>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div  class="form-group ">
				{!!Form::label('pulso_1','Pulso:')!!}
				<input 	data-bind="value: pulso"  
						type="number" 
						class="form-control"
						placeholder='Ingrese pulso en latidos por minuto ej. 64'>
				</input>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div  class="form-group ">
				{!!Form::label('oximetria_1','Oximetría:')!!}
				<input 	data-bind="value: oximetria"  
						type="number" 
						class="form-control"
						placeholder='Ingrese porcentaje de oxígeno en la sangre en % ej. 95'>
				</input>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<div  class="form-group ">
				{!!Form::label('glucometria_1','Glucometría:')!!}
				<input 	data-bind="value: glucometria"  
						type="number" 
						class="form-control"
						placeholder='Ingrese glucometría en mg/dL ej. 90'>
				</input>
			</div>
		</div>

		<h3 align="center">Hábitus exterior</h3>
		<h4 align="center" data-bind="visible: nuevo_habitus().length == 0">
			<button id="btnAgregarhabitus" 
					data-bind="click: $root.agregarHabitus"
					class="btn btn-primary">
					Añadir Hábitus exterior
			</button>
		</h4>
		<h4 align="center" data-bind="visible: nuevo_habitus().length > 0">
			<button id="btnAgregarhabitus" 
					data-bind="click: $root.removeNewHabitus"
					class="btn btn-danger">
					Quitar Hábitus exterior
			</button>
		</h4>
		<div class="row content" data-bind="visible: nuevo_habitus().length > 0, foreach: nuevo_habitus">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h4 align="letf">Condición y constitución del paciente</h4>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="background-color:#EDEDED;">
				<div class="form-group">
					{!!Form::label('condicion_1','Condición del paciente:')!!}
					<select data-bind="options: $root.condiciones, value: condicion,
							optionsCaption: 'Seleccione condición'" 
							class="form-control">
					</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="background-color:#EDEDED;">
				<div class="form-group">
					{!!Form::label('constitucion_1','Constitución:')!!}
					<select data-bind="options: $root.constituciones, value: constitucion,
							optionsCaption: 'Seleccione constitución'" 
							class="form-control">
					</select>
				</div>
			</div>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h4 align="left">Conformación y actitud del paciente</h4>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  style="background-color:#EDEDED;">
				<div class="form-group">
					{!!Form::label('entereza_1','Entereza:')!!}
					<input 	data-bind="value: entereza" 
							class="form-control"
							placeholder='Ingrese observaciones acerca de si faltan partes al cuerpo del paciente'>
					</input>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  style="background-color:#EDEDED;">
				<div class="form-group">
					{!!Form::label('proporcion_1','Relación y proporción:')!!}
					<input 	data-bind="value: proporcion" 
							class="form-control"
							placeholder='Ingrese observaciones de la relación y proporción del cuerpo del paciente'>
					</input>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  style="background-color:#EDEDED;">
				<div class="form-group">
					{!!Form::label('simetria_1','Simetría:')!!}
					<input 	data-bind="value: simetria" 
							class="form-control"
							placeholder='Ingrese observaciones en la simetría del cuerpo del paciente'>
					</input>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12"  style="background-color:#EDEDED;">
				<div class="form-group">
					{!!Form::label('biotipo_1','Biotipo:')!!}
					<select data-bind="options: $root.biotipos, value: biotipo,
							optionsCaption: 'Seleccione biotipo'" 
							class="form-control">
					</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="background-color:#EDEDED;">
				<div class="form-group">
					{!!Form::label('actitud_1','Actitud:')!!}
					<select data-bind="options: $root.actitudes, value: actitud,
							optionsCaption: 'Seleccione actitud'" 
							class="form-control">
					</select>
				</div>
			</div>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h4 align="left">Fascies, movimientos y estado de conciencia</h4>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="background-color:#EDEDED;">
				<div class="form-group">
					{!!Form::label('fascies_1','Fascies del paciente:')!!}
					<select data-bind="options: $root.lista_fascies, value: fascies,
							optionsCaption: 'Seleccione fascies'" 
							class="form-control">
					</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="background-color:#EDEDED;">
				<div class="form-group">
					{!!Form::label('movanormales_1','Movimientos anormales:')!!}
					<select data-bind="options: $root.movanormales, value: movanormal,
							optionsCaption: 'Seleccione movimientos anormales'" 
							class="form-control">
					</select>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="background-color:#EDEDED;">
				<div class="form-group">
					{!!Form::label('movanormales_1','Observaciones:')!!}
					<input 	data-bind="value: movanormal_obs" 
							class="form-control"
							placeholder='Ingrese observaciones acerca de los movimientos anormales'>
					</input>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="background-color:#EDEDED;">
				<div class="form-group">
					{!!Form::label('marchanormales_1','Marchas anormales:')!!}
					<select data-bind="options: $root.marchanormales, value: marchanormal,
							optionsCaption: 'Seleccione marchas anormales'" 
							class="form-control">
					</select>
				</div>
			</div>
		</div>




		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<h3 align="center">Medicamentos administrados</h3>
				<div align="center">
					<button id="btnAgregar" 
							data-bind="click: $root.agregarMedicamento"
							class="btn btn-primary">
							Añadir medicamento administrado
					</button>
				</div>
				<!--<div class="table-responsive content" data-bind="visible: nuevo_medicamento().length > 0">-->
				<div class="table-responsive content">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead style="background:#292B2C;color:white">
							<th>Medicamento administrado        			</th>
							<th>Fecha de administración     				</th>
							<th>Cantidad prescrita    						</th>
							<th>Vía por la cual fue administrada la dosis 	</th>
							<th>
								<div align="center">
									Acción
								</div>
							</th>
						</thead>
						<tbody data-bind="foreach: nuevo_medicamento">
							<tr>
								<td>
									<input data-bind="value: nombre_medicamento" class="form-control"
									placeholder='Ingrese nombre de medicamento'></input>
								</td>
								<td>
									<input data-bind="value: fecha_admin" class="form-control" type="date"></input>
								</td>
								<td>
									<input data-bind="value: cantidad" class="form-control"
									placeholder='Ingrese cantidad administrada'></input>
								</td>
								<td>
									<select data-bind="options: $root.vias,value: via" class="form-control"></select>
								</td>
								<td>
									<button data-bind="click: $root.removeNewMedicamento" class="btn btn-danger">Quitar</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>


			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<h3 align="center">Medicamentos actuales</h3>
				<div align="center">
					<button id="btnAgregar" data-bind="click: $root.agregarMedicamentoActual"
						class="btn btn-primary">Añadir medicamento actual</button>
				</div>

				<!--<div class="table-responsive content" data-bind="visible: nuevo_medicamento().length > 0">-->
				<div class="table-responsive content">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead style="background:#292B2C;color:white">
							<th>Medicamento administrado        			</th>
							<th>Vía por la cual fue administrada la dosis 	</th>
							<th>
								<div align="center">
									Acción
								</div>
							</th>
						</thead>
						<tbody data-bind="foreach: nuevo_medicamento_actual">
							<tr>
								<td>
									<input data-bind="value: nombre_med" class="form-control" placeholder='Ingrese nombre de medicamento'></input>
								</td>
								<td>
									<select data-bind="options: $root.vias,value: via" class="form-control"></select>
								</td>
								<td>
									<button data-bind="click: $root.removeNewMedicamentoActual" class="btn btn-danger">Quitar</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>	
		</div>
	<br></br>
	<div align="center" class="form-group">
		<button class="btn btn-success" data-bind="click: $root.agregarHoja">Guardar</button>
		<button class="btn btn-danger" type="reset">Cancelar</button>
	</div>
	{!!Form::close()!!}
</div>
@endsection
@section('js')
	{!!Html::script('js/create_nurseSheet.js')!!}
@stop
