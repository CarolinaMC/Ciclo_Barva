<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ServicioTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ServicioTable Test Case
 */
class ServicioTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ServicioTable
     */
    public $Servicio;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Servicio') ? [] : ['className' => ServicioTable::class];
        $this->Servicio = TableRegistry::get('Servicio', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Servicio);

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
}
