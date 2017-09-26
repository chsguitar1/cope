<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cronograma Entity.
 *
 * @property int $idcronograma
 * @property int $idprojeto
 * @property \App\Model\Entity\Projeto $projeto
 * @property string $atividade
 * @property bool $janeiro
 * @property bool $fevereiro
 * @property bool $marco
 * @property bool $abril
 * @property bool $maio
 * @property bool $junho
 * @property bool $julho
 * @property bool $agosto
 * @property bool $setembro
 * @property bool $outubro
 * @property bool $novembro
 * @property bool $dezembro
 
 */
class Cronograma extends Entity
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
        'idcronograma' => false,
    ];
}
