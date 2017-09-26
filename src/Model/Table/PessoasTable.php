<?php
namespace App\Model\Table;

use App\Model\Entity\Pessoa;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pessoas Model
 *
 * @property \Cake\ORM\Association\HasMany $ParticipantesProjetos
 * @property \Cake\ORM\Association\HasMany $Usuarios
 */
class PessoasTable extends Table
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

        $this->table('pessoas');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('ParticipantesProjetos', [
            'foreignKey' => 'pessoa_id'
        ]);
        $this->hasMany('Usuarios', [
            'foreignKey' => 'pessoa_id'
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
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->add('vinculo', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('vinculo');

        $validator
            ->add('siape', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('siape');

        $validator
            ->allowEmpty('matricula');

        $validator
            ->allowEmpty('rg');

        $validator
            ->allowEmpty('cpf');

        return $validator;
    }
}
