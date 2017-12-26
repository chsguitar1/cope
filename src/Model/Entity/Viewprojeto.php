<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Viewprojeto Entity.
 *
 * @property int $id
 * @property int $ano
 * @property \Cake\I18n\Time $data_inicio
 * @property \Cake\I18n\Time $data_fim
 * @property bool $encerrado
 * @property int $grande_area_conhecimento
 * @property bool $comite_etica
 * @property int $num_protocolo
 * @property string $num_sipac
 * @property int $situacao_projeto
 * @property int $tipo_projeto
 * @property string $tituto_projeto
 * @property string $descricao_projeto
 * @property int $curso_id
 * @property \App\Model\Entity\Curso $curso
 * @property int $parecerista_id
 * @property \App\Model\Entity\Pareceresistum $pareceresistum
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property bool $rascunho
 * @property \Cake\I18n\Time $data_protocolo
 * @property int $created_by
 * @property int $modified_by
 * @property int $cod_areas_conhecimentos
 * @property int $setor_atual
 * @property int $id_area_tematica
 * @property int $id_linha_extensao
 * @property string $colegiado
 * @property string $parcerias_ext
 * @property bool $primeira
 * @property string $resumo
 * @property string $palavras_chave
 * @property string $fundamentacao
 * @property string $objetivos
 * @property string $metodologia
 * @property string $recursos
 * @property string $referencias
 * @property bool $status
 * @property bool $tem_rel_final
 * @property string $areatematica
 * @property string $linhasext
 * @property string $nomecurso
 * @property string $areas
 */
class Viewprojeto extends Entity
{

}
