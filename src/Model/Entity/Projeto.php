<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Projeto Entity.
 *
 * @property int $id
 * @property int $ano
 * @property \Cake\I18n\Time $data_inicio
 * @property \Cake\I18n\Time $data_fim
 * @property string $encerrado
 * @property int $grande_area_conhecimento
 * @property string $comite_etica
 * @property string $num_protocolo
 * @property string $num_sipac
 * @property int $situacao_projeto
 * @property int $tipo_projeto
 * @property string $tituto_projeto
 * @property string $descricao_projeto
 * @property int $curso_id
 * @property \App\Model\Entity\Curso $curso
 * @property int $parecerista_id
 * @property \App\Model\Entity\Pessoa $pessoa
 
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $rascunho
 * @property string $colegiado
 * @property string $parcerias_ext
 * @property string $primeira
 * @property string $resumo
 * @property string $palavras_chave
 * @property string $fundamentacao
 * @property string $objetivos
 * @property string $recursos
 * @property string $referencias
 * @property string $metodologia
 * @property boolean $status
 * @property \Cake\I18n\Time $data_protocolo
 * @property \App\Model\Entity\Parecere[] $pareceres
 * @property \App\Model\Entity\Relatorio[] $relatorios
 * @property \App\Model\Entity\Cronograma[] $cronogramas
 * @property \App\Model\Entity\SolicitacoesCertificado[] $solicitacoes_certificados
 */
class Projeto extends Entity {

