<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CursosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CursosTable Test Case
 */
class CursosTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.cursos',
        'app.projetos',
        'app.users',
        'app.pessoas',
        'app.participantes_projetos',
        'app.usuarios',
        'app.areas_conhecimentos',
        'app.pareceres',
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
        $config = TableRegistry::exists('Cursos') ? [] : ['className' => 'App\Model\Table\CursosTable'];
        $this->Cursos = TableRegistry::get('Cursos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Cursos);

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
}
