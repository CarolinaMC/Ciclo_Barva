<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Auth\AbstractPasswordHasher;

/**
 * Usuario Entity
 *
 * @property int $id
 * @property string $cedula
 * @property string $nombre
 * @property string $primer_ape
 * @property string $segundo_ape
 * @property string $puesto
 * @property string $password
 * @property bool $activo
 */
class Usuario extends Entity
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
        'cedula' => true,
        'nombre' => true,
        'primer_ape' => true,
        'segundo_ape' => true,
        'puesto' => true,
        'password' => true,
        'activo' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
   protected function _setPassword($value){
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);

    }
}
