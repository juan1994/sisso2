@extends('layout-default')
@section('content')
<div class="table-responsive">
    <table class="table table-striped table-white">
        <thead>
            <tr>
                <th scope="col">
                    Registro
                </th>
                <th scope="col">
                    Id Proyecto
                </th>
                <th scope="col">
                    Nombre Del Proyecto
                </th>
                <th scope="col">
                    Fecha De Inicio
                </th>
                <th scope="col">
                    Descripcion
                </th>
                <th scope="col">
                    Tipo de modalidad
                </th>
                <th scope="col">
                    Estado Del Proyecto
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proyecto as $row)
            <tr>
                <td>
                    <a href="/detail-project?proyectoid={{ $row->idproyecto }}">
                        Detalle
                    </a>
                </td>
                <th scope="row">
                    {{ $row->idproyecto }}
                </th>
                <td>
                    @php echo $row->nombreProyecto; @endphp
                </td>
                <td>
                    @php echo $row->fechaInicio; @endphp
                </td>
                <td>
                    @php echo $row->descripcion; @endphp
                </td>
                <td>
                    @php echo $row->tipoModalidad_idtipoModalidad; @endphp
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
    <button class="btn btn-success" href="/detail-user" type="submit">
        <i class="fa fa-user-plus">
        </i>
        <a href="/register-project">
            crear proyecto
        </a>
    </button>
    @stop
</div>