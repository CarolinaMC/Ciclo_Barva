<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cliente Model
 *
 * @property \App\Model\Table\BicicletaTable|\Cake\ORM\Association\HasMany $Bicicleta
 *
 * @method \App\Model\Entity\Cliente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cliente newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cliente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cliente|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cliente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cliente[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cliente findOrCreate($search, callable $callback = null, $options = [])
 */
class ClienteTable extends Table
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

        $this->setTable('cliente');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Bicicleta', [
            'foreignKey' => 'cliente_id'
        ]);
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
            ->scalar('alias')
            ->maxLength('alias', 20)
            ->allowEmpty('alias','NULL');
        $validator
            ->scalar('direccion')
            ->allowEmpty('direccion','NULL');

        $validator
            ->integer('telefono')
            ->maxLength('telefono', 8)
            ->requirePresence('telefono', 'create')
            ->notEmpty('telefono');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['cedula']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
