<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AcompanhamentosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AcompanhamentosTable Test Case
 */
class AcompanhamentosTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.acompanhamentos',
        'app.projetos',
        'app.cursos',
        'app.users',
        'app.pessoas',
        'app.participantes_projetos',
        'app.usuarios',
        'app.pareceres',
        'app.relatorios',
        'app.eventos',
        'app.anexos',
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
        $config = TableRegistry::exists('Acompanhamentos') ? [] : ['className' => 'App\Model\Table\AcompanhamentosTable'];
        $this->Acompanhamentos = TableRegistry::get('Acompanhamentos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Acompanhamentos);

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
