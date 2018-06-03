@extends('layout-default')
@section('content')
<div class="table-responsive">
    <table class="table table-striped table-white">
        <thead>
            <tr>
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
                <th scope="row">
                    <a href="/detail-project?proyectoid={{ $row->idproyecto }}">{{ $row->idproyecto }}</a>
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
        @if ($row->tipoModalidad_idtipoModalidad ===  1)
          Trabajo de grado
        @elseif ($row->tipoModalidad_idtipoModalidad === 2)
            Informatica Social
        @endif
      </td><td>
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
    <button class="btn btn-success" onclick="window.location.href = '/register-project' " type="button">
        <i class="fa fa-user-plus"></i>Crear proyecto</button>
@endif    
    @stop
</div>