<?php
namespace App\Test\TestCase\Controller;

use App\Controller\FasesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\FasesController Test Case
 */
class FasesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.relatorios',
        'app.eventos',
        'app.anexos',
        'app.acompanhamentos',
        'app.solicitacoes_certificados'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
