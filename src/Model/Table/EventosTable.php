<?php

namespace App\Model\Table;

use App\Model\Entity\Evento;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Eventos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Projetos
 */
class EventosTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('eventos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Projetos', [
            'foreignKey' => 'projeto_id',
            'joinType' => 'INNER'
        ]);
        
        $this->belongsTo('Setores', [
            'foreignKey' => 'setor_destino',
        ]);
        
        $this->belongsTo('Pessoas', [
            'foreignKey' => 'responsavel_id',
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
                ->requirePresence('data_evento', 'create')
                ->notEmpty('data_evento');

        $validator
                ->requirePresence('descricao', 'create')
                ->notEmpty('descricao');

        return $validator;
    }

    public function tipoAcompanhamentoToStr($tp) {
        $tipos = array(0 => 'Protocolo', 1 => 'Parecerista', 99 => 'Outros');
        if ($tp < sizeof($tipos)) {
            return $tipos[$tp];
        } else {
            return "DESCONHECIDO";
        }
    }

    public function tiposAcompanhamentos() {
        $tipos = array(0 => 'Protocolo', 1 => 'Parecerista', 99 => 'Outros');
        return $tipos;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['projeto_id'], 'Projetos'));
        return $rules;
    }

}
