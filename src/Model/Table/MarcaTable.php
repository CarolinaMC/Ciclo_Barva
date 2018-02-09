<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Marca Model
 *
 * @property \App\Model\Table\BicicletaTable|\Cake\ORM\Association\HasMany $Bicicleta
 *
 * @method \App\Model\Entity\Marca get($primaryKey, $options = [])
 * @method \App\Model\Entity\Marca newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Marca[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Marca|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Marca patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Marca[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Marca findOrCreate($search, callable $callback = null, $options = [])
 */
class MarcaTable extends Table
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

        $this->setTable('marca');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Bicicleta', [
            'foreignKey' => 'marca_id'
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
            ->scalar('nombre')
            ->maxLength('nombre', 150)
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->scalar('tipo')
            ->requirePresence('tipo', 'create')
            ->notEmpty('tipo');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['nombre']));
        return $rules;
    }
}
