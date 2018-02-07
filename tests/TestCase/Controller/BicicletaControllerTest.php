<?php
namespace App\Test\TestCase\Controller;

use App\Controller\BicicletaController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\BicicletaController Test Case
 */
class BicicletaControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bicicleta',
        'app.cliente',
        'app.marca'
    ];

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
