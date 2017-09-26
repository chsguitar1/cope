<?php

namespace App\Model\Table;

use App\Model\Entity\Projeto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projetos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cursos
 * @property \Cake\ORM\Association\BelongsTo $Pessoas
 * @property \Cake\ORM\Association\HasMany $Pareceres
 * @property \Cake\ORM\Association\HasMany $Relatorios
 * @property \Cake\ORM\Association\HasMany $SolicitacoesCertificados
 */
class ProjetosTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->table('projetos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cursos', [
            'foreignKey' => 'curso_id'
        ]);

        $this->belongsTo('created_user', [
            'foreignKey' => 'created_by',
            'className' => 'Users'
        ]);

        $this->belongsTo('Setores', [
            'foreignKey' => 'setor_atual'
        ]);

        $this->belongsTo('AreasConhecimentos', [
            'foreignKey' => 'cod_areas_conhecimentos'
        ]);

        $this->belongsTo('modified_user', [
            'foreignKey' => 'modified_by',
             'className' => 'Users'
        ]);

        $this->belongsTo('Pessoas', [
            'foreignKey' => 'parecerista_id'
        ]);



        $this->belongsTo('AreasTematicas', [
            'foreignKey' => 'id_area_tematica'
        ]);

        $this->belongsTo('LinhasExtensao', [
            'foreignKey' => 'id_linha_extensao'
        ]);

        $this->belongsTo('AreasConhecimentos', [
            'foreignKey' => 'cod_areas_conhecimentos'
        ]);


        $this->belongsTo('Pessoas', [
            'foreignKey' => 'parecerista_id'
        ]);


        $this->hasMany('Pareceres', [
            'foreignKey' => 'projeto_id'
        ]);

        $this->hasMany('Fases', [
            'foreignKey' => 'projeto_id'
        ]);


        $this->hasMany('Eventos', [
            'foreignKey' => 'projeto_id'
        ]);

        $this->hasMany('Anexos', [
            'foreignKey' => 'projeto_id'
        ]);
        $this->hasMany('Acompanhamentos', [
            'foreignKey' => 'projeto_id'
        ]);

        $this->hasMany('SolicitacoesCertificados', [
            'foreignKey' => 'projeto_id'
        ]);

        $this->hasMany('ParticipantesProjetos', [
            'foreignKey' => 'projeto_id'
        ]);
        
        $this->hasMany('Cronograma', [
            'foreignKey' => 'idprojeto'
        ]);

        $this->hasMany('SolicitacaoPareceres', [
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
                ->add('id', 'valid', ['rule' => 'numeric'])
                ->allowEmpty('id', 'create');

        $validator
                ->add('ano', 'valid', ['rule' => 'numeric'])
                ->requirePresence('ano', 'create')
                ->notEmpty('ano');

        $validator
                ->add('data_inicio', 'valid', ['rule' => 'date'])
                ->requirePresence('data_inicio', 'create')
                ->notEmpty('data_inicio');

        $validator
                ->add('data_fim', 'valid', ['rule' => 'date', 'dmy'])
                ->allowEmpty('data_fim');
//
//        $validator
//                ->add('grande_area_conhecimento', 'valid', ['rule' => 'numeric'])
//                ->requirePresence('grande_area_conhecimento', 'create')
//                ->notEmpty('grande_area_conhecimento');


        $validator
                ->allowEmpty('num_protocolo');

        $validator
                ->allowEmpty('num_sipac');

        $validator
                ->add('situacao_projeto', 'valid', ['rule' => 'numeric'])
                ->requirePresence('situacao_projeto', 'create')
                ->notEmpty('situacao_projeto');

        $validator
                ->add('tipo_projeto', 'valid', ['rule' => 'numeric'])
                ->requirePresence('tipo_projeto', 'create')
                ->notEmpty('tipo_projeto');

        $validator
                ->requirePresence('tituto_projeto', 'create')
                ->notEmpty('tituto_projeto');

        $validator
                ->allowEmpty('descricao_projeto');

        $validator
                ->allowEmpty('rascunho');

        $validator
                ->allowEmpty('data_protocolo');

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
        $rules->add($rules->existsIn(['curso_id'], 'Cursos'));
        $rules->add($rules->existsIn(['parecerista_id'], 'Pessoas'));
        return $rules;
    }

    public function beforeSave($event, $entity, $options) {
        //die('beforeSave');
    }

    public function findProtocolados(Query $query, array $options) {
        $query->where([
            'Projetos.rascunho' => false,
        ]);
        return $query;
    }

}
