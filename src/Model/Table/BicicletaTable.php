<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bicicleta Model
 *
 * @property \App\Model\Table\ClienteTable|\Cake\ORM\Association\BelongsTo $Cliente
 * @property \App\Model\Table\MarcaTable|\Cake\ORM\Association\BelongsTo $Marca
 *
 * @method \App\Model\Entity\Bicicletum get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bicicletum newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bicicletum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bicicletum|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bicicletum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bicicletum[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bicicletum findOrCreate($search, callable $callback = null, $options = [])
 */
class BicicletaTable extends Table
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

        $this->setTable('bicicleta');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cliente', [
            'foreignKey' => 'cliente_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Marca', [
            'foreignKey' => 'marca_id',
            'joinType' => 'INNER'
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
            ->scalar('tamano')
            ->maxLength('tamano', 20)
            ->requirePresence('tamano', 'create')
            ->notEmpty('tamano');

        $validator
            ->scalar('color')
            ->maxLength('color', 150)
            ->requirePresence('color', 'create')
            ->notEmpty('color');

        $validator
            ->scalar('descripcion')
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

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
        $rules->add($rules->existsIn(['cliente_id'], 'Cliente'));
        $rules->add($rules->existsIn(['marca_id'], 'Marca'));

        return $rules;
    }
}
