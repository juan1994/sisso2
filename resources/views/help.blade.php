@extends('layout-default')
@section('content')
    <div>
        <h2>Agregar Anexo</h2>
        <form method="POST" enctype="multipart/form-data" action"/help">
            {{ csrf_field() }}
            <span>{{$path}}</span>
            <br>
            <div class="form-group">
                <label for="m_photo" class="col-md-4 control-label">Nombre Anexo</label>
                <div class="col-md-6">
                    <input type="text" name="nombre" class="form-control" value="" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="m_photo" class="col-md-4 control-label">Detalle</label>
                <div class="col-md-6">
                    <textarea rows="4" cols="50" class="form-control" name="descripcion" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                <input id="m_photo" type="file" class="form-control-file space" name="myFile" required>
                </div>
            </div>
            <input type="hidden" name="idproject" value=""/>
            <div class="col-md-12">
                <button type="submit">Agregar</button>
            </div>
        </form>
    </div>
    
@stop