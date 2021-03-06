<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Repuesto Entity
 *
 * @property int $id
 * @property string $descripcion
 * @property string $categoria
 * @property string $estado
 * @property float $precio
 * @property int $marca_id
 * @property string $marca_nombre
 *
 * @property \App\Model\Entity\Marca $marca
 * @property \App\Model\Entity\Mantrepuesto[] $mantrepuesto
 */
class Repuesto extends Entity
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
        'descripcion' => true,
        'categoria' => true,
        'estado' => true,
        'precio' => true,
        'marca_id' => true,
        'marca_nombre' => true,
        'marca' => true,
        'mantrepuesto' => true
    ];
}
