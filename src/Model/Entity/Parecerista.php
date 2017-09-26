<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Parecerista Entity.
 *
 * @property int $id
 * @property int $parecerista_id
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property int $projeto_id
 * @property \Cake\I18n\Time $prazo
 * @property string $observacao
 * @property int $created_by
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Projeto[] $projetos
 * @property \App\Model\Entity\Parecere[] $pareceres
 * @property \App\Model\Entity\Parecerista[] $pareceristas
 */
class Parecerista extends Entity
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
        'id' => false,
    ];
}
