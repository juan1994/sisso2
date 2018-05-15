@extends('layout-default')
@section('content')
    <h1>
    Peticion de crearcion de usuario realizado
    </h1>
    <p> Tu peticion se a sido enviada , llegara una correo cuando el administrador acepte la solicitud</p>

<button class="btn btn-success" href="/login" type="submit">
        <i class="far fa-arrow-alt-circle-left">
        </i>
        <a href="/login">
            regresar
        </a>
    </button>
    

@endsection