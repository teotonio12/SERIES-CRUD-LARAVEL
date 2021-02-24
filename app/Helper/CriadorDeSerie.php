<?php

namespace App\Helper;

use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie (string $nomeSerie, int $qtdTemporadas, int $ep_temporadas ) 
    {
       
        DB::beginTransaction();
            $serie = Serie::create(['nome' => $nomeSerie]);
            
            $this->criarTemporadas($qtdTemporadas, $serie, $ep_temporadas);

        DB::commit();

        return $serie;
    }

    public function criarTemporadas($qtdTemporadas, $serie, $ep_temporadas){

        for ($i=1; $i < $qtdTemporadas; $i++) { 
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            
            $this->criarEpisodios($ep_temporadas,$temporada);
        }
    }

    public function criarEpisodios ($ep_temporadas,$temporada)
    {
        for ($j=1; $j <= $ep_temporadas; $j++) { 
            $temporada->epsodios()->create(['numero' => $j]);
        }
    }
}