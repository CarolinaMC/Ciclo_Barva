<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BoletaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BoletaTable Test Case
 */
class BoletaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BoletaTable
     */
    public $Boleta;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.boleta',
        'app.cliente',
        'app.bicicleta',
        'app.marca',
        'app.usuario'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Boleta') ? [] : ['className' => BoletaTable::class];
        $this->Boleta = TableRegistry::get('Boleta', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Boleta);

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
