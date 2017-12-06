<style>
	.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-style: none; }
.nav-stacked > li + li {
    margin-top: 0px;
}
.nav-tabs > li > a {
    /*padding: 10px 50px 10px 50px !important;
    color: white;
    background-color: #001453;*/
	color: red;
    background-color: #014AB6;
    border-style: none;
    margin: 0;
}
	
.nav-tabs > li > a > p {
	color: white;
}

.nav-tabs > li > a:hover, .nav-tabs > li > a:focus {
    background-color: #448AFF; 
/*    color: #FFFFFF;*/
	color: black;
    z-index: 99;
    transition: all 0.5s ease 0s;
	border-style:none;
}

.nav-tabs > li > a:hover > p, .nav-tabs > li > a:focus > p {
    color: black;
}

.nav-tabs > li.active > a {
   color: #FFFFFF;
   background-color: white;
   z-index: 100;
}
	
.nav-tabs > li.active > a > p {
	color:black;
}
	
.nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
   color: #FFFFFF;
   background-color: white;   
   border-color:white;
   transition: all 0.5s ease 0s;
}
	
.nav-tabs > li.active > a:hover > p, .nav-tabs > li.active > a:focus > p  {
   color: black;
}
	
#snackbar {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 80%;
    bottom: 30px;
    font-size: 17px;
}

#snackbar.show {
    visibility: visible;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;} 
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;} 
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}
</style>

@extends ('layouts.admin')
@section('barra')
	@include('pacients.forms.barra')
@endsection
@section ('contenido')

<h3>Nuevo Paciente</h3>
@if (count($errors)>0)
	<div class="alert alert-danger">
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
		</ul>
	</div>
@endif

<div class="row">
		<div class="col col-sm-3">
				<ul class="nav nav-tabs nav-stacked text-center" role="tablist">
					<li role="presentation" class="active"><a href="#tab1" data-toggle="tab"> <p>Datos demográficos</p> </a></li>
					@if(Auth::user()->tipo == 'doc_particular' || Auth::user()->tipo == 'doc_clinica' || Auth::user()->tipo == 'clinica')
					<li role="presentation"><a href="#tab2" data-toggle="tab" > <p>Antecedentes - heredo familiares 				</p></a></li>
					<li role="presentation"><a href="#tab3" data-toggle="tab" > <p>Antecedentes - patológicos 						</p></a></li>
					<li role="presentation"><a href="#tab4" data-toggle="tab" > <p>Antecedentes - no patológicos 					</p></a></li>
					<li role="presentation"><a href="#tab5" data-toggle="tab" > <p>Antecedentes gineco - obstétricos 				</p></a></li>
					<li role="presentation"><a href="#tab6" data-toggle="tab" > <p>Interrogatorio por aparatos y sistemas 	 		</p></a></li>
					<li role="presentation"><a href="#tab7" data-toggle="tab" > <p>Síntomas generales						 		</p></a></li>
					<li role="presentation"><a href="#tab8" data-toggle="tab" > <p>Padecimiento actual						 		</p></a></li>
					@endif
					<li role="presentation"><a href="#tab9" data-toggle="tab" > <p>Somatometría						 				</p></a></li>
					@if(Auth::user()->tipo == 'doc_particular' || Auth::user()->tipo == 'doc_clinica' || Auth::user()->tipo == 'clinica')
					<li role="presentation"><a href="#tab10" data-toggle="tab" > <p>Inspección general						 		</p></a></li>
					<li role="presentation"><a href="#tab11" data-toggle="tab"> <p>Exploración física						 		</p></a></li>
					@endif
				</ul>			
			</div>
