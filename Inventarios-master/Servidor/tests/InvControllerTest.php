<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


use App\ArtDisponible;

class InvControllerTest extends TestCase
{
	use WithoutMiddleware;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $articulo = '';
        $descripcion = '';
        $fabricante = '';
        $empresa = 'ASSIS';
        $usuario = 'ADMIN'; // El usuario debe tener permisos en la base de datos par aver la $empresa.
        
        $artDisponible = ArtDisponible::getDisponible($articulo,$descripcion,$fabricante,$empresa,$usuario);

        $this->assertNotEmpty($artDisponible);
    }
}
