<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Http\Request;
use App\Helper\{ CriadorDeSerie, DeletadorDeSerie};


class SeriesController extends Controller
{
    public function index(Request $request)
    {

        $series = Serie::query()
            ->orderBy('nome')
            ->get();

        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CriadorDeSerie $criadorDeSerie)
    {

        $serie = $criadorDeSerie->criarSerie(
            $request->nome,
            $request->qtd_temporadas,
            $request->ep_temporadas
        );

        $request->session()
            ->flash(
                'mensagem',
                "Série {$serie->id} - {$serie->nome} e sua temporadas e episódios criados com sucesso"
            );
        return redirect()->route("series.index");
    }

    public function destroy(Request $request, DeletadorDeSerie $deletadorDeSerie)
    {
        
        $nomeSerie = $deletadorDeSerie->deletarSerie(
            $request->id
        );

        $request->session()
            ->flash(
                'mensagem',
                "Série {$nomeSerie} removida com sucesso"
            );
        return redirect()->route("series.index");
    }

    public function update(Request $request, int $id)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();

    }
}
