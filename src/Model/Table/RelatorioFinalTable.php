<?php

namespace App\Model\Table;

use App\Model\Entity\RelatorioFinal;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RelatorioFinal Model
 *
 */
class RelatorioFinalTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('relatorio_final');
        $this->displayField('id_relatorio');
        $this->primaryKey('id_relatorio');
        $this->belongsTo('Pessoas', [
            'foreignKey' => 'id_pessoa'
        ]);

        $this->belongsTo('Projetos', [
            'foreignKey' => 'id_projeto'
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
                ->add('id_relatorio', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('id_relatorio', 'create');

        $validator
                ->requirePresence('num_cadastro', 'create')
                ->notEmpty('num_cadastro');

        $validator
                ->add('data_ini', 'valid', ['rule' => 'date'])
                ->requirePresence('data_ini', 'create')
                ->notEmpty('data_ini');

        $validator
                ->requirePresence('local_execucao', 'create')
                ->notEmpty('local_execucao');

        $validator
                ->add('final', 'valid', ['rule' => 'boolean'])
                ->requirePresence('final', 'create')
                ->notEmpty('final');

        $validator
                ->requirePresence('resumo', 'create')
                ->notEmpty('resumo');

        $validator
                ->requirePresence('palavras', 'create')
                ->notEmpty('palavras');

        $validator
                ->requirePresence('situacao', 'create')
                ->notEmpty('situacao');

        $validator
                ->requirePresence('perspectiva', 'create')
                ->notEmpty('perspectiva');

        $validator
                ->requirePresence('participacao_discente', 'create')
                ->notEmpty('participacao_discente');

        $validator
                ->requirePresence('producoes', 'create')
                ->notEmpty('producoes');

        $validator
                ->requirePresence('referencias', 'create')
                ->notEmpty('referencias');

        $validator
                ->add('id_projeto', 'valid', ['rule' => 'numeric'])
                ->requirePresence('id_projeto', 'create')
                ->notEmpty('id_projeto');

        return $validator;
    }

}
