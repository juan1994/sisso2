@extends('layout-default')
@section('content')
<div class="container">
<div class="row">
<div class="offset-sm-3 col-sm-6" style="padding-bottom: 15px;">
    <form action="/evaluation-cal" class="form-horizontal" method="POST" role="form">
        <table class="table table-striped">
        <thead style="width: 100px;">
            <tr>
            <th scope="col">Criterio</th>
            <th scope="col">Valor</th>
            </tr>
        </thead>
        <tbody style="width: 50px;">
            <tr>
            <th scope="row">Eficacia</th>
            <td>
                <div class="input-group mb-3">
                <select name="valor1" required class="custom-select" id="inputGroupSelect01">
                    <option value="" selected>Seleccione...</option>
                    <option value="10">Mal</option>
                    <option value="40">Regular</option>
                    <option value="70">Bien</option>
                    <option value="100">Muy Bien</option>
                </select>
                </div>  
            </td>
            </tr>
            <tr>
            <th scope="row">Eficiencia</th>
            <td>
                <div class="input-group mb-3">
                <select name="valor2" required class="custom-select" id="inputGroupSelect01">
                    <option value="" selected>Seleccione...</option>
                    <option value="10">Mal</option>
                    <option value="40">Regular</option>
                    <option value="70">Bien</option>
                    <option value="100">Muy Bien</option>
                </select>
                </div>
            </td>
            </tr>
            <tr>
            <th scope="row">Sostenibilidad</th>
            <td>
                <div class="input-group mb-3">
                <select name="valor3" required class="custom-select" id="inputGroupSelect01">
                    <option value="" selected>Seleccione...</option>
                    <option value="10">Mal</option>
                    <option value="40">Regular</option>
                    <option value="70">Bien</option>
                    <option value="100">Muy Bien</option>
                </select>
                </div>
            </td>
            </tr>
            <tr>
            <th scope="row">Tecnologías</th>
            <td>
                <div class="input-group mb-3">
                <select name="valor4" required class="custom-select" id="inputGroupSelect01">
                    <option value="" selected>Seleccione...</option>
                    <option value="10">Mal</option>
                    <option value="40">Regular</option>
                    <option value="70">Bien</option>
                    <option value="100">Muy Bien</option>
                </select>
                </div>
            </td>
            </tr>
            <tr>
            <th scope="row">Satisfacción de la Comunidad</th>
            <td>
                <div class="input-group mb-3">
                <select name="valor5" required class="custom-select" id="inputGroupSelect01">
                    <option value="" selected>Seleccione...</option>
                    <option value="10">Mal</option>
                    <option value="40">Regular</option>
                    <option value="70">Bien</option>
                    <option value="100">Muy Bien</option>
                </select>
                </div>
            </td>
            </tr>
            <tr>
            <th scope="row">Número de Personas</th>
            <td>
                <div class="input-group mb-3">
                <select name="valor6" required class="custom-select" id="inputGroupSelect01">
                    <option value="" selected>Seleccione...</option>
                    <option value="10">Mal</option>
                    <option value="40">Regular</option>
                    <option value="70">Bien</option>
                    <option value="100">Muy Bien</option>
                </select>
                </div>
            </td>
            </tr>
            <tr>
            <th scope="row">Participación de la Comunidad</th>
            <td>
                <div class="input-group mb-3">
                <select name="valor7" required class="custom-select" id="inputGroupSelect01">
                    <option value="" selected>Seleccione...</option>
                    <option value="10">Mal</option>
                    <option value="40">Regular</option>
                    <option value="70">Bien</option>
                    <option value="100">Muy Bien</option>
                </select>
                </div>
            </td>
            </tr>
        </tbody>
        </table>
        <button class="btn btn-success" type="submit">
        <i class="fa fa-user-plus"></i>Register</button>
    </form>
</div>
</div>
</div>
@stop
