@extends('layout-default')
@section('content')
<!-- Stylesheets -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"></link>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"></link>
<div class="container">
        <form action="/register" class="form-horizontal" method="POST" role="form">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <h2>Registro</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="name">Nombres</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-user"></i>
                            </div>
                            <input autofocus="" minlength="3" maxlength="60" class="form-control" id="nombres" name="nombres" placeholder="Juan Pablo" value="@if (isset($input) && isset($input["nombres"])) {{ $input["nombres"]}}@endif" required type="text">
                            </input>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put name validation error messages here -->
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="name">
                        Apellidos
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-user">
                                </i>
                            </div>
                            <input autofocus="" minlength="3" maxlength="60" class="form-control" id="apellidos" name="apellidos" placeholder="Rodriguez Salcedo" value="@if (isset($input) && isset($input["apellidos"])) {{ $input["apellidos"]}}@endif" required type="text">
                            </input>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put name validation error messages here -->
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="email">
                        Correo institucional
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-at">
                                </i>
                            </div>
                            <input autofocus="" minlength="10" maxlength="120" class="form-control" id="correo" name="correo" placeholder="you@ucatolica.edu.co" value="@if (isset($input) && isset($input["correo"])) {{ $input["correo"]}}@endif" required type="email">
                            </input>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put e-mail validation error messages here -->
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="password">
                        Rol
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-vcard-o" style="font-size:20px"></i>
                            </div>
                            <select class="form-control" id="selectRol" name="rol" required>
                                <option value="" >Seleccione...</option>
                                @if (count($kinds) > 0)
                                    @foreach($kinds as $k)
                                        @if (isset($input) && intval($input["rol"]) === intval($k->id))
                                            <option selected value="{{$k->id}}">{{$k->detalle}}</option>
                                        @else
                                            <option value="{{$k->id}}">{{$k->detalle}}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="password">Contraseña</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-key"></i>
                            </div>
                            <input class="form-control" minlength="8" maxlength="20" onchange="validate()" id="password" name="contrasena" placeholder="Contraseña" required="" type="password">
                            </input>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="password">
                        Confirmar Contraseña
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-repeat"></i>
                            </div>
                            <input class="form-control" minlength="8" maxlength="20" onchange="validate()" id="password-confirm" name="contrasenaConfirmar" placeholder="Confirmar Contraseña" required type="password"/>
                            <div class="invalid-feedback" id="error-password" style="padding-left: 40px">
                                No coinciden la contraseña.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-offset-md-2">
                    @if(array_key_exists('exist_user', $errors))
                        <div class="alert alert-warning" role="alert">
                            <strong>{{$errors['exist_user']}}</strong>
                        </div>  
                    @endif
                </div>
                <div class="col-md-6 col-offset-md-2">
                    <button id="submit-reg" class="btn btn-success" type="submit">
                        <i class="fa fa-user-plus"></i>Registrarse</button>
                </div>
            </div>
        </form>
    </div>
<script>
function validate(){
    $("#submit-reg").prop("disabled",false);
    $("#error-password").hide();
    $('#password-confirm').removeClass("is-invalid");
    var password1 = $('#password').val();
    var password2 = $('#password-confirm').val();
    if(password1 !== password2){
        $('#password-confirm').addClass("is-invalid");
        $("#submit-reg").prop("disabled",true);
        $("#error-password").show();
    }
}
</script>
@stop
