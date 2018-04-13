<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RepuestoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RepuestoTable Test Case
 */
class RepuestoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RepuestoTable
     */
    public $Repuesto;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.repuesto',
        'app.marca',
        'app.bicicleta',
        'app.cliente',
        'app.mantrepuesto',
        'app.mantenimiento',
        'app.boleta',
        'app.usuario',
        'app.mantservicio',
        'app.servicio'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Repuesto') ? [] : ['className' => RepuestoTable::class];
        $this->Repuesto = TableRegistry::get('Repuesto', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Repuesto);

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
