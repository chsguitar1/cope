<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PareceresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PareceresTable Test Case
 */
class PareceresTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pareceres',
        'app.pareceresista',
        'app.projetos',
        'app.cursos',
        'app.pessoas',
        'app.participantes_projetos',
        'app.usuarios',
        'app.users',
        'app.role_users',
        'app.setores',
        'app.areas_conhecimentos',
        'app.fases',
        'app.relatorios',
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
        $config = TableRegistry::exists('Pareceres') ? [] : ['className' => 'App\Model\Table\PareceresTable'];
        $this->Pareceres = TableRegistry::get('Pareceres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pareceres);

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
