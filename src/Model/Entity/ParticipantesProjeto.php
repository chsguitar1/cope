<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ParticipantesProjeto Entity.
 *
 * @property int $id
 * @property int $carga_horaria
 * @property int $tipo_participante
 * @property int $bolsista
 * @property string $bolsa
 * @property \Cake\I18n\Time $data_entrada
 * @property \Cake\I18n\Time $data_saida
 * @property int $vinculo_projeto
 * @property int $recebe_certificado
 * @property int $pessoa_id
 * @property \App\Model\Entity\Pessoa $pessoa
 * @property int $projeto_id
 * @property \App\Model\Entity\Projeto $projeto
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class ParticipantesProjeto extends Entity {

    public function tipoParticipanteToStr($tp) {

        switch ($tp) {
            case 0 : return 'Coordenador';
            case 1 : return 'Vice-Coordenador';
            case 2 : return 'Colaborador';
            case 3 : return 'Bolsista';
        }

        return 'eureka';
    }

    public function vinculoParticipanteToStr($tp) {

        switch ($tp) {
            case 0 : return 'Docente';
            case 1 : return 'T.A.E';
            case 2 : return 'Discente';
            case 3 : return 'Externo';
        }
    }

    public function vinculosParticipante() {
        return array(0 => 'Docente', 1 => 'T.A.E', 2 => 'Discente', 3 => 'Externo');
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

    public function isCoordenador($part) {
        return $part['tipo_participante'] == 0;
    }

}
