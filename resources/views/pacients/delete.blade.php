@extends ('layouts.admin')
@section('barra')
	@include('pacients.forms.barra')
@endsection
@section ('contenido')
  <div class="row">
    <div class="colg-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Eliminar Pacientes</h3>
    </div>
      <div class="panel-body">
          @include('pacients.search')
      </div>
  </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background:#004D40;color:white">
                        <th><h5>&nbsp;Nombre 			</h5></th>
                        <th><h5>&nbsp;Primer apellido	</h5></th>
                        <th><h5>&nbsp;Segundo apellido	</h5></th>
                        <th><h5>&nbsp;CURP				</h5></th>
                        <th colspan="2"><h5>&nbsp;Acciones</h5></th>
                    </thead>
                    @foreach ($pacientes as $pacient)
                        <tr>
                            <td>{{ $pacient->nombre}}</td>
                            <td>{{ $pacient->apaterno}}</td>
                            <td>{{ $pacient->amaterno}}</td>
                            <td>{{ $pacient->curp}}</td>
                            <td>
								<div align="center">
									<button  type="button" value="<?php  echo $pacient->id?>" Onclick="mostrar($pacient);" 										class="btn btn-primary btn-sm" data-toggle='modal' data-target='#myModal'>Exhibir detalles</button>
								</div>
                            </td>
							<td>
								{!!Form::model($pacient,['route'=>['pacient.destroy',$pacient->id],'method'=>'DELETE'])!!}
								<div align="center">
								<button type="submit" onclick="return confirm('¿Realmente desea eliminar Paciente?')" class="btn 								 btn-danger btn-sm">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eliminar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
								</div>

							</td>
                        </tr>
                    @include('pacients.modal')
                    @endforeach
                </table>
            </div>
            {{$pacientes->render()}}
        </div>
    </div>
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      
			  <div class="modal-header" style="background:#001453;color:white">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Detalle de paciente</h4>
		      </div>
		      <div class="modal-body">
		        @include('pacients.forms.pacient_modal')
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
		      </div>
		    </div>
		  </div>
		</div>
@endsection
@section('js')
	{!!Html::script('js/popup.js')!!}
@stop
