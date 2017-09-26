<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Parecere Entity.
 *
 * @property int $id
 * @property int $id_solicitacao_parecer
 * @property int $tipo_resposta
 * @property \Cake\I18n\Time $data_recebimento
 * @property string $arquivo
 * @property string $nome_arquivo
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $identificacao
 * @property string $idt_obs
 * @property bool $comite
 * @property string $comite_obs
 * @property bool $colegiado
 * @property string $colegiado_obs
 * @property bool $parceria
 * @property string $parceria_obs
 * @property bool $integrantes
 * @property string $integrantes_obs
 * @property bool $caracterizacao
 * @property string $caracterizacao_obs
 * @property bool $relevante
 * @property string $relevante_obs
 * @property bool $teorica
 * @property string $teorica_obs
 * @property bool $objetivos
 * @property string $objetivos_obs
 * @property bool $propostos
 * @property string $propostos_obs
 * @property bool $materiais_finan
 * @property string $materiais_fin_obs
 * @property bool $crono
 * @property string $cronograma_obs
 * @property bool $discentes
 * @property string $discentes_obs
 * @property bool $horaria
 * @property string $horaria_obs
 * @property bool $referencias
 * @property string $referencias_obs
 * @property string $conclusao

 * @property \App\Model\Entity\SolicitacaoParecer $solicitacao
 */
class Parecere extends Entity {

    const PARECER_INICIAL = 1;
    const PARECER_PARCIAL = 2;
    const PARECER_FINAL = 3;
    
    const RESPOSTA_PARECER_FAVORAVEL = 1;
    const RESPOSTA_PARECER_FAVORAVEL_RESSALVA = 2;
    const RESPOSTA_PARECER_DESFAVORAVEL = 3;
    const RESPOSTA_PARECER_SEMANALISE = 4;
    

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

    public static function tiposRespostasPareceres() {
        return [1 => 'Favorável', 2 => 'Favorável com Ressalva', 3 => 'Desfavorável', 4 => 'Sem análise de mérito'];
    }
    
    public static function tiposPareceres() {
        return [1 => 'Inicial', 2 => 'Parcial', 3 => 'Final'];
    }

    public static function escoposUsersToStr($i) {
        $temp = [1 => 'Inicial', 2 => 'Parcial', 3 => 'Final'];
        return $$temp[$i];
    }
 public static function tpTipoParecer($i) {
        switch ($i) {
            case Parecere::RESPOSTA_PARECER_FAVORAVEL : return 'Favorável';
            case Parecere::RESPOSTA_PARECER_FAVORAVEL_RESSALVA : return 'Favorável com Ressalva';
            case Parecere::RESPOSTA_PARECER_DESFAVORAVEL : return 'Desfavorável';
            case Parecere::RESPOSTA_PARECER_SEMANALISE : return 'Sem análise de mérito';
          
        }
    }

}
