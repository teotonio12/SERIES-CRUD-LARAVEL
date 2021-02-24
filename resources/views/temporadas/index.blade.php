@extends('layout')


@section('cabecalho')
    Temporadas de {{$serie->nome}}
@endsection

@section('conteudo')
    @foreach ($temporadas as $temporada)
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/temporadas/{{ $temporada->id }}/episodios">
                    Temporada {{$temporada->numero}}
                </a>
                <span class="badge badge-secondary">
                   {{ $temporada->getEpAssistidos()->count() }} /  {{ $temporada->episodios->count() }}
                </span>
            </li>
        </ul>
    @endforeach
@endsection