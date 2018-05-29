@extends('layout-default')
@section('content')
<div class="container">
<div class="row">
<div class="offset-sm-3 col-sm-6" style="padding-bottom: 15px;">
    <form action="/evaluation-cal" class="form-horizontal" method="POST" role="form">
        {{ csrf_field() }}
        <table class="table table-striped">
        <thead style="width: 100px;">
            <tr>
            <th scope="col">Criterio</th>
            <th scope="col">Peso Indicador</th>
            <th scope="col">Valor</th>
            </tr>
        </thead>
        <tbody style="width: 50px;">
            <tr>
            <th scope="row">Eficacia</th>
            <td>@if (isset($weight[0])) {{ $weight[0]}}@endif</td>
            <td>
                <div class="input-group mb-3">
                <select name="valor1" required class="custom-select" id="inputGroupSelect01">
                    <option value="" selected>Seleccione...</option>
                    @if (count($calificaciones) > 0)
                        @foreach($calificaciones as $cal)
                        @if ($operation == 'U' && (intval($values[0]->valor)) == intval($cal[0])) == 1)
                            <option selected value="{{$cal[0]}}">{{$cal[1]}}</option>
                        @else
                            <option value="{{$cal[0]}}">{{$cal[1]}}</option>
                        @endif
                        @endforeach
                    @endif
                </select>
                </div>  
            </td>
            </tr>
            <tr>
            <th scope="row">Eficiencia</th>
            <td>@if (isset($weight[1])) {{ $weight[1]}}@endif</td>
            <td>
                <div class="input-group mb-3">
                <select name="valor2" required class="custom-select" id="inputGroupSelect01">
                    <option value="" selected>Seleccione...</option>
                    @if (count($calificaciones) > 0)
                        @foreach($calificaciones as $cal)
                            @if ($operation == 'U' && (intval($values[1]->valor)) == intval($cal[0])) == 1)
                                <option selected value="{{$cal[0]}}">{{$cal[1]}}</option>
                            @else
                                <option value="{{$cal[0]}}">{{$cal[1]}}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
                </div>
            </td>
            </tr>
            <tr>
            <th scope="row">Sostenibilidad</th>
            <td>@if (isset($weight[2])) {{ $weight[2]}}@endif</td>
            <td>
                <div class="input-group mb-3">
                <select name="valor3" required class="custom-select" id="inputGroupSelect01">
                    <option value="" selected>Seleccione...</option>
                    @if (count($calificaciones) > 0)
                        @foreach($calificaciones as $cal)
                            @if ($operation == 'U' && (intval($values[2]->valor)) == intval($cal[0])) == 1)
                                <option selected value="{{$cal[0]}}">{{$cal[1]}}</option>
                            @else
                                <option value="{{$cal[0]}}">{{$cal[1]}}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
                </div>
            </td>
            </tr>
            <tr>
            <th scope="row">Tecnologías</th>
            <td>@if (isset($weight[3])) {{ $weight[3]}}@endif</td>
            <td>
                <div class="input-group mb-3">
                <select name="valor4" required class="custom-select" id="inputGroupSelect01">
                    <option value="" selected>Seleccione...</option>
                    @if (count($calificaciones) > 0)
                        @foreach($calificaciones as $cal)
                            @if ($operation == 'U' && (intval($values[3]->valor)) == intval($cal[0])) == 1)
                                <option selected value="{{$cal[0]}}">{{$cal[1]}}</option>
                            @else
                                <option value="{{$cal[0]}}">{{$cal[1]}}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
                </div>
            </td>
            </tr>
            <tr>
            <th scope="row">Satisfacción de la Comunidad</th>
            <td>@if (isset($weight[4])) {{ $weight[4]}}@endif</td>
            <td>
                <div class="input-group mb-3">
                <select name="valor5" required class="custom-select" id="inputGroupSelect01">
                    <option value="" selected>Seleccione...</option>
                    @if (count($calificaciones) > 0)
                        @foreach($calificaciones as $cal)
                            @if ($operation == 'U' && (intval($values[4]->valor)) == intval($cal[0])) == 1)
                                <option selected value="{{$cal[0]}}">{{$cal[1]}}</option>
                            @else
                                <option value="{{$cal[0]}}">{{$cal[1]}}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
                </div>
            </td>
            </tr>
            <tr>
            <th scope="row">Número de Personas</th>
            <td>@if (isset($weight[5])) {{ $weight[5]}}@endif</td>
            <td>
                <div class="input-group mb-3">
                <select name="valor6" required class="custom-select" id="inputGroupSelect01">
                    <option value="" selected>Seleccione...</option>
                    @if (count($calificaciones) > 0)
                        @foreach($calificaciones as $cal)
                            @if ($operation == 'U' && (intval($values[5]->valor)) == intval($cal[0])) == 1)
                                <option selected value="{{$cal[0]}}">{{$cal[1]}}</option>
                            @else
                                <option value="{{$cal[0]}}">{{$cal[1]}}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
                </div>
            </td>
            </tr>
            <tr>
            <th scope="row">Participación de la Comunidad</th>
            <td>@if (isset($weight[6])) {{ $weight[6]}}@endif</td>
            <td>
                <div class="input-group mb-3">
                <select name="valor7" required class="custom-select" id="inputGroupSelect01">
                    <option value="" selected="false">Seleccione...</option>
                     @if (count($calificaciones) > 0)
                        @foreach($calificaciones as $cal)
                            @if ($operation == 'U' && (intval($values[6]->valor)) == intval($cal[0])) == 1)
                                <option selected value="{{$cal[0]}}">{{$cal[1]}}</option>
                            @else
                                <option value="{{$cal[0]}}">{{$cal[1]}}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
                </div>
            </td>
            </tr>
        </tbody>
        </table>
        <input type="hidden" name="operation" id="operation" value="{{$operation}}">
        <input type="hidden" name="idproject" value="{{$idproject}}">
        <input type="hidden" name="numproject" value="{{$numproject}}">
        <button class="btn btn-success" type="submit">
        <i class="far fa-save"></i> Guardar</button>
        <button class="btn btn-success" onclick="window.location.href = '/detail-project?proyectoid={{$numproject}}'; " type="button">
        <i class="far fa-save"></i> Cancelar</button>
    </form>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false"  data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información</h5>
      </div>
      <div class="modal-body">
        <span>Opción no permitida, no se cumple con los requisitos establecidos</span>
      </div>
      <div class="modal-footer">
        <a href="{{ route('home') }}"><button type="button" class="btn btn-primary">Aceptar</button></a>
      </div>
    </div>
  </div>
</div>
@if ($status == 1)
<script>
window.onload = function() {
    $('#exampleModal').modal('show')
};
</script>
@endif
@stop
