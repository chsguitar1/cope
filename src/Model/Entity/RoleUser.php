<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RoleUser Entity.
 *
 * @property int $usuario_id
 * @property \App\Model\Entity\Usuario $usuario
 * @property int $role
 */
class RoleUser extends Entity
{

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
        'usuario_id' => false,
        'role' => false,
    ];
     public static function escoposRoleUsers() {
        return [0 => 'Administrador', 1 => 'Presidente', 2 => 'Parecerista', 3 => 'Coordenador de Pesquisa e Extensão', 4 => 'Sec. Acadêmica', 5 => 'Membro Cope', 6 => 'Proponente'];
    }

}
