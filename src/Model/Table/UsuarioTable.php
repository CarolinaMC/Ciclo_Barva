<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuario Model
 *
 * @method \App\Model\Entity\Usuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usuario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Usuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario findOrCreate($search, callable $callback = null, $options = [])
 */
class UsuarioTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('usuario');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('cedula')
            ->maxLength('cedula', 20)
            ->requirePresence('cedula', 'create')
            ->notEmpty('cedula');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 20)
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->scalar('primer_ape')
            ->maxLength('primer_ape', 20)
            ->requirePresence('primer_ape', 'create')
            ->notEmpty('primer_ape');

        $validator
            ->scalar('segundo_ape')
            ->maxLength('segundo_ape', 20)
            ->requirePresence('segundo_ape', 'create')
            ->notEmpty('segundo_ape');

        $validator
            ->scalar('puesto')
            ->requirePresence('puesto', 'create')
            ->notEmpty('puesto');

        $validator
            ->scalar('password')
            ->maxLength('password', 20)
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->boolean('activo')
            ->requirePresence('activo', 'create')
            ->notEmpty('activo');

        return $validator;
    }

     public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['cedula']));

        return $rules;
    }
}
