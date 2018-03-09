<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MantservicioFixture
 *
 */
class MantservicioFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'mantservicio';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'fecha' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'servicio_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'mantenimiento_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'servicio_id' => ['type' => 'index', 'columns' => ['servicio_id'], 'length' => []],
            'mantenimiento_id' => ['type' => 'index', 'columns' => ['mantenimiento_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'mantservicio_ibfk_1' => ['type' => 'foreign', 'columns' => ['servicio_id'], 'references' => ['servicio', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'mantservicio_ibfk_2' => ['type' => 'foreign', 'columns' => ['mantenimiento_id'], 'references' => ['mantenimiento', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'fecha' => '2018-03-09 21:56:19',
            'servicio_id' => 1,
            'mantenimiento_id' => 1
        ],
    ];
}
