<?php
namespace App\Model\Table;

use App\Model\Entity\RoleUser;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * RoleUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Usuarios
 */
class RoleUsersTable extends Table
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

        $this->table('role_users');
        $this->displayField('usuario_id');
        $this->primaryKey(['usuario_id', 'role']);

        $this->belongsTo('Users', [
            'foreignKey' => 'usuario_id',
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
            ->add('role', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('role', 'create');

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
        
         $role = $this->RoleUsers->get(['usuario_id' => $user['id'], 'role' => $user['default_role']]);
        $rules->add($rules->existsIn(['usuario_id'], 'Users'));
        return $rules;
    }
}
