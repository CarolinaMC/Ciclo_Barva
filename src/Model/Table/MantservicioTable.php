<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mantservicio Model
 *
 * @property \App\Model\Table\ServicioTable|\Cake\ORM\Association\BelongsTo $Servicio
 * @property \App\Model\Table\MantenimientoTable|\Cake\ORM\Association\BelongsTo $Mantenimiento
 *
 * @method \App\Model\Entity\Mantservicio get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mantservicio newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mantservicio[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mantservicio|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mantservicio patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mantservicio[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mantservicio findOrCreate($search, callable $callback = null, $options = [])
 */
class MantservicioTable extends Table
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

        $this->setTable('mantservicio');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Servicio', [
            'foreignKey' => 'servicio_id',
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
        $rules->add($rules->existsIn(['servicio_id'], 'Servicio'));
        $rules->add($rules->existsIn(['mantenimiento_id'], 'Mantenimiento'));

        return $rules;
    }
}
