@extends('layout')

@section('content')
    @if ($status === 'C' || count($errors) > 0 )
    <div>
        <img src="/not_allowed.png" width="64px"/>
        <h2>Formulario</h2>
        <form method="POST" action"/help">
            {{ csrf_field() }}
            <input type="text" minLength="5" value="@if (isset($data)) {{ $data['name']}}@endif" required name="name"/>
            <br>
            <button type="submit">submit</button>
        </form>
    </div>
    @endif
    @if ($status === 'S')
        <div>
            @if (count($errors) > 0)
                <h3>Registros con Errores</h3>
            @else
                <h3>Registros guardados</h3>
            @endif
            <hr>
            @if (count($errors) > 0)
                <ul>
                @foreach($errors as $d)
                    <li>{{ $d }}</li>
                @endforeach
                </ul>
            @endif
            @if (count($res) > 0)
                <ul>
                @foreach($res as $r)
                    <li>{{ $r['codigo'][0] }}</li>
                @endforeach
                </ul>
            @endif
            <a href="/help">Back</a>
        </div>
    @endif
@stop