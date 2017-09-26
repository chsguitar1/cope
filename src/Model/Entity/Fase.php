<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Fase Entity.
 *
 * @property int $id
 * @property \Cake\I18n\Time $data_limite
 * @property \Cake\I18n\Time $data_recebimento
 * @property int $aberto
 * @property int $tipo
 * @property int $aprovado
 * @property int $projeto_id
 * @property \App\Model\Entity\Projeto $projeto
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $created_by
 * @property \App\Model\Entity\Relatorio[] $relatorios
 */
class Fase extends Entity {

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

    public static function createFases($projeto) {
        $projeto_id = $projeto->id;
        $fases = \Cake\ORM\TableRegistry::get('Fases');
        
        
    }

}
