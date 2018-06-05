@extends('layout-default')
@section('content')
<!-- Stylesheets -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"></link>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"></link>
<div class="container" style="margin: 0">
    @if($session->rol == 1)
        <a href="{{ route('usuarios') }}">
                    <button class="btn btn-warning" type="button">
                        <i class="fas fa-arrow-circle-left"></i>
                        Cancelar
                    </button>
                    </a>
    @endif
        @if($session->code == $usuario->codigo)
        <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-12">
                        <button id="modificar" onclick="activate()" class="btn btn-success" type="button">
                        Modificar</button>
                        </div>
                </div>
            </div>
        @endif
        <form action="/detail-user" class="form-horizontal" method="POST" role="form">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="name">Codigo</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fas fa-hashtag"></i>
                            </div>
                            <input autofocus="" minlength="3" maxlength="60" class="form-control" id="codigo" name="codigo" placeholder="codigo" value="@if (isset($usuario) && isset($usuario->codigo)) {{ $usuario->codigo}}@endif" required type="text" readonly/>
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
                    <label for="name">Nombres</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-user"></i>
                            </div>
                            <input autofocus="" minlength="3" maxlength="60" class="form-control" id="nombres" name="nombres" placeholder="Juan Pablo" value="@if (isset($usuario) && isset($usuario->nombres)) {{ $usuario->nombres}}@endif" required type="text" readonly/>
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
                            <input autofocus="" minlength="3" maxlength="60" class="form-control" id="apellidos" name="apellidos" placeholder="Rodriguez Salcedo" value="@if (isset($usuario) && isset($usuario->apellidos)) {{ $usuario->apellidos}}@endif" required type="text" readonly/>
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
                            <input autofocus="" minlength="10" maxlength="120" class="form-control" id="correo" name="correo" placeholder="you@ucatolica.edu.co" value="@if (isset($usuario) && isset($usuario->correo)) {{ $usuario->correo}}@endif" required type="email" readonly/>
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
                    <label for="email">
                        Celular
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-at">
                                </i>
                            </div>
                            <input autofocus="" minlength="10" maxlength="20" class="form-control" id="celular" name="celular" placeholder="3---------" value="@if (isset($usuario) && isset($usuario->celular)) {{ $usuario->celular}}@endif" required type="text" readonly>
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
                                @if (count($kinds) > 0)
                                    @foreach($kinds as $k)
                                        @if (isset($usuario) && intval($usuario->tipo_idTipo) === intval($k->id))
                                            <option selected value="{{$k->id}}">{{$k->detalle}}</option>
                                        @else
                                            <option disabled value="{{$k->id}}">{{$k->detalle}}</option>
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
            <div id="pass-option" class="d-none">
            <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="password">Contraseña Actual</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group has-danger">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem">
                                    <i class="fa fa-key"></i>
                                </div>
                                <input class="form-control" minlength="8" maxlength="20" onchange="" id="password-ant" name="contrasena-ant" placeholder="Contraseña actual"  type="password">
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
                    <label for="password">Contraseña</label>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-key"></i>
                            </div>
                            <input class="form-control" minlength="8" maxlength="20" onchange="validate()" id="password" name="contrasena" placeholder="Contraseña"  type="password">
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
                            <input class="form-control" minlength="8" maxlength="20" onchange="validate()" id="password-confirm" name="contrasenaConfirmar" placeholder="Confirmar Contraseña"  type="password"/>
                            <div class="invalid-feedback" id="error-password" style="padding-left: 40px">
                                No coinciden la contraseña.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row">
                <div id="msg" class="col-md-8 col-offset-md-2">
                    @if(array_key_exists('password_user', $errors))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{$errors['password_user']}}</strong>
                        </div>  
                    @endif
                    @if(array_key_exists('user', $results))
                        <div class="alert alert-success" role="alert">
                            <strong>{{$results['user']}}</strong>
                        </div>  
                    @endif
                </div>
                <div class="col-md-6 col-offset-md-2">
                    <button id="submit-reg" class="btn btn-success d-none" type="submit">
                        <i class="fa fa-user-plus"></i>Actualizar</button>
                        <button id="submit-cancel" onclick="cancel()" class="btn btn-default d-none" type="button">
                            Cancelar</button>
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
        function activate(){
          $('#pass-option').removeClass('d-none');
          $('#submit-reg').removeClass('d-none');
          $('#submit-cancel').removeClass('d-none');
          $('#modificar').addClass('d-none');
          $('#ok-user').addClass('d-none');
          $('#msg').addClass('d-none');

          $("#nombres").attr("readonly", false); 
          $("#apellidos").attr("readonly", false); 
          $("#celular").attr("readonly", false); 
        }
        function cancel(){
          $('#pass-option').addClass('d-none');
          $('#submit-reg').addClass('d-none');
          $('#submit-cancel').addClass('d-none');
          $('#modificar').removeClass('d-none');

          $("#nombres").attr("readonly", true); 
          $("#apellidos").attr("readonly", true); 
          $("#celular").attr("readonly", true); 
        }
      window.onload = function() {
        //$('#addfile').removeClass('d-none');
      };
      </script>
@stop
