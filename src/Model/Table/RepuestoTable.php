<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Repuesto Model
 *
 * @property \App\Model\Table\MarcaTable|\Cake\ORM\Association\BelongsTo $Marca
 * @property \App\Model\Table\MantrepuestoTable|\Cake\ORM\Association\HasMany $Mantrepuesto
 *
 * @method \App\Model\Entity\Repuesto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Repuesto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Repuesto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Repuesto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Repuesto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Repuesto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Repuesto findOrCreate($search, callable $callback = null, $options = [])
 */
class RepuestoTable extends Table
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

        $this->setTable('repuesto');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Marca', [
            'foreignKey' => 'marca_id',
            'joinType' => 'INNER'
        ]);
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
            ->scalar('categoria')
            ->maxLength('categoria', 100)
            ->requirePresence('categoria', 'create')
            ->notEmpty('categoria');

        $validator
            ->scalar('estado')
            ->requirePresence('estado', 'create')
            ->notEmpty('estado');

        $validator
            ->numeric('precio')
            ->requirePresence('precio', 'create')
            ->notEmpty('precio');

        $validator
            ->scalar('marca_nombre')
            ->maxLength('marca_nombre', 255)
            ->requirePresence('marca_nombre', 'create')
            ->notEmpty('marca_nombre');

        $validator
            ->scalar('marca_id')
            ->notEmpty('marca_id');

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
        $rules->add($rules->existsIn(['marca_id'], 'Marca'));

        return $rules;
    }
}
