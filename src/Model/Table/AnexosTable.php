<?php

namespace App\Model\Table;

use App\Model\Entity\Anexo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Anexos Model
 *
 */
class AnexosTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('anexos');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'created_by',
            'joinType' => 'INNER',
            'propertyName' => 'criado_por'
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
                ->requirePresence('nome', 'create')
                ->notEmpty('nome');

        $validator
                ->requirePresence('caminho', 'create')
                ->notEmpty('caminho');

        $validator
                ->requirePresence('tamanho', 'create')
                ->notEmpty('tamanho');

        $validator
                ->add('created_by', 'valid', ['rule' => 'numeric'])
                ->requirePresence('created_by', 'create')
                ->notEmpty('created_by');

        return $validator;
    }

}
