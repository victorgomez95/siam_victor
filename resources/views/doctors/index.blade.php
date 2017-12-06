@extends ('layouts.admin')
@section ('contenido')
  <div class="row">
    <div class="colg-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Listado de Doctores</h3>
      <a href="doctor/create"><button class="btn btn-success">Nuevo doctor</button></a>
    </div>
      <div class="panel-body">
          @include('doctors.search')
      </div>
  </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Primer apellido</th>
                        <th>Segundo apellido</th>
                        <th>Teléfonos</th>
                        <th>Acción</th>
                    </thead>
                    @foreach ($doctors as $doctor)
                        <tr>
                            <td>{{ $doctor->id}}</td>
                            <td>{{ $doctor->nombre}}</td>
                            <td>{{ $doctor->apaterno}}</td>
                            <td>{{ $doctor->amaterno}}</td>
                            <td>{{'Casa: '.$doctor->telefono_casa.' ,Celular: '.$doctor->telefono_celular.',Oficina: '.$doctor->telefono_oficina}}</td>
                            <td>
                                <a href="{{URL::action('DoctorController@edit',$doctor->id)}}"><button class="btn btn-info">Editar</button></a>
                                <td>{!!Form::model($doctor,['route'=>['doctor.destroy',$doctor->id],'method'=>'DELETE'])!!}
           <button type="submit" onclick="return confirm('¿Realmente desea eliminar el registro?')" class="btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    @include('doctors.modal')
                    @endforeach
                </table>
            </div>
            {{$doctors->render()}}
        </div>
    </div>
@endsection
