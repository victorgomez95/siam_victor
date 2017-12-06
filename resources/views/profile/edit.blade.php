@extends ('layouts.admin')
@section ('contenido')
<style>
	/* Style the Image Used to Trigger the Modal */
	#myImg {
		border-radius: 5px;
		cursor: pointer;
		transition: 0.3s;
	}

	#myImg:hover {opacity: 0.7;}

	/* The Modal (background) */
	.modal1 {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
	}

	/* Modal Content (Image) */
	.modal-content1 {
		margin: auto;
		display: block;
		width: 80%;
		max-width: 700px;
	}

	/* Caption of Modal Image (Image Text) - Same Width as the Image */
	#caption {
		margin: auto;
		display: block;
		width: 80%;
		max-width: 700px;
		text-align: center;
		color: #ccc;
		padding: 10px 0;
		height: 150px;
	}

	/* Add Animation - Zoom in the Modal */
	.modal-content1, #caption { 
		-webkit-animation-name: zoom;
		-webkit-animation-duration: 0.6s;
		animation-name: zoom;
		animation-duration: 0.6s;
	}

	@-webkit-keyframes zoom {
		from {-webkit-transform:scale(0)} 
		to {-webkit-transform:scale(1)}
	}

	@keyframes zoom {
		from {transform:scale(0)} 
		to {transform:scale(1)}
	}

	/* The Close Button */
	.close {
		position: absolute;
		top: 50px;
		right: 35px;
		color: #f1f1f1;
		font-size: 40px;
		font-weight: bold;
		transition: 0.3s;
	}

	.close:hover,
	.close:focus {
		color: #bbb;
		text-decoration: none;
		cursor: pointer;
	}

	/* 100% Image Width on Smaller Screens */
	@media only screen and (max-width: 700px){
		.modal-content {
			width: 100%;
		}
	}
</style>

<h3>Editar Perfil</h3>
<h2>Tipo de usuario: {{$usuario_tipo }}</h2>
@if (count($errors)>0)
<div class="alert alert-danger">
	<ul>
	@foreach ($errors->all() as $error)
		<li>{{$error}}</li>
	@endforeach
	</ul>
</div>
@endif

