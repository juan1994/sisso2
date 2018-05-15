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

<button class="btn btn-success" type="submit">
        <i class="fa fa-user-plus"></i>Editar Datos</button>

<table class="table table-striped table-white">
	<thead>
  	<h1>Anexos</h1>
    <tr>
      <th scope="col">nombre del cocumento</th>
      <th scope="col">Descripcion</th>
      

    </tr>
  </thead>
  <tbody>
    @foreach ($proyectoAnexo as $row2)
    
    <tr>
       <td> @php echo $row2->NombreAnexo; @endphp </td>
      <td> @php echo $row2->Descripcion; @endphp </td>
     
      </tr>
    @endforeach
    </tbody>
</table>
  <button class="btn btn-success" type="submit">
        <i class="fa fa-user-plus"></i>Agregar Anexos</button>

<table class="table table-striped table-white">
	<thead>
  	<h1>Resultado De Evaluacion</h1>
    <tr>
      <th scope="col">resultado</th>
      <th scope="col">Fecha</th>
      <th scope="col">Actualizacion</th>
      

    </tr>
  </thead>
  <tbody>
    @foreach ($proyectoEvaluacion as $row)
    
    <tr>
     <td> @php echo $row->resultado; @endphp </td>
     <td> @php echo $row->fecha; @endphp </td>
     <td> @php echo $row->actualizacion; @endphp </td>
      
      </tr>
    @endforeach
    </tbody>
</table>
 
<button class="btn btn-success" type="submit">
        <i class="fa fa-user-plus"></i>Agregar evaluacion</button>

@stop
