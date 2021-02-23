<?php 

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index (Request $request){
  
        $series = Serie::query()
            ->orderBy('nome')
            ->get();

        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series','mensagem'));
    }

    public function create ()
    {
        return view('series.create');     
    }

    public function store ( SeriesFormRequest $request){

        // $serie = new Serie();

        // $serie->nome = $request->nome;
        // $serie->save();

        $serie = Serie::create([
            'nome' => $request->nome
        ]);
        
        $request->session()
            ->flash(
                'mensagem',
                "Série com id {$serie->id} criada: {$serie->nome}"
            );
            return redirect()->route("series.index");
    }

    public function destroy (Request $request){
        Serie::destroy($request->id);

        $request->session()
            ->flash(
                'mensagem',
                "Série removida com sucesso"
            );
        return redirect()->route("series.index");
    }

}