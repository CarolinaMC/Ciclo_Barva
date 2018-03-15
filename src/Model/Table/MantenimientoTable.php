<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mantenimiento Model
 *
 * @property \App\Model\Table\BicicletaTable|\Cake\ORM\Association\BelongsTo $Bicicleta
 * @property \App\Model\Table\BoletaTable|\Cake\ORM\Association\BelongsTo $Boleta
 * @property \App\Model\Table\MantrepuestoTable|\Cake\ORM\Association\HasMany $Mantrepuesto
 * @property \App\Model\Table\MantservicioTable|\Cake\ORM\Association\HasMany $Mantservicio
 *
 * @method \App\Model\Entity\Mantenimiento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mantenimiento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mantenimiento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mantenimiento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mantenimiento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mantenimiento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mantenimiento findOrCreate($search, callable $callback = null, $options = [])
 */
class MantenimientoTable extends Table
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

        $this->setTable('mantenimiento');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Bicicleta', [
            'foreignKey' => 'bicicleta_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Boleta', [
            'foreignKey' => 'boleta_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Mantrepuesto', [
            'foreignKey' => 'mantenimiento_id'
        ]);
        $this->hasMany('Mantservicio', [
            'foreignKey' => 'mantenimiento_id'
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
            ->scalar('garantia')
            ->allowEmpty('garantia', 'create');

        $validator
            ->scalar('prioridad')
            ->requirePresence('prioridad', 'create')
            ->notEmpty('prioridad');

        $validator
            ->scalar('estado')
            ->requirePresence('estado', 'create')
            ->notEmpty('estado');

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
        $rules->add($rules->existsIn(['bicicleta_id'], 'Bicicleta'));
        $rules->add($rules->existsIn(['boleta_id'], 'Boleta'));

        return $rules;
    }
}
