<?php
namespace App\Model\Table;

use App\Model\Entity\SolicitacaoParecere;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * SolicitacaoPareceres Model
 *
 */
class SolicitacaoPareceresTable extends Table
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

        $this->table('solicitacao_pareceres');
        $this->displayField('id');
        $this->primaryKey('id');
        
         $this->belongsTo('Pessoas', [
            'foreignKey' => 'id_pessoa',
            'joinType' => 'INNER'
        ]);
         
         $this->belongsTo('Projetos', [
            'foreignKey' => 'id_projeto',
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
            ->add('id_projeto', 'valid', ['rule' => 'numeric'])
            ->requirePresence('id_projeto', 'create')
            ->notEmpty('id_projeto');

        $validator
            ->add('id_pessoa', 'valid', ['rule' => 'numeric'])
            ->requirePresence('id_pessoa', 'create')
            ->notEmpty('id_pessoa');

        $validator
            ->requirePresence('data_solicitacao', 'create')
            ->notEmpty('data_solicitacao');

       

        $validator
            ->allowEmpty('observacao_solicitacao');

        $validator
            ->allowEmpty('observacao_aceitacao_rejeicao');

        $validator
            ->add('situacao', 'valid', ['rule' => 'numeric'])
            ->requirePresence('situacao', 'create')
            ->notEmpty('situacao');

        $validator
            ->add('externo', 'valid', ['rule' => 'boolean'])
            ->requirePresence('externo', 'create')
            ->notEmpty('externo');

        $validator
            ->add('data_limite_aceite', 'valid', ['rule' => 'date'])
            ->allowEmpty('data_limite_aceite');

        $validator
            ->add('data_limite_envio', 'valid', ['rule' => 'date'])
            ->allowEmpty('data_limite_envio');

        return $validator;
    }
}
