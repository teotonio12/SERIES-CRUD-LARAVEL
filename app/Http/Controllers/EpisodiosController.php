<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request)
    {

        return view('episodios.index', [
            'episodios' => $temporada->episodios,
            'temporadaId' => $temporada->id,
            'mensagem' => $request->session()->get('mensagem')
        ]);
    }

    public function assistir(Temporada $temporada, Request $request)
    {

        $epAssistidos = $request->episodios;
        $temporada->episodios->each(
            function (Episodio $episodio) use ($epAssistidos) {
                $episodio->assistido = in_array(
                    $episodio->id, // id por id verificando
                    $epAssistidos //lista de id dos ep assistidos
                );
            }
        );
        $temporada->push();

        $request->session()
            ->flash(
                'mensagem',
                'Episódios marcados/desmarcados como assistidos'
            );

        return redirect()->back(); //voltar para ultima pagina
    }
}