<form id="formulario_paciente" novalidate>
	{{Form::token()}}
	<div class="tab-content col-sm-9">
		<div class="tab-pane active"  id="tab1">
			@include('pacients.forms.pacient')
			<div id="snackbar">Paciente registrado..</div>
			<button onclick="myFunction()">Show Snackbar</button>
			<input type="hidden" id="id_paciente" name="id_paciente"/>
			<div align="center">
				<br>
				<a 	class="btn btn-primary  btn-lg btnNext" onclick="saveDemograficos()">
					Siguiente
				</a>
				
			</div>
		</div>
		<div class="tab-pane" id="tab2">
			@include('pacients.forms.antecedentes_hf')
			<div class="row">
				<br>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
					<a class="btn btn-primary  btn-lg btnPrevious">
						Anterior
					</a>
					<a class="btn btn-primary  btn-lg btnNext">
						Siguiente
					</a>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="tab3">
			@include('pacients.forms.antecedentes_pp')

			<div class="row">
				<br>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
					<a 	class="btn btn-primary btn-lg btnPrevious">
						Anterior
					</a>
					<a 	class="btn btn-primary btn-lg  btnNext">
						Siguiente
					</a>
				</div>
			</div>
		</div>
		<div class="tab-pane" id="tab4">
			@include('pacients.forms.antecedentes_pnp')
			<div class="row">
				<br>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
					<a 	class="btn btn-primary btn-lg btnPrevious">
						Anterior
					</a>
					<a 	class="btn btn-primary btn-lg  btnNext">
						Siguiente
					</a>
				</div>
			</div>
		</div>

		<div class="tab-pane" id="tab5">
			@include('pacients.forms.antecedentes_go')
			<div class="row">
				<br>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
					<a 	class="btn btn-primary btn-lg btnPrevious">
						Anterior
					</a>
					<a 	class="btn btn-primary btn-lg  btnNext">
						Siguiente
					</a>
				</div>
			</div>
		</div>
		
		<div class="tab-pane" id="tab6">
			@include('pacients.forms.antecedentes_exploracionAPySis')

			<div class="row">
				<br>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
					<a 	class="btn btn-primary btn-lg btnPrevious">
						Anterior
					</a>
					<a 	class="btn btn-primary btn-lg  btnNext">
						Siguiente
					</a>
				</div>
			</div>
		</div>
		
		<div class="tab-pane" id="tab7">
			@include('pacients.forms.antecedenes_sintomasGenerales')

			<div class="row">
				<br>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
					<a 	class="btn btn-primary btn-lg btnPrevious">
						Anterior
					</a>
					<a 	class="btn btn-primary btn-lg  btnNext">
						Siguiente
					</a>
				</div>
			</div>
		</div>
		
		<div class="tab-pane" id="tab8">
			@include('pacients.forms.antecedentes_padecimientoActual')

			<div class="row">
				<br>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
					<a 	class="btn btn-primary btn-lg btnPrevious">
						Anterior
					</a>
					<a 	class="btn btn-primary btn-lg  btnNext">
						Siguiente
					</a>
				</div>
			</div>
		</div>
		
		<div class="tab-pane" id="tab9">
			@include('pacients.forms.antecedentes_somasometria')
			<div class="row">
				<br>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
					<a 	class="btn btn-primary btn-lg btnPrevious">
						Anterior
					</a>
					<a 	class="btn btn-primary btn-lg  btnNext">
						Siguiente
					</a>
				</div>
			</div>
		</div>

		<div class="tab-pane" id="tab10">
			@include('pacients.forms.antecedentes_exploracionGeneral')

			<div class="row">
				<br>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" align="center">
					<a 	class="btn btn-primary btn-lg btnPrevious">
						Anterior
					</a>
					<a 	class="btn btn-primary btn-lg  btnNext">
						Siguiente
					</a>
				</div>
			</div>
		</div>


		<div class="tab-pane" id="tab11">
			@include('pacients.forms.antecedentes_exploracionRegional')

			<div class="form-group" align="center">
				<br>
				<a class="btn btn-primary btn-lg btnPrevious">Anterior</a>
				<button class="btn btn-primary 	btn-lg" type="submit" data-bind="click: $root.submit">Guardar</button>
				<button class="btn btn-danger 	btn-lg" type="reset">Cancelar</button>
			</div>
		</div>

		

	</div>
</form>



