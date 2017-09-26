<?php
namespace App\Model\Table;

use App\Model\Entity\AreasConhecimento;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AreasConhecimentos Model
 *
 */
class AreasConhecimentosTable extends Table
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

        $this->table('areas_conhecimentos');
        $this->displayField('descricao');
        $this->primaryKey('id');

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
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        $validator
            ->add('cod_pai', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('cod_pai');

        $validator
            ->add('nivel', 'valid', ['rule' => 'numeric'])
            ->requirePresence('nivel', 'create')
            ->notEmpty('nivel');

        return $validator;
    }
}
