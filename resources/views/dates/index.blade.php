@extends ('layouts.admin')
@section('barra')
	@include('dates.forms.barra')
@endsection
@section ('contenido')
  <div class="row">
    <div class="colg-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Listado de Pacientes</h3>
    </div>
      <div class="panel-body">
          @include('pacients.search')
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
                        <th>CURP</th>
                        <th>Acción</th>
                    </thead>
                    @foreach ($pacients as $pacient)
                        <tr>
                            <td>{{ $pacient->id}}</td>
                            <td>{{ $pacient->nombre}}</td>
                            <td>{{ $pacient->apaterno}}</td>
                            <td>{{ $pacient->amaterno}}</td>
                            <td>{{ $pacient->curp}}</td>
                            <td>{!!link_to_route('asignar_cita_paciente', $title = 'Consulta', $parameters = $pacient->id,
          $attributes = ['class'=>'btn btn-info','style'=>"color:#FFFFFF"])!!}</td>
                        </tr>
                    @include('pacients.modal')
                    @endforeach
                </table>
            </div>
            {{$pacients->render()}}
        </div>
    </div>
@endsection
