@extends ('layouts.admin')
@section('barra')
  @include('Estudios.forms.barra')
@endsection
@section ('contenido')

  <div class="row">
    <div class="colg-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Listado de estudios agregados</h3>
    </div>
      <div class="panel-body">
          @include('Estudios.forms.searchEstudio')
      </div>
  </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="table-responsive">
              <table class="table table-striped table-bordered table-condensed table-hover">
                  <thead>
                      <th>ID</th>
                      <th>Estudio</th>
                      <th>Folio</th>
					  <th>Propósito</th>
					  <th>Metodología</th>
                      <th>Acción</th>
                  </thead>
                  @foreach ($studies as $study)
                      <tr>
                        <td><?php echo $study->id; ?></td>
                        <td><?php echo $study->nombre; ?></td>
                        <td><?php echo $study->folio; ?></td>
						<td><?php echo $study->proposito; ?></td>
						<td><?php echo $study->metodologia; ?></td>
                        <td>
                          {!!Form::model($study,['route'=>['destroyEstudio', $study->id],'method'=>'DELETE'])!!}
                          <button type="submit" onclick="return confirm('¿Realmente desea eliminar estudio?')"
                          class="btn btn-danger btn-sm">Eliminar Estudio</button>{{Form::Close()}}
                        </td>
                      </tr>
                  @endforeach
              </table>
          </div>
        </div>
    </div>
@endsection
