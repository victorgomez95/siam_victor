@extends ('layouts.admin')
@section('barra')
  @include('Estudios.forms.barra')
@endsection
@section ('contenido')

  <div class="row">
    <div class="colg-lg-8 col-md-8 col-sm-8 col-xs-12">
      <h3>Listado de enlaces hechos</h3>
    </div>
      <div class="panel-body">
          @include('Estudios.forms.search')
      </div>
  </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="table-responsive">
              <table class="table table-striped table-bordered table-condensed table-hover">
                  <thead>
                      <th>ID</th>
                      <th>Diagnóstico</th>
                      <th>Estudio</th>
                      <th>Propósito</th>
                      <th>Metodología</th>
                      <th>Acción</th>
                  </thead>
                  @foreach ($matches as $match)
                  <?php
                    $mysqli = new mysqli("localhost", "siam", "Yuo*q289", "expediente_siam");
                    if ($mysqli->connect_errno) {
                        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                    }
                    $acentos = $mysqli->query("SET NAMES 'utf8'");
                    $id_diagnostico = $match->id_enfermedad;
                    $id_estudio = $match->id_estudio;

                    $query = $mysqli->query("select * from diagnosticos where id='$id_diagnostico'");
                    $fila = $query->fetch_assoc();
                    $enfermedad = $fila['nombre'];

                    $query2 = $mysqli->query("select * from studies where id='$id_estudio'");
                    $fila2 = $query2->fetch_assoc();
                    $estudio= $fila2['nombre'];
                  ?>
                      <tr>
                        <td><?php echo $match->id; ?></td>
                        <td><?php echo $enfermedad; ?></td>
                        <td><?php echo $estudio; ?></td>
                        <td><?php echo $match->proposito; ?></td>
                        <td><?php echo $match->metodologia; ?></td>
                        <td>
                          {!!Form::model($match,['route'=>['study.destroy', $match->id],'method'=>'DELETE'])!!}
                          <button type="submit" onclick="return confirm('¿Realmente desea eliminar enlace?')"
                          class="btn btn-danger btn-sm">Eliminar Enlace</button>{{Form::Close()}}
                        </td>
                      </tr>
                  @endforeach
              </table>
          </div>
        </div>
    </div>
@endsection
