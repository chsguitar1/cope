<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Acompanhamento Entity.
 *
 * @property int $id
 * @property \Cake\I18n\Time $data
 * @property int $tipo
 * @property string $descricao
 * @property int $projeto_id
 * @property \App\Model\Entity\Projeto $projeto
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $created_by
 */
class Acompanhamento extends Entity {

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

    public function tipoAcompanhamentoToStr($tp) {
        $tipos = array('Informação', 'Solicitação de Correção', 'Requerimento', 'Outros');
        if ($tp < sizeof($tipos)) {
            return $tipos[$tp];
        } else {
            return "DESCONHECIDO";
        }
    }

    public function tiposAcompanhamentos() {
        $tipos = array('Informação', 'Solicitação de Correção', 'Requerimento', 'Outros');
        return $tipos;
    }

    public function tiposAcompanhamentosRequerente() {
        $tipos = array(0 => 'Informação', 2 => 'Requerimento', 3 => 'Outros');
        return $tipos;
    }
   

}
