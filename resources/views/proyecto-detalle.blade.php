@extends('layout-default')
@section('content')
<div class="conatiner">
<div class="row">
  <div class="col-md-12">
<div>
    <button class="btn btn-link" onclick="window.location.href = '/projects' " type="button">Volver</button>
</div>
<div class="table-responsive">
 <table class="table table-striped table-white">
	<thead>
  	<h1>Datos generales</h1>
    <tr>
      <th scope="col">Id Proyecto</th>
      <th scope="col">Nombre Del Proyecto</th>
      <th scope="col">Fecha De Inicio</th>
      <th scope="col">Fecha De Registro</th>
      <th scope="col">Presuesto</th>
      <th scope="col">Problacion Beneficiada</th>
      <th scope="col">Nombre de Resposanble</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Obejetivo General</th>
      <th scope="col">Tipo de modalidad</th>
      <th scope="col">Estado Del Proyecto</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($proyecto as $row)
    <tr>
      <td> @php echo $row->idproyecto; @endphp </td>
      <td> @php echo $row->nombreProyecto; @endphp </td>
      <td> @php echo $row->fechaInicio; @endphp </td>
      <td> @php echo $row->fechaRegistro; @endphp </td>
      <td> @php echo $row->presuesto; @endphp </td>
      <td> @php echo $row->problacionBeneficiada; @endphp </td>
      <td> @php echo $row->nombreResponsable; @endphp </td>
      <td> @php echo $row->descripcion; @endphp </td>
      <td> @php echo $row->objetivoGeneral; @endphp </td>
      <td>
        @if ($row->tipoModalidad_idtipoModalidad ===  1)
          Trabajo de grado
        @elseif ($row->tipoModalidad_idtipoModalidad === 2)
            Informatica Social
        @endif
      </td>
      <td>
        @if ($row->EstadoProyecto ===  '0')
          Activo
        @elseif ($row->EstadoProyecto === '1')
            Inactivo
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
    </table>
    @if(isset($session->status) && $session->status === 1 && (intval($session->rol) == intval(3) || intval($session->rol) == intval(4)) && intval($permiss_edit) == 1)
    <button class="btn btn-success" onclick="window.location.href = '/update-project?idproject={{$proyecto[0]->idproyecto}}'; " type="button">
        <i class="fa fa-user-plus"></i>Editar Datos</button>
    @endif
    <table class="table table-striped table-white">
        <thead>
            <h1>
                Anexos
            </h1>
            <tr>
                <th scope="col">Nombre del documento</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proyectoAnexo as $row2)
            <tr>
                <td>{{$row2->NombreAnexo}}</td>
                <td>{{$row2->Descripcion}}</td>
            <td>
            @if(isset($session->status) && $session->status === 1 && (intval($session->rol) == intval(3) || intval($session->rol) == intval(4))
                && intval($permiss_edit) == 1)
            <form method="POST" action"/detail-project">
                {{ csrf_field() }}
                <input type="hidden" name="idanexo" value="{{$row2->idAnexo}}"/>
                <input type="hidden" name="idproject" value="{{$proyecto[0]->idproyecto}}"/>
                <input type="hidden" name="operation" value="D"/>
                <a href="/attached?pathfile={{$row2->Ruta}}&name={{$row2->NombreAnexo}}&idproject={{$proyecto[0]->idproyecto}}">Descargar</a>
                <button class="btn btn-link" type="submit" method="POST">Eliminar</button>
            </form>
            @else
            <a href="/attached?pathfile={{$row2->Ruta}}&name={{$row2->NombreAnexo}}&idproject={{$proyecto[0]->idproyecto}}">Descargar</a>
            @endif
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@if(isset($session->status) && $session->status === 1 && (intval($session->rol) == intval(3) || intval($session->rol) == intval(4)) && intval($permiss_edit) == 1)
  <button class="btn btn-success" type="submit" onclick="showForm()">
    <i class="fa fa-user-plus"></i>Agregar Anexos</button>
