<?php

namespace App\Http\Controllers;

use App\Models\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index (int $temporada){
        
        $temporada = Temporada::find($temporada);
        $episodios = $temporada->episodios;
        
        
      
        return view(
            'episodios.index', [
                'episodios' => $episodios
            ]);

    }
}