@if($usuario_tipo == "clinica")
	{!!Form::open(array( 'url'=>['profile',$usuario_perfil->id_clinica],'method'=>'PATCH','autocomplete'=>'off','files'=>'true'))!!}
	{{Form::token()}}
		<div class="row">

			<div class="col-md-6">
				<!-- general form elements -->
				<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Información General</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
					<div class="box-body">
						<div class="form-group">
							<label for="nombre">Nombre <font style="color:red">*</font></label>
							<input type="text" name="nombre" class="form-control" value="{{$usuario_perfil->nombre}}" placeholder="Nombre..." required>
						</div>
						<div class="form-group">
							<label for="nombre">Dirección <font style="color:red">*</font></label>
							<input type="text" name="direccion" class="form-control" value="{{$usuario_perfil->direccion}}" placeholder="Direccion">
						</div>
						<div class="form-group">
							<label for="nombre">RFC <font style="color:red">*</font></label>
							<input type="text" name="rfc" class="form-control" value="{{$usuario_perfil->rfc}}" placeholder="Direccion">
						</div>
						
						<div class="form-group">
							<label for="telefono">Teléfono <font style="color:red">*</font></label>
							<input type="tel" name="telefono" class="form-control" value="{{$usuario_perfil->telefono}}" placeholder="Teléfono..."  minlength="10" maxlength="10"  pattern="[0-9]{10}">
						</div>

						<div class="form-group">
							<label for="telefono">Fecha de fundación <font style="color:red">*</font></label>
							<input type="month" name="fundacion" class="form-control" value="{{$usuario_perfil->fundacion}}" >
						</div>

					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="box box-success">

					<div class="box-header with-border">
						<h3 class="box-title"></h3>
					</div>

					<div class="box-body">
						

						<div class="form-group">
							<label for="nombre">Nombre del administrador <font style="color:red">*</font></label>
							<input type="text" name="nombre_encargado" class="form-control" value="{{$usuario_perfil->nombre_encargado}}" placeholder="Apellidos">
						</div>
						<div class="form-group">
							<label for="nombre">Apellidos <font style="color:red">*</font></label>
							<input type="text" name="apellidos_encargado" class="form-control" value="{{$usuario_perfil->apellidos_encargado}}" placeholder="Apellidos">
						</div>
						<div class="form-group">
							<label>Sexo <font style="color:red">*</font></label>
							<select name="sexo_encargado" class="form-control">
								@if($usuario_perfil->sexo_encargado == 'Hombre')
									<option value="Hombre" selected>Hombre</option>
									<option value="Mujer">Mujer</option>
								@else
									<option value="Hombre"> Hombre	</option>
									<option value="Mujer" selected>	 Mujer</option>
								@endif
							</select>
						</div>


						<div class="form-group">
							<label for="imagen">Logotipo</label>
							<input type="file" name="logotipo" class="form-control">
						</div>
						<div align="center" class="box-footer">
							<button class="btn btn-primary" type="submit">Guardar</button>
							<button class="btn btn-danger" type="reset">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

			@if($usuario_perfil->logotipo!='N/A' && $usuario_perfil->logotipo!='')
			<div class="col-md-6">
				<div align="center"  class="col-lg-6 ">
					<img id="myImg" class="img-rounded img-responsive" alt="" src="{{asset('assets/img_comp/'.$usuario_perfil->logotipo)}}" width="150px" height="150px">
				</div>
				<div align="center"  class="col-lg-6 " style="margin-top:5%">
					<h3 class="title">Imagen seleccionada</h3>
				</div>
			</div>
			@endif
			
		</div>
	{!!Form::close()!!}
@endif








