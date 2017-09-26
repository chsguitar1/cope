<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Anexo Entity.
 *
 * @property int $id
 * @property string $nome
 * @property string $caminho
 * @property int $tamanho
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property int $created_by
 */
class Anexo extends Entity {

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

    public function tipoAnexoToStr($tp) {
        $tipos = array(0 => 'Projeto', 1 => 'Ata Colegiado', 2 => 'Cronograma', 3 => 'Despacho Coord. Curso', 99 => 'Outros');
        if ($tp < sizeof($tipos)) {
            return $tipos[$tp];
        } else {
            return "DESCONHECIDO";
        }
    }

    public function tiposAnexos() {
//        $tipos = array('Projeto', 'Ata Colegiado', 'Cronograma', 'Outros');
        $tipos = array(0 => 'Projeto', 1 => 'Ata Colegiado', 2 => 'Cronograma', 3 => 'Despacho Coord. Curso', 99 => 'Outros');
        return $tipos;
    }

    public function requiridoProjetoPesquisa($tp) {
        if ($tp == 3) {
            return true;
        }
    }

    public function requiridoProjetoExtensao($tp) {
        if ($tp == 3) {
            return true;
        }
    }

    public function temDespacho($arquivos) {
        $despacho = false;

        foreach ($arquivos as $ar) {
            if ($ar['tipo_anexo'] == 3) {
                $despacho = true;
            }
        }
        return $despacho;
    }

    public function temProjeto($arquivos) {
        $despacho = false;

        foreach ($arquivos as $ar) {
            if ($ar['tipo_anexo'] == 0) {
                $despacho = true;
            }
        }
        return $despacho;
    }

}
