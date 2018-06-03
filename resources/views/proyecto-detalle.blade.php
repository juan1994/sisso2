@extends('layout-default')
@section('content')
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
      <th scope="col">Descripcion</th>
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
      <td> @php echo $row->descripcion; @endphp </td>
      <td> @php echo $row->tipoModalidad_idtipoModalidad; @endphp </td>
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
    @if(isset($session->status) && $session->status === 1 && (intval($session->rol) == intval(3) || intval($session->rol) == intval(4)))
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
            <td><a href="/attached?pathfile={{$row2->Ruta}}&name={{$row2->NombreAnexo}}&idproject={{$proyecto[0]->idproyecto}}">Descargar</a>
            @if(isset($session->status) && $session->status === 1 && (intval($session->rol) == intval(3) || intval($session->rol) == intval(4)))
            <a style="margin-left: 15px" href="#">Eliminar</a></td>
            @endif
            </tr>
            @endforeach
        </tbody>
    </table>
@if(isset($session->status) && $session->status === 1 && (intval($session->rol) == intval(3) || intval($session->rol) == intval(4)))
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
                <td>{{$row->resultado}}</td>
                <td>{{$row->fecha}}</td>
                <td>{{$row->actualizacion}}</td>
                @if(isset($session->status) && $session->status === 1 && intval($session->rol) == intval(2))
                <td>
                    <div class="btn-group">
                    <button class="btn btn-default" onclick="window.location.href = '/evaluations?idproject={{$proyecto[0]->idproyecto}}&project={{$row->idevaluacion}}'; " type="button">
                            Agregar Matriz</button>
                        <button class="btn btn-default" onclick="window.location.href = '/evaluation-cal?idproject={{$proyecto[0]->idproyecto}}&project={{$row->idevaluacion}}'; " type="button">
                            Agregar Calificación</button>
                    </div>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
@if(isset($session->status) && $session->status === 1 && intval($session->rol) == intval(2))
<form method="POST" action"/detail-project">
    {{ csrf_field() }}
    <input type="hidden" name="idproject" value="{{$proyecto[0]->idproyecto}}"/>
    <input type="hidden" name="operation" value="A"/>
    <button class="btn btn-success" type="submit" method="POST"><i class="fa fa-user-plus"></i>Agregar Evaluación</button>
</form>
@endif
<script>
  function showForm(){
    $('#addfile').removeClass('d-none');
  }
  function hideForm(){
    $('#addfile').addClass('d-none');
  }
window.onload = function() {
  //$('#addfile').removeClass('d-none');
};
</script>
@stop

