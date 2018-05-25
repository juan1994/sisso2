@extends('layout-default')
@section('content')
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
                    @endif
                </td>
                <td>
                    @if ($row->estado ===  'A')
                        activo
                    @elseif ($row->estado === 'I')
                        Inactivo
                    @endif
                </td>
                <td>
                    <div class="btn-group">
                        <button class="btn btn-default" onclick="action({{$row->codigo}},'{{$row->estado}}')" type="button">
                            @if ($row->estado ===  'A')
                                Inactivar
                            @elseif ($row->estado === 'I')
                                activar
                            @endif
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @stop
</div>