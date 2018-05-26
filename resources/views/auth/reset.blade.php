@extends('layout-default')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @if(array_key_exists('token', $errors))
                <div class="form-group row">
                    <div class="alert alert-warning col-md-12" role="alert">
                        {{$errors['token']}}
                    </div>
                </div>
                @else
            <div class="card">
                <div class="card-header">Restablecer contraseña</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('restablecer-contrasena-p') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" minlength="8" maxlength="20" type="password" onchange="validate()" class="form-control{{ array_key_exists('password', $errors) ? ' is-invalid' : '' }}" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" minlength="8" maxlength="20" onchange="validate()" type="password" class="form-control{{ array_key_exists('password_confirmation', $errors) ? ' is-invalid' : '' }}" name="password_confirmation" required>

                                <div class="invalid-feedback" id="error-password" style="padding-left: 40px">
                                    No coinciden la contraseña.
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="submit-reg" type="submit" class="btn btn-primary">
                                    Restablecer contraseña
                                </button>
                            </div>
                        </div>
                        <div class="form-group row mb-0" style="margin-top: 30px;">
                            <div class="col-md-6 offset-md-4">
                                @if (array_key_exists('user', $errors))
                                    <div class="alert alert-warning" role="alert">
                                        <strong>{{ $errors['user'] }}</strong>
                                    </div>
                                @endif
                                @if (array_key_exists('user', $result))
                                    <div class="alert alert-success" role="alert">
                                        <strong>{{ $result['user'] }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
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
@endsection
