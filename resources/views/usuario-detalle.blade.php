@extends('layout-default')
@section('content')

<div class="table-responsive">
  
  
    <table class="table table-striped table-white">

  
  <thead>
    <tr>
      
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Celular</th>
      <th scope="col">correo</th>
      <th scope="col">rol</th>
      <th scope="col">Estado</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($usuario as $row)
    
    <tr>
      
      <td> @php echo $row->nombres; @endphp </td>
      <td> @php echo $row->apellidos; @endphp </td>
      <td> @php echo $row->celular; @endphp </td>
      <td> @php echo $row->correo; @endphp </td>
      <td> 
        @if ($row->tipo_idTipo ===  1)
          Administrador
        @elseif ($row->tipo_idTipo === 2)
            Docente
         @elseif ($row->tipo_idTipo === 3)
            Estudiante   
        @endif
      </td>
      <td> @php echo $row->estado; @endphp </td>
      </tr>
    @endforeach
    </tbody>
</table>
  


 



@stop
