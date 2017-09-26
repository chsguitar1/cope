<?php
namespace App\Model\Table;

use App\Model\Entity\Relatorio;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Relatorios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Fases
 */
class RelatoriosTable extends Table
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

        $this->table('relatorios');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Fases', [
            'foreignKey' => 'fase_id',
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
            ->add('data_relatorio', 'valid', ['rule' => 'datetime'])
            ->requirePresence('data_relatorio', 'create')
            ->notEmpty('data_relatorio');

        $validator
            ->add('data_protocolo', 'valid', ['rule' => 'datetime'])
            ->requirePresence('data_protocolo', 'create')
            ->notEmpty('data_protocolo');

        $validator
            ->requirePresence('nome_arquivo', 'create')
            ->notEmpty('nome_arquivo');

        $validator
            ->requirePresence('caminho_arquivo', 'create')
            ->notEmpty('caminho_arquivo');

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
        $rules->add($rules->existsIn(['fase_id'], 'Fases'));
        return $rules;
    }
}
