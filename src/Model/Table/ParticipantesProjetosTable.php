<?php

namespace App\Model\Table;

use App\Model\Entity\ParticipantesProjeto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ParticipantesProjetos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 * @property \Cake\ORM\Association\BelongsTo $Projetos
 */
class ParticipantesProjetosTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('participantes_projetos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pessoas', [
            'foreignKey' => 'pessoa_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Projetos', [
            'foreignKey' => 'projeto_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->add('id', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('id', 'create');

        $validator
                ->add('carga_horaria', 'valid', ['rule' => 'numeric'])
                ->requirePresence('carga_horaria', 'create')
                ->notEmpty('carga_horaria');

        $validator
                ->add('tipo_participante', 'valid', ['rule' => 'numeric'])
                ->requirePresence('tipo_participante', 'create')
                ->notEmpty('tipo_participante');



        $validator
                ->allowEmpty('bolsa');

        $validator
                ->add('data_entrada', 'valid', ['rule' => 'date'])
                ->requirePresence('data_entrada', 'create')
                ->notEmpty('data_entrada');

        $validator
                ->add('data_saida', 'valid', ['rule' => 'date'])
                ->allowEmpty('data_saida');


        $validator
                ->add('data_entrada', 'custom', ['rule' => [$this, 'validarDataInicio']]);

        $validator
                ->add('vinculo_projeto', 'valid', ['rule' => 'numeric'])
                ->requirePresence('vinculo_projeto', 'create')
                ->notEmpty('vinculo_projeto');


        return $validator;
    }

    public function validarDataInicio($data, $context) {
        return true;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['pessoa_id'], 'Pessoas'));
        $rules->add($rules->existsIn(['projeto_id'], 'Projetos'));
        return $rules;
    }

}
