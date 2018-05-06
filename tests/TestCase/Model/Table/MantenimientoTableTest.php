<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MantenimientoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MantenimientoTable Test Case
 */
class MantenimientoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MantenimientoTable
     */
    public $Mantenimiento;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.mantenimiento',
        'app.bicicleta',
        'app.boleta',
        'app.mantrepuesto',
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
        $config = TableRegistry::exists('Mantenimiento') ? [] : ['className' => MantenimientoTable::class];
        $this->Mantenimiento = TableRegistry::get('Mantenimiento', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Mantenimiento);

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
