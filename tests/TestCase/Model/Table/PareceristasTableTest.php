<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PareceristasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PareceristasTable Test Case
 */
class PareceristasTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pareceristas',
        'app.pessoas',
        'app.participantes_projetos',
        'app.projetos',
        'app.cursos',
        'app.users',
        'app.pareceres',
        'app.relatorios',
        'app.eventos',
        'app.anexos',
        'app.acompanhamentos',
        'app.solicitacoes_certificados',
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
        $config = TableRegistry::exists('Pareceristas') ? [] : ['className' => 'App\Model\Table\PareceristasTable'];
        $this->Pareceristas = TableRegistry::get('Pareceristas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pareceristas);

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
