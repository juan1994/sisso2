@extends('layout-default')
@section('content')
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
@if(isset($session) && $session->status === 1)    
    <button class="btn btn-success" type="button">
        <i class="fa fa-user-plus"></i>Editar Datos</button>
@endif    
    <table class="table table-striped table-white">
        <thead>
            <h1>
                Anexos
            </h1>
            <tr>
                <th scope="col">
                    nombre del cocumento
                </th>
                <th scope="col">
                    Descripcion
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proyectoAnexo as $row2)
            <tr>
                <td> <a href="/attached?pathfile={{$row2->Ruta}}">{{$row2->NombreAnexo}}</a> </td>
                <td>{{$row2->Descripcion}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@if(isset($session) && $session->status === 1)
  <button class="btn btn-success" type="submit" onclick="showForm()">
    <i class="fa fa-user-plus"></i>Agregar Anexos</button>
@endif    
<div id="addfile" class="d-none">
        <h2>Agregar Anexo</h2>
        <form method="POST" enctype="multipart/form-data" action"/detail-project">
            {{ csrf_field() }}
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
                <th scope="col">
                    resultado
                </th>
                <th scope="col">
                    Fecha
                </th>
                <th scope="col">
                    Actualizacion
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proyectoEvaluacion as $row)
            <tr>
                <td>
                    @php echo $row->resultado; @endphp
                </td>
                <td>
                    @php echo $row->fecha; @endphp
                </td>
                <td>
                    @php echo $row->actualizacion; @endphp
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
 @if(isset($session) && $session->status === 1)
<button class="btn btn-success" type="button">
  <i class="fa fa-user-plus"></i><a style="color: white;text-decoration: none;" href="/evaluations?project={{$proyecto[0]->idproyecto}}">Agregar Matriz</a></button>
<button class="btn btn-success" type="button">
  <i class="fa fa-user-plus"></i><a style="color: white;text-decoration: none;" href="/evaluation-cal?project={{$proyecto[0]->idproyecto}}">Agregar evaluación</a></button> 
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