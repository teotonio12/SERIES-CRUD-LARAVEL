<?php

namespace Tests\Unit;

use App\Models\Episodio;
use App\Models\Temporada;
use PHPUnit\Framework\TestCase;

class TemporadaTest extends TestCase
{
  
    private $temporada;

    protected function setUp(): void
    {
        $temporada = new Temporada();
        $ep1 = new Episodio();
        $ep1->assistido = true;
        $ep2 = new Episodio();
        $ep2->assistido = false;
        $ep3 = new Episodio();
        $ep3->assistido = true;

        $temporada->episodios->add($ep1);
        $temporada->episodios->add($ep2);
        $temporada->episodios->add($ep3);

        $this->temporada = $temporada;        
    }

    public function testBuscaPorEpAssistidos()
    {

        $episodiosAssistidos = $this->temporada->getEpAssistidos();

        $this->assertCount(2,$episodiosAssistidos);
    }

    public function buscaTodosOsEp()
    {
        $episodios = $this->temporada->episodios;
        $this->assertCount(3, $episodios);
    }
}
