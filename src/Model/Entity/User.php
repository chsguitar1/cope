<?php

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity.
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $escopo
 * @property int $pessoa_id
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class User extends Entity {

    const ROLE_ADMIN = 0;
    const ROLE_PRESIDENTE = 1;
    const ROLE_PARECERISTA = 2;
    const ROLE_COORDENADOR_PESQUISA = 3;
    const ROLE_SEC_ACADEMICA = 4;
    const ROLE_MEMBRO_COPE = 5;
    const ROLE_PROPONENTE = 6;

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _setPassword($password) {
        return (new DefaultPasswordHasher)->hash($password);
    }

    public static function escoposUsers() {
        return [0 => 'Administrador', 1 => 'Presidente', 2 => 'Parecerista', 3 => 'Coordenador de Pesquisa e Extensão', 4 => 'Sec. Acadêmica', 5 => 'Membro Cope', 6 => 'Proponente'];
    }

    public static function escoposUsersToStr($i) {
        $escopos = [0 => 'Administrador', 1 => 'Presidente', 2 => 'Parecerista', 3 => 'Coordenador de Pesquisa e Extensão', 4 => 'Sec. Acadêmica', 5 => 'Membro Cope', 6 => 'Proponente'];
        return $escopos[$i];
    }

    public static function userHasHole($user_id, $role) {
        $roles = \Cake\ORM\TableRegistry::get('RoleUsers');

        return $roles->get(['usuario_id' => $user_id, 'role' => $role]);
    }

}
