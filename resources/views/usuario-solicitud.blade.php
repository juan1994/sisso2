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
                <th scope="col">
                    Celular
                </th>
                <th scope="col">
                    Codigo
                </th>
                <th scope="col" >
                    Fecha solicitud
                </th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarioTemporal as $row)
            <tr>
                <td>
                    <a>
                        Detalle
                    </a>
                </td>
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
                <td>
                    {{ $row->tel }}
                </td>
                <td>
                    {{ $row->codigo }}
                </td>
                <td> 
                    {{ $row->created }}
                </td>
                
                <td>
                    <button class="btn btn-success" type="submit">
                        
                        <a onclick="('A',{{ $row->id}})">
                            Aceptar
                        </a>
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger" type="submit">
                        
                        <a onclick="('R',{{ $row->id}})">
                            Rechazar
                        </a>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @stop
</div>