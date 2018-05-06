<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Mantenimiento Entity
 *
 * @property int $id
 * @property string $garantia
 * @property string $prioridad
 * @property string $estado
 * @property string $descripcion
 * @property float $manoObra
 * @property int $bicicleta_id
 * @property int $boleta_id
 *
 * @property \App\Model\Entity\Bicicletum $bicicletum
 * @property \App\Model\Entity\Boletum $boletum
 * @property \App\Model\Entity\Mantrepuesto[] $mantrepuesto
 * @property \App\Model\Entity\Mantservicio[] $mantservicio
 */
class Mantenimiento extends Entity
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
        'garantia' => true,
        'prioridad' => true,
        'estado' => true,
        'descripcion' => true,
        'manoObra' => true,
        'bicicleta_id' => true,
        'boleta_id' => true,
        'bicicletum' => true,
        'boletum' => true,
        'mantrepuesto' => true,
        'mantservicio' => true
    ];
}
