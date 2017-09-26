<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Evento Entity.
 *
 * @property int $id
 * @property int $projeto_id
 * @property \App\Model\Entity\Projeto $projeto
 * @property \Cake\I18n\Time $data_evento
 * @property string $descricao
 */
class Evento extends Entity {

    const TP_MOV_INICIAL = 0;
    const TP_MOV_PARECERISTA = 1;
    const TP_MOV_CORRECAO = 2;
    const TP_MOV_PARECER_RECEBIDO = 3;
    const TP_MOV_ANALISE_PRESIDENTE = 4;

    public function tpMovimentoToStr($i) {
        switch ($i) {
            case Evento::TP_MOV_INICIAL : return 'Despacho Inicial';
            case Evento::TP_MOV_PARECERISTA : return 'Designado Parecerista';
            case Evento::TP_MOV_CORRECAO : return 'Encaminhado para correção';
            case Evento::TP_MOV_PARECER_RECEBIDO : return 'Recebido Parecer.';
            case Evento::TP_MOV_ANALISE_PRESIDENTE : return 'Para análise da presidência.';
        }
    }

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
