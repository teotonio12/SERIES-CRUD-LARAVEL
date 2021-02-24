@extends('layout')


@section('cabecalho')
    Episódios
@endsection

@section('conteudo')
   <form action="" method="POST"> 
        @foreach ($episodios as $episodio)
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                Episódio {{$episodio->numero}}
                <input type="checkbox">
                </li>
            </ul>
        @endforeach

        <button type="submit" class="btn btn-primary mt-2 mb-2"> Salvar </button>
    </form> 
    
@endsection