<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RelatorioFinal Entity.
 *
 * @property int $id_relatorio
 * @property string $num_cadastro
 * @property \Cake\I18n\Time $data_ini
 * @property string $local_execucao
 * @property bool $final
 * @property string $resumo
 * @property string $palavras
 * @property string $situacao
 * @property string $perspectiva
 * @property string $participacao_discente
 * @property string $producoes
 * @property string $referencias
 * @property int $id_projeto
 */
class RelatorioFinal extends Entity {

    const NUM_PL = '(Inserir o número de cadastro do projeto no COPE). ';
    const RES_PL = '(Descrição sucinta da motivação do trabalho e dos objetivos estabelecidos, objetivos alcançados, dificuldades encontradas, metodologia, relevância científica ou tecnológica, publicações, participação em eventos, patentes, produtos, etc.- inclusive aqueles que não estavam previstos no projeto – Mínimo 150 palavras e máximo 500 palavras).';
    const SITU_PL = '(Especificar se o projeto está concluído ou em que fase de execução se encontra. Se o projeto ainda não estiver concluído descrever de forma sucinta as atividades que já foram desenvolvidas. Caso haja atraso, citá-los e identificar os motivos).';
    const PERS_PL = '(Em caso de relatório final, identificar se ocorrerá a continuidade do projeto e os novos objetivos a serem alcançados. Descrever de forma sucinta os resultados esperados. Para que este relatório tenha efeito de renovação ou prorrogação do projeto apresentar, nesta seção, um cronograma de atividades a serem desenvolvidas. 
No caso dos relatórios parciais, descrever de forma sucinta as atividades a serem desenvolvidas, recursos ainda necessários).';
    const PAR_PL = '(Descrição de como está sendo a participação discente no projeto, como o mesmo está colaborando para a formação do aluno).';
    const PRODU_PL = '(Listar na forma de subitens publicações do tipo: Pedidos de Proteção de Propriedade Intelectual; Artigos Completos Publicados em Periódicos; Livros 	Publicados; Capítulos de Livros Publicados; Textos em Jornais/Revistas de Notícias; Trabalhos Completos Publicados em Anais de Congressos; Resumos Expandidos Publicados em Anais de Eventos; Resumos Publicados em Anais de Eventos; Participação em Bancas ou Comissões de Eventos ou Instituições. Identificar se as produções citadas estavam previstas).';
    const REF_PL = '(Apresentação dos textos, artigos, revistas e/ou livros utilizados no desenvolvimento do projeto).';

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
        'id_relatorio' => false,
    ];

}
