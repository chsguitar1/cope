<?php
namespace App\Model\Table;

use App\Model\Entity\Viewprojeto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Viewprojeto Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Cursos
 * @property \Cake\ORM\Association\BelongsTo $Pareceresista
 */
class ViewprojetoTable extends Table
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

        $this->table('viewprojeto');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Cursos', [
            'foreignKey' => 'curso_id'
        ]);
        $this->belongsTo('Pareceresista', [
            'foreignKey' => 'parecerista_id'
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
            ->requirePresence('id', 'create')
            ->notEmpty('id');

        $validator
            ->add('ano', 'valid', ['rule' => 'numeric'])
            ->requirePresence('ano', 'create')
            ->notEmpty('ano');

        $validator
            ->add('data_inicio', 'valid', ['rule' => 'date'])
            ->requirePresence('data_inicio', 'create')
            ->notEmpty('data_inicio');

        $validator
            ->add('data_fim', 'valid', ['rule' => 'date'])
            ->allowEmpty('data_fim');

        $validator
            ->add('encerrado', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('encerrado');

        $validator
            ->add('grande_area_conhecimento', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('grande_area_conhecimento');

        $validator
            ->add('comite_etica', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('comite_etica');

        $validator
            ->add('num_protocolo', 'valid', ['rule' => 'numeric'])
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
            ->add('rascunho', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('rascunho');

        $validator
            ->allowEmpty('data_protocolo');

        $validator
            ->add('created_by', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('created_by');

        $validator
            ->add('modified_by', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('modified_by');

        $validator
            ->add('cod_areas_conhecimentos', 'valid', ['rule' => 'numeric'])
            ->requirePresence('cod_areas_conhecimentos', 'create')
            ->notEmpty('cod_areas_conhecimentos');

        $validator
            ->add('setor_atual', 'valid', ['rule' => 'numeric'])
            ->requirePresence('setor_atual', 'create')
            ->notEmpty('setor_atual');

        $validator
            ->add('id_area_tematica', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id_area_tematica');

        $validator
            ->add('id_linha_extensao', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id_linha_extensao');

        $validator
            ->allowEmpty('colegiado');

        $validator
            ->allowEmpty('parcerias_ext');

        $validator
            ->add('primeira', 'valid', ['rule' => 'boolean'])
            ->requirePresence('primeira', 'create')
            ->notEmpty('primeira');

        $validator
            ->allowEmpty('resumo');

        $validator
            ->allowEmpty('palavras_chave');

        $validator
            ->allowEmpty('fundamentacao');

        $validator
            ->allowEmpty('objetivos');

        $validator
            ->allowEmpty('metodologia');

        $validator
            ->allowEmpty('recursos');

        $validator
            ->allowEmpty('referencias');

        $validator
            ->add('status', 'valid', ['rule' => 'boolean'])
            ->allowEmpty('status');

        $validator
            ->add('tem_rel_final', 'valid', ['rule' => 'boolean'])
            ->requirePresence('tem_rel_final', 'create')
            ->notEmpty('tem_rel_final');

        $validator
            ->requirePresence('areatematica', 'create')
            ->notEmpty('areatematica');

        $validator
            ->requirePresence('linhasext', 'create')
            ->notEmpty('linhasext');

        $validator
            ->requirePresence('nomecurso', 'create')
            ->notEmpty('nomecurso');

        $validator
            ->requirePresence('areas', 'create')
            ->notEmpty('areas');

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
        $rules->add($rules->existsIn(['curso_id'], 'Cursos'));
        $rules->add($rules->existsIn(['parecerista_id'], 'Pareceresista'));
        return $rules;
    }
}
