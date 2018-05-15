@extends('layout-default')
@section('content')

<div class="table-responsive">
  <table class="table table-striped table-white">
  <thead>
    <tr>
      <th scope="col">Registro</th> 
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">rol</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($usuario as $row)
    
    <tr>
      <td><a href="/detail-user?userid={{ $row->codigo }}">Detalle</a></td>
      <td> @php echo $row->nombres; @endphp </td>
      <td> @php echo $row->apellidos; @endphp </td>
      <td> 
        @if ($row->tipo_idTipo ===  1)
          Administrador
        @elseif ($row->tipo_idTipo === 2)
            Docente
         @elseif ($row->tipo_idTipo === 3)
            Estudiante   
        @endif
      </td>
      
      </tr>
    @endforeach
    </tbody>
</table>
@stop
