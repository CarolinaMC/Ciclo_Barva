<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Servicio Model
 *
 * @method \App\Model\Entity\Servicio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Servicio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Servicio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Servicio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Servicio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Servicio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Servicio findOrCreate($search, callable $callback = null, $options = [])
 */
class ServicioTable extends Table
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

        $this->setTable('servicio');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Mantrepuesto', [
            'foreignKey' => 'repuesto_id'
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
            ->scalar('descripcion')
            ->maxLength('descripcion', 100)
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

        $validator
            ->integer('precio')
            ->requirePresence('precio', 'create')
            ->notEmpty('precio');

        return $validator;
    }
}
