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

<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="box box-primary">
        <div class="box-body box-profile">
            @if($usuario_perfil->fotohash != "N/A" && $usuario_perfil->fotohash != "")
                <img class="img-rounded" id="myImg" alt="Usuario: {{$usuario_perfil->nombre}}" src="{{asset('assets/img_users/'.$usuario_perfil->fotohash)}}" style="width:223px">
            @else
                <img class="profile-user-img img-responsive img-rounded " alt="User profile picture" src="{{asset('assets/img_predeterminadas/hombre.png')}}" style="border-style:none">
            @endif
            <h2 class="profile-username text-center" style="color:#001453">{{$usuario_perfil->nombre}} </h2>

            <ul class="list-group list-group-unbordered">

                <li class="list-group-item">
                    <b>Tipo de usuario</b> 
                    <a class="pull-right"><span class="label label-success">Asistente</span></a>
                </li>

                <li class="list-group-item">
                    <div align="center">
						<a href="{{URL::action('ProfileController@edit',$usuario_perfil->id_asistente)}}">
							<button type="button" class="btn btn-primary">&nbsp;&nbsp;&nbsp; Editar Perfil &nbsp;&nbsp;&nbsp;</button><br><br>
						</a>                        
                    </div>
                </li>
            
            </ul>
        </div>
        <!-- /.box-body -->
        </div>
    </div>
    <div class="col-md-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Información específica</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

				<strong><i class="fa fa-user margin-r-5"></i> Nombre</strong>
                <p class="text-muted">{{$usuario_perfil->nombre}}</p>
                <hr>

                <strong><i class="fa fa-user margin-r-5"></i> Apellidos</strong>
                <p class="text-muted">{{$usuario_perfil->apellidos}}</p>
                <hr>

                <strong><i class="fa fa-user margin-r-5"></i> Sexo</strong>
                <p class="text-muted">{{$usuario_perfil->sexo}}</p>
                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Dirección</strong>
                <p class="text-muted">{{$usuario_perfil->direccion}}</p>
                <hr>

                <strong><i class="fa fa-phone margin-r-5"></i> Teléfono</strong>
                <p class="text-muted">{{$usuario_perfil->telefono}}</p>
                <hr>

                <strong><i class="fa fa-phone margin-r-5"></i> Escolaridad</strong>
                <p class="text-muted">{{$usuario_perfil->escolaridad}}</p>
                <hr>

                <strong><i class="fa fa-clock-o margin-r-5"></i> Hora de entrada</strong>
                <p class="text-muted">{{$usuario_perfil->hora_entrada}}</p>
				<hr>

				<strong><i class="fa fa-clock-o margin-r-5"></i> Hora de salida</strong>
                <p class="text-muted">{{$usuario_perfil->hora_salida}}</p>
				<hr>

				<strong><i class="fa fa-clock-o margin-r-5"></i> Fecha de nacimiento</strong>
                <p class="text-muted">{{$usuario_perfil->fecha_nac}}</p>
				<hr>

                <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
                <p class="text-muted"> {!!Auth::user()->email!!}</p>
                <hr>

                <strong><i class="fa fa-calendar margin-r-5"></i> Fecha de registro</strong>
                <p class="text-muted"> {!!Auth::user()->created_at!!}</p>
                <hr>

				<strong><i class="fa fa-calendar margin-r-5"></i> Médicos asignados</strong>
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th>Nombre</th>
							<th>Apellidos</th>
						</thead>

					</table>
				</div>

            </div>
        <!-- /.box-body -->
        </div>
    </div>
</div>

<div id="myModal" class="modal1">
  <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
  <img class="modal-content1" id="img01">
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