@push('scripts')
	<script>
		
		$('.btnNext').click(function(){
			$('.nav-tabs > .active').next('li').find('a').trigger('click');
		});

		$('.btnPrevious').click(function(){
			$('.nav-tabs > .active').prev('li').find('a').trigger('click');
		});
		
		
		var sexo_pacient = "H";

		function selectSexo(sel){
			sexo_pacient = sel.value;
			if(sexo_pacient == "F" ){
				document.getElementById('antecedentes_go').style.display 		= 'block';
				document.getElementById('antecedentes_go_noaply').style.display = 'none';
			}else{
				document.getElementById('antecedentes_go').style.display 		= 'none';
				document.getElementById('antecedentes_go_noaply').style.display = 'block';
			}
		}
		
		function myFunction() {
			var x = document.getElementById("snackbar")
			x.className = "show";
			setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
		}
		
		function saveDemograficos(){
			var nombre				= document.getElementById('nombre').value,
				apaterno 			= document.getElementById('apaterno').value,
				amaterno 			= document.getElementById('amaterno').value,
				fecha_nac 			= document.getElementById('fecha_nac').value,
				curp 				= document.getElementById('curp').value,
				estadocivil 		= document.getElementById('estadocivil').value,
				sexo 				= $( "#sexo option:selected" )			.val(),
				nacionalidad 		= $( "#nacionalidad option:selected" )	.val(),
				state 				= $( "#state option:selected" )			.val(),
				town 				= $( "#town option:selected" )			.val(),
				locality 			= $( "#locality option:selected" )		.val(),
				cp 					= document.getElementById('cp').value,
				colonia 			= document.getElementById('colonia').value,
				calle 				= document.getElementById('calle').value,
				num_ext 			= document.getElementById('num_ext').value,
				num_int 			= document.getElementById('num_int').value,
				telefono_casa 		= document.getElementById('telefono_casa').value,
				telefono_celular 	= document.getElementById('telefono_celular').value,
				telefono_oficina 	= document.getElementById('telefono_oficina').value,
				correo 				= document.getElementById('correo').value;
			var objeto = {
				"nombre"			: nombre,
				"apaterno" 			: apaterno,
				"amaterno" 			: amaterno,
				"fecha_nac" 		: fecha_nac,
				"curp" 				: curp,
				"estadocivil" 		: estadocivil,
				"sexo" 				: sexo,
				"nacionalidad" 		: nacionalidad,
				"state" 			: state,
				"town" 				: town,
				"locality" 			: locality,
				"cp" 				: cp,
				"colonia" 			: colonia,
				"calle" 			: calle,
				"num_ext" 			: num_ext,
				"num_int" 			: num_int,
				"telefono_casa" 	: telefono_casa,
				"telefono_celular" 	: telefono_celular,
				"telefono_oficina" 	: telefono_oficina,
				"correo" 			: correo,
			};
			
			
			if(objeto.nombre 	&& objeto.apaterno 		&& objeto.amaterno 		&& 
			   objeto.fecha_nac && objeto.estadocivil 	&& objeto.sexo 			&& 
			   objeto.colonia 	&& objeto.calle 		&& objeto.num_ext){

				bootbox.confirm({
					message: "Confirme para registrar nuevo paciente",
					buttons: {
						confirm: {
							label: 'Aceptar',
							className: 'btn-primary'
						},
						cancel: {
							label: 'Cancelar'
						}
					},callback: function (result) {
						if (result==true) {
							var url = "addPacient"; // El script a dónde se realizará la petición.
							$.ajax({
								type: "POST",
								url: url,
								data: $("#formulario_paciente").serialize(), // Adjuntar los campos del formulario enviado.
								success: function(response){
									document.getElementById("id_paciente").value = response.id_paciente;
									var x = document.getElementById("snackbar")
									x.className = "show";
									setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
								},error:function(error){
									dialog.find('.bootbox-body').html(response);
									alert("Ups! Ocurrio un error, intentalo de nuevo");
								}
							});
						}
					}
				})
				
				
			}else{
				setTimeout(function(){
					$('.nav-tabs > .active').prev('li').find('a').trigger('click');
				},1000);
				
				bootbox.alert("Te hacen falta campos por completar<br><br>Campos necesarios: Texto <font style='color:red'>*</font>");
			}
		}
	</script>
@endpush

@endsection
@section('js')
	{!!Html::script('js/pacientes.js')!!}
	{!!Html::script('js/bootbox.min.js')!!}
@stop