<?php

namespace App\Model\Table;

use App\Model\Entity\Parecerista;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pareceristas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 * @property \Cake\ORM\Association\BelongsTo $Projetos
 * @property \Cake\ORM\Association\HasMany $Pareceres
 * @property \Cake\ORM\Association\HasMany $Pareceristas
 * @property \Cake\ORM\Association\HasMany $Projetos
 */
class PareceristasTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('pareceristas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Pessoas', [
            'foreignKey' => 'parecerista_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Projetos', [
            'foreignKey' => 'projeto_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Pareceres', [
            'foreignKey' => 'parecerista_id'
        ]);
        $this->hasMany('Pareceristas', [
            'foreignKey' => 'parecerista_id'
        ]);
        $this->hasMany('Projetos', [
            'foreignKey' => 'parecerista_id'
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
                ->add('prazo', 'valid', ['rule' => 'date'])
                ->allowEmpty('prazo');

        $validator
                ->allowEmpty('observacao');

        $validator
                ->add('created_by', 'valid', ['rule' => 'numeric'])
                ->requirePresence('created_by', 'create')
                ->notEmpty('created_by');

        $validator
                ->add('prazo', 'custom', ['rule' => [$this, 'dataAnteriorPrazo'], 'message' => 'A data deve ser posterior à data do projeto.']);
        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->existsIn(['parecerista_id'], 'Pessoas'));
        $rules->add($rules->existsIn(['projeto_id'], 'Projetos'));
        return $rules;
    }

    public function dataAnteriorPrazo($value, $context) {
        $this->Projetos = \Cake\ORM\TableRegistry::get('projetos');
        
        $data_projeto = $this->Projetos->get($context['data']['parecerista_id'])->data_inicio;
//        die(print_r($value));
//        die( print_r(($data_projeto < $value) ));
        
        //$v = $context['data']['prazo'];
        
        $v = \Cake\I18n\Time::createFromDate($value['year'], $value['month'], $value['day']);
        
////        die(print_r($v));
//        
////        die(print_r($data_projeto < $v));
//        
//        die(print_r($data_projeto).'<br> ************* <br>^'.print_r($v).'^ Comparação >= '.  print_r($data_projeto >= $v));
//        //die(print_r($data_projeto).' <br> '.  print_r($value));
        
        
        
        return $v->gte($data_projeto);
//        
//        die(print_r($context['data']));
//        die(print_r($this->Projetos->get($context['data']['parecerista_id'])->tituto_projeto));
    }

}
