<?php
namespace App\Model\Table;

use App\Model\Entity\Cronograma;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cronograma Model
 *
 */
class CronogramaTable extends Table
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

        $this->table('cronograma');
        $this->displayField('idcronograma');
        $this->primaryKey('idcronograma');
        
        $this->belongsTo('Projetos', [
            'foreignKey' => 'idprojeto',
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
            ->add('idcronograma', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('idcronograma', 'create');

        $validator
            ->add('idprojeto', 'valid', ['rule' => 'numeric'])
            ->requirePresence('idprojeto', 'create')
            ->notEmpty('idprojeto');

       $validator
            ->requirePresence('atividade', 'create')
            ->notEmpty('atividade');

        $validator
            ->add('janeiro', 'valid', ['rule' => 'boolean'])
            ->requirePresence('janeiro', 'create')
            ->notEmpty('janeiro');

        $validator
            ->add('fevereiro', 'valid', ['rule' => 'boolean'])
            ->requirePresence('fevereiro', 'create')
            ->notEmpty('fevereiro');

        $validator
            ->add('marco', 'valid', ['rule' => 'boolean'])
            ->requirePresence('marco', 'create')
            ->notEmpty('marco');

        $validator
            ->add('abril', 'valid', ['rule' => 'boolean'])
            ->requirePresence('abril', 'create')
            ->notEmpty('abril');

        $validator
            ->add('maio', 'valid', ['rule' => 'boolean'])
            ->requirePresence('maio', 'create')
            ->notEmpty('maio');

        $validator
            ->add('junho', 'valid', ['rule' => 'boolean'])
            ->requirePresence('junho', 'create')
            ->notEmpty('junho');

        $validator
            ->add('julho', 'valid', ['rule' => 'boolean'])
            ->requirePresence('julho', 'create')
            ->notEmpty('julho');

        $validator
            ->add('agosto', 'valid', ['rule' => 'boolean'])
            ->requirePresence('agosto', 'create')
            ->notEmpty('agosto');

        $validator
            ->add('setembro', 'valid', ['rule' => 'boolean'])
            ->requirePresence('setembro', 'create')
            ->notEmpty('setembro');

        $validator
            ->add('outubro', 'valid', ['rule' => 'boolean'])
            ->requirePresence('outubro', 'create')
            ->notEmpty('outubro');

        $validator
            ->add('novembro', 'valid', ['rule' => 'boolean'])
            ->requirePresence('novembro', 'create')
            ->notEmpty('novembro');

        $validator
            ->add('dezembro', 'valid', ['rule' => 'boolean'])
            ->requirePresence('dezembro', 'create')
            ->notEmpty('dezembro');

        return $validator;
    }
    public function buildRules(RulesChecker $rules) {
       
        $rules->add($rules->existsIn(['idprojeto'], 'Projetos'));
        return $rules;
    }
}
