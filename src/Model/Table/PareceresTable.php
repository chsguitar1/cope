<?php
namespace App\Model\Table;

use App\Model\Entity\Parecere;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pareceres Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pareceresista
 * @property \Cake\ORM\Association\BelongsTo $Projetos
 */
class PareceresTable extends Table
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

        $this->table('pareceres');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Pareceresista', [
            'foreignKey' => 'parecerista_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('SolicitacaoPareceres', [
            'foreignKey' => 'id_solicitacao_parecer',
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
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('data_recebimento', 'create')
            ->notEmpty('data_recebimento');

       

//        $validator
//            ->requirePresence('arquivo', 'create')
//            ->notEmpty('arquivo');

//        $validator
//            ->requirePresence('nome_arquivo', 'create')
//            ->notEmpty('nome_arquivo');

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
        $rules->add($rules->existsIn(['parecerista_id'], 'Pareceresista'));
      //  $rules->add($rules->existsIn(['id_solicitacao_parecer'], 'Projetos'));
        return $rules;
    }
}
