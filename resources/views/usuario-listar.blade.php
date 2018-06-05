@extends('layout-default')
@section('content')
<link href="css/sb-admin.css" rel="stylesheet"> 
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<div class="table-responsive">
    <table class="table table-striped table-white">
        <thead>
            <tr>
                <th scope="col">
                    codigo
                </th>
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
                    Estado
                </th>
                <th scope="col">
                    Acción
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuario as $row)
            <tr>
                <td>
                    <a href="/detail-user?userid={{ $row->codigo }}">
                        @php echo $row->codigo; @endphp
                    </a>
                </td>
                <td>
                    @php echo $row->nombres; @endphp
                </td>
                <td>
                    @php echo $row->apellidos; @endphp
                </td>
                <td>
                    @if ($row->tipo_idTipo ===  1)
                    Administrador
                    @elseif ($row->tipo_idTipo === 2)
                        Docente
                    @elseif ($row->tipo_idTipo === 3)
                        Estudiante    
                    @elseif ($row->tipo_idTipo === 4        )
                        Egresado
                    @endif
                </td>
                <td>
                    @if ($row->estado ===  'A')
                        activo
                    @elseif ($row->estado === 'I')
                        Inactivo
                    @elseif ($row->estado === 'B')
                        Bloqueado
                    @endif
                </td>
                @if($row->codigo !== $session->code)
                <td>
                    <div class="btn-group">
                        <button class="btn btn-default" onclick="action({{$row->codigo}},'{{$row->estado}}')" type="button">
                            @if ($row->estado ===  'A')
                                Inactivar
                            @elseif ($row->estado === 'I' || $row->estado === 'B')
                                activar
                            @endif
                        </button>
                    </div>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<form style="display: none" method="POST">
    {{ csrf_field() }}
    <input id="code-user" type="hidden" name="code-user" value=""/>
    <input id="action" type="hidden" name="action" value=""/>
    <button id="button-action" type="submit"></button>
</form>
<script>
    function action(code, option){
        $('#action').val(option);
        $('#code-user').val(code);
        $( "#button-action" ).click();
    }
</script>
@stop
