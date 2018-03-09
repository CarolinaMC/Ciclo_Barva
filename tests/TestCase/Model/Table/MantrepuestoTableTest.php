<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MantrepuestoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MantrepuestoTable Test Case
 */
class MantrepuestoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MantrepuestoTable
     */
    public $Mantrepuesto;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mantrepuesto',
        'app.repuesto',
        'app.marca',
        'app.bicicleta',
        'app.cliente',
        'app.mantenimiento',
        'app.boleta',
        'app.usuario',
        'app.mantservicio'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Mantrepuesto') ? [] : ['className' => MantrepuestoTable::class];
        $this->Mantrepuesto = TableRegistry::get('Mantrepuesto', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Mantrepuesto);

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
