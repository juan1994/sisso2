@extends('layout-default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ingreso</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login-p') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="username" class="col-sm-4 col-form-label text-md-right">Correo electronico</label>

                            <div class="col-md-6">
                                <input id="username" type="email" max-length="20" class="form-control {{array_key_exists('user', $errors)?'is-invalid':''}}" name="username" value="@if (isset($username)) {{ $username}}@endif" required autofocus>
                                @if(array_key_exists('user', $errors))
                                    <div class="invalid-feedback">
                                        {{$errors['user']}}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" max-length="20" type="password" class="form-control {{array_key_exists('password', $errors) || array_key_exists('count', $errors)?'is-invalid':''}}" name="password" required>
                                @if(array_key_exists('password', $errors))
                                    <div class="invalid-feedback">
                                        {{$errors['password']}}
                                    </div>
                                @elseif(array_key_exists('count', $errors))
                                    <div class="invalid-feedback">
                                        {{$errors['count']}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Ingresar</button>
                                <a class="btn btn-link" href="{{route('recordar-contrasena')}}">Recordar Contraseña</a>
                            </div>
                        </div>
                        <input type="hidden" name="errcount" value="{{$errcount}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
