<?php

namespace Tests\Feature;

use App\Helper\CriadorDeSerie;
use App\Models\Serie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CriadorDeSerieTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCriarSerie()
    {
        $criadorDeSerie = new CriadorDeSerie();
        $serieCriada = $criadorDeSerie->criarSerie(
            'Nome de Teste',
            '1',
            '1'
        );

        $this->assertInstanceOf(Serie::class,$serieCriada);
        $this->assertDatabaseHas('series',['nome' => 'Nome de Teste']);
        $this->assertDatabaseHas('temporadas',['serie_id' => $serieCriada->id, 'numero' => 1 ]);
        $this->assertDatabaseHas('episodios', ['numero' => 1 ]);

        
    }
}