@endif
<div id="addfile" class="d-none">
        <h2>Agregar Anexo</h2>
        <form method="POST" enctype="multipart/form-data" action"/detail-project">
            {{ csrf_field() }}
            <input type="hidden" name="operation" value="U"/>
            <div class="form-group">
                <label for="m_photo" class="col-md-4 control-label">Nombre Anexo</label>
                <div class="col-md-6">
                    <input type="text" name="nombre" class="form-control" value="" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="m_photo" class="col-md-4 control-label">Detalle</label>
                <div class="col-md-6">
                    <textarea rows="4" cols="50" class="form-control" name="descripcion" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                <input id="m_photo" type="file" class="form-control-file space" name="myFile" required>
                </div>
            </div>
            <input type="hidden" name="idproject" value="{{$proyecto[0]->idproyecto}}"/>
            <div class="col-md-12">
                <button type="button" onclick="hideForm()">Cancelar</button>
                <button type="submit">Agregar</button>
            </div>
        </form>
    </div>
    <table class="table table-striped table-white">
        <thead>
            <h1>
                Resultado De Evaluación
            </h1>
            <tr>
                <th scope="col">resultado</th>
                <th scope="col">Fecha</th>
                <th scope="col">Actualizacion</th>
                @if(isset($session->status) && $session->status === 1 && intval($session->rol) == intval(2))
                <th scope="col">Acciones</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($proyectoEvaluacion as $row)
            <tr>
                <td>
                    @if(floatval($row->resultado) > 0 && floatval($row->resultado) <= 40)
                    <span class="text-danger">IMPACTO BAJO</span>
                  @elseif(floatval($row->resultado) > 40 && floatval($row->resultado) <= 60)
                    <span class="text-warning">IMPACTO MEDIO</span>
                  @elseif(floatval($row->resultado) > 60 && floatval($row->resultado) <= 100)
                    <span class="text-success"> IMPACTO ALTO</span>
                    @else
                    Sin Información
                    @endif
                </td>
                <td>{{$row->fecha}}</td>
                <td>{{$row->actualizacion}}</td>

                <td>
                    <div class="btn-group">
                      <button class="btn btn-default" onclick="callInfo('{{$row->idevaluacion}}');" type="button">
                              Detalle</button>
                    @if(isset($session->status) && $session->status === 1 && intval($session->rol) == intval(2))
                    <button class="btn btn-default" {{count($row->count_matriz) >= 3 ? 'disabled':''}} onclick="window.location.href = '/evaluations?idproject={{$proyecto[0]->idproyecto}}&project={{$row->idevaluacion}}'; " type="button">
                            Agregar Matriz</button>
                        <button class="btn btn-default" {{(count($row->count_matriz) < 3 || !$row->permiss_m || count($row->count_evaluation) >= 3) ?'disabled':''}} onclick="window.location.href = '/evaluation-cal?idproject={{$proyecto[0]->idproyecto}}&project={{$row->idevaluacion}}'; " type="button">
                            Agregar Calificación</button>
                    </div>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@if(isset($session->status) && $session->status === 1 && intval($session->rol) == intval(2))
<form method="POST" action"/detail-project">
    @if($evaluation_done){{ csrf_field() }}@endif
    <input type="hidden" name="idproject" value="{{$proyecto[0]->idproyecto}}"/>
    <input type="hidden" name="operation" value="A"/>
    <button class="btn btn-success" {{!$evaluation_done ? 'disabled':''}} type="{{$evaluation_done ?'submit':'button'}}"><i class="fa fa-user-plus"></i>Agregar Evaluación</button>
</form>
@endif
<!-- end col-md-12-->
</div>
<!-- end row-->
</div>
<!-- end container-->
</div>

<!-- Modal -->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detalle Evaluación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="font-weight-bold">Matriz</p>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Usuario</th>
              <th scope="col">Fecha</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="col">1</th>
              <td id="m-user1">Sin usuario</td>
              <td id="m-date1"></td>
            </tr>
            <tr>
              <th scope="col">2</th>
              <td id="m-user2">Sin usuario</td>
              <td id="m-date2"></td>
            </tr>
            <tr>
              <th scope="col">3</th>
              <td id="m-user3">Sin usuario</td>
              <td id="m-date3"></td>
            </tr>
          </tbody>
        </table>
        <p class="font-weight-bold">Calificación</p>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Usuario</th>
              <th scope="col">Fecha</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="col">1</th>
              <td id="c-user1">Sin usuario</td>
              <td id="c-date1"></td>
            </tr>
            <tr>
              <th scope="col">2</th>
              <td id="c-user2">Sin usuario</td>
              <td id="c-date2"></td>
            </tr>
            <tr>
              <th scope="col">3</th>
              <td id="c-user3">Sin usuario</td>
              <td id="c-date3"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
      </div>
    </div>
  </div>
</div>
<script>
  function showForm(){
    $('#addfile').removeClass('d-none');
  }
  function hideForm(){
    $('#addfile').addClass('d-none');
  }
  function callInfo(ideval){
    resetDisplay();
    $.get( "/evaluation-info/" + ideval)
    .done(function( data ) {
        if(data.length >=1 ){
          $('#m-user1').html(data[0].usuario_codigo + ' - ' + data[0].name);
          $('#m-date1').html(data[0].act_matriz);
        }
        if(data.length >=2 ){
          $('#m-user2').html(data[1].usuario_codigo + ' - ' + data[1].name);
          $('#m-date2').html(data[1].act_matriz);
        }
        if(data.length >=3 ){
          $('#m-user3').html(data[2].usuario_codigo + ' - ' + data[2].name);
          $('#m-date3').html(data[2].act_matriz);
        }
        if(data.length >=1 ){
          $('#c-user1').html(data[0].usuario_codigo + ' - ' + data[0].name);
          $('#c-date1').html(data[0].act_eval);
        }
        if(data.length >=2 ){
          $('#c-user2').html(data[1].usuario_codigo + ' - ' + data[1].name);
          $('#c-date2').html(data[1].act_eval);
        }
        if(data.length >=3 ){
          $('#c-user3').html(data[2].usuario_codigo + ' - ' + data[2].name);
          $('#c-date3').html(data[2].act_eval);
        }
        $('#exampleModal').modal('show');
    });
  }
  function resetDisplay(){
    $('#m-user1').html('Sin usuario');
    $('#m-date1').html('');
    $('#m-user2').html('Sin usuario');
    $('#m-date2').html('');
    $('#m-user3').html('Sin usuario');
    $('#m-date3').html('');
    $('#c-user1').html('Sin usuario');
    $('#c-date1').html('');
    $('#c-user2').html('Sin usuario');
    $('#c-date2').html('');
    $('#c-user3').html('Sin usuario');
    $('#c-date3').html('');
  }
window.onload = function() {
    //callInfo("5");
};
</script>
@stop
