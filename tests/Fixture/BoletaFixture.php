<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BoletaFixture
 *
 */
class BoletaFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'boleta';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'fecha_entrada' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'fecha_salida' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'cliente_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'usuario_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'cliente_id' => ['type' => 'index', 'columns' => ['cliente_id'], 'length' => []],
            'usuario_id' => ['type' => 'index', 'columns' => ['usuario_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'boleta_ibfk_1' => ['type' => 'foreign', 'columns' => ['cliente_id'], 'references' => ['cliente', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'boleta_ibfk_2' => ['type' => 'foreign', 'columns' => ['usuario_id'], 'references' => ['usuario', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
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
            'fecha_entrada' => '2018-03-08 02:06:58',
            'fecha_salida' => '2018-03-08 02:06:58',
            'cliente_id' => 1,
            'usuario_id' => 1
        ],
    ];
}
