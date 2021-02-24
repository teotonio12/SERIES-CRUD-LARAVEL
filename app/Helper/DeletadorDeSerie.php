<?php

namespace App\Helper;

use App\Models\{ Episodio, Serie, Temporada};
use Illuminate\Support\Facades\DB;

class DeletadorDeSerie
{
    public function deletarSerie(int $id) :string
    {
        DB::beginTransaction();
            $serie = Serie::find($id);
                
            $nomeSerie = $serie->nome;
            
            $this->removerTemporada($serie);
            
            $serie->delete();
        DB::commit();
        return $nomeSerie;
    }

    private function removerTemporada(Serie $serie): void
    {
        $serie->temporadas->each(
            function (Temporada $temporada) {
                $this->removerEpisodios($temporada);
            $temporada->delete();
            }
        );
        
    }

    private function removerEpisodios ( Temporada $temporada):void
    {
        $temporada->episodios()->each(
            function (Episodio $episodio) {
                $episodio->delete();
            }
        );
    }
}