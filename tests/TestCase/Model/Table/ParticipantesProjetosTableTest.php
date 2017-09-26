<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ParticipantesProjetosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ParticipantesProjetosTable Test Case
 */
class ParticipantesProjetosTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.participantes_projetos',
        'app.pessoas',
        'app.projetos',
        'app.cursos',
        'app.pareceres',
        'app.relatorios',
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
        $config = TableRegistry::exists('ParticipantesProjetos') ? [] : ['className' => 'App\Model\Table\ParticipantesProjetosTable'];
        $this->ParticipantesProjetos = TableRegistry::get('ParticipantesProjetos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ParticipantesProjetos);

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
