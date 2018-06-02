@extends('layout-default')
@section('content')
<!-- Stylesheets -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"></link>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"></link>
    <div class="container">
        <form action="/create-project" class="form-horizontal" method="POST" role="form">
        {{ csrf_field() }}
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <h2>
                        Actualizar Proyecto
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
                            <input autofocus="" class="form-control" id="Presupuesto" name="Presupuesto" placeholder="$3000000" required="" type="text">
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
                            <input autofocus="" class="form-control" id="PoblacionBeneficiada" name="PoblacionBeneficiada" placeholder="100" required="" type="text">
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
                            <select class="form-control" id="selectTipoModalidad" required="">
                                <option>
                                </option>
                                <option>
                                    Trabajo de grado
                                </option>
                                <option>
                                    Informatica Social
                                </option>
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
                            <textarea  autofocus="" class="form-control" id="BreveDescripcion" name="BreveDescripcion" rows="5" required="" >
                            </textarea>
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
                            <textarea  autofocus="" class="form-control" id="ObjetivoGeneral" name="ObjetivoGeneral" rows="5" required="" >
                            </textarea>
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
                        Documento
                    </label>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem">
                                <i class="fa fa-file-word-o"></i>
                            </div>
                            <input autofocus="" class="form-control" id="documento" name="documento"  required="" type="file">
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
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <a href="{{ route('proyecto') }}">
                    <button class="btn btn-warning" type="button">
                        <i class="fa fa-user-plus"></i>
                        Cancelar
                    </button>
                    </a>
                    <button class="btn btn-success" type="submit">
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
@stop
