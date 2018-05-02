@extends('layout-default')
@section('content')
<h3>Lista de proyectos</h3>
<hr>
<div class="container">
<div class="row">
<div class="col-sm-12">
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        </tr>
        <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        </tr>
    </tbody>
    </table>
</div>
</div>
</div>
<hr>
<a class="nav-link" href="{{ route('crear-proyecto') }}">
    <span class="nav-link-text">Crear Proyecto</span>
</a>
@stop
