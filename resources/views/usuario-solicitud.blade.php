@extends('layout-default')
@section('content')
<div class="table-responsive">
    <table class="table table-striped table-white">
        <thead>
            <tr>
                <th scope="col">
                    Nombres
                </th>
                <th scope="col">
                    Apellidos
                </th>
                <th scope="col">
                    rol
                </th>
                <th scope="col">
                    Correo
                </th>
                <th scope="col" style="width:150px;">
                    Celular
                </th>
                <th scope="col">
                    Codigo
                </th>
                <th scope="col" >
                    Fecha solicitud
                </th>
                <th scope="col" >
                    Acción
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarioTemporal as $row)
            <tr>
                <td>
                    {{ $row->nombres }}
                </td>
                <td>
                    {{ $row->apellidos }}
                </td>
                <td>
                    @if ($row->tipo===  1)
          Administrador
        @elseif ($row->tipo === 2)
            Docente
         @elseif ($row->tipo === 3)
            Estudiante   
        @endif
                </td>
                <td>
                    {{ $row->correo }}
                </td>
                <td style="width:150px;">
                    {{ $row->tel }}
                </td>
                <td>
                    {{ $row->codigo }}
                </td>
                <td> 
                    {{ $row->created }}
                </td>
                <td>
                    <div class="btn-group">
                    <button onclick="action('A',{{ $row->id}})" class="btn btn-success" type="button">Aceptar</button>
                    <button onclick="action('R',{{ $row->id}})" class="btn btn-danger" type="button">Rechazar</button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <form style="display:none;" id="targetUser" action="/requests" method="POST">
        @csrf
        <input type="hidden" name="action" id="action" value=""/>
        <input type="hidden" name="id" id="id" value=""/>
        <button id="button-action" type="submit"></button>
    </form>    
</div>
<script>
function action(op, id){
    $('#action').val(op);
    $('#id').val(id);
    $( "#button-action" ).click();
}
</script>
@stop