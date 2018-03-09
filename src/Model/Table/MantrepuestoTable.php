<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mantrepuesto Model
 *
 * @property \App\Model\Table\RepuestoTable|\Cake\ORM\Association\BelongsTo $Repuesto
 * @property \App\Model\Table\MantenimientoTable|\Cake\ORM\Association\BelongsTo $Mantenimiento
 *
 * @method \App\Model\Entity\Mantrepuesto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mantrepuesto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mantrepuesto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mantrepuesto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mantrepuesto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mantrepuesto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mantrepuesto findOrCreate($search, callable $callback = null, $options = [])
 */
class MantrepuestoTable extends Table
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

        $this->setTable('mantrepuesto');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Repuesto', [
            'foreignKey' => 'repuesto_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Mantenimiento', [
            'foreignKey' => 'mantenimiento_id',
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
            ->dateTime('fecha')
            ->requirePresence('fecha', 'create')
            ->notEmpty('fecha');

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
        $rules->add($rules->existsIn(['repuesto_id'], 'Repuesto'));
        $rules->add($rules->existsIn(['mantenimiento_id'], 'Mantenimiento'));

        return $rules;
    }
}
