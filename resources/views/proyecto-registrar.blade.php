@extends('layout-default')
@section('content')
<!-- Stylesheets -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </link>
</link>

<body>

    <div class="container">
        <form action="/register-project" class="form-horizontal" method="POST" role="form">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <h2>
                        Registro Proyecto
                    </h2>
                    <hr>
                    </hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 field-label-responsive">
                    <label for="name">
                        Nombre del proyecto
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-book"></i>
                            </div>
                            <input autofocus="" class="form-control" id="NombreProyecto" name="NombreProyecto" placeholder="Sistema de Informacíon" required="" type="text">
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
                        Fecha de Inicio
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input autofocus="" class="form-control" id="FechaInicio" name="FechaInicio" placeholder="Rodriguez Salcedo" required="" type="date">
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
                        Fecha de Finalización
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input autofocus="" class="form-control" id="FechaFinalizacion" name="FechaFinalizacion" placeholder="" required="" type="date">
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
                        Presupuesto
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-money" style="font-size:22px"></i>
                            </div>
                            <input autofocus="" class="form-control quantity" id="Presupuesto" name="Presupuesto" placeholder="$3000000" required="" type="text">
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
                    <label for="email">
                        Poblacion Beneficiada
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-users"></i>
                            </div>
                            <input autofocus="" class="form-control quantity" id="PoblacionBeneficiada" name="PoblacionBeneficiada" placeholder="100" required="" type="text"></input>
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
                        Nombre del Responsable
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-user-o"></i>
                            </div>
                            <input autofocus="" class="form-control" id="PNombreResponsable" name="NombreResponsable" placeholder="Juan Carlos Duarte" required="" type="text">
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
                    <label for="selectTipoModalidad">
                        Tipo de Modalidad
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-vcard-o" style="font-size:20px">
                                </i>
                            </div>
                            <select class="form-control" id="selectTipoModalidad" name="TipoModalidad" required>
                                <option Value="">Seleccione...</option>
                                <option value="1">Trabajo de grado</option>
                                <option value="2">Informatica Social</option>
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
                    <label for="email">
                        Breve Descripcion
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-edit"></i>
                            </div>
                            <textarea  autofocus="" class="form-control" id="BreveDescripcion" name="BreveDescripcion" rows="5" required="" ></textarea>
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
                        Objetivo General
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-edit"></i>
                            </div>
                            <textarea  autofocus="" class="form-control" id="ObjetivoGeneral" name="ObjetivoGeneral" rows="5" required="" ></textarea>
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
                        <label for="email">Segundo Integrante</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem">
                                    <i class="fa fa-user-o"></i>
                                </div>
                                <input autofocus="" minlength="5" maxlength="10" onchange="validate('1')" class="form-control quantity" id="segundo-integrante" name="segundo-integrante" type="text">
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                            <div id="msg-user1" class="form-control-feedback d-none">
                                    <span class="text-danger align-middle">
                                        El usuario no existe.
                                    </span>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="email">Tercer Integrante</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem">
                                    <i class="fa fa-user-o"></i>
                                </div>
                                <input autofocus="" minlength="5" maxlength="10" onchange="validate('2')" class="form-control quantity" id="tercer-integrante" name="tercer-integrante" type="text">
                                </input>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                            <div id="msg-tintegrante" class="form-control-feedback d-none">
                                <span class="text-danger align-middle">
                                    Es requerido completar el campo Segundo integrante.
                                </span>
                            </div>
                            <div id="msg-user-equal" class="form-control-feedback d-none">
                                <span class="text-danger align-middle">
                                    Uno de los usuarios esta más de una vez.
                                </span>
                            </div>
                            <div id="msg-user2" class="form-control-feedback d-none">
                                    <span class="text-danger align-middle">
                                        El usuario no existe.
                                    </span>
                            </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <a href="{{ route('proyecto') }}">
                    <button class="btn btn-warning" type="button">
                        <i class="fa fa-user-plus"></i>
                        Cancelar
                    </button>
                    </a>
                    <button id="submit-button" class="btn btn-success" type="submit">
                        <i class="fa fa-user-plus"></i>
                        Enviar
                    </button>
                </div>
            </div>
            <div>
              <h1>  
              </h1>
            </div>
        </form>
    </div>
<script>
    function validate(parm){
        if(parm == 1 && $('#segundo-integrante').val().length > 0){
            $.get( "/user-code/" + $('#segundo-integrante').val())
            .done(function( data ) {
                console.log(data);
                if(data.status == 0){
                    $('#msg-user1').removeClass('d-none');
                }else{
                    $('#msg-user1').addClass('d-none');
                }
            });
        }else if(parm == 2 && $('#tercer-integrante').val().length > 0){
            $.get( "/user-code/" + $('#tercer-integrante').val())
            .done(function( data ) {
                if(data.status == 0){
                    $('#msg-user2').removeClass('d-none');
                }else{
                    $('#msg-user2').addClass('d-none');
                }
            });
        }
        check();
    }
    function check(){
        if($('#tercer-integrante').val().length > 0 && $('#segundo-integrante').val().length == 0){
            $('#msg-tintegrante').removeClass('d-none');
            $("#submit-button").attr("disabled", true); 
        }else{
            $('#msg-tintegrante').addClass('d-none');
            $("#submit-button").attr("disabled", false); 
        }
        if(($('#tercer-integrante').val().length > 0 && $('#segundo-integrante').val().length > 0
        && $('#tercer-integrante').val() == $('#segundo-integrante').val())
        || ($('#tercer-integrante').val() == "{{$session->code}}" 
            || $('#segundo-integrante').val() == "{{$session->code}}") ){
            $('#msg-user-equal').removeClass('d-none');
            $("#submit-button").attr("disabled", true); 
        }else{
            $('#msg-user-equal').addClass('d-none');
            $("#submit-button").attr("disabled", false); 
        }
    }

    window.onload = function() {
        $(".quantity").keypress(function (e) {
            //if the letter is not digit then display error and don't type anything
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                //display error message
                return false;
            }
        });
    };
</script>
</body>
@stop
