<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Setore Entity.
 *
 * @property int $id
 * @property string $descricao
 * @property int $responsavel_id
 * @property \App\Model\Entity\Setore $setore
 * @property int $identificador
 */
class Setore extends Entity {

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

    public static function setorResponsavel($i) {
        $setores = \Cake\ORM\TableRegistry::get('Setores');
        
        $query = $setores->find('all', [ 'conditions' => ['Setores.identificador =' => $i]]);
        return $query->first();
    }

}
