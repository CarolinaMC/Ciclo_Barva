<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Boletum Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $fecha_entrada
 * @property \Cake\I18n\FrozenTime $fecha_salida
 * @property int $cliente_id
 * @property int $usuario_id
 *
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\Usuario $usuario
 */
class Boletum extends Entity
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
        'fecha_entrada' => true,
        'fecha_salida' => true,
        'cliente_id' => true,
        'usuario_id' => true,
        'cliente' => true,
        'usuario' => true
    ];
}
