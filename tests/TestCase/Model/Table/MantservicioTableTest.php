<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MantservicioTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MantservicioTable Test Case
 */
class MantservicioTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MantservicioTable
     */
    public $Mantservicio;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mantservicio',
        'app.servicio',
        'app.mantenimiento',
        'app.bicicleta',
        'app.cliente',
        'app.marca',
        'app.boleta',
        'app.usuario',
        'app.mantrepuesto',
        'app.repuesto'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Mantservicio') ? [] : ['className' => MantservicioTable::class];
        $this->Mantservicio = TableRegistry::get('Mantservicio', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Mantservicio);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
