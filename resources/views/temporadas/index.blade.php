@extends('layout')


@section('cabecalho')
    Temporadas de {{$serie->nome}}
@endsection

@section('conteudo')
    @foreach ($temporadas as $temporada)
        <ul class="list-group">
            <li class="list-group-item">
                Temporada {{$temporada->numero}}
            </li>
        </ul>
    @endforeach
@endsection