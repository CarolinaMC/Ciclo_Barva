<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Boleta Model
 *
 * @property \App\Model\Table\ClienteTable|\Cake\ORM\Association\BelongsTo $Cliente
 * @property \App\Model\Table\UsuarioTable|\Cake\ORM\Association\BelongsTo $Usuario
 *
 * @method \App\Model\Entity\Boletum get($primaryKey, $options = [])
 * @method \App\Model\Entity\Boletum newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Boletum[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Boletum|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Boletum patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Boletum[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Boletum findOrCreate($search, callable $callback = null, $options = [])
 */
class BoletaTable extends Table
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

        $this->setTable('boleta');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Cliente', [
            'foreignKey' => 'cliente_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Usuario', [
            'foreignKey' => 'usuario_id',
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
            ->dateTime('fecha_entrada')
            //->requirePresence('fecha_entrada', 'create')
            ->allowEmpty('fecha_entrada');

        $validator
            ->dateTime('fecha_salida')
            //->requirePresence('fecha_salida', 'create')
            ->allowEmpty('fecha_salida');

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
        $rules->add($rules->existsIn(['usuario_id'], 'Usuario'));

        return $rules;
    }
}
