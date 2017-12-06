@extends ('layouts.admin')
@section ('contenido')

@if($tipo_vista == "clinica")
    <section class="content-header">
        <h1>
        Listado de usuarios <a href="asistente/create"><button class="btn btn-success">Nuevo</button></a>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Colaboladores</li>
        </ol>
        <br><br>
    </section>

    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-8 col-xs-6">
            @include('personal.asistente.search')
            <h4>Criterios de busqueda: 
                <span class="label label-info">Email     </span> &nbsp;
            </h4>
            <br>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-condensed table-hover">
                    <thead style="background:black;color:white">
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Hora de entrada</th>
                        <th>Hora de salida</th>
                        <th style="text-align:center">Opciones</th>
                    </thead>
                    @foreach ($asistente as $enf) 
                        <tr>
                            <td style="text-align:center">
                                @if($enf->fotohash!='N/A' && $enf->fotohash!='')
                                    <img alt="Imagen de usuario" class="img-rounded" src="{{asset('assets/img_users/'.$enf->fotohash)}}" style="width:50px">
                                @elseif ($enf->sexo=='Hombre')
                                    <img alt="User Avatar" class="img-circle" src="{{asset('assets/img_predeterminadas/hombre.png')}}"   style="width:50px">
                                @else
                                    <img alt="User Avatar" class="img-circle" src="{{asset('assets/img_predeterminadas/mujer.png')}}"    style="width:50px">
                                @endif
                            </td>
                            <td>{{ $enf->nombre}}          </td>
                            <td>{{ $enf->apellidos}}       </td>
                            <td>{{ $enf->telefono}}        </td>
                            <td>{{ $enf->direccion}}       </td>
                            <td>{{ $enf->hora_entrada}}    </td>
                            <td>{{ $enf->hora_salida}}     </td>
                            <td style="text-align:center">
                                <a href="" data-target="#modal-delete-{{$enf->id_asistente}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-pencil"></i>&nbsp;Eliminar</button></a>
                                <a href="{{URL::action('AsistenteController@edit',$enf->id_asistente)}}"><button class="btn btn-info">&nbsp;&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;Editar&nbsp;&nbsp;</button></a>
                                <a href="{{URL::action('AsistenteController@show',$enf->id_asistente)}}"><button class="btn btn-secondary">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-eye"></i>&nbsp;Ver&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></a>
                            </td>
                        </tr>
                        @include('personal.asistente.modal')
                    @endforeach
                </table>
                
            </div>
            {{$asistente->render()}}
        </div>
    </div>
@endif



@if($tipo_vista == "doc_particular")
    <style>
        .user-row {
            margin-bottom: 14px;
        }
        .user-row:last-child {
            margin-bottom: 0;
        }
        .dropdown-user {
            margin: 13px 0;
            padding: 5px;
            height: 100%;
        }
        .dropdown-user:hover {
            cursor: pointer;
        }
        .table-user-information > tbody > tr {
            border-top: 1px solid rgb(221, 221, 221);
        }
        .table-user-information > tbody > tr:first-child {
            border-top: 0;
        }
        .table-user-information > tbody > tr > td {
            border-top: 0;
        }
        .toppad{
            margin-top:20px;
        }
    </style>
    @if($count==0)
        <br><br><br><br>
        <div align="center">
            <a href="asistente/create"><button class="btn btn-primary">Agregar Asistente</button></a>
        </div>
        <br><br><br><br>
    @endif
    @if($count>0)
      @foreach ($asistente as $enf) 
      <div class="toppad" >
         <div class="panel panel-info">
            <div class="panel-heading">
               <h3 class="panel-title">Asistente registrada</h3>
            </div>
            <div class="panel-body">
               <div class="row">
                     @if($enf->fotohash!='N/A' && $enf->fotohash!='')
                        <div class="col-md-3 col-lg-3 " align="center">
                            <img alt="User Pic" src="{{asset('assets/img_users/'.$enf->fotohash)}}" class=" img-responsive" style="width:200px">
                        </div>
                        
                    @elseif ($enf->sexo=='Hombre')
                        <div class="col-md-3 col-lg-3 " align="center">
                            <img alt="User Pic" src="{{asset('assets/img_predeterminadas/hombre.png')}}" class="img-circle img-responsive" style="width:150px">
                        </div>
                    @else
                        <div class="col-md-3 col-lg-3 " align="center">
                            <img alt="User Pic" src="{{asset('assets/img_predeterminadas/mujer.png')}}" class="img-circle img-responsive" style="width:150px">
                        </div>
                    @endif

                        <div class=" col-md-9 col-lg-9 ">
                            <table class="table table-user-information">
                                <tbody>
                                <tr>
                                    <td>Nombre:</td>
                                    <td>{{$enf->nombre}}</td>
                                </tr>
                                <tr>
                                    <td>Apellidos:</td>
                                    <td>{{$enf->apellidos}}</td>
                                </tr>
                                <tr>
                                    <td>Sexo</td>
                                    <td>{{$enf->sexo}}</td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Dirección</td>
                                    <td>{{$enf->direccion}}</td>
                                </tr>
                                <tr>
                                    <td>Teléfono</td>
                                    <td>{{$enf->telefono}}</td>
                                </tr>
                                <tr>
                                    <td>Escolaridad</td>
                                    <td>{{$enf->escolaridad}}</td>
                                </tr>
                                <tr>
                                    <td>Hora de entrada</td>
                                    <td>{{$enf->hora_entrada}}</td>
                                </tr>
                                <tr>
                                    <td>Hora de salida</td>
                                    <td>{{$enf->hora_salida}}</td>
                                </tr>
     
  
                                </tbody>
                            </table>
    
                        </div>
                   
               </div>
            </div>
            <div class="panel-footer" align="right">
               <a href="" data-target="#modal-delete-{{$enf->id_asistente}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-pencil"></i>&nbsp;Eliminar</button></a>
               <a href="{{URL::action('AsistenteController@edit',$enf->id_asistente)}}"><button class="btn btn-info">&nbsp;&nbsp;&nbsp;<i class="fa fa-trash"></i>&nbsp;Editar&nbsp;&nbsp;</button></a>
            </div>
         </div>
      </div>
      @include('personal.asistente.modal')
      @endforeach
    @endif

@endif


@endsection
