<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;
use \Cake\ORM\TableRegistry;

/**
 * AreasConhecimento Entity.
 *
 * @property int $id
 * @property string $descricao
 * @property int $cod_pai
 * @property int $nivel
 */
class AreasConhecimento extends Entity {

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

    public function populaAreas() {
        $areas = TableRegistry::get('AreasConhecimentos');
//        $query = $this->AreasConhecimentos->find('all')->where(['AreasConhecimentos.nivel = ' => 0]);
        $query = $areas->find('all')->where(['AreasConhecimentos.nivel = ' => 0]);
        $gp = array();
        foreach ($query as $r) {
            $gp += [$r['id'] . ' - ' . $r['descricao'] => $this->getFilhos($r['id'])];
        }

        return $gp;
    }

    public function getFilhos($id_pai) {
        $areas = TableRegistry::get('AreasConhecimentos');
        $q = $areas->find('all')->where(['AreasConhecimentos.cod_pai = ' => $id_pai]);

        $filhos = array();

        foreach ($q as $r) {

            if ($r['analitico'] == 1) {
                $filhos += [$r['id'] => $r['id'] . ' - ' . $r['descricao']];
            } else {
                $filhos += [ $r['id'] . ' - ' . $r['descricao'] => $this->getFilhosDosFilhos($r['id'])];
            }
        }
        return $filhos;
    }

    public function getFilhosDosFilhos($id_pai) {
        $areas = TableRegistry::get('AreasConhecimentos');
        $q = $areas->find('all')->where(['AreasConhecimentos.cod_pai = ' => $id_pai]);

        $filhos = array();

        foreach ($q as $r) {
            $filhos += [$r['id'] => $r['id'] . ' - ' . $r['descricao']];
        }
        return $filhos;
    }

}
