@extends('layout-default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Restablecer Contraseña</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('recordar-contrasena-p') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electrónico</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ array_key_exists('email', $errors) ? ' is-invalid' : '' }}" name="email" value="@if (isset($email)) {{ $email}}@endif" required>
                                <div style="margin-top: 30px;">
                                @if (array_key_exists('email', $errors))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors['email'] }}</strong>
                                    </span>
                                @endif

                                @if (array_key_exists('email', $result))
                                <div class="alert alert-success" role="alert">
                                    <strong>{{ $result['email'] }}</strong>
                                </div>
                                @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                               
                                <button type="submit" class="btn btn-primary">
                                    Enviar link de restauración de contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
