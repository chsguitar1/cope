<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ViewprojetoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ViewprojetoTable Test Case
 */
class ViewprojetoTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.viewprojeto',
        'app.cursos',
        'app.pessoas',
        'app.participantes_projetos',
        'app.projetos',
        'app.created_user',
        'app.role_users',
        'app.users',
        'app.setores',
        'app.areas_conhecimentos',
        'app.modified_user',
        'app.areas_tematicas',
        'app.linhas_extensao',
        'app.pareceres',
        'app.pareceresista',
        'app.solicitacao_pareceres',
        'app.fases',
        'app.relatorios',
        'app.eventos',
        'app.anexos',
        'app.acompanhamentos',
        'app.solicitacoes_certificados',
        'app.cronograma',
        'app.relatorio_final',
        'app.paticipantes_v',
        'app.usuarios'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Viewprojeto') ? [] : ['className' => 'App\Model\Table\ViewprojetoTable'];
        $this->Viewprojeto = TableRegistry::get('Viewprojeto', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Viewprojeto);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
