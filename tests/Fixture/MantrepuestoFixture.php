<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MantrepuestoFixture
 *
 */
class MantrepuestoFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'mantrepuesto';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'fecha' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'repuesto_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'mantenimiento_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'repuesto_id' => ['type' => 'index', 'columns' => ['repuesto_id'], 'length' => []],
            'mantenimiento_id' => ['type' => 'index', 'columns' => ['mantenimiento_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'mantrepuesto_ibfk_1' => ['type' => 'foreign', 'columns' => ['repuesto_id'], 'references' => ['repuesto', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'mantrepuesto_ibfk_2' => ['type' => 'foreign', 'columns' => ['mantenimiento_id'], 'references' => ['mantenimiento', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_spanish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'fecha' => '2018-03-09 21:56:01',
            'repuesto_id' => 1,
            'mantenimiento_id' => 1
        ],
    ];
}
