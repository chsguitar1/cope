<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RelatoriosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RelatoriosTable Test Case
 */
class RelatoriosTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.relatorios',
        'app.fases',
        'app.projetos',
        'app.cursos',
        'app.pessoas',
        'app.participantes_projetos',
        'app.usuarios',
        'app.users',
        'app.role_users',
        'app.setores',
        'app.areas_conhecimentos',
        'app.pareceres',
        'app.pareceresista',
        'app.eventos',
        'app.anexos',
        'app.acompanhamentos',
        'app.solicitacoes_certificados'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Relatorios') ? [] : ['className' => 'App\Model\Table\RelatoriosTable'];
        $this->Relatorios = TableRegistry::get('Relatorios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Relatorios);

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
