<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Relatorio Entity.
 *
 * @property int $id
 * @property \Cake\I18n\Time $data_relatorio
 * @property \Cake\I18n\Time $data_protocolo
 * @property int $fase_id
 * @property \App\Model\Entity\Fase $fase
 * @property string $nome_arquivo
 * @property string $caminho_arquivo
 */
class Relatorio extends Entity
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
