<?php
namespace App\Model\Table;

use App\Model\Entity\Fase;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Fases Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Projetos
 * @property \Cake\ORM\Association\HasMany $Relatorios
 */
class FasesTable extends Table
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

        $this->table('fases');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Projetos', [
            'foreignKey' => 'projeto_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Relatorios', [
            'foreignKey' => 'fase_id'
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('data_limite', 'valid', ['rule' => 'date'])
            ->requirePresence('data_limite', 'create')
            ->notEmpty('data_limite');

        $validator
            ->allowEmpty('data_recebimento');

        $validator
            ->add('aberto', 'valid', ['rule' => 'numeric'])
            ->requirePresence('aberto', 'create')
            ->notEmpty('aberto');

        $validator
            ->add('tipo', 'valid', ['rule' => 'numeric'])
            ->requirePresence('tipo', 'create')
            ->notEmpty('tipo');

        $validator
            ->add('aprovado', 'valid', ['rule' => 'numeric'])
            ->requirePresence('aprovado', 'create')
            ->notEmpty('aprovado');

        $validator
            ->add('created_by', 'valid', ['rule' => 'numeric'])
            ->requirePresence('created_by', 'create')
            ->notEmpty('created_by');

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
        $rules->add($rules->existsIn(['projeto_id'], 'Projetos'));
        return $rules;
    }
}