@if($usuario_tipo == "doc_particular")
	{!!Form::open(array( 'url'=>['profile',$usuario_perfil->id_doctor],'method'=>'PATCH','autocomplete'=>'off','files'=>'true'))!!}
	{{Form::token()}}
		<div class="row">

			<div class="col-md-6">
				<!-- general form elements -->
				<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Información General</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
					<div class="box-body">
						<div class="form-group">
							<label for="nombre">Nombre <font style="color:red">*</font></label>
							<input type="text" name="nombre" class="form-control" value="{{$usuario_perfil->nombre}}" placeholder="Nombre..." required>
						</div>
						<div class="form-group">
							<label for="nombre">Apellidos <font style="color:red">*</font></label>
							<input type="text" name="apellidos" class="form-control" value="{{$usuario_perfil->apellidos}}" placeholder="Apellidos">
						</div>

						<div class="form-group">
							<label for="telefono">Teléfono <font style="color:red">*</font></label>
							<input type="tel" name="telefono" class="form-control" value="{{$usuario_perfil->telefono}}" placeholder="Teléfono..."  minlength="10" maxlength="10"  pattern="[0-9]{10}">
						</div>

						<div class="form-group">
							<label for="nombre">Dirección <font style="color:red">*</font></label>
							<input type="text" name="direccion" class="form-control" value="{{$usuario_perfil->direccion}}" placeholder="Direccion">
						</div>

						<div class="form-group">
							<label>Especialidad</label>
							<select name="pid_especialidad" id="pid_especialidad" class="form-control selectpicker" data-live-search="true">
								@foreach($especialidad as $especialidad)
									<option value="{{$especialidad->id_especialidades}}_{{$especialidad->tipo}}_{{$especialidad->nombre}}">{{$especialidad->tipo}} - {{$especialidad->nombre}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
						</div>

						<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
							<thead style="background-color:#014AB6;color:white">
								<th>Eliminar</th>
								<th>Tipo</th>
								<th>Especialidad</th>
							</thead>
							<tbody>
							
							</tbody>
						</table>

					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="box box-success">

					<div class="box-header with-border">
						<h3 class="box-title"></h3>
					</div>

					<div class="box-body">
						

						<div class="form-group">
							<label for="nombre">Cédula <font style="color:red">*</font></label>
							<input type="text" name="cedula" class="form-control" value="{{$usuario_perfil->cedula}}" placeholder="Direccion">
						</div>
						<div class="form-group">
							<label for="nombre">Fecha de nacimiento<font style="color:red">*</font></label>
							<input type="date" name="fecha_nac" class="form-control" value="{{$usuario_perfil->fecha_nac}}" >
						</div>
						
						<div class="form-group">
							<label>Sexo <font style="color:red">*</font></label>
							<select name="sexo" class="form-control">
								@if($usuario_perfil->sexo == 'Hombre')
									<option value="Hombre" selected>Hombre</option>
									<option value="Mujer">Mujer</option>
								@else
									<option value="Hombre"> Hombre	</option>
									<option value="Mujer" selected>	 Mujer</option>
								@endif
							</select>
						</div>


						<div class="form-group">
							<label for="imagen">Foto</label>
							<input type="file" name="fotohash" class="form-control">
						</div>
						<div align="center" class="box-footer">
							<button class="btn btn-primary" type="submit">Guardar</button>
							<button class="btn btn-danger" type="reset">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

			@if($usuario_perfil->fotohash!='N/A' && $usuario_perfil->fotohash!='')
			<div class="col-md-6">
				<div align="center"  class="col-lg-6 ">
					<img id="myImg" class="img-rounded img-responsive" alt="" src="{{asset('assets/img_users/'.$usuario_perfil->fotohash)}}" width="150px" height="150px">
				</div>
				<div align="center"  class="col-lg-6 " style="margin-top:5%">
					<h3 class="title">Imagen seleccionada</h3>
				</div>
			</div>
			@endif
			
		</div>
	{!!Form::close()!!}
@endif


@if($usuario_tipo == "enfermera")
	{!!Form::open(array( 'url'=>['profile',$usuario_perfil->id_enfermera],'method'=>'PATCH','autocomplete'=>'off','files'=>'true'))!!}
	{{Form::token()}}
		<div class="row">

			<div class="col-md-6">
				<!-- general form elements -->
				<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Información General</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
					<div class="box-body">
						<div class="form-group">
							<label for="nombre">Nombre <font style="color:red">*</font></label>
							<input type="text" name="nombre" class="form-control" value="{{$usuario_perfil->nombre}}" placeholder="Nombre..." required>
						</div>
						<div class="form-group">
							<label for="nombre">Apellidos <font style="color:red">*</font></label>
							<input type="text" name="apellidos" class="form-control" value="{{$usuario_perfil->apellidos}}" placeholder="Apellidos">
						</div>

						<div class="form-group">
							<label>Sexo <font style="color:red">*</font></label>
							<select name="sexo" class="form-control">
								@if($usuario_perfil->sexo == 'Hombre')
									<option value="Hombre" selected>Hombre</option>
									<option value="Mujer">Mujer</option>
								@else
									<option value="Hombre"> Hombre	</option>
									<option value="Mujer" selected>	 Mujer</option>
								@endif
							</select>
						</div>

						<div class="form-group">
							<label for="telefono">Teléfono <font style="color:red">*</font></label>
							<input type="tel" name="telefono" class="form-control" value="{{$usuario_perfil->telefono}}" placeholder="Teléfono..."  minlength="10" maxlength="10"  pattern="[0-9]{10}">
						</div>

						<div class="form-group">
							<label for="nombre">Dirección <font style="color:red">*</font></label>
							<input type="text" name="direccion" class="form-control" value="{{$usuario_perfil->direccion}}" placeholder="Direccion">
						</div>

						<div class="form-group">
							<label>Escolaridad <font style="color:red">*</font></label>
							<select name="escolaridad" class="form-control">
								@if($usuario_perfil->escolaridad == 'Secundaria')
									<option value="Secundaria" selected>Secundaria</option>
									<option value="Preparatoria">Preparatoria</option>
								@else
									<option value="Secundaria"> Secundaria	</option>
									<option value="Preparatoria" selected>	 Preparatoria</option>
								@endif
							</select>
						</div>

					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="box box-success">

					<div class="box-header with-border">
						<h3 class="box-title"></h3>
					</div>

					<div class="box-body">

						<div class="form-group">
							<label for="nombre">Hora de entrada<font style="color:red">*</font></label>
							<input type="time" name="hora_entrada" class="form-control" value="{{$usuario_perfil->hora_entrada}}" >
						</div>

						<div class="form-group">
							<label for="nombre">Hora de salida<font style="color:red">*</font></label>
							<input type="time" name="hora_salida" class="form-control" value="{{$usuario_perfil->hora_salida}}" >
						</div>

						<div class="form-group">
							<label for="nombre">Fecha de nacimiento<font style="color:red">*</font></label>
							<input type="date" name="fecha_nac" class="form-control" value="{{$usuario_perfil->fecha_nac}}" >
						</div>

						<div class="form-group">
							<label for="imagen">Foto</label>
							<input type="file" name="fotohash" class="form-control">
						</div>
						<div align="center" class="box-footer">
							<button class="btn btn-primary" type="submit">Guardar</button>
							<button class="btn btn-danger" type="reset">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

			@if($usuario_perfil->fotohash!='N/A' && $usuario_perfil->fotohash!='')
			<div class="col-md-6">
				<div align="center"  class="col-lg-6 ">
					<img id="myImg" class="img-rounded img-responsive" alt="" src="{{asset('assets/img_users/'.$usuario_perfil->fotohash)}}" width="150px" height="150px">
				</div>
				<div align="center"  class="col-lg-6 " style="margin-top:5%">
					<h3 class="title">Imagen seleccionada</h3>
				</div>
			</div>
			@endif
			
		</div>
	{!!Form::close()!!}
@endif

@if($usuario_tipo == "asistente")
	{!!Form::open(array( 'url'=>['profile',$usuario_perfil->id_asistente],'method'=>'PATCH','autocomplete'=>'off','files'=>'true'))!!}
	{{Form::token()}}
		<div class="row">

			<div class="col-md-6">
				<!-- general form elements -->
				<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Información General</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
					<div class="box-body">
						<div class="form-group">
							<label for="nombre">Nombre <font style="color:red">*</font></label>
							<input type="text" name="nombre" class="form-control" value="{{$usuario_perfil->nombre}}" placeholder="Nombre..." required>
						</div>
						<div class="form-group">
							<label for="nombre">Apellidos <font style="color:red">*</font></label>
							<input type="text" name="apellidos" class="form-control" value="{{$usuario_perfil->apellidos}}" placeholder="Apellidos">
						</div>

						<div class="form-group">
							<label>Sexo <font style="color:red">*</font></label>
							<select name="sexo" class="form-control">
								@if($usuario_perfil->sexo == 'Hombre')
									<option value="Hombre" selected>Hombre</option>
									<option value="Mujer">Mujer</option>
								@else
									<option value="Hombre"> Hombre	</option>
									<option value="Mujer" selected>	 Mujer</option>
								@endif
							</select>
						</div>

						<div class="form-group">
							<label for="telefono">Teléfono <font style="color:red">*</font></label>
							<input type="tel" name="telefono" class="form-control" value="{{$usuario_perfil->telefono}}" placeholder="Teléfono..."  minlength="10" maxlength="10"  pattern="[0-9]{10}">
						</div>

						<div class="form-group">
							<label for="nombre">Dirección <font style="color:red">*</font></label>
							<input type="text" name="direccion" class="form-control" value="{{$usuario_perfil->direccion}}" placeholder="Direccion">
						</div>

						<div class="form-group">
							<label>Escolaridad <font style="color:red">*</font></label>
							<select name="escolaridad" class="form-control">
								@if($usuario_perfil->escolaridad == 'Secundaria')
									<option value="Secundaria" selected>Secundaria</option>
									<option value="Preparatoria">Preparatoria</option>
								@else
									<option value="Secundaria"> Secundaria	</option>
									<option value="Preparatoria" selected>	 Preparatoria</option>
								@endif
							</select>
						</div>

					</div>
				</div>
			</div>

			<div class="col-md-6">
				<div class="box box-success">

					<div class="box-header with-border">
						<h3 class="box-title"></h3>
					</div>

					<div class="box-body">

						<div class="form-group">
							<label for="nombre">Hora de entrada<font style="color:red">*</font></label>
							<input type="time" name="hora_entrada" class="form-control" value="{{$usuario_perfil->hora_entrada}}" >
						</div>

						<div class="form-group">
							<label for="nombre">Hora de salida<font style="color:red">*</font></label>
							<input type="time" name="hora_salida" class="form-control" value="{{$usuario_perfil->hora_salida}}" >
						</div>

						<div class="form-group">
							<label for="nombre">Fecha de nacimiento<font style="color:red">*</font></label>
							<input type="date" name="fecha_nac" class="form-control" value="{{$usuario_perfil->fecha_nac}}" >
						</div>

						<div class="form-group">
							<label for="imagen">Foto</label>
							<input type="file" name="fotohash" class="form-control">
						</div>
						<div align="center" class="box-footer">
							<button class="btn btn-primary" type="submit">Guardar</button>
							<button class="btn btn-danger" type="reset">Cancelar</button>
						</div>
					</div>
				</div>
			</div>

			@if($usuario_perfil->fotohash!='N/A' && $usuario_perfil->fotohash!='')
			<div class="col-md-6">
				<div align="center"  class="col-lg-6 ">
					<img id="myImg" class="img-rounded img-responsive" alt="" src="{{asset('assets/img_users/'.$usuario_perfil->fotohash)}}" width="150px" height="150px">
				</div>
				<div align="center"  class="col-lg-6 " style="margin-top:5%">
					<h3 class="title">Imagen seleccionada</h3>
				</div>
			</div>
			@endif
			
		</div>
	{!!Form::close()!!}
@endif

@push('scripts')
	<script>
		$(document).ready(function(){
			$('#bt_add').click(function(){
				agregar();
			});
		});

		var cont=0;
		
		function agregar(){
			datosEspecialidad = document.getElementById('pid_especialidad').value.split('_');
			var id_especialidad	=  datosEspecialidad[0];
			var tipo 			=  datosEspecialidad[1];
			var especialidad	=  datosEspecialidad[2];

			console.log("id_especialidad -> "+id_especialidad);
			console.log("tipo -> "+tipo);
			console.log("especialidad -> "+especialidad);

			var fila = "<tr class='selected' id='fila"+cont+"'>"+
							"<td><button type='button' class='btn btn-warning' onclick='eliminar("+cont+")'>X</button></td>"+
							"<td>"+
								"<input type='hidden' name='id_especialidad[]'  value='"+id_especialidad+"' >"+tipo+
							"<td>"+especialidad+"</td>"+
						"</tr>";
			cont = cont+1;
			$("#detalles").append(fila);	
		}

		function eliminar(index){
			$("#fila" + index).remove();
		}

	</script>
@endpush


<div id="myModal" class="modal1">	
	<!-- The Close Button -->
	<span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

	<!-- Modal Content (The Image) -->
	<img class="modal-content1" id="img01">

	<!-- Modal Caption (Image Text) -->
	<div id="caption"></div>
</div>

<script>
	// Get the modal
	var modal = document.getElementById('myModal');

	// Get the image and insert it inside the modal - use its "alt" text as a caption
	var img = document.getElementById('myImg');
	var modalImg = document.getElementById("img01");
	var captionText = document.getElementById("caption");
	img.onclick = function(){
		modal.style.display = "block";
		modalImg.src = this.src;
		captionText.innerHTML = this.alt;
	}

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() { 
		modal.style.display = "none";
	}
</script>

@endsection