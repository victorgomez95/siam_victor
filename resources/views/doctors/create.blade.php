@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Doctor</h3>
		{!!Form::open(['route'=>'doctor.store', 'method'=>'POST','files' => true])!!}
		 	@include('doctors.forms.doctor')
	 		{!!Form::submit('Registrar',['class'=>'btn btn-success'])!!}
 		{!!Form::close()!!}
		</div>
	</div>
@endsection
