<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SolicitacaoParecere Entity.
 *
 * @property int $id
 * @property int $id_projeto
 * @property int $id_pessoa
 * @property \Cake\I18n\Time $data_solicitacao
 * @property \Cake\I18n\Time $data_aceitacao_rejeicao
 * @property string $observacao_solicitacao
 * @property string $observacao_aceitacao_rejeicao
 * @property int $situacao
 * @property bool $externo
 * @property \Cake\I18n\Time $data_limite_aceite
 * @property \Cake\I18n\Time $data_limite_envio
 * @property \Cake\I18n\Time $created
 * * @property \App\Model\Entity\Projeto $projeto
 */
class SolicitacaoParecer extends Entity {

    const TPSIT_AGUARDANDO = 1;
    const TPSIT_ACEITO = 2;
    const TPSIT_REJEITADO = 3;
    const TPSIT_CONCLUIDO = 4;
    const TPSIT_CANCELADO = 5;

    public function usuarioIsDesignado($usuario, $solicitacaoParecer) {

        die(print_r($solicitacaoParecer));

        return false;
    }

    public static function tpSitSolicitacao($i) {
        switch ($i) {
            case SolicitacaoParecer::TPSIT_AGUARDANDO : return 'Aguardando Aceitação';
            case SolicitacaoParecer::TPSIT_ACEITO : return 'Solicitação aceita pelo parecerista';
            case SolicitacaoParecer::TPSIT_REJEITADO : return 'Solicitação Rejeitadao pelo parecerista';
            case SolicitacaoParecer::TPSIT_CONCLUIDO : return 'Parecer registrado.';
            case SolicitacaoParecer::TPSIT_CANCELADO : return 'Solicitação cancelada.';
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
