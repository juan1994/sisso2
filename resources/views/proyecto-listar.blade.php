@extends('layout-default')
@section('content')

  
<div class="table-responsive">
  
  
    <table class="table table-striped table-white">

  
  <thead>
    <tr>
      <th scope="col">Registro</th> 
      <th scope="col">Id Proyecto</th>
      <th scope="col">Nombre Del Proyecto</th>
      <th scope="col">Fecha De Registro</th>
      <th scope="col">Fecha De Inicio</th>
      <th scope="col">Fecha De Finalizacion</th>
      <th scope="col">Presupuesto</th>
      <th scope="col">Poblacion Beneficiada</th>
      <th scope="col">Nombre Del responsable</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Objetivo General</th>
      <th scope="col">Tipo de modalidad</th>
      <th scope="col">Estado Del Proyecto</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($proyecto as $row)
    <tr>
      <th scope="row">1</th>
      
      <td> {{ $row->idproyecto }} </td>
      <td> @php echo $row->nombreProyecto; @endphp </td>
      <td> @php echo $row->fechaRegistro; @endphp </td>
      <td> @php echo $row->fechaInicio; @endphp </td>
      <td> @php echo $row->fechaFinalizacion; @endphp </td>
      <td> @php echo $row->presuesto; @endphp </td>
      <td> @php echo $row->problacionBeneficiada; @endphp </td>
      <td> @php echo $row->nombreResponsable; @endphp </td>
      <td> @php echo $row->descripcion; @endphp </td>
      <td> @php echo $row->objetivoGeneral; @endphp </td>
      <td> @php echo $row->tipoModalidad_idtipoModalidad; @endphp </td>
      <td> @php echo $row->EstadoProyecto; @endphp </td>
      </tr>
    @endforeach
    </tbody>
</table>
  


 


@stop