    const SETOR_PROPONENTE = 0;
    const SETOR_COPE = 1;
    const SETOR_ENSINO = 4;
    const SETOR_PARECERISTA = 5;
    const TP_PROJETO_PESQUISA = 0;
    const TP_PROJETO_EXTENSAO = 1;
    const TP_PROJETO_ENSINO = 2;
    const TP_PROJETO_EVENTOS = 3;
    const COLE_PL = '(Caso o projeto esteja vinculado a mais de um colegiado, citá-los. É necessário incluir o documento de ciência do  colegiado em relação ao projeto - ver modelo de documento no COPE). ';
    const PAR_PL = '(Caso o projeto tenha parceria com instituições externas, citá-las. Apresentar documento que demonstre a parceria - carta de intensões, atas ou memórias de reunião, convênios, entre outros).';
    const RES_PL = '(descrição sucinta da motivação, fundamentação, metodologia e objetivos do trabalho – entre 150 e 500 palavras).';
    const PAL_PL = '(entre 3 e 5 palavras).';
    const FUN_PL = '(Deverá conter a contextualização, justificativa/relevância e a revisão bibliográfica. Destacar a relevância do projeto para a instituição/comunidade. Pode ser separada nestes subitens).';
    const OBJ_PL = '(Descrição sucinta dos objetivos do trabalho, os quais podem ser divididos em gerais e específicos. Identificar se há previsão de publicações ou outras produções, tais como: pedidos de Proteção de Propriedade Intelectual; Artigos Completos em Periódicos; Livros; Capítulos de Livros; Textos em Jornais/Revistas de Notícias; participação em eventos).';
    const MTD_PL = '(Descrição da metodologia a ser utilizada na execução do projeto de pesquisa. Em caso de questionário, incluir tempo de execução da aplicação dos mesmos).';
    const REC_PL = '(Elencar como recursos materiais os equipamentos, instrumentos, dispositivos, aparelhos ou ferramentas utilizadas na atividade de pesquisa. Incluir também os recursos já disponíveis no campus e que serão utilizados no projeto. Também podem entrar nesta categoria espaços como salas de reunião, laboratórios, prédios, terrenos, etc. Com relação aos recursos financeiros, devem ser listados os custos relativos às atividades, serviços e até os recursos materiais a serem utilizados na execução do projeto de pesquisa. Especificar as possíveis fontes dos recursos financeiros).';
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
        'id' => false,
    ];

    public function areasConhecimentoToStr($tp) {

        switch ($tp) {
            case 0 : return 'Exatas e da Terra';
            case 1 : return 'Engenharias';
            case 2 : return 'Saúde';
            case 3 : return 'Agrárias';
            case 4 : return 'Sociais Aplicadas';
            case 5 : return 'Humanas';
            case 6 : return 'Linguística, Letras e Artes';
            case 7 : return 'Outras';
        }
    }

    public function setoresInternos() {
        return array(0 => 'Proponente', 1 => 'Cope', 2 => 'Coordecação de Pesquisa', 3 => 'Secretaria Acadêmica', 4 => 'Direção de Ensino', 5 => 'Parecerista', 99 => 'Externo');
    }

    public function setorInternoToStr($i) {
        $l = array(0 => 'Proponente', 1 => 'Cope', 2 => 'Coordecação de Pesquisa', 3 => 'Secretaria Acadêmica', 4 => 'Direção de Ensino', 5 => 'Parecerista', 99 => 'Externo');
        return $l[$i];
    }

    public function areasConhecimento() {
        return array(0 => 'Exatas e da Terra', 1 => 'Engenharias', 2 => 'Saúde', 3 => 'Agrárias', 4 => 'Sociais Aplicadas', 5 => 'Humanas', 6 => 'Linguística, Letras e Artes', 7 => 'Outros');
    }

    public function validarPreProtocolo() {
        if (empty($this->participantes_projetos)) {
            return 'Projeto não possui participantes cadastrados!';
        }

        return null;
    }

    public function tiposProjetosToStr($i) {
        $l = array(0 => 'Pesquisa', 1 => 'Extensão', 2 => 'Inovação');
        return $l[$i];
    }

    public function tiposSituacao() {
        return array(0 => 'Movimento', 1 => 'Aguardando Parecer', 2 => 'Finalizado', 99 => 'Outros');
    }

    public function tiposSituacaoToStr($i) {
        $tp = array(0 => 'Movimento', 1 => 'Aguardando Parecer', 2 => 'Finalizado', 99 => 'Outros');
        return $tp[$i];
    }

    public function inconsistencias($projeto) {
        // die(print_r($projeto));
        $erros = array();
        $anexos = new Anexo();


        $temDespacho = $anexos->temDespacho($projeto->anexos);
        $temProjeto = $anexos->temProjeto($projeto->anexos);
//        if (!$temProjeto) {
//            array_push($erros, 'Não foi anexado ao projeto o arquivo digitalizado do projeto.');
//        }
//
//        if (!$temDespacho) {
//            array_push($erros, 'Não foi anexado ao projeto o arquivo de despacho da coordenação.');
//        }
        $st = $projeto->status;
       // die(print_r($st));
        if (!$st) {
            // die(print_r($st.'teste'));
            array_push($erros, 'Faltam dados no  formulário do projeto!'.$st);
        }
        if (!$this->temCoordenador($projeto) > 0) {
            array_push($erros, 'Não foi cadastrado coordenador para o projeto.');
        }

        if ($projeto->tipo_projeto == Projeto::TP_PROJETO_EXTENSAO && $projeto->id_area_tematica == null) {
            array_push($erros, 'Projeto de extensão deve possuir uma área temática.');
        }

        if ($projeto->tipo_projeto == Projeto::TP_PROJETO_EXTENSAO && $projeto->id_linha_extensao == null) {
            array_push($erros, 'Projeto de extensão deve possuir uma linha de extensão.');
        }
        $men = null;
        return $erros;
    }

    public function temCoordenador($projeto) {
        $participantes = $projeto->participantes_projetos;
        $participante = new ParticipantesProjeto();

//        die(print_r($participante));

        $temCoordenador = false;
        foreach ($participantes as $par) {
            if ($participante->isCoordenador($par)) {

                return true;
            }
        }

        return false;
    }

    public function temDocumentos($projeto) {

        if (empty($projeto->colegiado)) {

            return false;
        } else
        if (empty($projeto->resumo)) {

            return false;
        } else
        if (empty($projeto->parceria_ext)) {

            return false;
        } else
        if (empty($projeto->referencias)) {
            return false;
        } else
        if (empty($projeto->fundamentcao)) {
            return false;
        } else
        if (empty($projeto->recursos)) {
            return false;
        } else
        if (empty($projeto->primeira)) {
            return false;
        } else
        if (empty($projeto->objetivos)) {
            return false;
        } else
        if (empty($projeto->metodologia)) {
            return false;
        } else {
            return true;
        }
    }

    public function isCoordenador($usuario, $projeto) {
        $participantes = $projeto->participantes_projetos;
        $participante = new ParticipantesProjeto();

//        die(print_r($participante));

        $temCoordenador = false;
        foreach ($participantes as $par) {
            //die(print_r($usuario['pessoa_id']));
            if ($participante->isCoordenador($par) && $usuario['pessoa_id'] == $par->pessoa_id) {

                return true;
            }
        }

        return false;
    }

    public static function setorAtualProtocolo($projeto) {
        $setores = new \App\Model\Entity\Setore;
        //   die(print_r($projeto->tipo_projeto));
        //die($projeto->tipo_projeto);
        if ($projeto->tipo_projeto == Projeto::TP_PROJETO_ENSINO || $projeto->tipo_projeto == Projeto::TP_PROJETO_EVENTOS) {

            return Setore::setorResponsavel(\App\Model\Entity\Projeto::SETOR_ENSINO);
        } else {
            return Setore::setorResponsavel(\App\Model\Entity\Projeto::SETOR_COPE);
        }
    }

}
