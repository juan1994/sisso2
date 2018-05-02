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
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11" value="1" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            </tr>
            <tr class="width-row">
            <th scope="row">Eficiencia</th>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11" value="1" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            </tr>
            <tr class="width-row">
            <th scope="row">Sostenibilidad</th>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11" value="1" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            </tr>
            <tr class="width-row">
            <th scope="row">Tecnologias</th>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11" value="1" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            </tr>
            <tr class="width-row">
            <th scope="row">Sastifacción de la Comunidad</th>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11" value="1" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            </tr>
            <tr class="width-row">
            <th scope="row">Número de Personas</th>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11" value="1" readonly>
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            </tr>
            <tr class="width-row">
            <th scope="row">Participación de la Comunidad</th>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11">
                </div>
            </td>
            <td>
                <div class="input-group mb-3">
                    <input required type="number" step=".01" min="0" max="10" class="form-control w-default" style="width: 100px;" name="campo11" value="1" readonly>
                </div>
            </td>
            </tr>
        </tbody>
        </table>
        </div>
        <button class="btn btn-success" type="submit">
        <i class="fa fa-user-plus"></i>Register</button>
    </form>
</div>
</div>
</div>
@stop
