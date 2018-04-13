<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bicicletum Entity
 *
 * @property int $id
 * @property string $tamano
 * @property string $color
 * @property string $descripcion
 * @property int $cliente_id
 * @property int $marca_id
 * @property string $marca_nombre
 *
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\Marca $marca
 */
class Bicicletum extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'tamano' => true,
        'color' => true,
        'descripcion' => true,
        'cliente_id' => true,
        'marca_id' => true,
        'marca_nombre' => true,
        'cliente' => true,
        'marca' => true
    ];
}
