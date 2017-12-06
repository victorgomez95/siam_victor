@extends ('layouts.admin')
@section('barra')
	@include('nurseSheets.forms.barra')
@endsection
@section ('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Pacientes</h3>
            @include('pacients.search')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background:#004D40;color:white">
                        <th> <h5>&nbsp;Nombre           </h5></th>
                        <th> <h5>&nbsp;Primer apellido  </h5></th>
                        <th> <h5>&nbsp;Segundo apellido </h5></th>
                        <th> <div align="center"> <h5>CURP   </h5> </div> </th> 
                        <th> <div align="center"> <h5>Acción </h5> </div> </th>
                    </thead>
                    @foreach ($pacientes as $usu)
                        <tr>
                            <td>&nbsp;{{ $usu->nombre}}   </td>
                            <td>&nbsp;{{ $usu->apaterno}} </td>
                            <td>&nbsp;{{ $usu->amaterno}} </td>
                            <td> <div align="center">{{ $usu->curp}} </div> </td>
                            <td>
                                <div align="center">
                                    {!!link_to_route('asignar_hde', $title = 'HDE', $parameters = $usu->id,
                                    $attributes = ['class'=>'btn btn-success','style'=>"color:#FFFFFF"])!!}
                                </div>
                            </td>
                        </tr>
                    @include('nurseSheets.modal')
                    @endforeach
                </table>
            </div>
            {{$pacientes->render()}}
        </div>
    </div>
@endsection

