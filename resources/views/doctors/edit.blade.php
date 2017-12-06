@extends ('layouts.admin')
@section ('contenido')
 <div class="container">
 {!!Form::model($doctor,['route'=>['doctor.update',$doctor->id],'method'=>'PUT'])!!}
   <div class="row">
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
       @include('doctors.forms.doctor')
       <button  type="submit" onclick="return confirm('¿Guardar cambios en el registro?')"
       class="btn btn-primary">Modificar</button>
     </div>
   </div>
  {!!Form::close()!!}
</div>
@stop
