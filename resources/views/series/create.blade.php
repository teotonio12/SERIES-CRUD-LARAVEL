@extends('layout')

@section('cabecalho')
    Adicionar Séries
@endsection

@section('conteudo')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post">
        @csrf
            <div class="row">
                <div class="col col-6">
                    <label for="nome"> Nome </label>
                    <input type="text" class="form-control" name="nome" id="nome">
                </div>
                <div class="col col-3">
                    <label for="qtd_temporadas"> Nº Temporadas </label>
                    <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
                </div>
                <div class="col col-3">
                    <label for="ep_temporadas"> Ep. Temporadas </label>
                    <input type="number" class="form-control" name="ep_temporadas" id="ep_temporadas">
                </div>
            </div>
            <button class="btn btn-primary mt-2">Adicionar</button>
        </form>
@endsection