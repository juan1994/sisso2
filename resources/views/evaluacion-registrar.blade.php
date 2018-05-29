@extends('layout-default')
@section('content')
<style>
.w-default{
    width: 100px;
}
</style>
 <div class="container">
<div class="row">
<div class="col-sm-12" style="padding-bottom: 15px;">
    <form action="/evaluations" class="form-horizontal" method="POST" role="form">   
    {{ csrf_field() }}
    <div class="table-responsive">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">Criterios</th>
            <th scope="col">Eficacia</th>
            <th scope="col">Eficiencia</th>
            <th scope="col">Sostenibilidad</th>
            <th scope="col">Tecnologias</th>
            <th scope="col">Sastifacción de la Comunidad</th>
            <th scope="col">Numero de Personas</th>
            <th scope="col">Participación de la Comunidad</th>
            </tr>
        </thead>
        <tbody>
            <tr class="width-row">
            <th scope="row">Eficacia</th>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11" id="campo11" value="1" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()" step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo12" id="campo12">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo13" id="campo13" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo14" id="campo14" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo15" id="campo15">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo16" id="campo16" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo17" id="campo17" readonly>
                </div>
            </td>
            </tr>
            <tr class="width-row">
            <th scope="row">Eficiencia</th>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo21" id="campo21" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo22" id="campo22" value="1" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo23" id="campo23" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo24" id="campo24" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo25" id="campo25">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo26" id="campo26" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo27" id="campo27" readonly>
                </div>
            </td>
            </tr>
            <tr class="width-row">
            <th scope="row">Sostenibilidad</th>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo31" id="campo31">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo32" id="campo32">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo33" id="campo33" value="1" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo34" id="campo34">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo35" id="campo35" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo36" id="campo36" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo37" id="campo37" readonly>
                </div>
            </td>
            </tr>
            <tr class="width-row">
            <th scope="row">Tecnologias</th>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo41" id="campo41">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo42" id="campo42">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo43" id="campo43" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo44" id="campo44" value="1" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo45" id="campo45" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo46" id="campo46">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo47" id="campo47">
                </div>
            </td>
            </tr>
            <tr class="width-row">
            <th scope="row">Sastifacción de la Comunidad</th>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo51" id="campo51" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo52" id="campo52" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo53" id="campo53">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo54" id="campo54">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo55" value="1" id="campo55" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo56" id="campo56">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo57" id="campo57" readonly>
                </div>
            </td>
            </tr>
            <tr class="width-row">
            <th scope="row">Número de Personas</th>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo61" id="campo61">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo62" id="campo62">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo63" id="campo63">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo64" id="campo64" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo65" id="campo65" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo66" value="1" id="campo66" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo67" id="campo67">
                </div>
            </td>
            </tr>
            <tr class="width-row">
            <th scope="row">Participación de la Comunidad</th>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo71" id="campo71">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo72" id="campo72">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo73" id="campo73">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo74" id="campo74" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo75" id="campo75">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo76" id="campo76" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" onchange="onChange()"  step=".001" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo77" id="campo77" value="1" readonly>
                </div>
            </td>
            </tr>
        </tbody>
        </table>
        </div>
        <input type="hidden" name="operation" id="operation" value="{{$operation}}">
        <input type="hidden" name="idproject" value="{{$idproject}}">
        <input type="hidden" name="numproject" value="{{$numproject}}">
        <button class="btn btn-success" type="submit">
        <i class="fa fa-user-plus"></i>Guardar</button>
        <button class="btn btn-success" onclick="window.location.href = '/detail-project?proyectoid={{$numproject}}'; " type="button">
            <i class="far fa-save"></i> Cancelar</button>
    </form>
</div>
</div>
</div>
<script>
function onChange(){
    $('#campo21').val(round($('#campo12').val()));
    $('#campo51').val(round($('#campo15').val()));
    
    $('#campo52').val(round($('#campo25').val()));
    
    $('#campo13').val(round($('#campo31').val()));
    $('#campo23').val(round($('#campo32').val()));
    $('#campo43').val(round($('#campo34').val()));

    $('#campo14').val(round($('#campo41').val()));
    $('#campo24').val(round($('#campo42').val()));
    $('#campo64').val(round($('#campo46').val()));
    $('#campo74').val(round($('#campo47').val()));

    $('#campo35').val(round($('#campo53').val()));
    $('#campo45').val(round($('#campo54').val()));
    $('#campo65').val(round($('#campo56').val()));

    $('#campo16').val(round($('#campo61').val()));
    $('#campo26').val(round($('#campo62').val()));
    $('#campo36').val(round($('#campo63').val()));
    $('#campo76').val(round($('#campo67').val()));

    $('#campo17').val(round($('#campo71').val()));
    $('#campo27').val(round($('#campo72').val()));
    $('#campo37').val(round($('#campo73').val()));
    $('#campo57').val(round($('#campo75').val()));
}
function round(value){
    if(!isNaN(value)){
        return Math.round(1/parseInt(value) * 1000) / 1000;
    }
    return '';
}
window.onload = function() {
    setTimeout(onChange(), 3000);
};
</script>
@stop
