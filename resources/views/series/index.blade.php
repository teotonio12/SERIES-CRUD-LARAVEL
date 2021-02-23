@extends('layout')

@section('cabecalho')
    Séries
@endsection

@section('conteudo')
    @if(!empty($mensagem))
        <div class= "alert alert-success">
        {{$mensagem}}
    </div>
    @endif
    
    <a href="{{route('series.store')}}" class="btn btn-dark mb-2"> Adicionar</a>
        <ul class="list-group">
            @foreach ($series as $serie)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{$serie->nome}} 
                    <form action="/series/{{ $serie->id }}" method="POST"
                    onsubmit="return confirm('Tem certeza que deseja remover a série {{ addslashes($serie->nome)}} ?')">
                    @csrf
                    @method('delete')
                        <button class="btn btn-danger btn-sm"> <i class="fa fa-trash" aria-hidden="true"></i> </button>
                    </form>
                </li>
            @endforeach
        </ul>
@endsection