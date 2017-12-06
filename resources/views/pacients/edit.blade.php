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
</style>

@extends ('layouts.admin')
@section('barra')
	@include('pacients.forms.barra')
@endsection
@section ('contenido')

<h3>Actualizar Paciente</h3>
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
	
	<!--<form id="formulario_paciente" novalidate>-->
	{!!Form::model($pacient,['route'=>['pacient.update',$pacient->id],'method'=>'PUT','novalidate' => 'novalidate'])!!}
	<!--{!!Form::open(array('url'=>'pacient/actualizarPaciente','method'=>'POST','novalidate' => 'novalidate'))!!}-->
	{{Form::token()}}
		
	<div class="tab-content col-sm-9">
		<div class="tab-pane active"  id="tab1">
        	@include('pacients.update.antecedentes_generales')
			<input type="hidden" id="id_paciente" name="id_paciente"/>
			<div align="center">
				<br>
				<a 	class="btn btn-primary  btn-lg btnNext" >
					Siguiente
				</a>
				
			</div>
		</div>
		<div class="tab-pane" id="tab2">
			@include('pacients.update.antecedentes_hf')
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
			@include('pacients.update.antecedentes_pp')

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
			@include('pacients.update.antecedentes_pnp')
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
			@include('pacients.update.antecedentes_go')
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
			@include('pacients.update.antecedentes_exploracionAPySis')

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
			@include('pacients.update.antecedenes_sintomasGenerales')

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
			@include('pacients.update.antecedentes_padecimientoActual')

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
			@include('pacients.update.antecedentes_somasometria')
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
			@include('pacients.update.antecedentes_exploracionGeneral')

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
			@include('pacients.update.antecedentes_exploracionRegional')

			<div class="form-group" align="center">
				<br>
				<a class="btn btn-primary btn-lg btnPrevious">Anterior</a>
				<button class="btn btn-primary 	btn-lg" type="submit">Guardar</button>
				<a class="btn btn-danger 	btn-lg">Cancelar</a>
			</div>
		</div>
	</div>
	
	{{ Form::close() }}



	<script>
	function actualizar() {
		var url = "http://expediente.com.100-104-62-25.merkanet.mx/pacient/update"; // El script a dónde se realizará la petición.
		$.ajax({
             type: "PUT",
             url: url,
             data: $("#formulario_paciente").serialize(), // Adjuntar los campos del formulario enviado.
             success: function(response)
             {
               dialog.init(function(){
                   setTimeout(function(){
                       dialog.find('.bootbox-body').html(response);
                   }, 2500);
               });
               bootbox.confirm({
                 message: "¿Desea crear documento PDF del registro del paciente?",
                 buttons: {
                     confirm: {
                         label: 'Si',
                         className: 'btn-primary'
                     },
                     cancel: {
                         label: 'No'
                     }
                 },
                 callback: function (result) {
                   if (result==true) {
                   bootbox.prompt({
                     title: "Elija los apartados que quiere ver en el documento PDF",
                     inputType: 'checkbox',
                     inputOptions: [
                         {
                             text: 'Datos demográficos',
                             value: '1',
                         },
                         {
                             text: 'Antecedentes herdo-familiares',
                             value: '2',
                         },
                         {
                             text: 'Antecedentes personales patológicos',
                             value: '3',
                         },
                         {
                             text: 'Antecedentes personales no patológicos',
                             value: '4',
                         },
                         {
                             text: 'Antecedentes gineco-obstétricos',
                             value: '5',
                         },
                         {
                             text: 'Inspección general',
                             value: '6',
                         },
                         {
                             text: 'Interrogatorio por aparatos y sistemas',
                             value: '7',
                         },
                         {
                             text: 'Padecimiento actual',
                             value: '8',
                         },
                         {
                             text: 'Síntomas generales',
                             value: '9',
                         },
                         {
                             text: 'Exploración física',
                             value: '10',
                         },
                         {
                             text: 'Somatometría',
                             value: '11',
                         }
                       ],
                       callback: function (result) {
                           document.location.href = 'pdf/'+result+"";
                       }
                    });
                  }
                  else {
                    var dialog2 = bootbox.dialog({
                        message: '<p><i class="fa fa-spin fa-spinner"></i> Espere...</p>'
                    });
                    dialog2.init(function(){
                        setTimeout(function(){
                            dialog.find('.bootbox-body').html("Hecho");
                        }, 1000);
                    });
                  }
                 }
               });
			}
		});
	}
	</script>

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
		
	</script>
@endpush

@endsection
@section('js')
	{!!Html::script('js/pacientes.js')!!}
	{!!Html::script('js/bootbox.min.js')!!}
@stop
